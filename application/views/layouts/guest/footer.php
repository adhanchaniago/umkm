<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- footer -->
    <footer>
        <div class="footerv2-w3ls">
            <div class="footer-w3lagile-innerr">
                <!-- footer-top -->
                <!-- //footer-top -->
                <div class="footer-bottomv2 py-5">
                    <div class="container">
                        <ul class="bottom-links-agile">
                            <li>
                                <a href="<?php echo base_url(''); ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('umkm'); ?>">Umkm</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('all-product') ?>">Product</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('blog') ?>">Blog</a>
                            </li>

                        </ul>
                        <h3 class="text-center follow">Follow Us</h3>
                        <ul class="social-iconsv2 agileinfo">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-5 footer-copy_w3ls">
                <div class="d-lg-flex justify-content-between">
                    <div class="mt-2 sub-some align-self-lg-center">
                        <h5>Payment Method</h5>
                        <ul class="mt-4">
                            <li class="list-inline-item">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay2.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay5.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay3.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay7.png" alt="">
                            </li>
                            <li class="list-inline-item">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay8.png" alt="">
                            </li>
                            <li class="list-inline-item ">
                                <img src="<?php echo base_url('assets/guest/') ?>images/pay9.png" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="cpy-right align-self-center">
                        <h2 class="agile_btxt">
                            <a href="index.html">
                                <span>R</span>umah
                                <span>K</span>reatif
                                <span>M</span>awar
                        </h2>
                        <p>© 
                        	<script type="text/javascript">
                        		let createdYear = 2019
                        		let nowYear = new Date().getFullYear()
                        		document.write(createdYear == nowYear ? createdYear : createdYear +' - '+nowYear)
                        	</script>
                         Fashion Hub. All rights reserved | Design by
                            <a href="http://w3layouts.com" class="text-secondary"> W3layouts.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- js -->
    <script src="<?php echo base_url(); ?>assets/guest/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- smooth dropdown -->
    <script>
        $(document).ready(function () {
            $('ul li.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
            });
        });
    </script>
    <!-- //smooth dropdown -->
    <!-- Banner Responsiveslides -->
    <script src="<?php echo base_url(); ?>assets/guest/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: false,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- // Banner Responsiveslides -->
    <!-- Product slider Owl-Carousel-JavaScript -->
    <script src="<?php echo base_url(); ?>assets/guest/js/owl.carousel.js"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                320: {
                    items: 1,
                },
                568: {
                    items: 2,
                },
                991: {
                    items: 3,
                },
                1050: {
                    items: 4
                }
            }
        });
    </script>
    <!-- //Product slider Owl-Carousel-JavaScript -->
    <!-- start-smooth-scrolling -->
    <script src="<?php echo base_url(); ?>assets/guest/js/move-top.js"></script>
    <script src="<?php echo base_url(); ?>assets/guest/js/easing.js"></script>
    <script src="<?php echo base_url(); ?>assets/guest/js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/guest/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/custom/ci_notif.js"></script>
</body>

</html>