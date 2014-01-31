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

use Guzzle\Http\Client;
use AWSome\PAA\Core\Query;
use Guzzle\Http\Exception\BadResponseException;

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
        $this->client = new Client();
    }
    /**
     * {@inheritDoc}
     */
    public function execute(Query $query) 
    {
        $url = $query->getRequestUrl();
        
        $request = $this->client->get($url);
        
        try {
            $response = $request->send($request);
        } catch (BadResponseException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $response = $e->getResponse();
        }
        
        return (string) $response->getBody();
    }
}
