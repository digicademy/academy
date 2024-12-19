<?php

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media',
        'label' => 'title',
        'default_sortby' => 'ORDER BY title ASC',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'type' => 'type',
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
        'searchFields' => 'title,description',
        'iconfile' => ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_media.svg'
    ],
    'interface' => [
        'showRecordFieldList' => '
            sys_language_uid,
            l10n_parent,
            l10n_diffsource,
            hidden,
            crdate,
            persistent_identifier,
            type,
            title,
            description,
            image,
            files,
            collections,
            relations
        ',
    ],
    'types' => [
        '1' => [
            'showitem' => '
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.div1,
                hidden,
                persistent_identifier,
                type,
                title,
                description;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_academy/],
                date_range,
                slug,
                image,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.div2,
                files,
                collections,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.div3,
                relations,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.div5,
                categories,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:general.language,
                sys_language_uid,
                l10n_parent,
                l10n_diffsource
        '
        ],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_academy_domain_model_media',
                'foreign_table_where' => 'AND tx_academy_domain_model_media.pid=###CURRENT_PID### AND tx_academy_domain_model_media.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
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
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
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
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
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
        'crdate' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'persistent_identifier' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_media.persistent_identifier',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => 1
            ],
        ],
        'type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type.I.0',
                        '0'
                    ],
                    [
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type.I.10',
                        '10'
                    ],
                    [
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type.I.20',
                        '20'
                    ],
                    [
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type.I.30',
                        '30'
                    ],
                    [
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.type.I.40',
                        '40'
                    ],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.title',
            'config' => [
                'type' => 'input',
                'size' => 60,
                'eval' => 'trim,required'
            ],
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
            ],
        ],
        'date_range' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_media.date_range',
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
        'slug' => [
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.slug',
            'exclude' => 1,
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['title'],
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
        'image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig('image', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                'minitems' => 0,
                'maxitems' => 1,
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    File::FILETYPE_IMAGE => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                ]
            ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
        ],
        'files' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.files',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig('files', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
                ]
            ])
        ],
        'collections' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.collections',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'localizeReferencesAtParentLocalization' => true,
                'allowed' => 'sys_file_collection',
                'foreign_table' => 'sys_file_collection',
                'maxitems' => 999,
                'minitems' => 0,
                'eval' => 'int',
                'default' => 0,
                'size' => 5,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'pidList' => '###PLACEHOLDER###',
                        ],
                    ],
                    'add' => [
                        'type' => 'popup',
                        'title' => 'Create new',
                        'icon' => 'actions-add',
                        'params' => [
                            'table' => 'sys_file_collection',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ],
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_add',
                        ],
                    ],
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit record',
                        'icon' => 'actions-open',
                        'JSopenParams' => 'height=550,width=900,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                    ],
                ],
            ],
        ],
        'relations' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_media.relations',
            'l10n_display' => 'defaultAsReadonly',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_academy_domain_model_relations',
                'foreign_field' => 'medium',
                'foreign_sortby' => 'sorting',
                'symmetric_field' => 'medium_symmetric',
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
                                    15 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.15',
                                        '15'
                                    ],
                                    24 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.24',
                                        '24'
                                    ],
                                    35 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.35',
                                        '35'
                                    ],
                                    42 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.42',
                                        '42'
                                    ],
                                    51 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.51',
                                        '51'
                                    ],
                                    60 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.60',
                                        '60'
                                    ],
                                    73 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.73',
                                        '73'
                                    ],
                                    83 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.83',
                                        '83'
                                    ],
                                    93 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.93',
                                        '93'
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
