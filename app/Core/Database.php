<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

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

            try {
                self::$pdo = self::connect($dsn, $user, $pass);
            } catch (PDOException $exception) {
                if ((int) ($exception->errorInfo[1] ?? 0) !== 1049 || env_value('AUTO_SETUP_DB', 'true') !== 'true') {
                    throw $exception;
                }

                self::setupDatabase($host, $port, $db, $user, $pass);
                self::$pdo = self::connect($dsn, $user, $pass);
            }
        }

        return self::$pdo;
    }

    private static function connect(string $dsn, string $user, string $pass): PDO
    {
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    private static function setupDatabase(string $host, string $port, string $db, string $user, string $pass): void
    {
        $schema = BASE_PATH . '/database/schema.sql';
        if (!is_file($schema)) {
            throw new PDOException('Database schema file not found.');
        }

        $serverDsn = "mysql:host={$host};port={$port};charset=utf8mb4";
        $pdo = self::connect($serverDsn, $user, $pass);
        $dbName = '`' . str_replace('`', '``', $db) . '`';
        $sql = (string) file_get_contents($schema);
        $sql = preg_replace('/CREATE DATABASE IF NOT EXISTS\s+coffeeshop_php\b/i', "CREATE DATABASE IF NOT EXISTS {$dbName}", $sql, 1) ?? $sql;
        $sql = preg_replace('/USE\s+coffeeshop_php\s*;/i', "USE {$dbName};", $sql, 1) ?? $sql;

        foreach (array_filter(array_map('trim', explode(';', $sql))) as $statement) {
            $pdo->exec($statement);
        }
    }
}
