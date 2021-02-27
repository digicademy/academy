<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <Torsten.Schrade@adwmainz.de>
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

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class TestIfRelationsExistViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     *
     * @return void
     *
     * @throws Exception
     */
    public function initializeArguments()
    {
        $this->registerArgument(
            'relationNumbers',
            'string',
            'Number of relations',
            true
        );
        $this->registerArgument(
            'groupedRelations',
            'array',
            'Grouped relations',
            false,
            []
        );
    }

    /**
     * Tests if news, events or media exist in the submitted grouped relations array and returns TRUE if so
     *
     * @return boolean
     */
    public function render(): bool
    {
        $relationNumbers = $this->arguments['relationNumbers'];
        $groupedRelations = $this->arguments['groupedRelations'];

        $relationNumbersArray = GeneralUtility::trimExplode(',', $relationNumbers);

        foreach ($relationNumbersArray as $relationNumber) {
            if (array_key_exists($relationNumber, $groupedRelations)) {
                return true;
            }
        }

        return false;
    }
}
