<!-- login area start -->
   <div class="login-area login-s2">
       <div class="container">
           <div class="login-box ptb--100">
               <?php echo form_open('user/login/verify'); ?>
                   <div class="login-form-head">
                       <h4><?php echo $title ?></h4>
                       <p>Selamat Datang di Rumah Kreatif Mawar, Selamat Bergabung Dengan Kami</p>
                   </div>
                   <div class="login-form-body">
                    <?php echo $notification; ?>
                      <?php echo form_error('username_or_email'); ?>
                       <div class="form-gp">
                           <label for="username_or_email">username atau email</label>
                           <input type="text" name="username_or_email" id="username_or_email" value="<?php echo set_value('username_or_email'); ?>">
                           <i class="ti-email"></i>
                       </div>
                       <?php echo form_error('password'); ?>
                       <div class="form-gp">
                           <label for="password">Password</label>
                           <input type="password" name="password" id="password">
                           <i class="ti-lock"></i>
                       </div>
                       <div class="row mb-4 rmber-area">
                           <div class="col-6 text-right">
                               <a href="<?php echo base_url('user/forget-password'); ?>">Forgot Password?</a>
                           </div>
                       </div>
                       <div class="submit-btn-area">
                           <button id="form_submit" type="submit">login <i class="ti-arrow-right"></i></button>
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