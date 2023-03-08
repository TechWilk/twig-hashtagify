<?php

declare(strict_types=1);

namespace TechWilk\TwigHashtagify;

use Twig\RuntimeLoader\RuntimeLoaderInterface;

class HashtagifyRuntimeLoader implements RuntimeLoaderInterface
{
    protected HashtagifyUrlGeneratorInterface $urlGenerator;

    public function __construct(HashtagifyUrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function load(string $class)
    {
        if (Hashtagify::class === $class) {
            return new $class($this->urlGenerator);
        }

        return null;
    }
}
