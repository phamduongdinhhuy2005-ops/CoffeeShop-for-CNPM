<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Góc Lặng') ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: {
                    primary: '#A27B5C',
                    'slate-custom': '#2C3639',
                    'teal-custom': '#3F4E4F',
                    'cream-custom': '#DCD7C9',
                    'background-light': '#F7F7F6'
                },
                fontFamily: {
                    display: ['Be Vietnam Pro', 'sans-serif'],
                    serif: ['Playfair Display', 'serif']
                }
            }}
        }
    </script>
    <style>
        body { font-family: 'Be Vietnam Pro', sans-serif; }
        .cart-badge {
            position: absolute; top: -4px; right: -4px; background: #A27B5C; color: #fff;
            font-size: 10px; font-weight: 700; border-radius: 99px; min-width: 17px; height: 17px;
            display: flex; align-items: center; justify-content: center; line-height: 1; padding: 0 3px;
        }
        .user-menu-dropdown { display: none; position: absolute; right: 0; top: 100%; padding-top: 8px; min-width: 240px; z-index: 999; }
        .user-menu:hover .user-menu-dropdown { display: block; }
    </style>
</head>
<body class="bg-background-light text-slate-custom min-h-screen flex flex-col">
    <header class="flex items-center justify-between whitespace-nowrap border-b border-primary/20 bg-background-light/90 backdrop-blur-md px-6 md:px-20 py-4 sticky top-0 z-50">
        <a href="<?= url('/') ?>" class="flex items-center gap-3 text-slate-custom hover:opacity-80 transition-opacity">
            <span class="material-symbols-outlined text-primary text-3xl">local_cafe</span>
            <div>
                <h2 class="font-serif text-lg font-bold tracking-widest uppercase leading-none">Góc Lặng</h2>
                <p class="text-teal-custom text-[9px] tracking-[0.22em] uppercase font-medium mt-1">Café & Nghệ Thuật Cổ Điển</p>
            </div>
        </a>
        <nav class="hidden md:flex flex-1 justify-center gap-10">
            <a href="<?= url('/menu') ?>" class="text-teal-custom hover:text-primary transition-colors text-sm font-semibold uppercase tracking-wider">Thực Đơn</a>
            <a href="<?= url('/privacy') ?>" class="text-teal-custom hover:text-primary transition-colors text-sm font-semibold uppercase tracking-wider">Chính Sách</a>
            <a href="#footer-location" class="text-teal-custom hover:text-primary transition-colors text-sm font-semibold uppercase tracking-wider">Tìm Chúng Mình</a>
        </nav>
        <div class="flex items-center gap-2">
            <a href="<?= url('/cart') ?>" class="relative flex items-center justify-center rounded-full h-10 w-10 bg-cream-custom/50 text-teal-custom hover:bg-primary hover:text-white transition-all">
                <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                <?php $cartCount = array_sum(array_column($_SESSION['cart'] ?? [], 'quantity')); ?>
                <?php if ($cartCount > 0): ?><span class="cart-badge"><?= e($cartCount) ?></span><?php endif; ?>
            </a>
            <div class="user-menu relative">
                <button class="flex items-center justify-center rounded-full h-10 w-10 bg-cream-custom/50 text-teal-custom hover:bg-primary hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[20px]">person</span>
                </button>
                <div class="user-menu-dropdown">
                    <div class="bg-white border border-primary/25 rounded-xl shadow-xl overflow-hidden">
                        <?php if (current_user()): ?>
                            <div class="px-5 py-4 border-b border-primary/10 bg-primary/5">
                                <p class="font-bold text-sm truncate"><?= e(current_user()['full_name']) ?></p>
                                <p class="text-xs text-teal-custom/60 truncate"><?= e(current_user()['email']) ?></p>
                            </div>
                            <a href="<?= is_admin() ? url('/admin') : url('/account') ?>" class="flex items-center gap-3 px-5 py-3 text-sm text-teal-custom hover:text-primary hover:bg-primary/5">
                                <span class="material-symbols-outlined text-primary text-[18px]">dashboard</span><?= is_admin() ? 'Dashboard Admin' : 'Tài Khoản' ?>
                            </a>
                            <form method="post" action="<?= url('/logout') ?>" class="border-t border-primary/10">
                                <?= csrf_field() ?>
                                <button class="flex items-center gap-3 w-full px-5 py-3 text-sm text-left text-red-700 hover:bg-red-50">
                                    <span class="material-symbols-outlined text-[18px]">logout</span>Đăng Xuất
                                </button>
                            </form>
                        <?php else: ?>
                            <a href="<?= url('/login') ?>" class="flex items-center gap-3 px-5 py-3 text-sm text-teal-custom hover:text-primary hover:bg-primary/5">
                                <span class="material-symbols-outlined text-primary text-[18px]">login</span>Đăng Nhập
                            </a>
                            <a href="<?= url('/register') ?>" class="flex items-center gap-3 px-5 py-3 text-sm text-teal-custom hover:text-primary hover:bg-primary/5">
                                <span class="material-symbols-outlined text-primary text-[18px]">person_add</span>Đăng Ký
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php if ($msg = flash('success')): ?>
        <div class="fixed right-6 top-24 z-[9999] rounded-xl border border-primary/30 border-l-4 bg-white px-5 py-4 shadow-xl text-sm font-semibold"><?= e($msg) ?></div>
    <?php endif; ?>
    <?php if ($msg = flash('error')): ?>
        <div class="fixed right-6 top-24 z-[9999] rounded-xl border border-red-200 border-l-4 border-l-red-600 bg-white px-5 py-4 shadow-xl text-sm font-semibold text-red-700"><?= e($msg) ?></div>
    <?php endif; ?>

    <main class="flex-1"><?= $content ?></main>

    <footer id="footer-location" class="bg-slate-custom text-cream-custom pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 md:px-20">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-outlined text-primary text-3xl">local_cafe</span>
                        <div>
                            <h3 class="font-serif font-bold text-xl tracking-widest uppercase">Góc Lặng</h3>
                            <p class="text-primary text-[10px] tracking-[0.2em] uppercase">Café & Nghệ Thuật Cổ Điển</p>
                        </div>
                    </div>
                    <p class="text-cream-custom/60 text-sm leading-relaxed">Một nơi để dừng lại, thở sâu, và thưởng thức buổi sáng đúng nghĩa.</p>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-widest text-primary mb-6">Khám Phá</h4>
                    <a href="<?= url('/menu') ?>" class="text-cream-custom/60 hover:text-primary transition-colors text-sm">Thực Đơn</a>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-widest text-primary mb-6">Ghé Thăm</h4>
                    <ul class="space-y-3 text-sm text-cream-custom/60">
                        <li>124 Đường Hoài Cổ, Quận 3, TP.HCM</li>
                        <li>Thứ 2 - Thứ 6: 7:00 - 19:00</li>
                        <li>Thứ 7 - CN: 8:00 - 20:00</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-widest text-primary mb-6">Vị Trí</h4>
                    <div class="rounded-xl h-[140px] bg-primary/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-5xl">location_on</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-cream-custom/10 pt-8 text-center text-xs text-cream-custom/40">&copy; 2024 Góc Lặng Café.</div>
        </div>
    </footer>
</body>
</html>
