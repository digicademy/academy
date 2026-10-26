<?php

declare(strict_types=1);

namespace Digicademy\Academy\Updates;

use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\ChattyInterface;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * Copies the date ranges of academy records from EXT:chf_time's table
 * "tx_chftime_domain_model_dateranges" into "tx_academy_domain_model_dateranges".
 *
 * Only rows whose "tablename" is an academy table are copied; date ranges of other
 * extensions stay where they are. Rows keep their uid, so the parent records' "date_range"
 * counters, the "l10n_parent" links of translations and workspace versions stay valid
 * without further changes. Deleted rows are copied as well, so that restoring a parent
 * record from the recycler restores its date range too.
 *
 * Only the columns both tables have are copied; precision, method, certainty, duration,
 * calendar and temporal entity of EXT:chf_time have no counterpart and are dropped.
 * The source table is read only and left in place.
 *
 * The wizard can run while EXT:chf_time is still installed or after it was removed, as long
 * as its table still exists. Rows already copied are skipped, so it can be run again after
 * an aborted run. A uid that already exists in the target table for a different record
 * aborts the wizard without copying anything.
 */
#[UpgradeWizard('academyDateRangesMigration')]
final class DateRangesMigration implements UpgradeWizardInterface, ChattyInterface
{
    private const SOURCE_TABLE = 'tx_chftime_domain_model_dateranges';
    private const TARGET_TABLE = 'tx_academy_domain_model_dateranges';
    private const PARENT_TABLE_PREFIX = 'tx_academy_domain_model_';

    private OutputInterface $output;

    public function getTitle(): string
    {
        return 'Migrate "Digicademy Academy" date ranges from EXT:chf_time.';
    }

    public function getDescription(): string
    {
        return 'EXT:academy now stores date ranges in its own table "' . self::TARGET_TABLE . '".'
            . ' Copies the date ranges of academy records (label, start and end date, translations)'
            . ' from "' . self::SOURCE_TABLE . '", keeping their uids. The source table is not changed.';
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }

    public function updateNecessary(): bool
    {
        if (!$this->sourceTableExists()) {
            return false;
        }
        return $this->getRowsToCopy() !== [];
    }

    public function executeUpdate(): bool
    {
        if (!$this->sourceTableExists()) {
            return true;
        }

        $rows = $this->getRowsToCopy();
        $conflicts = $this->getConflictingUids($rows);
        if ($conflicts !== []) {
            $this->output->writeln(sprintf(
                '<error>%d date range uid(s) already exist in "%s" for a different record: %s. Nothing was copied.</error>',
                count($conflicts),
                self::TARGET_TABLE,
                implode(', ', $conflicts)
            ));
            return false;
        }

        $connection = $this->getConnectionPool()->getConnectionForTable(self::TARGET_TABLE);
        $connection->beginTransaction();
        try {
            foreach ($rows as $row) {
                $connection->insert(self::TARGET_TABLE, $row);
            }
            $connection->commit();
        } catch (\Throwable $exception) {
            $connection->rollBack();
            throw $exception;
        }

        $this->output->writeln(sprintf('Copied %d date range(s) to "%s".', count($rows), self::TARGET_TABLE));
        return true;
    }

    /**
     * Source rows of academy records that have not been copied yet, reduced to the columns
     * both tables have. A row counts as copied if the target table holds the same uid for
     * the same parent record.
     *
     * @return list<array<string, mixed>>
     */
    private function getRowsToCopy(): array
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable(self::SOURCE_TABLE);
        $queryBuilder->getRestrictions()->removeAll();
        $sourceRows = $queryBuilder
            ->select(...$this->getCommonColumns())
            ->from(self::SOURCE_TABLE)
            ->where(
                $queryBuilder->expr()->like(
                    'tablename',
                    $queryBuilder->createNamedParameter(
                        $queryBuilder->escapeLikeWildcards(self::PARENT_TABLE_PREFIX) . '%',
                        Connection::PARAM_STR
                    )
                )
            )
            ->orderBy('uid')
            ->executeQuery()
            ->fetchAllAssociative();

        $targetParents = $this->getTargetParentsByUid();
        return array_values(array_filter(
            $sourceRows,
            static fn(array $row): bool => ($targetParents[(int)$row['uid']] ?? null) !== self::parentKey($row)
        ));
    }

    /**
     * Uids of rows to copy that the target table already holds for a different record,
     * e.g. because a date range was created in the backend before the wizard ran.
     *
     * @param list<array<string, mixed>> $rows Result of getRowsToCopy()
     * @return list<int>
     */
    private function getConflictingUids(array $rows): array
    {
        $targetParents = $this->getTargetParentsByUid();
        $conflicts = [];
        foreach ($rows as $row) {
            if (isset($targetParents[(int)$row['uid']])) {
                $conflicts[] = (int)$row['uid'];
            }
        }
        return $conflicts;
    }

    /**
     * Parent of every target row (see parentKey()), indexed by uid, including deleted rows.
     *
     * @return array<int, string>
     */
    private function getTargetParentsByUid(): array
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable(self::TARGET_TABLE);
        $queryBuilder->getRestrictions()->removeAll();
        $rows = $queryBuilder
            ->select('uid', 'parent', 'tablename')
            ->from(self::TARGET_TABLE)
            ->executeQuery()
            ->fetchAllAssociative();

        $parents = [];
        foreach ($rows as $row) {
            $parents[(int)$row['uid']] = self::parentKey($row);
        }
        return $parents;
    }

    /**
     * @param array<string, mixed> $row
     */
    private static function parentKey(array $row): string
    {
        return $row['tablename'] . ':' . (int)$row['parent'];
    }

    /**
     * @return list<string>
     */
    private function getCommonColumns(): array
    {
        $sourceColumns = $this->getColumnNames(self::SOURCE_TABLE);
        $targetColumns = $this->getColumnNames(self::TARGET_TABLE);
        return array_values(array_intersect($targetColumns, $sourceColumns));
    }

    /**
     * @return list<string>
     */
    private function getColumnNames(string $table): array
    {
        $schemaManager = $this->getConnectionPool()->getConnectionForTable($table)->createSchemaManager();
        $names = [];
        foreach ($schemaManager->listTableColumns($table) as $column) {
            $names[] = $column->getName();
        }
        return $names;
    }

    private function sourceTableExists(): bool
    {
        $schemaManager = $this->getConnectionPool()->getConnectionForTable(self::SOURCE_TABLE)->createSchemaManager();
        return $schemaManager->tablesExist([self::SOURCE_TABLE]);
    }

    private function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
