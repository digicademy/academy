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

class HcardsAdrcomponents extends AbstractValueObject
{

    /**
     * The label of the address
     *
     * @var \integer $parent
     */
    protected $parent;

    /**
     * The type of the address component
     *
     * @var \integer $type
     */
    protected $type;

    /**
     * The value of the component
     *
     * @var \string $value
     */
    protected $value;

    /**
     * Returns the parent
     *
     * @return \integer $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Sets the parent
     *
     * @param \integer $parent
     *
     * @return void
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
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
     * Returns the value
     *
     * @return \string $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value
     *
     * @param \string $value
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
