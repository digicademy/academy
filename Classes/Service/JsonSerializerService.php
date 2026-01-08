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

/**
 * Service for serializing Academy entities to JSON-ready arrays.
 * Uses reflection to call all getter methods and includes scalar values,
 * with special handling for image URLs.
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
            } elseif (gettype($entityPropertyValue) !== 'object') {
                // Include scalar values (string, int, bool, null, etc.)
                $propertyName = lcfirst(substr($getter, 3));
                $jsonValues[$propertyName] = $entityPropertyValue;
            }
        }

        return $jsonValues;
    }
}
