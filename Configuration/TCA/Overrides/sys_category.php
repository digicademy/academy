<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// add field: persistent_identifier

$tca = array(
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
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $tca);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    'persistent_identifier',
    '',
    'before:title'
);
