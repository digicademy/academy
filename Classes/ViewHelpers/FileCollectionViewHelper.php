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

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;
use TYPO3\CMS\Core\Resource\Collection\FolderBasedFileCollection;
use TYPO3\CMS\Core\Resource\Collection\StaticFileCollection;

class FileCollectionViewHelper extends AbstractViewHelper
{

    /**
     * Initialize arguments
     *
     * @return void
     *
     * @throws Exception
     */
    public function initializeArguments()
    {
        $this->registerArgument(
            'uid',
            'int',
            'Uid of the file collection',
            true
        );
    }

    /**
     * @return object $fileCollection
     */
    public function render(): object
    {
        $uid = (int)$this->arguments['uid'];

        $collectionRecord = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('sys_file_collection')
            ->select(['*'], 'sys_file_collection', ['uid' => $uid]
            )->fetch();

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
