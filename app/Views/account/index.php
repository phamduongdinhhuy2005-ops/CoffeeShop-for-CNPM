<?php $title = 'Tài khoản | Góc Lặng'; ?>
<section class="mx-auto max-w-6xl px-5 py-10 md:px-8">
    <div class="mb-6 rounded-3xl border border-line bg-white p-6 shadow-sm">
        <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Tài khoản</p>
        <h1 class="text-3xl font-black tracking-tight"><?= e(current_user()['full_name']) ?></h1>
        <p class="mt-1 text-sm text-muted"><?= e(current_user()['email']) ?></p>
    </div>
    <div class="rounded-3xl border border-line bg-white p-6 shadow-sm">
        <div class="mb-5 flex items-center justify-between gap-4">
            <h2 class="text-xl font-black">Lịch sử đặt hàng</h2>
            <span class="rounded-2xl bg-paper px-3 py-1 text-xs font-black text-muted"><?= count($orders) ?> đơn</span>
        </div>
        <?php if (!$orders): ?>
            <p class="text-sm text-muted">Chưa có đơn hàng nào.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-sm">
                    <thead>
                        <tr class="text-left text-muted">
                            <th class="py-3">Mã đơn</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr class="border-t border-line">
                            <td class="py-3 font-black">#<?= e($order['id']) ?></td>
                            <td><?= e($order['created_at']) ?></td>
                            <td class="font-black text-primary"><?= number_format((float) $order['total_amount'], 0, ',', '.') ?> đ</td>
                            <td><?= e($order['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>
