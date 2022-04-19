<?php

namespace TechWilk\TwigHashtagify\HashtagifyUrlGenerator;

use TechWilk\TwigHashtagify\HashtagifyUrlGeneratorInterface;

class BasicHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
    private $urlBase;

    public function __construct($urlBase)
    {
        $this->urlBase = $urlBase;
    }

    public function urlForHashtag($hashtag)
    {
        return $this->urlBase.$hashtag;
    }
}
