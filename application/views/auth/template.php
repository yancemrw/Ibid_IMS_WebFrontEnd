<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?php echo @$title; ?></title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles --> 
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/styles/style.css">
    
    <script src="<?php echo base_url('assets_homer'); ?>/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url('assets_homer'); ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('assets_homer'); ?>/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url('assets_homer'); ?>/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    
</head>
<body class="fixed-navbar fixed-sidebar"><body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div> 


<div class="color-line"></div>
<?php 
          if (@$page != '') 
            $this->load->view($page); 
          else { } ?>

<!-- Vendor scripts -->
<script src="<?php echo base_url('assets_homer'); ?>/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo base_url('assets_homer'); ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets_homer'); ?>/vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url('assets_homer'); ?>/scripts/homer.js"></script>

</body>
</html>
</html>