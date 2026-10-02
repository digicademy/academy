<?php

declare(strict_types=1);

namespace Digicademy\Academy\Backend\Form\FormDataProvider;

use TYPO3\CMS\Backend\Form\FormDataProvider\TcaInline;
use TYPO3\CMS\Backend\Form\FormDataProviderInterface;

/**
 * Restricts the IRRE children of an academy relations field to the parent's own language.
 *
 * Where a relation exists between a localised and a non-localised entity, FormEngine offers
 * every connected relation record — including those belonging to another language — in the
 * entity that has not been localised yet. That is confusing for editors, because a localised
 * child should only ever appear under the parent of its own language. This provider drops
 * those children again after core has compiled them.
 *
 * The behaviour originates from a patch by @metacontext of 2023-01-01, which used to live in
 * an XCLASS of {@see TcaInline} (Digicademy\Academy\Xclass\Backend\Form\FormDataProvider\
 * AcademyTcaInline). That XCLASS carried a copy of the whole core method body in order to
 * insert the filter in the middle of it, and it broke on the TYPO3 13 upgrade: core changed
 * the signature of the protected TcaInline::resolveConnectedRecordUids() without a
 * deprecation, the copy kept calling the 12.4 one, and every backend edit form on a record
 * with an inline field died with a TypeError. Expressing the filter as its own provider that
 * merely depends on TcaInline removes that whole class of breakage, because no core method
 * body is duplicated any more.
 *
 * Registered for the form data groups that also run TcaInline, see ext_localconf.php.
 */
final class LanguageAwareInlineRelations implements FormDataProviderInterface
{
    /**
     * The child table whose inline fields are filtered.
     *
     * Deriving the affected fields from the TCA rather than from a list of field names keeps
     * this generic: it covers "relations" on every academy entity table as well as
     * "news_relations" and "event_relations" on tx_news_domain_model_news, picks up any
     * relations field added in future without a change here, and can never match a
     * same-named inline field belonging to another extension.
     */
    private const RELATIONS_TABLE = 'tx_academy_domain_model_relations';

    /**
     * Fallback language field name, used if the compiled child carries no ctrl section.
     */
    private const DEFAULT_LANGUAGE_FIELD = 'sys_language_uid';

    /**
     * Removes children of a foreign language from every inline relations field of the record.
     *
     * @param array<string, mixed> $result Form data of the parent record
     * @return array<string, mixed> Form data with the foreign-language children removed
     */
    public function addData(array $result): array
    {
        // A localised parent is served by TcaInline::resolveRelatedRecordsOverlays(), which
        // resolves the children of the default language record and overlays them with their
        // localisations. Those children are already language-correct, and dropping the ones
        // that are not in the default language would remove exactly the localised records the
        // form is meant to show. The filter therefore applies to the default language path
        // only — which is also what the XCLASS did, by returning early before its filter.
        if (($result['defaultLanguageRow'] ?? null) !== null) {
            return $result;
        }

        foreach (($result['processedTca']['columns'] ?? []) as $fieldName => $fieldConfig) {
            $config = $fieldConfig['config'] ?? [];

            if (($config['type'] ?? '') !== 'inline'
                || ($config['foreign_table'] ?? '') !== self::RELATIONS_TABLE
            ) {
                continue;
            }

            // Note that "children" is a sibling of "config", not part of it. It is absent
            // when the record has no children, and when TcaInline was told not to compile
            // them via $result['inlineCompileExistingChildren'].
            $children = $fieldConfig['children'] ?? null;

            if (!is_array($children) || $children === []) {
                continue;
            }

            $defaultLanguageChildren = [];
            $defaultLanguageChildUids = [];

            foreach ($children as $child) {
                $languageField = $child['processedTca']['ctrl']['languageField']
                    ?? self::DEFAULT_LANGUAGE_FIELD;

                // A child without a language value counts as being in the default language,
                // which keeps a child table that is not localisable at all unaffected.
                if ((int)($child['databaseRow'][$languageField] ?? 0) !== 0) {
                    continue;
                }

                // Reindexed by the append, because InlineControlContainer addresses the
                // children by their first and last array key.
                $defaultLanguageChildren[] = $child;
                $defaultLanguageChildUids[] = (int)($child['databaseRow']['uid'] ?? 0);
            }

            $result['processedTca']['columns'][$fieldName]['children'] = $defaultLanguageChildren;

            // Keep the field value consistent with the children that survived. All of these
            // fields are 1:n relations declared with a foreign_field, so the relation itself
            // is stored on the child and the parent column only holds the number of children
            // (see ext_tables.sql). This value is therefore what FormEngine reads, not what
            // gets persisted, and rewriting it cannot disconnect anything.
            $result['databaseRow'][$fieldName] = implode(',', $defaultLanguageChildUids);
        }

        return $result;
    }
}
