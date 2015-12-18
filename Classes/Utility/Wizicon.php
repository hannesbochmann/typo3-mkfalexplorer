<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 *  Copyright notice
 *
 *  (c) 2015 DMK E-Business GmbH <dev@dmk-ebusiness.de>
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


/**
 * Class that adds the wizard icon.
 *
 */
class Tx_Mkfalexplorer_Utility_Wizicon {

	/**
	 * Processing the wizard items array
	 *
	 * @param array $wizardItems The wizard items
	 * @return array Modified array with wizard items
	 */
	public function proc(array $wizardItems) {
		$wizardItems['plugins_tx_mkfalexplorer_pi1'] = array(
			'icon' 			=> ExtensionManagementUtility::extRelPath('mkfalexplorer') . 'ext_icon.gif',
			'title' 		=> 'LLL:EXT:mkfalexplorer/Resources/Private/Language/Backend.xml:plugin.mkfalexplorer.title',
			'description' 	=> 'LLL:EXT:mkfalexplorer/Resources/Private/Language/Backend.xml:plugin.mkfalexplorer.description',
			'params' 		=> '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=tx_mkfalexplorer'
		);
		return $wizardItems;
	}
}

?>
