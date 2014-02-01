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
 * Result class returned after processing response
 * if hydrate mode is object
 *
 * @author jobou
 */
class Result 
{
    /**
     * The response
     * 
     * @var \AWSome\PAA\Core\Response
     */
    protected $response;
    
    /**
     * the request id
     * 
     * @var string
     */
    protected $requestId = null;
    
    /**
     * The processing time of the request
     * 
     * @var float
     */
    protected $processingTime = null;
    
    /**
     * Indicate if the request was valid
     * 
     * @var boolean
     */
    protected $isValid = true;
    
    /**
     * All errors returned
     * empty if isValid is true (no error)
     * 
     * @var array 
     */
    protected $errors = array();
    
    /**
     * Items returned
     * empty if isValid is false (errors)
     * 
     * @var array 
     */
    protected $items = array();
    
    /**
     * Get response
     * 
     * @return \AWSome\PAA\Core\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    /**
     * Set the response
     * 
     * @param \AWSome\PAA\Core\Response $response the response object
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
        
        return $this;
    }
    
    /**
     * Get request id
     * 
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }
    
    /**
     * Set the request id
     * 
     * @param string $requestId the request id
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        
        return $this;
    }
    
    /**
     * Get processing time
     * 
     * @return float
     */
    public function getProcessingTime()
    {
        return $this->processingTime;
    }
    
    /**
     * Set the processing time
     * 
     * @param string $processingTime the processing time
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function setProcessingTime($processingTime)
    {
        $this->processingTime = floatval($processingTime);
        
        return $this;
    }
    
    /**
     * Get isValid
     * 
     * @return boolean
     */
    public function isValid()
    {
        return $this->isValid;
    }
    
    /**
     * Set isValid
     * 
     * @param boolean $isValid the is valid value
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
        
        return $this;
    }
    
    /**
     * Get errors array
     * 
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
    
    /**
     * Add an error
     * 
     * @param array $error a formated error array
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function addError($error)
    {
        $this->errors[] = $error;
        
        return $this;
    }
    
    /**
     * Get items array
     * 
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Add an item
     * 
     * @param array $item a formated item result
     * 
     * @return \AWSome\PAA\Core\Result
     */
    public function addItem($item)
    {
        $this->items[] = $item;
        
        return $this;
    }
}
