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
use GeorgRinger\Eventnews\Domain\Model\News as EventNews;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Events extends EventNews
{

    /**
     * Relations of the news with persons, projects, events, news, media etc.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations>
     */
    protected $eventRelations = null;

    /**
     * Returns the relations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $eventRelations
     */
    public function getEventRelations()
    {
        $objectStorage = GeneralUtility::makeInstance(ObjectStorage::class);
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $relationsRepository = $objectManager->get(RelationsRepository::class);
        $symmetricRelations = $relationsRepository->findByEventSymmetric($this);

        if ($symmetricRelations) {
            foreach ($symmetricRelations as $symmetricRelation) {
                $this->eventRelations->attach($symmetricRelation);
            }
        }
        return $this->eventRelations;
    }

    /**
     * Sets the relations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $eventRelations
     *
     * @return void
     */
    public function setEventRelations($eventRelations)
    {
        $this->eventRelations = $eventRelations;
    }

}
