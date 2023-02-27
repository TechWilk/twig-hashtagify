<?php

namespace TechWilk\TwigHashtagify;

use TechWilk\TwigHashtagify\HashtagifyUrlGenerator\BasicHashtagifyUrlGenerator;

class Hashtagify
{
    private $urlGenerator;

    public function __construct(HashtagifyUrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function hashtagify(string $text, ?string $baseUrl = ''): string
    {
        $callback = function ($matches) use ($baseUrl) {
            $url = $this->getUrl($matches[1], $baseUrl);

            return ' <a href="'.htmlentities($url, ENT_QUOTES).'">'.htmlentities('#'.$matches[1], ENT_QUOTES).'</a>';
        };

        return preg_replace_callback(
            '/#(\w+)/',
            $callback,
            $text
        );
    }

    protected function getUrl(string $hashtag, string $baseUrl): string
    {
        $urlGenerator = $this->urlGenerator;

        if ($baseUrl !== '') {
            $urlGenerator = new BasicHashtagifyUrlGenerator($baseUrl);
        }

        return $urlGenerator->urlForHashtag($hashtag);
    }
}
