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
 * ResponseGroup Small configuration
 *
 * @author jobou
 */
class Small
{
    /**
     * {@inheritDoc}
     */
    public static function elements()
    {
        return array(
            "ASIN" => "ASIN",
            "DetailPageURL" => "DetailPageURL",
            "Director" => "ItemAttributes\\Director",
            "Manufacturer" => "ItemAttributes\\Manufacturer",
            "ProductGroup" => "ItemAttributes\\ProductGroup",
            "Title" => "ItemAttributes\\Title",
            "Creator" => "ItemAttributes\\Creator",
            "Actor" => "ItemAttributes\\Actor",
            "ItemLink" => "ItemLinks\\ItemLink"
        );
    }
}
