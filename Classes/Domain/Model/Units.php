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

class Units extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * The title of the unit
     *
     * @var \string $title
     * @validate NotEmpty
     */
    protected $title;

    /**
     * An acronym for the unit
     *
     * @var \string $acronym
     */
    protected $acronym;

    /**
     * The internal sorting for unit list (if not alphabetic)
     *
     * @var \string $sorting
     */
    protected $sorting;

    /**
     * A description of the units activities
     *
     * @var \string $description
     */
    protected $description;

    /**
     * The page where the unit details are listed
     *
     * @var \integer $page
     */
    protected $page;

    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
     */
    protected $image = null;

    /**
     * Relations of the unit with persons, events, news, media etc.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations>
     * @lazy
     */
    protected $relations = null;

    /**
     * Selected categories for the unit
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Categories>
     * @lazy
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
     * Sets the title
     *
     * @return void
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the title
     *
     * @return \string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the acronym
     *
     * @return \string $acronym
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * Sets the acronym
     *
     * @param \string $acronym
     *
     * @return void
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    }

    /**
     * Returns the sorting
     *
     * @return \string $sorting
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets the sorting
     *
     * @param \string $sorting
     *
     * @return void
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * Returns the description
     *
     * @return \string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param \string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
