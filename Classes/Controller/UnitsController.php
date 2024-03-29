<?php

namespace Digicademy\Academy\Controller;

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

use Digicademy\Academy\Domain\Model\Units;
use Digicademy\Academy\Domain\Repository\UnitsRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class UnitsController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\UnitsRepository
     */
    protected $unitsRepository;

    /**
     * Use constructor DI and not (at)inject
     *
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\UnitsRepository          $unitsRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        UnitsRepository $unitsRepository
    ) {
        $this->injectConfigurationManager($configurationManager);
        $this->unitsRepository = $unitsRepository;
    }

    /**
     * Initializes the current action
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
     */
    public function initializeAction()
    {
        switch ($this->actionMethodName) {
            case 'listAction':
                if ($this->settings['selectedCategories']) {
                    $this->request->setArgument('selectedCategories', $this->settings['selectedCategories']);
                }
                break;

            case 'showAction':
                if ($this->settings['selectedUnits']) {
                    $selectedUnits = GeneralUtility::trimExplode(',', $this->settings['selectedUnits']);
                    $this->request->setArgument('unit', $selectedUnits[0]);
                }
            default:
                break;
        }
    }

    /**
     * Displays a list of units
     *
     * @return void
     */
    public function listAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $units = $this->unitsRepository->findAll();

        $this->view->assign('units', $units);
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     */
    public function listBySelectionAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $units = $this->unitsRepository->findBySelection($this->settings['selectedUnits']);
        $this->view->assign('units', $units);
    }

    /**
     * Displays a unit by uid
     *
     * @param \Digicademy\Academy\Domain\Model\Units $unit
     *
     * @return void
     */
    public function showAction(Units $unit)
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $this->view->assign('unit', $unit);
    }

}
