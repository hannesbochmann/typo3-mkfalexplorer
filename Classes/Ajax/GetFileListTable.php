<?php
/**
 *  Copyright notice
 *
 *  (c) 2015 Eric Hertwig <dev@dmk-ebusiness.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

	use \TYPO3\CMS\Core as Core;
	use \TYPO3\CMS\Extbase\Utility as Utility;
	use \TYPO3\CMS\Frontend as Frontend;

	require_once Core\Utility\ExtensionManagementUtility::extPath(
	    'rn_base', 'class.tx_rnbase.php'
	);

	/* @var $eIDUtility Tx_Mkfalexplorer_Utility_Eid */
	$eIDUtility = tx_rnbase::makeInstance('Tx_Mkfalexplorer_Utility_Eid');

	//@TODO hand over PageID via ajaxcall
	$mkfalexplorerTS = $eIDUtility::getTSWithPageID(52)['plugin.']['tx_mkfalexplorer.'];

	// Exit if TS for Mkfalexplorer issnt setup
	if(!isset($mkfalexplorerTS)){
		echo '<p>MKFalexplorer is not configured for this page</p>';
		exit;
	}

	/* @var $action tx_rnbase_controller */
	$action = tx_rnbase::makeInstance('tx_rnbase_controller');

	$configurationArray = [
		'userFunc'              => $mkfalexplorerTS['userFunc'],
		'defaultAction'         => 'Tx_Mkfalexplorer_Action_ShowList',
		'qualifier'             => $mkfalexplorerTS['qualifier'],
		'templatePath'          => $mkfalexplorerTS['templatePath'],
		'flexform'              => $mkfalexplorerTS['flexform'],
		'locallangFilename'     => $mkfalexplorerTS['locallangFilename'],
		'mkfalexplorerPath'     => $_POST['path'],
		'mkfalexplorerfolderId' => $_POST['folderID'],
	];

	$out = $action->main('', $configurationArray);

	echo $out;
