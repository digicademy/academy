<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2011-2026 Academy of Sciences and Literature | Mainz
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

namespace Digicademy\Academy\UserFunction\FormEngine;

use TYPO3\CMS\Backend\Utility\BackendUtility;

class ItemsProcFunc
{
    /**
     * Populates the template layout select field in the plugin FlexForm based on page TSconfig.
     *
     * Layouts can be defined globally for all entity types or restricted to a specific entity type.
     * The available layouts are configured via page TSconfig under tx_academy.templateLayouts.
     *
     * Example configuration:
     *
     * tx_academy.templateLayouts {
     *  list {
     *      # Global list layout available for all entity types
     *      10 = List
     *      20 = Tiles
     *
     *      # List layouts specific to the 'units' entity type
     *      units {
     *          10 = Logo List
     *      }
     *
     *      # List layouts specific to the 'persons' entity type
     *      persons {
     *          10 = Card
     *      }
     *  }
     *  show {
     *      # Global show layout for all entity types
     *      10 = Default
     *
     *      # Show layouts specific to the "units" entity type
     *      units {
     *          10 = Compact
     *      }
     *  }
     * }
     *
     * @param array $params Parameters passed by the itemsProcFunc callback, items are passed by reference
     */
    public function getTemplateLayoutItems(array &$params): void
    {
        // Retrieve the effective page ID to load the correct page TSconfig for template layouts
        $pageId = (int)($params['effectivePid'] ?? 0);

        $pageTsConfig = BackendUtility::getPagesTSconfig($pageId);

        $templateLayouts = [];
        if ($params['flexParentDatabaseRow']['list_type'] === 'academy_list') {
            $templateLayouts = $pageTsConfig['tx_academy.']['templateLayouts.']['list.'] ?? [];
        } elseif ($params['flexParentDatabaseRow']['list_type'] === 'academy_show') {
            $templateLayouts = $pageTsConfig['tx_academy.']['templateLayouts.']['show.'] ?? [];
        }

        if (empty($templateLayouts)) {
            return;
        }

        // Determine entity type
        $entityType = strtolower($this->getEntityType($params));

        foreach ($templateLayouts as $key => $value) {
            $key = rtrim($key, '.');

            if (is_array($value)) {
                // entity specific layouts (e.g. units.10 = list, units.20 = tiles)
                if (strtolower($key) === $entityType) {
                    foreach ($value as $subKey => $subLabel) {
                        if (is_string($subLabel)) {
                            $params['items'][] = [
                                'label' => $subLabel,
                                'value' => $key . '_' . $subKey,
                            ];
                        }
                    }
                }
            } else {
                // global layout for all entities
                $params['items'][] = [
                    'label' => $value,
                    'value' => $key,
                ];
            }
        }
    }

    /**
     * Retrieves the entity type from the FlexForm data of the parent database row.
     *
     * @param array $params Parameters passed by the itemsProcFunc callback
     * @return string The entity type identifier, or an empty string if not set
     */
    private function getEntityType(array $params): string
    {
        $flexRow = $params['flexParentDatabaseRow'] ?? [];

        $flexData = $flexRow['pi_flexform'] ?? [];
        if (is_array($flexData)) {
            // Returns the selected entity type. Defaults to 'persons' to avoid returning NULL when unsaved.
            return (string)(
                $flexData['data']['sDEF']['lDEF']['settings.entityType']['vDEF'][0]
                ?? 'persons'
            );
        }

        return '';
    }
}
