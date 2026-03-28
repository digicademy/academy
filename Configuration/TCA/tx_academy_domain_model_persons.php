<?php

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons',
        'label' => 'family_name',
        'label_alt' => 'given_name, honorific_prefix, honorific_suffix',
        'label_alt_force' => 1,
        'default_sortby' => 'ORDER BY family_name, given_name ASC',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
        'searchFields' => 'persistent_identifier,given_name,honorific_prefix,additional_name,family_name,honorific_suffix',
        'iconfile' => ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_persons.svg'
    ],
    'interface' => [
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.div1,
                    hidden,
                    persistent_identifier,
                    honorific_prefix,
                    given_name,
                    additional_name,
                    family_name,
                    honorific_suffix,
                    slug,
                    sorting,
                    date_range,
                    image,
                    content_elements,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.div2,
                    relations,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.div7,
                    categories,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:general.language,
                    sys_language_uid,
                    l10n_parent,
                    l10n_diffsource,
        '
        ],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ]
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
                'foreign_table' => 'tx_academy_domain_model_persons',
                'foreign_table_where' => 'AND tx_academy_domain_model_persons.pid=###CURRENT_PID### AND tx_academy_domain_model_persons.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '255',
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => '10',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
                'range' => [
                    'upper' => mktime(0, 0, 0, 12, 31, date('Y') + 10),
                    'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
                ],
            ],
        ],
        'persistent_identifier' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.persistent_identifier',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => 1
            ],
        ],
        'given_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.given_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'additional_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.additional_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'family_name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.family_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'honorific_prefix' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.honorific_prefix',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'honorific_suffix' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.honorific_suffix',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'slug' => [
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.slug',
            'exclude' => 1,
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['persistent_identifier'],
                    'prefixParentPageSlug' => true,
                    'replacements' => [
                        '/' => '-',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => ''
            ],
        ],
        'sorting' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.sorting',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'date_range' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.date_range',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chftime_domain_model_dateranges',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'tablename',
                'minitems' => 0,
                'maxitems' => 1,
                'behaviour' => [
                    'disableMovingChildrenWithParent' => 1,
                ],
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'newRecordLinkAddTitle' => 1,
                    'newRecordLinkPosition' => 'bottom',
                    'levelLinksPosition' => 'bottom',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
        'image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.image',
            'config' => [
                'type' => 'file',
                'minitems' => 0,
                'maxitems' => 1,
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
            ]
        ],
        'page' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.page',
            'config' => [
                'type' => 'group',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                    ],
                ],
            ],
        ],
        'content_elements' => [
            'exclude' => true,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.content_elements',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tt_content',
                'foreign_table' => 'tt_content',
                'foreign_sortby' => 'sorting',
                'foreign_field' => 'tx_academy_parent',
                'foreign_table_field' => 'tx_academy_tablename',
                'minitems' => 0,
                'maxitems' => 99,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'enabledControls' => [
                        'info' => false,
                    ]
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'relations' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.relations',
            'l10n_display' => 'defaultAsReadonly',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_academy_domain_model_relations',
                'foreign_field' => 'person',
                'foreign_sortby' => 'sorting',
                'symmetric_field' => 'person_symmetric',
                'symmetric_sortby' => 'sorting_symmetric',
                'maxitems' => 9999,
                'behaviour' => [
                    'disableMovingChildrenWithParent' => 1,
//                    'allowLanguageSynchronization' => true,
                ],
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'useSortable' => true,
                    'levelLinksPosition' => 'bottom',
                ],
                'overrideChildTca' => [
                    'columns' => [
                        'type' => [
                            'config' => [
                                'items' => [
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.10',
                                        'value' => '10'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.11',
                                        'value' => '11'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.12',
                                        'value' => '12'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.13',
                                        'value' => '13'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.14',
                                        'value' => '14'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.15',
                                        'value' => '15'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.16',
                                        'value' => '16'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.70',
                                        'value' => '70'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.80',
                                        'value' => '80'
                                    ],
                                    [
                                        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.type.I.90',
                                        'value' => '90'
                                    ],
                                ]
                            ]
                        ]
                    ],
                ],
            ],
        ],
        'categories' => [
            'config' => [
                'type' => 'category'
            ]
        ]
    ],
];
