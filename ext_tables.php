<?php

defined('TYPO3_MODE') || die('Access denied.');

$_EXTKEY = 'mkfalexplorer';
$_EXT_PATH = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
$_EXT_RELPATH = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tx_mkfalexplorer'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'tx_mkfalexplorer', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Config.xml'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		//@TODO: Use LanguageFiles
		'MK FalExplorer',
		'tx_mkfalexplorer',
		$_EXT_RELPATH . 'ext_icon.png',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY, 'Configuration/Typoscript/Base/', 'MK Falexplorer Base'
);
