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

namespace Digicademy\Academy\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

class GroupRelationsViewHelper extends AbstractViewHelper
{

    public function __construct(private readonly \TYPO3\CMS\Core\Context\Context $context)
    {
    }
    /**
     * Initialize arguments
     *
     * @return void
     *
     * @throws Exception
     */
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'relations',
            'mixed',
            '',
            true
        );
        $this->registerArgument(
            'property',
            'string',
            '',
            false,
            'type'
        );
        $this->registerArgument(
            'as',
            'string',
            '',
            false,
            'groupedRelations'
        );
    }

    /**
     * @return void
     */
    public function render(): void
    {
        $relations = $this->arguments['relations'];
        $property = $this->arguments['property'];
        $as = $this->arguments['as'];

        $groupedRelations = [];
        $key = 0;

        if ($relations) {
            foreach ($relations as $relation) {

                // Access the current language UID and if relations language and
                // current language do not match skipp the relation. This becomes
                // important in scenarios where only one side of a relation is translated
                // (which unfortunately will result in all relations for all languages
                // being returned for the object from the side that is not translated)
                // example: person (not translated) < > projects (translated)
                $context = $this->context;
                $currentLanguageUid = $context->getPropertyFromAspect('language', 'id');
                if ($relation->getSysLanguageUid() !== $currentLanguageUid) continue;

                $getProperty = 'get' . ucfirst($property);
                $propertyValue = $relation->$getProperty();
                (is_object($propertyValue)) ? $key = $propertyValue->getUid() : $key = (int)$propertyValue;
                $groupedRelations[$key][] = $relation;
            }
            $this->templateVariableContainer->add($as, $groupedRelations);
        }
    }
}
