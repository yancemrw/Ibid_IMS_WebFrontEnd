<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">
<h4>A PHP Error was encountered</h4>
<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>
<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
			<p style="margin-left:10px">
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>
</div-->

<html>
	<head>
		<title>PHP Error</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/style.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/responsive.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/css/overwrite.css'); ?>">
	</head>
	<body>
		<div style="padding:0; text-align:center;">
			<section class="error-message">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="image-message">
								<img src='<?php echo base_url('assetsfront/images/background/500.png'); ?>' />
							</div>
							<p><?php echo $message; ?></p>
							<?php echo (@$filepath) ? $filepath : ''; ?>
							<p>Muat ulang halaman browser anda</p>
							<button class="btn btn-green cursor-pointer" onclick="location.href='<?php echo site_url(); ?>'">KEMBALI KE HALAMAN UTAMA</button>
						</div>
					</div>
				</div>
			</section>
		</div>
   </body>
</html>