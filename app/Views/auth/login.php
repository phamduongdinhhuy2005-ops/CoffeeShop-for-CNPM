<?php $title = 'Đăng Nhập | Góc Lặng'; ?>
<main class="flex items-center justify-center px-4 py-14 bg-[#EDEAE5]">
    <div class="w-full max-w-[880px] grid md:grid-cols-[1.1fr_1fr] rounded-3xl shadow-2xl overflow-hidden border border-primary/10">
        <div class="hidden md:flex flex-col justify-between p-12 relative overflow-hidden bg-slate-custom min-h-[520px]">
            <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image:url('<?= e(asset('assets/images/menu-hero.jpg')) ?>')"></div>
            <div class="relative z-10">
                <span class="font-bold tracking-[0.28em] uppercase text-xs mb-5 block text-primary">Góc Lặng Café</span>
                <h2 class="font-serif font-black leading-tight mb-5 text-cream-custom text-5xl">Chào<br>Trở Lại</h2>
                <p class="text-cream-custom/70 leading-8 text-sm">Đăng nhập để tiếp tục hành trình của bạn cùng Góc Lặng.</p>
            </div>
        </div>
        <div class="p-8 md:p-10 bg-white">
            <h3 class="font-serif font-black text-3xl mb-1">Đăng Nhập</h3>
            <p class="text-sm mb-7 text-teal-custom">Nhập thông tin tài khoản của bạn bên dưới.</p>
            <form method="post" action="<?= url('/login') ?>" class="grid gap-4">
                <?= csrf_field() ?>
                <input name="email" type="email" class="rounded-full border-primary/25" placeholder="email@gmail.com" required>
                <input name="password" type="password" class="rounded-full border-primary/25" placeholder="Mật khẩu" required>
                <button class="w-full py-3.5 rounded-full font-bold text-sm uppercase tracking-widest text-white bg-slate-custom">Đăng Nhập</button>
            </form>
            <p class="text-center text-sm mt-5 text-teal-custom">Chưa có tài khoản? <a href="<?= url('/register') ?>" class="font-bold text-primary">Đăng ký ngay</a></p>
        </div>
    </div>
</main>
