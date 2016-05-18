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


/**
 * Folder
 *
 * @package TYPO3
 * @subpackage mkfalexplorer
 * @author Eric Hertwig <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 * GNU Lesser General Public License, version 3 or later
 */
class Tx_Mkfalexplorer_Utility_Path {
	/**
	 * Path to folder with images (diferent types of files)
	 *
	 * @var IconsPath
	 */
	private static $iconsPath = '';
	
	/**
	 * File type of icons i.e. 'png'
	 *
	 * @var IconsType
	 */
	private static $iconsType = '';
	
	/**
	 * Construct
	 */
	public function __construct($configurations = null)
	{
		self::$iconsPath = $configurations->_dataStore['iconsPath']?$configurations->_dataStore['iconsPath']:'typo3conf/ext/mkfalexplorer/Resources/Public/Icons/Files/';
		self::$iconsType = $configurations->_dataStore['iconsType']?$configurations->_dataStore['iconsType']:'png';
	}

	/**
	 * Return the Filetype Icon Path
	 *
	 * @param $item TYPO3\CMS\Core\Resource\File
	 *
	 * @return string
	 */
	public static function getIconImagePath($item) {
		
		$iconsPath = self::$iconsPath;
		$iconsType = self::$iconsType;
		
		$extension = $item->getExtension();
		 // @TODO: Quick'n'Dirty!! schoen machen !!

		if ($item->getProperty('isLink')) {
			return '/'.$iconsPath.'shortcut.'.$iconsType;
		} else if (
			is_file(PATH_site . $iconsPath . $extension . '.'.$iconsType)
		) {
			return '/'. $iconsPath . $extension . '.'.$iconsType;
		}
		else {
			return '/'. $iconsPath .'_blank.'.$iconsType;
		}
	}

	/**
	 * Return a PublicURL
	 *
	 * @param $item TYPO3\CMS\Core\Resource\File
	 *
	 * @return string
	 */
	public static function getLink($item) {

		$title = $item->getProperty('title');

		if(!isset($title)){
			$title = $item->getName();
		}

		if($item->getProperty('isLink')) {

			$typolink_conf = array(
				'title' => $title,
				'no_cache' => 0,
				'parameter' => $item->getProperty('link'),
				'value' => $title,
				'useCacheHash' => 1,
				'extTarget' => '_blank',
				'target' => '_blank',
			);

			$subdir = self::getPathFromFalPathString($item->getProperty('linksubdir'));
			if ($subdir != '') {
				$typolink_conf['section'] = $subdir;
			}

			/* @var $cObject TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
			$cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');

			$link = $cObject->typolink(str_replace('_', ' ', $title), $typolink_conf);

			return $link;
		}
		else {
			return '<a target="_blank" href="' . $item->getPublicUrl() . '" alt="' . str_replace('_', ' ', $title) . '">' . str_replace('_', ' ', $title) . '</a>';
		}
	}

	/**
	 * Returns the Path
	 * removes Type and storage prefix e.g. file:1:
	 *
	 * @param string $pathString
	 * @return string
	 */
	public static function getPathFromFalPathString($pathString) {
		$subDirParts = explode(':', $pathString);
		return (is_array($subDirParts) ? end($subDirParts) : '');
	}
}
