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
	 * Return the Filetype Icon Path
	 *
	 * @param $item TYPO3\CMS\Core\Resource\File
	 *
	 * @return string
	 */
	public static function getIconImagePath($item) {

		$extension = $item->getExtension();
		 // @TODO: Quick'n'Dirty!! schoen machen !!

		if ($item->getProperty('isLink')) {
			return '/typo3conf/ext/mkfalexplorer/Resources/Public/Icons/Files/shortcut.png';
		} else if (
			is_file(PATH_site . 'typo3conf/ext/mkfalexplorer/Resources/Public/Icons/Files/' . $extension . '.png')
		) {
			return '/typo3conf/ext/mkfalexplorer/Resources/Public/Icons/Files/' . $extension . '.png';
		}
		else {
			return '/typo3conf/ext/mkfalexplorer/Resources/Public/Icons/Files/_blank.png';
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

			$typolink_conf=array(
				'title' => $title,
				'no_cache' => 0,
				'parameter' => $item->getProperty('link'),
				'value' => $title,
				'useCacheHash' => 1);

			/* @var $cObject TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
			$cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');

			$link = $cObject->typolink(str_replace('_', ' ', $title), $typolink_conf);

			return $link;
		}
		else {
			return '<a href="' . $item->getPublicUrl() . '" alt="' . str_replace('_', ' ', $title) . '">' . str_replace('_', ' ', $title) . '</a>';
		}
	}
}
