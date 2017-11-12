<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <schradt@uni-mainz.de>
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

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception;

/* Copies the standard groupedFor view helper and adds iteration; needed for eventDateMenu */

class GroupedForViewHelper extends AbstractViewHelper
{

    /**
     * Iterates through elements of $each and renders child nodes
     *
     * @param array  $each      The array or \TYPO3\CMS\Extbase\Persistence\ObjectStorage to iterated over
     * @param string $as        The name of the iteration variable
     * @param string $groupBy   Group by this property
     * @param string $groupKey  The name of the variable to store the current group
     * @param string $iteration The name of the variable to store iteration information (index, cycle, isFirst, isLast, isEven, isOdd)
     *
     * @return string Rendered string
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
     * @api
     */
    public function render($each, $as, $groupBy, $groupKey = 'groupKey', $iteration = null)
    {
        $output = '';
        if ($each === null) {
            return '';
        }
        if (is_object($each)) {
            if (!$each instanceof \Traversable) {
                throw new Exception('GroupedForViewHelper only supports arrays and objects implementing \Traversable interface',
                    1253108907);
            }
            $each = iterator_to_array($each);
        }

        $groups = $this->groupElements($each, $groupBy);

        $iterationData = array(
            'index' => 0,
            'cycle' => 1,
            'total' => count($each)
        );

        foreach ($groups['values'] as $currentGroupIndex => $group) {
            $this->templateVariableContainer->add($groupKey, $groups['keys'][$currentGroupIndex]);
            $this->templateVariableContainer->add($as, $group);
            if ($iteration !== null) {
                $iterationData['isFirst'] = $iterationData['cycle'] === 1;
                $iterationData['isLast'] = $iterationData['cycle'] === $iterationData['total'];
                $iterationData['isEven'] = $iterationData['cycle'] % 2 === 0;
                $iterationData['isOdd'] = !$iterationData['isEven'];
                $this->templateVariableContainer->add($iteration, $iterationData);
                $iterationData['index']++;
                $iterationData['cycle']++;
            }
            $output .= $this->renderChildren();
            $this->templateVariableContainer->remove($groupKey);
            $this->templateVariableContainer->remove($as);
            if ($iteration !== null) {
                $this->templateVariableContainer->remove($iteration);
            }
        }

        return $output;
    }

    /**
     * Groups the given array by the specified groupBy property.
     *
     * @param array  $elements The array / traversable object to be grouped
     * @param string $groupBy  Group by this property
     *
     * @return array The grouped array in the form array('keys' => array('key1' => [key1value], 'key2' => [key2value], ...), 'values' => array('key1' => array([key1value] => [element1]), ...), ...)
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
     */
    protected function groupElements(array $elements, $groupBy)
    {
        $groups = array('keys' => array(), 'values' => array());
        foreach ($elements as $key => $value) {
            if (is_array($value)) {
                $currentGroupIndex = isset($value[$groupBy]) ? $value[$groupBy] : null;
            } elseif (is_object($value)) {
                $currentGroupIndex = ObjectAccess::getPropertyPath($value, $groupBy);
            } else {
                throw new Exception('GroupedForViewHelper only supports multi-dimensional arrays and objects',
                    1253120365);
            }
            $currentGroupKeyValue = $currentGroupIndex;
            if (is_object($currentGroupIndex)) {
                if ($currentGroupIndex instanceof LazyLoadingProxy) {
                    $currentGroupIndex = $currentGroupIndex->_loadRealInstance();
                }
                $currentGroupIndex = spl_object_hash($currentGroupIndex);
            }
            $groups['keys'][$currentGroupIndex] = $currentGroupKeyValue;
            $groups['values'][$currentGroupIndex][$key] = $value;
        }

        return $groups;
    }
}
