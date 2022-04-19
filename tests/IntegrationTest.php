<?php

namespace TechWilk\TwigHashtagify\Tests;

use TechWilk\TwigHashtagify\Hashtagify;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{
    public function getExtensions()
    {
        $urlGenerator = new \TechWilk\TwigHashtagify\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator('http://example.com/hashtag/');

        return [
            new Hashtagify($urlGenerator),
        ];
    }

    public function getFixturesDir()
    {
        return __DIR__.'/fixtures/';
    }
}
