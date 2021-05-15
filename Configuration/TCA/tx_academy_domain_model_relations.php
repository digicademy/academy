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
        '32' => array('showitem' => 'type,role,role_freetext,unit,unit_symmetric,date_range'),
        '40' => array('showitem' => 'type,news,hcard,date_range'),
        '41' => array('showitem' => 'type,news,event,date_range'),
        '42' => array('showitem' => 'type,news,medium,date_range'),
        '43' => array('showitem' => 'type,news,news_symmetric,date_range'),
        '50' => array('showitem' => 'type,event,hcard,date_range'),
        '51' => array('showitem' => 'type,event,medium,date_range'),
        '52' => array('showitem' => 'type,event,event_symmetric,date_range'),
        '60' => array('showitem' => 'type,medium,medium_symmetric,date_range'),
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
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_roles',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_projects',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_projects',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_news_domain_model_news',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_news_domain_model_news',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_persons',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_persons',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_media',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_media',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_news_domain_model_news',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_news_domain_model_news',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_units',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_units',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=550,width=780,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'title' => 'Create new record',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_academy_domain_model_hcards',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                    'edit' => array(
                        'type' => 'popup',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'title' => 'Edit',
                        'icon' => 'actions-open',
                    ),
                ),
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
