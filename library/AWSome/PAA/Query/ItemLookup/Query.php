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
namespace AWSome\PAA\Query\ItemLookup;

use AWSome\PAA\Core\Query as CoreQuery;

/**
 * Query for ItemLookup
 *
 * @author jobou
 */
class Query extends CoreQuery
{
    /**
     * The default operation
     *
     * @var string
     */
    protected $operation = "ItemLookup";

    /**
     * Set search index in item search query
     * The value passed is validated according to locale
     *
     * @param string $searchIndex the search index value
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setSearchIndex($searchIndex)
    {
        if (!$this->getConfiguration()->isValidSearchIndex($searchIndex)) {
            throw new \AWSome\PAA\Exception\RequestParameterException(
                'Invalid search index value : ' .
                $searchIndex .
                '. Choose one from : ' .
                implode(', ', $this->getConfiguration()->getSearchIndexes())
            );
        }

        $this->addQueryParameter('SearchIndex', $searchIndex);

        return $this;
    }

    /**
     * Specify the ItemLookup IdType parameter
     *
     * @param string $idType the IdType you want to provide
     *
     * @return \AWSome\PAA\Query\ItemLookup\Query
     */
    public function setIdType($idType)
    {
        $this->addQueryParameter("IdType", $idType);

        return $this;
    }

    /**
     * Specify the ItemLookup ItemId parameter
     *
     * @param string $itemId the ItemId you want to look up
     *
     * @return \AWSome\PAA\Query\ItemLookup\Query
     */
    public function setItemId($itemId)
    {
        $this->addQueryParameter("ItemId", $itemId);

        return $this;
    }
}
