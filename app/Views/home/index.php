<?php $title = 'Góc Lặng - Cà phê và bánh sáng'; ?>
<section class="relative overflow-hidden border-b border-line bg-ink text-white">
    <div class="absolute inset-y-0 right-0 hidden w-1/2 bg-cover bg-center opacity-90 md:block" style="background-image:url('<?= e(asset('assets/images/menu-hero.jpg')) ?>')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-ink via-ink/95 to-ink/30"></div>
    <div class="relative mx-auto grid min-h-[620px] max-w-7xl items-center px-5 py-16 md:grid-cols-[0.95fr_1.05fr] md:px-8">
        <div class="max-w-2xl">
            <p class="mb-4 text-sm font-black uppercase tracking-[0.18em] text-primary">Góc Lặng Café</p>
            <h1 class="text-5xl font-black leading-[1.05] tracking-tight md:text-7xl">Cà phê đủ chậm cho một buổi sáng rõ ràng.</h1>
            <p class="mt-6 max-w-xl text-base leading-8 text-white/70">Thực đơn cà phê, trà và bánh sáng chạy trên nền PHP MVC/MySQL, sẵn sàng để nâng cấp theo các bài thực hành COS340.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?= url('/menu') ?>" class="rounded-2xl bg-primary px-6 py-3 text-sm font-black text-white transition hover:bg-primary/90">Xem thực đơn</a>
                <a href="<?= url('/login') ?>" class="rounded-2xl border border-white/20 px-6 py-3 text-sm font-black text-white transition hover:bg-white/10">Đăng nhập</a>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-5 py-14 md:px-8">
    <div class="mb-8 max-w-2xl">
        <p class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-primary">Món nổi bật</p>
        <h2 class="text-3xl font-black tracking-tight md:text-4xl">Gợi ý hôm nay</h2>
        <p class="mt-3 text-sm leading-7 text-muted">Các sản phẩm mẫu được giữ gọn để bạn dễ mở rộng CRUD, API, giỏ hàng và xác thực trong các bước tiếp theo.</p>
    </div>
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($products as $product): require BASE_PATH . '/app/Views/partials/product-card.php'; endforeach; ?>
    </div>
</section>
