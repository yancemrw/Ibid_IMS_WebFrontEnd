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
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <script type="text/javascript" src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script>
   <!-- sweetalert -->
   

</head>
<body class="bg-grey">
   <!-- handle header between procedure page and other page -->
   <?php if(@$menu_pages === "panduan-lelang") { ?>
      <header class="header-min" style="background: url(<?php echo base_url('assetsfront/images/background/bg-homepage.jpg'); ?>)no-repeat fixed;">
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
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand icon_logo" alt="" href="<?php echo base_url(); ?>"><i class="icn icn-LOGO-IBID"></i></a>
                 </div>
                 <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-close"><i class="fa fa-close"></i></li>
                        <li class="nav-title"><span class="nav-title">Home</span></li>
                        <li><a href="<?php echo site_url('cari-lelang'); ?>">Cari Kendaraan</a></li>
                        <li><a href="<?php echo site_url('jadwal-lelang'); ?>">Jadwal Lelang</a></li>
                        <li><a href="<?php echo site_url('live-auction'); ?>">Live Auction</a></li>
                        <li><a href="<?php echo site_url('beli-npl'); ?>">Beli Npl</a></li>
                        <li><a href="<?php echo site_url('titip-lelang'); ?>">Titip Lelang</a></li>
                        <li><a href="<?php echo site_url('market-auction-price'); ?>">Map</a></li>
                        <li><a href="<?php echo site_url('panduan-lelang'); ?>">Prosedur</a></li>
                        <li><a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a></li>
                        <li><a href="register.html" class="regis">Daftar</a></li>
                    </ul>
                 </div>
               </div>
          </nav>
          <div class="hero-overlay text-center">
            <h2><?php echo $menu_title; ?></h2>
          </div>
      </header>
      <div class="container-fluid">
   <?php } else { ?>
   <div id="preloader" style="display:none"></div>
   <div id="preloaderAuction" style="display:none"></div>
   <div id="content">

      <!-- <header> -->
         <?php echo ($this->uri->segment(1) == "" || $this->uri->segment(1) == "front") ? '<header>' : ''; ?>

            <nav class="navbar navbar-custom <?php echo @$header_white; ?>">
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
                     <a class="navbar-brand icon_logo" alt="" href="<?php echo site_url(); ?>"><i class="icn icn-LOGO-IBID"></i></a>
                     <div class="nav-header-right "> 
                        <!-- <?php print_r($userdata = $this->session->userdata('userdata')); ?>  -->

                        <?php $userdata = $this->session->userdata('userdata');
                        if (count($userdata['UserId']) > 0) { ?>

                        <ul class="user-nav clearfix">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <p><img src="<?php echo base_url('assetsfront/images/icon/Transaksi.png'); ?>" alt="" title="" width="" height=""></p>
                              </a>
                              <ul class="dropdown-menu dropdown-custom">
                                 <li>
                                    <p class="title-dropdown">Transaksi</p>
                                 </li>
                                 <li class="input-dropdown">
                                    <h2>Butuh Tindakan</h2>
                                    <form>
                                       <div class="form-group floating-label">
                                          <input type="name" name="" class="form-control" placeholder="">
                                          <label class="label-schedule">Harga Dasar</label>
                                       </div>
                                       <div class="form-group floating-label">
                                          <input type="name" name="" class="form-control" placeholder="">
                                          <label class="label-schedule">Harga Dasar</label>
                                       </div>
                                       <div class="form-group floating-label">
                                          <input type="name" name="" class="form-control" placeholder="">
                                          <label class="label-schedule">Harga Dasar</label>
                                       </div>
                                    </form>
                                    <h2>Transaksi Terakhir</h2>
                                    <a href="">
                                       <div class="transaction-image">
                                          <img src="assets/images/background/3.jpg" alt="" title="">
                                       </div>
                                       <div class="transaction-content">
                                          <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT 2014</h2>
                                          <p>No. NPL #002 <span>Rp. 418,000,000</span></p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="text-center">
                                    <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <p><img src="<?php base_url('assetsfront/images/icon/Notifikasi.png'); ?>" alt="" title="" width="" height=""> <span class="notification">10</span></p>
                              </a>
                              <ul class="dropdown-menu dropdown-custom">
                                 <li>
                                    <p class="title-dropdown">Notifikasi</p>
                                 </li>
                                 <li class="clearfix">
                                    <a href="#">
                                       <div class="media-image">
                                          <img src="assets/images/icon/ic_notif_1.png" alt="" title="">
                                       </div>
                                       <div class="media-content">
                                          <h2>1 Pesan Email</h2>
                                          <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="clearfix">
                                    <a href="#">
                                       <div class="media-image">
                                          <img src="assets/images/icon/ic_notif_2.png" alt="" title="">
                                       </div>
                                       <div class="media-content">
                                          <h2>1 Pesan Email</h2>
                                          <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="clearfix">
                                    <a href="#">
                                       <div class="media-image">
                                          <img src="assets/images/icon/ic_notif_3.png" alt="" title="">
                                       </div>
                                       <div class="media-content">
                                          <h2>1 Pesan Email</h2>
                                          <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="text-center">
                                    <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle box-profile" data-toggle="dropdown">
                                 <span class="photo-profile">
                                    <img src="<?php echo base_url('assetsfront/images/background/slide-1.jpg') ?>" alt="" title="profile">
                                 </span>
                              </a>
                              <ul class="dropdown-menu dropdown-profile">
                                 <li class="clearfix">
                                    <a href="am-ubah-profil.html" class="clearfix">
                                       <div class="content-profile col-md-6">
                                          <img src="https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg" alt="" title="profile">
                                       </div>
                                       <p class="col-md-6"><?php echo $userdata['namefront'] ?> <span><?php echo $userdata['emailfront']; ?></span></p>
                                    </a>
                                 </li>
                                 <li>
                                    <hr />
                                 </li>
                                 <li class="text-center">
                                    <button class="btn btn-logout" onclick="location.href='<?php echo site_url('logout'); ?>'" type="button">Keluar</button>
                                 </li>
                              </ul>
                           </li>
                        </ul>

                        <?php } else { ?>

                        <a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a>
                        <a href="register.html" class="regis">Daftar</a>
                        <?php } ?>

                     </div>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav navbar-right">
                        <li class="nav-close"><i class="fa fa-close"></i></li>
                        <li class="nav-title"><span class="nav-title">Home</span></li>
                        <li><a href="<?php echo site_url('cari-lelang'); ?>">Cari Kendaraan</a></li>
                        <li><a href="<?php echo site_url('jadwal-lelang'); ?>">Jadwal Lelang</a></li>
                        <li><a href="<?php echo site_url('live-auction'); ?>">Live Auction</a></li>
                        <li><a href="<?php echo site_url('beli-npl'); ?>">Beli Npl</a></li>
                        <li><a href="<?php echo site_url('titip-lelang'); ?>">Titip Lelang</a></li>
                        <li><a href="<?php echo site_url('market-auction-price'); ?>">Map</a></li>
                        <li><a href="<?php echo site_url('panduan-lelang'); ?>">Prosedur</a></li>
                        

                        <?php if (count($userdata['UserId']) > 0) { ?>

                        <li class="dropdown hidden-mob">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <p><img src="http://sera-ibid.stagingapps.net/assets/images/icon/ic_transaction.png" alt="" title="" width="16px" height="22px"> <img src="http://sera-ibid.stagingapps.net/assets/images/icon/Transaksi.png" alt="" title="" width="" height="" class="ic_fixed"></p>
                           </a>
                           <ul class="dropdown-menu dropdown-custom">
                              <li>
                                 <p class="title-dropdown">Transaksi</p>
                              </li>
                              <li class="input-dropdown">
                                 <h2>Butuh Tindakan</h2>
                                 <form>
                                    <div class="form-group floating-label">
                                       <input type="name" name="" class="form-control" placeholder="">
                                       <label class="label-schedule">Harga Dasar</label>
                                    </div>
                                    <div class="form-group floating-label">
                                       <input type="name" name="" class="form-control" placeholder="">
                                       <label class="label-schedule">Harga Dasar</label>
                                    </div>
                                    <div class="form-group floating-label">
                                       <input type="name" name="" class="form-control" placeholder="">
                                       <label class="label-schedule">Harga Dasar</label>
                                    </div>
                                 </form>
                                 <h2>Transaksi Terakhir</h2>
                                 <a href="">
                                    <div class="transaction-image">
                                       <img src="http://sera-ibid.stagingapps.net/assets/images/background/3.jpg" alt="" title="">
                                    </div>
                                    <div class="transaction-content">
                                       <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT 2014</h2>
                                       <p>No. NPL #002 <span>Rp. 418,000,000</span></p>
                                    </div>
                                 </a>
                              </li>
                              <li class="text-center">
                                 <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                              </li>
                           </ul>
                        </li>
                        <li class="dropdown hidden-mob">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <p><img src="http://sera-ibid.stagingapps.net/assets/images/icon/bell.png" alt="" title="" width="16px" height="22px"><img src="http://sera-ibid.stagingapps.net/assets/images/icon/Notifikasi.png" alt="" title="" width="" height="" class="ic_fixed"> <span class="notification">10</span></p>
                           </a>
                           <ul class="dropdown-menu dropdown-custom">
                              <li>
                                 <p class="title-dropdown">Notifikasi</p>
                              </li>
                              <li class="clearfix">
                                 <a href="#">
                                    <div class="media-image">
                                       <img src="<?php echo base_url('assetsfront/images/icon/ic_notif_1.png');?>" alt="" title="">
                                    </div>
                                    <div class="media-content">
                                       <h2>1 Pesan Email</h2>
                                       <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                    </div>
                                 </a>
                              </li>
                              <li class="clearfix">
                                 <a href="#">
                                    <div class="media-image">
                                       <img src="<?php echo base_url('assetsfront/images/icon/ic_notif_2.png'); ?>" alt="" title="">
                                    </div>
                                    <div class="media-content">
                                       <h2>1 Pesan Email</h2>
                                       <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                    </div>
                                 </a>
                              </li>
                              <li class="clearfix">
                                 <a href="#">
                                    <div class="media-image">
                                       <img src="<?php echo base_url('assetsfront/images/icon/ic_notif_3.png'); ?>" alt="" title="">
                                    </div>
                                    <div class="media-content">
                                       <h2>1 Pesan Email</h2>
                                       <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                    </div>
                                 </a>
                              </li>
                              <li class="text-center">
                                 <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                              </li>
                           </ul>
                        </li>
                        <li class="dropdown hidden-mob">
                           <a href="#" class="dropdown-toggle box-profile" data-toggle="dropdown">
                              <span class="photo-profile">
                                 <img src="https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg" alt="" title="profile">
                              </span>
                              <div class="profile-name">
                                 <?php echo @$userdata['namefront'] ?>
                                 <span class="fa fa-angle-down"></span>
                              </div>
                           </a>
                           <ul class="dropdown-menu dropdown-profile">
                              <li class="clearfix">
                                 <a href="<?php echo site_url('akun/dasbor/') ?>" class="clearfix">
                                    <!-- <div class="content-profile col-md-6">
                                       <img src="<?php echo base_url('assetsfront/images/background/slide-1.jpg'); ?>" alt="" title="profile">
                                    </div> -->
                                    <p class="col-md-12"><?php echo $userdata['namefront'] ?> <span><?php echo $userdata['emailfront']; ?></span></p>
                                 </a>
                              </li>
                              <li>
                                 <hr />
                              </li>
                              <li class="text-center">
                                 <button  class="btn btn-logout" onclick="location.href='<?php echo site_url('logout'); ?>'">Keluar</button>
                              </li>
                           </ul>
                        </li>



                        <?php } else { ?>
                        <li class="hidden-mob"><a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a></li>
                        <li class="hidden-mob"><a href="<?php echo site_url('register') ?>" class="regis">Daftar</a></li>

                        <?php } ?>
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

         <?php if($this->uri->segment(1)=="" OR $this->uri->segment(1)=="front") { ?> 
            <div class="hero-overlay">
               <h1>Search, Bid <span>&</span> Buy From <br>Anywhere on Any Device</h1>
               <p>IBID-Balai Lelang Serasi merupakan balai lelang terbesar di Indonesia. Temukan lebih dari 5000 kendaraan dengan beragam tipe dan merek yang rutin dilelang tiap bulan.</p>
            </div>
         </header>
         <?php } ?>
<?php } ?>