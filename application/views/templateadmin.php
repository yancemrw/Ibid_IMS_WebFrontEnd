
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title><?php echo @$title; ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

  <!-- Styles -->
  <link href="<?php echo base_url('assetsadmin/css/core.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assetsadmin/css/app.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assetsadmin/css/style.min.css');?>" rel="stylesheet">
  <style type="text/css">
  .table {
    width: 100%;
  }
</style>
<!-- Favicons -->
<link rel="apple-touch-icon" href="<?php echo base_url('assetsadmin/img/apple-touch-icon.png');?>">
<link rel="icon" href="<?php echo base_url('assetsadmin/img/favicon.png');?>">

</head>


<body data-provide="pace">

  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="spinner-dots">
      <img src="http://ibid.astra.co.id/online/themes/default/logo.png"> <br> <br> 
      <span class="dot1"></span>
      <span class="dot2"></span>
      <span class="dot3"></span>
    </div>
  </div> -->



  <!-- Sidebar -->
  <!-- <header class="sidebar-header">
        <a class="logo-icon" href="../index.html"><img src="../assets/img/logo-icon-light.png" alt="logo icon"></a>
        <span class="logo">
          <a href="../index.html"><img src="../assets/img/logo-light.png" alt="logo"></a>
        </span>
      <div></div></header>
    -->
    <aside class="sidebar sidebar-icons-boxed ">
      <header class="sidebar-header">
        <a class="logo-icon" href="<?php echo site_url(); ?>"><img src="<?php echo base_url('ibid.png') ?>" alt="logo icon"></a>
        <span class="logo">
          <a href="">IBID ADMS</a>
        </span>
        <span class="sidebar-toggle-fold"></span>
      </header>

      <nav class="sidebar-navigation">

       <ul class="menu">
      <!--  <li class="menu-item">
        <a class="menu-link" href="../dashboard/general.html">
          <span class="title">Dashboard</span>
        </a>
      </li>   -->

      
       <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-user"></span>
          <span class="title">Customer Management</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">

          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/corporate/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Customer Corporate</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/usersB2C/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Customer Personal</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-check-square"></span>
          <span class="title">Taksasi</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/schedule/search/'); ?>">
              <span class="dot"></span>
              <span class="title">Schedule Taksasi</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/scheduleBooking/search/'); ?>">
              <span class="dot"></span>
              <span class="title">Schedule Customer</span>
            </a> 
          </li>

        </ul>
      </li>


      <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-file-text-o"></span>
          <span class="title">Master</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/item/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Item</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/warna/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Color</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/model/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Model</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/cabang/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Cabang
              </span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/holiday/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Holiday</span>
            </a> 
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/expeditiontype/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Tipe Expedition</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/master/expeditionType/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Expedition Type</span>
            </a> 
          </li>

        </ul>
      </li>


      <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-archive"></span>
          <span class="title">Stock</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/stock/itemstock/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Item Register</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/item/uploads/uploadlists/index/5092/'); ?>">
              <span class="dot"></span>
              <span class="title">Upload Item</span>
            </a> 
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('stock/favorite/lists'); ?>">
              <span class="dot"></span>
              <span class="title">Favorite</span>
            </a> 
          </li>
        </ul>
      </li>

      <li class="menu-item ">
        <a class="menu-link" href="#">
          <span class="icon fa fa-money"></span>
          <span class="title">Document In</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item ">
            <a class="menu-link" href="<?php echo site_url('handover/bastin/lists') ?>">
              <span class="dot"></span>
              <span class="title">BAST In</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item ">
        <a class="menu-link" href="#">
          <span class="icon fa fa-money"></span>
          <span class="title">Document Out</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item ">
            <a class="menu-link" href="<?php echo site_url('handover/bastout/lists') ?>">
              <span class="dot"></span>
              <span class="title">BAST Out</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-handshake-o "></span>
          <span class="title">HandOver</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/expeditionorder/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Expedition Item</span>
            </a>
          </li>
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/expeditioncourier/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">Expedition Courier</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-item ">
        <a class="menu-link" href="#">
          <span class="icon fa fa-money"></span>
          <span class="title">Finance</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item ">
            <a class="menu-link" href="<?php echo site_url('FeePromo/lists') ?>">
              <span class="dot"></span>
              <span class="title">Promo</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- User -->

      <li class="menu-item">
        <a class="menu-link" href="#">
          <span class="icon fa fa-user"></span>
          <span class="title">User Management</span>
          <span class="arrow"></span>
        </a>

        <ul class="menu-submenu">
          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('/users/lists/'); ?>">
              <span class="dot"></span>
              <span class="title">User Lists</span>
            </a>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="<?php echo site_url('role/lists'); ?>">
              <span class="dot"></span>
              <span class="title">User Role</span>
            </a>
          </li>

          

        </ul>
      </li>


     

    </nav>

  </nav>

