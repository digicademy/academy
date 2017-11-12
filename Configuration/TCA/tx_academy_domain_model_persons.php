<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons',
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
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'persistent_identifier,given_name,honorific_prefix,additional_name,family_name,honorific_suffix',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_persons.svg'
    ),
    'interface' => array(
        'showRecordFieldList' => '
            sys_language_uid, 
            l10n_parent, 
            l10n_diffsource, 
            hidden, 
            persistent_identifier,
            gender, 
            honorific_prefix, 
            given_name, 
            additional_name, 
            family_name, 
            honorific_suffix, 
            sorting, 
            date_range,
            image, 
            expertise, 
            cv, 
            awards, 
            publications, 
            relations,
            statements
        ',
    ),
    'types' => array(
        '1' => array(
            'showitem' => '
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div1,
                    hidden,
                    persistent_identifier,
                    gender,
                    honorific_prefix,
                    given_name,
                    additional_name,
                    family_name,
                    honorific_suffix,
                    sorting,
                    expertise,
                    date_range,
                    image,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div2,
                    relations,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div3,
                    cv;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_academy/],
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div4,
                    awards;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_academy/],
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div5,
                    publications;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_academy/],
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div6,
                    statements,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.div7,
                    categories,
                --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:general.language,
                    sys_language_uid,
                    l10n_parent,
                    l10n_diffsource,
        '
        ),
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
                'foreign_table' => 'tx_academy_domain_model_persons',
                'foreign_table_where' => 'AND tx_academy_domain_model_persons.pid=###CURRENT_PID### AND tx_academy_domain_model_persons.sys_language_uid IN (-1,0)',
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
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.persistent_identifier',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => 1
            ),
        ),
        'gender' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.gender',
            'config' => array(
                'type' => 'radio',
                'items' => array(
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.gender.type.I.0',
                        0
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.gender.type.I.1',
                        1
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.gender.type.I.2',
                        2
                    ),
                ),
            ),
        ),
        'given_name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.given_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'additional_name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.additional_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'family_name' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.family_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'honorific_prefix' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.honorific_prefix',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'honorific_suffix' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.honorific_suffix',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'sorting' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.sorting',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'expertise' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.expertise',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'date_range' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_persons.date_range',
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
        'image' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', array(
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ),
                'minitems' => 0,
                'maxitems' => 1,
                'foreign_types' => array(
                    '0' => array(
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ),
                )
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
        ),
        'page' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.page',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                    ),
                ),
            ),
        ),
        'cv' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.cv',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ),
        ),
        'awards' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.awards',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ),
        ),
        'publications' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.publications',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ),
        ),
        'relations' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.relations',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_academy_domain_model_relations',
                'foreign_field' => 'person',
                'foreign_sortby' => 'sorting',
                'symmetric_field' => 'person_symmetric',
                'symmetric_sortby' => 'sorting_symmetric',
                'maxitems' => 9999,
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
        'statements' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_persons.statements',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_vocabulary_domain_model_statements',
                'foreign_table' => 'tx_vocabulary_domain_model_statements',
                'MM' => 'tx_vocabulary_statements_records_mm',
                'MM_match_fields' => array(
                    // ident field as workaround for possible bug in line 544 of \TYPO3\CMS\Core\Database\RelationHandler
                    // tablenames must be name of foreign table (statements) whereas ident is needed to distinguish between records from different tables
                    // otherwise relations are not kept/displayed correctly in this field
                    'ident' => 'tx_academy_domain_model_persons',
                    'tablenames' => 'tx_vocabulary_domain_model_statements',
                    'fieldname' => 'statements',
                ),
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999,
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'pidList' => '###PLACEHOLDER###',
                        ),
                    ),
                    'add' => Array(
                        'type' => 'popup',
                        'title' => 'Create new',
                        'icon' => 'actions-add',
                        'params' => array(
                            'table' => 'tx_vocabulary_domain_model_statements',
                            'pid' => '###PAGE_TSCONFIG_ID###',
                            'setValue' => 'prepend'
                        ),
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                    ),
                    'edit' => Array(
                        'type' => 'popup',
                        'title' => 'LLL:EXT:vocabulary/Resources/Private/Language/locallang_db.xlf:wizard_edit',
                        'icon' => 'actions-open',
                        'JSopenParams' => 'height=550,width=900,status=0,menubar=0,scrollbars=1',
                        'popup_onlyOpenIfSelected' => 1,
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
