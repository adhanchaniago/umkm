<div class="row">
    <div class="col-lg-6 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-capitalize"><?php echo $title; ?></h4>
                        <?php echo form_open_multipart('adminumkm/product/'.$umkm_id.'/store'); ?>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" aria-describedby="nama_produk" placeholder="Masukkan Nama Produk Anda" value="<?php echo set_value('nama_produk'); ?>">
                                <?php echo form_error('nama_produk'); ?>
                            </div>

                            <div class="form-group">
                               <label for="kategori_produk">Kategori Produk <span class="text-danger">*</span></label>
                               <select class="form-control" name="kategori_produk" id="kategori_produk">
                                <option value="0">-- Pilih Kategori Produk --</option>
                                <?php foreach($product_categories as $product_category): ?>
                                <option 
                                    value="<?php echo $product_category->id ?>" 
                                    <?php echo set_select('kategori_produk', $product_category->id); ?>>
                                    <?php echo $product_category->category_name ?>
                                </option>
                                 <?php endforeach; ?>
                               </select>
                               <?php echo form_error('kategori_produk'); ?>
                            </div>

                            <div class="form-group">
                               <label for="deskripsi_produk">Deskripsi Produk <span class="text-danger">*</span></label>
                               <textarea class="form-control ckeditor" name="deskripsi_produk" id="ckeditor" rows="3"><?php echo set_value('deskripsi_produk'); ?></textarea>
                               <?php echo form_error('deskripsi_produk'); ?>
                             </div>

                             <div class="form-group">
                               <label for="gambar_produk">Gambar Produk <span class="text-danger">*</span></label>
                               <input type="file" name="gambar_produk" class="form-control" id="gambar_produk" aria-describedby="gambar_produk" value="<?php echo set_value('gambar_produk'); ?>" required>
                                <?php echo form_error('gambar_produk'); ?>
                             </div>

                             <div class="form-group">
                                <label for="link_produk">Link Pembelian Produk</label>
                                <input type="text" name="link_produk" class="form-control" id="link_produk" aria-describedby="link_produk" placeholder="Masukkan Link Produk Anda" value="<?php echo set_value('link_produk'); ?>">
                                <?php echo form_error('link_produk'); ?>
                            </div>

                             <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Tambah</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
        </div>
    </div>
</div>