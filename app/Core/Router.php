<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    /** @var array<string, array<string, array{0: class-string, 1: string}>> */
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, array $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    private function add(string $method, string $path, array $handler): void
    {
        $this->routes[$method][$this->normalize($path)] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = $this->normalize($this->withoutBasePath($uri));
        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null && $path !== '/') {
            foreach ($this->routes[$method] ?? [] as $route => $candidate) {
                $pattern = preg_replace('#\{[a-zA-Z_][a-zA-Z0-9_]*\}#', '([0-9]+)', $route);
                if ($pattern !== null && preg_match('#^' . $pattern . '$#', $path, $matches)) {
                    array_shift($matches);
                    $handler = $candidate;
                    break;
                }
            }
        }

        if ($handler === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$class, $action] = $handler;
        $controller = new $class();
        $controller->{$action}(...($matches ?? []));
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '//' ? '/' : $path;
    }

    private function withoutBasePath(string $uri): string
    {
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $base = preg_replace('#/public/index\.php$#', '', $scriptName) ?? '';
        $base = preg_replace('#/index\.php$#', '', $base) ?? '';
        $base = rtrim($base, '/');

        if ($base !== '' && str_starts_with($uri, $base)) {
            return substr($uri, strlen($base)) ?: '/';
        }

        return $uri;
    }
}
