<?php
namespace TechWilk\Twig\Extension;

class HashtagifyUrlInterface
{
  private $urlBase;

  public function __construct($urlBase)
  {
    $this->urlBase = $urlBase;
  }

  public function urlForHashtag($hashtag)
  {
    return $this->urlBase . $hashtag;
  }
}