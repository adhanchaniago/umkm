<div class="row">
    <div class="col-lg-6 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-capitalize"><?php echo $title; ?></h4>
                        <?php echo form_open_multipart('adminumkm/blog/store'); ?>
                            <div class="form-group">
                                <label for="blog_title">Judul <span class="text-danger">*</span></label>
                                <input type="text" name="blog_title" class="form-control" id="blog_title" aria-describedby="blog_title" placeholder="Masukkan Judul Blog" value="<?php echo set_value('blog_title'); ?>">
                                <?php echo form_error('blog_title'); ?>
                            </div>

                            <div class="form-group">
                                <label for="blog_tumbnail">Gambar <span class="text-danger">*</span></label>
                                <input type="file" name="blog_tumbnail" class="form-control" id="blog_tumbnail" aria-describedby="blog_tumbnail" accept=".jpg,.jpeg,.png" required>
                            </div>

                             <div class="form-group">
                               <label for="blog_content">Konten <span class="text-danger">*</span></label>
                               <textarea class="form-control ckeditor" name="blog_content" id="ckeditor" rows="3"><?php echo set_value('blog_content'); ?></textarea>
                               <?php echo form_error('blog_content'); ?>
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