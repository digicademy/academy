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
    TypeTrait
};
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Represents an hCard address (postal, po, etc.)
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 * @author Linnaea Söhn <linnaea.soehn@adwmainz.de>
 */

class HcardsAdr extends AbstractValueObject
{
    use LabelTrait;
    use TypeTrait;

    /**
     * The name of the organisation
     *
     * @var string $org
     */
    protected string $org;

    /**
     * Address components
     *
     * @var ObjectStorage<HcardsAdrcomponents>
     */
    #[Lazy]
    protected ObjectStorage $adrcomponents;

    /**
     * Returns the org
     *
     * @return string $org
     */
    public function getOrg(): string
    {
        return $this->org;
    }

    /**
     * Sets the org
     *
     * @param string $org
     */
    public function setOrg(string $org): void
    {
        $this->org = $org;
    }

    /**
     * Returns the address components
     *
     * @return ObjectStorage<HcardsAdrcomponents>
     */
    public function getAdrcomponents(): ObjectStorage
    {
        return $this->adrcomponents;
    }

    /**
     * Sets the address components
     *
     * @param ObjectStorage<HcardsAdrcomponents> $adrcomponents
     */
    public function setAdrcomponents(ObjectStorage $adrcomponents): void
    {
        $this->adrcomponents = $adrcomponents;
    }
}
