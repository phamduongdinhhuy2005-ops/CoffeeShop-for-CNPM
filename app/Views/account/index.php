<?php $title = 'Tài Khoản | Góc Lặng'; ?>
<section class="max-w-6xl mx-auto px-6 md:px-20 py-10">
    <div class="rounded-xl border border-primary/20 bg-white p-6 mb-6">
        <h1 class="font-serif text-3xl font-bold">Tài khoản</h1>
        <p class="text-teal-custom/70 mt-1"><?= e(current_user()['full_name']) ?> - <?= e(current_user()['email']) ?></p>
    </div>
    <div class="rounded-xl border border-primary/20 bg-white p-6">
        <h2 class="text-xl font-bold mb-4">Lịch sử đặt hàng</h2>
        <?php if (!$orders): ?>
            <p class="text-teal-custom/70">Chưa có đơn hàng nào.</p>
        <?php else: ?>
            <table class="w-full text-sm">
                <thead><tr class="text-left text-teal-custom/70"><th class="py-3">Mã đơn</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Trạng thái</th></tr></thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr class="border-t border-primary/10">
                        <td class="py-3 font-bold">#<?= e($order['id']) ?></td>
                        <td><?= e($order['created_at']) ?></td>
                        <td><?= number_format((float) $order['total_amount'], 0, ',', '.') ?> đ</td>
                        <td><?= e($order['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</section>
