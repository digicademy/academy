<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations',
        'label' => 'type',
        // this call is for list view
        'label_userFunc' => 'Digicademy\Academy\Utility\Backend\LabelUtility->relationsLabel',
        // and this call for the IRRE table headers (necessary from 7.6+)
        'formattedLabel_userFunc' => 'Digicademy\Academy\Utility\Backend\LabelUtility->relationsLabel',
        'default_sortby' => 'ORDER BY type',
        'type' => 'type',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => 0,
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
        'iconfile' => ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_relations.svg'
    ],
    'interface' => [
        'showRecordFieldList' => '
            sys_language_uid, 
            l10n_parent, 
            l10n_diffsource, 
            hidden, 
            type, 
            persistent_identifier,
            role, 
            role_freetext,
            date_range,
            project, 
            project_symmetric,
            event,
            event_symmetric, 
            person, 
            person_symmetric,
            medium,
            medium_symmetric, 
            news,
            news_symmetric, 
            unit, 
            unit_symmetric,
            product, 
            product_symmetric,
            service, 
            service_symmetric,
            publication, 
            publication_symmetric,
            hcard, 
            freetext, 
            sorting,
            sorting_symmetric,
        ',
    ],
    'types' => [

        '0' => ['showitem' => 'type'],

        '10' => ['showitem' => 'type,person,hcard,date_range'],
        '11' => ['showitem' => 'type,role,role_freetext,person,project,date_range,freetext'],
        '12' => ['showitem' => 'type,role,role_freetext,person,unit,date_range,freetext'],
        '13' => ['showitem' => 'type,role,role_freetext,person,event,date_range,freetext'],
        '14' => ['showitem' => 'type,role,role_freetext,person,news,date_range,freetext'],
        '15' => ['showitem' => 'type,role,role_freetext,person,medium,date_range,freetext'],
        '16' => ['showitem' => 'type,role,role_freetext,person,person_symmetric,date_range,freetext'],

        '20' => ['showitem' => 'type,role,role_freetext,project,hcard,date_range'],
        '21' => ['showitem' => 'type,role,role_freetext,project,unit,date_range,freetext'],
        '22' => ['showitem' => 'type,role,role_freetext,project,news,date_range,freetext'],
        '23' => ['showitem' => 'type,role,role_freetext,project,event,date_range,freetext'],
        '24' => ['showitem' => 'type,role,role_freetext,project,medium,date_range,freetext'],
        '25' => ['showitem' => 'type,role_freetext,project,freetext,date_range'],
        '26' => ['showitem' => 'type,role,role_freetext,project,project_symmetric,date_range,freetext'],

        '30' => ['showitem' => 'type,unit,hcard,date_range'],
        '31' => ['showitem' => 'type,role,role_freetext,unit,freetext,date_range'],
        '32' => ['showitem' => 'type,role,unit,unit_symmetric,date_range,freetext'],
        '33' => ['showitem' => 'type,role,unit,news,date_range,freetext'],
        '34' => ['showitem' => 'type,role,unit,event,date_range,freetext'],
        '35' => ['showitem' => 'type,role,unit,medium,date_range,freetext'],

        '40' => ['showitem' => 'type,news,hcard,date_range'],
        '41' => ['showitem' => 'type,news,event,date_range,freetext'],
        '42' => ['showitem' => 'type,news,medium,date_range,freetext'],
        '43' => ['showitem' => 'type,news,news_symmetric,date_range,freetext'],

        '50' => ['showitem' => 'type,event,hcard,date_range'],
        '51' => ['showitem' => 'type,event,medium,date_range,freetext'],
        '52' => ['showitem' => 'type,event,event_symmetric,date_range,freetext'],

        '60' => ['showitem' => 'type,medium,medium_symmetric,date_range,freetext'],

        '70' => ['showitem' => 'type,role,role_freetext,person,product,date_range,freetext'],
        '71' => ['showitem' => 'type,role,role_freetext,project,product,date_range,freetext'],
        '72' => ['showitem' => 'type,role,role_freetext,unit,product,date_range,freetext'],
        '73' => ['showitem' => 'type,role,role_freetext,medium,product,date_range,freetext'],
        '74' => ['showitem' => 'type,role,role_freetext,news,product,date_range,freetext'],
        '75' => ['showitem' => 'type,role,role_freetext,event,product,date_range,freetext'],
        '76' => ['showitem' => 'type,role,role_freetext,service,product,date_range,freetext'],
        '77' => ['showitem' => 'type,role,role_freetext,publication,product,date_range,freetext'],
        '78' => ['showitem' => 'type,role,role_freetext,product,product_symmetric,date_range,freetext'],

        '80' => ['showitem' => 'type,role,role_freetext,person,service,date_range,freetext'],
        '81' => ['showitem' => 'type,role,role_freetext,project,service,date_range,freetext'],
        '82' => ['showitem' => 'type,role,role_freetext,unit,service,date_range,freetext'],
        '83' => ['showitem' => 'type,role,role_freetext,medium,service,date_range,freetext'],
        '84' => ['showitem' => 'type,role,role_freetext,news,service,date_range,freetext'],
        '85' => ['showitem' => 'type,role,role_freetext,event,service,date_range,freetext'],
        '86' => ['showitem' => 'type,role,role_freetext,publication,service,date_range,freetext'],
        '87' => ['showitem' => 'type,role,role_freetext,service,service_symmetric,date_range,freetext'],

        '90' => ['showitem' => 'type,role,role_freetext,person,publication,date_range,freetext'],
        '91' => ['showitem' => 'type,role,role_freetext,project,publication,date_range,freetext'],
        '92' => ['showitem' => 'type,role,role_freetext,unit,publication,date_range,freetext'],
        '93' => ['showitem' => 'type,role,role_freetext,medium,publication,date_range,freetext'],
        '94' => ['showitem' => 'type,role,role_freetext,news,publication,date_range,freetext'],
        '95' => ['showitem' => 'type,role,role_freetext,event,publication,date_range,freetext'],
        '96' => ['showitem' => 'type,role,role_freetext,publication,publication_symmetric,date_range,freetext'],
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
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l10n_parent',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_relations',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
                'default' => 0,
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
        'persistent_identifier' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting_symmetric' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'eval' => 'required',
            ],
        ],
        'role' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.role',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_academy_domain_model_roles',
                'foreign_table_where' => 'AND tx_academy_domain_model_roles.sys_language_uid IN (-1,###REC_FIELD_sys_language_uid###) ORDER BY tx_academy_domain_model_roles.title',
                'items' => [
                    ['', 0],
                ],
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'role_freetext' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.role_freetext',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ],
        ],
        'date_range' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.date_range',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
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
                ],
            ],
        ],
        'project' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.project',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_projects',
                'foreign_table' => 'tx_academy_domain_model_projects',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'project_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.project',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_projects',
                'foreign_table' => 'tx_academy_domain_model_projects',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'event' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.event',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'event_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.event',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'person' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.person',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_persons',
                'foreign_table' => 'tx_academy_domain_model_persons',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'person_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.person',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_persons',
                'foreign_table' => 'tx_academy_domain_model_persons',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'medium' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.medium',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_media',
                'foreign_table' => 'tx_academy_domain_model_media',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'medium_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.medium',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_media',
                'foreign_table' => 'tx_academy_domain_model_media',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'news' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.news',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'news_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.news',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'unit' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.unit',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_units',
                'foreign_table' => 'tx_academy_domain_model_units',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'unit_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.unit',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_units',
                'foreign_table' => 'tx_academy_domain_model_units',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'product' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.product',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_products',
                'foreign_table' => 'tx_academy_domain_model_products',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'product_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.product_symmetric',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_products',
                'foreign_table' => 'tx_academy_domain_model_products',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'service' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.service',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_services',
                'foreign_table' => 'tx_academy_domain_model_services',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'service_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.service_symmetric',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_services',
                'foreign_table' => 'tx_academy_domain_model_services',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'publication' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.publication',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_publications',
                'foreign_table' => 'tx_academy_domain_model_publications',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'publication_symmetric' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.publication_symmetric',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_publications',
                'foreign_table' => 'tx_academy_domain_model_publications',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'hcard' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.hcard',
//            'l10n_mode' => 'exclude',
//            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_hcards',
                'foreign_table' => 'tx_academy_domain_model_hcards',
                'maxitems' => 1,
                'size' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'freetext' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.freetext',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 10,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
    ],
];
