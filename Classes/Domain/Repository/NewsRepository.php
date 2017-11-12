<?php

namespace Digicademy\Academy\Domain\Repository;

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

use GeorgRinger\News\Domain\Model\DemandInterface;
use GeorgRinger\News\Domain\Repository\NewsRepository as GeorgRingerNewsRepository;

class NewsRepository extends GeorgRingerNewsRepository
{

    /**
     * Get the count of news records by month/year and
     * returns the result compiled as array; overrides the original function
     * with the possibility to define the date field for the count by TS
     *
     * @param \GeorgRinger\News\Domain\Model\DemandInterface $demand
     *
     * @return array
     */
    public function countByDate(DemandInterface $demand)
    {
        $data = array();
        $dateField = trim($GLOBALS['TYPO3_DB']->fullQuoteStr($demand->getDateField(), 'tx_news_domain_model_news'),
            '\'');

        $sql = $this->findDemandedRaw($demand);
        $sql = 'SELECT FROM_UNIXTIME(' . $dateField . ', "%m") AS "_Month",' .
            ' FROM_UNIXTIME(' . $dateField . ', "%Y") AS "_Year" ,' .
            ' count(FROM_UNIXTIME(' . $dateField . ', "%m")) as count_month,' .
            ' count(FROM_UNIXTIME(' . $dateField . ', "%y")) as count_year' .
            ' FROM tx_news_domain_model_news ' . substr($sql, strpos($sql, 'WHERE '));

        // strip unwanted order by
        $sql = $GLOBALS['TYPO3_DB']->stripOrderBy($sql);

        // group by custom month/year fields
        $orderDirection = strtolower($demand->getOrder());
        if ($orderDirection !== 'desc' && $orderDirection != 'asc') {
            $orderDirection = 'asc';
        }
        $sql .= ' GROUP BY _Month, _Year ORDER BY _Year ' . $orderDirection . ', _Month ' . $orderDirection;

        $res = $GLOBALS['TYPO3_DB']->sql_query($sql);
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $data['single'][$row['_Year']][$row['_Month']] = $row['count_month'];
        }
        $GLOBALS['TYPO3_DB']->sql_free_result($res);

        // Add totals
        foreach ($data['single'] as $year => $months) {
            $countOfYear = 0;
            foreach ($months as $month) {
                $countOfYear += $month;
            }
            $data['total'][$year] = $countOfYear;
        }

        return $data;
    }

}
