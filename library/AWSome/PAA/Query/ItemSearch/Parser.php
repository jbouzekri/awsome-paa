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
namespace AWSome\PAA\Query\ItemSearch;

use AWSome\PAA\Core\Parser\AbstractXmlParser;
use AWSome\PAA\Core\Hydrator\AbstractHydrator;

/**
 * Parser for ItemSearch queries
 *
 * @author jobou
 */
class Parser extends AbstractXmlParser
{
    /**
     * {@inheritDoc}
     */
    public function parseItems(\SimpleXMLElement $parsedXml)
    {
        $totalResults = (int) $parsedXml->Items->TotalResults;
        $this->result['TotalResults'] = $totalResults;

        $totalPages = (int) $parsedXml->Items->TotalPages;
        $this->result['TotalPages'] = $totalPages;

        $moreSearchResultsUrl = (string) $parsedXml->Items->MoreSearchResultsUrl;
        $this->result['MoreSearchResultsUrl'] = $moreSearchResultsUrl;

        foreach ($parsedXml->Items->Item as $item) {
            $formatedItem = array();
            $formatedItem['ASIN'] = (string) $item->ASIN;

            $this->result['items'][] = $formatedItem;
        }
    }
}
