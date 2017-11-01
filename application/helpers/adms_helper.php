<?php 

// kumpulan link services

function linkservice($services)
{
	// ini running development lutfi
	// $ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://localhost:8888/ibiddevelopment/apiaccount/Ibid_ADMS_ServiceAccount/index.php/' : ''; 
	// $BACKEND = ('BACKEND' == strtoupper($services)) ? $return = 'http://localhost:8888/ibiddevelopment/admsbe/Ibid_ADMS_WebBackend/index.php/' : '';
	// $MASTER = ('MASTER' == strtoupper($services)) ? $return = 'http://localhost:8888/ibiddevelopment/admsmaster/Ibid_ADMS_ServiceMasterData/index.php/' : '';
	// $STOCK = ('STOCK' == strtoupper($services)) ? $return = 'http://localhost:8888/ibiddevelopment/admsstok/Ibid_ADMS_ServiceStock/index.php/' : '';
	// $NOTIF = ('NOTIF' == strtoupper($services)) ? $return = 'http://ibid.awanesia.com/Ibid_ADMS_ServiceNotification/index.php/' : ''; 
	// $TAKSASI =  ('TAKSASI' == strtoupper($services)) ? $return = 'http://ibid.awanesia.com/Ibid_ADMS_ServiceTaksasi/index.php/' : ''; 
	// $FRONTEND = ('FRONTEND' == strtoupper($services)) ? $return = 'http://ibidimsdevweb.azurewebsites.net/index.php/' : '';
	// $HANDOVER = ('HANDOVER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicehandover.azurewebsites.net/index.php/' : '';
	// end 

	// kalo pengen jalan diawanesia komen dibawah di aktifkan saja  
	$BACKEND = ('BACKEND' == strtoupper($services)) ? $return = 'http://ibidadmsdevweb.azurewebsites.net/index.php/' : '';
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://ibidadmsdevserviceaccount.azurewebsites.net/index.php/' : ''; 
	$NOTIF = ('NOTIF' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicenotification.azurewebsites.net/index.php/' : ''; 
	$TAKSASI =  ('TAKSASI' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicetaksasi.azurewebsites.net/index.php/' : ''; 
	$FRONTEND = ('FRONTEND' == strtoupper($services)) ? $return = 'http://ibidimsdevweb.azurewebsites.net/index.php/' : '';
	$HANDOVER = ('HANDOVER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicehandover.azurewebsites.net/index.php/' : '';
	$STOCK = ('STOCK' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicestock.azurewebsites.net/index.php/' : '';
	$MASTER = ('MASTER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/' : '';
	$FINANCE = ('FINANCE' === strtoupper($services)) ? $return = 'http://ibidadmsdevservicefinance.azurewebsites.net/index.php/' : '';

	$FINANCE = ('FRONTEND' === strtoupper($services)) ? $return = 'http://ibidadmsdevwebfront.azurewebsites.net/index.php/' : '';

	$FINANCE = ('NPL' === strtoupper($services)) ? $return = 'http://ibidadmsdevservicenpl.azurewebsites.net/index.php/' : '';

	return $return;
}

?>
