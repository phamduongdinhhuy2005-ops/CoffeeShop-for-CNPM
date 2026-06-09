<?php $title = 'Quản lý sản phẩm'; ?>
<div class="mb-7 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
    <div>
        <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Sản phẩm</p>
        <h1 class="text-3xl font-black tracking-tight">Quản lý sản phẩm</h1>
        <p class="mt-2 text-sm text-muted"><?= count($products) ?> sản phẩm trong hệ thống</p>
    </div>
    <a href="<?= url('/admin/products/create') ?>" class="w-fit rounded-2xl bg-primary px-5 py-3 text-sm font-black text-white">Thêm sản phẩm</a>
</div>
<div class="overflow-hidden rounded-3xl border border-line bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px] text-sm">
            <thead class="bg-paper text-left text-muted">
                <tr>
                    <th class="p-4">Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th class="text-right pr-4">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="border-t border-line">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <img src="<?= e(media_url($product['image_url'] ?? null)) ?>" class="h-12 w-12 rounded-2xl object-cover" alt="">
                            <div>
                                <div class="font-black"><?= e($product['name']) ?></div>
                                <div class="text-xs font-bold text-muted">#<?= e($product['id']) ?></div>
                            </div>
                        </div>
                    </td>
                    <td><?= e($product['category_name']) ?></td>
                    <td class="font-black text-primary"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</td>
                    <td class="pr-4 text-right">
                        <a href="<?= url('/admin/products/' . $product['id'] . '/edit') ?>" class="mr-3 font-black text-primary">Sửa</a>
                        <form method="post" action="<?= url('/admin/products/' . $product['id'] . '/delete') ?>" class="inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                            <?= csrf_field() ?><button class="font-black text-red-700">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
