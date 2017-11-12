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

class FormatAdrComponentsViewHelper extends AbstractViewHelper
{

    /**
     * @param object $components
     *
     * @return string
     */
    public function render($components)
    {

        $componentsArray = array(
            'pobox' => array(),
            'ext' => array(),
            'street' => array(),
            'locality' => array(),
            'region' => array(),
            'code' => array(),
            'country' => array(),
        );

        foreach ($components as $component) {
            switch ($component->getType()) {
                case 1:
                    $componentsArray['street'][] = $component->getValue();
                    break;
                case 2:
                    $componentsArray['code'][] = $component->getValue();
                    break;
                case 3:
                case 7:
                    $componentsArray['locality'][] = $component->getValue();
                    break;
                case 4:
                    $componentsArray['country'][] = $component->getValue();
                    break;
                case 5:
                    $componentsArray['pobox'][] = $component->getValue();
                    break;
                case 6:
                    $componentsArray['ext'][] = $component->getValue();
                    break;
                case 8:
                    $componentsArray['region'][] = $component->getValue();
                    break;
            }
        }

        foreach ($componentsArray as $key => $fields) {
            $componentsArray[$key] = implode('\n', $fields);
        }

        return implode(';', $componentsArray);
    }
}
