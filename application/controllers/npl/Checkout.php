<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller { 

	function __construct() {
		parent::__construct();
		$this->link = linkservice('account').'email/logo2.jpg';
		$this->biayaAdm = 0;
	}

	function index(){
		$this->load->library('cart');
		$arrMethodeBayar = array(1, 4);
		$methodeBayar = $_POST['tipe_methode'];
		if (in_array($methodeBayar, $arrMethodeBayar))
			$methodeBayar = $_POST['tipe_methode'];
		else 
			$methodeBayar = 4;
		
		$BiodataId = @$_SESSION['userdata']['UserId'];
		$Total = $this->cart->total() + $this->biayaAdm;
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
		$totalQtyNPL = 0;
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
			$totalQtyNPL += $items['qty'];
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
				// $this->cart->destroy();
				##################
				
				$TransactionId = $responseApiInsert['data'][0];

				$md5 = md5($TransactionId);
				$kodeTransaksi = substr($md5,0,5).' '.substr($md5,-5);
				$thisImgBarcodePath = $this->barcode($kodeTransaksi, 100);
				
				$_SESSION['userdata']['thisBarcodeTransaction'] = $thisImgBarcodePath;
				// die();
				
				
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
					// pembayaran via loket
						$arr = array(
							'aksi'	=> 'redir',
							'url'	=> site_url('npl/success'),
						);
						echo json_encode($arr);
					#kirim email
						$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath , 4);
						$this->cart->destroy();
						die();
					}
					else if ($methodeBayar == 1){
						$VANumber = '70016'.@$detailBiodata['Phone'];
						
						$_SESSION['userdata']['thisVa'] = @$VANumber;
						$_SESSION['userdata']['kodeTransaksi'] = @$kodeTransaksi;
						$_SESSION['userdata']['nilaiTransaksi'] = $Total;
						$_SESSION['userdata']['va'] = 'mandiri';

					## update VA mandiri
						$postTransaksi['whereData'] = array('CodeTransactionNPL' => $kodeTransaksi);
						$postTransaksi['updateData'] = array(
							'VANumber' => $VANumber, 
							'VABank' => 'Mandiri'
						);
						$url = linkservice('npl') .'counter/transaksi/edit';
						$method = 'POST';
						$updateVa = admsCurl($url, $postTransaksi, $method);
						
						$_SESSION['userdata']['TransactionId'] = @$TransactionId;
						$arr = array(
							'aksi'	=> 'va',
							'url'	=> site_url('npl/vadetail'),
							'code'	=> $kodeTransaksi,
							'bill'	=> $Total,
						);
					
					## kirim ke finance
					$postMandiri = array(
						'va'		=> (string)$VANumber,
						'cabang'	=> 'NPL',
						'tgl_lelang'=> date('Y-m-d'),
						'data_unit'	=> @$totalQtyNPL.' NPL',
						'tagihan'	=> @$Total,
						'nama'		=> @$detailBiodata['first_name'].' '.@$detailBiodata['last_name'],
						'panggilan'	=> @$detailBiodata['first_name'],
					);
					
					$url = linkservice('FINANCE')."mandiri/va?winner";
					$method = 'POST';
					$responseApiMan = admsCurl($url, $postMandiri, $method); 

					#kirim email
						$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath , 1);
						echo json_encode($arr);
						$this->cart->destroy();
						die();
					}
					/*else if ($methodeBayar == 3){
					// pembayaran via cc
						$_SESSION['userdata']['TransactionId'] = @$TransactionId;
						$arr = array(
							'aksi'	=> 'cc',
							'url'	=> linkservice('FINANCE') .'doku/cc',
							'TransactionId'	=> $TransactionId,
							'code'	=> $kodeTransaksi,
							'bill'	=> $Total,
						);
						echo json_encode($arr);
					#kirim email
						$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath, 3);
						$this->cart->destroy();
						die();
					}
					else if ($methodeBayar == 2){
					// pembayaran via bca
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
							$_SESSION['userdata']['nilaiTransaksi'] = $Total;
							$_SESSION['userdata']['va'] = 'bca';

						## update VA BCA
							$postTransaksi['whereData'] = array('CodeTransactionNPL' => $kodeTransaksi);
							$postTransaksi['updateData'] = array(
								'VANumber' => $dataApiDetail['data']['va_bca'], 
								'VABank' => 'BCA'
							);
							$url = linkservice('npl') .'counter/transaksi/edit';
							$method = 'POST';
							$updateVa = admsCurl($url, $postTransaksi, $method);
						}

						$_SESSION['userdata']['TransactionId'] = @$TransactionId;
						$arr = array(
							'aksi'	=> 'va',
							'url'	=> site_url('npl/vadetail'),
							'code'	=> $kodeTransaksi,
							'bill'	=> $Total,
						);
						echo json_encode($arr);
					#kirim email
						$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath , 2);
						$this->cart->destroy();
						die();
					}
					else if ($methodeBayar == 1){ 
					// pembayaran va mandiri 
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
							$_SESSION['userdata']['nilaiTransaksi'] = $Total;
							$_SESSION['userdata']['va'] = 'mandiri';

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

						$_SESSION['userdata']['TransactionId'] = @$TransactionId;
						$arr = array(
							'aksi'	=> 'va',
							'url'	=> site_url('npl/vadetail'),
							'code'	=> $kodeTransaksi,
							'bill'	=> $Total,
						);

					#kirim email
						$dd = $this->sendEmail($kodeTransaksi, $thisImgBarcodePath , 1);
						echo json_encode($arr);
						$this->cart->destroy();
						die();
					}*/

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
	
	function sendEmail($kodeTransaksi, $thisImgBarcodePath , $TipePembayaranParam = null ){

		$TipePembayaran = strlen($TipePembayaranParam) > 0 ? $TipePembayaranParam : 0;

		###############################
		$isiemail = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html>
		<head>
		<title>IBID - Beli NPL</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<style type='text/css'>
		* {
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:none;
			-webkit-text-resize:100%;
			text-resize:100%;
		}
		a{
			outline:none;
			color:#40aceb;
			text-decoration:underline;
		}
		p{
			margin: 0;
			line-height: 1.6;
		}
		.flexible{
			border: 1px solid #C2D89C;
		}
		a:hover{text-decoration:none !important;}
		.nav a:hover{text-decoration:underline !important;}
		.title a:hover{text-decoration:underline !important;}
		.title-2 a:hover{text-decoration:underline !important;}
		.btn:hover{opacity:0.8;}
		.btn a:hover{text-decoration:none !important;}
		.btn{
			-webkit-transition:all 0.3s ease;
			-moz-transition:all 0.3s ease;
			-ms-transition:all 0.3s ease;
			transition:all 0.3s ease;
		}
		table td {border-collapse: collapse !important;}
		.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
		@media only screen and (max-width:500px) {
			table[class='flexible']{width:100% !important;}
			table[class='center']{
				float:none !important;
				margin:0 auto !important;
			}
			*[class='hide']{
				display:none !important;
				width:0 !important;
				height:0 !important;
				padding:0 !important;
				font-size:0 !important;
				line-height:0 !important;
			}
			td[class='img-flex'] img{
				width:100% !important;
				height:auto !important;
			}
			td[class='aligncenter']{text-align:center !important;}
			th[class='flex']{
				display:block !important;
				width:100% !important;
			}
			td[class='wrapper']{padding:0 !important;}
			td[class='holder']{padding:30px 15px 20px !important;}
			td[class='nav']{
				padding:20px 0 0 !important;
				text-align:center !important;
			}
			td[class='h-auto']{height:auto !important;}
			td[class='description']{padding:30px 20px !important;}
			td[class='i-120'] img{
				width:120px !important;
				height:auto !important;
			}
			td[class='footer']{padding:5px 20px 20px !important;}
			td[class='footer'] td[class='aligncenter']{
				line-height:25px !important;
				padding:20px 0 0 !important;
			}
			tr[class='table-holder']{
				display:table !important;
				width:100% !important;
			}
			th[class='thead']{display:table-header-group !important; width:100% !important;}
			th[class='tfoot']{display:table-footer-group !important; width:100% !important;}
		}
		</style>
		</head>
		<body style='margin:0; padding:0;' bgcolor='#f4f4f4'>
		<table style='min-width:320px;margin:40px 0' width='100%' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4'>
		<!-- fix for gmail -->
		<tr>
		<td class='hide'>
		<table width='600' cellpadding='0' cellspacing='0' style='width:600px !important;'>
		<tr>
		<td style='min-width:600px; font-size:0; line-height:0;'>&nbsp;</td>
		</tr>
		</table>
		</td>
		</tr>
		<tr>
		<td class='wrapper' style='padding:0 10px;'>
		<!-- module 3 -->
		<table data-module='module-3' data-thumb='thumbnails/03.png' width='100%' cellpadding='0' cellspacing='0'>
		<tr>
		<td data-bgcolor='bg-module' bgcolor='#f4f4f4'>
		<table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'>
		<tr>
		<td class='img-flex'><img src='".$this->link."' style='vertical-align:top;' width='600' height='auto' alt='' /></td>
		</tr>
		<tr>
		<td data-bgcolor='bg-block' class='holder' style='padding:50px 60px 50px;' bgcolor='#ffffff'>
		<table width='100%' cellpadding='0' cellspacing='0'>
		<tr>
		<td data-color='title' data-size='size title' data-min='20' data-max='40' data-link-color='link title color' data-link-style='text-decoration:none; color:#292c34;' class='title' align='center' style='font:30px/33px Arial, Helvetica, sans-serif; color:#8F3F97; padding:0 0 24px;'>
		Detail Pembelian NPL
		</td>
		</tr>";

		// barcode 
		if ($TipePembayaran==4) {

			$isiemail .="
			<tr>
			<td data-color='title' data-size='size title' data-min='20' data-max='40' data-link-color='link title color' data-link-style='text-decoration:none; color:#292c34;' class='title' style='font:30px/33px Arial, Helvetica, sans-serif; color:#8F3F97; padding:0 0 24px;' align='center'>
			<img src='http:".$thisImgBarcodePath."' width='200'>
			</td>
			</tr>
			";

		}
		// end 

		$isiemail .="
		<tr>
		<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:14px/29px Arial, Helvetica, sans-serif; color:#666; padding:0 0 21px;'>
		<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' align='center'>
		<tbody>
		<tr>
		<td style='font-family:Helvetica,'Arial',sans-serif;color:#000000;font-size:11px' valign='top'>
		<table width='100%' cellspacing='0' cellpadding='0' border='0'>
		<tbody>
		<tr>
		<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:14px/29px Arial, Helvetica, sans-serif; color:#666; padding:0 0 21px;'>
		<p>Agar Anda dapat segera melakukan penawaran atau bidding untuk objek lelang favorit, silahkan lakukan pembayaran tagihan Nomor Pokok Lelang (NPL) lewat Virtual Account Anda sebelum tanggal <span style='font-weight:900;'>".date('d F Y', strtotime(date('Y-m-d', strtotime('+2 days')))).", 00:00 WIB.</span></p>
		</td>
		</tr>
		<tr>
		<td height='15'><img style='display:block' src='' alt='' class='CToWUd' width='20' height='15' border='0'></td>
		</tr>      
		<tr>
		<td>
		
		<table width='100%' cellspacing='0' cellpadding='0' border='0'>
		<tbody><tr>
		<td height='12'><img style='display:block' src='' alt='' class='CToWUd' width='20' height='12' border='0'></td>
		</tr>
		</tbody>
		</table>
		</td>
		</tr> 
		</tbody>
		</table>
		</td>
		<tr>
		<td>";

                // email
		/* $isiemail .= "<table style='margin:0 auto 30px;padding:20px;border: 1px solid #e6e6e6'>
		<thead><tr style='font-size:12px'>
		<th>Jadwal</th>
		<th>Tipe Lelang</th>
		<th>Item</th>
		<th>Tipe NPL</th>
		<th>Qty</th>
		<th style='text-align:right'>Harga Item</th>
		<th style='text-align:right'>Sub-Total</th>
		</tr> ";

		foreach ($this->cart->contents() as $items){

			// tipe NPL
			$tipenpl = $items['options']['Tipe NPL']==0 ? 'NPL Live' : (($items['options']['Tipe NPL']==1) ? 'NPL Online' : (($items['options']['Tipe NPL']==5) ? 'NPL Unlimited' : ''));

			$isiemail .= "<tr style='font-size:12px'><td>".$items['name']. " - ".$items['options']['thisDate']."</td>";
			$isiemail .= "<td>".$items['options']['Tipe Lelang']."</td>";
			$isiemail .= "<td>".$items['options']['Item']."</td>";
			$isiemail .= "<td>".$tipenpl."</td>";
			$isiemail .= "<td>".$items['qty']."</td>";
			$isiemail .= "<td>".$this->cart->format_number($items['price'])."</td>";
			$isiemail .= "<td>".$this->cart->format_number($items['subtotal'])."</td></tr>";
		}


		// $isiemail .= "<tr>
		// <td colspan='4'></td>
		// <td class='text-right'><strong>Total</strong></td></tr>";

		// $isiemail .= "<td class='text-right' id='thisTotal'>".$this->cart->format_number($this->cart->total() + $this->biayaAdm)."</td> ";
		$isiemail .= "</table>"; 
		*/
		
		foreach ($this->cart->contents() as $items){
			$tipenpl = $items['options']['Tipe NPL']==0 ? 'NPL Live' : (($items['options']['Tipe NPL']==1) ? 'NPL Online' : (($items['options']['Tipe NPL']==5) ? 'NPL Unlimited' : ''));
			
			$isiemail .= "<fieldset style='margin: 0 0 5px 0; padding: 0 0 5px 0; border: 1px solid #eee;'>
			<table>
				<tr>
					<th width='150px' align='right'>Jadwal :</th>
					<td>".$items['name']. " - ".$items['options']['thisDate']."</td>
				</tr>
				<tr>
					<th align='right'>Tipe Lelang :</th>
					<td>".$items['options']['Tipe Lelang']."</td>
				</tr>
				<tr>
					<th align='right'>Item :</th>
					<td>".$items['options']['Item']."</td>
				</tr>
				<tr>
					<th align='right'>Tipe NPL :</th>
					<td>".$tipenpl."</td>
				</tr>
				<tr>
					<th align='right'>QTY :</th>
					<td>".$items['qty']."</td>
				</tr>
				<tr>
					<th align='right'>Harga Item :</th>
					<td>".$this->cart->format_number($items['price'])."</td>
				</tr>
				<tr>
					<th align='right'>Sub-Total :</th>
					<td>".$this->cart->format_number($items['subtotal'])."</td>
				</tr>
			</table>
			</fieldset>";
		}
		
		$isiemail .= "	
		<table width='100%' cellspacing='0' cellpadding='0' border='0'>
		<tbody>
		<tr>
		<td style='font-size:12px;line-height:21px;font-weight:bold' width='50%' valign='top' align='center' rowspan='2'>TOTAL<br>
		<span style='font:18px Arial, Helvetica, sans-serif; line-height:32px;color:#00af41'>RP ".$this->cart->format_number($this->cart->total() + $this->biayaAdm)."</span></td>
		</tr>
		</tbody>
		</table>

		</td>
		</tr>";


		if ($TipePembayaran == 2) {
			

			$isiemail .="
			<tr>
			<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:12px/24px Arial, Helvetica, sans-serif; color:#666; padding:0 0 30px;'>
			<h3>Pembayaran BCA dengan mobile banking BCA (m-BCA)</h3>
			<p>1. Lakukan login m-BCA pada aplikasi BCA Mobile di gawai Anda</p>
			<p>2. Pilih m-Transfer --> BCA Virtual Account</p>
			<p>3. Pilih dari 'IBID' dari Daftar Transfer, atau masukkan nomor Virtual Account (jika baru pertama kali melakukan transaksi VA bersama IBID)</p>
			<p>4. Periksa detail informasi pembayaran seperti nama dan total tagihan</p>
			<p>5. Klik 'bayar' dan masukkan pin m-BCA</p>
			<p>6. Pembayaran selesai. Simpan notifikasi yang muncul sebagai bukti pembayaran</p>

			<h3>Pembayaran BCA dengan KlikBCA Individual</h3>
			<p>1. Lakukan login pada aplikasi KlikBCA Individual (https://ibank.klikbca.com/)</p>
			<p>2. Masukkan User ID dan PIN</p>
			<p>3. Pilih Transfer Dana --> Transfer ke BCA Virtual Account
			Masukkan nomor BCA Virtual Account</p>
			<p>4. Masukkan jumlah yang ingin dibayarkan</p>
			<p>5. Validasi pembayaran</p></p>
			<p>6. Cetak nomor referensi sebagai bukti transaksi Anda</p>

			<h3>Pembayaran BCA di Kantor Bank BCA</h3>
			<p>1. Ambil nomor antrian transaksi teller dan isi slip setoran</p>
			<p>2. Serahkan slip dan jumlah setoran kepada teller BCA</p>
			<p>3. Teller BCA akan melakukan validasi transaksi sebelum Anda menyerahkan dana</p>
			<p>4. Simpan slip setoran hasil validasi sebagai bukti pembayaran</p>
			</td>
			</tr>";

		}
		elseif($TipePembayaran == 1){

			$isiemail .="
			<tr>
			<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:12px/24px Arial, Helvetica, sans-serif; color:#666; padding:0 0 30px;'>
			<h3> Pembayaran Mandiri Virtual Account dengan ATM bank Mandiri</h3>

			<ul>
			<li>Masukkan kartu ATM dan Pin</li>
			<li>Pilih Menu 'Bayar/Beli'</li>
			<li>Pilih menu 'Lainnya', hingga menemukan menu 'Multipayment'</li>
			<li>Masukkan kode biller IBID XXXXX, lalu pilih Benar</li>
			<li>Masukkan 'Nomor Virtual Account' IBID, lalu pilih tombol Benar</li>
			<li>Masukkan Angka '1' untuk memilih tagihan, lalu pilih tombol Ya</li>
			<li>Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya</li>
			<li>Simpan struk sebagai bukti pembayaran anda</li>
			</ul>


			<h3> Pembayaran Mandiri Virtual Account dengan Internet Banking atau Mandiri Online</h3>
			<ul>
			<li>Login Mandiri Online dengan memasukkan username dan password</li>
			<li>Pilih menu 'Pembayaran'</li>
			<li>Pilih menu 'Multipayment'</li>
			<li>Pilih penyedia jasa 'IBID'</li>
			<li>Masukkan 'Nomor Virtual Account' dan 'Nominal' yang akan dibabayarkan , lalu pilih Lanjut</li>
			<li>setelah muncul tagihan, pilih Konfirmasi</li>
			<li>Masukkan PIN/kode token</li>
			<li>Transaksi selesai, simpan bukti bayar Anda</li>
			</ul> 
			</td>
			</tr>";



		}
		elseif($TipePembayaran == 4){

			$isiemail .= "<tr>
			<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' style='font:12px/24px Arial, Helvetica, sans-serif; color:#666; padding:0 0 30px;' align='left'>
			<h3>Langkah-langkah pembayaran Langsung di Loket:</h3>
			<p>1. Pembayaran hanya dapat dilakukan di loket IBID menggunakan kartu debet.</p>
			<p>2. Anda akan menerima struk berisi barcode yang harus dibawa ketika datang ke loket.</p>
			<p>3 .Verifikasi pembayaran dilakukan oleh petugas loket.</p>
			</td>
			</tr>";

		}

		$isiemail .= "
		<tr>
		<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:14px/29px Arial, Helvetica, sans-serif; color:#666; padding:0 0 21px;'>
		<p>Email ini dikirimkan secara otomatis oleh sistem kami. Mohon untuk tidak membalas email ke alamat ini. Jika Anda ingin mengajukan pertanyaan, silahkan menghubungi IBID lewat email resmi <a href='mailto:info.ibid@ibid.astra.co.id'>info.ibid@ibid.astra.co.id</a></p>
		</td>
		</tr>
		<tr>
		<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:14px/29px Arial, Helvetica, sans-serif; color:#666; padding:0 0 21px;'>
		<p>Terima kasih,</p>
		<p>IBID</p>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		</td>
		</tr>
		<!-- fix for gmail -->
		<tr>
		<td style='line-height:0;'><div style='display:none; white-space:nowrap; font:15px/1px courier;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
		</tr>
		</table>
		</body>
		</html>";



		$dataInsert =  array (
			'type' => 'email',
				// 'to'	=> 'rendhy.wijayanto@sera.astra.co.id',
			'to' => @$_SESSION['userdata']['username'],
			'cc' => '',
				// 'cc' => 'abitiyoso@gmail.com; ankghoro@gmail.com; rendhy.wijayanto@sera.astra.co.id',
			'subject' => 'IBID - Order Pembelian NPL melalui Website',
			'body' =>  "$isiemail",
			'attachment' => []
		);  

		$url 			= linkservice('notif')."api/notification";
		$method 		= 'POST';
		$responseApi 	= admsCurl($url, $dataInsert, $method);
		###############################

			// return $responseApi;
	}
	
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
