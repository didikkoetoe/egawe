<?= $this->extend('layout/default_auth'); ?>
<?= $this->section('auth'); ?>
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register</h4>
                        <div class="card-header-action">
                            <a href="<?= site_url('login'); ?>" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Login</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('Auth/create'); ?>" method="POST" class="needs-validation" novalidate="">
                            <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input id="full_name" type="text" class="form-control <?= ($validation->hasError('full_name')) ? 'is-invalid' : '' ; ?>" name="full_name" value="<?= old('full_name'); ?>" autofocus required>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('full_name')) ? $validation->getError('full_name') : 'Nama lengkap harus di isi'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ; ?>" name="email" required autofocus value="<?= old('email'); ?>" placeholder="Contoh: abc@email.com">
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('email')) ? $validation->getError('email') : 'Email harus di isi'; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength <?= ($validation->hasError('password')) ? 'is-invalid' : '' ; ?>" data-indicator="pwindicator" name="password" required value="<?= old('password'); ?>" placeholder="Minimal 8 karakter">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('password')) ? $validation->getError('password') : 'Password harus di isi'; ?>
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Konfirmasi Password</label>
                                    <input id="password2" type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '' ; ?>" name="password2" value="<?= old('password2'); ?>">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('password2')) ? $validation->getError('password2') : 'Konfirmasi password harus di isi'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                    <label class="custom-control-label" for="agree">Saya setuju dengan syarat dan ketentuan yang berlaku</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; DidikPrabowo 2021
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>