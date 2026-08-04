<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2024 Academy of Sciences and Literature | Mainz
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

namespace Digicademy\Academy\Domain\Model\Traits;

use Digicademy\Academy\Domain\Model\Relations;
use Digicademy\Academy\Domain\Repository\RelationsRepository;
use Exception;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Provides all necessary variables and methods for handling model relation
 * properties.
 *
 * Every class implementing this trait MUST define the following
 * constant:
 *
 * protected const RELATIONS_CRITERION = '{ property }';
 *
 * The value is the property name (i.e., name of the table column) by which the
 * model is related to another type of models, e.g. 'medium_symmetric',
 * 'project_symmetric', etc. Note that for now, models are always looking
 * for symmetric relations.
 *
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 * @author Linnaea Söhn <linnaea.soehn@adwmainz.de>
 */
trait RelationsTrait
{
    /**
     * Relations with other entities.
     *
     * @var ObjectStorage<Relations>|null
     */
    #[Lazy]
    protected ObjectStorage|null $relations;

    /**
     * Returns the relations
     *
     * In the past, the Academy Extension used magic methods (findBy[Property]()).
     * These will disappear in TYPO3 14, so we already refactored when upgrading
     * to 12.4.
     *
     * @see https://api.typo3.org/11.5/classes/TYPO3-CMS-Extbase-Persistence-Repository.html#method___call
     * @see https://docs.typo3.org/permalink/changelog:deprecation-100071-1677853787
     *
     * @TODO: team reminder - in the past, there were core bugs with symmetric relational record handling
     * which made special treatment in domain objects necessary. This is no longer the case, which means
     * that we do not need the dedicated fetching of symmetric relations in the domain models any longer.
     * We can just leave the property as is and be happy, from 12.4 onwards it will automagically fetch
     * ALL relations - asymmetric as well as symmetric relations
     *
     * @see https://forge.typo3.org/issues/92963
     *
     * @return ObjectStorage<Relations>|null $relations
     * @throws Exception
     */
    public function getRelations(): ObjectStorage|null
    {

        /**
         * @TODO: team reminder - two optimization when defining a constant in a class that uses this trait
         *
         * 1. Do not use self::RELATIONS_CRITERION, as self:: will reference the trait, not the
         * implementing class (leads into a fatal). Use static::RELATIONS_CRITERION
         * as this will be resolved to the trait implementing class during runtime.
         *
         * 2. Do not use (!defined(static::RELATIONS_CRITERION)). define() checks if a name of a
         * constant exist as a string in the current environment (which is the trait). This will
         * fatal in the subclass. Instead, test for the content of the constant using.
         */

        /*
        if (empty(static::RELATIONS_CRITERION))  {
            throw new Exception(
                'Criterion to get relations by not set.',
                855563544182
            );
        }

        if (!is_string(static::RELATIONS_CRITERION)) {
            throw new Exception(
                'Criterion to get relations by not a string.',
                855563544183
            );
        }
        */

        // @TODO: team reminder - there exist projects where we can not expect
        // persistentIdentifier of entities to always exist; see comment in
        // PersistentIdentifierTrait.
        /*
        if (empty($this->persistentIdentifier)) {
            throw new Exception(
                'Persistent identifier to get relations for not set.',
                855563544184
            );
        }
        */

        /**
         * @TODO: team reminder - there is a little misunderstanding why symmetric relations
         * were fetched in academy versions < TYPO3 12.4.
         * In an ideal world we would not have needed to care about fetching symmetric relations
         * at all - everything should have been handled automagically by reflection in the core.
         * But TYPO3 had a nasty bug that prevented it from correctly resolving and fetching
         * symmetric relations. This is why older versions of the academy extension had an optional check
         * if symmetric relations entities of the same type existed - and if so and only then
         * those symmetric relations would be attached to the already fetched asymmetric relations.
         *
         * The good news is that "modern" TYPO3 seems to have resolved this issue. Therefore, we
         * don't need this fetching logic any longer and can just leave the property as is.
         */
/*
        $symmetricRelations = $this->relationsRepository->findBy(
            [
                self::RELATIONS_CRITERION => $this->persistentIdentifier
            ]
        );

        // only if there exist symmetric relations
        if ($symmetricRelations) {
            foreach ($symmetricRelations as $symmetricRelation) {
                $this->relations->attach($symmetricRelation);
            }
        }
*/

        return $this->relations;
    }

    /**
     * Sets the relations
     *
     * @param ObjectStorage<Relations> $relations
     */
    public function setRelations(ObjectStorage $relations): void
    {
        $this->relations = $relations;
    }
}
