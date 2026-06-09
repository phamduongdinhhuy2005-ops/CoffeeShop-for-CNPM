<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function pdo(): PDO
    {
        if (self::$pdo === null) {
            $host = env_value('DB_HOST', '127.0.0.1');
            $port = env_value('DB_PORT', '3306');
            $db = env_value('DB_NAME', 'coffeeshop_php');
            $user = env_value('DB_USER', 'root');
            $pass = env_value('DB_PASS', '');
            $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";

            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }

        return self::$pdo;
    }
}
