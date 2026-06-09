<?php
$salePrice = (!empty($product['is_on_sale']) && $product['discount_percent'] > 0)
    ? round($product['price'] * (1 - $product['discount_percent'] / 100))
    : $product['price'];
?>
<article class="group overflow-hidden rounded-2xl border border-line bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-primary/40 hover:shadow-lg hover:shadow-black/5">
    <div class="aspect-[4/3] overflow-hidden bg-paper">
        <img src="<?= e(media_url($product['image_url'] ?? null)) ?>" alt="<?= e($product['name']) ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
    </div>
    <div class="p-5">
        <div class="mb-2 text-xs font-black uppercase tracking-[0.14em] text-primary"><?= e($product['category_name'] ?? '') ?></div>
        <h3 class="min-h-[3.5rem] text-xl font-black leading-7 text-ink"><?= e($product['name']) ?></h3>
        <p class="mt-3 line-clamp-2 min-h-[3.5rem] text-sm leading-7 text-muted"><?= e($product['description'] ?? '') ?></p>
        <div class="mt-5 flex items-center justify-between gap-4">
            <div>
                <?php if ($salePrice < $product['price']): ?>
                    <span class="text-lg font-black text-primary"><?= number_format($salePrice, 0, ',', '.') ?> đ</span>
                    <span class="ml-1 text-xs font-bold text-muted line-through"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</span>
                <?php else: ?>
                    <span class="text-lg font-black text-primary"><?= number_format((float) $product['price'], 0, ',', '.') ?> đ</span>
                <?php endif; ?>
            </div>
            <form method="post" action="<?= url('/cart/add/' . $product['id']) ?>">
                <?= csrf_field() ?>
                <button class="grid h-11 w-11 place-items-center rounded-2xl bg-ink text-white transition hover:bg-primary" title="Thêm vào giỏ">
                    <span class="material-symbols-outlined text-[21px]">add_shopping_cart</span>
                </button>
            </form>
        </div>
    </div>
</article>
