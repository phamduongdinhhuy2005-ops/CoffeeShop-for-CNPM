<?php
$salePrice = (!empty($product['is_on_sale']) && $product['discount_percent'] > 0)
    ? round($product['price'] * (1 - $product['discount_percent'] / 100))
    : $product['price'];
?>
<article class="group bg-white rounded-xl overflow-hidden border border-primary/10 shadow-sm hover:shadow-xl transition-all">
    <div class="aspect-[4/3] bg-cream-custom/30 overflow-hidden">
        <img src="<?= e($product['image_url'] ?: '/assets/images/menu-hero.jpg') ?>" alt="<?= e($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </div>
    <div class="p-5">
        <div class="text-xs uppercase tracking-[.18em] text-primary font-bold mb-2"><?= e($product['category_name'] ?? '') ?></div>
        <h3 class="font-serif text-xl font-bold text-slate-custom mb-2"><?= e($product['name']) ?></h3>
        <p class="text-sm text-teal-custom/70 leading-relaxed h-12 overflow-hidden"><?= e($product['description'] ?? '') ?></p>
        <div class="mt-4 flex items-center justify-between">
            <div>
                <?php if ($salePrice < $product['price']): ?>
                    <span class="font-bold text-primary"><?= number_format($salePrice, 0, ',', '.') ?> đ</span>
                    <span class="text-xs line-through text-slate-custom/40 ml-1"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</span>
                <?php else: ?>
                    <span class="font-bold text-primary"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</span>
                <?php endif; ?>
            </div>
            <form method="post" action="<?= url('/cart/add/' . $product['id']) ?>">
                <?= csrf_field() ?>
                <button class="h-10 w-10 rounded-full bg-slate-custom text-white hover:bg-primary transition-colors" title="Thêm vào giỏ">
                    <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
                </button>
            </form>
        </div>
    </div>
</article>
