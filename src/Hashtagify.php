<?php

namespace TechWilk\TwigHashtagify;

class Hashtagify extends \Twig\Extension\AbstractExtension
{
    private $urlGenerator;

    public function __construct(HashtagifyUrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function hashtagify(string $text, ?string $baseUrl = ''): string
    {
        $url = $this->getUrl($baseUrl);

        return preg_replace('/#(\w+)/', ' <a href="'.htmlentities($url, ENT_QUOTES).'">#$1</a>', $text);
    }

    protected function getUrl(string $baseUrl): string
    {
        if ($baseUrl !== '') {
            return $baseUrl.'$1';
        }

        return $this->urlGenerator->urlForHashtag('$1');
    }

    public function getFilters()
    {
        return [
            new \Twig\TwigFilter(
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
