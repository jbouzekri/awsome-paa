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
namespace AWSome\PAA\Core\Hydrator;

use AWSome\PAA\Core\Response;

/**
 * AbstractHydrator
 *
 * @author jobou
 */
abstract class AbstractHydrator
{
    /**
     * Hydrate mode
     * Array
     */
    const ARRAY_HYDRATATION = "array";

    /**
     * Get a response, parse it and
     *
     * @param \AWSome\PAA\Core\Response $response the response from the adapter
     *
     * @return mixed
     */
    abstract public function hydrate(Response $response);
}
