<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <?php echo form_open('/user/send-forget-password/'); ?>
                <div class="login-form-head">
                    <h4><?php echo $title; ?></h4>
                    <p>Hey! Kamu Melupakan Password mu ? Reset Sekarang</p>
                </div>
                <div class="login-form-body">
                    <?php echo $notification; ?>
                    <div class="form-gp">
                        <label for="email_forget_password">Email</label>
                        <?php echo form_error('email_forget_password'); ?>
                        <input name="email_forget_password" type="email" id="email_forget_password" value="<?php echo set_value('email_forget_password'); ?>">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="submit-btn-area mt-5">
                        <button id="form_submit" type="submit">Reset <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->