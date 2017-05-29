<?php
namespace TechWilk\Twig\Extension\HashtagifyUrlGenerator;

use TechWilk\Twig\Extension\HashtagifyUrlGeneratorInterface;

class SlimHashtagifyUrlGenerator implements HashtagifyUrlGeneratorInterface
{
  private $router;

  public function __construct(\Slim\App\Router $router)
  {
    $this->router = $router;
  }

  public function urlForHashtag($hashtag)
  {
    return $this->router->pathFor('tag', [ 'tag' => $hashtag ] );
  }
}