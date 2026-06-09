<?php

declare(strict_types=1);

namespace App\Core;

final class App
{
    private static Router $router;

    public static function setRouter(Router $router): void
    {
        self::$router = $router;
    }

    public static function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        self::$router->dispatch($method, $uri);
    }
}
