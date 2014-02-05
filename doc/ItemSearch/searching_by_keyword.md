ItemSearch : Searching by keyword
=================================

This is an example of a query when searching product by keywords.

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('All');
$query->addQueryParameter('Keywords', "harry_potter");
$result = $client->execute($query);
```

And the response :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => 'e5b2af90-8119-403f-97d6-058f85de9daa',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.1774130000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'Keywords' => 'harry_potter',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'All',
      ),
    ),
    'TotalResults' => '17733',
    'TotalPages' => '1774',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3Dharry_potter%26url%3Dsearch-alias%253Daws-amazon-aps&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => 'B005JRHBG0',
        'DetailPageURL' => 'http://www.amazon.fr/Int%C3%A9grale-Harry-Potter-8-DVD/dp/B005JRHBG0%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB005JRHBG0',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3DB005JRHBG0%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3DB005JRHBG0',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Actor' => 
          array (
            0 => 'Daniel Radcliffe',
            1 => 'Emma Watson',
            2 => 'Hupper Grint',
          ),
          'Creator' => 
          array (
            0 => 'Daniel Radcliffe',
            1 => 'Emma Watson',
          ),
          'Director' => 'David Yates',
          'Manufacturer' => 'Warner Home Video',
          'ProductGroup' => 'DVD',
          'Title' => 'Intégrale Harry Potter 8 DVD',
        ),
      ),
      1 => 
      array (
        ...
      ),
      ...
    ),
  ),
)
```
