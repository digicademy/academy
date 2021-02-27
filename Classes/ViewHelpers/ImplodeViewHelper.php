<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Torsten Schrade <Torsten.Schrade@adwmainz.de>
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

class ImplodeViewHelper extends AbstractViewHelper
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
            'glue',
            'string',
            'Char to glue pieces',
            true
        );
        $this->registerArgument(
            'pieces',
            'array',
            'Array to implode',
            false,
            []
        );
    }

    /**
     * @return string The imploded array
     */
    public function render(): string
    {
        return implode($this->arguments['glue'], $this->arguments['pieces']);
    }
}
