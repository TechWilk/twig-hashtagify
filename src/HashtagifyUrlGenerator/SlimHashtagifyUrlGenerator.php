<?php

namespace TechWilk\TwigHashtagify\HashtagifyUrlGenerator;

use Slim\Interfaces\RouteParserInterface;
use TechWilk\TwigHashtagify\HashtagifyUrlGeneratorInterface;

class SlimHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
    private $routeParser;
    private $routeName;
    private $argumentName;

    public function __construct(RouteParserInterface $routeParser, string $routeName, string $argumentName)
    {
        $this->routeParser = $routeParser;
        $this->routeName = $routeName;
        $this->argumentName = $argumentName;
    }

    public function urlForHashtag($hashtag)
    {
        return $this->routeParser->urlFor($this->routeName, [$this->argumentName => $hashtag]);
    }
}
