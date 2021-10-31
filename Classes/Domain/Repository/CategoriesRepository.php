<?php

namespace Digicademy\Academy\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  Torsten Schrade <Torsten.Schrade@adwmainz.de>
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

use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use \TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class CategoriesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = array(
        'title' => QueryInterface::ORDER_ASCENDING
    );

    protected $childCategoryUids = [];

    /**
     * @param integer $categoryUid
     * @param integer $maxLevels
     * @param integer $getChildrenOnLevel
     *
     * @return array
     */
    public function findAllChildren($categoryUid, $maxLevels = 1, $getChildrenOnLevel = 0) {

        $this->childCategoryUids = [];

        $this->collectChildren($categoryUid, $maxLevels);

        if ($getChildrenOnLevel > 0 && $getChildrenOnLevel <= $maxLevels) {
            // extract specific level
            $result = $this->childCategoryUids[$getChildrenOnLevel];
        } else {
            // return all levels as two dimensional array (slice of level dimension)
            $result = array_merge(...$this->childCategoryUids);
        }

        return $result;
    }

    /**
     * @param integer $categoryUid
     * @param integer $maxLevels
     * @param integer $currentLevel
     *
     * @return boolean
     */
     protected function collectChildren($categoryUid, $maxLevels, $currentLevel = 1) {

        if ($currentLevel <= $maxLevels) {

            $query = $this->createQuery();

            $constraints = array();
            $constraints[] = $query->equals('parent', $categoryUid);

            $query->matching(
                $query->logicalAnd($constraints)
            );

            $queryResult = $query->execute();

            if ($queryResult) {
                foreach ($queryResult as $category) {
                    $categoryUid = $category->getUid();
                    $this->childCategoryUids[$currentLevel][] = $categoryUid;
                    self::collectChildren($categoryUid, $maxLevels, $currentLevel + 1);
                }
            }
        }

        return true;
     }

}
