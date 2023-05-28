<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url('assets/Login/'); ?>images/bg-cat2.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Account Login
            </span>

            <div class="container" style="text-align: center;">
                <?= $this->session->flashdata('massage'); ?>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            </div>

            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="<?= base_url('login'); ?>">

                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn" name="login" type="submit">
                        Login
                    </button>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <a href="<?= base_url('login/'); ?>registration">Create new account!</a>
                </div>

            </form>
        </div>
    </div>
</div>