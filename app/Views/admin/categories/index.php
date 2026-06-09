<?php $title = 'Quản lý danh mục'; ?>
<div class="mb-6"><h1 class="text-2xl font-extrabold">Danh mục</h1></div>
<form method="post" action="<?= url('/admin/categories') ?>" class="bg-white rounded-xl border border-[#A27B5C]/15 p-5 flex gap-3 mb-5">
    <?= csrf_field() ?>
    <input name="name" class="rounded-lg border-slate-200 flex-1" placeholder="Tên danh mục mới" required>
    <button class="rounded-lg bg-[#A27B5C] text-white px-5 font-bold">Thêm</button>
</form>
<div class="bg-white rounded-xl border border-[#A27B5C]/15 overflow-hidden">
    <?php foreach ($categories as $category): ?>
        <div class="p-4 border-b border-slate-100 flex items-center gap-3">
            <form method="post" action="<?= url('/admin/categories/' . $category['id'] . '/update') ?>" class="flex gap-3 flex-1">
                <?= csrf_field() ?>
                <input name="name" value="<?= e($category['name']) ?>" class="rounded-lg border-slate-200 flex-1">
                <button class="font-bold text-[#A27B5C]">Lưu</button>
            </form>
            <form method="post" action="<?= url('/admin/categories/' . $category['id'] . '/delete') ?>" onsubmit="return confirm('Xóa danh mục này?')">
                <?= csrf_field() ?>
                <button class="font-bold text-red-700">Xóa</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
