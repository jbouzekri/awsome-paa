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
namespace AWSome\PAA\Query\ItemSearch\ResponseGroup;

/**
 * Interface for all response group
 *
 * @author jobou
 */
interface ResponseGroupInterface
{
    /**
     * Mapping between element key and position in xml
     *
     * @return array
     */
    public static function elements();
}
