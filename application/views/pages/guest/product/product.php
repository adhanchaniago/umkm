<!-- Shop -->
<div class="innerf-pages section">
    <div class="fh-container mx-auto">
        <div class="row my-lg-5 mb-5">
            <!-- grid left -->
            <div class="side-bar col-lg-3">
                <!--preference -->
                <div class="left-side">
                    <h3 class="shopf-sear-headits-sear-head">
                        Categories</h3>
                    <ul>
                       <?php foreach($categories as $category) :  ?>
                          <li class="bg-white">
                              <div class="text-center">
                              <?php echo anchor('product/ct/'.$category->id.'/p', ''.$category->category_name.'<i class="fas fa-external-link-alt"></i>', ['class' => 'text-capitalize btn btn-sm btn-rounded']); ?>
                              </div>
                          </li>
                          <?php endforeach; ?>
                          <li class="bg-white">
                              <div class="text-center">
                              <?php echo anchor('all-product/','Semua Produk <i class="fas fa-external-link-alt"></i>', ['class' => 'text-capitalize btn btn-sm btn-rounded']); ?>
                              </div>
                          </li>
                    </ul>
                </div>
                <!-- // preference -->
            </div>
            <!-- //grid left -->
            <!-- grid right -->
            <p id="notification" data-message="<?php echo $notification; ?>"></p>
            <div class="col-lg-9 mt-lg-0 mt-5 right-product-grid">
                <!-- card group  -->
                <div class="section singlep_btm pb-5">
                    <div class="container">
                        <h4 class="rad-txt text-capitalize">Beberapa Produk Dari UMKM Kami
                        </h4>
                        <!-- END DIV BATIK -->
                        <div class="new_arrivals mt-5">
                            <h4 class="rad-txt text-capitalize">Kain Batik
                            </h4>
                            <!-- card group 2 -->
                            <div class="card-group my-5">
                                <!-- card -->
                                <!-- oleh oleh section -->
                                <?php if(count($data_batik) > 0): ?>
                                    <?php foreach ($data_batik as $batik): ?>
                                        <div class="col-lg-3 col-sm-6 p-0">
                                            <div class="card product-men p-3">
                                                <div class="men-thumb-item">
                                                    <img src="<?php echo base_url('uploads/produk/'.$batik->image) ?>" alt="img" class="card-img-top">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                            <a href="<?php echo base_url('product/'.$batik->id.'/detail') ?>" class="link-product-add-cart">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="card-body  py-3 px-2">
                                                    <h5 class="card-title text-capitalize"><?php echo $batik->name ?></h5>
<!--                                                     <div class="card-text d-flex justify-content-between">
                                                        <p class="text-dark font-weight-bold">$20.00</p>
                                                        <p class="line-through">$25.00</p>
                                                    </div> -->
                                                </div>
                                                <!-- card footer -->
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <!-- //card -->
                                <!-- //card -->
                            </div>
                            <!-- //card group -->
                            <!--//new_arrivals-->
                        </div>

                        <!-- DIV SePATU -->
                        <div class="new_arrivals">
                            <h4 class="rad-txt text-capitalize">Sepatu
                            </h4>
                            </h6>
                            <!-- card group 2 -->
                            <div class="card-group my-5">
                                <!-- card -->
                                <!-- batik section -->
                                <?php if(count($data_sepatu) > 0): ?>
                                    <?php foreach ($data_sepatu as $sepatu): ?>
                                        <div class="col-lg-3 col-sm-6 p-0">
                                            <div class="card product-men p-3">
                                                <div class="men-thumb-item">
                                                    <img src="<?php echo base_url('uploads/produk/'.$sepatu->image) ?>" alt="img" class="card-img-top">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                            <a href="<?php echo base_url('product/'.$sepatu->id.'/detail') ?>" class="link-product-add-cart">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="card-body  py-3 px-2">
                                                    <h5 class="card-title text-capitalize"><?php echo $sepatu->name ?></h5>
                                                    <div class="card-text d-flex justify-content-between">
                                                    </div>
                                                </div>
                                                <!-- card footer -->
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <!-- //card -->
                                <!-- //card -->
                            </div>
                            <!-- //card group -->
                            <!--//new_arrivals-->
                        </div>
                        <!-- END DIV SePATU -->

                        <!-- DIV OLEH OLEH -->
                        <div class="new_arrivals">
                            <h4 class="rad-txt text-capitalize">Oleh Oleh
                            </h4>
                            </h6>
                            <!-- card group 2 -->
                            <div class="card-group my-5">
                                <!-- card -->
                                <!-- oleh oleh section -->
                                <?php if(count($data_oleh_oleh) > 0): ?>
                                    <?php foreach ($data_oleh_oleh as $oleh_oleh): ?>
                                        <div class="col-lg-3 col-sm-6 p-0">
                                            <div class="card product-men p-3">
                                                <div class="men-thumb-item">
                                                    <img src="<?php echo base_url('uploads/produk/'.$oleh_oleh->image) ?>" alt="img" class="card-img-top">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                            <a href="<?php echo base_url('product/'.$oleh_oleh->id.'/detail') ?>" class="link-product-add-cart">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="card-body  py-3 px-2">
                                                    <h5 class="card-title text-capitalize"><?php echo $oleh_oleh->name ?></h5>
                                                    <div class="card-text d-flex justify-content-between">
                                                    </div>
                                                </div>
                                                <!-- card footer -->
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <!-- //card -->
                                <!-- //card -->
                            </div>
                            <!-- //card group -->
                            <!--//new_arrivals-->
                        </div>
                        <!-- END DIV OLEH OLEH -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Shop