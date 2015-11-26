<?php
defined('TYPO3_MODE') || die ('Access denied.');

if (empty($GLOBALS['TCA']['sys_file_metadata'])) {
	return;
}
/* tx_mkbil_util TCA */
tx_rnbase::load('tx_mklib_util_TCA');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'sys_file_metadata',
	array(
		'isLink' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mkfalexplorer/Resources/Private/Language/Backend.xml:sys_file_metadata.isLink',
			'config' => array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'link' => array(
			'exclide' => 1,
			'label' => 'LLL:EXT:mkfalexplorer/Resources/Private/Language/Backend.xml:sys_file_metadata.link',
			'displayCond' => array(
				'AND' => array(
					'FIELD:isLink:REQ:true',
				)
			),
			'config' => array (
				'type' => 'input',
				'wizards' => tx_mklib_util_TCA::getWizards(
					'',
					array(
						'link' => 1
					)
				)
			)
		)
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_metadata', 'isLink,link', '', 'after:title');

$GLOBALS['TCA']['sys_file_metadata']['ctrl']['requestUpdate'] = 'isLink';
