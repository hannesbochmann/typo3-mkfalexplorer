<?php

defined('TYPO3_MODE') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility as EMUtility;

$_EXTKEY = 'mkfalexplorer';
$_EXT_PATH = EMUtility::extPath($_EXTKEY);
$_EXT_RELPATH = EMUtility::extRelPath($_EXTKEY);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tx_mkfalexplorer'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'tx_mkfalexplorer', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Config.xml'
);


EMUtility::addPlugin(
	array(
		//@TODO: Use LanguageFiles
		'MK FalExplorer',
		'tx_mkfalexplorer',
		$_EXT_RELPATH . 'ext_icon.png',
	)
);

EMUtility::addStaticFile(
	$_EXTKEY, 'Configuration/Typoscript/Base/', 'MK Falexplorer Base'
);