</aside>
<!-- END Sidebar -->


<!-- Topbar -->
<header class="topbar">
  <div class="topbar-left">
    <!-- <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span> -->

    <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
      <i class="material-icons fullscreen-default">fullscreen</i>
      <i class="material-icons fullscreen-active">fullscreen_exit</i>
    </a>

    <div class="dropdown d-none d-md-block">
      <span class="topbar-btn" data-toggle="dropdown"><i class="ti-layout-grid3-alt"></i></span>
      <div class="dropdown-menu dropdown-grid">
        <a class="dropdown-item" href="../dashboard/general.html">
          <span data-i8-icon="home"></span>
          <span class="title">Dashboard</span>
        </a>
        <a class="dropdown-item" href="../page/gallery.html">
          <span data-i8-icon="stack_of_photos"></span>
          <span class="title">Gallery</span>
        </a>
        <a class="dropdown-item" href="../page/search.html">
          <span data-i8-icon="search"></span>
          <span class="title">Search</span>
        </a>
        <a class="dropdown-item" href="../page-app/calendar.html">
          <span data-i8-icon="calendar"></span>
          <span class="title">Calendar</span>
        </a>
        <a class="dropdown-item" href="../page-app/chat.html">
          <span data-i8-icon="sms"></span>
          <span class="title">Chat</span>
        </a>
        <a class="dropdown-item" href="../page-app/mailbox.html">
          <span data-i8-icon="invite"></span>
          <span class="title">Emails</span>
        </a>
        <a class="dropdown-item" href="../page-app/users.html">
          <span data-i8-icon="contacts"></span>
          <span class="title">Contacts</span>
        </a>
        <a class="dropdown-item" href="../widget/chart.html">
          <span data-i8-icon="bar_chart"></span>
          <span class="title">Charts</span>
        </a>
        <a class="dropdown-item" href="../page/profile.html">
          <span data-i8-icon="businessman"></span>
          <span class="title">Profile</span>
        </a>
      </div>
    </div>

    <div class="topbar-divider d-none d-md-block"></div>

    <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
      <input class="form-control w-300px" type="text">
      <div class="lookup-placeholder">
        <i class="ti-search"></i>
        <span></span>
      </div>
    </div>
  </div>

  <div class="topbar-right"> 

    <ul class="topbar-btns">
      <li class="dropdown">
        <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="../assets/img/avatar/1.jpg" alt="..."></span>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="../page/profile.html"><i class="ti-user"></i> Profile</a>
          <a class="dropdown-item" href="../page-app/mailbox.html">
            <div class="flexbox">
              <i class="ti-email"></i>
              <span class="flex-grow">Inbox</span>
              <span class="badge badge-pill badge-info">5</span>
            </div>
          </a>
          <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../page-extra/user-lock-1.html"><i class="ti-lock"></i> Lock</a>
          <a class="dropdown-item" href="../page-extra/user-login-3.html"><i class="ti-power-off"></i> Logout</a>
        </div>
      </li>

      <!-- Notifications -->
      <li class="dropdown d-none d-md-block">
        <span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>
        <div class="dropdown-menu dropdown-menu-right">

          <div class="media-list media-list-hover media-list-divided media-list-xs">
            <a class="media media-new" href="#">
              <span class="avatar bg-success"><i class="ti-user"></i></span>
              <div class="media-body">
                <p>New user registered</p>
                <time datetime="2017-07-14 20:00">Just now</time>
              </div>
            </a>

            <a class="media" href="#">
              <span class="avatar bg-info"><i class="ti-shopping-cart"></i></span>
              <div class="media-body">
                <p>New order received</p>
                <time datetime="2017-07-14 20:00">2 min ago</time>
              </div>
            </a>

            <a class="media" href="#">
              <span class="avatar bg-warning"><i class="ti-face-sad"></i></span>
              <div class="media-body">
                <p>Refund request from <b>Ashlyn Culotta</b></p>
                <time datetime="2017-07-14 20:00">24 min ago</time>
              </div>
            </a>

            <a class="media" href="#">
              <span class="avatar bg-primary"><i class="ti-money"></i></span>
              <div class="media-body">
                <p>New payment has made through PayPal</p>
                <time datetime="2017-07-14 20:00">53 min ago</time>
              </div>
            </a>
          </div>

          <div class="dropdown-footer">
            <div class="left">
              <a href="#">Read all notifications</a>
            </div>

            <div class="right">
              <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
              <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
              <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
            </div>
          </div>

        </div>
      </li>
      <!-- END Notifications -->

      <!-- Messages -->
      <li class="dropdown d-none d-md-block">
        <span class="topbar-btn" data-toggle="dropdown"><i class="ti-email"></i></span>
        <div class="dropdown-menu dropdown-menu-right">

          <div class="media-list media-list-divided media-list-hover media-list-xs scrollable" style="height: 290px">
            <a class="media media-new" href="../page-app/mailbox-single.html">
              <span class="avatar status-success">
                <img src="../assets/img/avatar/1.jpg" alt="...">
              </span>

              <div class="media-body">
                <p><strong>Maryam Amiri</strong> <time class="float-right" datetime="2017-07-14 20:00">23 min ago</time></p>
                <p class="text-truncate">Authoritatively exploit resource maximizing technologies before technically.</p>
              </div>
            </a>

            <a class="media media-new" href="../page-app/mailbox-single.html">
              <span class="avatar status-warning">
                <img src="../assets/img/avatar/2.jpg" alt="...">
              </span>

              <div class="media-body">
                <p><strong>Hossein Shams</strong> <time class="float-right" datetime="2017-07-14 20:00">48 min ago</time></p>
                <p class="text-truncate">Continually plagiarize efficient interfaces after bricks-and-clicks niches.</p>
              </div>
            </a>

            <a class="media" href="../page-app/mailbox-single.html">
              <span class="avatar status-dark">
                <img src="../assets/img/avatar/3.jpg" alt="...">
              </span>

              <div class="media-body">
                <p><strong>Helen Bennett</strong> <time class="float-right" datetime="2017-07-14 20:00">3 hours ago</time></p>
                <p class="text-truncate">Objectively underwhelm cross-unit web-readiness before sticky outsourcing.</p>
              </div>
            </a>

            <a class="media" href="../page-app/mailbox-single.html">
              <span class="avatar status-success bg-purple">FT</span>

              <div class="media-body">
                <p><strong>Fidel Tonn</strong> <time class="float-right" datetime="2017-07-14 20:00">21 hours ago</time></p>
                <p class="text-truncate">Interactively innovate transparent relationships with holistic infrastructures.</p>
              </div>
            </a>

            <a class="media" href="../page-app/mailbox-single.html">
              <span class="avatar status-danger">
                <img src="../assets/img/avatar/4.jpg" alt="...">
              </span>

              <div class="media-body">
                <p><strong>Freddie Arends</strong> <time class="float-right" datetime="2017-07-14 20:00">Yesterday</time></p>
                <p class="text-truncate">Collaboratively visualize corporate initiatives for web-enabled value.</p>
              </div>
            </a>

            <a class="media" href="../page-app/mailbox-single.html">
              <span class="avatar status-success">
                <img src="../assets/img/avatar/5.jpg" alt="...">
              </span>

              <div class="media-body">
                <p><strong>Freddie Arends</strong> <time class="float-right" datetime="2017-07-14 20:00">Yesterday</time></p>
                <p class="text-truncate">Interactively reinvent standards compliant supply chains through next-generation bandwidth.</p>
              </div>
            </a>
          </div>

          <div class="dropdown-footer">
            <div class="left">
              <a href="#">Read all messages</a>
            </div>

            <div class="right">
              <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
              <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
            </div>
          </div>

        </div>
      </li>
      <!-- END Messages -->

    </ul>

  </div>
