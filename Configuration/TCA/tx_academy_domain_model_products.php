<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products',
        'label' => 'title',
        'default_sortby' => 'ORDER BY title ASC',
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
        'searchFields' => 'persistent_identifier,identifier,title,acronym,description',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_products.svg'
    ),
    'interface' => array(
        'showRecordFieldList' => '
            sys_language_uid, 
            l10n_parent, 
            l10n_diffsource, 
            hidden, 
            persistent_identifier, 
            identifier,
            title, 
            acronym,
            version,
            sorting, 
            page, 
            image,
            description, 
            relations
        ',
    ),
    'types' => array(
        '1' => array(
            'showitem' => '
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.div1,
                hidden,
                persistent_identifier,
                identifier,
                title,
                acronym,
                version,
                sorting,
                date_range,
                page,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.div2,
                image,
                description,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.div3,
                relations,
            --div--;LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.div5,
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
                'foreign_table' => 'tx_academy_domain_model_products',
                'foreign_table_where' => 'AND tx_academy_domain_model_products.pid=###CURRENT_PID### AND tx_academy_domain_model_products.sys_language_uid IN (-1,0)',
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
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_products.persistent_identifier',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'readOnly' => 1
            ),
        ),
        'identifier' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.identifier',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'title' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'acronym' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.acronym',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'version' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.version',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'sorting' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.sorting',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'date_range' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xlf:tx_academy_domain_model_products.date_range',
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
        'page' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.page',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'eval' => 'int',
                'default' => 0,
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                    ),
                ),
            ),
        ),
        'image' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.image',
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
        'description' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.description',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
            ),
        ),
        'relations' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_products.relations',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_academy_domain_model_relations',
                'foreign_field' => 'product',
                'foreign_sortby' => 'sorting',
                'symmetric_field' => 'product_symmetric',
                'symmetric_sortby' => 'sorting_symmetric',
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
                'overrideChildTca' => [
                    'columns' => [
                        'type' => [
                            'config' => [
                                'items' => [
                                    70 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.70',
                                        '70'
                                    ],
                                    71 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.71',
                                        '71'
                                    ],
                                    72 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.72',
                                        '72'
                                    ],
                                    73 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.73',
                                        '73'
                                    ],
                                    74 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.74',
                                        '74'
                                    ],
                                    75 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.75',
                                        '75'
                                    ],
                                    76 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.76',
                                        '76'
                                    ],
                                    77 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.77',
                                        '77'
                                    ],
                                    78 => [
                                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_relations.type.I.78',
                                        '78'
                                    ],
                                ]
                            ]
                        ]
                    ],
                ],
            ),
        ),
    ),
);
