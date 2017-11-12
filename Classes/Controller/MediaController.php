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

use Digicademy\Academy\Domain\Model\Media;
use Digicademy\Academy\Domain\Repository\MediaRepository;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MediaController extends ActionController
{

    /**
     * @var \Digicademy\Academy\Domain\Repository\MediaRepository
     */
    protected $mediaRepository;

    /**
     * Use constructor DI and not @inject
     *
     * @see: https://gist.github.com/NamelessCoder/3b2e5931a6c1af19f9c3f8b46e74f837
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @param \Digicademy\Academy\Domain\Repository\MediaRepository          $mediaRepository
     */
    public function __construct(
        ConfigurationManagerInterface $configurationManager,
        MediaRepository $mediaRepository
    ) {
        parent::__construct($configurationManager);
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Displays a list of media
     *
     * @return void
     */
    public function listAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $media = $this->mediaRepository->findAll();
        $this->view->assign('media', $media);
    }

    /**
     * Displays a list of media, possibly filtered by categories
     *
     * @param \integer $type
     *
     * @return void
     */
    public function listByTypesAction($type)
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $this->view->assign('media', $this->mediaRepository->findByType($type));
    }

    /**
     * Displays a list of media, grouped by their type
     *
     * @return void
     */
    public function listByGroupsAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $media = $this->mediaRepository->findGrouped();
        $this->view->assign('media', $media);
    }

    /**
     * Displays a list of the most recently created media
     *
     * @return void
     */
    public function listByRecentAction()
    {
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);
        $this->view->assign('media', $this->mediaRepository->findRecent());
    }

    /**
     * Displays a medium by uid
     *
     * @param \Digicademy\Academy\Domain\Model\Media $medium
     *
     * @return void
     */
    public function showAction(Media $medium)
    {
        // transfer media type to GLOBAL register for use in TypoScript (inclusion of JS files)
        $GLOBALS['TSFE']->register['mediatype'] = $medium->getType();

        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $this->view->assign('medium', $medium);
    }

    /**
     * Sets the medium vor the viewer from plugin settings
     */
    public function initializeViewerAction()
    {
        $this->request->setArgument('medium', $this->settings['medium']);
    }

    /**
     * Viewer for media to be inserted on standard pages
     *
     * @param \Digicademy\Academy\Domain\Model\Media $medium
     *
     * @return void
     */
    public function viewerAction(Media $medium)
    {

        // transfer media type to GLOBAL register for use in TypoScript (inclusion of JS files)
        $GLOBALS['TSFE']->register['mediatype'] = $medium->getType();

        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        $this->view->assign('medium', $medium);
    }
}
