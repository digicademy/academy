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

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use Digicademy\ChfTime\Domain\Model\DateRanges;

class Relations extends AbstractEntity
{

    /**
     * persistentIdentifier
     *
     * @var \string
     *
     * @Extbase\Validate("NotEmpty")
     */
    protected $persistentIdentifier;

    /**
     * The type of relation
     *
     * @var integer $type
     * @Extbase\Validate("NotEmpty")
     */
    protected $type;

    /**
     * The role of the relation
     *
     * @var \Digicademy\Academy\Domain\Model\Roles $role
     * @Extbase\ORM\Lazy
     */
    protected $role;

    /**
     * Freetext variant of the relation's role
     *
     * @var string $roleFreetext
     */
    protected $roleFreetext;

    /**
     * Related project
     *
     * @var \Digicademy\Academy\Domain\Model\Projects $project
     * @Extbase\ORM\Lazy
     */
    protected $project = null;

    /**
     * Related project
     *
     * @var \Digicademy\Academy\Domain\Model\Projects $projectSymmetric
     * @Extbase\ORM\Lazy
     */
    protected $projectSymmetric = null;

    /**
     * Related Person
     *
     * @var \Digicademy\Academy\Domain\Model\Persons $person
     * @Extbase\ORM\Lazy
     */
    protected $person = null;

    /**
     * Related Person
     *
     * @var \Digicademy\Academy\Domain\Model\Persons $personSymmetric
     * @Extbase\ORM\Lazy
     */
    protected $personSymmetric = null;

    /**
     * Related Hcard
     *
     * @var \Digicademy\Academy\Domain\Model\Hcards $hcard
     * @Extbase\ORM\Lazy
     */
    protected $hcard = null;

    /**
     * Related Unit
     *
     * @var \Digicademy\Academy\Domain\Model\Units $unit
     * @Extbase\ORM\Lazy
     */
    protected $unit = null;

    /**
     * Related Unit
     *
     * @var \Digicademy\Academy\Domain\Model\Units $unitSymmetric
     * @Extbase\ORM\Lazy
     */
    protected $unitSymmetric = null;

    /**
     * Related News
     *
     * @var \Digicademy\Academy\Domain\Model\News $news
     * @Extbase\ORM\Lazy
     */
    protected $news = null;

    /**
     * Related Event
     *
     * @var \Digicademy\Academy\Domain\Model\Events $event
     * @Extbase\ORM\Lazy
     */
    protected $event = null;

    /**
     * Related medium
     *
     * @var \Digicademy\Academy\Domain\Model\Media $medium
     * @Extbase\ORM\Lazy
     */
    protected $medium = null;

    /**
     * Freetext relation
     *
     * @var string $freetext
     */
    protected $freetext;

    /**
     * Duration of the relation
     *
     * @var \Digicademy\ChfTime\Domain\Model\DateRanges $dateRange
     */
    protected $dateRange = null;

    /**
     * Returns the persistentIdentifier
     *
     * @return \string $persistentIdentifier
     */
    public function getPersistentIdentifier()
    {
        return $this->persistentIdentifier;
    }

    /**
     * Sets the persistentIdentifier
     *
     * @param \string $persistentIdentifier
     *
     * @return void
     */
    public function setPersistentIdentifier($persistentIdentifier)
    {
        $this->persistentIdentifier = $persistentIdentifier;
    }

    /**
     * Returns the type
     *
     * @return integer $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param integer $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * getRole
     *
     * @return \Digicademy\Academy\Domain\Model\Roles $role
     */
    public function getRole()
    {
        if ($this->role instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->role->_loadRealInstance();
        }
        return $this->role;
    }

    /**
     * setRole
     *
     * @param \Digicademy\Academy\Domain\Model\Roles $role
     *
     * @return void
     */
    public function setRole(Roles $role)
    {
        $this->role = $role;
    }

    /**
     * getRoleFreetext
     *
     * @return string $roleFreetext
     */
    public function getRoleFreetext()
    {
        return $this->roleFreetext;
    }

    /**
     * setRoleFreetext
     *
     * @param string $roleFreetext
     *
     * @return void
     */
    public function setRoleFreetext($roleFreetext)
    {
        $this->roleFreetext = $roleFreetext;
    }

    /**
     * Returns the project
     *
     * @return \Digicademy\Academy\Domain\Model\Projects $project
     */
    public function getProject()
    {
        if ($this->project instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->project->_loadRealInstance();
        }
        return $this->project;
    }

    /**
     * Sets the project
     *
     * @param \Digicademy\Academy\Domain\Model\Projects $project
     *
     * @return void
     */
    public function setProject(Projects $project)
    {
        $this->project = $project;
    }

    /**
     * Returns the projectSymmetric
     *
     * @return \Digicademy\Academy\Domain\Model\Projects $projectSymmetric
     */
    public function getProjectSymmetric()
    {
        if ($this->projectSymmetric instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->projectSymmetric->_loadRealInstance();
        }
        return $this->projectSymmetric;
    }

