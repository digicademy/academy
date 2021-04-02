<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$tca = array(
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
    'news_relations' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_news.news_relations',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tx_academy_domain_model_relations',
            'foreign_field' => 'news',
            'foreign_sortby' => 'sorting',
            'foreign_label' => 'news',
            'maxitems' => 9999,
            'behaviour' => array(
                'disableMovingChildrenWithParent' => 1,
            ),
            'appearance' => array(
                'collapseAll' => 1,
                'expandSingle' => 1,
                'levelLinksPosition' => 'bottom',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ),
        ),
    ),
    'event_relations' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_news.event_relations',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tx_academy_domain_model_relations',
            'foreign_field' => 'event',
            'foreign_sortby' => 'sorting',
            'foreign_label' => 'news',
            'maxitems' => 9999,
            'behaviour' => array(
                'disableMovingChildrenWithParent' => 1,
            ),
            'appearance' => array(
                'collapseAll' => 1,
                'expandSingle' => 1,
                'levelLinksPosition' => 'bottom',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ),
        ),
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $tca);

$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['showitem'] = $GLOBALS['TCA']['tx_news_domain_model_news']['types']['0']['showitem'];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'news_relations',
    '0',
    ''
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'event_relations',
    '3',
    ''
);
