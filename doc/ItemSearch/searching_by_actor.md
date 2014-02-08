ItemSearch : Searching by actor
=================================

This is an example of a query when searching product by actor.
This example uses the ItemSearch operation to find DVDs on Amazon with the Actor Tom Hanks. (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyActor.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('DVD');
$query->setActor("Tom Hanks");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => 'bdc01796-87cf-4e9d-8ffc-01b882522eb5',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.1974520000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'Actor' => 'Tom Hanks',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'DVD',
      ),
    ),
    'TotalResults' => '1021',
    'TotalPages' => '103',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DTom%2BHanks%26url%3Dsearch-alias%253Ddvd&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => 'B005DL266C',
        'DetailPageURL' => 'http://www.amazon.fr/Band-Brothers-The-Pacific-Blu-ray/dp/B005DL266C%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB005DL266C',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3DB005DL266C%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3DB005DL266C',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Actor' => 
          array (
            0 => 'Joseph Mazzello',
            1 => 'Tom Hanks',
            2 => 'James Badge Dale',
            3 => 'Jon Seda',
            4 => 'Ben Chisholm',
          ),
          'Creator' => 
          array (
            0 => 'Joseph Mazzello',
            1 => 'Tom Hanks',
          ),
          'Director' => 
          array (
            0 => 'Tom Hanks',
            1 => 'Phil Alden Robinson',
            2 => 'Richard Loncraine',
            3 => 'Mikael Salomon',
            4 => 'David Nutter',
          ),
          'Manufacturer' => 'Warner Bros.',
          'ProductGroup' => 'DVD',
          'Title' => 'Band of Brothers + The Pacific [Blu-ray]',
        ),
      ),
      ...
    ),
  ),
)
```
