<?php

namespace Digicademy\Academy\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature | Mainz
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

use Digicademy\Academy\Domain\Repository\RelationsRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use GeorgRinger\News\Domain\Model\News as GeorgRingerNews;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class News extends GeorgRingerNews
{

    /**
     * Relations of the news with persons, projects, events, news, media etc.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations>
     */
    protected $newsRelations = null;

    /**
     * Returns the relations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $newsRelations
     */
    public function getNewsRelations()
    {
        $objectStorage = GeneralUtility::makeInstance(ObjectStorage::class);
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $relationsRepository = $objectManager->get(RelationsRepository::class);
        $symmetricRelations = $relationsRepository->findByNewsSymmetric($this);
        if ($symmetricRelations) {
            foreach ($symmetricRelations as $symmetricRelation) {
                $this->newsRelations->attach($symmetricRelation);
            }
        }
        return $this->newsRelations;
    }

    /**
     * Sets the relations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $newsRelations
     *
     * @return void
     */
    public function setNewsRelations($newsRelations)
    {
        $this->newsRelations = $newsRelations;
    }

}
