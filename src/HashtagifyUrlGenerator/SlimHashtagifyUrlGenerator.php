<?php

namespace TechWilk\TwigHashtagify\HashtagifyUrlGenerator;

use TechWilk\TwigHashtagify\HashtagifyUrlGeneratorInterface;

class SlimHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
    private $router;
    private $routeName;
    private $argumentName;

    public function __construct(\Slim\Router $router, $routeName, $argumentName)
    {
        $this->router = $router;
        $this->routeName = $routeName;
        $this->argumentName = $argumentName;
    }

    public function urlForHashtag($hashtag)
    {
        return $this->router->pathFor($this->routeName, [$this->argumentName => $hashtag]);
    }
}
