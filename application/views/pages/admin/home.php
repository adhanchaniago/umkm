<?php echo $notification; ?>
<!-- sales report area start -->
<div class="sales-report-area mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30">
                    <div class="icon"><i class="fa fa-gift"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Produk Anda</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h2><?php echo $total_product; ?> Produk</h2>
                        <span>
                        	<?php echo anchor('adminumkm/umkm', 'Lihat', ['class' => 'btn btn-sm btn-primary', 'target' => '_blank']); ?>
                        </span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h2>Produk Upload Terbaru</h2>
                        <br>
                        <?php if($lastest_submited_product != null): ?>
                        <div>
                        	<span><?php echo $lastest_submited_product->name; ?></span>
                        	<br>
                        	<img src="<?php echo base_url('uploads/produk/'.$lastest_submited_product->image); ?>" width="250px" height="250px" class="mt-2 mb-2"/>
                        	<br>
                        	<span><?php echo $lastest_submited_product->created_at; ?></span>
                        </div>
                        <?php else: ?>
                            <span>Anda Belum Mempunyai Produk</span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30">
                    <div class="icon"><i class="fa fa-columns"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Blog Anda</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h2><?php echo $total_blog; ?> Blog</h2>
                        <span>
                        	<?php echo anchor('adminumkm/blog', 'Lihat', ['class' => 'btn btn-sm btn-primary', 'target' => '_blank']); ?>
                        </span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h2>Blog Upload Terbaru</h2>
                        <br>
                        <?php if($lastest_submited_blog != null): ?>
                        <div>
                        	<span><?php echo $lastest_submited_blog->title; ?></span>
                        	<br>
                        	<img src="<?php echo base_url('uploads/blog/'.$lastest_submited_blog->tumbnail); ?>" width="250px" height="250px" class="mt-2 mb-2"/>
                        	<br>
                        	<span><?php echo $lastest_submited_blog->created_at; ?></span>
                        </div>
                        <?php else: ?>
                            <span>Anda Belum Membuat Blog</span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sales report area end -->