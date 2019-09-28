<div class="row">
    <div class="col-lg-6 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-capitalize"><?php echo $title; ?></h4>
                        <?php echo form_open('adminumkm/umkm/store'); ?>
                            <div class="form-group">
                                <label for="nama_umkm">Nama Umkm <span class="text-danger">*</span></label>
                                <input type="text" name="nama_umkm" class="form-control" id="nama_umkm" aria-describedby="nama_umkm" placeholder="Masukkan Nama Umkm Anda" value="<?php echo set_value('nama_umkm'); ?>">
                                <?php echo form_error('nama_umkm'); ?>
                            </div>

                            <div class="form-group">
                               <label for="jenis_usaha">Jenis Usaha <span class="text-danger">*</span></label>
                               <select class="form-control" name="jenis_usaha" id="jenis_usaha">
                                <option value="0">-- Pilih Jenis Usaha --</option>
                                <?php foreach($business_types as $business_type): ?>
                                <option 
                                    value="<?php echo $business_type->id ?>" 
                                    <?php echo set_select('jenis_usaha', $business_type->id); ?>>
                                    <?php echo $business_type->bussines_type ?>
                                </option>
                                 <?php endforeach; ?>
                               </select>
                               <?php echo form_error('jenis_usaha'); ?>
                            </div>

                            <div class="form-group">
                                <label for="bentuk_usaha">Bentuk Usaha <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bentuk_usaha" id="bentuk_usaha" aria-describedby="bentuk_usaha" placeholder="Bentuk Usaha Anda" value="<?php echo set_value('bentuk_usaha'); ?>">
                                <?php echo form_error('bentuk_usaha'); ?>
                            </div>

                            <div class="form-group">
                               <label for="visi_umkm">Visi <span class="text-danger">*</span></label>
                               <textarea class="form-control" name="visi_umkm" id="visi_umkm" rows="3"><?php echo set_value('visi_umkm'); ?></textarea>
                               <?php echo form_error('visi_umkm'); ?>
                             </div>

                             <div class="form-group">
                               <label for="misi_umkm">Misi <span class="text-danger">*</span></label>
                               <textarea class="form-control" name="misi_umkm" id="misi_umkm" rows="3"><?php echo set_value('misi_umkm'); ?></textarea>
                               <?php echo form_error('misi_umkm'); ?>
                             </div>

                             <div class="form-group">
                               <label for="alamat_umkm">Alamat <span class="text-danger">*</span></label>
                               <textarea class="form-control" name="alamat_umkm" id="alamat_umkm" rows="3"><?php echo set_value('alamat_umkm'); ?></textarea>
                               <?php echo form_error('alamat_umkm'); ?>
                             </div>

                             <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Daftar</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
        </div>
    </div>
</div>