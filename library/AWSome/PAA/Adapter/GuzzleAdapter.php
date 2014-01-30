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
namespace AWSome\PAA\Adapter;

/**
 * Adapter using the guzzle library
 *
 * @author jobou
 */
class GuzzleAdapter implements AdapterInterface
{
    private $client;
    
    /**
     * 
     */
    public function __construct() 
    {
        $this->client = new GuzzleClient();
    }
    /**
     * {@inheritDoc}
     */
    public function execute(Query $query) 
    {
        $url = $query->getRequestUrl();
        
        $request = $this->client->get($url);
        $response = $this->client->send($request);
        
        return (string) $response->getBody();
    }
}
