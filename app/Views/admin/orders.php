<?php $title = 'Quản lý đơn hàng'; ?>
<div class="mb-7">
    <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Đơn hàng</p>
    <h1 class="text-3xl font-black tracking-tight">Quản lý đơn hàng</h1>
    <p class="mt-2 text-sm text-muted"><?= count($orders) ?> đơn hàng trong hệ thống</p>
</div>
<div class="overflow-hidden rounded-3xl border border-line bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px] text-sm">
            <thead class="bg-paper text-left text-muted">
                <tr>
                    <th class="p-4">Mã</th>
                    <th>Khách</th>
                    <th>Tổng</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Ngày</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr class="border-t border-line">
                    <td class="p-4 font-black">#<?= e($order['id']) ?></td>
                    <td><?= e($order['full_name'] ?? $order['email'] ?? 'Khách') ?></td>
                    <td class="font-black text-primary"><?= number_format((float)$order['total_amount'], 0, ',', '.') ?> đ</td>
                    <td><?= e($order['payment_method']) ?></td>
                    <td><?= e($order['status']) ?></td>
                    <td><?= e($order['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (!$orders): ?>
                <tr><td colspan="6" class="p-6 text-center text-muted">Chưa có đơn hàng nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
