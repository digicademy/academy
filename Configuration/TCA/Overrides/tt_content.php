<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$tca = [
    'tx_academy_parent' => [
        'config' => [
            'type' => 'passthrough',
        ],
    ],
    'tx_academy_tablename' => [
        'config' => [
            'type' => 'passthrough',
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $tca,
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_projects'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_projects', 'FILE:EXT:academy/Configuration/FlexForms/ProjectsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_units'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_units', 'FILE:EXT:academy/Configuration/FlexForms/UnitsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_persons'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_persons', 'FILE:EXT:academy/Configuration/FlexForms/PersonsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_media'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_media', 'FILE:EXT:academy/Configuration/FlexForms/MediaPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_mediaviewer'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_mediaviewer', 'FILE:EXT:academy/Configuration/FlexForms/MediaviewerPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_hcards'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_hcards', 'FILE:EXT:academy/Configuration/FlexForms/HcardsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_products'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_products', 'FILE:EXT:academy/Configuration/FlexForms/ProductsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_services'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_services', 'FILE:EXT:academy/Configuration/FlexForms/ServicesPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_publications'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('academy_publications', 'FILE:EXT:academy/Configuration/FlexForms/PublicationsPlugin.xml');
