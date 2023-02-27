<?php

namespace TechWilk\TwigHashtagify\Tests;

use TechWilk\TwigHashtagify\HashtagifyExtension;
use TechWilk\TwigHashtagify\HashtagifyRuntimeLoader;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{

    public function getRuntimeLoaders()
    {
        $urlGenerator = new \TechWilk\TwigHashtagify\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator('http://example.com/hashtag/');

        return [
            new HashtagifyRuntimeLoader($urlGenerator),
        ];
    }

    public function getExtensions()
    {
        return [
            new HashtagifyExtension(),
        ];
    }

    public function getFixturesDir()
    {
        return __DIR__.'/fixtures/';
    }
}
