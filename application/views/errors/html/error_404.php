<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>404 Page Not Found</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/style.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/responsive.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/overwrite.css'); ?>">
	</head>
	<body>
		<div style="padding:0; text-align:center;">
			<section class="error-message">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
						<div class="image-message">
							<img src="<?php echo base_url('assetsfront/images/background/404.png'); ?>" alt="">
						</div>
						<p>Oops... Halaman tidak ditemukan</p>
						<div id="container">
							<h1><?php echo $heading; ?></h1>
							<?php echo $message; ?>
						</div>
						<button class="btn btn-green cursor-pointer" onclick="location.href='<?php echo site_url(); ?>'">KEMBALI KE HALAMAN UTAMA</button>
						</div>
					</div>
				</div>
		    </section>
	    </div>
	</body>
</html>
