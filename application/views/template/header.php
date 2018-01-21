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
   <script type="text/javascript" src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script>
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
<body class="bg-grey">
   <input type="hidden" id="e8df0fade2ce52c6a8cf8c8d2309d08a" />
   <!-- handle header between procedure page and other page -->
   <?php if(@$menu_pages) { ?>
      <header class="header-min <?php echo $class_header; ?>" style="background: url(<?php echo $bgheader; ?>)no-repeat fixed;">
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
                     <a class="navbar-brand icon_logo" alt="" href="<?php echo base_url(); ?>"><i class="icn icn-LOGO-IBID"></i></a>
                     <div class="nav-header-right">
                        <?php echo $form_auth_mobile; ?>
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
                        <?php echo @$form_auth; ?>
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
   <?php echo ($this->uri->segment(1) != "akun") ? '<div id="content">' : ''; ?>

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
                     <div class="nav-header-right">
                        <?php echo $form_auth_mobile; ?>
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
                        <?php echo $form_auth; ?>
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

         <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "front") { ?> 
            <div class="hero-overlay hero-overlay-home">
               <?php echo $content->tagline->Title; ?>
               <?php echo $content->tagline->Content; ?>
            </div>
         </header>
         <?php } ?>
   <?php echo ($this->uri->segment(1) != "akun") ? '<div>' : ''; ?>
<?php } ?>
<?php if(@$menu_pages) {
   echo '</div>';
 } ?>