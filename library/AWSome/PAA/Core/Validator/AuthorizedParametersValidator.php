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
namespace AWSome\PAA\Core\Validator;

use AWSome\PAA\Core\Query;
use AWSome\PAA\Exception\RequestParameterException;

/**
 * Validate if the requested parameters are right for the selected operation
 *
 * @author jobou
 */
class AuthorizedParametersValidator implements ValidatorInterface
{
    /**
     * {@inheritDoc}
     */
    public function validate(Query $query)
    {
        $authorizedParameters = $query->getAuthorizedRequestParameters();
        if (count($authorizedParameters) == 0) {
            return true;
        }

        foreach (array_keys($query->getAllOrderedQueryParameters()) as $param) {
            if (!in_array($param, $authorizedParameters)) {
                throw new RequestParameterException('Unauthorized parameter : '.$param);
            }
        }

        return true;
    }
}
