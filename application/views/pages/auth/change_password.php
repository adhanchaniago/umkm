<div class="row">
    <div class="col-lg-6 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-8 offset-md-2 mt-5">
                <div class="card">
                    <?php echo $notification; ?>
                    <div class="card-body">
                        <h4 class="header-title text-capitalize"><?php echo $title; ?></h4>
                        <?php echo form_open_multipart('user/change-password/store'); ?>
                            <div class="form-group">
                                <label for="recent_password">Password Saat Ini <span class="text-danger">*</span></label>
                                <?php echo form_error('recent_password'); ?>
                                <input type="text" name="recent_password" class="form-control" id="recent_password" aria-describedby="recent_password" placeholder="Password Saat Ini" value="<?php echo set_value('recent_password'); ?>">
                            </div>

                            <div class="form-group">
                                <label for="new_password">Password Baru <span class="text-danger">*</span></label>
                                <?php echo form_error('new_password'); ?>
                                <input type="text" name="new_password" class="form-control" id="new_password" aria-describedby="new_password" placeholder="Password Baru" value="<?php echo set_value('new_password'); ?>">
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <?php echo form_error('new_password_confirmation'); ?>
                                <input type="text" name="new_password_confirmation" class="form-control" id="new_password_confirmation" aria-describedby="new_password_confirmation" placeholder="Konfirmasi Password Baru" value="<?php echo set_value('new_password_confirmation'); ?>">
                            </div>
                             <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Ubah Password</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
        </div>
    </div>
</div>