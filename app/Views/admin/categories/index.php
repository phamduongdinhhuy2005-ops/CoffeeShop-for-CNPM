<?php $title = 'Quản lý danh mục'; ?>
<div class="mb-7">
    <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Danh mục</p>
    <h1 class="text-3xl font-black tracking-tight">Quản lý danh mục</h1>
</div>
<form method="post" action="<?= url('/admin/categories') ?>" class="mb-5 flex flex-col gap-3 rounded-3xl border border-line bg-white p-5 shadow-sm md:flex-row">
    <?= csrf_field() ?>
    <input name="name" class="min-w-0 flex-1 rounded-2xl border-line" placeholder="Tên danh mục mới" required>
    <button class="rounded-2xl bg-primary px-5 py-3 text-sm font-black text-white">Thêm</button>
</form>
<div class="overflow-hidden rounded-3xl border border-line bg-white shadow-sm">
    <?php foreach ($categories as $category): ?>
        <div class="grid gap-3 border-b border-line p-4 md:grid-cols-[1fr_auto] md:items-center">
            <form method="post" action="<?= url('/admin/categories/' . $category['id'] . '/update') ?>" class="flex gap-3">
                <?= csrf_field() ?>
                <input name="name" value="<?= e($category['name']) ?>" class="min-w-0 flex-1 rounded-2xl border-line">
                <button class="rounded-2xl border border-line px-4 py-2 text-sm font-black text-primary">Lưu</button>
            </form>
            <form method="post" action="<?= url('/admin/categories/' . $category['id'] . '/delete') ?>" onsubmit="return confirm('Xóa danh mục này?')">
                <?= csrf_field() ?>
                <button class="rounded-2xl border border-red-200 px-4 py-2 text-sm font-black text-red-700">Xóa</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
