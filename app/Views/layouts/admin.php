<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Admin') ?> - Góc Lặng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <style>body{font-family:'Be Vietnam Pro',sans-serif}</style>
</head>
<body class="bg-[#f6f4ef] text-[#2C3639]">
<div class="min-h-screen grid md:grid-cols-[260px_1fr]">
    <aside class="bg-[#2C3639] text-[#DCD7C9] p-5 flex flex-col gap-6">
        <a href="<?= url('/admin') ?>" class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[#A27B5C] text-3xl">coffee</span>
            <div><div class="font-bold tracking-widest uppercase">Goc Lang</div><div class="text-xs text-[#DCD7C9]/50">Admin Portal</div></div>
        </a>
        <nav class="grid gap-2 text-sm font-semibold">
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/admin') ?>">Dashboard</a>
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/admin/products') ?>">Sản phẩm</a>
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/admin/categories') ?>">Danh mục</a>
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/admin/orders') ?>">Đơn hàng</a>
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/api/products') ?>" target="_blank">API products</a>
            <a class="px-4 py-3 rounded-lg hover:bg-white/10" href="<?= url('/') ?>">Về trang chủ</a>
        </nav>
        <form method="post" action="<?= url('/logout') ?>" class="mt-auto">
            <?= csrf_field() ?>
            <button class="w-full px-4 py-3 rounded-lg text-left hover:bg-red-500/15">Đăng xuất</button>
        </form>
    </aside>
    <main class="p-6 md:p-8">
        <?php if ($msg = flash('success')): ?><div class="mb-5 rounded-lg border border-[#A27B5C]/30 bg-white p-4 font-semibold"><?= e($msg) ?></div><?php endif; ?>
        <?= $content ?>
    </main>
</div>
</body>
</html>
