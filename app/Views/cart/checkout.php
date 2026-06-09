<?php $title = 'Thanh Toán | Góc Lặng'; $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)); ?>
<section class="max-w-4xl mx-auto px-6 md:px-20 py-12">
    <h1 class="font-serif text-4xl font-bold mb-8">Thanh toán</h1>
    <form method="post" action="<?= url('/checkout') ?>" class="bg-white rounded-xl border border-primary/15 p-6 grid gap-4">
        <?= csrf_field() ?>
        <input name="shipping_address" class="rounded-lg border-primary/25" placeholder="Địa chỉ nhận hàng" required>
        <textarea name="note" class="rounded-lg border-primary/25" placeholder="Ghi chú"></textarea>
        <select name="payment_method" class="rounded-lg border-primary/25">
            <option value="COD">COD</option>
            <option value="Transfer">Chuyển khoản</option>
        </select>
        <div class="font-bold text-xl">Tổng: <?= number_format($total, 0, ',', '.') ?> đ</div>
        <button class="rounded-full bg-primary text-white px-6 py-3 font-bold w-fit">Đặt hàng</button>
    </form>
</section>
