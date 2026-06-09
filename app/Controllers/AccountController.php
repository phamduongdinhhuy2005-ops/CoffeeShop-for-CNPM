<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;

final class AccountController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $orders = (new Order())->forUser((int) current_user()['id']);
        $this->view('account/index', compact('orders'));
    }
}
