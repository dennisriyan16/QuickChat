<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5">
            <div class="glass-card">
                <div class="text-center mb-5">
                    <div class="mb-3">
                        <i class="fas fa-comments text-primary fa-3x"></i>
                    </div>
                    <h2 class="font-weight-700">QuickChat</h2>
                    <p class="text-muted">Welcome back! Please login to your account.</p>
                </div>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
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
                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="font-weight-600">Password</label>
                            <a href="<?= base_url('forgot-password') ?>" class="small text-primary">Forgot password?</a>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-right-0"><i
                                        class="fas fa-lock text-muted"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control border-left-0 border-right-0"
                                placeholder="••••••••" required>
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent border-left-0">
                                    <i class="fas fa-eye text-muted password-toggle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-premium btn-block">Sign In</button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">Don't have an account? <a href="<?= base_url('signup') ?>"
                            class="text-primary font-weight-600">Create one</a></p>
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