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
namespace AWSome\PAA\Core\Hydrator;

use AWSome\PAA\Core\Result;
use AWSome\PAA\Core\Response;

/**
 * Hydrate result as object
 *
 * @author jobou
 */
class ObjectHydrator extends AbstractHydrator
{
    /**
     * Constructor
     * Instantiate the result base
     */
    public function __construct() 
    {
        $this->result = new Result();
    }
    
    /**
     * {@inheritDoc}
     */
    public function addError(array $error) 
    {
        $this->result->addError($error);
    }
    
    /**
     * {@inheritDoc}
     */
    public function setIsValid($isValid) 
    {
        $this->result->setIsValid($isValid);
    }
    
    /**
     * {@inheritDoc}
     */
    public function setResponse(Response $response) 
    {
        $this->result->setResponse($response);
    }
    
    /**
     * {@inheritDoc}
     */
    public function setRequestId($requestId) 
    {
        $this->result->setRequestId($requestId);
    }
    
    /**
     * {@inheritDoc}
     */
    public function setProcessingTime($processingTime) 
    {
        $this->result->setProcessingTime($processingTime);
    }
}
