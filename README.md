# JSON

[![Build Status](https://travis-ci.org/otaavioo/json.svg?branch=main)](https://travis-ci.org/otaavioo/json)
[![Coverage Status](https://coveralls.io/repos/github/otaavioo/json/badge.svg?branch=master)](https://coveralls.io/github/otaavioo/json?branch=main)

A light package for json encode/decode functions

## Installing

```sh
composer require otaavioo/json ^2.0
```

### Encode

```php
    // Instantiate the class
    $json = new Json();

    $array = ['key' => 'value'];

    // And then, get encoded json
    echo $json->encode($array);
```

### Decode

```php
    // Instantiate the class
    $json = new Json();

    $string = '{"key":"value"}';

    // And then, get decoded json
    echo $json->decode($string);

    // And if you have a doubly encoded json, like this
    $string = '{\"key\":\"value\"}';

    // The decode method will return the same object as before
    echo $json->decode($string);
```
