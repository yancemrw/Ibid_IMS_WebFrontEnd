<?php
$urlPopUp = linkservice('cms')."api/modalpopup";
$methodPopUp = 'GET';
$resPopUp = admsCurl($urlPopUp, array(), $methodPopUp);
$cmsPopUp = curlGenerate($resPopUp);
?>
<div class="line-height-1-4em">
	<div class="font-14px font-type1"><center><b><?php echo $cmsPopUp[0]->Title; ?></b></center></div><br />
	<div class="font-12px font-type1"><?php echo $cmsPopUp[0]->Content; ?></div>
</div>