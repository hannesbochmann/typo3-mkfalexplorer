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

/**
 * Folder
 *
 * @package TYPO3
 * @subpackage mkfalexplorer
 * @author Eric Hertwig <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 * GNU Lesser General Public License, version 3 or later
 */
class Tx_Mkfalexplorer_Utility_Eid {

	/**
	 * returns a multidimensional array of FolderStructure
	 *
	 * @param integer $pageUid = 0
	 * @return array
	 */
	public function getTSWithPageID($pageUid = 0) {

		/* @var $sysPageObj \TYPO3\CMS\Frontend\Page\PageRepository*/
		$sysPageObj = tx_rnbase::makeInstance('TYPO3\\CMS\\Frontend\\Page\\PageRepository');

		$rootLine = $sysPageObj->getRootLine($pageUid);

		/* @var $typoscriptParser \TYPO3\CMS\Core\TypoScript\ExtendedTemplateService */
		$typoscriptParser = tx_rnbase::makeInstance('TYPO3\\CMS\\Core\\TypoScript\\ExtendedTemplateService');
		$typoscriptParser->tt_track = 0;
		$typoscriptParser->init();
		$typoscriptParser->runThroughTemplates($rootLine);
		$typoscriptParser->generateConfig();

		return $typoscriptParser->setup;
	}
}
