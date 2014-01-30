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
namespace AWSome\PAA\Configuration;

/**
 * AbstractConfiguration for configuration instances
 * Default locale is FR
 *
 * @author jobou
 */
class Configuration 
{
    /**
     * The locale for this configuration
     * 
     * @var string
     */
    private $locale = "FR";
    
    /**
     * Base Url
     * 
     * @var string 
     */
    private $http = "http://webservices.amazon.fr/onca/xml";
    
    /**
     * SSL Base Url
     * 
     * @var string 
     */
    private $https = "https://webservices.amazon.fr/onca/xml";
    
    /**
     * Get the base url
     * 
     * @param boolean $ssl
     * @return type
     */
    public function getBaseUrl($ssl = false)
    {
        if ($ssl) {
            return $this->https;
        }
        
        return $this->http;
    }
    
    /**
     * Get the locale of the configuration
     * 
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
