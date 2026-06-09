<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;
use App\Models\Product;

final class CartController extends Controller
{
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        $this->view('cart/index', compact('cart'));
    }

    public function add(int $id): void
    {
        verify_csrf();
        $product = (new Product())->find($id);
        if (!$product) {
            redirect('/menu');
        }
        $_SESSION['cart'][$id] ??= [
            'id' => (int) $product['id'],
            'name' => $product['name'],
            'price' => (float) $product['price'],
            'image_url' => $product['image_url'],
            'quantity' => 0,
        ];
        $_SESSION['cart'][$id]['quantity']++;
        flash('success', 'Đã thêm vào giỏ hàng.');
        redirect('/menu');
    }

    public function remove(int $id): void
    {
        verify_csrf();
        unset($_SESSION['cart'][$id]);
        redirect('/cart');
    }

    public function checkout(): void
    {
        $this->requireAuth();
        $cart = $_SESSION['cart'] ?? [];
        $this->view('cart/checkout', compact('cart'));
    }

    public function placeOrder(): void
    {
        $this->requireAuth();
        verify_csrf();
        $cart = $_SESSION['cart'] ?? [];
        if (!$cart) {
            redirect('/cart');
        }
        $orderId = (new Order())->create((int) current_user()['id'], $cart, $_POST);
        unset($_SESSION['cart']);
        flash('success', 'Đặt hàng thành công. Mã đơn #' . $orderId);
        redirect('/account');
    }

    public function count(): void
    {
        $count = array_sum(array_column($_SESSION['cart'] ?? [], 'quantity'));
        $this->json(['count' => $count]);
    }
}
