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

tx_rnbase::load('tx_rnbase_view_Base');

class Tx_Mkfalexplorer_Views_Explorer extends tx_rnbase_view_Base {

	function createOutput($template, &$viewData, &$configurations, &$formatter) {

		$config = explode(':', $configurations->getConfigArray()['path']);
		$storageId = $config[1];

		$folders = &$viewData->offsetGet('folders');
		$markerArray = $subpartArray = array();

		$markerArray['###FOLDEREXPLORER_SUBDIR###'] = &$viewData->offsetGet('subdir');

		$markerArray['###BASEFOLDERNAME###'] = &$viewData->offsetGet('baseFolderName');
		$markerArray['###FOLDEREXPLORER###'] = self::makeExplorer($folders, $configurations, $storageId);


		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached($template, $markerArray, $subpartArray);
		return $out;
	}
	/**
	 * Subpart der im HTML-Template geladen werden soll. Dieser wird der Methode
	 * createOutput automatisch als $template übergeben.
	 *
	 * @return string
	 */
	function getMainSubpart() {
		return '###EXPLORER###';
	}

	/**
	 * Return a String of recursive array
	 *
	 * @param $arr
	 * @param $configurations
	 * @param $storageId
	 *
	 * @return string
	 */
	private static function makeExplorer($arr, $configurations, $storageId)
	{
		/* @var $folderUtility Tx_Mkfalexplorer_Utility_Folder */
		$folderUtility = tx_rnbase::makeInstance( 'Tx_Mkfalexplorer_Utility_Folder' );
		$return = '<ul>';

		//@TODO: in Template auslagern
		foreach ($arr as $item => $value) {
			$return .= '<li><a class="listFolder" data-path="' . $configurations->getConfigArray()['path'] . '" data-folderId="'. $item .'">' .
					   $folderUtility::getFolderName($storageId, $item) . '</a>'.
						   (is_array($value) ?
							self::makeExplorer($value, $configurations, $storageId) :
							   '') .
					   '</li>';
		}
		$return .= '</ul>';
		return $return;
	}
}
