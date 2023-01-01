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

namespace Digicademy\Academy\Xclass\Backend\Form\FormDataProvider;

use TYPO3\CMS\Backend\Form\FormDataProvider\TcaInline;
use TYPO3\CMS\Backend\Utility\BackendUtility;
class AcademyTcaInline extends TcaInline
{

    /**
     * Substitute the value in databaseRow of this inline field with an array
     * that contains the databaseRows of currently connected records and some meta information.
     *
     * @param array $result Result array
     * @param string $fieldName Current handle field name
     * @return array Modified item array
     */
    protected function resolveRelatedRecords(array $result, $fieldName)
    {

        if ($result['defaultLanguageRow'] !== null) {
            return $this->resolveRelatedRecordsOverlays($result, $fieldName);
        }

        $childTableName = $result['processedTca']['columns'][$fieldName]['config']['foreign_table'];
        $connectedUidsOfDefaultLanguageRecord = $this->resolveConnectedRecordUids(
            $result['processedTca']['columns'][$fieldName]['config'],
            $result['tableName'],
            $result['databaseRow']['uid'],
            $result['databaseRow'][$fieldName]
        );

        // 2023-01-01, patch by @metacontext
        // in a scenario where a relation between a localized entity and a not localized entity exists
        // all existing IRRE children (also those from other languages) are shown in the entity that is
        // not yet localized; this is quite confusing behaviour - localized IRRE children should
        // always only be shown in the respective language of their respective parent record
        if ($fieldName == 'relations') {
            $languageAwareConnectedUids = [];
            foreach ($connectedUidsOfDefaultLanguageRecord as $uid) {
                // fetch the relation to get its language id
                $relation = BackendUtility::getRecord(
                    'tx_academy_domain_model_relations',
                    $uid,
                    'sys_language_uid'
                );
                // only relations that match the default language
                if ($relation['sys_language_uid'] == '0') {
                    $languageAwareConnectedUids[] = $uid;
                }
            }
            $connectedUidsOfDefaultLanguageRecord = $languageAwareConnectedUids;
        }

        $result['databaseRow'][$fieldName] = implode(',', $connectedUidsOfDefaultLanguageRecord);
        $connectedUidsOfDefaultLanguageRecord = $this->getWorkspacedUids($connectedUidsOfDefaultLanguageRecord, $childTableName);

        if ($result['inlineCompileExistingChildren']) {
            foreach ($connectedUidsOfDefaultLanguageRecord as $uid) {
                try {
                    $compiledChild = $this->compileChild($result, $fieldName, $uid);
                    $result['processedTca']['columns'][$fieldName]['children'][] = $compiledChild;
                } catch (DatabaseRecordException $e) {
                    // Nothing to do here, missing child is just not being rendered.
                }
            }
        }
        return $result;
    }
}
