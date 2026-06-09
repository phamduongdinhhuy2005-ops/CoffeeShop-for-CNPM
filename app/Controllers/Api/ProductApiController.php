<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\Product;

final class ProductApiController extends Controller
{
    public function index(): void
    {
        $this->json((new Product())->all());
    }

    public function show(int $id): void
    {
        $product = (new Product())->find($id);
        if (!$product) {
            $this->json(['message' => 'Product not found'], 404);
            return;
        }
        $this->json($product);
    }
}
