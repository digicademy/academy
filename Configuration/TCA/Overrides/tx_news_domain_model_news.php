<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$tca = [
    'type' => [
        'exclude' => false,
        'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.doktype_formlabel',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.type.I.0', 0, 'ext-news-type-default'],
                ['LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.type.I.1', 1, 'ext-news-type-internal'],
                ['LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.type.I.2', 2, 'ext-news-type-external'],
                ['LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.type.I.3', 3, 'ext-news-type-default'],
            ],
            'fieldWizard' => [
                'selectIcons' => [
                    'disabled' => false,
                ],
            ],
            'size' => 1,
            'maxitems' => 1,
        ]
    ],
    'news_relations' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_news.news_relations',
        'l10n_display' => 'defaultAsReadonly',
        'l10n_mode' => 'exclude',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_academy_domain_model_relations',
            'foreign_field' => 'news',
            'foreign_sortby' => 'sorting',
            'foreign_label' => 'news',
            'symmetric_field' => 'news_symmetric',
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
                                14 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.14',
                                    '14'
                                ],
                                22 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.22',
                                    '22'
                                ],
                                33 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.33',
                                    '33'
                                ],
                                40 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.40',
                                    '40'
                                ],
                                41 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.41',
                                    '41'
                                ],
                                42 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.42',
                                    '42'
                                ],
                                43 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.43',
                                    '43'
                                ],
                                74 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.74',
                                    '74'
                                ],
                                84 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.84',
                                    '84'
                                ],
                                94 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.94',
                                    '94'
                                ],
                            ]
                        ]
                    ]
                ],
            ],
        ],
    ],
    'event_relations' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_news.event_relations',
        'l10n_display' => 'defaultAsReadonly',
        'l10n_mode' => 'exclude',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_academy_domain_model_relations',
            'foreign_field' => 'event',
            'foreign_sortby' => 'sorting',
            'foreign_label' => 'news',
            'symmetric_field' => 'event_symmetric',
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
                                13 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.13',
                                    '13'
                                ],
                                23 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.23',
                                    '23'
                                ],
                                41 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.41',
                                    '41'
                                ],
                                34 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.34',
                                    '34'
                                ],
                                50 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.50',
                                    '50'
                                ],
                                51 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.51',
                                    '51'
                                ],
                                52 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.52',
                                    '52'
                                ],
                                75 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.75',
                                    '75'
                                ],
                                85 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.85',
                                    '85'
                                ],
                                95 => [
                                    'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.95',
                                    '95'
                                ],
                            ]
                        ]
                    ]
                ],
            ],
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $tca);

$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['showitem'] = $GLOBALS['TCA']['tx_news_domain_model_news']['types']['0']['showitem'];

ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'news_relations',
    '0',
    ''
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'event_relations',
    '3',
    ''
);
