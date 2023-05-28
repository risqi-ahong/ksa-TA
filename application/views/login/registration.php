<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url('assets/Login/'); ?>images/bg-cat2.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Registration Account
            </span>

            <?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="">

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="User Name" value="<?= set_value('username'); ?>">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    <input class="input100" type="email" name="email" placeholder="Email" value="<?= set_value('email')  ?>">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password1" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Confirm password">
                    <input class="input100" type="password" name="password2" placeholder="Confirm Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn" name="registration">
                        Registration
                    </button>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <a href="<?= base_url('login/index') ?>">Sign-in account!</a>
                </div>

            </form>
        </div>
    </div>
</div>