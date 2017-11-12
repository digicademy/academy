<?php

namespace Digicademy\Academy\Domain\Repository;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

class CommonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Finds selected objects
     *
     * @param string $selectedObjects
     *
     * @return object
     */
    public function findBySelection($selectedObjects)
    {

        $query = $this->createQuery();

        $constraints = array();

        $selectedObjects = GeneralUtility::trimExplode(',', $selectedObjects);

        foreach ($selectedObjects as $selectedObject) {
            $constraints[] = $query->equals('uid', $selectedObject);
        }

        $query->matching(
            $query->logicalOr($constraints)
        );

        $result = $query->execute();

        return $result;
    }

    /**
     * Finds objects based on selected categories
     *
     * @param string $selectedCategories
     *
     * @return object
     */
    public function findByCategories($selectedCategories)
    {

        $query = $this->createQuery();

        $constraints = array();

        $selectedCategories = GeneralUtility::trimExplode(',', $selectedCategories);

        foreach ($selectedCategories as $selectedCategory) {
            $constraints[] = $query->contains('categories', $selectedCategory);
        }
// TODO: implement OR mode as well
        $query->matching(
            $query->logicalAnd($constraints)
        );

        $result = $query->execute();

        return $result;
    }

    /**
     * Finds objects based on a specific role/relation
     *
     * @param integer $role
     *
     * @return object
     */
    public function findByRole($role)
    {
// TODO: change this to allow multiple selected roles
        $query = $this->createQuery();

        $constraints = array();
        $constraints[] = $query->equals('relations.role', $role);

        $query->matching(
            $query->logicalAnd($constraints)
        );

        $result = $query->execute();

        return $result;
    }
}
