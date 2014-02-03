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
namespace AWSome\PAA\Core\Parser;

use AWSome\PAA\Core\Query;
use AWSome\PAA\Core\Response;
use AWSome\PAA\Core\Hydrator\AbstractHydrator;

/**
 *
 * @author jobou
 */
interface ResponseParserInterface
{
    /**
     * Parse the response and return an hydrated result
     *
     * @param \AWSome\PAA\Core\Query $query the query used to obtain the response
     * @param \AWSome\PAA\Core\Response $response the response object to parse
     * @param string $hydrate the hydrator method
     *
     * @return mixed
     */
    public function parse(Query $query, Response $response, AbstractHydrator $hydrate);
}
