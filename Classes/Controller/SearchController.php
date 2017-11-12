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

class SearchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * Initializes the current action
     *
     * @return void
     */
    public function initializeAction()
    {
    }

    /**
     * Displays a simple search form
     *
     * @return void
     */
    public function searchFormAction()
    {
    }

    /**
     * Sphinx search through object indexes. Either searches all indexes with a limit of 5 matches if no index
     * type is specified (searchAll) or a single index if a valid index name is submitted (forwarded from searchSingle)
     *
     * @return void
     */
    public function searchAllAction()
    {
die('SearchController->searchAllAction needs to be reimplemented');
        if ($this->request->hasArgument('keywords')) {
        }
    }

    /**
     * Search through a single object index. Forwards to searchAll to avoid DRY
     *
     * @return void
     */
    public function searchSingleAction()
    {
        $this->forward('searchAll', null, null, $this->request->getArguments());
    }

}
