<?php

// kumpulan link services
function linkservice($services) {
	// kalo pengen jalan diawanesia komen dibawah di aktifkan saja
	$BACKEND 	= ('BACKEND' == strtoupper($services)) ? $return = 'http://ibidadmsdevweb.azurewebsites.net/index.php/' : '';
	$ACCOUNT 	= ('ACCOUNT' == strtoupper($services)) ? $return = 'http://ibidadmsdevserviceaccount.azurewebsites.net/index.php/' : ''; 
	$NOTIF 		= ('NOTIF' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicenotification.azurewebsites.net/index.php/' : ''; 
	$TAKSASI 	=  ('TAKSASI' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicetaksasi.azurewebsites.net/index.php/' : ''; 
	$FRONTEND 	= ('FRONTEND' == strtoupper($services)) ? $return = 'http://ibidadmsdevwebfront.azurewebsites.net/index.php/' : '';
	$HANDOVER 	= ('HANDOVER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicehandover.azurewebsites.net/index.php/' : '';
	$STOCK 		= ('STOCK' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicestock.azurewebsites.net/index.php/' : '';
	$MASTER 	= ('MASTER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/' : '';
	$FINANCE 	= ('FINANCE' === strtoupper($services)) ? $return = 'http://ibidadmsdevservicefinance.azurewebsites.net/index.php/' : '';
	$NPL  		= ('NPL' === strtoupper($services)) ? $return = 'http://ibidadmsdevservicenpl.azurewebsites.net/index.php/' : '';
	$CMS		= ('CMS' === strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/dapur/' : '';

	return $return;
}

?>