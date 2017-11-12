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
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_relations.svg'
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
            project, 
            project_symmetric,
            event, 
            person, 
            person_symmetric,
            medium, 
            news, 
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
        '10' => array('showitem' => 'type,person,hcard'),
        '11' => array('showitem' => 'type,role,role_freetext,person,project'),
        '12' => array('showitem' => 'type,role,role_freetext,person,unit'),
        '13' => array('showitem' => 'type,role,role_freetext,person,event'),
        '14' => array('showitem' => 'type,role,role_freetext,person,news'),
        '15' => array('showitem' => 'type,role,role_freetext,person,medium'),
        '16' => array('showitem' => 'type,role,role_freetext,person,person_symmetric'),
        '20' => array('showitem' => 'type,role,role_freetext,project,hcard'),
        '21' => array('showitem' => 'type,role,role_freetext,project,unit'),
        '22' => array('showitem' => 'type,role,role_freetext,project,news'),
        '23' => array('showitem' => 'type,role,role_freetext,project,event'),
        '24' => array('showitem' => 'type,role,role_freetext,project,medium'),
        '25' => array('showitem' => 'type,role_freetext,project,freetext'),
        '26' => array('showitem' => 'type,role,role_freetext,project,project_symmetric'),
        '30' => array('showitem' => 'type,unit,hcard'),
        '31' => array('showitem' => 'type,role,role_freetext,unit,freetext'),
        '32' => array('showitem' => 'type,role,role_freetext,unit,unit_symmetric'),
        '40' => array('showitem' => 'type,news,hcard'),
        '41' => array('showitem' => 'type,news,event'),
        '42' => array('showitem' => 'type,news,medium'),
        '50' => array('showitem' => 'type,event,hcard'),
        '51' => array('showitem' => 'type,event,medium'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
                ),
            ),
        ),
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
                'items' => array(
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.10',
                        '10'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.11',
                        '11'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.12',
                        '12'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.13',
                        '13'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.14',
                        '14'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.15',
                        '15'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.16',
                        '16'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.20',
                        '20'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.21',
                        '21'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.22',
                        '22'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.23',
                        '23'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.24',
                        '24'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.25',
                        '25'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.26',
                        '26'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.30',
                        '30'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.31',
                        '31'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.32',
                        '32'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.40',
                        '40'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.41',
                        '41'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.42',
                        '42'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.50',
                        '50'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.51',
                        '51'
                    ),
                ),
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'eval' => 'required',
                // this function does not work in TYPO3 7 since the IRRE parent field information is gone in the child
                // 'itemsProcFunc' => 'Digicademy\Academy\Utility\Backend\ItemUtility->filterRelationTypeItems',
            ),
        ),
        'role' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.role',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_academy_domain_model_roles',
                'foreign_table_where' => 'AND tx_academy_domain_model_roles.pid IN (###PAGE_TSCONFIG_IDLIST###) ORDER BY tx_academy_domain_model_roles.title',
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
                'eval' => 'trim'
            ),
        ),
    ),
);
