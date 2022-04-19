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
$urlGenerator = new \TechWilk\TwigHashtagify\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator('http://example.com/hashtag/');
$twig->addExtension(new \TechWilk\TwigHashtagify\Hashtagify($urlGenerator));
```

### Slim Router Interface:

``` php
$urlGenerator = new \TechWilk\TwigHashtagify\HashtagifyUrlGenerator\SlimHashtagifyUrlGenerator($router, 'route-name', 'argument-name');
$twig->addExtension(new \TechWilk\TwigHashtagify\Hashtagify($urlGenerator));
```

## Use

Use as a standard twig filter:

``` twig
{{ 'this text with #hashtags' | hashtagify }}
```

## Example

Turns this:

```
This is some text with #hashtags in it
```

Into this:

```
This is some text with <a href="http://example.com/hashtag/hashtags">#hashtags</a> in it
```

