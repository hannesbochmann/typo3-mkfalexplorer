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

use \TYPO3\CMS\Core\Utility\GeneralUtility;
tx_rnbase::load('tx_rnbase_action_BaseIOC');

/**
 *
 * Tx_Mkfalexplorer_Action_ShowExplorerWithFiles
 *
 * @package 		TYPO3
 * @subpackage	 	mkfalexplorer
 * @author 			Eric Hertwig <dev@dmk-ebusiness.de>
 * @license 		http://www.gnu.org/licenses/lgpl.html
 * 					GNU Lesser General Public License, version 3 or later
 */
class Tx_Mkfalexplorer_Action_ShowExplorerWithFiles extends tx_rnbase_action_BaseIOC {

    /**
     *
     * @param tx_rnbase_parameters $parameters
     * @param tx_rnbase_configurations $configurations
     * @param array $viewData
     * @return string error msg or null
     */
    public function handleRequest(&$parameters, &$configurations, &$viewData) {



        return 'Wird noch implementiert!';
    }

    protected function getTemplateName() {return 'list';}

    protected function getViewClassName() {return 'Tx_Mkfalexplorer_Views_List';}
}


