<?php

declare(strict_types=1);

namespace TechWilk\TwigHashtagify\Slim;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RuntimeException;
use Slim\App;
use Slim\Interfaces\RouteParserInterface;
use Slim\Views\Twig;
use TechWilk\TwigHashtagify\HashtagifyRuntimeLoader;
use TechWilk\TwigHashtagify\HashtagifyUrlGenerator\SlimHashtagifyUrlGenerator;

class HashtagifyMiddleware implements MiddlewareInterface
{
    protected Twig $twig;

    protected RouteParserInterface $routeParser;

    protected string $routeName;

    protected string $argumentName;

    public static function createFromContainer(App $app, string $routeName, string $argumentName, string $containerKey = 'view'): self
    {
        $container = $app->getContainer();
        if ($container === null) {
            throw new RuntimeException('The app does not have a container.');
        }
        if (!$container->has($containerKey)) {
            throw new RuntimeException(
                "The specified container key does not exist: $containerKey"
            );
        }

        $twig = $container->get($containerKey);
        if (!($twig instanceof Twig)) {
            throw new RuntimeException(
                "Twig instance could not be resolved via container key: $containerKey"
            );
        }

        return new self(
            $twig,
            $app->getRouteCollector()->getRouteParser(),
            $routeName,
            $argumentName,
        );
    }

    public static function create(App $app, Twig $twig, string $routeName, string $argumentName): self
    {
        return new self(
            $twig,
            $app->getRouteCollector()->getRouteParser(),
            $routeName,
            $argumentName,
        );
    }

    public function __construct(
        Twig $twig,
        RouteParserInterface $routeParser,
        string $routeName,
        string $argumentName,
    ) {
        $this->twig = $twig;
        $this->routeParser = $routeParser;
        $this->routeName = $routeName;
        $this->argumentName = $argumentName;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $urlGenerator = new SlimHashtagifyUrlGenerator($this->routeParser, $this->routeName, $this->argumentName);
        $runtimeLoader = new HashtagifyRuntimeLoader($urlGenerator);
        $this->twig->addRuntimeLoader($runtimeLoader);

        return $handler->handle($request);
    }
}
