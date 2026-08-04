<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2011-2025 Academy of Sciences and Literature | Mainz
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

namespace Digicademy\Academy\Domain\Model;

use Digicademy\Academy\Domain\Model\Traits\{DateRangeTrait,
    FreeTextTrait,
    LanguageTrait,
    PersistentIdentifierTrait,
    TypeTrait};
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Represents a relation between CRIS entities
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 * @author Linnaea Söhn <linnaea.soehn@adwmainz.de>
 */

class Relations extends AbstractEntity
{
    use DateRangeTrait;
    use FreeTextTrait;
    use LanguageTrait;
    use PersistentIdentifierTrait;
    use TypeTrait;

    /**
     * The role of the relation
     *
     * @var Roles $role
     */
    #[Lazy]
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
     * @var Projects $project
     */
    #[Lazy]
    protected $project;

    /**
     * Related project
     *
     * @var Projects $projectSymmetric
     */
    #[Lazy]
    protected $projectSymmetric;

    /**
     * Related Person
     *
     * @var Persons $person
     */
    #[Lazy]
    protected $person;

    /**
     * Related Person
     *
     * @var Persons $personSymmetric
     */
    #[Lazy]
    protected $personSymmetric;

    /**
     * Related Hcard
     *
     * @var Hcards $hcard
     */
    #[Lazy]
    protected $hcard;

    /**
     * Related Unit
     *
     * @var Units $unit
     */
    #[Lazy]
    protected $unit;

    /**
     * Related Unit
     *
     * @var Units $unitSymmetric
     */
    #[Lazy]
    protected $unitSymmetric;

    /**
     * Related News
     *
     * @var News $news
     */
    #[Lazy]
    protected $news;

    /**
     * Related News
     *
     * @var News $newsSymmetric
     */
    #[Lazy]
    protected $newsSymmetric;

    /**
     * Related Event
     *
     * @var Events $event
     */
    #[Lazy]
    protected $event;

    /**
     * Related Event
     *
     * @var Events $eventSymmetric
     */
    #[Lazy]
    protected $eventSymmetric;

    /**
     * Related medium
     *
     * @var Media $medium
     */
    #[Lazy]
    protected $medium;

    /**
     * Related medium
     *
     * @var Media $mediumSymmetric
     */
    #[Lazy]
    protected $mediumSymmetric;

    /**
     * Related Service
     *
     * @var Services $service
     */
    #[Lazy]
    protected $service;

    /**
     * Related Service
     *
     * @var Services $serviceSymmetric
     */
    #[Lazy]
    protected $serviceSymmetric;

    /**
     * Related Products
     *
     * @var Products $product
     */
    #[Lazy]
    protected $product;

    /**
     * Related symmetric products
     *
     * @var Products $productSymmetric
     */
    #[Lazy]
    protected $productSymmetric;

    /**
     * Related Publications
     *
     * @var Publications $publication
     */
    #[Lazy]
    protected $publication;

    /**
     * Related symmetric publication
     *
     * @var Publications $publicationSymmetric
     */
    #[Lazy]
    protected $publicationSymmetric;

    /**
     * getRole
     *
     * @return Roles $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * setRole
     *
     * @param Roles $role
     */
    public function setRole(Roles $role): void
    {
        $this->role = $role;
    }

    /**
     * getRoleFreetext
     *
     * @return string $roleFreetext
     */
    public function getRoleFreetext(): string
    {
        return $this->roleFreetext;
    }

    /**
     * setRoleFreetext
     *
     * @param string $roleFreetext
     */
    public function setRoleFreetext(string $roleFreetext): void
    {
        $this->roleFreetext = $roleFreetext;
    }

    /**
     * Returns the project
     *
     * @return Projects $project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Sets the project
     *
     * @param Projects $project
     */
    public function setProject(Projects $project): void
    {
        $this->project = $project;
    }

    /**
     * Returns the projectSymmetric
     *
     * @return Projects $projectSymmetric
     */
    public function getProjectSymmetric()
    {
        return $this->projectSymmetric;
    }

    /**
     * Sets the projectSymmetric
     *
     * @param Projects $projectSymmetric
     */
    public function setProjectSymmetric(Projects $projectSymmetric): void
    {
        $this->projectSymmetric = $projectSymmetric;
    }

    /**
     * Returns the person
     *
     * @return Persons $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the person
     *
     * @param Persons $person
     */
    public function setPerson(Persons $person): void
    {
        $this->person = $person;
    }

    /**
     * Returns the personSymmetric
     *
     * @return Persons $personSymmetric
     */
    public function getPersonSymmetric()
    {
        return $this->personSymmetric;
    }

