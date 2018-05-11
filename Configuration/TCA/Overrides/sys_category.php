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

// add field: statements

$tca = array(
    'statements' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:sys_category.statements',
        'config' => array(
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'tx_vocabulary_domain_model_statements',
            'foreign_table' => 'tx_vocabulary_domain_model_statements',
            'MM' => 'tx_vocabulary_statements_records_mm',
            'MM_match_fields' => array(
                // ident field as workaround for possible bug in line 544 of \TYPO3\CMS\Core\Database\RelationHandler
                // tablenames must be name of foreign table (statements) whereas ident is needed to distinguish between records from different tables
                // otherwise relations are not kept/displayed correctly in this field
                'ident' => 'sys_category',
                'tablenames' => 'tx_vocabulary_domain_model_statements',
                'fieldname' => 'statements',
            ),
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 9999,
            'wizards' => array(
                'add' => Array(
                    'type' => 'popup',
                    'title' => 'Create new',
                    'icon' => 'actions-add',
                    'params' => array(
                        'table' => 'tx_vocabulary_domain_model_statements',
                        'pid' => '###PAGE_TSCONFIG_ID###',
                        'setValue' => 'prepend'
                    ),
                    'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    'module' => array(
                        'name' => 'wizard_add',
                    ),
                ),
                'edit' => Array(
                    'type' => 'popup',
                    'title' => 'LLL:EXT:vocabulary/Resources/Private/Language/locallang_db.xlf:wizard_edit',
                    'icon' => 'actions-open',
                    'JSopenParams' => 'height=550,width=900,status=0,menubar=0,scrollbars=1',
                    'popup_onlyOpenIfSelected' => 1,
                    'module' => array(
                        'name' => 'wizard_edit',
                    ),
                ),
            ),
        ),
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $tca);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    'statements',
    '',
    'after:items'
);
