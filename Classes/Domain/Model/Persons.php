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

class Persons extends AbstractEntity
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
     * gender
     *
     * @var \integer $gender
     */
    protected $gender;

    /**
     * Given name of the person
     *
     * @var \string $givenName
     */
    protected $givenName;

    /**
     * Additional name
     *
     * @var \string $additionalName
     */
    protected $additionalName;

    /**
     * Family name of the person
     *
     * @var \string $familyName
     * @Extbase\Validate("NotEmpty")
     */
    protected $familyName;

    /**
     * honorificSuffix
     *
     * @var \string $honorificPrefix
     */
    protected $honorificPrefix;

    /**
     * honorificSuffix
     *
     * @var \string $honorificSuffix
     */
    protected $honorificSuffix;

    /**
     * gender
     *
     * @var \string $sorting
     */
    protected $sorting;

    /**
     * Images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @Extbase\ORM\Lazy
     */
    protected $image = null;

    /**
     * Life date of the person
     *
     * @var \Digicademy\ChfTime\Domain\Model\DateRanges $dateRange
     */
    protected $dateRange = null;

    /**
     * A page where details about the person can be found
     *
     * @var \integer $page
     */
    protected $page;

    /**
     * cv
     *
     * @var \string $cv
     */
    protected $cv;

    /**
     * expertise
     *
     * @var \string $expertise
     */
    protected $expertise;

    /**
     * awards
     *
     * @var \string $awards
     */
    protected $awards;

    /**
     * publications
     *
     * @var \string $publications
     */
    protected $publications;

    /**
     * Relations of the person with projects, hcards, events, news, media etc.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations>
     * @Extbase\ORM\Lazy
     */
    protected $relations = null;

    /**
     * Selected categories for the person
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Categories>
     * @Extbase\ORM\Lazy
     */
    protected $categories = null;

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
     * Returns the gender
     *
     * @return \integer $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @param \integer $gender
     *
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Returns the given name
     *
     * @return \string $givenName
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Sets the givenName
     *
     * @param \string $givenName
     *
     * @return void
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
    }

    /**
     * Returns the additional name
     *
     * @return \string $additionalName
     */
    public function getAdditionalName()
    {
        return $this->additionalName;
    }

    /**
     * Sets the additionalName
     *
     * @param \string $additionalName
     *
     * @return void
     */
    public function setAdditionalName($additionalName)
    {
        $this->additionalName = $additionalName;
    }

    /**
     * Returns the family name
     *
     * @return \string $familyName
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Sets the familyName
     *
     * @param \string $familyName
     *
     * @return void
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns the honorific prefix
     *
     * @return \string $honorificPrefix
     */
    public function getHonorificPrefix()
    {
        return $this->honorificPrefix;
    }

    /**
     * Sets the honorific prefix
     *
     * @param \string $honorificPrefix
     *
     * @return void
     */
    public function setHonorificPrefix($honorificPrefix)
    {
        $this->honorificPrefix = $honorificPrefix;
    }

    /**
     * Returns the honorific suffix
     *
     * @return \string $honorificSuffix
     */
    public function getHonorificSuffix()
    {
        return $this->honorificSuffix;
    }

    /**
     * Sets the honorific suffix
     *
     * @param \string $honorificSuffix
     *
     * @return void
     */
    public function setHonorificSuffix($honorificSuffix)
    {
        $this->honorificSuffix = $honorificSuffix;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     *
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
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

    /**
     * Returns the page
     *
     * @return \integer $page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Sets the page
     *
     * @param \integer $page
     *
     * @return void
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * Returns the CV
     *
     * @return \string $cv
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Sets the CV
     *
     * @param \string $cv
     *
     * @return void
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    /**
     * Returns the expertise
     *
     * @return \string $expertise
     */
    public function getExpertise()
    {
        return $this->expertise;
    }

    /**
     * Sets the expertise
     *
     * @param \string $expertise
     *
     * @return void
     */
    public function setExpertise($expertise)
    {
        $this->expertise = $expertise;
    }

    /**
     * Returns the awards
     *
     * @return \string $awards
     */
    public function getAwards()
    {
        return $this->awards;
    }

    /**
     * Sets the awards
     *
     * @param \string $awards
     *
     * @return void
     */
    public function setAwards($awards)
    {
        $this->awards = $awards;
    }

    /**
     * Returns the publications
     *
     * @return \string $publications
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * Sets the publications
     *
     * @param \string $publications
     *
     * @return void
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;
    }

    /**
     * Returns the relations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $relations
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * Sets the relations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $relations
     *
     * @return void
     */
    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Categories> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Categories> $categories
     *
     * @return void
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

}
