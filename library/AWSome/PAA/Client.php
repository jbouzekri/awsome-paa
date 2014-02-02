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
use AWSome\PAA\Core\Response;
use AWSome\PAA\Adapter\AdapterInterface;
use AWSome\PAA\Core\Parser\ResponseParserInterface;

/**
 * Main for the library
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
    private $defaultAdapter = 'AWSome\\PAA\\Adapter\\GuzzleAdapter';

    /**
     * available hydrators
     *
     * @var array
     */
    private $hydrators = array(
        self::HYDRATE_ARRAY => 'AWSome\\PAA\\Core\\Hydrator\\ArrayHydrator',
        self::HYDRATE_OBJECT => 'AWSome\\PAA\\Core\\Hydrator\\ObjectHydrator',
    );

    /**
     * available query types
     *
     * @var array
     */
    private $queryTypes = array(
        "ItemSearch" => "AWSome\\PAA\\Query\\ItemSearch\\Query"
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
     * with a class {@link self::$defaultAdapter}
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
     * @param string $hydrate the hydratation method for the result
     * @param boolean $validate define if we validate the query before sending it
     *
     * @return mixed
     *
     * @throw \AWSome\PAA\Exception\RequestParameterException
     */
    public function execute(Query $query, $hydrate = self::HYDRATE_ARRAY, $validate = false)
    {
        if ($validate) {
            $this->validate($query);
        }

        $query->setAssociateTag($this->associateTag);
        $query->buildSignature($this->awsAccessKeyId, $this->awsSecretAccessKey);

        $response = $this->getAdapter()->execute($query);

        $result = $this->createResult($query, $response, $hydrate);

        return $result;
    }

    /**
     * Read response and create the result
     *
     * @param \AWSome\PAA\Core\Query $query the query used to obtain this response
     * @param \AWSome\PAA\Core\Response $response the response object
     * @param string $hydrate the hydratation method
     *
     * @return mixed
     */
    public function createResult(Query $query, Response $response, $hydrate = self::HYDRATE_OBJECT)
    {
        $hydrator = new $this->hydrators[$hydrate]();
        $hydrator->setResponse($response);

        return $query->getParser()->parse($response, $hydrator);
    }

    /**
     * Pass the query in a chain of validator to check its request parameters
     *
     * @param \AWSome\PAA\Core\Query $query the query to validate
     *
     * @throw \AWSome\PAA\Exception\RequestParameterException
     */
    public function validate(Query $query)
    {
        foreach ($query->getValidators() as $validatorClass) {
            $validator = new $validatorClass();
            $validator->validate($query);
        }
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
