<div class="row">
    <div class="col-lg-6 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-capitalize"><?php echo $title; ?></h4>
                        <?php echo form_open_multipart('superadmin/announcement/'.$announcement->id.'/update'); ?>
                            <div class="form-group">
                                <label for="announcement_title">Judul <span class="text-danger">*</span></label>
                                <?php echo form_error('announcement_title'); ?>
                                <input type="text" name="announcement_title" class="form-control" id="announcement_title" aria-describedby="announcement_title" placeholder="Masukkan Judul Pengumuman" value="<?php echo set_value('announcement_title') ? set_value('announcement_title') : $announcement->title; ?>">
                            </div>

                             <div class="form-group">
                               <label for="announcement_content">Isi Pengumuman <span class="text-danger">*</span></label>
                               <?php echo form_error('announcement_content'); ?>
                               <textarea class="form-control ckeditor" name="announcement_content" id="ckeditor" rows="3"><?php echo set_value('announcement_content') ? set_value('announcement_content') : $announcement->content; ?></textarea>
                             </div>

                             <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
        </div>
    </div>
</div>