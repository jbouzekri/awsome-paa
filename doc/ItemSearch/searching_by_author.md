ItemSearch : Searching by author
=================================

This is an example of a query when searching product by author.
This example uses the ItemSearch operation to find books on Amazon with the Author J.K. Rowling. (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyAuthor.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('Books');
$query->setAuthor("J.K.Rowling");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => '5fae59c7-d1f0-4f37-8ee5-e213834ceacd',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.3982360000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'Author' => 'J.K.Rowling',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'Books',
      ),
    ),
    'TotalResults' => '692',
    'TotalPages' => '70',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DJ.K.Rowling%26url%3Dsearch-alias%253Dbooks-single-index&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => '2070643026',
        'DetailPageURL' => 'http://www.amazon.fr/Harry-Potter-Harry-l%C3%A9cole-sorciers/dp/2070643026%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D2070643026',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3D2070643026%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3D2070643026',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Author' => 'J. K. Rowling',
          'Creator' => 'Jean-François Ménard',
          'Manufacturer' => 'Folio Junior',
          'ProductGroup' => 'Book',
          'Title' => 'Harry Potter, I : Harry Potter à l\'école des sorciers',
        ),
      ),
      ...
    ),
  ),
)
```