</header>
<!-- END Topbar -->


<script src="<?php echo base_url('assetsadmin/js/core.min.js');?>"></script>
<script src="<?php echo base_url('assetsadmin/js/app.js');?>"></script>
<script src="<?php echo base_url('assetsadmin/js/script.min.js');?>"></script>

<!-- Global -->
<script src="<?php echo base_url('assets_homer'); ?>/javascript/global.js"></script>

<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsadmin/vendor/datatables/css/dataTables.bootstrap4.css');?>">
<script type="text/javascript" src="<?php echo base_url('assetsadmin/vendor/datatables/js/jquery.dataTables.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assetsadmin/vendor/datatables/js/dataTables.bootstrap4.js');?>"></script>

<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsadmin/css/global.css');?>">

<br><br>
<!-- Start Page --> 
<?php if (@$page != '') { $this->load->view($page); } ?>
<!--  End Page -->  

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsadmin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css');?>">

<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsadmin/vendor/datatables/css/dataTables.bootstrap4.css');?>">
<script type="text/javascript" src="<?php echo base_url('assetsadmin/vendor/datatables/js/jquery.dataTables.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assetsadmin/vendor/datatables/js/dataTables.bootstrap4.js');?>"></script>

<style>.dataTables_filter{ float: left; }</style>


<!-- Notification Alert  Duration -->
<script type="text/javascript">
  $(".alert").fadeTo(4000, 500).slideUp(500, function(){
    $(".alert").slideUp(5000);
  });
</script>
<!-- End -->

</body>
</html> 
