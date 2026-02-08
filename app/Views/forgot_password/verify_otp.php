<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5">
            <div class="glass-card">
                <div class="text-center mb-5">
                    <div class="mb-3">
                        <i class="fas fa-shield-alt text-primary fa-3x"></i>
                    </div>
                    <h2 class="font-weight-700">Verify OTP</h2>
                    <p class="text-muted">Enter the 5-digit verification code sent to your email.</p>
                </div>

                <form action="<?= base_url('forgot-password/validate-otp') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-4">
                        <label class="font-weight-600 text-center d-block">5-Digit Code</label>
                        <input type="text" name="otp" class="form-control text-center font-weight-700"
                            placeholder="00000" maxlength="5" style="font-size: 2rem; letter-spacing: 10px;" required
                            autofocus>
                    </div>
                    <button type="submit" class="btn btn-premium btn-block">Verify OTP</button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">Didn't receive the code? <a href="<?= base_url('forgot-password') ?>"
                            class="text-primary font-weight-600">Resend</a></p>
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
</style>
<?= $this->endSection() ?>