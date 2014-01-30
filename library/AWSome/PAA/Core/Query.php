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
    private $signature;
    
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
        $this->signature = "";
        
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
            $factory = new ConfigurationFactory();
            $this->configuration = $factory->get($this->getLocale());
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
     * Get the request url for this query
     * 
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->getConfiguration()->getBaseUrl();
    }
}
