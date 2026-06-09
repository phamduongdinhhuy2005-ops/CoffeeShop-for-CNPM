<?php $title = 'Thực Đơn | Góc Lặng'; ?>
<section class="relative min-h-[48vh] flex items-center justify-center text-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('/assets/images/menu-hero.jpg')"></div>
    <div class="absolute inset-0 bg-black/55"></div>
    <div class="relative px-6">
        <p class="uppercase tracking-[.35em] text-primary font-bold text-xs mb-4">Seasonal Menu</p>
        <h1 class="font-serif text-5xl md:text-7xl font-bold text-white">Thực Đơn</h1>
    </div>
</section>

<nav class="sticky top-[73px] z-40 bg-background-light/95 backdrop-blur border-b border-primary/10">
    <div class="max-w-7xl mx-auto px-6 md:px-20 flex gap-1 overflow-x-auto py-3">
        <a class="px-4 py-2 rounded-full text-sm font-bold <?= empty($categoryId) ? 'bg-primary text-white' : 'text-teal-custom hover:bg-primary/10' ?>" href="<?= url('/menu') ?>">Tất cả <span class="opacity-70">(<?= count($allProducts) ?>)</span></a>
        <?php foreach ($categories as $category): ?>
            <?php $count = count(array_filter($allProducts, fn ($p) => (int) $p['category_id'] === (int) $category['id'])); ?>
            <a class="px-4 py-2 rounded-full text-sm font-bold whitespace-nowrap <?= (int) $categoryId === (int) $category['id'] ? 'bg-primary text-white' : 'text-teal-custom hover:bg-primary/10' ?>" href="<?= url('/menu?category_id=' . $category['id']) ?>">
                <?= e($category['name']) ?> <span class="opacity-70">(<?= $count ?>)</span>
            </a>
        <?php endforeach; ?>
    </div>
</nav>

<section class="max-w-7xl mx-auto px-6 md:px-20 py-14">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($products as $product): require BASE_PATH . '/app/Views/partials/product-card.php'; endforeach; ?>
    </div>
</section>
