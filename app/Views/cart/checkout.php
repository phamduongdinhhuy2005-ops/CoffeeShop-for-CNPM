<?php $title = 'Thanh toán | Góc Lặng'; $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)); ?>
<section class="mx-auto max-w-4xl px-5 py-12 md:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-black tracking-tight">Thanh toán</h1>
        <p class="mt-2 text-sm text-muted">Nhập địa chỉ và phương thức thanh toán cho đơn hàng.</p>
    </div>
    <form method="post" action="<?= url('/checkout') ?>" class="grid gap-4 rounded-3xl border border-line bg-white p-6 shadow-sm">
        <?= csrf_field() ?>
        <label class="grid gap-2 text-sm font-bold">Địa chỉ nhận hàng
            <input name="shipping_address" class="rounded-2xl border-line" placeholder="Số nhà, đường, phường/xã, quận/huyện" required>
        </label>
        <label class="grid gap-2 text-sm font-bold">Ghi chú
            <textarea name="note" class="min-h-[120px] rounded-2xl border-line" placeholder="Ghi chú cho đơn hàng"></textarea>
        </label>
        <label class="grid gap-2 text-sm font-bold">Phương thức thanh toán
            <select name="payment_method" class="rounded-2xl border-line">
                <option value="COD">COD</option>
                <option value="Transfer">Chuyển khoản</option>
            </select>
        </label>
        <div class="rounded-2xl bg-paper p-4 text-xl font-black">Tổng: <?= number_format($total, 0, ',', '.') ?> đ</div>
        <button class="w-fit rounded-2xl bg-primary px-6 py-3 text-sm font-black text-white transition hover:bg-primary/90">Đặt hàng</button>
    </form>
</section>
