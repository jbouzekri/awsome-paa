ItemSearch : Searching by theme
===============================

This is an example of a query when searching product by theme. Amazon use keywords for theme.
This example uses the ItemSearch operation to find products related to the theme Travel. (cf [amazon example](http://docs.aws.amazon.com/AWSECommerceService/latest/DG/EX_SearchingbyTheme.html))

```php
$client = new \AWSome\PAA\Client(<awsAccessKeyId>, <awsSecretAccessKey>);
$query = $client->itemSearch();
$query->setSearchIndex('All');
$query->setKeywords("Travel");
$result = $client->execute($query);
```

And the result :

```php
array (
  'OperationRequest' => 
  array (
    'RequestId' => 'f531f0c6-24af-4d77-bc73-aee5281fd229',
    'Arguments' => 
    array (
      'Argument' => 
      array (
        ...
      ),
    ),
    'RequestProcessingTime' => '0.8821100000000000',
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
        'SearchIndex' => 'All',
      ),
    ),
    'TotalResults' => '629224',
    'TotalPages' => '62923',
    'MoreSearchResultsUrl' => 'http://www.amazon.fr/gp/redirect.html?camp=2025&creative=12742&location=http%3A%2F%2Fwww.amazon.fr%2Fgp%2Fsearch%3Fkeywords%3DTravel%26url%3Dsearch-alias%253Daws-amazon-aps&linkCode=xm2&tag=Amazon&SubscriptionId=<awsAccessKeyId>',
    'Item' => 
    array (
      0 => 
      array (
        'ASIN' => 'B00I1KX4HM',
        'DetailPageURL' => 'http://www.amazon.fr/Astral-Travel-Understanding-Projection-Techniques-ebook/dp/B00I1KX4HM%3FSubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3DB00I1KX4HM',
        'ItemLinks' => 
        array (
          'ItemLink' => 
          array (
            0 => 
            array (
              'Description' => 'Add To Wishlist',
              'URL' => 'http://www.amazon.fr/gp/registry/wishlist/add-item.html%3Fasin.0%3DB00I1KX4HM%26SubscriptionId%3D<awsAccessKeyId>%26tag%3DAmazon%26linkCode%3Dxm2%26camp%3D2025%26creative%3D12742%26creativeASIN%3DB00I1KX4HM',
            ),
            ...
          ),
        ),
        'ItemAttributes' => 
        array (
          'Author' => 'Bowe Packer',
          'Manufacturer' => 'Sunshine In My Soul',
          'ProductGroup' => 'eBooks',
          'Title' => 'Astral Travel: Your Guide To Understanding Astral Projection & The Effective & Safe Astral Travel Techniques',
        ),
      ),
      ...
    ),
  ),
)
```