    /**
     * Sets the projectSymmetric
     *
     * @param \Digicademy\Academy\Domain\Model\Projects $projectSymmetric
     *
     * @return void
     */
    public function setProjectSymmetric(Projects $projectSymmetric)
    {
        $this->projectSymmetric = $projectSymmetric;
    }

    /**
     * Returns the person
     *
     * @return \Digicademy\Academy\Domain\Model\Persons $person
     */
    public function getPerson()
    {
        if ($this->person instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->person->_loadRealInstance();
        }
        return $this->person;
    }

    /**
     * Sets the person
     *
     * @param \Digicademy\Academy\Domain\Model\Persons $person
     *
     * @return void
     */
    public function setPerson(Persons $person)
    {
        $this->person = $person;
    }

    /**
     * Returns the personSymmetric
     *
     * @return \Digicademy\Academy\Domain\Model\Persons $personSymmetric
     */
    public function getPersonSymmetric()
    {
        if ($this->personSymmetric instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->personSymmetric->_loadRealInstance();
        }
        return $this->personSymmetric;
    }

    /**
     * Sets the personSymmetric
     *
     * @param \Digicademy\Academy\Domain\Model\Persons $personSymmetric
     *
     * @return void
     */
    public function setPersonSymmetric(Persons $personSymmetric)
    {
        $this->personSymmetric = $personSymmetric;
    }

    /**
     * Returns the person
     *
     * @return \Digicademy\Academy\Domain\Model\Hcards $hcard
     */
    public function getHcard()
    {
        if ($this->hcard instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->hcard->_loadRealInstance();
        }
        return $this->hcard;
    }

    /**
     * Sets the person
     *
     * @param \Digicademy\Academy\Domain\Model\Hcards $hcard
     *
     * @return void
     */
    public function setHcard(Hcards $hcard)
    {
        $this->hcard = $hcard;
    }

    /**
     * Returns the person
     *
     * @return \Digicademy\Academy\Domain\Model\Units $unit
     */
    public function getUnit()
    {
        if ($this->unit instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->unit->_loadRealInstance();
        }
        return $this->unit;
    }

    /**
     * Sets the person
     *
     * @param \Digicademy\Academy\Domain\Model\Units $unit
     *
     * @return void
     */
    public function setUnit(Units $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Returns the person
     *
     * @return \Digicademy\Academy\Domain\Model\Units $unitSymmetric
     */
    public function getUnitSymmetric()
    {
        if ($this->unitSymmetric instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->unitSymmetric->_loadRealInstance();
        }
        return $this->unitSymmetric;
    }

    /**
     * Sets the person
     *
     * @param \Digicademy\Academy\Domain\Model\Units $unitSymmetric
     *
     * @return void
     */
    public function setUnitSymmetric(Units $unitSymmetric)
    {
        $this->unitSymmetric = $unitSymmetric;
    }

    /**
     * Returns the news
     *
     * @return \Digicademy\Academy\Domain\Model\News $news
     */
    public function getNews()
    {
        if ($this->news instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->news->_loadRealInstance();
        }
        return $this->news;
    }

    /**
     * Sets the news
     *
     * @param \Digicademy\Academy\Domain\Model\News $news
     *
     * @return void
     */
    public function setNews(News $news)
    {
        $this->news = $news;
    }

    /**
     * Returns the event
     *
     * @return \Digicademy\Academy\Domain\Model\Events $event
     */
    public function getEvent()
    {
        if ($this->event instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->event->_loadRealInstance();
        }
        return $this->event;
    }

    /**
     * Sets the event
     *
     * @param \Digicademy\Academy\Domain\Model\Events $event
     *
     * @return void
     */
    public function setEvent(Events $event)
    {
        $this->event = $event;
    }

    /**
     * Returns the medium
     *
     * @return \Digicademy\Academy\Domain\Model\Media $medium
     */
    public function getMedium()
    {
        if ($this->medium instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->medium->_loadRealInstance();
        }
        return $this->medium;
    }

    /**
     * Sets the medium
     *
     * @param \Digicademy\Academy\Domain\Model\Media $medium
     *
     * @return void
     */
    public function setMedium(Media $medium)
    {
        $this->medium = $medium;
    }

    /**
     * getFreetext
     *
     * @return string $freetext
     */
    public function getFreetext()
    {
        return $this->freetext;
    }

    /**
     * setFreetext
     *
     * @param string $freetext
     *
     * @return void
     */
    public function setFreetext($freetext)
    {
        $this->freetext = $freetext;
    }

    /**
     * Returns the dateRange
     *
     * @return \Digicademy\ChfTime\Domain\Model\DateRanges $dateRange
     */
    public function getDateRange()
    {
        if ($this->dateRange instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
            $this->dateRange->_loadRealInstance();
        }
        return $this->dateRange;
    }

    /**
     * Sets the dateRange
     *
     * @param \Digicademy\ChfTime\Domain\Model\DateRanges $dateRange
     *
     * @return void
     */
    public function setDateRange(DateRanges $dateRange)
    {
        $this->dateRange = $dateRange;
    }

}
