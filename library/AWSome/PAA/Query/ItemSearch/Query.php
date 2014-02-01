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
namespace AWSome\PAA\Query\ItemSearch;

use AWSome\PAA\Core\Query as CoreQuery;

/**
 * Query for ItemSearch
 *
 * @author jobou
 */
class Query extends CoreQuery 
{
    /**
     * Get the parser used for this query
     * 
     * @return \AWSome\PAA\Query\ItemSearch\Parser
     */
    public function getParser()
    {
        return new Parser();
    }
}
