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
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Digicademy\Academy\Domain\Repository\PersonsRepository;
use Digicademy\Academy\Domain\Model\Persons;


class PersonsController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\PersonsRepository
     */
    protected $personsRepository;

    /**
     * Use constructor DI and not @inject
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface    $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\PersonsRepository           $personsRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        PersonsRepository $personsRepository
    )
    {
        parent::__construct($configurationManager);
        $this->personsRepository = $personsRepository;
    }

    /**
     * Displays a the searchformw
     *
     * @return void
     */
    public function formAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
    }

    /**
     * Displays a list of persons, possibly filtered by categories
     *
     * @return void
     */
    public function listAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $persons = $this->personsRepository->findAll();
        $this->view->assign('persons', $persons);
    }

    /**
     * Gets a list of persons by a specific role (set in plugin) and forwards to list action
     *
     * @return void
     */
    public function listByRoleAction()
    {
        $persons = $this->personsRepository->findByRole($this->settings['selectedRole']);
        if ($persons->count() > 0) {
            $this->forward('list', null,null, array('persons' => $persons));
        } else {
            $this->forward('list');
        }
    }


    /**
     * Displays a person by uid
     *
     * @param \Digicademy\Academy\Domain\Model\Persons $person
     *
     * @return void
     */
    public function showAction(Persons $person)
    {
        // assign arguments
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        // assign the person
        $this->view->assign('person', $person);
    }
}
