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

/**
 * Fuses several relations to the same project or unit into one relation (array) and thereby collects all roles.
 * Generic would be something different, but - oh well.
 */

class FuseRelationsViewHelper extends AbstractViewHelper
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
            'array',
            'Array of relations',
            true
        );
        $this->registerArgument(
            'type',
            'string',
            'Type of relation',
            true
        );
    }

    /**
     * @return array
     * @throws
     */
    public function render(): array
    {
        $relations = $this->arguments['relations'];
        $type = $this->arguments['type'];

        $fusedRelations = array();

        if (count($relations) > 1) {

            foreach ($relations as $relation) {

                switch ($type) {

                    case 'project':

                        if (is_object($relation->getProject())) {

                            $project = $relation->getProject();

                            if ($relation->getRoleFreetext()) {
                                $fusedRelations[$project->getUid()]['project']['roles'][] = $relation->getRoleFreetext();
                            } elseif ($relation->getRole()) {
                                $fusedRelations[$project->getUid()]['project']['roles'][] = $relation->getRole()->getTitle();
                            }
                            $fusedRelations[$project->getUid()]['project']['title'] = $project->getTitle();
                            $fusedRelations[$project->getUid()]['project']['page'] = $project->getPage();
                            $fusedRelations[$project->getUid()]['project']['description'] = $project->getDescription();
                        }

                        break;

                    case 'unit':

                        if (is_object($relation->getUnit())) {

                            $unit = $relation->getUnit();

                            if ($relation->getRoleFreetext()) {
                                $fusedRelations[$unit->getUid()]['unit']['roles'][] = $relation->getRoleFreetext();
                            } elseif ($relation->getRole()) {
                                $fusedRelations[$unit->getUid()]['unit']['roles'][] = $relation->getRole()->getTitle();
                            }
                            $fusedRelations[$unit->getUid()]['unit']['title'] = $unit->getTitle();
                            $fusedRelations[$unit->getUid()]['unit']['page'] = $unit->getPage();
                            $fusedRelations[$unit->getUid()]['unit']['uid'] = $unit->getUid();
                        }

                        break;

                    default:
                        throw new Exception('Invalid value for type.', 1380654017);
                        break;
                }
            }

        } else {
            $fusedRelations = $relations;
        }

        return $fusedRelations;
    }
}
