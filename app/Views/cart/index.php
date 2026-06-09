<?php $title = 'Giỏ hàng | Góc Lặng'; $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)); ?>
<section class="mx-auto max-w-5xl px-5 py-12 md:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-black tracking-tight">Giỏ hàng</h1>
        <p class="mt-2 text-sm text-muted">Kiểm tra món đã chọn trước khi thanh toán.</p>
    </div>
    <?php if (!$cart): ?>
        <div class="rounded-3xl border border-line bg-white p-10 text-center">
            <p class="mb-5 text-lg font-black">Giỏ hàng đang trống.</p>
            <a href="<?= url('/menu') ?>" class="inline-flex rounded-2xl bg-primary px-6 py-3 text-sm font-black text-white">Xem thực đơn</a>
        </div>
    <?php else: ?>
        <div class="overflow-hidden rounded-3xl border border-line bg-white">
            <?php foreach ($cart as $item): ?>
                <div class="grid gap-4 border-b border-line p-5 md:grid-cols-[80px_1fr_auto] md:items-center">
                    <img src="<?= e(media_url($item['image_url'] ?? null)) ?>" class="h-20 w-20 rounded-2xl object-cover" alt="">
                    <div>
                        <div class="font-black"><?= e($item['name']) ?></div>
                        <div class="mt-1 text-sm text-muted">Số lượng: <?= e($item['quantity']) ?></div>
                        <div class="mt-2 font-black text-primary"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> đ</div>
                    </div>
                    <form method="post" action="<?= url('/cart/remove/' . $item['id']) ?>">
                        <?= csrf_field() ?>
                        <button class="rounded-2xl border border-red-200 px-4 py-2 text-sm font-black text-red-700 transition hover:bg-red-50">Xóa</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <div class="flex flex-col gap-4 p-5 md:flex-row md:items-center md:justify-between">
                <div class="text-2xl font-black">Tổng: <?= number_format($total, 0, ',', '.') ?> đ</div>
                <a href="<?= url('/checkout') ?>" class="rounded-2xl bg-primary px-6 py-3 text-center text-sm font-black text-white">Thanh toán</a>
            </div>
        </div>
    <?php endif; ?>
</section>
