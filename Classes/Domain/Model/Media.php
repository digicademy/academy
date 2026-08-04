<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2011-2025 Academy of Sciences and Literature | Mainz
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 medium. The TYPO3 medium is
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

use Digicademy\Academy\Domain\Model\Traits\{CategoriesTrait,
    DescriptionTrait,
    ImageTrait,
    PageTrait,
    PersistentIdentifierTrait,
    RelationsTrait,
    SlugTrait,
    SortingTrait,
    TitleTrait,
    TypeTrait};
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Represents a CRIS medium like scientific videos, audios, documents etc.
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 * @author Linnaea Söhn <linnaea.soehn@adwmainz.de>
 */

class Media extends AbstractEntity
{
    use CategoriesTrait;
    use DescriptionTrait;
    use ImageTrait;
    use PageTrait;
    use PersistentIdentifierTrait;
    use RelationsTrait;
    use TitleTrait;
    use SlugTrait;
    use SortingTrait;
    use TypeTrait;

    // note: this logic appears not to be needed any more in TYPO3 12.4
    // symmetric relations seem to be fetched just as asymmetric relations
    // @TODO Team note: if it was used, it should not contain the database field name but the propertyName
    // protected const RELATIONS_CRITERION = 'mediumSymmetric';

    /**
     * Creation date of the media object
     *
     * @var int $crdate
     */
    protected $crdate;

    /**
     * Files
     *
     * @var ObjectStorage<FileReference>
     */
    #[Extbase\ORM\Lazy]
    protected $files;

    /**
     * File collections
     *
     * @var ObjectStorage<FileCollection>
     */
    #[Extbase\ORM\Lazy]
    protected $collections;

    /**
     * Returns the crdate
     *
     * @return int $crdate
     */
    public function getCrdate(): int
    {
        return $this->crdate;
    }

    /**
     * Sets the crdate
     *
     * @param int $crdate
     */
    public function setCrdate(int $crdate): void
    {
        $this->crdate = $crdate;
    }

    /**
     * Returns the files
     *
     * @return ObjectStorage<FileReference> $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the files
     *
     * @param ObjectStorage<FileReference> $files
     */
    public function setFiles($files): void
    {
        $this->files = $files;
    }

    /**
     * Returns the collections
     *
     * @return ObjectStorage<FileCollection> $collections
     */
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * Sets the collections
     *
     * @param ObjectStorage<FileCollection> $collections
     */
    public function setCollections($collections): void
    {
        $this->collections = $collections;
    }
}
