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
	$CMS		= ('CMS' === strtoupper($services)) ? $return = 'http://charlie.ibid.astra.co.id/backend/dapur/' : '';
	*/

	$BACKEND   = ('BACKEND' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/adms/' : ''; 
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/akun/' : '';  
	$NOTIF     = ('NOTIF' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/notif/' : '';  
	$TAKSASI   =  ('TAKSASI' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/taksasi/' : '';  
	$FRONTEND   = ('FRONTEND' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/' : ''; 
	$HANDOVER   = ('HANDOVER' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/handover/' : ''; 
	$STOCK     = ('STOCK' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/stok/' : ''; 
	$MASTER   = ('MASTER' == strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/masterdata/' : ''; 
	$FINANCE   = ('FINANCE' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/finance/' : ''; 
	$NPL      = ('NPL' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/service/npl/' : ''; 
	$CMS    = ('CMS' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/dapur/' : ''; 
	
	$AMSSCHEDULE    = ('AMSSCHEDULE' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/serviceams/schedule/api/' : ''; 
	$AMSSTOCK    = ('AMSSTOCK' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/serviceams/stock/api/' : ''; 
	$AMSAUTOBID    = ('AMSAUTOBID' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/serviceams/autobid/api/' : '';
	$AMSAUCTION    = ('AMSAUCTION' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/serviceams/auction/api/' : '';
	$AMSLOT    = ('AMSLOT' === strtoupper($services)) ? $return = 'https://charlie.ibid.astra.co.id/backend/serviceams/lot/api/' : '';
	$IMG_PATH = ('IMGS' === strtoupper($services)) ? $return = 'http://img.ibid.astra.co.id/uploads/upload360/' : '';
	
	return $return;
}

?>
