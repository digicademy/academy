<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_projects'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_projects', 'FILE:EXT:academy/Configuration/FlexForms/ProjectsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_units'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_units', 'FILE:EXT:academy/Configuration/FlexForms/UnitsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_persons'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_persons', 'FILE:EXT:academy/Configuration/FlexForms/PersonsPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_media'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_media', 'FILE:EXT:academy/Configuration/FlexForms/MediaPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_mediaviewer'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_mediaviewer', 'FILE:EXT:academy/Configuration/FlexForms/MediaviewerPlugin.xml');

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['academy_hcards'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('academy_hcards', 'FILE:EXT:academy/Configuration/FlexForms/HcardsPlugin.xml');
