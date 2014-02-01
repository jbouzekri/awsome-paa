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

use AWSome\PAA\Core\Response;

/**
 * Hydrate result as array
 *
 * @author jobou
 */
class ArrayHydrator extends AbstractHydrator
{
    /**
     * Constructor
     * Instantiate the result base
     */
    public function __construct() 
    {
        $this->result = array();
    }

    /**
     * {@inheritDoc}
     */
    public function addError(array $error) 
    {
        $this->result['errors'][] = $error;
    }

    /**
     * {@inheritDoc}
     */
    public function setIsValid($isValid) 
    {
        $this->result['isValid'] = $isValid;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setResponse(Response $response) 
    {
        $this->result['response']['raw'] = $response->getData();
    }
    
    /**
     * {@inheritDoc}
     */
    public function setRequestId($requestId) 
    {
        $this->result['requestId'] = $requestId;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setProcessingTime($processingTime) 
    {
        $this->result['processingTime'] = $processingTime;
    }
}
