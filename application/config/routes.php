<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']         = 'home';
$route['umkm']                       = 'guest_umkm';
$route['umkm/(:num)']                = 'guest_umkm/index/$1';
$route['umkm/(:num)/detail']         = 'guest_umkm/guestumkmdetail/$1';
// $route['product']                    = 'guest_product';
$route['product/(:num)/detail']      = 'guest_product/productdetail';
$route['product/ct/(:num)/p']        = 'guest_product/productbycategory/$1';
$route['product/ct/(:num)/p/(:any)'] = 'guest_product/productbycategory/$1/$2';
$route['all-product']                = 'guest_product/guestAllProductCategory';
$route['all-product/(:num)']         = 'guest_product/guestAllProductCategory/$1';

$route['blog']                  = 'guest_blog';
$route['blog/(:num)']           = 'guest_blog/index/$1';
$route['blog/(:any)/detail']    = 'guest_blog/guestblogdetail/$1';

// authentication route
$route['user/login']         = 'auth/authentication/login';
$route['user/logout']        = 'auth/authentication/logout';
$route['user/login/verify']  = 'auth/authentication/checkauth';
$route['user/register']      = 'auth/user_registration/register';
$route['user/register/send'] = 'auth/user_registration/store';
$route['user/verifications'] = 'auth/user_verification';

$route['user/resend-verifications'] = 'auth/user_verification/resenduserverification';
$route['user/resend-verifications/verify'] = 'auth/user_verification/resendformverificationverify';

$route['user/forget-password'] = 'auth/reset_password/forgetpassword';
$route['user/send-forget-password'] = 'auth/reset_password/sendforgetpassword';

$route['user/send-reset-password'] = 'auth/reset_password/sendresetpassword';

$route['user/change-password/(:any)'] = 'auth/change_password/index/$1';
$route['user/change-password/(:any)/store'] = 'auth/change_password/store/$1';

// super admin
$route['superadmin/dashboard']            = 'super_admin/home';
$route['superadmin/umkm']                 = 'super_admin/umkm';
$route['superadmin/umkm/(:num)/approved'] = 'super_admin/umkm/approvedumkm/$1';
$route['superadmin/product']              = 'super_admin/product';
$route['superadmin/blog']                 = 'super_admin/blog';
$route['superadmin/announcement']         = 'super_admin/announcement';
$route['superadmin/announcement/create']  = 'super_admin/announcement/create';
$route['superadmin/announcement/store']  = 'super_admin/announcement/store';
$route['superadmin/announcement/(:any)/detail']  = 'super_admin/announcement/show/$1';
$route['superadmin/announcement/(:any)/edit']  = 'super_admin/announcement/edit/$1';
$route['superadmin/announcement/(:any)/update']  = 'super_admin/announcement/update/$1';
$route['superadmin/announcement/(:any)/delete']  = 'super_admin/announcement/destroy/$1';

// admin umkm
$route['adminumkm/dashboard']          = 'admin/home';
$route['adminumkm/umkm']               = 'admin/umkm';
$route['adminumkm/umkm/create']        = 'admin/umkm/create';
$route['adminumkm/umkm/store']         = 'admin/umkm/store';
$route['adminumkm/umkm/(:num)/edit']   = 'admin/umkm/edit/$1';
$route['adminumkm/umkm/(:num)/update'] = 'admin/umkm/update/$1';

// admin produk
$route['adminumkm/product/(:num)/create'] = 'admin/product/create/$1';
$route['adminumkm/product/(:num)/store']  = 'admin/product/store/$1';
$route['adminumkm/product/(:num)/edit']   = 'admin/product/edit/$1';
$route['adminumkm/product/(:num)/update'] = 'admin/product/update/$1';
$route['adminumkm/product/(:num)/delete'] = 'admin/product/delete/$1';

// admin blog
$route['adminumkm/blog']               = 'admin/blog';
$route['adminumkm/blog/create']        = 'admin/blog/create';
$route['adminumkm/blog/store']         = 'admin/blog/store';
$route['adminumkm/blog/(:num)/edit']   = 'admin/blog/edit/$1';
$route['adminumkm/blog/(:num)/update'] = 'admin/blog/update/$1';
$route['adminumkm/blog/(:num)/delete'] = 'admin/blog/delete/$1';

// admin announcement
$route['adminumkm/announcement'] = 'admin/announcement';
$route['adminumkm/announcement/(:any)/detail'] = 'admin/announcement/show/$1';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
