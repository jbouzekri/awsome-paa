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

use AWSome\PAA\Core\Query;
use AWSome\PAA\Exception\AwsPaaException;
use AWSome\PAA\Adapter\AdapterInterface;

/**
 * Description of Client
 *
 * @author Jonathan Bouzekri <jonathan.bouzekri@gmail.com>
 */
class Client 
{
    /**
     * The default adapter class
     * 
     * @var string
     */
    private $defaultAdapter = 'AWSome\PAA\Adapter\GuzzleAdapter';
    
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
     * Adapter instance
     * Can be set with {@link setAdapter()} or is instanciated in first call of {@link getAdapter()}
     * with a class {@link self::DEFAULT_ADAPTER}
     * 
     * @var \AWSome\PAA\Adapter\AdapterInterface
     */
    private $adapter;
    
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
    public function createQuery($type = "")
    {
        return new Query();
    }
    
    /**
     * Execute the query
     * 
     * @param \AWSome\PAA\Core\Query $query the query to execute
     */
    public function execute(Query $query)
    {
        $query->buildSignature($this->awsAccessKeyId, $this->awsSecretAccessKey);
        $response = $this->getAdapter()->execute($query);
        
        return $response;
    }
    
    /**
     * Set a custom adapter
     * 
     * @param AdapterInterface $adapter a custom adapter to send a query
     * 
     * @return Client
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        
        return $this;
    }
    
    /**
     * get an adapter
     * 
     * @return AdapterInterface
     */
    public function getAdapter()
    {
        if (null === $this->adapter) {
            $this->adapter = new $this->defaultAdapter();
        }
        
        return $this->adapter;
    }
}
