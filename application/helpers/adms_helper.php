<?php

// kumpulan link services
function linkservice($services) {
	/*
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
	$CMS		= ('CMS' === strtoupper($services)) ? $return = 'http://localhost/backend/dapur/' : '';
	*/

	$BACKEND   = ('BACKEND' == strtoupper($services)) ? $return = 'http://localhost/backend/adms/' : ''; 
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://localhost/backend/service/akun/' : '';  
	$NOTIF     = ('NOTIF' == strtoupper($services)) ? $return = 'http://localhost/backend/service/notif/' : '';  
	$TAKSASI   =  ('TAKSASI' == strtoupper($services)) ? $return = 'http://localhost/backend/service/taksasi/' : '';  
	$FRONTEND   = ('FRONTEND' == strtoupper($services)) ? $return = 'http://localhost/' : ''; 
	$HANDOVER   = ('HANDOVER' == strtoupper($services)) ? $return = 'http://localhost/backend/service/handover/' : ''; 
	$STOCK     = ('STOCK' == strtoupper($services)) ? $return = 'http://localhost/backend/service/stok/' : ''; 
	$MASTER   = ('MASTER' == strtoupper($services)) ? $return = 'http://localhost/backend/service/masterdata/' : ''; 
	$FINANCE   = ('FINANCE' === strtoupper($services)) ? $return = 'http://localhost/backend/service/finance/' : ''; 
	$NPL      = ('NPL' === strtoupper($services)) ? $return = 'http://localhost/backend/service/npl/' : ''; 
	$CMS    = ('CMS' === strtoupper($services)) ? $return = 'http://localhost/backend/dapur/' : ''; 
	
	$AMSSCHEDULE    = ('AMSSCHEDULE' === strtoupper($services)) ? $return = 'http://localhost/backend/serviceams/schedule/api/' : ''; 
	$AMSSTOCK    = ('AMSSTOCK' === strtoupper($services)) ? $return = 'http://localhost/backend/serviceams/stock/api/' : ''; 
	$AMSAUTOBID    = ('AMSAUTOBID' === strtoupper($services)) ? $return = 'http://localhost/backend/serviceams/autobid/api/' : '';
	$AMSAUCTION    = ('AMSAUCTION' === strtoupper($services)) ? $return = 'http://localhost/backend/serviceams/auction/api/' : '';
	
	return $return;
}

?>
