<section class="single_blog_wthree py-5">
    <div class="container">
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span><?php echo substr($blog->title,0,1); ?></span><?php echo substr($blog->title,1); ?></h5>
        <div class="single-page-agile-info">
            <!-- /movie-browse-agile -->
            <div class="row show-top-grids">
                <div class="col-md-8 offset-md-2 single-left">
                    <div class="card">
                        <div class="card-body" style="text-align:justify;">
                            <h5 class="card-title font-weight-bold"><?php echo $blog->title; ?></h5>
                            <img class="card-img-bottom" src="<?php echo base_url('uploads/blog/'.$blog->tumbnail); ?>" alt="Card image cap" heigth="150px">
                            <p class="card-text" ><?php echo $blog->content ?></p>
                            <p class="card-text">
                                <strong>
                                    <h6 class="text-muted">Di Publikasikan Pada <?php echo $blog->created_at; ?> Oleh Umkm <?php echo $umkm_name; ?></h6>
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="song-grid-right">
                    </div>
                </div>
                    <!-- Side Widget -->
                <!-- <div class="col-md-4">
                    <div class="card mb-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">
                            Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Proin
                            eget tortor risus.Curabitur non nulla sit.
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>