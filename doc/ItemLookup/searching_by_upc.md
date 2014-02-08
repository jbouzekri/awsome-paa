ItemLookup : Searching by UPC
=============================

This is an example of a query when looking up a product by UPC (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_LookupbyUPC.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemLookup();
$query->setLocale("EN");
$query->setSearchIndex('All');
$query->setIdType("UPC");
$query->setItemId("635753490879");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => '27656362-9536-4e7d-a2da-97a0ea1a9bfa',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.0643190000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemLookupRequest' => 
      array (
        'IdType' => 'UPC',
        'ItemId' => '635753490879',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'All',
        'VariationPage' => 'All',
      ),
    ),
    'Item' => 
    array (
      'ASIN' => 'B004U9USEA',
      'DetailPageURL' => 'http://www.amazon.com/Samsung-Galaxy-7-inch-16GB-Wi-Fi/dp/B004U9USEA%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB004U9USEA',
      'ItemLinks' => 
      array (
        'ItemLink' => 
        array (
          0 => 
          array (
            'Description' => 'Technical Details',
            'URL' => 'http://www.amazon.com/Samsung-Galaxy-7-inch-16GB-Wi-Fi/dp/tech-data/B004U9USEA%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D386001%26creativeASIN%3DB004U9USEA',
          ),
          ...
        ),
      ),
      'ItemAttributes' => 
      array (
        'Manufacturer' => 'Samsung IT',
        'ProductGroup' => 'Personal Computer',
        'Title' => 'Samsung Galaxy Tab (7-inch, 16GB, Wi-Fi)',
      ),
    ),
  ),
)
```
