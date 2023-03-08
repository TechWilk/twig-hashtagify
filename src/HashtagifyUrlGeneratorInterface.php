<?php

namespace TechWilk\TwigHashtagify;

interface HashtagifyUrlGeneratorInterface
{
    public function urlForHashtag(string $hashtag);
}
