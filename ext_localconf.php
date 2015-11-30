<?php
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(
	'rn_base', 'class.tx_rnbase.php'
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['extTablesInclusion-PostProcessing'][] =
	'EXT:mkfalexplorer/Classes/Hook/ExtTables/PostProcessing.php:Tx_Mkfalexplorer_Hook_ExtTables_PostProcessing';

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['getFileListTable'] = 'EXT:mkfalexplorer/Classes/Ajax/GetFileListTable.php';