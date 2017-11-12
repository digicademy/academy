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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class MediaRepository extends CommonRepository
{

    protected $defaultOrderings = array('crdate' => QueryInterface::ORDER_DESCENDING);

    /**
     * Finds 20 most recent objects grouped by media type
     *
     * @return array
     */
    public function findGrouped()
    {

        $query10 = $this->createQuery();
        $query10->matching($query10->equals('type', 10));
        $result[10] = $query10->setLimit(5)->execute();

        $query20 = $this->createQuery();
        $query20->matching($query20->equals('type', 20));
        $result[20] = $query20->setLimit(5)->execute();

        $query30 = $this->createQuery();
        $query30->matching($query30->equals('type', 30));
        $result[30] = $query30->setLimit(5)->execute();

        $query40 = $this->createQuery();
        $query40->matching($query40->equals('type', 40));
        $result[40] = $query40->setLimit(5)->execute();

        return $result;
    }

    /**
     * Finds 2 most recent objects
     *
     * @return object
     */
    public function findRecent()
    {
        $query = $this->createQuery();
        $result = $query->setLimit(2)->execute();

        return $result;
    }

    /**
     * Finds media by type
     *
     * @param integer $type
     *
     * @return object
     */
    public function findByType($type)
    {
        $query = $this->createQuery();
        $query->setOrderings(array('title' => QueryInterface::ORDER_ASCENDING));
        $query->matching(
            $query->equals('type', $type)
        );
        $result = $query->execute();

        return $result;
    }

}
