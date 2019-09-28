<div class="row">
    <!-- Primary table start -->
    <div class="col-12 mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo $title; ?></h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Jenis Produk</th>
                                <th>Umkm</th>
                                <th>Pemilik</th>
                                <th>Tgl Ditambahkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($data_product)): ?>
                            <?php $no=1; foreach ($data_product as $product): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $product->product_name ?></td>
                                <td>
                                    <img src="<?php echo base_url('uploads/produk/'.$product->image); ?>" width="100px" height="100px">
                                </td>
                                <td><?php echo $product->cat_name; ?></td>
                                <td><?php echo $product->umkm_name; ?></td>
                                <td><?php echo $product->nama_depan.' '.$product->nama_belakang; ?></td>
                                <td><?php echo $product->created_at; ?></td>
                                <td>
                                    <?php echo anchor('product/'.$product->id.'/detail', 'lihat', ['class' => 'btn btn-sm btn-danger', 'target' => '_blank']); ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <h5 class="text-info mb-5 mt-5">Belum Ada Produk Yang Dibuat</h5>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Primary table end -->
</div>