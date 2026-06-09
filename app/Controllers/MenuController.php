<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Product;

final class MenuController extends Controller
{
    public function index(): void
    {
        $categoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : null;
        $productModel = new Product();
        $products = $productModel->all($categoryId ?: null);
        $allProducts = $productModel->all();
        $categories = (new Category())->all();
        $this->view('menu/index', compact('products', 'allProducts', 'categories', 'categoryId'));
    }
}
