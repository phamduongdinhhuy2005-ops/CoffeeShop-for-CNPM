<?php

declare(strict_types=1);

namespace App\Models;

final class User extends Model
{
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([mb_strtolower($email)]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $fullName, string $email, string $password): void
    {
        $stmt = $this->db->prepare('INSERT INTO users (full_name, email, password_hash, role)
            VALUES (?, ?, ?, "user")');
        $stmt->execute([
            trim($fullName),
            mb_strtolower(trim($email)),
            password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    public function all(): array
    {
        return $this->db->query('SELECT id, full_name, email, role, created_at FROM users ORDER BY id')->fetchAll();
    }
}
