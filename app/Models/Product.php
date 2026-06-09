<?php

declare(strict_types=1);

namespace App\Models;

final class Product extends Model
{
    public function all(?int $categoryId = null): array
    {
        $sql = 'SELECT p.*, c.name AS category_name
                FROM products p
                LEFT JOIN categories c ON c.id = p.category_id';
        $params = [];
        if ($categoryId !== null) {
            $sql .= ' WHERE p.category_id = ?';
            $params[] = $categoryId;
        }
        $sql .= ' ORDER BY p.id';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function latest(int $limit = 6): array
    {
        $stmt = $this->db->prepare('SELECT p.*, c.name AS category_name
            FROM products p LEFT JOIN categories c ON c.id = p.category_id
            ORDER BY p.id DESC LIMIT ?');
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT p.*, c.name AS category_name
            FROM products p LEFT JOIN categories c ON c.id = p.category_id
            WHERE p.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO products
            (name, price, description, image_url, category_id, is_on_sale, discount_percent)
            VALUES (:name, :price, :description, :image_url, :category_id, :is_on_sale, :discount_percent)');
        $stmt->execute($this->payload($data));
    }

    public function update(int $id, array $data): void
    {
        $payload = $this->payload($data);
        $payload['id'] = $id;
        $stmt = $this->db->prepare('UPDATE products SET
            name = :name,
            price = :price,
            description = :description,
            image_url = :image_url,
            category_id = :category_id,
            is_on_sale = :is_on_sale,
            discount_percent = :discount_percent
            WHERE id = :id');
        $stmt->execute($payload);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
    }

    private function payload(array $data): array
    {
        return [
            'name' => trim((string) ($data['name'] ?? '')),
            'price' => (float) ($data['price'] ?? 0),
            'description' => trim((string) ($data['description'] ?? '')),
            'image_url' => trim((string) ($data['image_url'] ?? '')),
            'category_id' => (int) ($data['category_id'] ?? 1),
            'is_on_sale' => !empty($data['is_on_sale']) ? 1 : 0,
            'discount_percent' => $data['discount_percent'] !== '' ? (float) ($data['discount_percent'] ?? 0) : null,
        ];
    }
}
