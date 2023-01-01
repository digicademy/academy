<?php
namespace Digicademy\Academy\Hooks\Backend;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2021 Torsten Schrade <Torsten.Schrade@adwmainz.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class DataHandler
{

    /**
     * Generates a persistent identifier (uuid) on new and save for this extension's tables
     *
     * @param $status
     * @param $table
     * @param $id
     * @param $fieldArray
     * @param $pObj
     */
    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$pObj)
    {

        // generate xml conformant uuids as persistent identifiers
        if ($table == 'tx_academy_domain_model_projects' ||
            $table == 'tx_academy_domain_model_units' ||
            $table == 'tx_academy_domain_model_persons' ||
            $table == 'tx_academy_domain_model_relations' ||
            $table == 'tx_academy_domain_model_roles' ||
            $table == 'tx_academy_domain_model_hcards' ||
            $table == 'tx_academy_domain_model_media' ||
            $table == 'tx_academy_domain_model_products' ||
            $table == 'tx_academy_domain_model_services' ||
            $table == 'tx_academy_domain_model_publications' ||
            $table == 'sys_category'
        ) {
            $generate = false;
            switch ($status) {
                case 'new':
                    $generate = true;
                    break;
                case 'update':
                default:
                    $record = GeneralUtility::makeInstance(ConnectionPool::class)
                        ->getConnectionForTable($table)
                        ->select(['persistent_identifier'], $table, ['uid' => (int)$id]
                        )->fetch();

                    if (!$record['persistent_identifier']) {
                        $generate = true;
                    }
            }
            if ($generate == true) {
                do {
                    $uuid = $this->generateUUID();
                } while (preg_match('/^[a-z]/', $uuid) !== 1);
                $fieldArray['persistent_identifier'] = $uuid;
            }
        }

        // core bug: setting of allowLanguageSynchronization in IRRE children that point back to their parents lead
        // to localized child fields overridden with parent ids; afterwards those records appear in their langauge parent
        // instead of the correctly localized child record; this in turn leads to bizarre behaviours in
        // backend and frontend (like missing localized records after a save in a specific language etc.)
        // the following mechanism forces child fields in tx_academy_domain_model relations to contain the correct localized parents
        // also @see: https://forge.typo3.org/issues/80944
        if ($status == 'update' && $table == 'tx_academy_domain_model_relations') {

            // get the relation record from DB for checking if it is a localized relation
            $relation = BackendUtility::getRecord($table, $id);

            // only trigger the next steps if we are dealing with a localized relation
            // we will always override an existing localized relation to take care of all six relation scenarios:
            // localized <> localized, localized symmetric <> localized symmetric, not localized <> localized
            // not localized symmetric <> localized symmetric, not localized <> not localized, not localized symmetric <> not localized symmetric
            if ($relation['sys_language_uid'] > 0) {

                // get the localization parent
                $localizationParentRelation = BackendUtility::getRecord($table, $relation['l10n_parent']);

                // relation field names
                $relationFields = [
                    'medium', 'medium_symmetric','person','person_symmetric','product','product_symmetric','project','project_symmetric','publication','publication_symmetric','service','service_symmetric','unit','unit_symmetric','news','news_symmetric','event','event_symmetric'
                ];

                // walk through all fields of a relation ...
                foreach ($relationFields as $fieldName) {

                    // ... if the parent relation contains a value for a given field
                    if ($localizationParentRelation[$fieldName] > 0) {

                        // determine the parent table name for the entity
                        (strpos($fieldName, '_')) ? $entity = substr($fieldName, 0, strpos($fieldName, '_')) : $entity = $fieldName;
                        $tableName = 'tx_academy_domain_model_' . $entity . 's';

                        // and check if there exists a localization
                        $localizedForeignRecord = BackendUtility::getRecordLocalization(
                            $tableName,
                            $localizationParentRelation[$fieldName],
                            (int)$relation['sys_language_uid']
                        );

                        // if so we force the correct uid of the localization into the incoming fieldArray
                        // this also takes symmetrical relations into account
                        if (is_array($localizedForeignRecord)
                            && $localizedForeignRecord[0]['uid'] > 0
                            && $localizedForeignRecord[0]['l10n_parent'] == $localizationParentRelation[$fieldName]
                            && $localizedForeignRecord[0]['sys_language_uid'] == $relation['sys_language_uid']
                        ) {
                            $fieldArray[$fieldName] = $localizedForeignRecord[0]['uid'];
                        // if not we force the original entity id (this caters for scenarios where only one side
                        // of a relation is translated
                        } else {
                            $fieldArray[$fieldName] = $localizationParentRelation[$fieldName];
                        }
                    }
                }
            }
        }
    }

    /**
     * Generates a universally unique identifier (UUID) according to RFC 4122 v4.
     * The algorithm used here, might not be completely random. Copied from the identity extension.
     *
     * @return string The universally unique id
     * @author Unknown
     */
    private function generateUUID()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff));
    }

}
