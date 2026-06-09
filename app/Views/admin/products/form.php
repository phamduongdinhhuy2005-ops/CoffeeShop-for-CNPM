<?php $isEdit = (bool) $product; $title = $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm'; ?>
<div class="mb-7">
    <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Sản phẩm</p>
    <h1 class="text-3xl font-black tracking-tight"><?= $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?></h1>
    <p class="mt-2 text-sm text-muted">Form CRUD sản phẩm theo cấu trúc PHP MVC.</p>
</div>
<form method="post" action="<?= $isEdit ? url('/admin/products/' . $product['id'] . '/update') : url('/admin/products') ?>" class="grid max-w-3xl gap-5 rounded-3xl border border-line bg-white p-6 shadow-sm">
    <?= csrf_field() ?>
    <label class="grid gap-2 text-sm font-bold">Tên sản phẩm
        <input name="name" value="<?= e($product['name'] ?? '') ?>" class="rounded-2xl border-line" required>
    </label>
    <div class="grid gap-4 md:grid-cols-2">
        <label class="grid gap-2 text-sm font-bold">Giá
            <input name="price" type="number" min="0" value="<?= e($product['price'] ?? '') ?>" class="rounded-2xl border-line" required>
        </label>
        <label class="grid gap-2 text-sm font-bold">Danh mục
            <select name="category_id" class="rounded-2xl border-line">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= e($category['id']) ?>" <?= (int)($product['category_id'] ?? 0) === (int)$category['id'] ? 'selected' : '' ?>><?= e($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <label class="grid gap-2 text-sm font-bold">Ảnh URL
        <input name="image_url" value="<?= e($product['image_url'] ?? '') ?>" class="rounded-2xl border-line" placeholder="/assets/images/example.jpg">
    </label>
    <label class="grid gap-2 text-sm font-bold">Mô tả
        <textarea name="description" class="min-h-[130px] rounded-2xl border-line"><?= e($product['description'] ?? '') ?></textarea>
    </label>
    <div class="grid gap-4 md:grid-cols-2">
        <label class="flex items-center gap-3 rounded-2xl border border-line px-4 py-3 text-sm font-bold">
            <input type="checkbox" name="is_on_sale" value="1" <?= !empty($product['is_on_sale']) ? 'checked' : '' ?>>
            Đang giảm giá
        </label>
        <label class="grid gap-2 text-sm font-bold">Phần trăm giảm
            <input name="discount_percent" type="number" min="0" max="100" value="<?= e($product['discount_percent'] ?? '') ?>" class="rounded-2xl border-line">
        </label>
    </div>
    <button class="w-fit rounded-2xl bg-primary px-5 py-3 text-sm font-black text-white"><?= $isEdit ? 'Lưu thay đổi' : 'Thêm sản phẩm' ?></button>
</form>
