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

// Basic TSFE Setup
/* @var $TSFE TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
$TSFE = Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController', $TYPO3_CONF_VARS, 0, 0);

// Get FE User Information
$TSFE->initFEuser();
// Important: no Cache for Ajax stuff
$TSFE->set_no_cache();
$TSFE->initTemplate();
$TSFE->cObj = Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
$TSFE->settingLanguage();
$TSFE->settingLocale();

$a = 1;

$fileList = tx_rnbase::makeInstance('Tx_Mkfalexplorer_Action_ShowList');


echo 'test';
