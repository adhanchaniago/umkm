
<!-- sales report area start -->
             <div class="sales-report-area mt-5 mb-5">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="single-report mb-xs-30">
                             <div class="s-report-inner pr--20 pt--30 mb-3">
                                 <div class="icon"><i class="fa fa-registered"></i></div>
                                 <div class="s-report-title d-flex justify-content-between">
                                     <h4 class="header-title mb-0">Umkm Teregistrasi</h4>
                                 </div>
                                 <div class="d-flex justify-content-between pb-2">
                                     <h2><?php echo $total_registered_umkm ?> UMKM</h2>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="single-report mb-xs-30">
                             <div class="s-report-inner pr--20 pt--30 mb-3">
                                 <div class="icon bg-warning"><i class="fa fa-spinner"></i></div>
                                 <div class="s-report-title d-flex justify-content-between">
                                     <h4 class="header-title mb-0">Umkm Belum Terverifikasi</h4>
                                 </div>
                                 <div class="d-flex justify-content-between pb-2">
                                     <h2><?php echo $total_not_approved_umkm ?> UMKM</h2>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="single-report">
                             <div class="s-report-inner pr--20 pt--30 mb-3">
                                 <div class="icon bg-success"><i class="fa fa-check-circle-o"></i></div>
                                 <div class="s-report-title d-flex justify-content-between">
                                     <h4 class="header-title mb-0">Umkm Terverifikasi</h4>
                                 </div>
                                 <div class="d-flex justify-content-between pb-2">
                                     <h2><?php echo $total_approved_umkm ?> UMKM    </h2>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-md-6 mt-4">
                         <div class="single-report mb-xs-30">
                             <div class="s-report-inner pr--20 pt--30">
                                 <div class="icon"><i class="fa fa-gift"></i></div>
                                 <div class="s-report-title d-flex justify-content-between">
                                     <h4 class="header-title mb-0">Total Produk</h4>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                     <h2><?php echo $total_product; ?> Produk</h2>
                                     <span>
                                        <?php echo anchor('superadmin/product', 'Lihat', ['class' => 'btn btn-sm btn-primary', 'target' => '_blank']); ?>
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
                                        <p>author : <?php echo $lastest_submited_product->nama_depan.' '.$lastest_submited_product->nama_belakang; ?></p>
                                        <p>email : <?php echo $lastest_submited_product->email; ?></p>
                                        <p>umkm  : <?php echo $lastest_submited_product->umkm_name; ?></p>
                                        <p><?php echo $lastest_submited_product->created_at; ?></p>
                                     </div>
                                     <?php else: ?>
                                         <span>Belum Ada Produk Yang Terdaftar</span>
                                     <?php endif ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 mt-4">
                         <div class="single-report mb-xs-30">
                             <div class="s-report-inner pr--20 pt--30">
                                 <div class="icon"><i class="fa fa-columns"></i></div>
                                 <div class="s-report-title d-flex justify-content-between">
                                     <h4 class="header-title mb-0">Total Blog</h4>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                     <h2><?php echo $total_blog; ?> Blog</h2>
                                     <span>
                                        <?php echo anchor('superadmin/blog', 'Lihat', ['class' => 'btn btn-sm btn-primary', 'target' => '_blank']); ?>
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
                                        <p>author : <?php echo $lastest_submited_blog->nama_depan.' '.$lastest_submited_blog->nama_belakang; ?></p>
                                        <p>email : <?php echo $lastest_submited_blog->email; ?></p>
                                        <p>umkm  : <?php echo $lastest_submited_blog->umkm_name; ?></p>
                                        <p><?php echo $lastest_submited_blog->created_at; ?></p>
                                     </div>
                                     <?php else: ?>
                                         <span>Belum Ada Blog Yang Dibuat</span>
                                     <?php endif ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- sales report area end -->