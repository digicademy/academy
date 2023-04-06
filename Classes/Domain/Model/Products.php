<?php

namespace Digicademy\Academy\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2021 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature | Mainz
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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use Digicademy\ChfTime\Domain\Model\DateRanges;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Products extends AbstractEntity
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
     * The identifier of the project
     *
     * @var \string $identifier
     */
    protected $identifier;

    /**
     * The title of the project
     *
     * @var \string $title
     * @Extbase\Validate("NotEmpty")
     */
    protected $title;

    /**
     * An acronym for the project
     *
     * @var \string $acronym
     */
    protected $acronym;

    /**
     * @var \string $slug
     */
    protected $slug;

    /**
     * The internal sorting for project list (if not alphabetic)
     *
     * @var \string $sorting
     */
    protected $sorting;

    /**
     * A description of the projects scientific activities
     *
     * @var \string $description
     */
    protected $description;

    /**
     * A version of the product
     *
     * @var \string $version
     */
    protected $version;

    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @Extbase\ORM\Lazy
     */
    protected $image = null;

    /**
     * Duration of the project
     *
     * @var \Digicademy\ChfTime\Domain\Model\DateRanges $dateRange
     */
    protected $dateRange = null;

    /**
     * The page where the project details are listed
     *
     * @var \integer $page
     */
    protected $page;

    /**
     * Relations of the project with persons, events, news, media etc.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations>
     * @Extbase\ORM\Lazy
     */
    protected $relations = null;

    /**
     * Selected categories for the project
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
     * Returns the identifier
     *
     * @return \string $identifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Sets the identifier
     *
     * @param \string $identifier
     *
     * @return void
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Returns the title
     *
     * @return \string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param \string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the version
     *
     * @return \string $version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the version
     *
     * @param \string $version
     *
     * @return void
     */
    public function setVersion($version)
    {
        $this->version = $version;
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
     * Returns the slug
     *
     * @return \string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     *
     * @param \string $slug
     *
     * @return void
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * Returns the relations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\Relations> $relations
     */
    public function getRelations()
    {
        $objectStorage = GeneralUtility::makeInstance(ObjectStorage::class);
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $relationsRepository = $objectManager->get(RelationsRepository::class);
        $symmetricRelations = $relationsRepository->findByProjectSymmetric($this);
        if ($symmetricRelations) {
            foreach ($symmetricRelations as $symmetricRelation) {
                $this->relations->attach($symmetricRelation);
            }
        }
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
