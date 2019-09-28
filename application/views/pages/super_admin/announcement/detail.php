<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div class="media mb-5">
                <div class="img-fluid mr-4">
                    <i class="fa fa-bullhorn fa-3x text-success"></i>
                </div>
                <div class="media-body mt-5 mb-4">
                    <h4 class="mb-3 text-capitalize"><?php echo $announcement->title; ?></h4> <?php echo $announcement->content; ?>
                    <div class="pull-right">
                        <p>Waktu Pengumuman <?php echo $latest_announcement->created_at; ?></p>
                    </div>
                </div>
                <?php echo anchor('superadmin/announcement', '<i class="fa fa-arrow-circle-left"></i> kembali', ['class' => 'btn btn-sm btn-warning']); ?>
            </div>
        </div>
    </div>
</div>