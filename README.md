# Hashtagify (filter for TWIG)

[![Total Downloads](https://img.shields.io/packagist/dt/techwilk/twig-hashtagify.svg)](https://packagist.org/packages/techwilk/twig-hashtagify)
[![Latest Stable Version](https://img.shields.io/packagist/v/techwilk/twig-hashtagify.svg)](https://packagist.org/packages/techwilk/twig-hashtagify)
[![License](https://img.shields.io/packagist/l/techwilk/twig-hashtagify.svg)](https://packagist.org/packages/techwilk/twig-hashtagify)

TWIG filter to turn hashtags into html links. Provides interfaces to work with a Slim Framework Router, or a base URL.

## Installation

1. Install through composer.

```
composer require techwilk/twig-hashtagify
```

2. Then configure base url using one of the interfaces provided, or write your own:

### Basic Interface:

``` php
use TechWilk\TwigHashtagify\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator;
use TechWilk\TwigHashtagify\HashtagifyExtension;
use TechWilk\TwigHashtagify\HashtagifyRuntimeLoader;

$urlGenerator = new BasicHashtagifyUrlGenerator('https://example.com/hashtag/');
$twig->addExtension(new HashtagifyExtension());
$twig->addRuntimeLoader(new HashtagifyRuntimeLoader($urlGenerator));
```

### Slim Router Interface:

Add the following extension as a twig dependency

```php
use TechWilk\TwigHashtagify\HashtagifyExtension;

$twig->addExtension(new HashtagifyExtension());
```

Add the following middleware after your `TwigMiddleware` to setup our dependencies

``` php
use TechWilk\TwigHashtagify\HashtagifyMiddleware;

$app->add(HashtagifyMiddleware::createFromContainer($app, 'route-name', 'argument-name'));
```

## Use

Use as a standard twig filter:

``` twig
{{ 'this text with #hashtags' | hashtagify }}
```

## Example

Turns this:

``` html
This is some text with #hashtags in it
```

Into this:

``` html
This is some text with <a href="http://example.com/hashtag/hashtags">#hashtags</a> in it
```
