<div class="row">
    <!-- Primary table start -->
    <?php if(!empty($latest_announcement)): ?>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="media mb-5">
                    <div class="img-fluid mr-4">
                        <i class="fa fa-bullhorn fa-3x text-success"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mb-3 text-capitalize"><?php echo $latest_announcement->title; ?></h4> <?php echo $latest_announcement->content; ?>
                        <div class="pull-right">
                        <p>Waktu Pengumuman <?php echo $latest_announcement->created_at; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-12 mt-5 mb-5">
        <p id="notification" data-message="<?php echo $notification; ?>"></p>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo $title; ?></h4>
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
                                    <?php echo anchor('adminumkm/announcement/'.$announcement->slug.'/detail','<i class="fa fa-external-link"></i>',['class' => 'btn btn-info','data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Detail']); ?>
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