<?php $title = 'Góc Lặng - Nơi Dừng Chân Giữa Ngày'; ?>
<section class="relative min-h-[78vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center scale-105" style="background-image:url('/assets/images/menu-hero.jpg')"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-black/70"></div>
    <div class="relative max-w-7xl mx-auto px-6 md:px-20 py-24 text-white">
        <p class="uppercase tracking-[.35em] text-primary font-bold text-xs mb-5">Góc Lặng Café</p>
        <h1 class="font-serif text-5xl md:text-7xl font-black leading-tight max-w-3xl">Nơi Dừng Chân Giữa Ngày</h1>
        <p class="mt-6 max-w-xl text-cream-custom/80 leading-8">Thực đơn cà phê, trà và bánh sáng được giữ lại từ UI cũ, nay chạy bằng PHP MVC và MySQL trên Laragon.</p>
        <a href="<?= url('/menu') ?>" class="inline-flex mt-8 rounded-full bg-primary px-8 py-4 text-sm font-bold uppercase tracking-widest">Xem Thực Đơn</a>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 md:px-20 py-16">
    <div class="flex items-end justify-between mb-8">
        <div>
            <p class="uppercase tracking-[.25em] text-primary font-bold text-xs mb-2">Menu nổi bật</p>
            <h2 class="font-serif text-4xl font-bold">Hương vị hôm nay</h2>
        </div>
        <a href="<?= url('/menu') ?>" class="hidden md:inline text-primary font-bold">Xem tất cả</a>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($products as $product): require BASE_PATH . '/app/Views/partials/product-card.php'; endforeach; ?>
    </div>
</section>
