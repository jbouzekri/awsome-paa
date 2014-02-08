AWSome PAA PHP
==============

Introduction
------------

This is an implementation of a client for the **Amazon Product Advertising API** in PHP. 
This API provides tools for querying the amazon product database and even manage cart via webservices.
 
The official documentation of this service is available on [docs.aws.amazon.fr](http://docs.aws.amazon.com/AWSECommerceService/2011-08-01/DG/Welcome.html).

Requirements
------------

In order to use this client, you will need to become a Product Advertising API Developer. 
You can follow the instruction provided on [docs.aws.amazon.fr](http://docs.aws.amazon.com/AWSECommerceService/2011-08-01/DG/becomingDev.html)

After signing up, you will receive an access key and secret which will be used by this API to append a signature to your query.

Optionnaly, you can even become an associate. It provides opportunities to earn money thanks to the traffic you send to amazon 
via the links generated in the service response.

Installation
------------

You can use composer for installation.

Add the repository to the composer.json file of your project and run the update or install command.

``` json
{
    "require": {
        "awsome/paa": "0.1.*"
    }
}
```

Examples
--------

* ItemSearch Queries : find products on Amazon
    * [Searching by Keyword](doc/ItemSearch/searching_by_keyword.md)
    * [Searching by Title](doc/ItemSearch/searching_by_title.md)
    * [Searching by Manufacturer](doc/ItemSearch/searching_by_manufacturer.md)
    * [Searching by Author](doc/ItemSearch/searching_by_author.md)
    * [Searching by Actor](doc/ItemSearch/searching_by_actor.md)
    * [Searching by Theme](doc/ItemSearch/searching_by_theme.md)

Roadmap
-------

For now, only ItemSearch queries and array hydratation for results have been implemented. 
I am going to add the query one by one and after that I will add an object hydratation mode.
Do not hesitate to contribute to this project.