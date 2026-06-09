<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

final class AuthController extends Controller
{
    public function login(): void
    {
        $this->view('auth/login');
    }

    public function authenticate(): void
    {
        verify_csrf();
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $user = (new User())->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            flash('error', 'Email hoặc mật khẩu không đúng.');
            redirect('/login');
        }

        $_SESSION['user'] = [
            'id' => (int) $user['id'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'role' => $user['role'],
        ];
        redirect($user['role'] === 'admin' ? '/admin' : '/account');
    }

    public function register(): void
    {
        $this->view('auth/register');
    }

    public function store(): void
    {
        verify_csrf();
        $fullName = trim((string) ($_POST['full_name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $confirm = (string) ($_POST['confirm_password'] ?? '');

        if ($fullName === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6 || $password !== $confirm) {
            flash('error', 'Vui lòng nhập đầy đủ thông tin hợp lệ.');
            redirect('/register');
        }
        if ((new User())->findByEmail($email)) {
            flash('error', 'Email đã tồn tại.');
            redirect('/register');
        }

        (new User())->create($fullName, $email, $password);
        flash('success', 'Đăng ký thành công, vui lòng đăng nhập.');
        redirect('/login');
    }

    public function logout(): void
    {
        verify_csrf();
        unset($_SESSION['user']);
        redirect('/');
    }
}
