<?php

namespace TechWilk\TwigHashtagify\HashtagifyUrlGenerator;

use TechWilk\TwigHashtagify\HashtagifyUrlGeneratorInterface;

class BasicHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
    private $urlBase;

    public function __construct(string $urlBase)
    {
        $this->urlBase = $urlBase;
    }

    public function urlForHashtag(string $hashtag)
    {
        return $this->urlBase.urlencode($hashtag);
    }
}
