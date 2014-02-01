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
namespace AWSome\PAA\Core\Parser;

use AWSome\PAA\Exception\ErrorResponseException;
use AWSome\PAA\Core\Parser\ResponseParserInterface;
use AWSome\PAA\Core\Response;
use AWSome\PAA\Core\Hydrator\AbstractHydrator;

/**
 * Description of XmlParser
 *
 * @author jobou
 */
abstract class AbstractXmlParser implements ResponseParserInterface
{
    /**
     * {@inheritDoc}
     */
    public function parse(Response $response, AbstractHydrator $hydrator) 
    {
        $parsedXml = new \SimpleXMLElement($response->getData());
        
        $this->parseError($parsedXml, $hydrator);

        $isValid = (string) $parsedXml->Items->Request->IsValid === "True";
        $hydrator->setIsValid($isValid);
        
        $requestId = (string) $parsedXml->OperationRequest->RequestId;
        $hydrator->setRequestId($requestId);
        
        $processingTime = (float) $parsedXml->OperationRequest->RequestProcessingTime;
        $hydrator->setProcessingTime($processingTime);
        
        if ($isValid)
        {
            $this->parseItems($parsedXml, $hydrator);
        }
        
        return $hydrator->getResult();
    }
    
    /**
     * Parse response for generic errors
     * 
     * @param \SimpleXMLElement $parsedXml the main element of the parsed response
     * 
     * @throw \AWSome\PAA\Exception\ErrorResponseException
     */
    public function parseError(\SimpleXMLElement $parsedXml, AbstractHydrator $hydrator)
    {
        if ($parsedXml->Error) {
            throw new ErrorResponseException(
                $parsedXml->Error->Message, 
                $parsedXml->Error->Code,
                $parsedXml->RequestId
            );
        }

        if ($parsedXml->Items->Request->Errors && $parsedXml->Items->Request->Errors->Error) {
            foreach ($parsedXml->Items->Request->Errors->Error as $error) {
                $hydrator->buildError(
                    (string) $error->Code,
                    (string) $error->Message
                );
            }
        }
    }
    
    /**
     * Parse custom result for each query
     */
    public abstract function parseItems(\SimpleXMLElement $parsedXml, AbstractHydrator $hydrator);
}
