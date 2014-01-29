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
namespace AWSome\PAA\Core;

/**
 * The response object which must be returned by the adapter
 *
 * @author jobou
 */
class Response 
{
    /**
     * The raw data received from the service
     * 
     * @var string
     */
    private $raw;
    
    /**
     * Get raw data from the response
     * 
     * @return string
     */
    public function getData()
    {
        return $this->raw;
    }
    
    public function setData($raw)
    {
        $this->raw = $raw;
        
        return $this;
    }
}
