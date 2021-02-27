<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr',
        'label' => 'label',
        'label_alt' => 'org',
        'label_alt_force' => 1,
        'default_sortby' => 'ORDER BY label, org ASC',
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
        'searchFields' => 'label,org',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('academy') . 'Resources/Public/Icons/tx_academy_domain_model_hcards_adr.svg'
    ),
    'interface' => array(
        'showRecordFieldList' => '
            hidden, 
            type, 
            label, 
            org, 
            adrcomponents, 
            sys_language_uid, 
            l10n_parent, 
            l10n_diffsource, 
            sorting
        ',
    ),
    'types' => array(
        '1' => array(
            'showitem' => '
                hidden,
                type,
                label,
                org,
                adrcomponents,
                sys_language_uid,
                l10n_parent,
                l10n_diffsource,
                sorting
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
                'foreign_table' => 'tx_academy_domain_model_hcards_adr',
                'foreign_table_where' => 'AND tx_academy_domain_model_hcards_adr.pid=###CURRENT_PID### AND tx_academy_domain_model_hcards_adr.sys_language_uid IN (-1,0)',
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
                'max' => '255',
            )
        ),
        'sorting' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
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
        'label' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.label',
            'config' => array(
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim'
            ),
        ),
        'org' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.org',
            'config' => array(
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
                'eval' => 'trim'
            ),
        ),
        'type' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.1',
                        '1'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.2',
                        '2'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.3',
                        '3'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.4',
                        '4'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.5',
                        '5'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.6',
                        '6'
                    ),
                    array(
                        'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.type.I.7',
                        '7'
                    ),
                ),
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required'
            ),
        ),
        'adrcomponents' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:academy/Resources/Private/Language/locallang_db.xml:tx_academy_domain_model_hcards_adr.adrcomponents',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_academy_domain_model_hcards_adrcomponents',
                'foreign_field' => 'parent',
                'foreign_sortby' => 'sorting',
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
                    'showAllLocalizationLink' => 1,
                ),
            ),
        ),
    ),
);
