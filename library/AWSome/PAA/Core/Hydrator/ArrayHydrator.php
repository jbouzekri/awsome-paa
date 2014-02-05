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
 * Hydrate result as array
 *
 * @author jobou
 */
class ArrayHydrator extends AbstractHydrator
{
    /**
     * {@inheritDoc}
     */
    public function hydrate(Response $response)
    {
        $parsedXml = simplexml_load_string($response->getData());

        return json_decode(json_encode($parsedXml), true);
    }
}
