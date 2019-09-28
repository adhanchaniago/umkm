<div class="row">
    <!-- Primary table start -->
    <div class="col-12 mt-5">
      <p id="notification" data-message="<?php echo $notification; ?>"></p>
        <div class="card">
            <div class="card-body">
              <div class="text-right">
                <?php if($umkm_status == 'approved'): ?>
                <?php echo anchor('/adminumkm/blog/create', 'Buat Blog <i class="fa fa-plus"></i>', ['class' => 'btn btn-sm btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Buat Blog']); ?>
                <?php endif; ?>
              </div>
                <h4 class="header-title">Data <?php echo $title; ?></h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Tumbnail</th>
                                <th>UMKM</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($blogs)): ?>
                            <?php $no=1; foreach($blogs as $blog): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $blog->title; ?></td>
                                <td>
                                  <img src="<?php echo base_url('uploads/blog/'.$blog->tumbnail); ?>" width="50px" height="50px" />
                                </td>
                                <td><?php echo $blog->umkm_name;  ?></td>
                                <td><?php echo $blog->created_at;  ?></td>
                                <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                  <?php echo anchor('adminumkm/blog/'.$blog->id.'/edit', '<i class="fa fa-pencil"></i>', ['class' => 'btn btn-sm btn-warning','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'update']); ?>
                                  <?php echo anchor('adminumkm/blog/'.$blog->id.'/delete', '<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('anda yakin menghapus blog $blog->title?')",'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'delete']); ?>
                                  </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="7">
                                <?php if($umkm_status == 'approved'): ?>
                                  <div class="text-center mt-5 mb-5">
                                    <h5 class="text-success">Selamat Umkm Anda Telah Di Approve</h5>
                                    <h5>untuk membuat blog silahkan klik buat blog di atas</h5>
                                  </div>
                                <?php else: ?>
                                  <div class="text-center mt-5 mb-5">
                                    <h5 class="text-danger">Tunggu Umkm Anda Akan Di Cek Oleh Admin Untuk Di Approve</h5>
                                    <h6>Saat ini anda belum bisa menambahkan blog anda karena UMKM anda belum di approve oleh admin</h6>
                                  </div>
                                <?php endif; ?>
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