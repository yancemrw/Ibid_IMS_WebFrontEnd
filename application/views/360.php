<!DOCTYPE html>
<html> 
<head> 
	<title>Gambar 360&deg;</title>
	<meta name="description" content=""/> 
	<meta name="author" content=""> <meta charset="UTF-8"> 
	<link href="<?php echo base_url('assetsfront/assets360/style.css'); ?>" media="all" rel="stylesheet" type="text/css" />
	
	<!-- script src="jquery.11.js"></script --> 
	<script src="<?php echo base_url('assetsfront/assets360/jquery.min.js'); ?>"></script>
	
	<script>/* If you want to stop starting auto scroll panorama just change 'false' value below. */ var autoScrol=true; </script> 
</head>
<body>
	<img id="panoramaImage" src="<?php echo base_url('assetsfront/images/background/360.jpg'); ?>">
	<!--img id="panoramaImage" src="<?php echo $img; ?>"-->
	<div id="panorama"> 
		<span id="fullScreenMode" >
			<span id="fullscreenPan">
				<img src="<?php echo base_url('assetsfront/assets360/fullscreen.png'); ?>">
			</span>
		</span> 
	</div>
	<div class="top_buttons">
		<span id="backBtn"> 
			<span class="backBtn"><a href="<?php echo @$urlBack; ?>"><i id="pButton" class="fa fa-arrow-circle-left"></i></a></span> 
		</span>
	</div>
	<div class="keys">
		<div class="zoom_conrol">
			<span id="zoom_in"><img class="zoom" src="<?php echo base_url('assetsfront/assets360/zoom-in.png'); ?>"></span>
			<span id="zoom_out"><img class="zoom" src="<?php echo base_url('assetsfront/assets360/zoom-out.png'); ?>"></span> 
		</div>
		<div class="control-key"> 
			<img class="control_keys" id="left_key" src="<?php echo base_url('assetsfront/assets360/left_button.PNG'); ?>"> 
			<img class="control_keys" id="right_key" src="<?php echo base_url('assetsfront/assets360/right_button.PNG'); ?>">
			<img class="control_keys" id="up_key" src="<?php echo base_url('assetsfront/assets360/up_button.PNG'); ?>"> 
			<img class="control_keys" id="down_key" src="<?php echo base_url('assetsfront/assets360/down_button.PNG'); ?>"> 
			<img class="control_keys" id="elipse_key" src="<?php echo base_url('assetsfront/assets360/elipse.PNG'); ?>">
		</div>
	</div>
	<script src="<?php echo base_url('assetsfront/assets360/three.min.js'); ?>"></script> 
	<script src="<?php echo base_url('assetsfront/assets360/jquery.fullscreen.js'); ?>">
		
	</script>
	<script src="<?php echo base_url('assetsfront/assets360/mousetrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assetsfront/assets360/360.js'); ?>"></script>
</body>
</html>