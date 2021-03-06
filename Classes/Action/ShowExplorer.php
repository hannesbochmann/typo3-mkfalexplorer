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

tx_rnbase::load('tx_rnbase_action_BaseIOC');
tx_rnbase::load('Tx_Mkfalexplorer_Utility_Path');

/**
 *
 * Tx_Mkfalexplorer_Action_ShowList
 *
 * @package 		TYPO3
 * @subpackage	 	mkfalexplorer
 * @author 			Eric Hertwig <dev@dmk-ebusiness.de>
 * @license 		http://www.gnu.org/licenses/lgpl.html
 * 					GNU Lesser General Public License, version 3 or later
 */
class Tx_Mkfalexplorer_Action_ShowExplorer extends tx_rnbase_action_BaseIOC {
	/**
	 *
	 * @param array_object $parameters
	 * @param tx_rnbase_configurations $configurations
	 * @param array $viewData
	 * @return string error msg or null
	 */
	public function handleRequest(&$parameters, &$configurations, &$viewData) {
		$config = explode(':', $configurations->getConfigArray()['path']);
		$storageId = $config[1];
		$folderIdentifyer = $config[2];

		/* @var $folderUtility Tx_Mkfalexplorer_Utility_Folder */
		$folderUtility = tx_rnbase::makeInstance('Tx_Mkfalexplorer_Utility_Folder');

		$baseFolderName = $folderUtility->getFolderName($storageId, $folderIdentifyer);


		$folderArray = $folderUtility::getFolder($storageId, $folderIdentifyer);
		$folderarrayComp[$baseFolderName] = $folderArray;

		$subDir = Tx_Mkfalexplorer_Utility_Path::getPathFromFalPathString(
			$configurations->get('subdir')
		);

		$viewData->offsetSet('folders', $folderarrayComp);
		$viewData->offsetSet('subdir', $subDir);
		$viewData->offsetSet('baseFolderName', $folderUtility::getFolderName($storageId, $folderIdentifyer));

		return null;
	}

	protected function getTemplateName() {return 'explorer';}

	protected function getViewClassName() {return 'Tx_Mkfalexplorer_Views_Explorer';}
}