    /**
     * Sets the personSymmetric
     *
     * @param Persons $personSymmetric
     */
    public function setPersonSymmetric(Persons $personSymmetric): void
    {
        $this->personSymmetric = $personSymmetric;
    }

    /**
     * Returns the person
     *
     * @return Hcards $hcard
     */
    public function getHcard()
    {
        return $this->hcard;
    }

    /**
     * Sets the person
     *
     * @param Hcards $hcard
     */
    public function setHcard(Hcards $hcard): void
    {
        $this->hcard = $hcard;
    }

    /**
     * Returns the person
     *
     * @return Units $unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Sets the person
     *
     * @param Units $unit
     */
    public function setUnit(Units $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * Returns the person
     *
     * @return Units $unitSymmetric
     */
    public function getUnitSymmetric()
    {
        return $this->unitSymmetric;
    }

    /**
     * Sets the person
     *
     * @param Units $unitSymmetric
     */
    public function setUnitSymmetric(Units $unitSymmetric): void
    {
        $this->unitSymmetric = $unitSymmetric;
    }

    /**
     * Returns the news
     *
     * @return News $news
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Sets the news
     *
     * @param News $news
     */
    public function setNews(News $news): void
    {
        $this->news = $news;
    }

    /**
     * Returns the newsSymmetric
     *
     * @return News $newsSymmetric
     */
    public function getNewsSymmetric()
    {
        return $this->newsSymmetric;
    }

    /**
     * Sets the newsSymmetric
     *
     * @param News $newsSymmetric
     */
    public function setNewsSymmetric(News $newsSymmetric): void
    {
        $this->newsSymmetric = $newsSymmetric;
    }

    /**
     * Returns the event
     *
     * @return Events $event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the event
     *
     * @param Events $event
     */
    public function setEvent(Events $event): void
    {
        $this->event = $event;
    }

    /**
     * Returns the eventSymmetric
     *
     * @return Events $eventSymmetric
     */
    public function getEventSymmetric()
    {
        return $this->eventSymmetric;
    }

    /**
     * Sets the eventSymmetric
     *
     * @param Events $eventSymmetric
     */
    public function setEventSymmetric(Events $eventSymmetric): void
    {
        $this->eventSymmetric = $eventSymmetric;
    }

    /**
     * Returns the medium
     *
     * @return Media $medium
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Sets the medium
     *
     * @param Media $medium
     */
    public function setMedium(Media $medium): void
    {
        $this->medium = $medium;
    }

    /**
     * Returns the mediumSymmetric
     *
     * @return Media $mediumSymmetric
     */
    public function getMediumSymmetric()
    {
        return $this->mediumSymmetric;
    }

    /**
     * Sets the mediumSymmetric
     *
     * @param Media $mediumSymmetric
     */
    public function setMediumSymmetric(Media $mediumSymmetric): void
    {
        $this->mediumSymmetric = $mediumSymmetric;
    }

    /**
     * Returns the service
     *
     * @return Services $service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Sets the service
     *
     * @param Services $service
     */
    public function setService(Services $service): void
    {
        $this->service = $service;
    }

    /**
     * Returns the serviceSymmetric
     *
     * @return Services $serviceSymmetric
     */
    public function getServiceSymmetric()
    {
        return $this->serviceSymmetric;
    }

    /**
     * Sets the serviceSymmetric
     *
     * @param Services $serviceSymmetric
     */
    public function setServiceSymmetric(Services $serviceSymmetric): void
    {
        $this->serviceSymmetric = $serviceSymmetric;
    }

    /**
     * Returns the product
     *
     * @return Products $product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the product
     *
     * @param Products $product
     */
    public function setProduct(Products $product): void
    {
        $this->product = $product;
    }

    /**
     * Returns the productSymmetric
     *
     * @return Products $productSymmetric
     */
    public function getProductSymmetric()
    {
        return $this->productSymmetric;
    }

    /**
     * Sets the productSymmetric
     *
     * @param Products $productSymmetric
     */
    public function setProductSymmetric(Products $productSymmetric): void
    {
        $this->productSymmetric = $productSymmetric;
    }

    /**
     * Returns the publication
     *
     * @return Publications $publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Sets the publication
     *
     * @param Publications $publication
     */
    public function setPublication(Publications $publication): void
    {
        $this->publication = $publication;
    }

    /**
     * Returns the publicationSymmetric
     *
     * @return Publications $publicationSymmetric
     */
    public function getPublicationSymmetric()
    {
        return $this->publicationSymmetric;
    }

    /**
     * Sets the publicationSymmetric
     *
     * @param Publications $publicationSymmetric
     */
    public function setPublicationSymmetric(Publications $publicationSymmetric): void
    {
        $this->publicationSymmetric = $publicationSymmetric;
    }
}
