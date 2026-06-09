<?php

use App\Controllers\AccountController;
use App\Controllers\AdminController;
use App\Controllers\Api\ProductApiController;
use App\Controllers\AuthController;
use App\Controllers\CartController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\ProductController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/privacy', [HomeController::class, 'privacy']);
$router->get('/menu', [MenuController::class, 'index']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);
$router->post('/logout', [AuthController::class, 'logout']);
$router->get('/account', [AccountController::class, 'index']);

$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add/{id}', [CartController::class, 'add']);
$router->post('/cart/remove/{id}', [CartController::class, 'remove']);
$router->get('/checkout', [CartController::class, 'checkout']);
$router->post('/checkout', [CartController::class, 'placeOrder']);
$router->get('/cart/count', [CartController::class, 'count']);

$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/orders', [AdminController::class, 'orders']);
$router->get('/admin/products', [ProductController::class, 'index']);
$router->get('/admin/products/create', [ProductController::class, 'create']);
$router->post('/admin/products', [ProductController::class, 'store']);
$router->get('/admin/products/{id}/edit', [ProductController::class, 'edit']);
$router->post('/admin/products/{id}/update', [ProductController::class, 'update']);
$router->post('/admin/products/{id}/delete', [ProductController::class, 'delete']);
$router->get('/admin/categories', [CategoryController::class, 'index']);
$router->post('/admin/categories', [CategoryController::class, 'store']);
$router->post('/admin/categories/{id}/update', [CategoryController::class, 'update']);
$router->post('/admin/categories/{id}/delete', [CategoryController::class, 'delete']);

$router->get('/api/products', [ProductApiController::class, 'index']);
$router->get('/api/products/{id}', [ProductApiController::class, 'show']);
