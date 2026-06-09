<?php $title = 'Đăng Ký | Góc Lặng'; ?>
<main class="flex items-center justify-center px-4 py-14 bg-[#EDEAE5]">
    <div class="w-full max-w-[880px] grid md:grid-cols-[1.1fr_1fr] rounded-3xl shadow-2xl overflow-hidden border border-primary/10">
        <div class="hidden md:flex flex-col justify-between p-12 relative overflow-hidden bg-slate-custom min-h-[560px]">
            <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image:url('/assets/images/menu-hero.jpg')"></div>
            <div class="relative z-10">
                <span class="font-bold tracking-[0.28em] uppercase text-xs mb-5 block text-primary">Góc Lặng Café</span>
                <h2 class="font-serif font-black leading-tight mb-5 text-cream-custom text-5xl">Gia Nhập<br>Cộng Đồng</h2>
                <p class="text-cream-custom/70 leading-8 text-sm">Tạo tài khoản để đặt hàng và xem lịch sử đơn hàng.</p>
            </div>
        </div>
        <div class="p-8 md:p-10 bg-white">
            <h3 class="font-serif font-black text-3xl mb-1">Tạo Tài Khoản</h3>
            <p class="text-sm mb-6 text-teal-custom">Bắt đầu hành trình cùng chúng mình hôm nay.</p>
            <form method="post" action="<?= url('/register') ?>" class="grid gap-4">
                <?= csrf_field() ?>
                <input name="full_name" class="rounded-full border-primary/25" placeholder="Họ tên" required>
                <input name="email" type="email" class="rounded-full border-primary/25" placeholder="email@gmail.com" required>
                <input name="password" type="password" class="rounded-full border-primary/25" placeholder="Mật khẩu" required>
                <input name="confirm_password" type="password" class="rounded-full border-primary/25" placeholder="Xác nhận mật khẩu" required>
                <button class="w-full py-3.5 rounded-full font-bold text-sm uppercase tracking-widest text-white bg-primary">Tạo Tài Khoản</button>
            </form>
            <p class="text-center text-sm mt-5 text-teal-custom">Đã có tài khoản? <a href="<?= url('/login') ?>" class="font-bold text-primary">Đăng nhập</a></p>
        </div>
    </div>
</main>
