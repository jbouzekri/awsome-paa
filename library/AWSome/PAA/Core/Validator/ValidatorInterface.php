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
namespace AWSome\PAA\Core\Validator;

use AWSome\PAA\Core\Query;

/**
 * The interface for all validator
 *
 * @author jobou
 */
interface ValidatorInterface
{
    /**
     * Validate the query
     *
     * @throw \AWSome\PAA\Exception\RequestParameterException
     * 
     * @return boolean
     */
    public function validate(Query $query);
}
