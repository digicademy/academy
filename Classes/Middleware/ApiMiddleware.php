<?php

/***************************************************************
 *  Copyright notice
 *
 *  Copyright (C) 2011-2025 Academy of Sciences and Literature | Mainz
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

namespace Digicademy\Academy\Middleware;

use Digicademy\Academy\Domain\Repository\PersonsRepository;
use Digicademy\Academy\Domain\Repository\ProductsRepository;
use Digicademy\Academy\Domain\Repository\ProjectsRepository;
use Digicademy\Academy\Domain\Repository\PublicationsRepository;
use Digicademy\Academy\Domain\Repository\ServicesRepository;
use Digicademy\Academy\Domain\Repository\UnitsRepository;
use Digicademy\Academy\Service\JsonSerializerService;
use Digicademy\Academy\Service\PaginationService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * PSR-15 Middleware that provides REST API endpoints for Academy entities.
 * Bypasses TYPO3 frontend rendering for maximum performance.
 *
 * @author Frodo Podschwadek <frodo.podschwadek@adwmainz.de>
 */
class ApiMiddleware implements MiddlewareInterface
{
    public function __construct(
        protected readonly PersonsRepository $personsRepository,
        protected readonly ProductsRepository $productsRepository,
        protected readonly ProjectsRepository $projectsRepository,
        protected readonly PublicationsRepository $publicationsRepository,
        protected readonly ServicesRepository $servicesRepository,
        protected readonly UnitsRepository $unitsRepository,
        protected readonly PaginationService $paginationService,
        protected readonly JsonSerializerService $jsonSerializerService
    ) {}

    /**
     * Process the request and return a JSON response for API endpoints.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $request->getUri()->getPath();

        // Match pattern: /api/{entityType} or /{lang}/api/{entityType}
        // Support multilingual URLs (/, /en/, /es/)
        if (preg_match('#^(/[a-z]{2})?/api/(persons|products|projects|publications|services|units)/?$#', $path, $matches)) {
            try {
                $entityType = $matches[2]; // Entity type is in second capture group
                $queryParams = $request->getQueryParams();

                // Build filters array (CSV format expected by repository)
                $filters = [
                    'selectedCategories' => $queryParams['selectedCategories'] ?? '',
                    'selectedRoles' => $queryParams['selectedRoles'] ?? '',
                    'searchQuery' => $queryParams['searchQuery'] ?? '',
                    'selectedPids' => $queryParams['selectedPids'] ?? '',
                ];

                // Get repository and configure it to query all records
                $repository = $this->getRepositoryForEntity($entityType);

                // Get excluded PIDs from TypoScript configuration
                $excludedPids = $this->getExcludedPids($request);

                // Parse selected PIDs if provided
                $selectedPids = [];
                if (!empty($filters['selectedPids'])) {
                    $selectedPids = GeneralUtility::intExplode(',', $filters['selectedPids'], true);
                }

                // Configure repository with selected PIDs or disable storage page constraint
                $this->configureRepositoryForApi($repository, $excludedPids, $selectedPids);

                // Execute query
                $hasFilters = $filters['selectedCategories'] || $filters['selectedRoles'] || $filters['searchQuery'] || $filters['selectedPids'];
                $queryResult = $hasFilters ? $repository->findByFilters($filters) : $repository->findAll();

                // Filter out excluded PIDs if configured
                if (!empty($excludedPids)) {
                    $filteredEntities = [];
                    foreach ($queryResult as $entity) {
                        if (!in_array($entity->getPid(), $excludedPids, true)) {
                            $filteredEntities[] = $entity;
                        }
                    }

                    // Manual pagination for filtered results
                    $currentPage = max(1, (int)($queryParams['currentPage'] ?? 1));
                    $itemsPerPage = max(1, (int)($queryParams['itemsPerPage'] ?? 10));
                    $pagination = $this->paginateArray($filteredEntities, $currentPage, $itemsPerPage);
                } else {
                    // Use PaginationService for unfiltered results
                    $currentPage = max(1, (int)($queryParams['currentPage'] ?? 1));
                    $itemsPerPage = max(1, (int)($queryParams['itemsPerPage'] ?? 10));
                    $pagination = $this->paginationService->paginate($queryResult, $currentPage, $itemsPerPage);
                }

                // Serialize entities to JSON-ready arrays
                $serializedItems = [];
                foreach ($pagination['paginatedItems'] as $entity) {
                    $serializedItems[] = $this->jsonSerializerService->serializeEntity($entity);
                }

                // Build response with metadata
                $response = [
                    'data' => $serializedItems,
                    'pagination' => [
                        'currentPage' => $pagination['currentPage'],
                        'totalPages' => $pagination['totalPages'],
                        'itemsPerPage' => $pagination['itemsPerPage'],
                        'totalItems' => $pagination['totalItems'],
                        'hasNextPage' => $pagination['hasNextPage'],
                        'hasPreviousPage' => $pagination['hasPreviousPage'],
                    ],
                    'filters' => $filters, // Echo applied filters
                ];

                return new JsonResponse($response);

            } catch (\Exception $e) {
                // Handle errors gracefully with JSON response
                return new JsonResponse([
                    'error' => 'Internal server error',
                    'message' => 'Failed to fetch entities',
                    'status' => 500
                ], 500);
            }
        }

        // Not an API request - continue middleware chain
        return $handler->handle($request);
    }

    /**
     * Get the repository instance for the given entity type.
     *
     * @param string $entityType
     * @return object
     */
    private function getRepositoryForEntity(string $entityType): object
    {
        return match($entityType) {
            'persons' => $this->personsRepository,
            'products' => $this->productsRepository,
            'projects' => $this->projectsRepository,
            'publications' => $this->publicationsRepository,
            'services' => $this->servicesRepository,
            'units' => $this->unitsRepository,
        };
    }

