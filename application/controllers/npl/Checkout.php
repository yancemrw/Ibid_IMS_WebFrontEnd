<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller { 

	function index(){
		$this->load->library('cart');
		$methodeBayar = $_POST['tipe_methode'];
		
		$BiodataId = @$_SESSION['userdata']['UserId'];
		$Total = $this->cart->total() + 100000;
		$arrayTransaksi = array(
			'BiodataId' => $BiodataId,
			'DateTransactionNPL' => date('Y-m-d'),
			'TransactionFrom' => 'Website',
			'Total' => $Total,
			'StsPaid' => '0',
			'StsCanceled' => '0',
			'PaymentTypeId' => $methodeBayar,
			'CreateDate' => date('Y-m-d H:i:s'),
		);
		
		foreach ($this->cart->contents() as $items){
			if ($items['options']['Tipe NPL'] == 1) @$NPLType = 'Online';
			else if ($items['options']['Tipe NPL'] == 0) @$NPLType = 'Live';
			else if ($items['options']['Tipe NPL'] == 5) $NPLType = 'Unlimited';
			$arrayTransaksiDetail[] = array(
				'ScheduleId' => $items['id'],
				'ItemId' => $items['options']['ItemId'],
				'NPLType' => $NPLType,
				'tipeLelangId' => $items['options']['tipeLelangId'],
				'QtyNPL' => $items['qty'],
				'AmountNPL' => $items['price'],
				'BiodataId' => $BiodataId,
				'CompanyId' => $items['options']['CompanyId'],
				'ObjectId' => $items['options']['ObjectId'],
			);
		}
		
		$arrayKirim = array(
			'arrayTransaksi' => @$arrayTransaksi,
			'arrayTransaksiDetail' => @$arrayTransaksiDetail,
		);
		
		
		
		## send data registrasi
		$url = linkservice('npl') .'counter/pembelian/add';
		$method = 'POST';
		$responseApi = admsCurl($url, $arrayKirim, $method);
		
		## email(belum)
		if ($responseApi['err']) {
			echo "<hr>cURL Error #:" . $responseApi['err'];
		} else { 
			$responseApiInsert = json_decode($responseApi['response'], true);
			if ($responseApiInsert['status'] == 1){
				
				##################
				## delete cart
				$this->cart->destroy();
				##################
				
				$TransactionId = $responseApiInsert['data'][0];

				$md5 = md5($TransactionId);
				$kodeTransaksi = substr($md5,0,5).' '.substr($md5,-5);
				$thisImgBarcodePath = $this->barcode($kodeTransaksi, 100);
				
				$_SESSION['userdata']['thisBarcodeTransaction'] = $thisImgBarcodePath;
				
				
				$this->session->set_flashdata('message', array('success', $responseApiInsert['message']));
				
				## detail biodata
				$id = $_SESSION['userdata']['UserId'];
				$url = linkservice('account') ."users/details/".$id;
				$method = 'GET';
				$responseApi = admsCurl($url, array('tipePengambilan' => 'dropdownlist'), $method);
				if($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } 
				else { $dataApiDetail = json_decode($responseApi['response'], true); }
				$detailBiodata = @$dataApiDetail['data']['users'];
				
				if ($methodeBayar == 4){

					$arr = array(
						'aksi'	=> 'redir',
						'url'	=> site_url('npl/success'),
					);
					echo json_encode($arr);
					#kirim email
					$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath);
					die();
				}
				else if ($methodeBayar == 3){
					$arr = array(
						'aksi'	=> 'cc',
						'url'	=> linkservice('FINANCE') .'doku/cc',
						'TransactionId'	=> $TransactionId,
						'code'	=> $kodeTransaksi,
						'bill'	=> $Total,
					);
					echo json_encode($arr);
					#kirim email
					$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath);
					die();
				}
				else if ($methodeBayar == 2){
					
					$arrayKirim = array(
						'chain_merchant' => 'NA',
						'amount' => $Total,
						'invoice' => $kodeTransaksi,
						'email' => @$detailBiodata['Email'],
						'name' => @$detailBiodata['first_name'].' '.@$detailBiodata['last_name'],
						'phone' => @$detailBiodata['Phone'],
					);
					$url = linkservice('FINANCE') .'doku/va/request';
					$method = 'POST';
					$responseApi = admsCurl($url, $arrayKirim, $method);
					if ($responseApi['err']) {
						echo "<hr>cURL Error #:" . $responseApi['err'];
					} 
					else {
						$dataApiDetail = json_decode($responseApi['response'], true); 
						$_SESSION['userdata']['thisVa'] = @$dataApiDetail['data']['va_mandiri'];
						$_SESSION['userdata']['kodeTransaksi'] = @$kodeTransaksi;
						
						## update VA mandiri
						$postTransaksi['whereData'] = array('CodeTransactionNPL' => $kodeTransaksi);
						$postTransaksi['updateData'] = array(
							'VANumber' => $dataApiDetail['data']['va_mandiri'], 
							'VABank' => 'Mandiri'
						);
						$url = linkservice('npl') .'counter/transaksi/edit';
						$method = 'POST';
						$updateVa = admsCurl($url, $postTransaksi, $method);
					}
					
					$arr = array(
						'aksi'	=> 'va',
						'url'	=> site_url('npl/vadetail'),
						'code'	=> $kodeTransaksi,
						'bill'	=> $Total,
					);
					echo json_encode($arr);
					#kirim email
					$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath);
					die();
				}
				else if ($methodeBayar == 1){ 
					
					$arrayKirim = array(
						'chain_merchant' => 'NA',
						'amount' => $Total,
						'invoice' => $kodeTransaksi,
						'email' => @$detailBiodata['Email'],
						'name' => @$detailBiodata['first_name'].' '.@$detailBiodata['last_name'],
						'phone' => @$detailBiodata['Phone'],
					);
					$url = linkservice('FINANCE') .'doku/va/request';
					$method = 'POST';
					$responseApi = admsCurl($url, $arrayKirim, $method);
					if ($responseApi['err']) {
						echo "<hr>cURL Error #:" . $responseApi['err'];
					} 
					else {
						$dataApiDetail = json_decode($responseApi['response'], true); 
						$_SESSION['userdata']['thisVa'] = @$dataApiDetail['data']['va_bca'];
						$_SESSION['userdata']['kodeTransaksi'] = @$kodeTransaksi;
						
						## update VA mandiri
						$postTransaksi['whereData'] = array('CodeTransactionNPL' => $kodeTransaksi);
						$postTransaksi['updateData'] = array(
							'VANumber' => $dataApiDetail['data']['va_bca'], 
							'VABank' => 'BCA'
						);
						$url = linkservice('npl') .'counter/transaksi/edit';
						$method = 'POST';
						$updateVa = admsCurl($url, $postTransaksi, $method);
					}
					
					$arr = array(
						'aksi'	=> 'va',
						'url'	=> site_url('npl/vadetail'),
						'code'	=> $kodeTransaksi,
						'bill'	=> $Total,
					);
					echo json_encode($arr);
					
					#kirim email
					$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath);

					die();
				}
				
			} else if ($responseApiInsert['status'] == 0){ 

				$this->session->set_flashdata('message', array('warning', $responseApiInsert['message']));
				// redirect('beli-npl','refresh');

			}
		}
		
		
		
		
		
	}

	function barcode( $text="0", $size="100", $filepath="", $orientation="horizontal", $code_type="code128", $print=true, $SizeFactor=1.6 ) {
		$code_string = "";
		// Translate the $text into barcode the correct $code_type
		if ( in_array(strtolower($code_type), array("code128", "code128b")) ) {
			$chksum = 104;
			// Must not change order of array elements as the checksum depends on the array's key to validate final code
			$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
			$code_keys = array_keys($code_array);
			$code_values = array_flip($code_keys);
			for ( $X = 1; $X <= strlen($text); $X++ ) {
				$activeKey = substr( $text, ($X-1), 1);
				$code_string .= $code_array[$activeKey];
				$chksum=($chksum + ($code_values[$activeKey] * $X));
			}
			$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

			$code_string = "211214" . $code_string . "2331112";
		}
		elseif ( strtolower($code_type) == "code128a" ) {
			$chksum = 103;
			$text = strtoupper($text); // Code 128A doesn't support lower case
			// Must not change order of array elements as the checksum depends on the array's key to validate final code
			$code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","NUL"=>"111422","SOH"=>"121124","STX"=>"121421","ETX"=>"141122","EOT"=>"141221","ENQ"=>"112214","ACK"=>"112412","BEL"=>"122114","BS"=>"122411","HT"=>"142112","LF"=>"142211","VT"=>"241211","FF"=>"221114","CR"=>"413111","SO"=>"241112","SI"=>"134111","DLE"=>"111242","DC1"=>"121142","DC2"=>"121241","DC3"=>"114212","DC4"=>"124112","NAK"=>"124211","SYN"=>"411212","ETB"=>"421112","CAN"=>"421211","EM"=>"212141","SUB"=>"214121","ESC"=>"412121","FS"=>"111143","GS"=>"111341","RS"=>"131141","US"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","CODE B"=>"114131","FNC 4"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
			$code_keys = array_keys($code_array);
			$code_values = array_flip($code_keys);
			for ( $X = 1; $X <= strlen($text); $X++ ) {
				$activeKey = substr( $text, ($X-1), 1);
				$code_string .= $code_array[$activeKey];
				$chksum=($chksum + ($code_values[$activeKey] * $X));
			}
			$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

			$code_string = "211412" . $code_string . "2331112";
		}
		elseif ( strtolower($code_type) == "code39" ) {
			$code_array = array("0"=>"111221211","1"=>"211211112","2"=>"112211112","3"=>"212211111","4"=>"111221112","5"=>"211221111","6"=>"112221111","7"=>"111211212","8"=>"211211211","9"=>"112211211","A"=>"211112112","B"=>"112112112","C"=>"212112111","D"=>"111122112","E"=>"211122111","F"=>"112122111","G"=>"111112212","H"=>"211112211","I"=>"112112211","J"=>"111122211","K"=>"211111122","L"=>"112111122","M"=>"212111121","N"=>"111121122","O"=>"211121121","P"=>"112121121","Q"=>"111111222","R"=>"211111221","S"=>"112111221","T"=>"111121221","U"=>"221111112","V"=>"122111112","W"=>"222111111","X"=>"121121112","Y"=>"221121111","Z"=>"122121111","-"=>"121111212","."=>"221111211"," "=>"122111211","$"=>"121212111","/"=>"121211121","+"=>"121112121","%"=>"111212121","*"=>"121121211");

			// Convert to uppercase
			$upper_text = strtoupper($text);

			for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
				$code_string .= $code_array[substr( $upper_text, ($X-1), 1)] . "1";
			}

			$code_string = "1211212111" . $code_string . "121121211";
		}
		elseif ( strtolower($code_type) == "code25" ) {
			$code_array1 = array("1","2","3","4","5","6","7","8","9","0");
			$code_array2 = array("3-1-1-1-3","1-3-1-1-3","3-3-1-1-1","1-1-3-1-3","3-1-3-1-1","1-3-3-1-1","1-1-1-3-3","3-1-1-3-1","1-3-1-3-1","1-1-3-3-1");

			for ( $X = 1; $X <= strlen($text); $X++ ) {
				for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
					if ( substr($text, ($X-1), 1) == $code_array1[$Y] )
						$temp[$X] = $code_array2[$Y];
				}
			}

			for ( $X=1; $X<=strlen($text); $X+=2 ) {
				if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
					$temp1 = explode( "-", $temp[$X] );
					$temp2 = explode( "-", $temp[($X + 1)] );
					for ( $Y = 0; $Y < count($temp1); $Y++ )
						$code_string .= $temp1[$Y] . $temp2[$Y];
				}
			}

			$code_string = "1111" . $code_string . "311";
		} 
		elseif ( strtolower($code_type) == "codabar" ) {
			$code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
			$code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

			// Convert to uppercase
			$upper_text = strtoupper($text);

			for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
				for ( $Y = 0; $Y<count($code_array1); $Y++ ) {
					if ( substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
						$code_string .= $code_array2[$Y] . "1";
				}
			}
			$code_string = "11221211" . $code_string . "1122121";
		}

		// Pad the edges of the barcode
		$code_length = 20;
		if ($print) {
			$text_height = 30;
		} else {
			$text_height = 0;
		}
		
		for ( $i=1; $i <= strlen($code_string); $i++ ){
			$code_length = $code_length + (integer)(substr($code_string,($i-1),1));
			}

		if ( strtolower($orientation) == "horizontal" ) {
			$img_width = $code_length*$SizeFactor;
			$img_height = $size;
		} else {
			$img_width = $size;
			$img_height = $code_length*$SizeFactor;
		}

		$image = imagecreate($img_width, $img_height + $text_height);
		$black = imagecolorallocate ($image, 0, 0, 0);
		$white = imagecolorallocate ($image, 255, 255, 255);

		imagefill( $image, 0, 0, $white );
		if ( $print ) {
			imagestring($image, 5, 31, 100, $text, $black );
		}

		$location = 10;
		for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
			$cur_size = $location + ( substr($code_string, ($position-1), 1) );
			if ( strtolower($orientation) == "horizontal" )
				imagefilledrectangle( $image, $location*$SizeFactor, 0, $cur_size*$SizeFactor, $img_height, ($position % 2 == 0 ? $white : $black) );
			else
				imagefilledrectangle( $image, 0, $location*$SizeFactor, $img_width, $cur_size*$SizeFactor, ($position % 2 == 0 ? $white : $black) );
			$location = $cur_size;
		}
		
		imagepng($image, 'barcode/'.$text.'.png');
		imagedestroy($image);
		$thisImg = base64_encode(file_get_contents('barcode/'.$text.'.png'));
		
		
		// kirim ke ibid gambar
		$urlnya = "http://img.ibid.astra.co.id/uploads/pdi";
		$method = 'POST';
		$parameter = array(
			"img" => "$thisImg" , 
			"idauction" => "npl"
		);

		$responseApi = $this->ngeCurl($urlnya, json_encode($parameter), $method);
		$dataApiDetail = json_decode($responseApi,true); 

		unlink('barcode/'.$text.'.png');
		
		return $namafile1 = $dataApiDetail['data']['image'];
		
	}
	
	function ngeCurl($url, $dataArray = array(), $method='GET' ){
		$ci =& get_instance(); 

		$curl = curl_init();

		curl_setopt_array($curl, array(
			// CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 100000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_URL => $url,
			CURLOPT_POSTFIELDS => $dataArray ,
			CURLOPT_CUSTOMREQUEST => $method,

			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
	}
	
	function sendEmail($kodeTransaksi, $thisImgBarcodePath){
		###############################
		$isiemail = "<html><head>
<title></title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<style type='text/css'>
    /* FONTS */
    @media screen {
        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 400;
          src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 700;
          src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 400;
          src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 700;
          src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
        }
    }

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>
</head>
<body style='background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;'>

<!-- HIDDEN PREHEADER TEXT -->
<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> 
</div>";

$isiemail .= "<table width='100%' cellspacing='0' cellpadding='0' border='0'>
    <!-- LOGO -->
    <tbody><tr>
        <td bgcolor='#33cabb' align='center'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
            <tr>
            <td align='center' valign='top' width='600'>
            <![endif]-->
            <table style='max-width: 600px;' width='100%' cellspacing='0' cellpadding='0' border='0'>
                <tbody><tr>
                    <td style='padding: 80px 10px 80px 10px;' valign='top' align='center'>
                        <a href='http://thetheme.io' target='_blank'>
                            <img alt='Logo' style='display: block; font-family: 'Lato', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;' src='http://ibidadmsdevweb.azurewebsites.net/ibid.png' width='100px' border='0'>
                        </a>
                    </td>
                </tr>
            </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td style='padding: 0px 10px 0px 10px;' bgcolor='#33cabb' align='center'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
            <tr>
            <td align='center' valign='top' width='600'>
            <![endif]-->
            <table style='max-width: 600px;' width='100%' cellspacing='0' cellpadding='0' border='0'>
                <tbody><tr>
                    <td style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;' valign='top' bgcolor='#ffffff' align='center'>
                      <h1 style='font-size: 42px; font-weight: 400; margin: 0;'>Halo, ".$this->input->post('Name')."!</h1>
                    </td>
                </tr>
            </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td style='padding: 0px 10px 0px 10px;' bgcolor='#f4f4f4' align='center'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
            <tr>
            <td align='center' valign='top' width='600'>
            <![endif]-->
            <table style='max-width: 600px;' width='100%' cellspacing='0' cellpadding='0' border='0'>
              <!-- COPY -->
              <tbody><tr>
                <td style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;' bgcolor='#ffffff' align='left'> ";

            $isiemail .= 'Halo ' . @$_SESSION['userdata']['Name'];
			$isiemail .= "<br>";
			$isiemail .= "Pesanan NPL kamu melalui Webiste berhasil dibuat, segera lakukan pembayaran";
			$isiemail .= "<br>";
			$isiemail .= "Kode Order <b>".$kodeTransaksi."</b>";
			$isiemail .= "<br>";
			$isiemail .= "<img src='".$thisImgBarcodePath."'>";
			$isiemail .= "<br>";
			$isiemail .= "Detail Transaksi Order NPL";

                // email
			$isiemail .= "<table border='1'>
			<thead><tr>
			<th>Jadwal</th>
			<th>Tipe Lelang</th>
			<th>Item</th>
			<th>Tipe NPL</th>
			<th>QTY</th>
			<th style='text-align:right'>Item Price</th>
			<th style='text-align:right'>Sub-Total</th>
			</tr>  ";

			foreach ($this->cart->contents() as $items){
				$isiemail .= "<tr><td>".$items['name']."</td>";
				$isiemail .= "<td>".$items['options']['Tipe Lelang']."</td>";
				$isiemail .= "<td>".$items['options']['Item']."</td>";
				$isiemail .= "<td>".$items['options']['Tipe NPL']."</td>";
				$isiemail .= "<td>".$items['qty']."</td>";
				$isiemail .= "<td>".$this->cart->format_number($items['price'])."</td>";
				$isiemail .= "<td>".$this->cart->format_number($items['subtotal'])."</td></tr>";
			}


			$isiemail .= "<tr>
					<td colspan='4'></td>
					<td class='text-right'><strong>Total</strong></td>";

			$isiemail .= "<td class='text-right' id='thisTotal'>".$this->cart->format_number($this->cart->total() + 100000)."</td> </tr> </table>"; 

			$dataInsert =  array (
				'type' => 'email',
				// 'to'	=> 'rendhy.wijayanto@sera.astra.co.id',
				'to' => @$_SESSION['userdata']['username'],
				'cc' => 'lutfi.f.hidayat@gmail.com',
				// 'cc' => 'abitiyoso@gmail.com; ankghoro@gmail.com; rendhy.wijayanto@sera.astra.co.id',
				'subject' => 'Order Pembelian NPL melalui Counter',
				'body' =>  "$isiemail",
				'attachment' => []
			);  
			
			$url 			= "http://alpha.ibid.astra.co.id/backend/service/notif/api/notification";
			$method 		= 'POST';
			$responseApi 	= admsCurl($url, $dataInsert, $method);
		###############################

			// return $responseApi;
	}
	
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
