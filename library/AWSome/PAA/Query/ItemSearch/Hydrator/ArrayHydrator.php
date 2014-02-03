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

use AWSome\PAA\Core\Hydrator\ArrayHydrator as CoreArrayHydrator;

/**
 * Hydrator for array and ItemSearch query
 *
 * @author jobou
 */
class ArrayHydrator extends CoreArrayHydrator implements ItemSearchHydratorInterface
{
    /**
     * {@inheritDoc}
     */
    public function setTotalResults($totalResults)
    {
        $this->result['totalResults'] = $totalResults;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalPages($totalPages)
    {
        $this->result['totalPages'] = $totalPages;
    }

    /**
     * {@inheritDoc}
     */
    public function setMoreSearchResultsUrl($moreSearchResultsUrl)
    {
        $this->result['moreSearchResultsUrl'] = $moreSearchResultsUrl;
    }
}
