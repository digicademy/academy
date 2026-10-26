<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2026 Academy of Sciences and Literature | Mainz
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

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * A date range ("from–to" with an optional free-text label) of an academy record,
 * e.g. the life span of a person or the duration of a project.
 *
 * Replaces Digicademy\ChfTime\Domain\Model\DateRanges with the same property names and
 * getters for label, start and end date, so templates using {record.dateRange.label},
 * {record.dateRange.datingFrom} and {record.dateRange.datingTo} keep working.
 * Dates are stored as strings (usually "YYYY-MM-DD"), not as date types.
 *
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 */
class DateRanges extends AbstractValueObject
{
    /**
     * Free-text label, e.g. "2021–2025"
     */
    protected string $label = '';

    /**
     * Start date of the range
     */
    protected string $datingFrom = '';

    /**
     * End date of the range
     */
    protected string $datingTo = '';

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getDatingFrom(): string
    {
        return $this->datingFrom;
    }

    public function setDatingFrom(string $datingFrom): void
    {
        $this->datingFrom = $datingFrom;
    }

    public function getDatingTo(): string
    {
        return $this->datingTo;
    }

    public function setDatingTo(string $datingTo): void
    {
        $this->datingTo = $datingTo;
    }
}
