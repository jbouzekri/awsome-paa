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

use AWSome\PAA\Core\Hydrator\AbstractHydrator;
use AWSome\PAA\Core\Response;

/**
 *
 * @author jobou
 */
interface ResponseParserInterface 
{
    /**
     * Parse the response and return an hydrated result
     * 
     * @param \AWSome\PAA\Core\Response $response the response object to parse
     * @param \AWSome\PAA\Core\Hydrator\AbstractHydrator $hydrator the hydrator method
     * 
     * @return mixed
     */
    public function parse(Response $response, AbstractHydrator $hydrator);
}
