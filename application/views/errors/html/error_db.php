<!DOCTYPE html>
<html lang="id" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<head>
   <title><?php echo @$title; ?></title>
   <meta charset="utf-8">
   <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <link rel="shortcut icon" href="<?php echo base_url('assetsfront/images/favicon/favicon.ico'); ?>">
   <link rel="icon" type="image/png" href="<?php echo base_url('assetsfront/images/icon/favicon/favicon-160x160.png') ?>" sizes="">
   <link rel="icon" type="image/png" href="<?php echo base_url('assetsfront/images/icon/favicon/favicon-96x96.png'); ?>" sizes="">
   <link rel="icon" type="image/png" href="<?php echo base_url('assetsfront/images/icon/favicon/favicon-16x16.png'); ?>" sizes="">
   <link rel="icon" type="image/png" href="<?php echo base_url('assetsfront/images/icon/favicon/favicon-32x32.png'); ?>" sizes="">
   <meta name="description" content=""> 
   <meta name="title" content="">
   <meta name="image_src" content="">
   <meta name="google-site-verification" content="">
   <meta name="news_keywords" content="">
   <meta name="googlebot-news" content="">
   <meta name="Slurp" content="all">
   <meta name="msvalidate.01" content="">
   <!-- meta facebook -->
   <meta property="og:title" content="">
   <meta property="og:type" content="">
   <meta property="og:url" content="">
   <meta property="og:image" content="">
   <meta property="og:description" content="">
   <meta property="og:site_name" content="">
   <!-- meta twitter -->
   <meta name="twitter:card" content="">
   <meta name="twitter:site" content="">
   <meta name="twitter:creator" content="">
   <meta name="twitter:title" content="">
   <meta name="twitter:description" content="">
   <meta name="twitter:image" content="">
   <link rel="canonical" href="">
   <link rel="amphtml" href="">
   <link rel="manifest" href="">
   <meta property="fb:app_id" content="">
   <meta property="fb:pages" content="">
   <link rel="dns-prefetch" href="">
   <link rel="dns-prefetch" href="">
   <link rel="preconnect" href="">
   <link rel="preconnect" href="">
   <link rel="alternate" title="" href="" type="">
   <link rel="alternate" title="" href=" " type="">
   <link rel="stylesheet" type="text/css" href="" media="all">
   <link rel="stylesheet" type="text/css" href="" media="all">
   <link rel="stylesheet" type="text/css" href="">
   
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/font-awesome/css/font-awesome.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/image-sprite-style.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/select2.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/fullcalendar.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/style.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/responsive.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/slick.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/jquery.flipster.min.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/bootoast/bootoast.min.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/overwrite.css'); ?>">

   <!-- Header Js -->
   <script src="<?php echo base_url('assetsfront/js/jquery-3.2.1.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/jquery.sticky.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/select2.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/slick.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/bootstrap-datepicker.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/moment.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/jquery.jscroll.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/Chart.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/fullcalendar.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/jquery.sticky-kit.min.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/jquery.scrollto.js'); ?>"></script>
   <script src="<?php echo base_url('assetsfront/js/jquery.flipster.min.js'); ?>"></script>
   <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>
   <script src="<?php echo base_url('assetsfront/bootoast/bootoast.min.js'); ?>"></script>
   <!--script type="text/javascript" src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script-->
   <!-- sweetalert -->
   <script>
      var verifyCallback = function(response) {
         $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val(response);
      };
      var onloadCallback = function() {
         grecaptcha.render('idrecaptcha', {
            'sitekey'   : '6Lee4z8UAAAAAG8bdnCYM-ZKfsRa6fniZlq5HTRn',
            'callback'  : verifyCallback,
            'theme'     : 'light'
         });
      };
   </script>

</head>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo "<center><img src='".base_url('assetsfront/images/background/management-empty.png')."'></center>";

// $respon = array(
// 	'status'	=> 0,
// 	'messagesdsssd'	=> $heading,
// 	'data'	=> []);

// echo  json_encode($respon);
?>

<section class="error-message">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <div class="image-message">
                     <img src="assets/images/background/404.png" alt="">
                  </div>
                  <p>Oops... Periksa koneksi kamu</p>
                  <button class="btn btn-green">KEMBALI KE HALAMAN SEBELUMNYA</button>
               </div>
            </div>
         </div>
      </section>
