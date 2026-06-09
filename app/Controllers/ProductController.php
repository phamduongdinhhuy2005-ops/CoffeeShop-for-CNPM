<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Product;

final class ProductController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $products = (new Product())->all();
        $categories = (new Category())->all();
        $this->view('admin/products/index', compact('products', 'categories'), 'layouts/admin');
    }

    public function create(): void
    {
        $this->requireAdmin();
        $categories = (new Category())->all();
        $product = null;
        $this->view('admin/products/form', compact('categories', 'product'), 'layouts/admin');
    }

    public function store(): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Product())->create($_POST);
        flash('success', 'Đã thêm sản phẩm.');
        redirect('/admin/products');
    }

    public function edit(int $id): void
    {
        $this->requireAdmin();
        $product = (new Product())->find($id);
        if (!$product) {
            http_response_code(404);
            exit('Product not found');
        }
        $categories = (new Category())->all();
        $this->view('admin/products/form', compact('categories', 'product'), 'layouts/admin');
    }

    public function update(int $id): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Product())->update($id, $_POST);
        flash('success', 'Đã cập nhật sản phẩm.');
        redirect('/admin/products');
    }

    public function delete(int $id): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Product())->delete($id);
        flash('success', 'Đã xóa sản phẩm.');
        redirect('/admin/products');
    }
}
