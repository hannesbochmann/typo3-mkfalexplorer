<?php

defined('TYPO3_MODE') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility as EMUtility;

$_EXTKEY = 'mkfalexplorer';
$_EXT_PATH = EMUtility::extPath($_EXTKEY);
$_EXT_RELPATH = EMUtility::extRelPath($_EXTKEY);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tx_mkfalexplorer'] = 'pi_flexform';

EMUtility::addPiFlexFormValue(
	'tx_mkfalexplorer', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Config.xml'
);


EMUtility::addPlugin(
	array(
		'LLL:EXT:mkfalexplorer/Resources/Private/Language/Backend.xml:plugin.mkfalexplorer.title',
		'tx_mkfalexplorer',
		$_EXT_RELPATH . 'ext_icon.png',
	)
);

EMUtility::addStaticFile(
	$_EXTKEY, 'Configuration/Typoscript/Base/', 'MK Falexplorer Base'
);


if(TYPO3_MODE === 'BE') {
	$GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['Tx_Mkfalexplorer_Utility_Wizicon'] =
		EMUtility::extPath('mkfalexplorer') . 'Classes/Utility/Wizicon.php';
}
