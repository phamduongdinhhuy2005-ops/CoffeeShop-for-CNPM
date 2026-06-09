<?php $title = 'Đăng nhập | Góc Lặng'; ?>
<section class="mx-auto grid min-h-[calc(100dvh-80px)] max-w-7xl items-center gap-8 px-5 py-12 md:grid-cols-[1fr_0.9fr] md:px-8">
    <div class="hidden overflow-hidden rounded-3xl bg-ink md:block">
        <div class="min-h-[560px] bg-cover bg-center p-10" style="background-image:linear-gradient(135deg, rgba(37,48,52,.95), rgba(37,48,52,.52)), url('<?= e(asset('assets/images/menu-hero.jpg')) ?>')">
            <div class="max-w-md text-white">
                <p class="mb-4 text-sm font-black uppercase tracking-[0.16em] text-primary">Góc Lặng Café</p>
                <h1 class="text-5xl font-black leading-tight">Chào mừng trở lại.</h1>
                <p class="mt-5 text-sm leading-7 text-white/70">Đăng nhập để quản lý tài khoản, xem lịch sử đơn hàng hoặc vào khu vực quản trị.</p>
            </div>
        </div>
    </div>
    <div class="rounded-3xl border border-line bg-white p-6 shadow-sm md:p-9">
        <h2 class="text-3xl font-black tracking-tight">Đăng nhập</h2>
        <p class="mt-2 text-sm leading-7 text-muted">Sử dụng tài khoản đã tạo trong hệ thống.</p>
        <form method="post" action="<?= url('/login') ?>" class="mt-7 grid gap-4">
            <?= csrf_field() ?>
            <label class="grid gap-2 text-sm font-bold">Email
                <input name="email" type="email" class="rounded-2xl border-line" placeholder="admin@goclang.vn" required>
            </label>
            <label class="grid gap-2 text-sm font-bold">Mật khẩu
                <input name="password" type="password" class="rounded-2xl border-line" placeholder="Nhập mật khẩu" required>
            </label>
            <button class="mt-2 rounded-2xl bg-ink px-5 py-3.5 text-sm font-black text-white transition hover:bg-primary">Đăng nhập</button>
        </form>
        <p class="mt-5 text-center text-sm text-muted">Chưa có tài khoản? <a href="<?= url('/register') ?>" class="font-black text-primary">Đăng ký ngay</a></p>
    </div>
</section>
