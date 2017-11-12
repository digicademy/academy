<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$tca = array(
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'news_relations,event_relations',
    '',
    ''
);
