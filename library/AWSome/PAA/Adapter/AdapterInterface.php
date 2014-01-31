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
namespace AWSome\PAA\Adapter;

use AWSome\PAA\Core\Query;

/**
 * The interface for all adapter which are sending the query
 * 
 * @author jobou
 */
interface AdapterInterface 
{
    /**
     * Execute a query and return a response
     * 
     * @return Response
     */
    public function execute(Query $query);
}
