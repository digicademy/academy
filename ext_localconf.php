<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied!');
}

// PLUGIN CONFIGURATION

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Projects',
    array(
        'Projects' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Projects' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Units',
    array(
        'Units' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Units' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Persons',
    array(
        'Persons' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Persons' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Media',
    array(
        'Media' => 'list, listBySelection, listByCategories, listByRoles, listByGroups, listByTypes, listByRecent, show',
    ),
    array(
        'Media' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Mediaviewer',
    array(
        'Media' => 'viewer',
    ),
    array(
        'Media' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Search',
    array(
        'Search' => 'searchForm, searchAll, searchSingle',
    ),
    array(
        'Search' => 'searchForm, searchAll, searchSingle',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Hcards',
    array(
        'Hcards' => 'list, listBySelection, show',
    ),
    array(
        'Media' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Products',
    array(
        'Products' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Products' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Services',
    array(
        'Services' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Services' => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Digicademy.' . 'academy',
    'Publications',
    array(
        'Publications' => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        'Publications' => '',
    )
);

// BACKEND RELATED

if (TYPO3_MODE == 'BE') {
    // hook for generating XML conformat UUIDs on new and update szenarios
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'Digicademy\Academy\Hooks\Backend\DataHandler';
}
