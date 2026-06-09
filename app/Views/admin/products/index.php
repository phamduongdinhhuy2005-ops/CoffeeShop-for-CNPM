<?php $title = 'Quản lý sản phẩm'; ?>
<div class="flex items-center justify-between mb-6">
    <div><h1 class="text-2xl font-extrabold">Sản phẩm</h1><p class="text-sm text-slate-500"><?= count($products) ?> sản phẩm</p></div>
    <a href="<?= url('/admin/products/create') ?>" class="rounded-xl bg-[#A27B5C] text-white px-5 py-3 font-bold">Thêm sản phẩm</a>
</div>
<div class="bg-white rounded-xl border border-[#A27B5C]/15 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#f7f7f6] text-left"><tr><th class="p-4">Sản phẩm</th><th>Danh mục</th><th>Giá</th><th class="text-right pr-4">Thao tác</th></tr></thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr class="border-t border-slate-100">
                <td class="p-4">
                    <div class="flex items-center gap-3">
                        <img src="<?= e($product['image_url']) ?>" class="w-12 h-12 rounded-lg object-cover" alt="">
                        <div><div class="font-bold"><?= e($product['name']) ?></div><div class="text-xs text-slate-400">#<?= e($product['id']) ?></div></div>
                    </div>
                </td>
                <td><?= e($product['category_name']) ?></td>
                <td class="font-bold text-[#A27B5C]"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</td>
                <td class="text-right pr-4">
                    <a href="<?= url('/admin/products/' . $product['id'] . '/edit') ?>" class="font-bold text-[#A27B5C] mr-3">Sửa</a>
                    <form method="post" action="<?= url('/admin/products/' . $product['id'] . '/delete') ?>" class="inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                        <?= csrf_field() ?><button class="font-bold text-red-700">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
