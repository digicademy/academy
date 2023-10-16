<?php
if (!defined('TYPO3')) {
    die('Access denied!');
}

// PLUGIN CONFIGURATION

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Projects',
    array(
        \Digicademy\Academy\Controller\ProjectsController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\ProjectsController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Units',
    array(
        \Digicademy\Academy\Controller\UnitsController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\UnitsController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Persons',
    array(
        \Digicademy\Academy\Controller\PersonsController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\PersonsController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Media',
    array(
        \Digicademy\Academy\Controller\MediaController::class => 'list, listBySelection, listByCategories, listByRoles, listByGroups, listByTypes, listByRecent, show',
    ),
    array(
        \Digicademy\Academy\Controller\MediaController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Mediaviewer',
    array(
        \Digicademy\Academy\Controller\MediaController::class => 'viewer',
    ),
    array(
        \Digicademy\Academy\Controller\MediaController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Search',
    array(
        \Digicademy\Academy\Controller\SearchController::class => 'searchForm, searchAll, searchSingle',
    ),
    array(
        \Digicademy\Academy\Controller\SearchController::class => 'searchForm, searchAll, searchSingle',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Hcards',
    array(
        \Digicademy\Academy\Controller\HcardsController::class => 'list, listBySelection, show',
    ),
    array(
        \Digicademy\Academy\Controller\MediaController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Products',
    array(
        \Digicademy\Academy\Controller\ProductsController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\ProductsController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Services',
    array(
        \Digicademy\Academy\Controller\ServicesController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\ServicesController::class => '',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Academy',
    'Publications',
    array(
        \Digicademy\Academy\Controller\PublicationsController::class => 'list, listBySelection, listByCategories, listByRoles, show',
    ),
    array(
        \Digicademy\Academy\Controller\PublicationsController::class => '',
    )
);

// BACKEND RELATED

if (TYPO3_MODE == 'BE') {

    // hook for generating XML conformat UUIDs on new and update szenarios
    // also patches an IRRE bug with localization handling @see: https://forge.typo3.org/issues/80944
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'Digicademy\Academy\Hooks\Backend\DataHandler';

    // XClasses to patch core bug with IRRE localization handing (@see Digicademy\Academy\Hooks\Backend\DataHandler 89ff)
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Backend\Form\FormDataProvider\TcaInline::class] = [
       'className' => Digicademy\Academy\Xclass\Backend\Form\FormDataProvider\AcademyTcaInline::class
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\DataHandling\DataHandler::class] = [
       'className' => Digicademy\Academy\Xclass\Core\DataHandling\AcademyDataHandler::class
    ];

}
