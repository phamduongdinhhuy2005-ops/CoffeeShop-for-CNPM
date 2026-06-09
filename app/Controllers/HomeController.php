<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

final class HomeController extends Controller
{
    public function index(): void
    {
        $products = (new Product())->latest(6);
        $this->view('home/index', compact('products'));
    }

    public function privacy(): void
    {
        $this->view('home/privacy');
    }
}
