<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl' => array(
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
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_relations.svg'
    ),
    'interface' => array(
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
    ),
    'types' => array(

        '0' => array('showitem' => 'type'),

        '10' => array('showitem' => 'type,person,hcard,date_range'),
        '11' => array('showitem' => 'type,role,role_freetext,person,project,date_range'),
        '12' => array('showitem' => 'type,role,role_freetext,person,unit,date_range'),
        '13' => array('showitem' => 'type,role,role_freetext,person,event,date_range'),
        '14' => array('showitem' => 'type,role,role_freetext,person,news,date_range'),
        '15' => array('showitem' => 'type,role,role_freetext,person,medium,date_range'),
        '16' => array('showitem' => 'type,role,role_freetext,person,person_symmetric,date_range'),

        '20' => array('showitem' => 'type,role,role_freetext,project,hcard,date_range'),
        '21' => array('showitem' => 'type,role,role_freetext,project,unit,date_range'),
        '22' => array('showitem' => 'type,role,role_freetext,project,news,date_range'),
        '23' => array('showitem' => 'type,role,role_freetext,project,event,date_range'),
        '24' => array('showitem' => 'type,role,role_freetext,project,medium,date_range'),
        '25' => array('showitem' => 'type,role_freetext,project,freetext,date_range'),
        '26' => array('showitem' => 'type,role,role_freetext,project,project_symmetric,date_range'),

        '30' => array('showitem' => 'type,unit,hcard,date_range'),
        '31' => array('showitem' => 'type,role,role_freetext,unit,freetext,date_range'),
        '32' => array('showitem' => 'type,role,unit,unit_symmetric,date_range'),
        '33' => array('showitem' => 'type,role,unit,news,date_range'),
        '34' => array('showitem' => 'type,role,unit,event,date_range'),
        '35' => array('showitem' => 'type,role,unit,medium,date_range'),

        '40' => array('showitem' => 'type,news,hcard,date_range'),
        '41' => array('showitem' => 'type,news,event,date_range'),
        '42' => array('showitem' => 'type,news,medium,date_range'),
        '43' => array('showitem' => 'type,news,news_symmetric,date_range'),

        '50' => array('showitem' => 'type,event,hcard,date_range'),
        '51' => array('showitem' => 'type,event,medium,date_range'),
        '52' => array('showitem' => 'type,event,event_symmetric,date_range'),

        '60' => array('showitem' => 'type,medium,medium_symmetric,date_range'),

        '70' => array('showitem' => 'type,role,role_freetext,person,product,date_range'),
        '71' => array('showitem' => 'type,role,role_freetext,project,product,date_range'),
        '72' => array('showitem' => 'type,role,role_freetext,unit,product,date_range'),
        '73' => array('showitem' => 'type,role,role_freetext,medium,product,date_range'),
        '74' => array('showitem' => 'type,role,role_freetext,news,product,date_range'),
        '75' => array('showitem' => 'type,role,role_freetext,event,product,date_range'),
        '76' => array('showitem' => 'type,role,role_freetext,service,product,date_range'),
        '77' => array('showitem' => 'type,role,role_freetext,publication,product,date_range'),
        '78' => array('showitem' => 'type,role,role_freetext,product,product_symmetric,date_range'),

        '80' => array('showitem' => 'type,role,role_freetext,person,service,date_range'),
        '81' => array('showitem' => 'type,role,role_freetext,project,service,date_range'),
        '82' => array('showitem' => 'type,role,role_freetext,unit,service,date_range'),
        '83' => array('showitem' => 'type,role,role_freetext,medium,service,date_range'),
        '84' => array('showitem' => 'type,role,role_freetext,news,service,date_range'),
        '85' => array('showitem' => 'type,role,role_freetext,event,service,date_range'),
        '86' => array('showitem' => 'type,role,role_freetext,publication,service,date_range'),
        '87' => array('showitem' => 'type,role,role_freetext,service,service_symmetric,date_range'),

        '90' => array('showitem' => 'type,role,role_freetext,person,publication,date_range'),
        '91' => array('showitem' => 'type,role,role_freetext,project,publication,date_range'),
        '92' => array('showitem' => 'type,role,role_freetext,unit,publication,date_range'),
        '93' => array('showitem' => 'type,role,role_freetext,medium,publication,date_range'),
        '94' => array('showitem' => 'type,role,role_freetext,news,publication,date_range'),
        '95' => array('showitem' => 'type,role,role_freetext,event,publication,date_range'),
        '96' => array('showitem' => 'type,role,role_freetext,publication,publication_symmetric,date_range'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
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
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_academy_domain_model_relations',
                'foreign_table_where' => 'AND tx_academy_domain_model_relations.pid=###CURRENT_PID### AND tx_academy_domain_model_relations.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'max' => '255',
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => '10',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
                'range' => array(
                    'upper' => mktime(0, 0, 0, 12, 31, date('Y') + 10),
                    'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
                ),
            ),
        ),
        'persistent_identifier' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        'sorting' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        'sorting_symmetric' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        'type' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'eval' => 'required',
            ),
        ),
        'role' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.role',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_academy_domain_model_roles',
                'foreign_table_where' => 'AND tx_academy_domain_model_roles.pid IN (###PAGE_TSCONFIG_IDLIST###)AND tx_academy_domain_model_roles.sys_language_uid IN (-1,###REC_FIELD_sys_language_uid###) ORDER BY tx_academy_domain_model_roles.title',
                'items' => array(
                    array('', 0),
                ),
                'minitems' => 0,
                'maxitems' => 1,
            ),
        ),
        'role_freetext' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.role_freetext',
            'config' => array(
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ),
        ),
        'date_range' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_relations.date_range',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_chftime_domain_model_dateranges',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'tablename',
                'minitems' => 0,
                'maxitems' => 1,
                'behaviour' => array(
                    'disableMovingChildrenWithParent' => 1,
                ),
                'appearance' => array(
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'newRecordLinkAddTitle' => 1,
                    'newRecordLinkPosition' => 'bottom',
                    'levelLinksPosition' => 'bottom',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ),
            ),
        ),
        'project' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.project',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_projects',
                'foreign_table' => 'tx_academy_domain_model_projects',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'project_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.project',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_projects',
                'foreign_table' => 'tx_academy_domain_model_projects',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'event' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.event',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'event_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.event',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'person' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.person',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_persons',
                'foreign_table' => 'tx_academy_domain_model_persons',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'person_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.person',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_persons',
                'foreign_table' => 'tx_academy_domain_model_persons',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'medium' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.medium',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_media',
                'foreign_table' => 'tx_academy_domain_model_media',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'medium_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.medium',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_media',
                'foreign_table' => 'tx_academy_domain_model_media',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'news' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.news',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'news_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.news',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_news_domain_model_news',
                'foreign_table' => 'tx_news_domain_model_news',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'unit' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.unit',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_units',
                'foreign_table' => 'tx_academy_domain_model_units',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'unit_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.unit',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_units',
                'foreign_table' => 'tx_academy_domain_model_units',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'product' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.product',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_products',
                'foreign_table' => 'tx_academy_domain_model_products',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'product_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.product_symmetric',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_products',
                'foreign_table' => 'tx_academy_domain_model_products',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'service' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.service',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_services',
                'foreign_table' => 'tx_academy_domain_model_services',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'service_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.service_symmetric',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_services',
                'foreign_table' => 'tx_academy_domain_model_services',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'publication' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.publication',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_publications',
                'foreign_table' => 'tx_academy_domain_model_publications',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'publication_symmetric' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.publication_symmetric',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_publications',
                'foreign_table' => 'tx_academy_domain_model_publications',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'hcard' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.hcard',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_academy_domain_model_hcards',
                'foreign_table' => 'tx_academy_domain_model_hcards',
                'maxitems' => 1,
                'size' => 1,
            ),
        ),
        'freetext' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.freetext',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 10,
                'eval' => 'trim',
                'default' => '',
            ),
        ),
    ),
);
