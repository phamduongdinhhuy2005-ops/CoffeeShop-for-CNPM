<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $file = BASE_PATH . '/app/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

if (session_status() === PHP_SESSION_NONE) {
    session_name('coffeeshop_session');
    session_start();
}

function env_value(string $key, mixed $default = null): mixed
{
    static $env = null;
    if ($env === null) {
        $env = [];
        $file = BASE_PATH . '/.env';
        if (!is_file($file)) {
            $file = BASE_PATH . '/.env.example';
        }
        foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
                continue;
            }
            [$name, $value] = explode('=', $line, 2);
            $env[trim($name)] = trim(trim($value), "\"'");
        }
    }

    return $env[$key] ?? $default;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function base_url(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $base = preg_replace('#/public/index\.php$#', '', $scriptName) ?? '';
    $base = preg_replace('#/index\.php$#', '', $base) ?? '';

    return rtrim($base, '/');
}

function url(string $path = ''): string
{
    $base = base_url();
    $path = '/' . ltrim($path, '/');

    return ($base === '' ? '' : $base) . $path;
}

function asset(string $path): string
{
    return url('/' . ltrim($path, '/'));
}

function media_url(?string $path, string $fallback = 'assets/images/menu-hero.jpg'): string
{
    $path = trim((string) $path);
    if ($path === '') {
        return asset($fallback);
    }
    if (preg_match('#^(https?:)?//#', $path) === 1 || str_starts_with($path, 'data:')) {
        return $path;
    }

    return asset($path);
}

function redirect(string $path): never
{
    header('Location: ' . url($path));
    exit;
}

function csrf_token(): string
{
    if (empty($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['_csrf'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): void
{
    $token = $_POST['_csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['_csrf'] ?? '', $token)) {
        http_response_code(419);
        exit('CSRF token mismatch.');
    }
}

function flash(string $key, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['_flash'][$key] = $message;
        return null;
    }
    $value = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);
    return $value;
}

function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_admin(): bool
{
    return (current_user()['role'] ?? '') === 'admin';
}
