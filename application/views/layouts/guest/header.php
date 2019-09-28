<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rumah Kreatif Mawar | <?php echo ucwords($title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Fashion Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <!-- Custom Theme files -->
    <link href="<?php echo base_url(); ?>assets/custom/UMKM-Indonesia.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/guest/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="<?php echo base_url(); ?>assets/guest/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <!-- Owl-Carousel-CSS -->
    <link href="<?php echo base_url(); ?>assets/guest/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="<?php echo base_url(); ?>assets/guest/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/guest/css/owl.carousel.min.css">
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->

</head>

<body>
    <!-- header -->
    <header class=" bg-info">
        <div class="container">
            <!-- top nav -->
            <nav class="top_nav d-flex pt-3 pb-1">
                <!-- logo -->
                <h1>
                    <a href="<?php echo base_url('/') ?>">
                    	<p class="text-uppercase" style="color:black; font-family:Lucida Console, Monaco, monospace">Rumah Kreatif Mawar</p>
                    </a>
                </h1>
                <!-- //logo -->
                <div class="w3ls_right_nav ml-auto d-flex">
                    <div class="nav-icon d-flex">
                        <!-- login -->
                        <a class="text-dark login_btn align-self-center mx-3" href="<?php echo base_url('user/login') ?>" >
                            <i class="far fa-user"></i>
                        </a>
                        <!-- //login ends here -->
                    </div>
                </div>
            </nav>
            <!-- //top nav -->
            <!-- bottom nav -->
            <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link  active" href="<?php echo base_url('/') ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown has-mega-menu" style="position:static;">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kategori</a>
                            <div class="dropdown-menu" style="width:100%">
                                <div class="px-0 container">
                                    <div class="row">
                                        <?php foreach($categories as $category): ?>
                                        <div class="col-md-4">
                                            <?php echo anchor('product/ct/'.$category->id.'/p', ''.$category->category_name, ['class' => 'dropdown-item']); ?>
                                        </div>
                                        <?php endforeach; ?>
                                       <!--  <div class="col-md-4">
                                            <a class="dropdown-item" href="men.html">Shirts</a>
                                            <a class="dropdown-item" href="men.html">Suits & Blazers</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="dropdown-item" href="men.html">Jackets</a>
                                            <a class="dropdown-item" href="men.html">Trousers</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('umkm'); ?>">UMKM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('all-product'); ?>">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('blog'); ?>">Blog</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- //bottom nav -->
        </div>
        <!-- //header container -->
    </header>
    <!-- //header -->
    <?php if($this->uri->segment(1) != ''): ?>
	<!-- inner banner -->
	<div>
		<h4 style="color:black;" class="head_agileinfo text-center text-capitalize text-center pt-5">
			<span style="color:blue;"><?php echo substr($title,0,1); ?></span><?php echo substr($title,1); ?>
		</h4>
	</div>
	<!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('/') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($title); ?></li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <?php endif; ?>