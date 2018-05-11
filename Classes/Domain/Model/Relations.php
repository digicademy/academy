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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use Digicademy\ChfTime\Domain\Model\DateRanges;

class Relations extends AbstractEntity
{

    /**
     * persistentIdentifier
     *
     * @var \string
     *
     * @validate NotEmpty
     */
    protected $persistentIdentifier;

    /**
     * The type of relation
     *
     * @var integer $type
     * @validate NotEmpty
     */
    protected $type;

    /**
     * The role of the relation
     *
     * @var \Digicademy\Academy\Domain\Model\Roles $role
     * @lazy
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
     * @lazy
     */
    protected $project = null;

    /**
     * Related project
     *
     * @var \Digicademy\Academy\Domain\Model\Projects $projectSymmetric
     * @lazy
     */
    protected $projectSymmetric = null;

    /**
     * Related Person
     *
     * @var \Digicademy\Academy\Domain\Model\Persons $person
     * @lazy
     */
    protected $person = null;

    /**
     * Related Person
     *
     * @var \Digicademy\Academy\Domain\Model\Persons $personSymmetric
     * @lazy
     */
    protected $personSymmetric = null;

    /**
     * Related Hcard
     *
     * @var \Digicademy\Academy\Domain\Model\Hcards $hcard
     * @lazy
     */
    protected $hcard = null;

    /**
     * Related Unit
     *
     * @var \Digicademy\Academy\Domain\Model\Units $unit
     * @lazy
     */
    protected $unit = null;

    /**
     * Related Unit
     *
     * @var \Digicademy\Academy\Domain\Model\Units $unitSymmetric
     * @lazy
     */
    protected $unitSymmetric = null;

    /**
     * Related News
     *
     * @var \Digicademy\Academy\Domain\Model\News $news
     * @lazy
     */
    protected $news = null;

    /**
     * Related Event
     *
     * @var \Digicademy\Academy\Domain\Model\Events $event
     * @lazy
     */
    protected $event = null;

    /**
     * Related medium
     *
     * @var \Digicademy\Academy\Domain\Model\Media $medium
     * @lazy
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
