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

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

class HcardsAdr extends AbstractValueObject
{

    /**
     * The label of the address
     *
     * @var \string $label
     */
    protected $label;

    /**
     * The name of the organisation
     *
     * @var \string $org
     */
    protected $org;

    /**
     * The type of the address
     *
     * @var \integer $type
     */
    protected $type;

    /**
     * Address components
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdrcomponents>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $adrcomponents = null;

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
     * Returns the org
     *
     * @return \string $org
     */
    public function getOrg()
    {
        return $this->org;
    }

    /**
     * Sets the org
     *
     * @param \string $org
     *
     * @return void
     */
    public function setOrg($org)
    {
        $this->org = $org;
    }

    /**
     * Returns the type
     *
     * @return \integer $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \integer $type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the address components
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdrcomponents> $adrcomponents
     */
    public function getAdrcomponents()
    {
        return $this->adrcomponents;
    }

    /**
     * Sets the address components
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Digicademy\Academy\Domain\Model\HcardsAdrcomponents> $adrcomponents
     *
     * @return void
     */
    public function setAdrcomponents($adrcomponents)
    {
        $this->adrcomponents = $adrcomponents;
    }
}
