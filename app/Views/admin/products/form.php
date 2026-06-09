<?php $isEdit = (bool) $product; $title = $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm'; ?>
<div class="mb-6">
    <h1 class="text-2xl font-extrabold"><?= $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?></h1>
    <p class="text-sm text-slate-500">Form CRUD sản phẩm theo PHP MVC.</p>
</div>
<form method="post" action="<?= $isEdit ? url('/admin/products/' . $product['id'] . '/update') : url('/admin/products') ?>" class="bg-white rounded-xl border border-[#A27B5C]/15 p-6 grid gap-4 max-w-3xl">
    <?= csrf_field() ?>
    <label class="grid gap-2 font-semibold text-sm">Tên sản phẩm
        <input name="name" value="<?= e($product['name'] ?? '') ?>" class="rounded-lg border-slate-200" required>
    </label>
    <label class="grid gap-2 font-semibold text-sm">Giá
        <input name="price" type="number" value="<?= e($product['price'] ?? '') ?>" class="rounded-lg border-slate-200" required>
    </label>
    <label class="grid gap-2 font-semibold text-sm">Danh mục
        <select name="category_id" class="rounded-lg border-slate-200">
            <?php foreach ($categories as $category): ?>
                <option value="<?= e($category['id']) ?>" <?= (int)($product['category_id'] ?? 0) === (int)$category['id'] ? 'selected' : '' ?>><?= e($category['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label class="grid gap-2 font-semibold text-sm">Ảnh URL
        <input name="image_url" value="<?= e($product['image_url'] ?? '') ?>" class="rounded-lg border-slate-200">
    </label>
    <label class="grid gap-2 font-semibold text-sm">Mô tả
        <textarea name="description" class="rounded-lg border-slate-200 min-h-[120px]"><?= e($product['description'] ?? '') ?></textarea>
    </label>
    <div class="grid md:grid-cols-2 gap-4">
        <label class="flex items-center gap-2 font-semibold text-sm"><input type="checkbox" name="is_on_sale" value="1" <?= !empty($product['is_on_sale']) ? 'checked' : '' ?>> Đang giảm giá</label>
        <label class="grid gap-2 font-semibold text-sm">Phần trăm giảm
            <input name="discount_percent" type="number" min="0" max="100" value="<?= e($product['discount_percent'] ?? '') ?>" class="rounded-lg border-slate-200">
        </label>
    </div>
    <button class="w-fit rounded-xl bg-[#A27B5C] text-white px-5 py-3 font-bold"><?= $isEdit ? 'Lưu thay đổi' : 'Thêm sản phẩm' ?></button>
</form>
