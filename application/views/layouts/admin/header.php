<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rumah Kreatif Mawar | <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url(); ?>assets/custom/UMKM-Indonesia.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/responsive.css">
    <script src="<?php echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>

    <!-- modernizr css -->
    <script src="<?php echo base_url(); ?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->

  <?php 
    $uri = $this->uri->segment(2);
    ($uri != 'login' && $uri != 'register' && $uri != 'forget-password' && $uri != 'reset-password' && $uri != 'resend-verifications') ? $this->load->view('layouts/admin/sidebar') : false; 
  ?>