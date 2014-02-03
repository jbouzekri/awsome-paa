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
use AWSome\PAA\Core\Query;

/**
 * Description of XmlParser
 *
 * @author jobou
 */
abstract class AbstractXmlParser implements ResponseParserInterface
{
    /**
     * The hydrator used to build the result
     *
     * @var \AWSome\PAA\Core\Hydrator\AbstractHydrator\AbstractHydrator
     */
    protected $hydrator;

    /**
     * The result build
     *
     * @var mixed
     */
    protected $result = array();

    /**
     * {@inheritDoc}
     */
    public function parse(Query $query, Response $response, $hydrate)
    {
        $parsedXml = new \SimpleXMLElement($response->getData());

        $this->parseError($parsedXml);

        $isValid = (string) $parsedXml->Items->Request->IsValid === "True";
        //$this->hydrator->setIsValid($isValid);
        $this->result['IsValid'] = $isValid;

        $requestId = (string) $parsedXml->OperationRequest->RequestId;
        //$this->hydrator->setRequestId($requestId);
        $this->result['RequestId'] = $requestId;

        $processingTime = (float) $parsedXml->OperationRequest->RequestProcessingTime;
        //$this->hydrator->setProcessingTime($processingTime);
        $this->result['ProcessingTime'] = $processingTime;

        if ($isValid)
        {
            $this->parseItems($parsedXml);
        }

        return $this->result;
    }

    /**
     * Parse response for generic errors
     *
     * @param \SimpleXMLElement $parsedXml the main element of the parsed response
     *
     * @throw \AWSome\PAA\Exception\ErrorResponseException
     */
    public function parseError(\SimpleXMLElement $parsedXml)
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
                /*$this->hydrator->buildError(
                    (string) $error->Code,
                    (string) $error->Message
                );*/
                $this->result['errors'][] = array(
                    'code' => (string) $error->Code,
                    'message' => (string) $error->Message
                );
            }
        }
    }

    /**
     * Parse custom result for each query
     */
    public abstract function parseItems(\SimpleXMLElement $parsedXml);
}
