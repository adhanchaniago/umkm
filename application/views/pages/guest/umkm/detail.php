<section class="single_blog_wthree py-5">
    <div class="container">
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span><?php echo substr($umkm->name,0,1); ?></span><?php echo substr($umkm->name,1); ?></h5>
        <div class="single-page-agile-info">
            <!-- /movie-browse-agile -->
            <div class="row show-top-grids">
                <div class="col-md-7 single-left">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?php echo $umkm->name; ?></h5>
                            VISI
                            <p class="card-text"><?php echo $umkm->vision ?></p>
                            MISI
                            <p class="card-text"><?php echo $umkm->mision ?></p>
                            ALAMAT
                            <p class="card-text"><?php echo $umkm->address ?></p>
                            <p class="card-text">
                                <strong>
                                    <h6 class="text-muted">Di Daftarkan Pada <?php echo $umkm->created_at; ?> Oleh <?php echo $owner ?></h6>
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="song-grid-right">
                    </div>
                </div>
                <div class="col-md-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">
                            Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Proin
                            eget tortor risus.Curabitur non nulla sit.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product sell by umkm -->
<div class="section singlep_btm pb-5 mt-5">
    <div class="container">
        <div class="new_arrivals">
            <h4 class="rad-txt text-capitalize">Produk - produk yang dijual oleh umkm <?php echo $umkm->name; ?>
            </h4>
            <!-- card group 2 -->
            <div class="card-group my-5">
                <!-- card -->
                <?php if(count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-3 col-sm-6 p-0">
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url('uploads/produk/'.$product->image) ?>" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo base_url('product/'.$product->id.'/detail') ?>" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize"><?php echo $product->product_name; ?></h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">$20.00</p>
                                        <p class="line-through">$25.00</p>
                                    </div>
                                </div>
                                <!-- card footer -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h4 class="text-warning"><?php echo $umkm->name ?> belum mempunyai produk</h4>
                <?php endif; ?>
                <!-- //card -->
            </div>
            <!-- //card group -->
            <!--//new_arrivals-->
        </div>
    </div>
</div>
<!-- end product sell by umkm -->

<!-- blog created by umkm -->
<div class="section singlep_btm pb-5">
    <div class="container">
        <div class="new_arrivals">
            <h4 class="rad-txt text-capitalize">blog yang dibuat oleh umkm <?php echo $umkm->name; ?>
            </h4>
            <!-- card group 2 -->
            <div class="card-group my-5">
                <!-- card -->
                <?php if(count($blogs) > 0): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <div class="col-lg-3 col-sm-6 p-0">
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url('uploads/blog/'.$blog->tumbnail) ?>" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo base_url('blog/'.$blog->id.'/detail') ?>" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize"><?php echo $blog->title; ?></h5>
                                </div>
                                <!-- card footer -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h4 class="text-warning"><?php echo $umkm->name ?> belum membuat blog</h4>
                <?php endif; ?>
                <!-- //card -->
            </div>
            <!-- //card group -->
            <!--//new_arrivals-->
        </div>
    </div>
</div>
<!-- end blog created by umkm -->
</section>
