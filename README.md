# Hashtagify (filter for TWIG)

TWIG filter to turn hashtags into html links. Provides interfaces to work with a Slim Framework Router, or a base URL.

## Installation

1. Install through composer.

```
composer require techwilk/twig-hashtagify
```

2. Then configure base url using one of the interfaces provided, or write your own:

### Basic Interface:

``` php
$urlGenerator = new \TechWilk\Twig\Extension\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator('http://example.com/hashtag/');
$twig->addExtension(new \TechWilk\Twig\Extension\Hashtagify($urlGenerator));
```

### Slim Router Interface:

``` php
$urlGenerator = new \TechWilk\Twig\Extension\HashtagifyUrlGenerator\SlimHashtagifyUrlGenerator($router, 'route-name', 'argument-name');
$twig->addExtension(new \TechWilk\Twig\Extension\Hashtagify($urlGenerator));
```

## Use

Use as a standard twig filter:

``` twig
{{ 'this text with #hashtags' | hashtagify }}
```

## Example

Turns this:

`This is some text with #hashtags in it`

Into this:

`This is some text with <a href="http://example.com/hashtag/hashtags">#hashtags</a> in it`

