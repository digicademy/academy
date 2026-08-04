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

use Digicademy\Academy\Domain\Model\Traits\{
    LabelTrait,
    PersistentIdentifierTrait,
    SlugTrait,
    TypeTrait
};
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * An hCard for embedded contact information according to
 * https://microformats.org/wiki/h-card
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 * @author Linnaea Söhn <linnaea.soehn@adwmainz.de>
 */

class Hcards extends AbstractEntity
{
    use LabelTrait;
    use PersistentIdentifierTrait;
    use SlugTrait;
    use TypeTrait;

    /**
     * Addresses
     *
     * @var ObjectStorage<HcardsAdr>
     */
    #[Lazy]
    protected ObjectStorage $adr;

    /**
     * Telefone numbers
     *
     * @var ObjectStorage<HcardsTel>
     */
    #[Lazy]
    protected ObjectStorage $tel;

    /**
     * Email Addresses
     *
     * @var ObjectStorage<HcardsEmail>
     */
    #[Lazy]
    protected ObjectStorage $email;

    /**
     * URLs
     *
     * @var ObjectStorage<HcardsUrl>
     */
    #[Lazy]
    protected ObjectStorage $url;

    /**
     * Geo coordinates
     *
     * @var string $geo
     */
    protected string $geo;

    /**
     * Returns the addresses
     *
     * @return ObjectStorage<HcardsAdr> $adr
     */
    public function getAdr(): ObjectStorage
    {
        return $this->adr;
    }

    /**
     * Sets the addresses
     *
     * @param ObjectStorage<HcardsAdr> $adr
     */
    public function setAdr(ObjectStorage $adr): void
    {
        $this->adr = $adr;
    }

    /**
     * Returns the telephone numbers
     *
     * @return ObjectStorage<HcardsTel> $tel
     */
    public function getTel(): ObjectStorage
    {
        return $this->tel;
    }

    /**
     * Sets the telephone numbers
     *
     * @param ObjectStorage<HcardsTel> $tel
     */
    public function setTel(ObjectStorage $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * Returns the email addresses
     *
     * @return ObjectStorage<HcardsEmail> $email
     */
    public function getEmail(): ObjectStorage
    {
        return $this->email;
    }

    /**
     * Sets the email addresses
     *
     * @param ObjectStorage<HcardsEmail> $email
     */
    public function setEmail(ObjectStorage $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns the urls
     *
     * @return ObjectStorage<HcardsUrl> $url
     */
    public function getUrl(): ObjectStorage
    {
        return $this->url;
    }

    /**
     * Sets the urls
     *
     * @param ObjectStorage<HcardsUrl> $url
     */
    public function setUrl(ObjectStorage $url): void
    {
        $this->url = $url;
    }

    /**
     * Returns geo
     *
     * @return string $geo
     */
    public function getGeo(): string
    {
        return $this->geo;
    }

    /**
     * Sets geo
     *
     * @param string $geo
     */
    public function setGeo(string $geo): void
    {
        $this->geo = $geo;
    }
}
