<?php

// kumpulan link services
function linkservice($services) {
	// kalo pengen jalan diawanesia komen dibawah di aktifkan saja  
	$BACKEND = ('BACKEND' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/adms/index.php/' : '';
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/akun/index.php/' : ''; 
	$NOTIF = ('NOTIF' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/notif/index.php/' : ''; 
	$TAKSASI =  ('TAKSASI' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/taksasi/index.php/' : ''; 
	$FRONTEND = ('FRONTEND' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/index.php/' : '';
	$HANDOVER = ('HANDOVER' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/handover/index.php/' : '';
	$STOCK = ('STOCK' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/stok/index.php/' : '';
	$MASTER = ('MASTER' == strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/masterdata/index.php/' : '';
	$FINANCE = ('FINANCE' === strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/finance/index.php/' : '';
	$NPL = ('NPL' === strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/service/npl/index.php/' : '';
	$CMS = ('CMS' === strtoupper($services)) ? $return = 'http://alpha.ibid.astra.co.id/backend/dapur/' : '';

	return $return;
}

?>
