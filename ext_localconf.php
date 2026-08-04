<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Digicademy\Academy\Controller\SearchController;
use Digicademy\Academy\Controller\EntityController;
use Digicademy\Academy\Controller\PersonsController;
use Digicademy\Academy\Controller\ProjectsController;
use Digicademy\Academy\Controller\UnitsController;
use Digicademy\Academy\Controller\MediaController;
use Digicademy\Academy\Controller\HcardsController;
use Digicademy\Academy\Controller\ProductsController;
use Digicademy\Academy\Controller\ServicesController;
use Digicademy\Academy\Controller\PublicationsController;

defined('TYPO3') or die();

// PLUGIN CONFIGURATION

ExtensionUtility::configurePlugin(
    'Academy',
    'List',
    [
        EntityController::class => 'route',
        PersonsController::class => 'list,filter,show',
        ProjectsController::class => 'list,filter,show',
        UnitsController::class => 'list,filter,show',
        MediaController::class => 'list,filter,show',
        ProductsController::class => 'list,filter,show',
        ServicesController::class => 'list,filter,show',
        PublicationsController::class => 'list,filter,show',
        HcardsController::class => 'list,filter,show',
    ],
    [
        PersonsController::class => 'filter',
        ProjectsController::class => 'filter',
        UnitsController::class => 'filter',
        MediaController::class => 'filter',
        ProductsController::class => 'filter',
        ServicesController::class => 'filter',
        PublicationsController::class => 'filter',
        HcardsController::class => 'filter',
    ],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);

ExtensionUtility::configurePlugin(
    'Academy',
    'Show',
    [
        EntityController::class => 'route',
        PersonsController::class => 'show',
        ProjectsController::class => 'show',
        UnitsController::class => 'show',
        MediaController::class => 'show',
        ProductsController::class => 'show',
        ServicesController::class => 'show',
        PublicationsController::class => 'show',
        HcardsController::class => 'show',
    ],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);

ExtensionUtility::configurePlugin(
    'Academy',
    'Search',
    array(
        SearchController::class => 'searchForm,searchAll,searchSingle',
    ),
    array(
        SearchController::class => 'searchForm,searchAll,searchSingle',
    ),
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

// BACKEND RELATED

// hook for generating CERIF-XML compliant UUIDs for CRIS entities
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'Digicademy\Academy\Hooks\Backend\DataHandler';

// XClasses to patch core bug with IRRE localization handing (@see Digicademy\Academy\Hooks\Backend\DataHandler 89ff)
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Backend\Form\FormDataProvider\TcaInline::class] = [
   'className' => Digicademy\Academy\Xclass\Backend\Form\FormDataProvider\AcademyTcaInline::class
];
// XClasses to patch an IRRE bug with localization handling @see: https://forge.typo3.org/issues/80944
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\DataHandling\DataHandler::class] = [
   'className' => Digicademy\Academy\Xclass\Core\DataHandling\AcademyDataHandler::class
];
// @TODO: report core bug for 12.4 (fatal error due to wrong array access on int)
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Backend\Form\FormDataProvider\TcaInlineIsOnSymmetricSide::class] = [
   'className' => Digicademy\Academy\Xclass\Backend\Form\FormDataProvider\AcademyTcaInlineIsOnSymmetricSide::class
];
