<?php $title = 'Quản lý đơn hàng'; ?>
<div class="mb-6"><h1 class="text-2xl font-extrabold">Đơn hàng</h1><p class="text-sm text-slate-500"><?= count($orders) ?> đơn hàng</p></div>
<div class="bg-white rounded-xl border border-[#A27B5C]/15 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#f7f7f6] text-left"><tr><th class="p-4">Mã</th><th>Khách</th><th>Tổng</th><th>Thanh toán</th><th>Trạng thái</th><th>Ngày</th></tr></thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr class="border-t border-slate-100">
                <td class="p-4 font-bold">#<?= e($order['id']) ?></td>
                <td><?= e($order['full_name'] ?? $order['email'] ?? 'Khách') ?></td>
                <td class="font-bold text-[#A27B5C]"><?= number_format((float)$order['total_amount'], 0, ',', '.') ?> đ</td>
                <td><?= e($order['payment_method']) ?></td>
                <td><?= e($order['status']) ?></td>
                <td><?= e($order['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
