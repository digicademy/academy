<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

// add field: persistent_identifier

$tca = [
    'persistent_identifier' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:sys_category.persistent_identifier',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim,',
            'readOnly' => 1
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('sys_category', $tca);
ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    'persistent_identifier',
    '',
    'before:title'
);
