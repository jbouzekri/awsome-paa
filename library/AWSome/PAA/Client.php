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
     * Hydrate mode
     * Array
     */
    const HYDRATE_ARRAY = "array";

    /**
     * Hydrate mode
     * Object
     */
    const HYDRATE_OBJECT = "object";
    
    /**
     * The default adapter class
     * 
     * @var string
     */
    private $defaultAdapter = 'AWSome\PAA\Adapter\GuzzleAdapter';
    
    /**
     * Query type for operation ItemSearch
     */
    const QUERY_ITEM_SEARCH = "AWSome\\PAA\\Core\\Query";
    
    
    /**
     * available query types
     * 
     * @var array
     */
    private $queryTypes = array(
        "ItemSearch" => self::QUERY_ITEM_SEARCH
    );
    
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
     * @param string $associateTag Your associate tag (not mandatory)
     */
    public function __construct($awsAccessKeyId, $awsSecretAccessKey, $associateTag = "Amazon") 
    {
        $this->awsAccessKeyId = $awsAccessKeyId;
        $this->awsSecretAccessKey = $awsSecretAccessKey;
        $this->associateTag = $associateTag;
    }
    
    /**
     * Shortcut to create an item search query
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function itemSearch()
    {
        return $this->createQuery("ItemSearch");
    }
    
    /**
     * Create a query object
     * 
     * @param string $type the type of your query
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function createQuery($type)
    {
        if (!array_key_exists($type, $this->queryTypes)) {
            throw new Exception\QueryException('Unknown query type : '.$type);
        }
        
        return new $this->queryTypes[$type]();
    }
    
    /**
     * Execute the query
     * 
     * @param \AWSome\PAA\Core\Query $query the query to execute
     */
    public function execute(Query $query, $hydrate = self::HYDRATE_ARRAY)
    {
        $query->buildSignature($this->awsAccessKeyId, $this->awsSecretAccessKey);
        $response = $this->getAdapter()->execute($query);
        
        $result = $this->createResult($query, $response, $hydrate);
        
        return $result;
    }
    
    /**
     * Read response and create the result
     * 
     * @param \AWSome\PAA\Core\Query $query the query used to obtain this response
     * @param string $response the response body
     * @param string $hydrate the hydratation method
     * 
     * @return Result
     */
    public function createResult(Query $query, $response, $hydrate)
    {
        $parsedXml = new \SimpleXMLElement($response);
        if ($parsedXml->Error) {
            throw new Exception\ErrorResponseException(
                $parsedXml->Error->Message, 
                $parsedXml->Error->Code,
                $parsedXml->RequestId
            );
        }
        
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
    
    /**
     * Register new query types
     * 
     * @param array $queryTypes
     */
    public function registerQueryTypes(array $queryTypes)
    {
        $this->queryTypes = array_merge($this->queryTypes, $queryTypes);
    }
}
