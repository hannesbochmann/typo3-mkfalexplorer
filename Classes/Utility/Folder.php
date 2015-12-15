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
use \TYPO3\CMS\Core\Resource\Folder;


/**
 * Folder
 *
 * @package TYPO3
 * @subpackage mkfalexplorer
 * @author Eric Hertwig <dev@dmk-ebusiness.de>
 * @license http://www.gnu.org/licenses/lgpl.html
 * GNU Lesser General Public License, version 3 or later
 */
class Tx_Mkfalexplorer_Utility_Folder {

	/**
	 * returns a multidimensional array of FolderStructure
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return array
	 */
	public static function getFolder($storageId, $identifyer) {

		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);

		$folder = new Folder($storageObject, $identifyer, 'Fielelist');
		$foldersInFolder = $storageObject->getFoldersInFolder($folder);

		$result = array();

		foreach($foldersInFolder as $folder => $value) {
			if(count($storageObject->getFoldersInFolder(new Folder($storageObject, $folder, 'Folder')))) {
				$result[$folder] = self::getFolder($storageObject->getUid(), $folder);
			} else {
				$result[$folder] = $folder;
			}
		}

		return $result;
	}

	/**
	 * returns a multidimensional array of FolderStructure With Files
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return array
	 */

	public static function getFoldersAndFiles($storageId, $identifyer) {
		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);

		$folder = new Folder($storageObject, $identifyer, 'Fielelist');
		$foldersInFolder = $storageObject->getFoldersInFolder($folder);

		$result = array();

		foreach($foldersInFolder as $folder => $value) {
			if(count($storageObject->getFoldersInFolder(new Folder($storageObject, $folder, 'Folder')))) {
				$result[$folder] = self::getFoldersAndFiles($storageObject->getUid(), $folder);
				if(count(self::getFilesInFolder($storageObject->getUid(), $folder)) > 0){
					$result[$folder]['files'] = self::getFilesInFolder($storageObject->getUid(), $folder);
				}
			} else {
				if(count(self::getFilesInFolder($storageObject->getUid(), $folder)) > 0){
					$result[$folder]['files'] = self::getFilesInFolder($storageId, $folder);
				}
			}
		}

		return $result;
	}

	/**
	 * returns folder name from identifyer
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return string
	 */
	public static function getFolderName($storageId, $identifyer) {
		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);

		$folder = new Folder($storageObject, $identifyer, 'Filelist');

		$lastPathPart  = end(explode('/', trim($folder->getIdentifier(), '/')));

		return $lastPathPart;
	}

	/**
	 * returns parent folder name from identifyer
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return string
	 */
	public static function getParentFolderName($storageId, $identifyer){
		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);

		$folder = new Folder($storageObject, $identifyer, 'Filelist');

		$parentPathPart  = prev(explode('/', trim($folder->getIdentifier(), '/')));

		return $parentPathPart;
	}

	/**
	 * returns folder name from identifyer
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return TYPO3\CMS\Core\Resource\File[]
	 */
	public static function getFilesInFolder($storageId, $identifyer){
		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);
		$folder = new Folder($storageObject, $identifyer, 'Filelist');

		return $folder->getFiles();
	}

	/**
	 * returns folders in folder
	 *
	 * @param int $storageId
	 * @param string $identifyer
	 * @return Folder[]
	 */
	public static function getFoldersInFolder($storageId, $identifyer){
		$resourceFactory = ResourceFactory::getInstance();
		$storageObject = $resourceFactory->getStorageObject($storageId);
		$folder = new Folder($storageObject, $identifyer, 'Filelist');

		return $folder->getSubfolders();
	}
}
