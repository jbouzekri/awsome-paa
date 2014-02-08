ItemSearch : Searching by theme in a specific category
======================================================

This is an example of a query when searching product by theme. Amazon use keywords for theme. Searching in a specific category is done by providing a specific Search Index.
This example uses the ItemSearch operation to find products related to the theme Travel in the Books search index. (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyTheme.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('Books');
$query->setKeywords("Travel");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => '44126021-f47e-4991-8ea2-0177fc765784',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.4980420000000000',
  ),
  'Items' => 
  array (
    'Request' => 
    array (
      'IsValid' => 'True',
      'ItemSearchRequest' => 
      array (
        'Keywords' => 'Travel',
        'ResponseGroup' => 'Small',
        'SearchIndex' => 'Books',
      ),
    ),
    'TotalResults' => '49643',
    'TotalPages' => '4965',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DTravel%26url%3Dsearch-alias%253Dbooks-single-index&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => '3832791981',
        'DetailPageURL' => 'http://www.amazon.fr/Travel-Andreas-H-Bitesnich/dp/3832791981%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D3832791981',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3D3832791981%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3D3832791981',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Creator' => 'Andreas H. Bitesnich',
          'Manufacturer' => 'teNeues Verlag GmbH + Co KG',
          'ProductGroup' => 'Book',
          'Title' => 'Travel',
        ),
      ),
      ...
    ),
  ),
)
```
