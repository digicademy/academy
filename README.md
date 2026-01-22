# Academy Current Research Information System (CRIS)

## About

The "Academy" extension implements a framework for creating Current Research Information Systems (CRIS) with TYPO3. At its core it features a data model closely aligned to the [CERIF standard](https://eurocris.org/eurocris_archive/cerifsupport.org/cerif-in-brief/index.html) and the [OpenAIRE Guidelines for CRIS Managers](https://openaire-guidelines-for-cris-managers.readthedocs.io/en/v1.1.1/). The extension can be used as a foundation for creating web based research information portals and databases with projects, persons, organizations, research products, news, events etc.

The extension has been in development by @digicademy since 2011 and is actively used as a basis for several CRIS projects of the Academy of Sciences and Literature | Mainz in cooperation with many partners:

* [Academy of Sciences and Literature | Mainz](https://www.adwmainz.de/)
* [A European Gateway for the Academies of Sciences and Humanities (AGATE)](https://agate.academy/)
* [Portal of Rare Disciplines](https://www.kleinefaecher.de/)
* [NFDI4Culture - Consortium for Research Data on Material and Immaterial Cultural Heritage](https://nfdi4culture.de/)

## TYPO3 compatibility

| Version     | TYPO3            | PHP | Support                                 |
| ----------- |------------------|-----|---------------------------------------- |
| current     | 12.4.0 - 12.4.99 | 8.3 | Features, Bugfixes, Security Updates    |

## JSON API

The Academy extension provides a REST API for accessing entity data in JSON format. The API is implemented as a PSR-15 middleware for optimal performance and bypasses the TYPO3 frontend rendering pipeline.

### Available Endpoints

The API provides endpoints for the following entity types:

- `/api/events` - Event entities
- `/api/news` - News entities
- `/api/persons` - Person entities
- `/api/products` - Product entities
- `/api/projects` - Project entities
- `/api/publications` - Publication entities
- `/api/services` - Service entities
- `/api/units` - Unit entities

All endpoints support multilingual URLs (e.g., `/en/api/persons`, `/es/api/persons`).

### Request Parameters

The API accepts the following GET parameters:

**Filtering:**
- `selectedCategories` - Comma-separated category UIDs (AND logic)
- `selectedRoles` - Comma-separated role UIDs (AND logic)
- `selectedPids` - Comma-separated page UIDs (OR logic, filters entities by storage page)
- `searchQuery` - Full-text search across entity-specific fields
- `startDate` - Date filter (YYYY-MM-DD format, News and Events only) - returns items on or after this date
- `endDate` - Date filter (YYYY-MM-DD format, News and Events only) - returns items on or before this date
- `relatedTo` - Filter entities by their relations to other entities (format: `entityType:uid`, e.g., `person:123`, `project:456`). Supported entity types: `person`, `project`, `product`, `publication`, `service`, `unit`, `news`, `event`, `medium`, `hcard`. Can be combined with `selectedRoles` to filter by relationship type.

**Pagination:**
- `currentPage` - Page number (default: 1)
- `itemsPerPage` - Items per page (default: 10)

**Example requests:**

```bash
# Get all persons (first 10)
curl https://example.com/api/persons

# Search for persons
curl "https://example.com/api/persons?searchQuery=Smith"

# Filter by categories
curl "https://example.com/api/persons?selectedCategories=1,2,3"

# Filter by page UIDs (show only entities from specific pages)
curl "https://example.com/api/persons?selectedPids=123,456"

# Combine filters
curl "https://example.com/api/persons?selectedPids=123&selectedCategories=1&searchQuery=Smith"

# Filter and paginate
curl "https://example.com/api/persons?selectedCategories=1&currentPage=2&itemsPerPage=20"

# Get news from a specific date onwards
curl "https://example.com/api/news?startDate=2023-01-01"

# Get events up to a specific date
curl "https://example.com/api/events?endDate=2023-12-31"

# Get news within a date range
curl "https://example.com/api/news?startDate=2023-01-01&endDate=2023-06-30"

# Combine date filters with other filters
curl "https://example.com/api/events?startDate=2023-01-01&selectedCategories=5&searchQuery=conference"

# Get all projects related to person 123
curl "https://example.com/api/projects?relatedTo=person:123"

# Get all persons related to project 456
curl "https://example.com/api/persons?relatedTo=project:456"

# Get all publications related to person 789 with a specific role (e.g., author)
curl "https://example.com/api/publications?relatedTo=person:789&selectedRoles=10"

# Get all events related to unit 321
curl "https://example.com/api/events?relatedTo=unit:321"

# Get all news related to project 456 within a date range
curl "https://example.com/api/news?relatedTo=project:456&startDate=2023-01-01&endDate=2023-12-31"

# Combine relation filtering with other filters
curl "https://example.com/api/persons?relatedTo=project:123&selectedCategories=5&searchQuery=researcher"
```

### Response Format

The API returns JSON with the following structure:

```json
{
  "data": [
    {
      "uid": 123,
      "pid": 45,
      "givenName": "John",
      "familyName": "Smith",
      "persistentIdentifier": "uuid-here",
      "slug": "john-smith",
      "image": [
        "/fileadmin/user_upload/image.jpg"
      ],
      "categories": [
        {
          "uid": 5,
          "title": "Researcher",
          "parentUid": null
        },
        {
          "uid": 12,
          "title": "Active Member",
          "parentUid": 5
        }
      ]
    }
  ],
  "pagination": {
    "currentPage": 1,
    "itemsPerPage": 10,
    "totalItems": 42,
    "totalPages": 5,
    "hasNextPage": true,
    "hasPreviousPage": false
  },
  "filters": {
    "selectedCategories": "1,2",
    "selectedRoles": "",
    "selectedPids": "",
    "searchQuery": "",
    "startDate": "",
    "endDate": "",
    "relatedTo": ""
  }
}
```

**Response fields:**
- `data` - Array of entity objects with all scalar properties, image URLs, and categories
- `categories` - Array of category objects (each with `uid`, `title`, and `parentUid`). The `parentUid` is null for top-level categories. Empty array if entity has no categories. Available for all entity types including News and Events
- `pagination` - Pagination metadata
- `filters` - Echo of applied filters for debugging

### Configuration

#### Filtering vs Excluding by Page UID

The API provides two complementary ways to control which entities are returned based on their storage page (PID):

1. **`selectedPids` parameter** (inclusive filter): Show ONLY entities from specified pages
2. **Exclusion configuration** (exclusive filter): Hide entities from specified pages

These work together: first the `selectedPids` filter is applied (if provided), then the exclusion configuration removes any remaining entities from excluded pages.

**Example:**
```bash
# Request: ?selectedPids=100,200 with exclusion config: [100, 300]
# Result: Only entities from PID 200 (100 is filtered by selectedPids but then excluded)
```

#### Excluding Entries by Page UID

You can exclude entities stored on specific pages from ALL API responses using one of two methods:

**Method 1: Site Configuration (Recommended)**

Add to `config/sites/main/config.yaml`:

```yaml
settings:
  academy:
    json:
      exclude: '123,456,789'
```

Or as an array:

```yaml
settings:
  academy:
    json:
      exclude:
        - 123
        - 456
        - 789
```

**Method 2: Extension Configuration**

Add to `config/system/additional.php`:

```php
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['academy']['jsonApiExclude'] = '123,456,789';
```

Or as an array:

```php
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['academy']['jsonApiExclude'] = [123, 456, 789];
```

Note: Site configuration takes precedence over extension configuration.

## Research Software Engineering

This software is licensed under the terms of the GNU General Public License v2
as published by the Free Software Foundation.

Author (2011-2025): <a href="https://orcid.org/0000-0002-0953-2818">Torsten Schrade</a> | <a href="https://www.adwmainz.de">Academy of Sciences and Literature | Mainz</a>

List of contributors (ideas and codewise): 

* [Baris Altun](https://github.com/barisssss)
* [Aline Deicke](https://github.com/orgs/digicademy/people/alinedeicke)
* [Anna Neovesky](https://github.com/annaneo)
* [Frederic von Vlahovits](https://github.com/vonvlaho)
* [Frodo Podschwadek](https://github.com/fpodschwadek)
* [Julia Tolksdorf](https://github.com/jutol)
* [Julius Peinelt](https://github.com/jpeinelt)
* [Linnaea Söhn](https://github.com/lsoehn)
* [Sebastian Lange](https://github.com/Slange-Mhath)

