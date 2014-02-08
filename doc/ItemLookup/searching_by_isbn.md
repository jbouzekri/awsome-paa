ItemLookup : Searching by ISBN
==============================

This example uses the ItemLookup operation to find a product using an ISBN (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_LookupbyISBN.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemLookup();
$query->setLocale("EN");
$query->setSearchIndex('All');
$query->setIdType("ISBN");
$query->setItemId("076243631X");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => 'fbf5190a-7b61-4c4a-8621-10e68d0963de',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.0405350000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemLookupRequest' => 
      array (
        'IdType' => 'ISBN',
        'ItemId' => '076243631X',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'All',
        'VariationPage' => 'All',
      ),
    ),
    'Item' => 
    array (
      'ASIN' => '076243631X',
      'DetailPageURL' => 'http://www.amazon.com/The-Mammoth-Book-Tattoos-Hardy/dp/076243631X%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D076243631X',
      'ItemLinks' => 
      array (
        'ItemLink' => 
        array (
          0 => 
          array (
            'Description' => 'Technical Details',
            'URL' => 'http://www.amazon.com/The-Mammoth-Book-Tattoos-Hardy/dp/tech-data/076243631X%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D386001%26creativeASIN%3D076243631X',
          ),
          ...
        ),
      ),
      'ItemAttributes' => 
      array (
        'Author' => 'Lal Hardy',
        'Manufacturer' => 'Running Press',
        'ProductGroup' => 'Book',
        'Title' => 'The Mammoth Book of Tattoos',
      ),
    ),
  ),
)
```
