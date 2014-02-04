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
     * The result build
     *
     * @var mixed
     */
    protected $result = array();

    /**
     * {@inheritDoc}
     */
    public function parse(Query $query, Response $response, AbstractHydrator $hydrate)
    {
        $parsedXml = new \SimpleXMLElement($response->getData());

        $this->parseError($parsedXml);

        $isValid = (string) $parsedXml->Items->Request->IsValid === "True";
        $hydrate->setIsValid($isValid);

        $requestId = (string) $parsedXml->OperationRequest->RequestId;
        $hydrate->setRequestId($requestId);

        $processingTime = (float) $parsedXml->OperationRequest->RequestProcessingTime;
        $hydrate->setProcessingTime($processingTime);

        if ($isValid)
        {
            $this->parseItems($parsedXml, $hydrate);
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
        if (isset($parsedXml->Error)) {
            throw new ErrorResponseException(
                $parsedXml->Error->Message,
                $parsedXml->Error->Code,
                $parsedXml->RequestId
            );
        }

        if (isset($parsedXml->Items->Request->Errors) && isset($parsedXml->Items->Request->Errors->Error)) {
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
    public abstract function parseItems(\SimpleXMLElement $parsedXml, $hydrator);
}
