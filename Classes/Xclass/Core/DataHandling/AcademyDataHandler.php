<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Digicademy\Academy\Xclass\Core\DataHandling;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\RelationHandler;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Core\DataHandling\DataHandler;

class AcademyDataHandler extends DataHandler
{

    /**
     * Processes child records in an inline (IRRE) element when the parent record is copied.
     *
     * @param string $table
     * @param int $uid
     * @param string $field
     * @param mixed $value
     * @param array $row
     * @param array $conf
     * @param int $realDestPid
     * @param string $language
     * @param array $workspaceOptions
     * @return string
     */
    protected function copyRecord_processInline(
        $table,
        $uid,
        $field,
        $value,
        $row,
        $conf,
        $realDestPid,
        $language,
        array $workspaceOptions
    ) {
        // Fetch the related child records using \TYPO3\CMS\Core\Database\RelationHandler
        /** @var RelationHandler $dbAnalysis */
        $dbAnalysis = $this->createRelationHandlerInstance();
        $dbAnalysis->start($value, $conf['foreign_table'], '', $uid, $table, $conf);
        // Walk through the items, copy them and remember the new id:
        foreach ($dbAnalysis->itemArray as $k => $v) {
            $newId = null;
            // If language is set and differs from original record, this isn't a copy action but a localization of our parent/ancestor:
            if ($language > 0 && BackendUtility::isTableLocalizable($table) && $language != $row[$GLOBALS['TCA'][$table]['ctrl']['languageField']]) {

                // Children should be localized when the parent gets localized the first time, just do it:
                // $newId = $this->localize($v['table'], $v['id'], $language);

                // 2023-01-01, patch by @metacontext - no, not just do it :)
                // in certain scenarios (like relation between localized <> not localized entities)
                // a correct localization might already exist; in case a not localized record with an existing relation gets
                // localized later on just executing a localization will lead to errors / duplicated localizations; therefore we
                // need to check first if a valid localization already exists at this point
                $possibleExistingLocalization = BackendUtility::getRecordLocalization(
                    $v['table'],
                    $v['id'],
                    $language
                );

                // if a valid localization already exists we return immediately with its uid
                if (is_array($possibleExistingLocalization) && $possibleExistingLocalization[0]['l10n_parent'] == $v['id']) {
                    return $possibleExistingLocalization[0]['uid'];
                // and only if not we start the localization of the inline child
                } else {
                    $newId = $this->localize($v['table'], $v['id'], $language);
                }

            } else {
                if (!MathUtility::canBeInterpretedAsInteger($realDestPid)) {
                    $newId = $this->copyRecord($v['table'], $v['id'], -$v['id']);
                // If the destination page id is a NEW string, keep it on the same page
                } elseif ($this->BE_USER->workspace > 0 && BackendUtility::isTableWorkspaceEnabled($v['table'])) {
                    // A filled $workspaceOptions indicated that this call
                    // has it's origin in previous versionizeRecord() processing
                    if (!empty($workspaceOptions)) {
                        // Versions use live default id, thus the "new"
                        // id is the original live default child record
                        $newId = $v['id'];
                        $this->versionizeRecord(
                            $v['table'],
                            $v['id'],
                            $workspaceOptions['label'] ?? 'Auto-created for WS #' . $this->BE_USER->workspace,
                            $workspaceOptions['delete'] ?? false
                        );
                    // Otherwise just use plain copyRecord() to create placeholders etc.
                    } else {
                        // If a record has been copied already during this request,
                        // prevent superfluous duplication and use the existing copy
                        if (isset($this->copyMappingArray[$v['table']][$v['id']])) {
                            $newId = $this->copyMappingArray[$v['table']][$v['id']];
                        } else {
                            $newId = $this->copyRecord($v['table'], $v['id'], $realDestPid);
                        }
                    }
                } elseif ($this->BE_USER->workspace > 0 && !BackendUtility::isTableWorkspaceEnabled($v['table'])) {
                    // We are in workspace context creating a new parent version and have a child table
                    // that is not workspace aware. We don't do anything with this child.
                    continue;
                } else {
                    // If a record has been copied already during this request,
                    // prevent superfluous duplication and use the existing copy
                    if (isset($this->copyMappingArray[$v['table']][$v['id']])) {
                        $newId = $this->copyMappingArray[$v['table']][$v['id']];
                    } else {
                        $newId = $this->copyRecord_raw($v['table'], $v['id'], $realDestPid, [], $workspaceOptions);
                    }
                }
            }
            // If the current field is set on a page record, update the pid of related child records:
            if ($table === 'pages') {
                $this->registerDBPids[$v['table']][$v['id']] = $uid;
            } elseif (isset($this->registerDBPids[$table][$uid])) {
                $this->registerDBPids[$v['table']][$v['id']] = $this->registerDBPids[$table][$uid];
            }
            $dbAnalysis->itemArray[$k]['id'] = $newId;
        }
        // Store the new values, we will set up the uids for the subtype later on (exception keep localization from original record):
        $value = implode(',', $dbAnalysis->getValueArray());
        $this->registerDBList[$table][$uid][$field] = $value;

        return $value;
    }

}
