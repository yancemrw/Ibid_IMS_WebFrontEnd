<!DOCTYPE html>
<html lang="id" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<head>
   <title>IBID Lelang</title>
   <meta charset="utf-8">
   <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <link rel="shortcut icon" href="<?php echo base_url('assetsfront/images/favicon/favicon.ico'); ?>">
   <link rel="icon" type="image/png" href="assets/images/icon/favicon/favicon-160x160.png" sizes="">
   <link rel="icon" type="image/png" href="assets/images/icon/favicon/favicon-96x96.png" sizes="">
   <link rel="icon" type="image/png" href="assets/images/icon/favicon/favicon-16x16.png" sizes="">
   <link rel="icon" type="image/png" href="assets/images/icon/favicon/favicon-32x32.png" sizes="">
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
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/slick.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/select2.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/image-sprite-style.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/style.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/responsive.css') ?>">
</head>
<body>
   <div id="preloader"></div>
   <div id="content">

      <!-- <header> -->
         <?php echo ( $this->uri->segment(1)=="" OR $this->uri->segment(1)=="front" ) ? "<header>" : ""; ?>

            <nav class="navbar navbar-custom">
               <div class="top-navbar text-right">
                  <form class="form-inline">
                     <div class="form-group language">
                        <select class="select-custom form-control">
                           <option>Bahasa</option>
                           <option>Indonesia</option>
                           <option>English</option>
                        </select>
                     </div>
                     <div class="form-group help">
                        <select class="select-custom form-control">
                           <option>Bantuan</option>
                           <option>-</option>
                           <option>-</option>
                        </select>
                     </div>
                  </form>
               </div>
               <div class="container-fluid">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" id="toggle-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand icon_logo" alt="" href="index.html"><i class="icn icn-LOGO-IBID"></i></a>
                     <div class="nav-header-right "> 
                        <a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a>
                        <a href="register.html" class="regis">Daftar</a>
                     </div>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav navbar-right">
                        <li class="nav-close"><i class="fa fa-close"></i></li>
                        <li class="nav-title"><span class="nav-title">Home</span></li>
                        <li><a href="halaman-cari-kendaraan.html">Cari Kendaraan</a></li>
                        <li><a href="jadwal-lelang.html">Jadwal Lelang</a></li>
                        <li><a href="halaman-pemilihan-kota.html">Live Auction</a></li>
                        <li><a href="beli-npl-required.html">Beli Npl</a></li>
                        <li><a href="titip-lelang-form-required.html">Titip Lelang</a></li>
                        <li><a href="">Map</a></li>
                        <li><a href="tata-cara-lelang-onsite2.html">Prosedur</a></li>
                        <li class="hidden-mob"><a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a></li>
                        <li class="hidden-mob"><a href="register.html" class="regis">Daftar</a></li>
                        <li class="lang-mob">
                           <a href="javascript:void(0)">Bahasa</a>
                           <ul>
                              <li>
                                 <a href="">Indonesia</a>
                              </li>
                              <li>
                                 <a href="">Inggris</a>
                              </li>
                           </ul>
                        </li>
                        <li class="help-mob">
                           <a href="javascript:void(0)">Bantuan</a>
                           <ul>
                              <li>
                                 <a href="">Telepon</a>
                              </li>
                              <li>
                                 <a href="">Contact</a>
                              </li>
                           </ul>
                        </li>
                     </ul> 
                  </div>
               </div>
            </nav>

            <?php if ($this->uri->segment(1)=="" OR $this->uri->segment(1)=="front") { ?>


            <div class="hero-overlay">
               <h1>Search, Bid <span>&</span> Buy From <br>Anywhere on Any Device</h1>
               <p>IBID-Balai Lelang Serasi merupakan balai lelang terbesar di Indonesia. Temukan lebih dari 5000 kendaraan dengan beragam tipe dan merek yang rutin dilelang tiap bulan.</p>
            </div>
         </header>
         <?php } ?>
