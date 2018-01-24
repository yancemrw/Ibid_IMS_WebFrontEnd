<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller { 

	function index(){
		$this->load->library('cart');
		
		// $data['title']	= 'Counter | Preview Pembelian NPL';
		$data['page'] 	= 'pembelian/preview';
		
		
		$BiodataId = $_SESSION['idfront'];
		$PaymentTypeId = @$_POST['PaymentTypeId'];
		$toDone = @$_POST['toDone'];
		if (!$toDone){
			
			####################################################################################
			## detail user
			$url = linkservice('account') ."users/details/".$BiodataId;
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
				$dataApiDetail = json_decode($responseApi['response'],true);
			}
			$data['detailPeserta'] = @$dataApiDetail['data']['users'];
			####################################################################################
			
			####################################################################################
			## type pembayaran
			$url = linkservice('master') ."paymenttype/get";
			$method = 'GET';
			$responseApi = admsCurl($url, array(), $method);
			if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
				$dataApiDetail = json_decode($responseApi['response'],true);
			}
			$data['carabayar'] = @$dataApiDetail['data'];
			####################################################################################
			// echo '<pre>';
			// print_r($data['carabayar']);
			// echo '</pre>';
			
			$this->load->view('templateAdminLTE',$data);
		
		}
		else {

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

            $isiemail .= 'Halo ' . $this->input->post('Name');
			$isiemail .= "<br>";
			$isiemail .= "Pesanan NPL kamu melalui Counter berhasil dibuat, segera lakukan pembayaran";
			$isiemail .= "<br>";
			$isiemail .= "Nomor Order <b>#00001</b>";
			$isiemail .= "<br>";
			$isiemail .= "Detail Transaksi Order NPL";

                // email
			$isiemail .= "<table border='1'>
			<thead><tr>
			<th>Jadwal</th>
			<th>Item</th>
			<th>Tipe NPL</th>
			<th>QTY</th>
			<th style='text-align:right'>Item Price</th>
			<th style='text-align:right'>Sub-Total</th>
			</tr>  ";

			foreach ($this->cart->contents() as $items){
				$isiemail .= "<tr><td>".$items['name']."</td>";
				$isiemail .= "<td>".$items['options']['Item']."</td>";
				$isiemail .= "<td>".$items['options']['Tipe NPL']."</td>";
				$isiemail .= "<td>".$items['qty']."</td>";
				$isiemail .= "<td>".$this->cart->format_number($items['price'])."</td>";
				$isiemail .= "<td>".$this->cart->format_number($items['subtotal'])."</td></tr>";
			}


			$isiemail .= "<tr>
					<td colspan='4'></td>
					<td class='text-right'><strong>Total</strong></td>";

			$isiemail .= "<td class='text-right' id='thisTotal'>".$this->cart->format_number($this->cart->total())."</td> </tr> </table>"; 

			$dataInsert =  array (
				'type' => 'email',
				// 'to'	=> 'rendhy.wijayanto@sera.astra.co.id',
				'to' => $this->session->userdata('emailfront'),
				'cc' => 'lutfi.f.hidayat@gmail.com',
				// 'cc' => 'abitiyoso@gmail.com; ankghoro@gmail.com; rendhy.wijayanto@sera.astra.co.id',
				'subject' => 'Order Pembelian NPL melalui Website',
				'body' =>  "$isiemail "
			);  
			
			$url 			= "http://ibidadmsdevservicenotification.azurewebsites.net/api/notification";
			$method 		= 'POST';
			$responseApi 	= admsCurl($url, $dataInsert, $method);

			// echo "<pre>";
			// print_r($this->session->all_userdata());
			// print_r($responseApi);
			// exit();

			// echo 'masuk sini';
			$arrayTransaksi = array(
				'BiodataId' => $BiodataId,
				'DateTransactionNPL' => date('Y-m-d'),
				'TransactionFrom' => 'Website',
				'Total' => $this->cart->total(),
				'StsPaid' => '0',
				'StsCanceled' => '0',
				'CreateDate' => date('Y-m-d H:i:s'),
				'PaymentTypeId' => $PaymentTypeId,
			);
			
			foreach ($this->cart->contents() as $items){
				$arrayTransaksiDetail[] = array(
					'ScheduleId' => $items['id'],
					'ItemId' => $items['options']['ItemId'],
					'NPLType' => $items['options']['Tipe NPL'],
					'tipeLelangId' => $items['options']['tipeLelangId'],
					'QtyNPL' => $items['qty'],
					'AmountNPL' => $items['price'],
					'BiodataId' => $BiodataId,
					'CompanyId' => $items['options']['CompanyId'],
					'ObjectId' => $items['options']['ObjectId'],
				);
			}
			
			$arrayKirim = array(
				'arrayTransaksi' => $arrayTransaksi,
				'arrayTransaksiDetail' => $arrayTransaksiDetail,
			);
			
			// echo '<pre>';
			// print_r($arrayKirim);
			// echo '</pre>';
			
			
			## send data registrasi
			$url = linkservice('npl') .'counter/pembelian/add';
			$method = 'POST';
			$responseApi = admsCurl($url, $arrayKirim, $method);
			// print_r($responseApi);
			
			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1){
                    $TransactionId = $responseApiInsert['data'][0];

					$this->session->set_flashdata('message', '<div class="alert alert-success">'.$responseApiInsert['message'].'</div>');
                    
					$this->cart->destroy();
					redirect('afterlogin','refresh');

				} else if ($responseApiInsert['status'] == 0){ 

					$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
					redirect('pembelian/add/','refresh');

				}
			}
			
			
		}
		
		
		// echo '<hr>';
		// print_r(@$data['detail']);
		
		// echo '<hr>';
		// echo '<hr>';
		// foreach ($this->cart->contents() as $items){
			// print_r($items);
			// echo '<hr>';
		// }
		
		
		
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
