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
 * AbstractHydrator
 *
 * @author jobou
 */
abstract class AbstractHydrator 
{
    /**
     * The result item
     * 
     * @var mixed
     */
    protected $result;
    
    /**
     * Get the result
     * 
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
    
    /**
     * Build an error item and add it to the result
     * 
     * @param string $code the code of the error
     * @param string $message the message of the error
     */
    public function buildError($code, $message)
    {
        $this->addError(array(
            'code' => $code,
            'message' => $message
        ));
    }
    
    /**
     * Set the response
     * 
     * @param \AWSome\PAA\Core\Response $response
     */
    public abstract function setResponse(Response $response);
    
    /**
     * Add the error item to the result
     * 
     * @param array $error
     */
    public abstract function addError(array $error);
    
    /**
     * Set is valid
     * 
     * @param boolean $isValid
     */
    public abstract function setIsValid($isValid);
    
    /**
     * set request id
     * 
     * @param string $requestId
     */
    public abstract function setRequestId($requestId);
    
    /**
     * set processing time
     * 
     * @param string $processingTime
     */
    public abstract function setProcessingTime($processingTime);
}
