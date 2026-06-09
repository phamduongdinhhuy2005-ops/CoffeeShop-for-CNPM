<?php $title = 'Dashboard'; $revenue = array_sum(array_map(fn($o) => (float) $o['total_amount'], $orders)); ?>
<div class="mb-6">
    <h1 class="text-2xl font-extrabold">Dashboard</h1>
    <p class="text-slate-500 text-sm">Tổng quan PHP MVC/MySQL</p>
</div>
<div class="grid md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl border border-[#A27B5C]/15 p-5"><div class="text-3xl font-black"><?= count($products) ?></div><div class="text-sm text-slate-500">Sản phẩm</div></div>
    <div class="bg-white rounded-xl border border-[#A27B5C]/15 p-5"><div class="text-3xl font-black"><?= count($users) ?></div><div class="text-sm text-slate-500">Người dùng</div></div>
    <div class="bg-white rounded-xl border border-[#A27B5C]/15 p-5"><div class="text-3xl font-black"><?= count($orders) ?></div><div class="text-sm text-slate-500">Đơn hàng</div></div>
    <div class="bg-white rounded-xl border border-[#A27B5C]/15 p-5"><div class="text-3xl font-black"><?= number_format($revenue, 0, ',', '.') ?> đ</div><div class="text-sm text-slate-500">Doanh thu</div></div>
</div>
<div class="grid md:grid-cols-3 gap-4">
    <a href="<?= url('/admin/products') ?>" class="bg-white rounded-xl border border-[#A27B5C]/15 p-5 font-bold hover:border-[#A27B5C]">Quản lý sản phẩm</a>
    <a href="<?= url('/admin/categories') ?>" class="bg-white rounded-xl border border-[#A27B5C]/15 p-5 font-bold hover:border-[#A27B5C]">Quản lý danh mục</a>
    <a href="<?= url('/admin/orders') ?>" class="bg-white rounded-xl border border-[#A27B5C]/15 p-5 font-bold hover:border-[#A27B5C]">Quản lý đơn hàng</a>
</div>
