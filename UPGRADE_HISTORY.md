# EXT:academy — Upgrade History

Chronological log of upgrade steps carried out on this extension. Newest entries at the bottom.

EXT:academy is used by more than one application, so every entry has to state what consuming projects must change on their side. Entries that require action carry a **Required changes in consuming projects** section.

Write each paragraph and each list item as a single line. Do not hard-wrap prose — let the editor soft-wrap it. Line breaks are for separating paragraphs and list items, nothing else.

Earlier TYPO3 13.4 changes to this extension (the `AcademyTcaInline` XCLASS replaced by a `FormDataProvider`, the `DataHandler` hook registered as a public service, and smaller fixes) are recorded only in the history of the application they were made in; this file starts on 2026-10-09.

---

## 2026-10-09 — Localizing a record with inline children: warning, and children skipped after an existing localization

Localizing a record with inline children — reported for a product whose relations had not been translated yet — raised `PHP Warning: Undefined array key 0 in …/Classes/Xclass/Core/DataHandling/AcademyDataHandler.php line 62`. Where warnings are turned into exceptions (TYPO3's `exceptionalErrors` including `E_WARNING`), this aborts the localization command; otherwise the warning is ignored and the localization completes.

### Cause

`AcademyDataHandler::copyRecord_processRelation()` reuses an existing localization of an inline child instead of localizing it again (the 2023-01-01 patch, because core's `localize()` refuses a second localization). It tested the result of `BackendUtility::getRecordLocalization()` with `is_array()` and then read `[0]['l10n_parent']`. That method returns `[]` when no localization exists — in 12.4 as in 13.4 — so every child without a localization, which is every child the first time its parent is localized, read index `0` of an empty array.

The same block had a second, older defect: when a localization did exist, it `return`ed its uid from inside the loop over the children. The remaining children were neither localized nor mapped, `registerDBList` was not written, and the single uid became the value of the whole relation field.

### Changes made

- An existing localization is detected with `!empty($possibleExistingLocalization[0]['uid'])`, which handles `false`, `[]` and a found row without warnings. The comparison with a hard-coded `l10n_parent` was dropped: `getRecordLocalization()` already matches the child's own translation pointer field.
- An existing localization is assigned to `$newId` for that child instead of being returned, so the loop goes on with the remaining children and the method finishes the way core's does.

### Required changes in consuming projects

None. Behaviour changes only where a child of a record being localized already had a localization: all children are now processed and the relation field receives all of them, where previously only the first such child was kept.

### Verification

`php -l` clean; PHPStan level 5 reports no error in the file and 41 for `Classes/`, unchanged. The real method was run old against new with stubs for `BackendUtility`, `RelationHandler` and `localize()`. One untranslated child (the reported case) and three untranslated children: the old code raised the warning twice per child, the new none, both produce the same result. Three children with the first already translated: old returned `501`, did not write `registerDBList` and localized nothing else; new returns and registers `501,9002,9003` and localizes children 2 and 3. All three already translated: old `501`, new `501,502,503`, no localization in either.

## 2026-10-09 — `EntityController`: detail pages keep the requested record; missing records answer 404

Found by the NFDI4Culture frontend sweep, on pages whose plugin is called without arguments.

### Causes

- `routeAction()` read `$this->settings['entityType']` unguarded (`Undefined array key "entityType"`) for a plugin whose FlexForm holds no fields. The deliberate exception right below it ("You need to set an entity type in the plugin configuration", `1735538304`) was never reached.
- For a show plugin, `routeAction()` took the record from `settings.filters.selectedEntities` whenever that setting was not `null`. A detail page leaves it empty (`''`), meaning "take the record from the request"; `sanitizeFilterData()` turns `''` into `[]`, and reading `[0]` raised `Undefined array key 0`. Without the warning, the branch would have overwritten the request's `uid` with `null`.
- `showAction(int $uid)` required a uid, so a detail page without one failed with Extbase's missing argument exception, and a uid of a missing, deleted or hidden record failed with a `TypeError` in `get_class(null)`.

### Changes made

- `entityType` is read guarded, so a misconfigured plugin reports the intended exception.
- The record selected in the plugin configuration is used only if there is one; otherwise the request's `uid` is kept.
- `showAction(?int $uid = null)` answers a request without uid, or with a uid that does not resolve, with the site's 404 page (`ErrorController::pageNotFoundAction()`, thrown as `PropagateResponseException`, code `1760004701`). The `ErrorController` is fetched with `GeneralUtility::makeInstance()` where it is needed, as Extbase's own `ActionController` does, so neither the subclasses' constructors nor the compiled DI container change. (A first version injected it with an `inject*()` method; the 404 path then failed with "Typed property … $errorController must not be accessed before initialization".)

### Required changes in consuming projects

- Detail pages without a (resolvable) record now answer 404 instead of throwing. Subclasses overriding `showAction()` must accept `?int $uid = null` (none in this extension does).

### Verification

`php -l` clean; PHPStan level 5: 9 errors in the file before and after, 41 for `Classes/`, unchanged. In the NFDI4Culture portal, the plugins without configuration now report exception `1735538304`; the detail pages without record (`/services/details.html`, `/about-us/partners/details.html` and their German pages) answer 404 with the site's 404 page, and detail pages with a record (e.g. `/services/details/barcamps.html`) still show it.

## 2026-10-26 — Date ranges stored in EXT:academy instead of EXT:chf_time

EXT:academy no longer depends on EXT:chf_time (and through it on EXT:chf_geo). Date ranges of academy records are stored in the new table `tx_academy_domain_model_dateranges` and mapped to the new model `Digicademy\Academy\Domain\Model\DateRanges`.

### Cause

The `date_range` fields of eight academy tables (persons, projects, units, services, products, publications, relations, media) were inline relations to `tx_chftime_domain_model_dateranges`, and `DateRangeTrait` typed `$dateRange` with `Digicademy\ChfTime\Domain\Model\DateRanges`. EXT:chf_time and EXT:chf_geo have no TYPO3 13 release; their `typo3/cms-core` constraint (`>=12.4.0 || <=12.4.99`) only lets Composer install them because it matches every version. Without EXT:chf_time, Extbase fails with `UnknownClassException` as soon as it maps an academy model.

Checked in the three applications using EXT:academy (ADW Mainz website, NFDI4Culture portal, WissKomm): only label, start and end date of the date ranges hold data. Precision, dating point, method, certainty, duration, calendar and temporal entity are empty and disabled in every application's TSconfig; the calendar and temporal entity tables and all EXT:chf_geo tables are empty. All date ranges belong to academy tables.

### Changes made

- New table `tx_academy_domain_model_dateranges` (`ext_tables.sql`) with `label`, `dating_from`, `dating_to` (`varchar(50)` as before, so partial or historical dates stay possible), the generic parent relation `parent`/`tablename`, and the usual hidden, deleted, workspace and language fields.
- New TCA `Configuration/TCA/tx_academy_domain_model_dateranges.php`: label, start and end date, translatable, workspace-aware, hidden from the list module (`hideTable`), core icon `actions-calendar`. Labels in `locallang_db.xlf` / `de.locallang_db.xlf` with the wording EXT:chf_time used.
- New model `Digicademy\Academy\Domain\Model\DateRanges` (an `AbstractValueObject`, as in EXT:chf_time) with `label`, `datingFrom`, `datingTo` and the same getters and setters, now typed `string`.
- `DateRangeTrait` uses the new model. The `date_range` field of all eight TCA tables points to the new table; the inline configuration is otherwise unchanged.
- `chf_time` removed from the dependencies in `ext_emconf.php`.
- New upgrade wizard `academyDateRangesMigration` (`Classes/Updates/DateRangesMigration.php`). It copies every row of `tx_chftime_domain_model_dateranges` whose `tablename` is an academy table into the new table, keeping the uid. Parent records' `date_range` values, translations (`l10n_parent`) and workspace versions therefore stay valid without further changes. Deleted rows are copied too, so restoring a parent from the recycler restores its date range. Only columns both tables have are copied. The source table is only read. Rows already copied (same uid, parent and table) are skipped, so the wizard can be run again; if a uid it needs is already taken by a different record in the new table, it reports the uids and copies nothing.

### Required changes in consuming projects

- Run the database analyzer (create `tx_academy_domain_model_dateranges`), flush all caches (the wizard is registered through the DI container), then run `vendor/bin/typo3 upgrade:run academyDateRangesMigration`. Run the wizard before editors create date ranges in the new table, otherwise new records can take uids the wizard needs.
- Templates reading `{….dateRange.label}`, `.datingFrom` and `.datingTo` keep working unchanged. Code referring to `Digicademy\ChfTime\Domain\Model\DateRanges` by class name, and templates using any other date range property (precision, method, calendar, temporal entity …), must be adapted.
- SQL that joins `tx_chftime_domain_model_dateranges` directly (e.g. Manticore search sources) must use `tx_academy_domain_model_dateranges`.
- TSconfig and TCA overrides for `tx_chftime_domain_model_dateranges` (`TCEFORM`, `TCAdefaults`, `Configuration/TCA/Overrides/…`) must be moved to `tx_academy_domain_model_dateranges`. Fields that existed only in EXT:chf_time no longer need disabling.
- Extbase persistence mappings and TypoScript imports of EXT:chf_time / EXT:chf_geo can be removed once nothing else uses them; EXT:chf_time and EXT:chf_geo can then be removed from `composer.json`. The table `tx_chftime_domain_model_dateranges` can be dropped after the wizard has run.

### Verification

`php -l` clean for all changed PHP files; PHPStan level 5 (no extension config, run with an empty config) reports no error in the new model, the wizard and `DateRangeTrait`. The wizard was run against a scratch copy of the NFDI4Culture database (2,203 date ranges, 300 deleted, 770 with `l10n_parent`), with the new table created from `ext_tables.sql`: all 2,203 rows copied, source and target identical across all copied columns (same MD5 over all rows), `AUTO_INCREMENT` continues at 2204, all 770 `l10n_parent` links resolve in the new table. A second run reports nothing to do; after deleting three copied rows exactly those three are copied again; with a uid taken by a different record the wizard copies nothing and returns `false`. An exception during the copy rolls back all inserts.
