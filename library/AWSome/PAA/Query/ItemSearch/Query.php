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

use AWSome\PAA\Core\Query as CoreQuery;

/**
 * Query for ItemSearch
 *
 * @author jobou
 */
class Query extends CoreQuery
{
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
     * Set Keywords parameter
     *
     * @param string $keywords
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setKeywords($keywords)
    {
        $this->addQueryParameter("Keywords", $keywords);

        return $this;
    }

    /**
     * Set Title parameter
     *
     * @param string $title the title you want to search
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setTitle($title)
    {
        $this->addQueryParameter("Title", $title);

        return $this;
    }

    /**
     * Set Manufacturer parameter
     *
     * @param string $manufacturer the manufacturer you want to search
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setManufacturer($manufacturer)
    {
        $this->addQueryParameter("Manufacturer", $manufacturer);

        return $this;
    }

    /**
     * Set Author parameter
     *
     * @param string $author the author you want to search
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setAuthor($author)
    {
        $this->addQueryParameter("Author", $author);

        return $this;
    }

    /**
     * Set Actor parameter
     *
     * @param string $actor the actor you want to search
     *
     * @return \AWSome\PAA\Query\ItemSearch\Query
     */
    public function setActor($actor)
    {
        $this->addQueryParameter("Actor", $actor);

        return $this;
    }
}
