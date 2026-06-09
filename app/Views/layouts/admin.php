<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Admin') ?> - Góc Lặng</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#9A6A43',
                        ink: '#253034',
                        muted: '#66736f',
                        paper: '#F8F6F1',
                        line: '#E5DDD1'
                    }
                }
            }
        }
    </script>
    <style>body { font-family: ui-sans-serif, system-ui, "Segoe UI", Arial, sans-serif; }</style>
</head>
<body class="bg-paper text-ink antialiased">
<div class="min-h-screen md:grid md:grid-cols-[270px_1fr]">
    <aside class="border-b border-line bg-ink px-5 py-5 text-white md:border-b-0 md:min-h-screen">
        <a href="<?= url('/admin') ?>" class="mb-8 flex items-center gap-3">
            <span class="material-symbols-outlined grid h-11 w-11 place-items-center rounded-2xl bg-primary text-[26px]">coffee</span>
            <div>
                <div class="font-black uppercase tracking-[0.18em]">Góc Lặng</div>
                <div class="text-xs font-semibold uppercase tracking-[0.14em] text-white/45">Admin</div>
            </div>
        </a>
        <nav class="grid gap-2 text-sm font-bold">
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/admin') ?>">Dashboard</a>
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/admin/products') ?>">Sản phẩm</a>
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/admin/categories') ?>">Danh mục</a>
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/admin/orders') ?>">Đơn hàng</a>
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/api/products') ?>" target="_blank">API sản phẩm</a>
            <a class="rounded-2xl px-4 py-3 text-white/75 transition hover:bg-white/10 hover:text-white" href="<?= url('/') ?>">Về trang chủ</a>
        </nav>
        <form method="post" action="<?= url('/logout') ?>" class="mt-8 md:mt-12">
            <?= csrf_field() ?>
            <button class="w-full rounded-2xl border border-white/10 px-4 py-3 text-left text-sm font-bold text-white/75 transition hover:border-red-300/30 hover:bg-red-500/15 hover:text-white">Đăng xuất</button>
        </form>
    </aside>
    <main class="min-w-0 px-5 py-6 md:px-8 md:py-8">
        <?php if ($msg = flash('success')): ?>
            <div class="mb-5 rounded-2xl border border-primary/25 bg-white p-4 text-sm font-bold shadow-sm"><?= e($msg) ?></div>
        <?php endif; ?>
        <?= $content ?>
    </main>
</div>
</body>
</html>
