<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <?php echo form_open('/user/send-reset-password/'); ?>
                <div class="login-form-head">
                    <h4><?php echo $title; ?></h4>
                    <p>Silahkan Ubah Passwordmu</p>
                </div>
                <div class="login-form-body">
                    <?php echo $notification; ?>
                    <div class="form-gp">
                        <label for="reset_password">Password Baru</label>
                        <?php echo form_error('reset_password'); ?>
                        <input name="reset_password" type="password" id="reset_password" value="<?php echo set_value('reset_password'); ?>">
                        <i class="ti-lock"></i>
                    </div>

                    <div class="form-gp">
                        <label for="reset_password_confirmation">Konfirmasi Password Baru</label>
                        <?php echo form_error('reset_password_confirmation'); ?>
                        <input name="reset_password_confirmation" type="password" id="reset_password_confirmation" value="<?php echo set_value('reset_password_confirmation'); ?>">
                        <i class="ti-lock"></i>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                    <div class="submit-btn-area mt-5">
                        <button id="form_submit" type="submit">Ubah Password <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->