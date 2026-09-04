<?php

declare(strict_types=1);

namespace Digicademy\Academy\Updates;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('digicademyAcademyCTypeMigration')]
final class DigicademyAcademyCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'Migrate "Digicademy Academy" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "Digicademy Academy" plugins are now registered as content element. Update migrates existing records and backend user permissions.';
    }

    /**
     * Maps the legacy "tt_content.list_type" plugin signatures of this extension to the
     * "tt_content.CType" values they are registered under since TYPO3 13.4.
     *
     * The signatures are unchanged — only the column they live in changes — so every
     * entry maps onto itself. Keep this list in sync with the ExtensionUtility::registerPlugin()
     * calls in Configuration/TCA/Overrides/tt_content.php.
     *
     * Plugin signatures retired before the TYPO3 13.4 upgrade (academy_persons,
     * academy_projects, academy_products, academy_services, academy_units,
     * academy_mediaviewer) are deliberately absent: they have no content element to be
     * migrated to, and records still using them were already non-renderable under
     * TYPO3 12.4. They need an editorial cleanup rather than an automated migration.
     *
     * @return array<string, string>
     */
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'academy_list' => 'academy_list',
            'academy_show' => 'academy_show',
            'academy_search' => 'academy_search',
        ];
    }
}
