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
                                <th>Judul</th>
                                <th>Tumbnail</th>
                                <th>Pemilik</th>
                                <th>Umkm</th>
                                <th>Tgl Dibuat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($data_blog)): ?>
                            <?php $no=1; foreach ($data_blog as $blog): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $blog->title ?></td>
                                <td>
                                    <img src="<?php echo base_url('uploads/blog/'.$blog->tumbnail); ?>" width="100px" height="100px">
                                </td>
                                <td><?php echo $blog->nama_depan.' '.$blog->nama_belakang; ?></td>
                                <td><?php echo $blog->umkm_name; ?></td>
                                <td><?php echo $blog->created_at; ?></td>
                                <td>
                                    <?php echo anchor('blog/'.$blog->slug.'/detail', 'lihat', ['class' => 'btn btn-sm btn-danger']); ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <h5 class="text-info mb-5 mt-5">Belum Ada Blog Yang Dibuat</h5>
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