<section class="blog_wthree py-5">
    <p id="notification" data-message="<?php echo $notification; ?>"></p>
    <div class="container">
        <!-- blog row -->
        <div class="row card-columns py-lg-5">
        <?php if (!empty($data_umkm)): ?>
        <?php foreach($data_umkm as $umkm): ?>
            <div class="col-md-4 p-0 ml-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title blg_w3ls text-center">
                            <a href="<?php echo base_url('umkm/'.$umkm->id.'/detail'); ?>"><?php echo $umkm->name; ?></a>
                        </h5>
                        <span>VISI</span>
                        <p class="card-text"><?php echo substr($umkm->vision,0,50); ?>...</p>
                        <span>MISI</span>
                        <p class="card-text"><?php echo substr($umkm->mision,0,50); ?>...</p>
                        <div class="text-center">
                            <?php echo anchor('umkm/'.$umkm->id.'/detail', 'Detail', ['class' => 'btn btn-large btn-info']); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php else: ?>
            <p class="text-capitalize">belum ada umkm yang terdaftar</p>
        <?php endif ?>
        </div>
        <?php 
            echo $this->pagination->create_links();
        ?>
    </div>
</section>
<!-- //blog row -->