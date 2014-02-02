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
    protected $locale = "FR";

    /**
     * Non secured protocol
     *
     * @var string
     */
    protected $protocol = "http";


    /**
     * Secured protocol
     *
     * @var string
     */
    protected $sslProtocol = "https";

    /**
     * Hostname
     *
     * @var string
     */
    protected $hostname = "webservices.amazon.fr";

    /**
     * Uri
     *
     * @var string
     */
    protected $uri = "/onca/xml";

    /**
     * Array of authorized search index
     *
     * @var type
     */
    protected $searchIndexes = array(
        "All",
        "Apparel",
        "Automotive",
        "Baby",
        "Beauty",
        "Blended",
        "Books",
        "Classical",
        "DVD",
        "Electronics",
        "ForeignBooks",
        "HealthPersonalCare",
        "HomeImprovement",
        "Jewelry",
        "KindleStore",
        "Kitchen",
        "Lighting",
        "Luggage",
        "MobileApps",
        "MP3Downloads",
        "Music",
        "MusicalInstruments",
        "MusicTracks",
        "OfficeProducts",
        "Outlet",
        "PetSupplies",
        "Shoes",
        "Software",
        "SoftwareVideoGames",
        "VHS",
        "Video",
        "VideoGames",
        "Watches"
    );

    /**
     * Get protocol
     *
     * @param bool $ssl set to true if ssl request
     *
     * @return string
     */
    public function getProtocol($ssl = false)
    {
        if ($ssl) {
            return $this->protocol;
        }

        return $this->protocol;
    }

    /**
     * Get the base url
     *
     * @param boolean $ssl set to true if ssl request
     *
     * @return string
     */
    public function getBaseUrl($ssl = false)
    {
        return $this->getProtocol($ssl) . '://' . $this->hostname . $this->uri;
    }

    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Get uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
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

    /**
     * Get search indexes authorized values
     *
     * @return array
     */
    public function getSearchIndexes()
    {
        return $this->searchIndexes;
    }

    /**
     * Check if the search index value is a correct one
     *
     * @param string $searchIndex a search index value
     *
     * @return bool
     */
    public function isValidSearchIndex($searchIndex)
    {
        return in_array($searchIndex, $this->searchIndexes);
    }
}
