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
                        <h4 class="rad-txt text-capitalize">Beberapa Produk Berdasarkan Kategori
                        </h4>
                        <!-- END DIV BATIK -->
                        <div class="new_arrivals mt-5">
                            <h4 class="rad-txt text-capitalize"><?php echo $category_name ?>
                            </h4>
                            <!-- card group 2 -->
                            <div class="card-group my-5">
                                <!-- card -->
                                <!-- oleh oleh section -->
                                <?php if(count($product_by_categories) > 0): ?>
                                    <?php foreach ($product_by_categories as $product_category): ?>
                                        <div class="col-lg-3 col-sm-6 p-0">
                                            <div class="card product-men p-3">
                                                <div class="men-thumb-item">
                                                    <img src="<?php echo base_url('uploads/produk/'.$product_category->image) ?>" alt="img" class="card-img-top">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                            <a href="<?php echo base_url('product/'.$product_category->id.'/detail') ?>" class="link-product-add-cart">Quick View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="card-body  py-3 px-2">
                                                    <h5 class="card-title text-capitalize"><?php echo $product_category->name ?></h5>
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
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p class="text-capitalize">belum ada produk yang di post</p>
                                <?php endif ?>
                                <!-- //card -->
                                <!-- //card -->
                            </div>
                            <!-- //card group -->
                            <!--//new_arrivals-->
                        </div>
                    </div>
                </div>
                <?php 
                    echo $this->pagination->create_links();
                ?>
            </div>
        </div>
    </div>
    <!--// Shop