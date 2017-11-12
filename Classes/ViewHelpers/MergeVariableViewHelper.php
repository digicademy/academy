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

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Extbase\Utility\ArrayUtility;

class MergeVariableViewHelper extends AbstractViewHelper
{

    /**
     * Merges array2 with array1; array1 is an existing variable in the current template variable container and the key of the argument
     * is used to identify it. If it can't be identified, nothing happens. Zeros, NULL and empty values in the melted array can be removed
     * using the according arguments.
     *
     * @param array   $array1
     * @param array   $array2
     * @param boolean $removeEmptyElements
     * @param boolean $keepZeros
     *
     * @return void
     */
    public function render($array1, $array2, $removeEmptyElements = false, $keepZeros = true)
    {

        // get the key of array1 to identify which variable to replace
        $key = key($array1);

        if ($this->templateVariableContainer->exists($key) && count($array2) > 0) {
            // first remove the identified variable from the current container
            $this->templateVariableContainer->remove($key);
            // melt both arrays
            $melt = ArrayUtility::arrayMergeRecursiveOverrule($array1[$key], $array2);
            // possibly remove zeros, NULL and empty values
            if ($removeEmptyElements === true && $keepZeros === true) {
                $melt = array_diff($melt, array(''));
            } elseif ($removeEmptyElements === true && $keepZeros === false) {
                $melt = array_filter($melt);
            }
            // write the melted variable back the current container
            $this->templateVariableContainer->add($key, $melt);
        }

        return;
    }
}
