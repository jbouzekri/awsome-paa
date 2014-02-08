ItemSearch : Searching by title
===============================

This is an example of a query when searching product by title.
In this example, we search in Music index, products having title with the word "Blue" (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyTitle.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('Music');
$query->setTitle("Blue");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => '0932a2f2-fcf5-4de2-a01c-27dec815ca82',
    'Arguments' => 
    array (
      ...
    ),
    'RequestProcessingTime' => '0.3353860000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'Music',
        'Title' => 'Blue',
      ),
    ),
    'TotalResults' => '59434',
    'TotalPages' => '5944',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DBlue%26url%3Dsearch-alias%253Dpopular&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => 'B008SBY7O8',
        'DetailPageURL' => 'http://www.amazon.fr/Rhythm-And-Blues-Garou/dp/B008SBY7O8%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB008SBY7O8',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3DB008SBY7O8%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3DB008SBY7O8',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Artist' => 'Garou',
          'Creator' => 
          array (
            0 => 'Garou',
            1 => 'Garou',
            2 => 'Jacqueline Nero',
            3 => 'Jan Gerbrand Visser',
            4 => 'Marc Perusse',
            5 => 'Brenda Della Valle',
            6 => 'Eric Appapoulay',
            7 => 'Eva Suissa',
            8 => 'Sanchita Farruque',
            9 => 'Sebastien Demeaux',
          ),
          'Manufacturer' => 'Mercury Records',
          'ProductGroup' => 'Music',
          'Title' => 'Rhythm And Blues',
        ),
      ),
      ...
  ),
)
```
