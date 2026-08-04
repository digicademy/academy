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
    $tca
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;Configuration,pi_flexform,', 'academy_list', 'after:subheader');
ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:academy/Configuration/FlexForms/ListPlugin.xml', 'academy_list');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;Configuration,pi_flexform,', 'academy_show', 'after:subheader');
ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:academy/Configuration/FlexForms/ShowPlugin.xml', 'academy_show');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('Academy', 'List', 'Academy: List entities');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('Academy', 'Show', 'Academy: Show entity');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('Academy', 'Search', 'Academy: Search entities');