    /**
     * Configure repository to query records.
     * If specific PIDs are provided, query only from those pages.
     * Otherwise, disable storage page constraint to query across all pages.
     *
     * @param object $repository
     * @param array $excludedPids (unused, kept for future repository-level filtering)
     * @param array $selectedPids Array of specific PIDs to query from (empty = all PIDs)
     * @return void
     */
    private function configureRepositoryForApi(object $repository, array $excludedPids = [], array $selectedPids = []): void
    {
        $querySettings = $repository->createQuery()->getQuerySettings();

        if (!empty($selectedPids)) {
            // Use specific storage pages when filtering by PIDs
            $querySettings->setRespectStoragePage(true);
            $querySettings->setStoragePageIds($selectedPids);
        } else {
            // Disable automatic storage page constraints to query all PIDs
            $querySettings->setRespectStoragePage(false);
        }

        $repository->setDefaultQuerySettings($querySettings);
    }

    /**
     * Get excluded PIDs from configuration.
     * Reads from site configuration or extension configuration.
     *
     * Configuration hierarchy (in order of precedence):
     * 1. Site configuration: settings.academy.json.exclude
     * 2. Extension configuration: $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['academy']['jsonApiExclude']
     *
     * @param ServerRequestInterface $request
     * @return array
     */
    private function getExcludedPids(ServerRequestInterface $request): array
    {
        try {
            // Try to get from site configuration first
            $site = $request->getAttribute('site');
            if ($site) {
                $siteConfig = $site->getConfiguration();
                $excludeConfig = $siteConfig['settings']['academy']['json']['exclude'] ?? '';

                if (!empty($excludeConfig)) {
                    if (is_array($excludeConfig)) {
                        return array_map('intval', $excludeConfig);
                    }
                    // Parse comma-separated PIDs
                    return GeneralUtility::intExplode(',', $excludeConfig, true);
                }
            }

            // Fallback: Try to get from extension configuration
            if (isset($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['academy']['jsonApiExclude'])) {
                $excludeConfig = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['academy']['jsonApiExclude'];
                if (!empty($excludeConfig)) {
                    if (is_array($excludeConfig)) {
                        return array_map('intval', $excludeConfig);
                    }
                    return GeneralUtility::intExplode(',', $excludeConfig, true);
                }
            }
        } catch (\Exception $e) {
            // If configuration is not available, return empty array
        }

        return [];
    }

    /**
     * Paginate an array of entities manually.
     * Used when PID filtering is applied and PaginationService cannot be used.
     *
     * @param array $entities
     * @param int $currentPage
     * @param int $itemsPerPage
     * @return array
     */
    private function paginateArray(array $entities, int $currentPage, int $itemsPerPage): array
    {
        $totalItems = count($entities);
        $totalPages = (int)ceil($totalItems / $itemsPerPage);
        $currentPage = min($currentPage, max(1, $totalPages)); // Ensure valid page

        $offset = ($currentPage - 1) * $itemsPerPage;
        $paginatedItems = array_slice($entities, $offset, $itemsPerPage);

        return [
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'itemsPerPage' => $itemsPerPage,
            'totalItems' => $totalItems,
            'hasNextPage' => $currentPage < $totalPages,
            'hasPreviousPage' => $currentPage > 1,
            'paginatedItems' => $paginatedItems,
        ];
    }
}
