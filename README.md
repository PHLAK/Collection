Collection
==========

[![Latest Stable Version](https://img.shields.io/packagist/v/PHLAK/Collection.svg)](https://packagist.org/packages/PHLAK/Collection)
[![Total Downloads](https://img.shields.io/packagist/dt/PHLAK/Collection.svg)](https://packagist.org/packages/PHLAK/Collection)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/PHLAK/Collection.svg)](https://packagist.org/packages/PHLAK/Collection)
[![Build Status](https://img.shields.io/travis/PHLAK/Collection.svg)](https://travis-ci.org/PHLAK/Collection)
[![StyleCI](https://styleci.io/repos/91770327/shield?branch=master&style=flat)](https://styleci.io/repos/91770327)

Lightweight collection library -- by, [Chris Kankiewicz](https://www.ChrisKankiewicz.com)

Introduction
------------

...

Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phlak/collection
```

Initializing the Client
-----------------------

First, import Collection:

```php
use Collection/Collection;
```

Then pass an array of items to the `Collection` class or the static `make` method:

```php
$collection = new Collection(['foo', 'bar', 'baz']);

// or

$collection = Collection::make(['foo', 'bar', 'baz']);
```

Usage
-----

Iterate over each item in a collection and perform an action via a Closure:

```php
$collection->each(Closure $function);
```

Map each item of the collection to a new value via a Closure:

```php
$collection->map(Closure $function);
```

Filter the items in a collection by returning only the items where the Closure
returns true:

```php
$collection->filter(Closure $function);
```

Filter the items in a collection by returning only the items where the Closure
returns `false` (opposite of the `filter` method):

```php
$collection->reject(Closure $function);
```

Reduce a collection down to a single item by iterating over the Closure until a
single item remains:

```php
$collection->reduce(Closure $function, $initial);
```

Sum all the items in a collection and return the value:

```php
$collection->sum(Closure $function, $initial);
```

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/Collection/releases) page.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Collection/issues).

Copyright
---------

This project is liscensed under the [MIT License](https://github.com/PHLAK/Collection/blob/master/LICENSE).
