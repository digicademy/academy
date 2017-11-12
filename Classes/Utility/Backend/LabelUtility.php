<?php

namespace Digicademy\Academy\Utility\Backend;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <Torsten.Schrade@adwmainz.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

use TYPO3\CMS\Backend\Utility\BackendUtility;

class LabelUtility
{

    public function relationsLabel(array &$parameters)
    {
        // get basic contact information label from lang file
        $contactInformationLabel = $GLOBALS['LANG']->sL('LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards') . ': ';

        // get role - freetext_roles overrides role record
        $role = '';
        ($parameters['row']['role'][0]) ? $roleRecord = BackendUtility::getRecordRaw('tx_academy_domain_model_roles', 'uid=' . $parameters['row']['role'][0]) : $roleRecord = '';
        if (is_array($roleRecord) && !$parameters['row']['role_freetext']) {
            $role = $roleRecord['title'] . ': ';
        }
        if ($parameters['row']['role_freetext']) {
            $role = htmlspecialchars($parameters['row']['role_freetext']) . ': ';
        }

        // test for IRRE context; if true, trim the field values to uids
        if (is_array($parameters['parent'])) {
            if ($parameters['row']['person']) {
                $parameters['row']['person'] = preg_replace('/tx_academy_domain_model_persons_/', '',
                    substr($parameters['row']['person'], 0, stripos($parameters['row']['person'], '|')));
            }
            if ($parameters['row']['person_symmetric']) {
                $parameters['row']['person_symmetric'] = preg_replace('/tx_academy_domain_model_persons_/', '',
                    substr($parameters['row']['person_symmetric'], 0, stripos($parameters['row']['person_symmetric'], '|')));
            }
            if ($parameters['row']['project']) {
                $parameters['row']['project'] = preg_replace('/tx_academy_domain_model_projects_/', '',
                    substr($parameters['row']['project'], 0, stripos($parameters['row']['project'], '|')));
            }
            if ($parameters['row']['project_symmetric']) {
                $parameters['row']['project_symmetric'] = preg_replace('/tx_academy_domain_model_projects_/', '',
                    substr($parameters['row']['project_symmetric'], 0, stripos($parameters['row']['project_symmetric'], '|')));
            }
            if ($parameters['row']['unit']) {
                $parameters['row']['unit'] = preg_replace('/tx_academy_domain_model_units_/', '',
                    substr($parameters['row']['unit'], 0, stripos($parameters['row']['unit'], '|')));
            }
            if ($parameters['row']['unit']) {
                $parameters['row']['unit_symmetric'] = preg_replace('/tx_academy_domain_model_units_/', '',
                    substr($parameters['row']['unit_symmetric'], 0, stripos($parameters['row']['unit_symmetric'], '|')));
            }
            if ($parameters['row']['hcard']) {
                $parameters['row']['hcard'] = preg_replace('/tx_academy_domain_model_hcards_/', '',
                    substr($parameters['row']['hcard'], 0, stripos($parameters['row']['hcard'], '|')));
            }
            if ($parameters['row']['news']) {
                $parameters['row']['news'] = preg_replace('/tx_news_domain_model_news_/', '',
                    substr($parameters['row']['news'], 0, stripos($parameters['row']['news'], '|')));
            }
            if ($parameters['row']['event']) {
                $parameters['row']['event'] = preg_replace('/tx_news_domain_model_news_/', '',
                    substr($parameters['row']['event'], 0, stripos($parameters['row']['event'], '|')));
            }
            if ($parameters['row']['medium']) {
                $parameters['row']['medium'] = preg_replace('/tx_academy_domain_model_media_/', '',
                    substr($parameters['row']['medium'], 0, stripos($parameters['row']['medium'], '|')));
            }
        }

        // get the records for the related objects
        ($parameters['row']['person'] > 0) ? $person = BackendUtility::getRecordRaw('tx_academy_domain_model_persons',
            'uid=' . $parameters['row']['person']) : $person = '';
        ($parameters['row']['person_symmetric'] > 0) ? $person_symmetric = BackendUtility::getRecordRaw('tx_academy_domain_model_persons',
            'uid=' . $parameters['row']['person_symmetric']) : $person_symmetric = '';
        ($parameters['row']['project'] > 0) ? $project = BackendUtility::getRecordRaw('tx_academy_domain_model_projects',
            'uid=' . $parameters['row']['project']) : $project = '';
        ($parameters['row']['project_symmetric'] > 0) ? $project_symmetric = BackendUtility::getRecordRaw('tx_academy_domain_model_projects',
            'uid=' . $parameters['row']['project_symmetric']) : $project_symmetric = '';
        ($parameters['row']['unit'] > 0) ? $unit = BackendUtility::getRecordRaw('tx_academy_domain_model_units',
            'uid=' . $parameters['row']['unit']) : $unit = '';
        ($parameters['row']['unit_symmetric'] > 0) ? $unit_symmetric = BackendUtility::getRecordRaw('tx_academy_domain_model_units',
            'uid=' . $parameters['row']['unit_symmetric']) : $unit_symmetric = '';
        ($parameters['row']['hcard'] > 0) ? $hcard = BackendUtility::getRecordRaw('tx_academy_domain_model_hcards',
            'uid=' . $parameters['row']['hcard']) : $hcard = '';
        ($parameters['row']['news'] > 0) ? $news = BackendUtility::getRecordRaw('tx_news_domain_model_news',
            'uid=' . $parameters['row']['news']) : $news = '';
        ($parameters['row']['event'] > 0) ? $event = BackendUtility::getRecordRaw('tx_news_domain_model_news',
            'uid=' . $parameters['row']['event']) : $event = '';
        ($parameters['row']['medium'] > 0) ? $medium = BackendUtility::getRecordRaw('tx_academy_domain_model_media',
            'uid=' . $parameters['row']['medium']) : $medium = '';

        $freetext = $parameters['row']['freetext'];

        // build the labels for the different objects; reused below in label context
        if (is_array($person)) {
            $personLabel = $person['honorific_prefix'] . ' ' . $person['given_name'] . ' ' . $person['family_name'] . ' ' . $person['honorific_suffix'];
        }
        if (is_array($person_symmetric)) {
            $personSymmetricLabel = $person_symmetric['honorific_prefix'] . ' ' . $person_symmetric['given_name'] . ' ' . $person_symmetric['family_name'] . ' ' . $person_symmetric['honorific_suffix'];
        }
        if (is_array($project)) {
            $projectLabel = $project['title'];
        }
        if (is_array($project_symmetric)) {
            $projectSymmetricLabel = $project_symmetric['title'];
        }
        if (is_array($unit)) {
            $unitLabel = $unit['title'];
        }
        if (is_array($unit_symmetric)) {
            $unitSymmetricLabel = $unit_symmetric['title'];
        }
        if (is_array($hcard)) {
            $hcardLabel = $hcard['label'];
        }
        if (is_array($news)) {
            $newsLabel = $news['title'];
        }
        if (is_array($event)) {
            $eventLabel = $event['title'];
        }
        if (is_array($medium)) {
            $mediumLabel = $medium['title'];
        }

        // in list view field type is string, in inline and record view field type is array (due to select type of field)
        (is_array($parameters['row']['type'])) ? $type = (int)$parameters['row']['type'][0] : $type = (int)$parameters['row']['type'];

        // switch the context in which the label appears
        switch ($type) {
            case 10:
                $parameters['title'] = $contactInformationLabel . $personLabel;
                break;
            case 11:
                if ($parameters['parent']['config']['foreign_label'] == 'projects') {
                    $parameters['title'] = $role . $personLabel;
                } elseif ($parameters['parent']['config']['foreign_label'] == 'persons') {
                    $parameters['title'] = $role . $projectLabel;
                } else {
                    $parameters['title'] = $role . $personLabel . ' (' . $projectLabel . ')';
                }
                break;
            case 12:
                if ($parameters['parent']['config']['foreign_label'] == 'units') {
                    $parameters['title'] = $role . $personLabel;
                } elseif ($parameters['parent']['config']['foreign_label'] == 'persons') {
                    $parameters['title'] = $role . $unitLabel;
                } else {
                    $parameters['title'] = $role . $personLabel . ' (' . $unitLabel . ')';
                }
                break;
            case 13:
                $parameters['title'] = $personLabel . ', ' . $role . $eventLabel;
                break;
            case 14:
                $parameters['title'] = $personLabel . ', ' . $newsLabel;
                break;
            case 15:
                $parameters['title'] = $personLabel . ', ' . $mediumLabel;
                break;
            case 16:
                $parameters['title'] = $personLabel . ', ' . $role . $personSymmetricLabel;
                break;
            case 20:
                $parameters['title'] = $contactInformationLabel . $projectLabel;
                break;
            case 21:
                $parameters['title'] = $projectLabel . ', ' . $unitLabel;
                break;
            case 22:
                $parameters['title'] = $projectLabel . ', ' . $newsLabel;
                break;
            case 23:
                $parameters['title'] = $projectLabel . ', ' . $eventLabel;
                break;
            case 24:
                $parameters['title'] = $projectLabel . ', ' . $mediumLabel;
                break;
            case 25:
                $parameters['title'] = $role . $projectLabel . ', ' . htmlspecialchars($freetext);
                break;
            case 26:
                $parameters['title'] = $projectLabel . ', ' . $projectSymmetricLabel;
                break;
            case 30:
                $parameters['title'] = $contactInformationLabel . $unitLabel;
                break;
            case 31:
                $parameters['title'] = $role . $unitLabel . htmlspecialchars($freetext);
                break;
            case 32:
                $parameters['title'] = $unitLabel . ', ' . $unitSymmetricLabel;
                break;
            case 40:
                $parameters['title'] = $contactInformationLabel . $newsLabel;
                break;
            case 41:
                $parameters['title'] = $newsLabel . ', ' . $eventLabel;
                break;
            case 42:
                $parameters['title'] = $newsLabel . ', ' . $mediumLabel;
                break;
            case 50:
                $parameters['title'] = $contactInformationLabel . $eventLabel;
                break;
            case 51:
                $parameters['title'] = $eventLabel . ', ' . $mediumLabel;
                break;
        }

        return $parameters;
    }

}
