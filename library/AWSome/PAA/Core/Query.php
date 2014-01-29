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
 * The query object
 *
 * @author Jonathan Bouzekri <jonathan.bouzekri@gmail.com>
 */
class Query 
{
    /**
     * Signature Hash
     * 
     * @var string
     */
    private $signature;
    
    /**
     * Build the signature of the query
     * 
     * @param string $accessKeyId Your AWS access key id which has access to the Product Advertising API
     * @param string $secretAccessKey Your AWS secret access key which has access to the Product Advertising API
     * 
     * @return Query
     */
    public function buildSignature($accessKeyId, $secretAccessKey)
    {
        $this->signature = "";
        
        return $this;
    }
}
