<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5">
            <div class="glass-card">
                <div class="text-center mb-5">
                    <div class="mb-3">
                        <i class="fas fa-key text-primary fa-3x"></i>
                    </div>
                    <h2 class="font-weight-700">Forgot Password</h2>
                    <p class="text-muted">Enter your email address and we will send you a 5-digit OTP to reset your
                        password.</p>
                </div>

                <form action="<?= base_url('forgot-password/send-otp') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-4">
                        <label class="font-weight-600">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-right-0"><i
                                        class="far fa-envelope text-muted"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control border-left-0"
                                placeholder="name@example.com" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-premium btn-block">Send OTP</button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">Remember your password? <a href="<?= base_url('login') ?>"
                            class="text-primary font-weight-600">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .font-weight-700 {
        font-weight: 700;
    }

    .font-weight-600 {
        font-weight: 600;
    }

    .input-group-text {
        border-radius: 8px 0 0 8px;
        border-color: #ddd;
    }
</style>
<?= $this->endSection() ?>