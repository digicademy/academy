<?php

defined('TYPO3') or die();

/**
 * Date ranges ("from–to" with an optional free-text label) for academy records.
 *
 * Each date range belongs to exactly one record, referenced by "parent" (uid) and "tablename",
 * and is edited inline in that record's "date_range" field. Replaces the date ranges of
 * EXT:chf_time, of which only label, start and end date were used; existing records are
 * copied over by the academyDateRangesMigration upgrade wizard.
 */
return [
    'ctrl' => [
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_dateranges',
        'label' => 'label',
        'label_alt' => 'dating_from,dating_to',
        'default_sortby' => 'ORDER BY dating_from, dating_to',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'hideTable' => true,
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
        'searchFields' => 'label,dating_from,dating_to',
        'typeicon_classes' => [
            'default' => 'actions-calendar',
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                hidden,
                label,
                dating_from,
                dating_to,
                sys_language_uid,
                l10n_parent,
                l10n_diffsource
            ',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_academy_domain_model_dateranges',
                'foreign_table_where' => 'AND {#tx_academy_domain_model_dateranges}.{#pid}=###CURRENT_PID### AND {#tx_academy_domain_model_dateranges}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['label' => ''],
                ],
            ],
        ],
        'label' => [
            'exclude' => true,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_dateranges.label',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'dating_from' => [
            'exclude' => true,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_dateranges.dating_from',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 50,
                'eval' => 'trim',
            ],
        ],
        'dating_to' => [
            'exclude' => true,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_dateranges.dating_to',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 50,
                'eval' => 'trim',
            ],
        ],
        'parent' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tablename' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
