<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2021 Torsten Schrade <Torsten.Schrade@adwmainz.de>
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

class RelationsByRoleViewHelper extends AbstractViewHelper
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
            'relations',
            'TYPO3\CMS\Extbase\Persistence\ObjectStorage',
            '',
            true
        );
        $this->registerArgument(
            'roleUid',
            'integer',
            '',
            true
        );
    }

    /**
     * @return array
     */
    public function render()
    {
        $relations = $this->arguments['relations'];
        $roleUid = $this->arguments['roleUid'];

        $relationsByRole = array();

        if ($relations->count() > 0) {
            foreach ($relations as $relation) {
                if ($relation->getRole()->getUid() == $roleUid) {
                    $relationsByRole[] = $relation;
                }
            }
        }
        return $relationsByRole;
    }
}
