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

class Tx_Mkfalexplorer_Views_List extends tx_rnbase_view_Base {

	function createOutput($template, &$viewData, &$configurations, &$formatter) {

		/* @var $listBuilder tx_rnbase_util_ListBuilder */
		$listBuilder = tx_rnbase::makeInstance('tx_rnbase_util_ListBuilder');

		$markerArray = array();
		$subpartArray = array();

		$items = &$viewData->offsetGet('items');
		$template = $listBuilder->render(
			$items,
			$viewData, $template, 'Tx_Mkfalexplorer_Marker_Listitem',
			$this->getController()->getConfId() . 'filelist.file.',
			'FOLDERITEM', $formatter
		);

		$markerArray['###PATH###'] = &$viewData->offsetGet('path');

		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached(
			$template, $markerArray, $subpartArray
		);
		return $out;
	}
	/**
	 * Subpart der im HTML-Template geladen werden soll. Dieser wird der Methode
	 * createOutput automatisch als $template übergeben.
	 *
	 * @return string
	 */

	function getMainSubpart() {
		return '###LIST###';
	}
}
