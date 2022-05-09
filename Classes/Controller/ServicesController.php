<?php

namespace Digicademy\Academy\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2021 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature | Mainz
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

use Digicademy\Academy\Domain\Model\Services;
use Digicademy\Academy\Domain\Repository\ServicesRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ServicesController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\ServicesRepository
     */
    protected $servicesRepository;

    /**
     * Use constructor DI and not (at)inject
     *
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\ServicesRepository          $servicesRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        ServicesRepository $servicesRepository
    ) {
        $this->injectConfigurationManager($configurationManager);
        $this->servicesRepository = $servicesRepository;
    }

    /**
     * Initializes the current action
     *
     * @return void
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
                if ($this->settings['selectedServices']) {
                    $selectedServices = GeneralUtility::trimExplode(',', $this->settings['selectedServices']);
                    $this->request->setArgument('service', $selectedServices[0]);
                }
            break;

            default:
                break;
        }
    }

    /**
     * Displays a list of services
     *
     * @return void
     */
    public function listAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $services = $this->servicesRepository->findAll();

        $this->view->assign('services', $services);
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     */
    public function listBySelectionAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $services = $this->servicesRepository->findBySelection($this->settings['selectedServices']);
        $this->view->assign('services', $services);
    }

    /**
     * Displays a service by uid
     *
     * @param \Digicademy\Academy\Domain\Model\Services $service
     *
     * @return void
     */
    public function showAction(Services $service)
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $this->view->assign('service', $service);
    }

}
