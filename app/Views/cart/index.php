<?php $title = 'Giỏ Hàng | Góc Lặng'; $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)); ?>
<section class="max-w-5xl mx-auto px-6 md:px-20 py-12">
    <h1 class="font-serif text-4xl font-bold mb-8">Giỏ hàng</h1>
    <?php if (!$cart): ?>
        <div class="bg-white rounded-xl border border-primary/15 p-10 text-center">
            <p class="font-semibold mb-4">Giỏ hàng đang trống.</p>
            <a href="<?= url('/menu') ?>" class="rounded-full bg-primary text-white px-6 py-3 font-bold">Xem thực đơn</a>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-xl border border-primary/15 overflow-hidden">
            <?php foreach ($cart as $item): ?>
                <div class="flex gap-4 p-5 border-b border-primary/10">
                    <img src="<?= e($item['image_url']) ?>" class="w-20 h-20 rounded-lg object-cover" alt="">
                    <div class="flex-1">
                        <div class="font-bold"><?= e($item['name']) ?></div>
                        <div class="text-sm text-teal-custom/70">SL: <?= e($item['quantity']) ?></div>
                        <div class="text-primary font-bold"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> đ</div>
                    </div>
                    <form method="post" action="<?= url('/cart/remove/' . $item['id']) ?>">
                        <?= csrf_field() ?>
                        <button class="text-red-700 font-bold">Xóa</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <div class="p-5 flex justify-between items-center">
                <div class="font-bold text-xl">Tổng: <?= number_format($total, 0, ',', '.') ?> đ</div>
                <a href="<?= url('/checkout') ?>" class="rounded-full bg-primary text-white px-6 py-3 font-bold">Thanh toán</a>
            </div>
        </div>
    <?php endif; ?>
</section>
