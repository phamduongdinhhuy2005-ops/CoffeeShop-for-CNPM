<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Category;

final class CategoryController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $categories = (new Category())->all();
        $this->view('admin/categories/index', compact('categories'), 'layouts/admin');
    }

    public function store(): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Category())->create(trim((string) ($_POST['name'] ?? '')));
        redirect('/admin/categories');
    }

    public function update(int $id): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Category())->update($id, trim((string) ($_POST['name'] ?? '')));
        redirect('/admin/categories');
    }

    public function delete(int $id): void
    {
        $this->requireAdmin();
        verify_csrf();
        (new Category())->delete($id);
        redirect('/admin/categories');
    }
}
