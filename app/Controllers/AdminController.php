<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

final class AdminController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $products = (new Product())->all();
        $orders = (new Order())->all();
        $users = (new User())->all();
        $this->view('admin/dashboard', compact('products', 'orders', 'users'), 'layouts/admin');
    }

    public function orders(): void
    {
        $this->requireAdmin();
        $orders = (new Order())->all();
        $this->view('admin/orders', compact('orders'), 'layouts/admin');
    }
}
