<?php

namespace Digicademy\Academy\Utility\Backend;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <Torsten.Schrade@adwmainz.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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


class ItemUtility
{

    /**
     * Reduces the number of select items in the relation's type field to the
     * possible relations to create depending on the parent object that is currently
     * edited
     *
     * OUTDATED: This did work in TYPO3 6.2 but will not work with the new form engine in TYPO3 7.6+
     * In the new form engine and we have only access to the
     * TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems parentObject which does not carry any information
     * about the IRRE context. If types of relation items should be reduced per parent object this is
     * currently only solvable by using different storage pids and according TSConfig
     *
     * 0 - person <> hcard - 10
     * 1 - person <> project - 11
     * 2 - person <> unit - 12
     * 3 - person <> event - 13
     * 4 - person <> news - 14
     * 5 - person <> medium - 15
     * 6 - person <> person - 16
     * 7 - project <> hcard - 20
     * 8 - project <> unit - 21
     * 9 - project <> news - 22
     * 10 - project <> event - 23
     * 11 - project <> medium - 24
     * 12 - project <> freetext - 25
     * 13 - project <> project - 26
     * 14 - unit <> hcard - 30
     * 15 - unit <> freetext - 31
     * 16 - unit <> unit - 32
     * 17 - news <> hcard - 40
     * 18 - news <> event - 41
     * 19 - news <> medium -42
     * 20 - event <> hcard - 50
     * 21 - event <> medium - 51
     *
     * @param array  $parameters
     * @param object $parentObject
     *
     * @return array
     */
    public function filterRelationTypeItems($parameters, &$parentObject)
    {
        $parentInformation = $parentObject->inline->inlineNames['form'];
        $items = $parameters['items'];

        if (strpos($parentInformation, 'tx_academy_domain_model_persons')) {
            unset($items[7]);
            unset($items[8]);
            unset($items[9]);
            unset($items[10]);
            unset($items[11]);
            unset($items[12]);
            unset($items[13]);
            unset($items[14]);
            unset($items[15]);
            unset($items[16]);
            unset($items[17]);
            unset($items[18]);
            unset($items[19]);
            unset($items[20]);
            unset($items[21]);
        }

        if (strpos($parentInformation, 'tx_academy_domain_model_projects')) {
            unset($items[0]);
            unset($items[2]);
            unset($items[3]);
            unset($items[4]);
            unset($items[5]);
            unset($items[6]);
            unset($items[12]);
            unset($items[14]);
            unset($items[15]);
            unset($items[16]);
            unset($items[17]);
            unset($items[18]);
            unset($items[19]);
            unset($items[20]);
            unset($items[21]);
        }

        if (strpos($parentInformation, 'news_relations')) {
            unset($items[0]);
            unset($items[1]);
            unset($items[2]);
            unset($items[3]);
            unset($items[5]);
            unset($items[6]);
            unset($items[7]);
            unset($items[8]);
            unset($items[10]);
            unset($items[11]);
            unset($items[12]);
            unset($items[13]);
            unset($items[14]);
            unset($items[15]);
            unset($items[19]);
            unset($items[20]);
            unset($items[21]);
        }

        if (strpos($parentInformation, 'events_relations')) {
            unset($items[0]);
            unset($items[1]);
            unset($items[2]);
            unset($items[4]);
            unset($items[5]);
            unset($items[6]);
            unset($items[7]);
            unset($items[8]);
            unset($items[9]);
            unset($items[11]);
            unset($items[12]);
            unset($items[13]);
            unset($items[14]);
            unset($items[15]);
            unset($items[16]);
            unset($items[17]);
            unset($items[19]);
        }

        if (strpos($parentInformation, 'tx_academy_domain_model_media')) {
            unset($items[0]);
            unset($items[1]);
            unset($items[2]);
            unset($items[3]);
            unset($items[4]);
            unset($items[6]);
            unset($items[7]);
            unset($items[8]);
            unset($items[9]);
            unset($items[10]);
            unset($items[12]);
            unset($items[13]);
            unset($items[14]);
            unset($items[15]);
            unset($items[16]);
            unset($items[17]);
            unset($items[18]);
            unset($items[20]);
        }

        if (strpos($parentInformation, 'tx_academy_domain_model_units')) {
            unset($items[0]);
            unset($items[1]);
            unset($items[3]);
            unset($items[4]);
            unset($items[5]);
            unset($items[6]);
            unset($items[7]);
            unset($items[9]);
            unset($items[10]);
            unset($items[11]);
            unset($items[12]);
            unset($items[13]);
            unset($items[17]);
            unset($items[18]);
            unset($items[19]);
            unset($items[20]);
            unset($items[21]);
        }

        $parameters['items'] = $items;

        return $parameters;
    }

}
