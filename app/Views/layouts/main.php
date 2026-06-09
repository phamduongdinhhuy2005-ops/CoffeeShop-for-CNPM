<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Góc Lặng') ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#9A6A43',
                        ink: '#253034',
                        muted: '#66736f',
                        paper: '#F8F6F1',
                        surface: '#FFFFFF',
                        line: '#E5DDD1'
                    },
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui', 'Segoe UI', 'Arial', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: ui-sans-serif, system-ui, "Segoe UI", Arial, sans-serif; }
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 18px;
            height: 18px;
            border-radius: 999px;
            background: #9A6A43;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
            font-size: 11px;
            font-weight: 800;
        }
        .user-menu-dropdown { display: none; position: absolute; right: 0; top: 100%; padding-top: 10px; min-width: 250px; z-index: 999; }
        .user-menu:hover .user-menu-dropdown { display: block; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="min-h-screen bg-paper text-ink antialiased">
    <header class="sticky top-0 z-50 border-b border-line bg-paper/95 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-5 px-5 md:px-8">
            <a href="<?= url('/') ?>" class="flex min-w-0 items-center gap-3">
                <span class="material-symbols-outlined grid h-11 w-11 place-items-center rounded-2xl bg-primary text-[26px] text-white">local_cafe</span>
                <span class="min-w-0">
                    <span class="block text-lg font-black uppercase tracking-[0.18em]">Góc Lặng</span>
                    <span class="block truncate text-xs font-semibold uppercase tracking-[0.16em] text-muted">Cà phê và bánh sáng</span>
                </span>
            </a>

            <nav class="hidden items-center gap-8 md:flex">
                <a href="<?= url('/menu') ?>" class="text-sm font-bold text-muted transition hover:text-primary">Thực đơn</a>
                <a href="<?= url('/privacy') ?>" class="text-sm font-bold text-muted transition hover:text-primary">Chính sách</a>
                <a href="#footer-location" class="text-sm font-bold text-muted transition hover:text-primary">Liên hệ</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="<?= url('/cart') ?>" class="relative grid h-11 w-11 place-items-center rounded-2xl border border-line bg-surface text-ink transition hover:border-primary hover:text-primary" title="Giỏ hàng">
                    <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
                    <?php $cartCount = array_sum(array_column($_SESSION['cart'] ?? [], 'quantity')); ?>
                    <?php if ($cartCount > 0): ?><span class="cart-badge"><?= e($cartCount) ?></span><?php endif; ?>
                </a>
                <div class="user-menu relative">
                    <button class="grid h-11 w-11 place-items-center rounded-2xl border border-line bg-surface text-ink transition hover:border-primary hover:text-primary" title="Tài khoản">
                        <span class="material-symbols-outlined text-[22px]">person</span>
                    </button>
                    <div class="user-menu-dropdown">
                        <div class="overflow-hidden rounded-2xl border border-line bg-white shadow-xl shadow-black/10">
                            <?php if (current_user()): ?>
                                <div class="border-b border-line bg-paper px-5 py-4">
                                    <p class="truncate text-sm font-black"><?= e(current_user()['full_name']) ?></p>
                                    <p class="truncate text-xs text-muted"><?= e(current_user()['email']) ?></p>
                                </div>
                                <a href="<?= is_admin() ? url('/admin') : url('/account') ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-bold text-ink hover:bg-paper">
                                    <span class="material-symbols-outlined text-primary text-[19px]">dashboard</span><?= is_admin() ? 'Quản trị' : 'Tài khoản' ?>
                                </a>
                                <form method="post" action="<?= url('/logout') ?>" class="border-t border-line">
                                    <?= csrf_field() ?>
                                    <button class="flex w-full items-center gap-3 px-5 py-3 text-left text-sm font-bold text-red-700 hover:bg-red-50">
                                        <span class="material-symbols-outlined text-[19px]">logout</span>Đăng xuất
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?= url('/login') ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-bold text-ink hover:bg-paper">
                                    <span class="material-symbols-outlined text-primary text-[19px]">login</span>Đăng nhập
                                </a>
                                <a href="<?= url('/register') ?>" class="flex items-center gap-3 px-5 py-3 text-sm font-bold text-ink hover:bg-paper">
                                    <span class="material-symbols-outlined text-primary text-[19px]">person_add</span>Đăng ký
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php if ($msg = flash('success')): ?>
        <div class="fixed right-5 top-24 z-[9999] rounded-2xl border border-primary/30 bg-white px-5 py-4 text-sm font-bold shadow-xl shadow-black/10"><?= e($msg) ?></div>
    <?php endif; ?>
    <?php if ($msg = flash('error')): ?>
        <div class="fixed right-5 top-24 z-[9999] rounded-2xl border border-red-200 bg-white px-5 py-4 text-sm font-bold text-red-700 shadow-xl shadow-black/10"><?= e($msg) ?></div>
    <?php endif; ?>

    <main><?= $content ?></main>

    <footer id="footer-location" class="border-t border-line bg-ink text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 md:grid-cols-[1.4fr_1fr_1fr] md:px-8">
            <div>
                <div class="mb-4 flex items-center gap-3">
                    <span class="material-symbols-outlined grid h-11 w-11 place-items-center rounded-2xl bg-primary text-[26px]">local_cafe</span>
                    <div>
                        <h3 class="text-lg font-black uppercase tracking-[0.18em]">Góc Lặng</h3>
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-white/55">Cà phê và bánh sáng</p>
                    </div>
                </div>
                <p class="max-w-md text-sm leading-7 text-white/65">Dự án PHP MVC/MySQL phục vụ thực hành COS340, giữ nền giao diện gọn để tiếp tục nâng cấp API, JWT và trải nghiệm người dùng.</p>
            </div>
            <div>
                <h4 class="mb-4 text-sm font-black uppercase tracking-[0.16em] text-primary">Điều hướng</h4>
                <div class="grid gap-3 text-sm text-white/65">
                    <a href="<?= url('/menu') ?>" class="hover:text-white">Thực đơn</a>
                    <a href="<?= url('/privacy') ?>" class="hover:text-white">Chính sách</a>
                    <a href="<?= url('/cart') ?>" class="hover:text-white">Giỏ hàng</a>
                </div>
            </div>
            <div>
                <h4 class="mb-4 text-sm font-black uppercase tracking-[0.16em] text-primary">Thông tin</h4>
                <ul class="grid gap-3 text-sm text-white/65">
                    <li>124 Đường Hoài Cổ, Quận 3, TP.HCM</li>
                    <li>Thứ 2 đến Thứ 6: 7:00 đến 19:00</li>
                    <li>Cuối tuần: 8:00 đến 20:00</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 py-5 text-center text-xs text-white/45">&copy; 2024 Góc Lặng Café.</div>
    </footer>
</body>
</html>
