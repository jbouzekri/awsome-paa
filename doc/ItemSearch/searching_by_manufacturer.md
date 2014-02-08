ItemSearch : Searching by manufacturer
======================================

This is an example of a query when searching product by manufacturer.
This example uses the ItemSearch operation to find electronics on Amazon with the Manufacturer Sony. To search the Electronics category, we use the Electronics search index. (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyManufacturer.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('Electronics');
$query->setManufacturer("Sony");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => '880b2d95-ffc4-46a2-a536-5900aefd26f4',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.2124020000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'Manufacturer' => 'Sony',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'Electronics',
      ),
    ),
    'TotalResults' => '31386',
    'TotalPages' => '3139',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DSony%26url%3Dsearch-alias%253Delectronics&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => 'B004MMG38K',
        'ParentASIN' => 'B004MYF1XQ',
        'DetailPageURL' => 'http://www.amazon.fr/Sony-MDR-ZX100B-AE-Casque-pour-lecteur/dp/B004MMG38K%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB004MMG38K',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3DB004MMG38K%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3DB004MMG38K',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Manufacturer' => 'Sony',
          'ProductGroup' => 'CE',
          'Title' => 'Sony MDR-ZX100B.AE Casque pour lecteur mp3/mp4 Noir',
        ),
      ),
      ...
    ),
  ),
)
```
