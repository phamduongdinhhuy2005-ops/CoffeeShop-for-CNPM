<?php

declare(strict_types=1);

namespace App\Models;

final class Order extends Model
{
    public function create(int $userId, array $cart, array $checkout): int
    {
        $this->db->beginTransaction();
        try {
            $total = array_sum(array_map(fn ($i) => $i['price'] * $i['quantity'], $cart));
            $stmt = $this->db->prepare('INSERT INTO orders
                (user_id, total_amount, shipping_address, note, payment_method, status)
                VALUES (?, ?, ?, ?, ?, "Pending")');
            $stmt->execute([
                $userId,
                $total,
                trim((string) ($checkout['shipping_address'] ?? '')),
                trim((string) ($checkout['note'] ?? '')),
                trim((string) ($checkout['payment_method'] ?? 'COD')),
            ]);
            $orderId = (int) $this->db->lastInsertId();

            $detail = $this->db->prepare('INSERT INTO order_details
                (order_id, product_id, quantity, unit_price, item_note)
                VALUES (?, ?, ?, ?, ?)');
            foreach ($cart as $item) {
                $detail->execute([
                    $orderId,
                    $item['id'],
                    $item['quantity'],
                    $item['price'],
                    $item['note'] ?? '',
                ]);
            }
            $this->db->commit();
            return $orderId;
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function forUser(int $userId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function all(): array
    {
        return $this->db->query('SELECT o.*, u.full_name, u.email
            FROM orders o LEFT JOIN users u ON u.id = o.user_id
            ORDER BY o.id DESC')->fetchAll();
    }
}
