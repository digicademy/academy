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
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * The repository for all relations between CRIS entities.
 * For convenience reasons is configured to disrespect any given
 * storage page and therefore to always fetch all relations
 * across the page tree.
 *
 * @author Torsten Schrade <torsten.schrade@adwmainz.de>
 */

class RelationsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array(
        'type' => QueryInterface::ORDER_ASCENDING,
        'role' => QueryInterface::ORDER_ASCENDING,
        'persistent_identifier' => QueryInterface::ORDER_ASCENDING
    );

    public function initializeObject(): void {
      /** @var Typo3QuerySettings $querySettings */
      $querySettings= GeneralUtility::makeInstance(Typo3QuerySettings::class);
      $querySettings->setRespectStoragePage(false);
      $this->setDefaultQuerySettings($querySettings);
    }
}
