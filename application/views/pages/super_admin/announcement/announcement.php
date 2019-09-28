<div class="row">
    <!-- Primary table start -->
    <div class="col-12 mt-5 mb-5">
        <p id="notification" data-message="<?php echo $notification; ?>"></p>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo $title; ?></h4>
                <div class="pull-right">
                    <?php echo anchor('superadmin/announcement/create', 'Buat Pengumuman <i class="fa fa-plus"></i>', ['class' => 'btn btn-sm btn-primary mb-4']); ?>
                </div>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal Dibuat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($announcements)): ?>
                            <?php $no=1; foreach ($announcements as $announcement): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $announcement->title ?></td>
                                <td><?php echo $announcement->content; ?></td>
                                <td><?php echo $announcement->created_at; ?></td>
                                <td>
                                    <div class="btn-group">
                                    <?php echo anchor('superadmin/announcement/'.$announcement->slug.'/detail','<i class="fa fa-external-link"></i>',['class' => 'btn btn-info','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Detail']); ?>
                                    <?php echo anchor('superadmin/announcement/'.$announcement->id.'/edit','<i class="fa fa-edit"></i>',['class' => 'btn btn-warning','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Edit']); ?>
                                    <?php echo anchor('superadmin/announcement/'.$announcement->id.'/delete','<i class="fa fa-trash-o"></i>',['class' => 'btn btn-danger','onclick' => "return confirm('anda yakin menghapus pengumuman $announcement->title?')",'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete']); ?>
                                    <i class="fa fa-arrow-back"></i>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <h5 class="text-info mb-5 mt-5">Belum Ada Pengumuman Yang di Buat</h5>
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