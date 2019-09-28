<!-- Single -->
<div class="innerf-pages section py-5">
    <div class="container">
        <div class="row my-sm-5">
            <div class="col-lg-4 single-right-left">
                <div class="grid images_3_of_2">
                    <div class="flexslider1">
                        <ul class="slides">
                            <li data-thumb="<?php echo base_url('uploads/produk/'.$product->image);?>">
                                <div class="thumb-image">
                                    <img src="<?php echo base_url('uploads/produk/'.$product->image);?>" data-imagezoom="true" alt=" " class="img-fluid"> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-lg-0 mt-5 single-right-left simpleCart_shelfItem">
                <h3><?php echo $product->name ?></h3>
                </h3>
                <div class="desc_single" style="text-align:justify;">
                    <h5>Description</h5>
                    <p><?php echo $product->descriptions; ?>.</p>
                </div>
                <div class="d-sm-flex justify-content-between">
                    <div class="occasional">
                        <h5 class="sp_title mb-3">Informasi Penjual</h5>
                        <ul class="single_specific">
                            <li>
                                <span>Umkm : </span> <?php echo $umkm->name; ?>
                            </li>
                            <li>
                                <span>Pemilik :</span> <?php echo $owner; ?>
                            </li>
                            <li>
                                <span>Email :</span> <?php echo $umkm->user_email; ?>
                            </li>
                            <li>
                                <span>Alamat :</span> <?php echo $umkm->address; ?>
                            </li>
                            <li>
                                <span>Pesan Produk :</span> 
                                <?php if($product->link_product != null):?>
                                <a href="<?php echo $product->link_product;?>" class="btn btn-round btn-warning" target="_blank">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <?php else :?>
                                    <span class="text-info text-capitalize">
                                        <strong>admin belum menambahkan link pemesanan</strong>
                                    </span> 
                                <?php endif?>
                            </li>
                        </ul>

                    </div>
                    <div class="color-quality mt-sm-0 mt-4">
                        <h5 class="sp_title mb-3">services</h5>
                        <ul class="single_serv">
                            <li>
                                <a href="#">30 Day Return Policy</a>
                            </li>
                            <li class="mt-2">
                                <a href="#">Cash on Delivery available</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="description">
                    <!-- <h5>Check delivery, payment options and charges at your location</h5>
                    <form action="#" method="post">
                        <input type="text" placeholder="Enter pincode" required />
                        <input type="submit" value="Check">
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /similar product -->
<div class="section singlep_btm pb-5">
    <div class="container">
        <div class="new_arrivals">
            <h4 class="rad-txt text-capitalize">Produk Yang Sejenis yang mungkin anda suka
            </h4>
            <!-- card group 2 -->
            <div class="card-group my-5">
                <!-- card -->
                <?php if(count($similar_products) > 0): ?>
                    <?php foreach ($similar_products as $similar_product): ?>
                        <?php if($similar_product->id != $product->id): ?>
                        <div class="col-lg-3 col-sm-6 p-0">
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url('uploads/produk/'.$similar_product->image) ?>" alt="img" class="card-img-top">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo base_url('product/'.$similar_product->id.'/detail') ?>" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize"><?php echo $similar_product->name; ?></h5>
                                    <!-- <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">$20.00</p>
                                        <p class="line-through">$25.00</p>
                                    </div> -->
                                </div>
                                <!-- card footer -->
                                <!-- <div class="card-footer d-flex justify-content-end">
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart">
                                        <input type="hidden" name="add" value="1">
                                        <input type="hidden" name="hub_item" value="Black Casual Men's Blazer">
                                        <input type="hidden" name="amount" value="20.00">
                                        <button type="submit" class="hub-cart phub-cart btn">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                        <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                    </form>
                                </div> -->
                            </div>
                        </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- //card -->
            </div>
            <!-- //card group -->
            <!--//new_arrivals-->
        </div>
    </div>
</div>
<!--// Single -->