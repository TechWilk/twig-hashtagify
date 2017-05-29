<?php
namespace TechWilk\Twig\Extension;

class Hashtagify extends \Twig_Extension
{
  private $urlGenerator;

  public function __construct(HashtagifyUrlGenerator $urlGenerator)
  {
    $this->urlGenerator = $urlGenerator;
  }

  public function hashtagify($text, $baseUrl)
  {
      $text =  preg_replace('/#(\w+)/', ' <a href="'.$this->urlGenerator->urlForHashtag('$1').'">#$1</a>', $text);

      return $text;
  }

  public function getFilters()
  {
    return array(
      new \Twig_SimpleFilter(
          'hashtagify',
          array($this, 'hashtagify')
          //array('is_safe' => array('html'))
      )
    );
  }
}