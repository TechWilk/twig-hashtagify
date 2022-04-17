<?php

namespace TechWilk\TwigHashtagify;

class Hashtagify extends \Twig_Extension
{
    private $urlGenerator;

    public function __construct(HashtagifyUrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function hashtagify($text, $baseUrl = '')
    {
        if ($baseUrl == '') {
            return preg_replace('/#(\w+)/', ' <a href="'.$this->urlGenerator->urlForHashtag('$1').'">#$1</a>', $text);
        }
        
        return preg_replace('/#(\w+)/', ' <a href="'.$baseUrl.'$1">#$1</a>', $text);
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'hashtagify',
                [$this, 'hashtagify'],
                [
                    'pre_escape' => 'html',
                    'is_safe'    => ['html'],
                ]
            ),
        ];
    }
}
