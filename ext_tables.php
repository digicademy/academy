<?php
if (!defined ('TYPO3_MODE')){
    die ('Access denied.');
}

// TYPOSCRIPT

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('academy', 'Configuration/TypoScript', 'Academy');

// PLUGIN DEFINITIONS

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Projects',
    'Academy: Projects'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Units',
    'Academy: Units'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Persons',
    'Academy: Persons'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Media',
    'Academy: Media'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Mediaviewer',
    'Academy: Mediaviewer'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Search',
    'Academy: Search'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'academy',
    'Hcards',
    'Academy: Hcards'
);

// TABLES

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_projects', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_projects.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_projects');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_units', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_units.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_units');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_persons', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_persons.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_persons');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards_adr', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards_adr.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards_adr');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards_adrcomponents', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards_adrcomponents.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards_adrcomponents');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards_tel', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards_tel.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards_tel');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards_email', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards_email.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards_email');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_hcards_url', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_hcards_url.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_hcards_url');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_relations', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_relations.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_relations');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_roles', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_roles.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_roles');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_academy_domain_model_media', 'EXT:academy/Resources/Private/Language/locallang_csh_tx_academy_domain_model_media.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_academy_domain_model_media');

// MAKE CATEGORIZABLE

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'academy',
    'tx_academy_domain_model_projects'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'academy',
    'tx_academy_domain_model_persons'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'academy',
    'tx_academy_domain_model_units'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'academy',
    'tx_academy_domain_model_media'
);
