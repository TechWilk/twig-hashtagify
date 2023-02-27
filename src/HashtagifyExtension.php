<?php

namespace TechWilk\TwigHashtagify;

use TechWilk\TwigHashtagify\Hashtagify;

class HashtagifyExtension extends \Twig\Extension\AbstractExtension
{
    public function getName(): string
    {
        return 'hashtagify';
    }

    public function getFilters()
    {
        return [
            new \Twig\TwigFilter(
                'hashtagify',
                [Hashtagify::class, 'hashtagify'],
                [
                    'pre_escape' => 'html',
                    'is_safe'    => ['html'],
                ]
            ),
        ];
    }
}
