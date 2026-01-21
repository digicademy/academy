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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * A repository with common find methods for all CRIS entities
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 */

class CommonRepository extends Repository
{

    /**
     * Finds selected objects
     * @TODO: deprecated - surpassed by the new filter functionality/service
     *
     * @param string $selectedObjects
     *
     * @return object
     */
    public function findBySelection(string $selectedObjects): object
    {
        $query = $this->createQuery();

        $constraints = array();

        $selectedObjects = GeneralUtility::trimExplode(',', $selectedObjects);

        foreach ($selectedObjects as $selectedObject) {
            $constraints[] = $query->equals('uid', $selectedObject);
        }

        $query->matching(
            $query->logicalOr(...array_values($constraints))
        );

        $result = $query->execute();

        return $result;
    }

    /**
     * Finds objects based on selected categories
     * @TODO: deprecated - surpassed by the new filter functionality/service
     *
     * @param string $selectedCategories
     *
     * @return object
     * @throws InvalidQueryException
     */
    public function findByCategories(string $selectedCategories): object
    {
        $query = $this->createQuery();

        $constraints = array();

        $selectedCategories = GeneralUtility::trimExplode(',', $selectedCategories);

        foreach ($selectedCategories as $selectedCategory) {
            $constraints[] = $query->contains('categories', $selectedCategory);
        }

        // @TODO: implement OR mode as well
        $query->matching(
            $query->logicalAnd(...array_values($constraints))
        );

        $result = $query->execute();

        return $result;
    }

    /**
     * Finds objects based on a specific role/relation
     * @TODO: deprecated - surpassed by the new filter functionality/service
     *
     * @param integer $role
     *
     * @return object
     */
    public function findByRole(int $role): object
    {
        // @TODO: change this to allow multiple selected roles
        $query = $this->createQuery();

        $constraints = array();
        $constraints[] = $query->equals('relations.role', $role);

        $query->matching(
            $query->logicalAnd(...array_values($constraints))
        );

        $result = $query->execute();

        return $result;
    }

    /**
     * Generic filter method for all CRIS entities in the research domain.
     * Filters entities based on configured filters. A filter always consists of
     * attributes related to CRIS entities such as categories, roles or dedicated
     * entities that have been selected in the according plugins.
     *
     * @see FilterService on how the configuration should look like
     *
     * @param array $filters
     *
     * @return object
     * @throws InvalidQueryException
     */
    public function findByFilters(array $filters): object
    {
        $query = $this->createQuery();
        $outerConstraints = [];

        if (array_key_exists('selectedCategories', $filters) && !empty($filters['selectedCategories'])) {
            $innerConstraints = [];
            $selectedCategories = GeneralUtility::trimExplode(',', $filters['selectedCategories']);
            foreach ($selectedCategories as $selectedCategory) {
                $innerConstraints[] = $query->contains('categories', $selectedCategory);
            }
            // for multiple selected categories: AND
            (count($innerConstraints) > 1) ?
                $outerConstraints[] = $query->logicalAnd(...array_values($innerConstraints))
                : $outerConstraints[] = $innerConstraints[0];
        }

        if (array_key_exists('selectedEntities', $filters) && !empty($filters['selectedEntities'])) {
            $innerConstraints = [];
            $selectedEntities = preg_replace('/tx_academy_domain_model_.*?_/','', $filters['selectedEntities']);
            $selectedEntities = GeneralUtility::trimExplode(',', $selectedEntities);
            foreach ($selectedEntities as $selectedEntity) {
                $innerConstraints[] = $query->equals('uid', $selectedEntity);
            }
            // for multiple selected entities: OR
            (count($innerConstraints) > 1) ?
                $outerConstraints[] = $query->logicalOr(...array_values($innerConstraints))
                : $outerConstraints[] = $innerConstraints[0];
        }

        if (array_key_exists('selectedRoles', $filters) && !empty($filters['selectedRoles'])) {
            $innerConstraints = [];
            $roles = GeneralUtility::trimExplode(',', $filters['selectedRoles']);
            foreach ($roles as $role) {
                $innerConstraints[] = $query->equals('relations.role', $role);
            }
            // for multiple selected roles: AND
            (count($innerConstraints) > 1) ?
                $outerConstraints[] = $query->logicalAnd(...array_values($innerConstraints))
                : $outerConstraints[] = $innerConstraints[0];
        }

        # keyword search filter for entities
        if (array_key_exists('searchQuery', $filters) && !empty($filters['searchQuery'])) {
            $searchQuery = $filters['searchQuery'];
            $innerConstraints = [];
            $entitySpecificFields = [];
            // set constraint only if we have properties
            $entitySpecificFields = $this->getEntitySpecificFields();
            if (count($entitySpecificFields) > 0) {
                foreach ($entitySpecificFields as $field) {
                    $innerConstraints[] = $query->like($field, '%' . $searchQuery . '%');
                }
                $outerConstraints[] = $query->logicalOr(...array_values($innerConstraints));
            }
        }

        # date filtering for News and Events entities
        if (static::class === NewsRepository::class || static::class === EventsRepository::class) {
            if (array_key_exists('startDate', $filters) && !empty($filters['startDate'])) {
                try {
                    $startDateTime = new \DateTime($filters['startDate'] . ' 00:00:00');
                    $outerConstraints[] = $query->greaterThanOrEqual('datetime', $startDateTime);
                } catch (\Exception $e) {
                    // Invalid date format - skip this filter
                }
            }

            if (array_key_exists('endDate', $filters) && !empty($filters['endDate'])) {
                try {
                    $endDateTime = new \DateTime($filters['endDate'] . ' 23:59:59');
                    $outerConstraints[] = $query->lessThanOrEqual('datetime', $endDateTime);
                } catch (\Exception $e) {
                    // Invalid date format - skip this filter
                }
            }
        }

        // Note: PID filtering is handled via QuerySettings (setStoragePageIds) in the middleware,
        // not as a query constraint here

        // Only apply matching constraints if we have any
        if (count($outerConstraints) > 0) {
            $query->matching(
                $query->logicalAnd(...array_values($outerConstraints))
            );
        }

        $result = $query->execute();

        return $result;
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

        $entitySpecificFields = $this->getEntitySpecificFields();
        foreach ($entitySpecificFields as $field) {
            $innerConstraints[] = $query->like($field, '%' . $arguments['query'] . '%');
        }
        $outerConstraints[] = $query->logicalOr(...array_values($innerConstraints));

        $query->matching(
            $query->logicalAnd(...array_values($outerConstraints))
        );

        $query->setLimit((int)$arguments['limit']);

        $result = $query->execute();

        return $result;
    }

    /**
     * @return array|string[]
     */
    protected function getEntitySpecificFields(): array
    {
        return match (static::class) {
            PersonsRepository::class => ['givenName', 'additionalName', 'familyName'],
            PublicationsRepository::class => ['persistentIdentifier', 'title', 'subtitle', 'edition', 'series', 'description'],
            UnitsRepository::class,
            ProjectsRepository::class,
            MediaRepository::class,
            ProductsRepository::class,
            ServicesRepository::class => ['persistentIdentifier', 'title', 'description'],
            HcardsRepository::class => ['persistentIdentifier', 'label'],
            NewsRepository::class => ['title', 'teaser', 'bodytext'],
            EventsRepository::class => ['title', 'teaser', 'bodytext', 'organizerSimple', 'locationSimple'],
            default => [],
        };
    }

}
