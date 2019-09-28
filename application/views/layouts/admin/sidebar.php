<div class="page-container">
      <!-- sidebar menu area start -->
      <div class="sidebar-menu">
          <div class="sidebar-header">
              <div class="logo">
                  <a href="index.html"><img src="<?php echo base_url(); ?>assets/admin/images/icon/logo.png" alt="logo"></a>
              </div>
          </div>
          <div class="main-menu">
              <div class="menu-inner">
                  <nav>
                      <ul class="metismenu" id="menu">
                        <?php if($this->session->userdata('user')['level'] == 'super_admin'): ?>
                          <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : false ?>"><a href="<?php echo base_url('/superadmin/dashboard') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                        <?php else: ?>
                          <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : false ?>"><a href="<?php echo base_url('/adminumkm/dashboard') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('user')['level'] == 'super_admin'): ?>
                          <li class="<?php $this->uri->segment(2) == 'umkm' ? 'active' : false ?>">
                            <a href="<?php echo base_url('/superadmin/umkm') ?>"><i class="fa fa-building"></i> <span>Data UMKM</span></a>
                          </li>

                          <li class="<?php $this->uri->segment(2) == 'product' ? 'active' : false ?>">
                            <a href="<?php echo base_url('/superadmin/product') ?>"><i class="fa fa-gift"></i> <span>Data Produk</span></a>
                          </li>
                          <?php else: ?>
                          <li class="<?php echo $this->uri->segment(2) == 'umkm' || $this->uri->segment(2) == 'product' ? 'active' : false ?>">
                            <a href="<?php echo base_url('/adminumkm/umkm') ?>"><i class="ti-dashboard"></i> <span>UMKM & Produk</span></a>
                          </li>
                        <?php endif ?>
                        <?php if($this->session->userdata('user')['level'] == 'super_admin'): ?>
                          <li class="<?php echo $this->uri->segment(2) == 'blog' ? 'active' : false ?>">
                            <a href="<?php echo base_url('/superadmin/blog') ?>"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a>
                          </li>
                        <?php else: ?>
                          <li class="<?php echo $this->uri->segment(2) == 'blog' ? 'active' : false ?>">
                            <a href="<?php echo base_url('/adminumkm/blog') ?>"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a>
                          </li>
                        <?php endif ?>
                          <li class="<?php echo $this->uri->segment(2) == 'announcement' ? 'active' : false ?>">
                            <?php if($this->session->userdata('user')['level'] == 'super_admin'): ?>
                            <a href="<?php echo base_url('/superadmin/announcement') ?>"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a>
                            <?php elseif($this->session->userdata('user')['level'] == 'admin'): ?>
                            <a href="<?php echo base_url('/adminumkm/announcement') ?>"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a>
                            <?php endif; ?>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
      <!-- sidebar menu area end -->
      <!-- main content area start -->
      <div class="main-content">
          <!-- header area start -->
          <div class="header-area">
              <div class="row align-items-center">
                  <!-- nav and search button -->
                  <div class="col-md-6 col-sm-8 clearfix">
                      <div class="nav-btn pull-left">
                          <span></span>
                          <span></span>
                          <span></span>
                      </div>
                  </div>
                  <!-- profile info & task notification -->
                  <div class="col-md-6 col-sm-4 clearfix">
                      <ul class="notification-area pull-right">
                          <li id="full-view"><i class="ti-fullscreen"></i></li>
                          <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                          <li class="dropdown">
                              <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                  <span>2</span>
                              </i>
                              <div class="dropdown-menu bell-notify-box notify-box">
                                  <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                  <div class="nofity-list">
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                          <div class="notify-text">
                                              <p>You have Changed Your Password</p>
                                              <span>Just Now</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                          <div class="notify-text">
                                              <p>New Commetns On Post</p>
                                              <span>30 Seconds ago</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                          <div class="notify-text">
                                              <p>Some special like you</p>
                                              <span>Just Now</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                          <div class="notify-text">
                                              <p>New Commetns On Post</p>
                                              <span>30 Seconds ago</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                          <div class="notify-text">
                                              <p>Some special like you</p>
                                              <span>Just Now</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                          <div class="notify-text">
                                              <p>You have Changed Your Password</p>
                                              <span>Just Now</span>
                                          </div>
                                      </a>
                                      <a href="#" class="notify-item">
                                          <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                          <div class="notify-text">
                                              <p>You have Changed Your Password</p>
                                              <span>Just Now</span>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <!-- header area end -->
          <!-- page title area start -->
          <div class="page-title-area">
              <div class="row align-items-center">
                  <div class="col-sm-6">
                      <div class="breadcrumbs-area clearfix">
                          <h4 class="page-title pull-left text-capitalize"><?php echo $title ?></h4>
                          <ul class="breadcrumbs pull-left">
                            <?php if($this->session->userdata('user')['level'] == 'super_admin'): ?>
                              <li><a href="<?php echo base_url('superadmin/dashboard'); ?>">Home</a></li>
                            <?php elseif($this->session->userdata('user')['level'] == 'admin'): ?>
                              <li><a href="<?php echo base_url('adminumkm/dashboard'); ?>">Home</a></li>
                            <?php endif; ?>
                              <li><span><?php echo $title ?></span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-sm-6 clearfix">
                      <div class="user-profile pull-right">
                          <img class="avatar user-thumb" src="<?php echo base_url(); ?>assets/admin/images/author/avatar.png" alt="avatar">
                          <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('user')['fullname']; ?> <i class="fa fa-angle-down"></i></h4>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Log Out</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- page title area end -->
          <div class="main-content-inner">
          