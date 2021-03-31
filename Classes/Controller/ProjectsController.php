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
use Digicademy\Academy\Domain\Repository\ProjectsRepository;
use Digicademy\Academy\Domain\Model\Projects;

class ProjectsController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\ProjectsRepository
     */
    protected $projectsRepository;

    /**
     * Use constructor DI and not @inject
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface    $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\ProjectsRepository          $projectsRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        ProjectsRepository $projectsRepository
    )
    {
        $this->injectConfigurationManager($configurationManager);
        $this->projectsRepository = $projectsRepository;
    }

    /**
     * Initializes the current action
     *
     * @return void
     */
    public function initializeAction()
    {
        if ($this->settings['selectedProjects'] > 0) {
            $this->request->setArgument('project', $this->settings['selectedProjects']);
        }
    }

    /**
     * Displays a list of projects, possibly filtered by categories
     *
     * @return void
     */
    public function listAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $projects = $this->projectsRepository->findAll();
        $this->view->assign('projects', $projects);
    }

    /**
     * Displays a project by uid
     *
     * @param \Digicademy\Academy\Domain\Model\Projects $project
     *
     * @return void
     */
    public function showAction(Projects $project)
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $this->view->assign('project', $project);
    }

    /**
     * Displays a teaser of a project
     *
     * @param \Digicademy\Academy\Domain\Model\Projects $project
     *
     * @return void
     */
    public function teaserAction(Projects $project)
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $this->view->assign('project', $project);
    }
}
