<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Rene Nitzsche (rene[@]system25.de)
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
 ***************************************************************/

/**
 *
 * Tx_Mkfalexplorer_Utility_Wizicon
 *
 * @package        TYPO3
 * @subpackage     mkfalexplorer
 * @author         Eric Hertwig <dev@dmk-ebusiness.de>
 * @license        http://www.gnu.org/licenses/lgpl.html
 *                 GNU Lesser General Public License, version 3 or later
 */

tx_rnbase::load( 'tx_rnbase_util_Extensions' );
tx_rnbase::load( 'tx_rnbase_util_Wizicon' );

class Tx_Mkfalexplorer_Utility_Wizicon extends tx_rnbase_util_Wizicon {

	/**
	 * @return array
	 */
	protected function getPluginData() {
		return array(
			'tx_mkfalexplorer' => array(
				'icon'        => tx_rnbase_util_Extensions::extRelPath( 'mkfalexplorer' ) . 'ext_icon.gif',
				'title'       => 'plugin.mkfalexplorer.title',
				'description' => 'plugin.mkfalexplorer.description'
			)
		);
	}

	/**
	 * @return string
	 */
	protected function getLLFile() {
		return tx_rnbase_util_Extensions::extPath( 'mkfalexplorer' ) . 'Resources/Private/Language/Backend.xml';
	}
}
