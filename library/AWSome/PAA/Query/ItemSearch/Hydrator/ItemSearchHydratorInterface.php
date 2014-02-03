<?php

/**
 * Copyright 2014 Jonathan Bouzekri. All rights reserved.
 *
 * @copyright Copyright 2014 Jonathan Bouzekri <jonathan.bouzekri@gmail.com>
 * @license https://github.com/jbouzekri/awsome-pma/blob/master/LICENSE
 * @link https://github.com/jbouzekri/awsome-pma
 */

/**
 * @namespace
 */
namespace AWSome\PAA\Query\ItemSearch\Hydrator;

/**
 * Interface for all Hydrator for ItemSearch query
 *
 * @author jobou
 */
interface ItemSearchHydratorInterface
{
    /**
     * Hydrate TotalResults
     *
     * @param int $totalResults
     */
    public function setTotalResults($totalResults);

    /**
     * Hydrate totalPages
     *
     * @param int $totalPages
     */
    public function setTotalPages($totalPages);

    /**
     * Hydrate moreSearchResultsUrl
     *
     * @param string $moreSearchResultsUrl
     */
    public function setMoreSearchResultsUrl($moreSearchResultsUrl);

    /**
     * Create an item
     *
     * @return mixed
     */
    public function createItem();
}
