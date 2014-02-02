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

use AWSome\PAA\Configuration\ConfigurationFactory;
use AWSome\PAA\Configuration\Configuration;

/**
 * The query object
 *
 * @author Jonathan Bouzekri <jonathan.bouzekri@gmail.com>
 */
class Query 
{
    /**
     * The default operation
     * 
     * @var string
     */
    protected $operation = "ItemSearch";
    
    /**
     * Query locale (Default FR)
     * 
     * @var string
     */
    protected $locale = "FR";
    
    /**
     * Configuration used with locale
     * 
     * @var \AWSome\PAA\Configuration\Configuration 
     */
    protected $configuration;
    
    /**
     * Signature Hash
     * 
     * @var string
     */
    protected $signature;
    
    /**
     * The service access key id
     * 
     * @var string
     */
    protected $accessKeyId;
    
    /**
     * Timestamp of the request
     * 
     * @var string 
     */
    protected $timestamp;
    
    /**
     * An array of query parameters
     * 
     * @var array
     */
    protected $queryParameters = array(
        "Service" => "AWSECommerceService",
        "Version" => "2011-08-01"
    );
    
    /**
     * Build the signature of the query
     * 
     * @param string $accessKeyId Your AWS access key id which has access to the Product Advertising API
     * @param string $secretAccessKey Your AWS secret access key which has access to the Product Advertising API
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function buildSignature($accessKeyId, $secretAccessKey)
    {
        $this->accessKeyId = $accessKeyId;
        
        $toSign = "GET\n";
        $toSign .= $this->getConfiguration()->getHostname()."\n";
        $toSign .= $this->getConfiguration()->getUri()."\n";
        $toSign .= http_build_query($this->getAllOrderedQueryParameters());

        $this->signature = base64_encode(hash_hmac("sha256", $toSign, $secretAccessKey, true));

        return $this;
    }
    
    /**
     * Get locale
     * 
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
    
    /**
     * Set a locale
     * Reset configuration instance if locale changed
     * 
     * @param string $locale the locale for the query
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        
        if ($this->configuration && $this->configuration->getLocale() !== $this->locale) {
            $this->configuration = null;
        }
        
        return $this;
    }
    
    /**
     * Get the configuration for the query according to its locale
     * 
     * @return \AWSome\PAA\Configuration\Configuration
     */
    public function getConfiguration()
    {
        if (!$this->configuration) {
            $configurationFactory = new ConfigurationFactory();
            $this->configuration = $configurationFactory->get($this->getLocale());
        }
        
        return $this->configuration;
    }
    
    /**
     * Set a custom configuration
     * 
     * @param \AWSome\PAA\Configuration\Configuration $configuration allow to force a custom configuration
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
        
        return $this;
    }
    
    /**
     * Override all query parameters
     * 
     * @param array $parameters an array of query parameters
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function setQueryParameters(array $parameters)
    {
        $this->queryParameters = $parameters;
        
        return $this;
    }
    
    /**
     * Add multiple query parameter (or modify the existing) in one go
     * 
     * @param array $parameters an array of parameters
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function addQueryParameters(array $parameters)
    {
        $this->queryParameters = array_merge($this->queryParameters, $parameters);
        
        return $this;
    }
    
    /**
     * Add a query parameter (or modify an existing one)
     * 
     * @param string $key the parameter key
     * @param string $value the parameter value
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function addQueryParameter($key, $value)
    {
        $this->queryParameters[$key] = $value;
        
        return $this;
    }
    
    /**
     * Get all configured query parameters (except signature and keys)
     * 
     * @return array
     */
    public function getQueryParameters()
    {
        return $this->queryParameters;
    }
    
    /**
     * Get all query parameters and sort them by key
     * (Mainly used to generate signature)
     * 
     * @return array
     */
    public function getAllOrderedQueryParameters()
    {
        $queryParameters = $this->queryParameters;
        $queryParameters["AWSAccessKeyId"] = $this->accessKeyId;
        $queryParameters["Timestamp"] = $this->getTimestamp();
        $queryParameters["Operation"] = $this->operation;
        
        ksort($queryParameters);
        
        return $queryParameters;
    }
    
    /**
     * Get the request url for this query without security parameters
     * 
     * @return string
     */
    public function getUnsignedRequestUrl()
    {
        return $this->getConfiguration()->getBaseUrl() . 
            "?" . http_build_query($this->getAllOrderedQueryParameters())
        ;
    }
    
    /**
     * Get the request url for this query
     * 
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->getUnsignedRequestUrl() . 
            "&Signature=" . urlencode($this->signature)
        ;
    }
    
    /**
     * Get timestamp for query
     * 
     * @return string
     */
    public function getTimestamp()
    {
        if (!$this->timestamp) {
            // AWS use time format iso 8601 and GMT time zone
            $date = new \DateTime("now", new \DateTimeZone('GMT'));
            // Store the timestamp generated to be sure we are using the same one in the auth process and the request
            $this->timestamp = $date->format("c");
        }
        
        return $this->timestamp;
    }
    
    /**
     * Set the associate tag
     * 
     * @param string $associateTag the associate tag to set in the query
     * 
     * @return \AWSome\PAA\Core\Query
     */
    public function setAssociateTag($associateTag)
    {
        $this->addQueryParameter("AssociateTag", $associateTag);
        
        return $this;
    }
}
