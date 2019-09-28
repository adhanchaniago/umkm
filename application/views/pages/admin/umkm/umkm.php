<div class="row">
	<!-- data informasi umkm -->
    <div class="col-lg-12 mt-5">

        <p id="notification" data-message="<?php echo $notification; ?>"></p>
        <div class="card">
            <div class="card-body">
            	<?php if(!empty($umkm)): ?>
                <div class="invoice-area">
                    <div class="invoice-head">
                        <div class="row">
                            <div class="iv-left col-6">
                                <span></span>
                            </div>
                            <div class="iv-right col-6 text-md-right">
                                <span><?php echo anchor('adminumkm/umkm/'.$umkm->umkm_id.'/edit', '<i class="fa fa-pencil"></i>', ['class' => 'btn btn-sm btn-warning','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'update']); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="invoice-address">
                                <h3><?php echo $umkm->name; ?></h3>
                                <h5><?php echo "$umkm->nama_depan $umkm->nama_belakang | $umkm->email"; ?></h5>
                                <p><?php echo $umkm->vision; ?></p>
                                <p><?php echo $umkm->mision; ?></p>
                                <p><?php echo $umkm->address; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <ul class="invoice-date">
                                <li><?php echo $umkm->bussines_type; ?> | #<?php echo $umkm->business_form; ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- table data produk -->
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead>
                                <tr class="text-capitalize">
                                    <th class="text-center">id</th>
                                    <th class="text-left">Nama Produk</th>
                                    <th>Gambar Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th style="min-width: 100px">Nama UMKM</th>
                                    <th style="min-width: 100px">Waktu Ditambahkan</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                        	<?php if(!empty($products)): ?>
                                <?php if($umkm->status == 'approved'): ?>
                                <?php echo anchor('adminumkm/product/'.$umkm->umkm_id.'/create', 'Tambah Produk <i class="fa fa-plus"></i>', ['class' => 'btn btn-large btn-primary mt-3 mb-5','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Tambah']); ?>
                                <?php 
                                    $no = 1;
                                    foreach($products as $product): 
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++?></td>
                                    <td class="text-left"><?php echo $product->product_name ?></td>
                                    <td>
                                        <img src="<?php echo base_url('uploads/produk/'.$product->image); ?>" width="50px" height="50px" />
                                    </td>
                                    <td><?php echo $product->cat_name; ?></td>
                                    <td><?php echo substr($product->descriptions,0 ,50); ?>..</td>
                                    <td><?php echo $product->umkm_name; ?></td>
                                    <td><?php echo $product->created_at; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <?php echo anchor('adminumkm/product/'.$product->id.'/edit', '<i class="fa fa-pencil"></i>', ['class' => 'btn btn-sm btn-warning','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'update']); ?>
                                        <?php echo anchor('adminumkm/product/'.$product->id.'/delete', '<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('anda yakin menghapus produk $product->product_name?')",'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'delete']); ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <td colspan="8">
                                        <div class="text-center">
                                        <h5 class="text-danger">Tunggu Umkm Anda Akan Di Cek Oleh Admin Untuk Di Approve</h5>
                                            <h6>Saat ini anda belum bisa menambahkan produk anda karena UMKM anda belum di approve oleh admin</h6>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="text-center">
                                        <?php if($umkm->status == 'approved'): ?>
                                        <h5 class="text-success"> SELAMAT! Umkm Anda Sudah Di Approve</h5>
                                        <h6>anda belum mempunyai produk yang ingin dipasarkan</h6>
                                        <h6>klik buat tambah dibawah ini untuk menambahkan produk anda</h6>
                                    	<?php echo anchor('adminumkm/product/'.$umkm->umkm_id.'/create', 'Tambah Produk <i class="fa fa-plus"></i>', ['class' => 'btn btn-large btn-primary mt-3 mb-5','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Tambah']); ?>
                                        <?php else: ?>
                                            <h5 class="text-danger">Tunggu Umkm Anda Akan Di Cek Oleh Admin Untuk Di Approve</h5>
                                            <h6>Saat ini anda belum bisa menambahkan produk anda karena UMKM anda belum di approve oleh admin</h6>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php else: ?>
                	<div class="text-center mb-5 mt-5">
	                	<h5 class="text-danger">anda belum mendaftarkan UMKM anda</h5>
	                	<h6>daftarkan segera agar anda bisa memasarkan produk anda</h6>
	                	<?php echo anchor('adminumkm/umkm/create', 'Daftarkan UMKM <i class="fa fa-plus"></i>', ['class' => 'btn btn-sm btn-primary mt-3 mb-5','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Daftar']); ?>
                	</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>