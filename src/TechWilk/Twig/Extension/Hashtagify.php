<?php
namespace TechWilk\Twig\Extension;

class Hashtagify extends \Twig_Extension
{
  private $urlGenerator;

  public function __construct(HashtagifyUrlGeneratorInterface $urlGenerator)
  {
    $this->urlGenerator = $urlGenerator;
  }

  public function hashtagify($text, $baseUrl = '')
  {
    $text = strip_tags($text);
    if ($baseUrl == '')
    {
      return preg_replace('/#(\w+)/', ' <a href="'.$this->urlGenerator->urlForHashtag('$1').'">#$1</a>', $text);
    }
    else
    {
      return preg_replace('/#(\w+)/', ' <a href="'.$baseUrl.'$1">#$1</a>', $text);
    }
  }

  public function getFilters()
  {
    return array(
      new \Twig_SimpleFilter(
          'hashtagify',
          [ $this, 'hashtagify' ],
          [ 'is_safe' => ['html'] ]
      )
    );
  }
}