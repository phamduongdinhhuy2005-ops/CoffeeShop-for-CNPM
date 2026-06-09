<?php $title = 'Thực đơn | Góc Lặng'; ?>
<section class="border-b border-line bg-ink text-white">
    <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 md:grid-cols-[0.9fr_1.1fr] md:px-8">
        <div>
            <p class="mb-3 text-sm font-black uppercase tracking-[0.16em] text-primary">Thực đơn</p>
            <h1 class="text-4xl font-black tracking-tight md:text-6xl">Chọn món nhanh, quản lý dữ liệu rõ.</h1>
        </div>
        <p class="self-end text-sm leading-7 text-white/65">Danh sách sản phẩm lấy trực tiếp từ MySQL. Bộ lọc danh mục dùng cùng dữ liệu với phần quản trị để thuận tiện khi nâng cấp.</p>
    </div>
</section>

<nav class="sticky top-20 z-40 border-b border-line bg-paper/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl gap-2 overflow-x-auto px-5 py-3 md:px-8">
        <a class="whitespace-nowrap rounded-2xl px-4 py-2 text-sm font-black <?= empty($categoryId) ? 'bg-primary text-white' : 'text-muted hover:bg-white hover:text-primary' ?>" href="<?= url('/menu') ?>">Tất cả <span class="opacity-70">(<?= count($allProducts) ?>)</span></a>
        <?php foreach ($categories as $category): ?>
            <?php $count = count(array_filter($allProducts, fn ($p) => (int) $p['category_id'] === (int) $category['id'])); ?>
            <a class="whitespace-nowrap rounded-2xl px-4 py-2 text-sm font-black <?= (int) $categoryId === (int) $category['id'] ? 'bg-primary text-white' : 'text-muted hover:bg-white hover:text-primary' ?>" href="<?= url('/menu?category_id=' . $category['id']) ?>">
                <?= e($category['name']) ?> <span class="opacity-70">(<?= $count ?>)</span>
            </a>
        <?php endforeach; ?>
    </div>
</nav>

<section class="mx-auto max-w-7xl px-5 py-10 md:px-8">
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($products as $product): require BASE_PATH . '/app/Views/partials/product-card.php'; endforeach; ?>
    </div>
</section>
