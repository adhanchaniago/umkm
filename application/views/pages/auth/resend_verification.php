<!-- login area start -->
   <div class="login-area login-s2">
       <div class="container">
           <div class="login-box ptb--100">
               <?php echo form_open('user/resend-verifications/verify'); ?>
                   <div class="login-form-head">
                       <h4><?php echo $title ?></h4>
                       <p>Kirim Kembali Verifikasi Email Anda</p>
                   </div>
                   <div class="login-form-body">
                    <?php echo $notification; ?>
                      <?php echo form_error('email_resend'); ?>
                       <div class="form-gp">
                           <label for="email_resend">email</label>
                           <input type="text" name="email_resend" id="email_resend" value="<?php echo set_value('email_resend'); ?>">
                           <i class="ti-email"></i>
                       </div>
                       <div class="submit-btn-area">
                           <button id="form_submit" type="submit">resend <i class="ti-arrow-right"></i></button>
                       </div>
                       <div class="form-footer text-center mt-5">
                           <p class="text-muted">Belum punya akun ? <a href="<?php echo base_url('user/register') ?>">Daftar</a></p>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!-- login area end -->