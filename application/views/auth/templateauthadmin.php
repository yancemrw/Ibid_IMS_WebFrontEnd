
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title><?php echo @$title; ?></title>

  <!-- Global -->
  <script src="<?php echo base_url('assets_homer'); ?>/javascript/global.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

  <!-- Styles -->
  <link href="<?php echo base_url('assetsadmin/css/core.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assetsadmin/css/app.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assetsadmin/css/style.min.css');?>" rel="stylesheet">
   
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="<?php echo base_url('assetsadmin/img/apple-touch-icon.png');?>">
  <link rel="icon" href="<?php echo base_url('assetsadmin/img/favicon.png');?>">
</head>

<body data-provide="pace">

<?php 
          if (@$page != '') 
            $this->load->view($page); 
          else { } ?>




      <script src="<?php echo base_url('assetsadmin/js/core.min.js');?>"></script>
      <script src="<?php echo base_url('assetsadmin/js/app.js');?>"></script>
      <script src="<?php echo base_url('assetsadmin/js/script.min.js');?>"></script>
    </body>
    </html>
