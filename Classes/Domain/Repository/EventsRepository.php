<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2011-2025 Academy of Sciences and Literature | Mainz
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

namespace Digicademy\Academy\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\{
    QueryInterface,
    QueryResultInterface
};

/**
 * The repository for events in the research domain
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 */

class EventsRepository extends CommonRepository
{
    /**
     * Find all events ordered by datetime (most recent first)
     *
     * @return QueryResultInterface
     */
    public function findAll(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['datetime' => QueryInterface::ORDER_DESCENDING]);
        return $query->execute();
    }

    /**
     * @param array $arguments
     *
     * @return QueryResultInterface
     * @throws InvalidQueryException
     */
    public function searchAll(array $arguments): object
    {
        $query = $this->createQuery();

        $outerConstraints = [];
        $innerConstraints = [];

        $entitySpecificFields = parent::getEntitySpecificFields();
        foreach ($entitySpecificFields as $field) {
            $innerConstraints[] = $query->like($field, '%' . $arguments['query'] . '%');
        }
        $outerConstraints[] = $query->logicalOr(...array_values($innerConstraints));

        $outerConstraints[] = $query->equals('type', '3');

        $query->matching(
            $query->logicalAnd(...array_values($outerConstraints))
        );

        $query->setLimit((int)$arguments['limit']);

        $result = $query->execute();

        return $result;
    }

}
