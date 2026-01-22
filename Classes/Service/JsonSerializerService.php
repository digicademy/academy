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

namespace Digicademy\Academy\Service;

use Digicademy\Academy\Domain\Model\Categories;
use GeorgRinger\News\Domain\Model\Category as NewsCategory;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Service for serializing Academy entities to JSON-ready arrays.
 * Uses reflection to call all getter methods and includes scalar values,
 * with special handling for image URLs and media paths.
 *
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 */
class JsonSerializerService
{
    /**
     * Serialize an entity to a JSON-ready array by calling all getter methods.
     *
     * @param object $entity
     * @return array
     */
    public function serializeEntity(object $entity): array
    {
        $methods = get_class_methods($entity);
        $getters = array_filter($methods, function ($method) {
            return str_starts_with($method, 'get');
        });

        $jsonValues = [];
        foreach ($getters as $getter) {
            $entityPropertyValue = $entity->{$getter}();

            if ($getter === 'getImage') {
                // Extract image URLs from FileReference objects
                $jsonValues['image'] = [];
                if ($entityPropertyValue && method_exists($entityPropertyValue, 'toArray')) {
                    $fileReferences = $entityPropertyValue->toArray();
                    foreach ($fileReferences as $fileReference) {
                        if (method_exists($fileReference, 'getOriginalResource')) {
                            $originalResource = $fileReference->getOriginalResource();
                            if ($originalResource && method_exists($originalResource, 'getPublicUrl')) {
                                $jsonValues['image'][] = $originalResource->getPublicUrl();
                            }
                        }
                    }
                }
            } elseif ($getter === 'getMedia' || $getter === 'getFalMedia') {
                // Extract first media URL from FileReference objects for news/events
                $jsonValues['mediaPath'] = null;

                if ($entityPropertyValue && method_exists($entityPropertyValue, 'toArray')) {
                    $fileReferences = $entityPropertyValue->toArray();

                    // Get the FIRST media item only
                    if (!empty($fileReferences)) {
                        $firstFileReference = reset($fileReferences);

                        if (method_exists($firstFileReference, 'getOriginalResource')) {
                            $originalResource = $firstFileReference->getOriginalResource();

                            if ($originalResource && method_exists($originalResource, 'getPublicUrl')) {
                                $jsonValues['mediaPath'] = $originalResource->getPublicUrl();
                            }
                        }
                    }
                }
            } elseif ($getter === 'getCategories') {
                // Extract categories as array of simple objects with uid and title
                $jsonValues['categories'] = $this->serializeCategories($entityPropertyValue);
            } elseif (gettype($entityPropertyValue) !== 'object') {
                // Include scalar values (string, int, bool, null, etc.)
                $propertyName = lcfirst(substr($getter, 3));
                $jsonValues[$propertyName] = $entityPropertyValue;
            }
        }

        return $jsonValues;
    }

    /**
     * Serialize categories from ObjectStorage to array of simple objects.
     * Extracts uid, title, and parent uid from each category.
     * Supports both TYPO3 Category model and News extension Category model.
     *
     * @param ObjectStorage|null $categories
     * @return array
     */
    private function serializeCategories(?ObjectStorage $categories): array
    {
        // Handle null or empty ObjectStorage
        if ($categories === null || $categories->count() === 0) {
            return [];
        }

        $categoriesArray = [];

        // Iterate through ObjectStorage and extract category data
        foreach ($categories as $category) {
            // Handle TYPO3 Category (used by Academy entities)
            if ($category instanceof Category) {
                $parent = $category->getParent();
                $categoriesArray[] = [
                    'uid' => $category->getUid(),
                    'title' => $category->getTitle() ?? '',
                    'parentUid' => $parent ? $parent->getUid() : null,
                ];
            }
            // Handle News extension Category (used by News/Events)
            elseif ($category instanceof NewsCategory) {
                $parent = $category->getParentcategory();
                $categoriesArray[] = [
                    'uid' => $category->getUid(),
                    'title' => $category->getTitle() ?? '',
                    'parentUid' => $parent ? $parent->getUid() : null,
                ];
            }
        }

        return $categoriesArray;
    }
}
