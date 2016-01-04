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

use \TYPO3\CMS\Core\Resource\ResourceFactory;

tx_rnbase::load('tx_rnbase_util_BaseMarker');
tx_rnbase::load('tx_rnbase_util_Templates');

/**
 * Diese Klasse ist für die Erstellung von Markerarrays der Items verantwortlich
 */
class Tx_Mkfalexplorer_Marker_Listitem extends tx_rnbase_util_BaseMarker {

	/**
	 * @param string $template das HTML-Template
	 * @param TYPO3\CMS\Core\Resource\File $item
	 * @param tx_rnbase_util_FormatUtil $formatter der zu verwendente Formatter
	 * @param string $confId Pfad der TS-Config
	 * @param string $marker Name des Markers
	 * @return String das geparste Template
	 */
	public function parseTemplate(
		$template, &$item, &$formatter, $confId, $marker = 'ITEM_'
	) {

		if($item->isMissing()) return '';

		$markerArray = array();
		$markerArray['###' . $marker . '_NAME###'] = $item->getName();
		$markerArray['###' . $marker . '_ID###'] = $item->getUid();

		/* @var $linkUtility Tx_Mkfalexplorer_Utility_Path */
		$linkUtility = tx_rnbase::makeInstance('Tx_Mkfalexplorer_Utility_Path');

		$markerArray['###' . $marker . '_LINKP###'] =  $item->getProperty('link');
		$markerArray['###' . $marker . '_LINK###'] = $linkUtility::getLink($item);

		$markerArray['###' . $marker . '_EXTICONPATH###'] = $linkUtility::getIconImagePath($item);

		$wrappedSubpartArray = $subpartArray = array();

		tx_rnbase_util_Misc::callHook(
			'mkfalexplorer',
			'Tx_Mkfalexplorer_Marker_ListitemBeforeSubstitution',
			array(
				'item' => &$item,
				'configurations'=> $formatter->getConfigurations(),
				'confId' => $confId, 'marker' => $marker,
				'template' => &$template, 'markerArray' => &$markerArray,
				'subpartArray' => &$subpartArray,
				'wrappedSubpartArray' => &$wrappedSubpartArray,
				'url' => $_POST['url'],
			),
			$this
		);
		$out = tx_rnbase_util_Templates::substituteMarkerArrayCached(
			$template, $markerArray, $subpartArray, $wrappedSubpartArray
		);
		return $out;
	}
}
