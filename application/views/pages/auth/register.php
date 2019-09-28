<!-- login area start -->
   <div class="login-area login-s2">
       <div class="container">
           <div class="login-box ptb--100">
               <?php echo form_open('user/register/send'); ?>
                   <div class="login-form-head">
                       <h4><?php echo $title ?></h4>
                       <p>Selamat Datang di Rumah Kreatif Mawar, Selamat Bergabung Dengan Kami</p>
                   </div>
                   <div class="login-form-body">
                      <?php echo form_error('nama_depan'); ?>
                       <div class="form-gp">
                           <label for="nama_depan">Nama Depan</label>
                           <input type="text" name="nama_depan" id="nama_depan" value="<?php echo set_value('nama_depan') ?>">
                           <i class="ti-user"></i>
                       </div>
                      <?php echo form_error('nama_belakang'); ?>
                       <div class="form-gp">
                           <label for="nama_belakang">Nama Belakang</label>
                           <input type="text" name="nama_belakang" id="nama_belakang" value="<?php echo set_value('nama_belakang') ?>">
                           <i class="ti-user"></i>
                       </div>
                      <?php echo form_error('username'); ?>
                       <div class="form-gp">
                           <label for="username">Username</label>
                           <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
                           <i class="ti-user"></i>
                       </div>
                      <?php echo form_error('email'); ?>
                       <div class="form-gp">
                           <label for="email">Alamat Email</label>
                           <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>">
                           <i class="ti-email"></i>
                       </div>
                      <?php echo form_error('password'); ?>
                       <div class="form-gp">
                           <label for="password">Password</label>
                           <input type="password" name="password" id="password">
                           <i class="ti-lock"></i>
                       </div>
                       <?php echo form_error('konfirmasi_password'); ?>
                       <div class="form-gp">
                           <label for="konfirmasi_password">Konfirmasi Password</label>
                           <input type="password" name="konfirmasi_password" id="konfirmasi_password">
                           <i class="ti-lock"></i>
                       </div>
                       <div class="submit-btn-area">
                           <button id="form_submit" type="submit">Daftar <i class="ti-arrow-right"></i></button>
                          <!--  <div class="login-other row mt-4">
                               <div class="col-6">
                                   <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                               </div>
                               <div class="col-6">
                                   <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                               </div>
                           </div> -->
                       </div>
                       <div class="form-footer text-center mt-5">
                           <p class="text-muted">Sudah punya akun ? <a href="<?php echo base_url('user/login') ?>">Masuk</a></p>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!-- login area end