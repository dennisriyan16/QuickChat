<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-8 text-center">
            <div class="glass-card py-5">
                <div class="mb-4">
                    <div class="d-inline-block bg-primary p-3 rounded-circle shadow-lg mb-3">
                        <i class="fas fa-rocket text-white fa-3x"></i>
                    </div>
                </div>
                <h1 class="display-4 font-weight-700 mb-3">Welcome, <?= session()->get('username') ?>!</h1>
                <p class="lead mb-5 text-muted">Your modern real-time communication hub is ready. Start connecting with
                    your friends instantly.</p>

                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="<?= base_url('chat') ?>" class="btn btn-premium btn-lg px-5 mx-2 mb-3 mb-md-0">
                        <i class="fas fa-comments mr-2"></i> Enter Chat Room
                    </a>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger btn-lg px-5 mx-2">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </div>

            <div class="mt-5 text-white-50">
                <small>&copy; 2024 QuickChat CI4. All rights reserved.</small>
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

    .display-4 {
        font-size: 3rem;
    }

    @media (max-width: 576px) {
        .display-4 {
            font-size: 2rem;
        }
    }
</style>
<?= $this->endSection() ?>