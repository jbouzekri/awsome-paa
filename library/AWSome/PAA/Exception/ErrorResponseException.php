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
namespace AWSome\PAA\Exception;

/**
 * Exception thrown when the response return an error from the server
 *
 * @author jobou
 */
class ErrorResponseException extends AwsPaaException
{
    
    /**
     * Request id returned by the service
     * 
     * @var string 
     */
    protected $requestId;
    
    /**
     * Code returned by the servgice
     * 
     * @var string 
     */
    protected $responseCode;
    
    /**
     * Constructor for response error exception
     * 
     * @param string $message the message returned by the service
     * @param string $responseCode the code returned by the service (not a long)
     * @param string $requestId the request id returned by the service
     * @param \Exception $previous params to chained exception
     */
    public function __construct($message, $responseCode, $requestId, $previous = null) 
    {
        $this->requestId = $requestId;
        $this->responseCode = $responseCode;
        parent::__construct($message, null, $previous);
    }
    
    /**
     * Get the request id
     * 
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }
    
    /**
     * Get the response code
     * 
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
