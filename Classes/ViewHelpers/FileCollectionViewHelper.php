<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <Torsten.Schrade@adwmainz.de>
 *
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

use TYPO3\CMS\Core\Resource\Collection\FolderBasedFileCollection;
use TYPO3\CMS\Core\Resource\Collection\StaticFileCollection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class FileCollectionViewHelper extends AbstractViewHelper
{

    /**
     * Retrieves a file collection from DB (folder OR static) and loads it's files
     *
     * @param \integer $uid
     *
     * @return object $fileCollection
     */
    public function render($uid)
    {

        $collectionRecord = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow(
            '*',
            'sys_file_collection',
            'uid = ' . (int)$uid
        );
        switch ($collectionRecord['type']) {
            case 'folder':
                $fileCollection = GeneralUtility::makeInstance(FolderBasedFileCollection::class);
                $fileCollection->fromArray($collectionRecord);
                break;
            case 'static':
            default:
                $fileCollection = GeneralUtility::makeInstance(StaticFileCollection::class);
                $fileCollection->setIdentifier($uid);
                break;
        }

        $fileCollection->loadContents();

        return $fileCollection;
    }

}
