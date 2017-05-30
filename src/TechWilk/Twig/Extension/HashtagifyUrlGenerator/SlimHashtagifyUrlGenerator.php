<?php
namespace TechWilk\Twig\Extension\HashtagifyUrlGenerator;

use TechWilk\Twig\Extension\HashtagifyUrlGeneratorInterface;

class SlimHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
  private $router;
  private $routeName;
  private $identifier;

  public function __construct(\Slim\Router $router, $routeName, $identifier)
  {
    $this->router = $router;
    $this->routeName = $routeName;
    $this->identifier = $identifier;
  }

  public function urlForHashtag($hashtag)
  {
    return $this->router->pathFor($this->routeName, [ $this->identifier => $hashtag ] );
  }
}