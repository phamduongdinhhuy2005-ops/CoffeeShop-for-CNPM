<?php $title = 'Dashboard'; $revenue = array_sum(array_map(fn($o) => (float) $o['total_amount'], $orders)); ?>
<div class="mb-7">
    <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Tổng quan</p>
    <h1 class="text-3xl font-black tracking-tight">Dashboard</h1>
    <p class="mt-2 text-sm text-muted">Theo dõi dữ liệu chính của dự án PHP MVC/MySQL.</p>
</div>
<div class="mb-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <div class="rounded-3xl border border-line bg-white p-5 shadow-sm"><div class="text-3xl font-black"><?= count($products) ?></div><div class="mt-1 text-sm font-bold text-muted">Sản phẩm</div></div>
    <div class="rounded-3xl border border-line bg-white p-5 shadow-sm"><div class="text-3xl font-black"><?= count($users) ?></div><div class="mt-1 text-sm font-bold text-muted">Người dùng</div></div>
    <div class="rounded-3xl border border-line bg-white p-5 shadow-sm"><div class="text-3xl font-black"><?= count($orders) ?></div><div class="mt-1 text-sm font-bold text-muted">Đơn hàng</div></div>
    <div class="rounded-3xl border border-line bg-white p-5 shadow-sm"><div class="text-3xl font-black"><?= number_format($revenue, 0, ',', '.') ?> đ</div><div class="mt-1 text-sm font-bold text-muted">Doanh thu</div></div>
</div>
<div class="grid gap-4 md:grid-cols-3">
    <a href="<?= url('/admin/products') ?>" class="rounded-3xl border border-line bg-white p-5 font-black shadow-sm transition hover:border-primary">Quản lý sản phẩm</a>
    <a href="<?= url('/admin/categories') ?>" class="rounded-3xl border border-line bg-white p-5 font-black shadow-sm transition hover:border-primary">Quản lý danh mục</a>
    <a href="<?= url('/admin/orders') ?>" class="rounded-3xl border border-line bg-white p-5 font-black shadow-sm transition hover:border-primary">Quản lý đơn hàng</a>
</div>
