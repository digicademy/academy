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

class Hcards extends AbstractEntity
{

    /**
     * persistentIdentifier
     *
     * @var \string
     *
     * @TYPO3\\CMS\\Extbase\\Annotation\\Validate NotEmpty
     */
    protected $persistentIdentifier;

    /**
     * The label of the hcard
     *
     * @var \string $label
     * @TYPO3\\CMS\\Extbase\\Annotation\\Validate NotEmpty
     */
    protected $label;

    /**
     * The type of the hcard
     *
     * @var integer $type
     */
    protected $type;

    /**
     * Addresses
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdr>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $adr = null;

    /**
     * Telefone numbers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsTel>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $tel = null;

    /**
     * Email Addresses
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsEmail>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $email = null;

    /**
     * URLs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsUrl>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $url = null;

    /**
     * Geo coordinates
     *
     * @var \string $geo
     */
    protected $geo;

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
     * Returns the label
     *
     * @return \string $label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Sets the label
     *
     * @param \string $label
     *
     * @return void
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Returns the type
     *
     * @return \string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \string $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the addresses
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdr> $adr
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * Sets the addresses
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdr> $adr
     *
     * @return void
     */
    public function setAdr($adr)
    {
        $this->adr = $adr;
    }

    /**
     * Returns the telephone numbers
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsTel> $tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Sets the telephone numbers
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsTel> $tel
     *
     * @return void
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Returns the email addresses
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsEmail> $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email addresses
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsEmail> $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the urls
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsUrl> $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the urls
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsUrl> $url
     *
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returns geo
     *
     * @return \string $geo
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * Sets geo
     *
     * @param \string $geo
     *
     * @return void
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
    }
}
