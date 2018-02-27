<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front';

// about
$route['about'] = 'about/me';
$route['blog'] = 'about/blog';
$route['faq'] = 'about/ours/faq';
$route['ourloc'] = 'about/ours/ourloc';
$route['contactus'] = 'about/ours/contactus';

// seputar authentification
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logoutCustomer';
$route['forgot'] = 'auth/forgot';
$route['newpassword'] = 'auth/newpassword';

// menu bagian header
$route['beli-npl'] = 'npl/beli';
$route['pembelian'] = 'Pembelian';
$route['metode-pembayaran'] = 'npl/metodepembayaran';

// bagian akun
$route['dashboard'] = 'akun/dasbor';
$route['notification'] = 'akun/notification';
$route['transaction'] = 'akun/transaction';
$route['npl_dashboard'] = 'akun/npl_manage';
$route['favorite'] = 'akun/whislist';
$route['basic-price'] = 'akun/basic_price';
$route['npl-success'] = 'npl/success';

// menu cari kendaraan
$route['cari-lelang'] = 'find/find_unit';
$route['detail-lelang'] = 'find/find_details';
$route['cari-lelang-iscomming'] = 'find/find_unit/iscomming';

// menu jadwal lelang
$route['jadwal-lelang'] = 'auction/auction_date';
$route['jadwal-lelang-iscomming'] = 'auction/auction_date/iscomming';

// menu auction
$route['live-auction'] = 'auction/live';
$route['detail-auction'] = 'auction/details';
$route['titip-lelang'] = 'auction/entrusted';

// Menu panduan
$route['panduan-lelang'] = 'userguide/guide/index/onsite';
$route['panduan-lelang/(:any)'] = 'userguide/guide/index/$1';

$route['404_override'] = 'notfound/index';
$route['translate_uri_dashes'] = FALSE;
