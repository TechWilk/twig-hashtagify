<?php

namespace TechWilk\Twig\Extension\HashtagifyUrlGenerator;

use TechWilk\Twig\Extension\HashtagifyUrlGeneratorInterface;

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
