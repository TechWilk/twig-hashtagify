<?php
namespace TechWilk\Twig\Extension;

class HashtagifyUrlGenerator
{
  private $urlBase;

  public function __construct($urlBase)
  {
    $this->urlBase = $urlBase;
  }

  public function generate($hashtag)
  {
    return $this->urlBase . $hashtag;
  }
}