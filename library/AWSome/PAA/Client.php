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
namespace AWSome\PAA;

use AWSome\PAA\Query\Query;

/**
 * Description of Client
 *
 * @author Jonathan Bouzekri <jonathan.bouzekri@gmail.com>
 */
class Client 
{
    /**
     * Your AWS access key id which has access to the Product Advertising API
     *  
     * @var string
     */
    private $awsAccessKeyId;
    
    /**
     * Your AWS secret access key which has access to the Product Advertising API
     *  
     * @var string
     */
    private $awsSecretAccessKey;
    
    /**
     * Your associate tag
     *  
     * @var string
     */
    private $associateTag;
    
    /**
     * Constructor
     * 
     * @param string $awsAccessKeyId Your AWS access key id which has access to the Product Advertising API
     * @param string $awsSecretAccessKey Your AWS secret access key which has access to the Product Advertising API
     * @param string $associateTag Your associate tag
     */
    public function __construct($awsAccessKeyId, $awsSecretAccessKey, $associateTag = null) 
    {
        $this->awsAccessKeyId = $awsAccessKeyId;
        $this->awsSecretAccessKey = $awsSecretAccessKey;
        $this->associateTag = $associateTag;
    }
    
    /**
     * Create a query object
     * 
     * @param string $type the type of your query
     */
    public function createQuery($type)
    {
        return new Query();
    }
}
