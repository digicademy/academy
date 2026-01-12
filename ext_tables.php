<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// PLUGIN DEFINITIONS

ExtensionUtility::registerPlugin(
    'Academy',
    'List',
    'Academy: List entities'
);

ExtensionUtility::registerPlugin(
    'Academy',
    'Show',
    'Academy: Show entity'
);

ExtensionUtility::registerPlugin(
    'Academy',
    'Search',
    'Academy: Search entities'
);
