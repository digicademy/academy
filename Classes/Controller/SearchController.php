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

use Digicademy\Academy\Service\SearchService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Annotation as Extbase;

class SearchController extends ActionController
{
    /**
     * @var SearchService
     */
    protected SearchService $searchService;

    /**
     * Initializes the current action
     *
     * @return void
     */
    public function initializeAction(): void
    {}

    /**
     * @param SearchService $searchService
     */
    public function __construct(
        SearchService $searchService
    )
    {
        $this->searchService = $searchService;
    }

    /**
     * Displays a search form
     *
     * @return ResponseInterface
    */
    public function searchFormAction(): ResponseInterface
    {
        // get and assign arguments from request
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        // get and assign settings
        $settings = $this->settings;
        $this->view->assign('settings', $settings);

        return $this->htmlResponse();
    }

    /**
     * @param string $query
     *
     *
     * @return ResponseInterface
     */
    #[Extbase\Validate(['validator' => 'regularExpression', 'options' => ['regularExpression' => '/^[\,\.\*\-"\p{L}\p{M}\p{N}\p{Sk}\s]*$/u'], 'param' => 'query'])]
    public function searchAllAction(
        string $query = ''
    ): ResponseInterface
    {
        // get and assign arguments from request
        $arguments = $this->request->getArguments();
        $this->view->assign('arguments', $arguments);

        // get and assign settings
        $settings = $this->settings;
        $this->view->assign('settings', $settings);
        $type = $arguments['type'] ?? $settings['searchAll']['type'] ?? [];
        $limit = $arguments['limit'] ?? $settings['searchAll']['limit'] ?? 5;

        $cleanArguments = [
            'action' => $this->request->getControllerActionName(),
            'query' => $query,
            'type' => $type,
            'limit' => (int)$limit
        ];

        $result = $this->searchService->search($cleanArguments, $settings);
        $this->view->assign('result', $result);

        return $this->htmlResponse();
    }

    /**
     * Search for a single entity. Forwards to searchAll with type to avoid DRY
     *
     * @return ResponseInterface
     */
    public function searchSingleAction(): ResponseInterface
    {
        return (new ForwardResponse('searchAll'))->withArguments($this->request->getArguments());
    }

}
