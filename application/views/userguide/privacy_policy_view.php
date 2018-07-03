<?php
// get cms data
$urlPrivacy = linkservice('cms')."api/modalpopup/privasi";
$methodPrivacy = 'GET';
$resPrivacy = admsCurl($urlPrivacy, array(), $methodPrivacy);
$privacy = curlGenerate($resPrivacy);
echo $privacy[0]->Content;
?>
