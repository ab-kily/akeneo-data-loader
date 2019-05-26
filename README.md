# Akeneo Data Loader

[![Build Status](https://travis-ci.org/a-ast/akeneo-data-loader.svg?branch=master)](https://travis-ci.org/a-ast/akeneo-data-loader)

Akeneo Data Loader helps you to load data to your Akeneo PIM Community Edition via its REST API. 

For Enterprise Edition please check the [EE version](https://github.com/a-ast/akeneo-data-loader-ee).

## Use cases

* Load YAML fixtures for testing, local development or performance benchmarking.
* Import from external systems (legacy PIM or regular data providers). 
* Bulk media file import.

### Examples

#### Load form array

```php
$factory = new LoaderFactory();

$apiCredentials = Api\Credentials::create('https://your.akeneo.host/', 'clientId', 'secret', 'username', 'password');

$loader = $factory->createByCredentials($apiCredentials);

$loader->load('product', [
    ['identifier' => 'test-1'],
    ['identifier' => 'test-2'],
]);
```

