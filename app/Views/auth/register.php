<?php $title = 'Đăng ký | Góc Lặng'; ?>
<section class="mx-auto grid min-h-[calc(100dvh-80px)] max-w-7xl items-center gap-8 px-5 py-12 md:grid-cols-[1fr_0.9fr] md:px-8">
    <div class="hidden overflow-hidden rounded-3xl bg-ink md:block">
        <div class="min-h-[600px] bg-cover bg-center p-10" style="background-image:linear-gradient(135deg, rgba(37,48,52,.95), rgba(37,48,52,.52)), url('<?= e(asset('assets/images/menu-hero.jpg')) ?>')">
            <div class="max-w-md text-white">
                <p class="mb-4 text-sm font-black uppercase tracking-[0.16em] text-primary">Tài khoản mới</p>
                <h1 class="text-5xl font-black leading-tight">Bắt đầu hành trình đặt món.</h1>
                <p class="mt-5 text-sm leading-7 text-white/70">Tài khoản giúp lưu thông tin đặt hàng và chuẩn bị cho các phần xác thực nâng cao sau này.</p>
            </div>
        </div>
    </div>
    <div class="rounded-3xl border border-line bg-white p-6 shadow-sm md:p-9">
        <h2 class="text-3xl font-black tracking-tight">Tạo tài khoản</h2>
        <p class="mt-2 text-sm leading-7 text-muted">Nhập thông tin cơ bản để đăng ký.</p>
        <form method="post" action="<?= url('/register') ?>" class="mt-7 grid gap-4">
            <?= csrf_field() ?>
            <label class="grid gap-2 text-sm font-bold">Họ tên
                <input name="full_name" class="rounded-2xl border-line" placeholder="Nguyễn Văn A" required>
            </label>
            <label class="grid gap-2 text-sm font-bold">Email
                <input name="email" type="email" class="rounded-2xl border-line" placeholder="email@gmail.com" required>
            </label>
            <label class="grid gap-2 text-sm font-bold">Mật khẩu
                <input name="password" type="password" class="rounded-2xl border-line" placeholder="Tối thiểu 6 ký tự" required>
            </label>
            <label class="grid gap-2 text-sm font-bold">Xác nhận mật khẩu
                <input name="confirm_password" type="password" class="rounded-2xl border-line" placeholder="Nhập lại mật khẩu" required>
            </label>
            <button class="mt-2 rounded-2xl bg-primary px-5 py-3.5 text-sm font-black text-white transition hover:bg-primary/90">Tạo tài khoản</button>
        </form>
        <p class="mt-5 text-center text-sm text-muted">Đã có tài khoản? <a href="<?= url('/login') ?>" class="font-black text-primary">Đăng nhập</a></p>
    </div>
</section>
