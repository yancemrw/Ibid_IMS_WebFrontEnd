<?php

// kumpulan link services
function linkservice($services) {
	// kalo pengen jalan diawanesia komen dibawah di aktifkan saja
	$BACKEND 	= ('BACKEND' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/adms/' : '';
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/account/' : ''; 
	$NOTIF 		= ('NOTIF' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/notif/' : ''; 
	$TAKSASI 	=  ('TAKSASI' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/taksasi/' : ''; 
	$FRONTEND 	= ('FRONTEND' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/' : '';
	$HANDOVER 	= ('HANDOVER' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/handover/' : '';
	$STOCK 		= ('STOCK' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/stock/' : '';
	$MASTER 	= ('MASTER' == strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/masterdata/' : '';
	$FINANCE 	= ('FINANCE' === strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/finance/' : '';
	$NPL  		= ('NPL' === strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/npl/' : '';
	$CMS		= ('CMS' === strtoupper($services)) ? $return = 'http://beta.ibid.astra.co.id/backend/service/cms/' : '';

	return $return;
}

?>
