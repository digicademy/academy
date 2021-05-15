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

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Digicademy\Academy\Domain\Repository\HcardsRepository;

class HcardsController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\HcardsRepository
     */
    protected $hcardsRepository;

    /**
     * Use constructor DI and not (at)inject
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface    $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\HcardsRepository            $hcardsRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        HcardsRepository $hcardsRepository
    )
    {
        $this->injectConfigurationManager($configurationManager);
        $this->hcardsRepository = $hcardsRepository;
    }

    /**
     * Initializes the current action
     *
     * @return void
     */
    public function initializeAction()
    {
        if ($this->settings['selectedHcards']) {
            $this->request->setArgument('selectedHcards', $this->settings['selectedHcards']);
        }
    }

    /**
     * Displays hcards by their uid
     *
     * @return void
     */
    public function listSelectedAction()
    {
        $selectedHcardsArray = GeneralUtility::trimExplode(',', $this->request->getArgument('selectedHcards'));
        $selectedHcards = $this->objectManager->get(ObjectStorage::class);
        foreach ($selectedHcardsArray as $selectedHcard) {
            $selectedHcards->attach($this->hcardsRepository->findByUid($selectedHcard));
        }
        $this->view->assign('selectedHcards', $selectedHcards);
        $this->view->assign('arguments', $this->request->getArguments());
    }

}
