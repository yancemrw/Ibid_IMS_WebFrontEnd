<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller { 

	function index(){
		$this->load->library('cart');
		
		$data['title']	= 'Counter | Preview Pembelian NPL';
		$data['page'] 	= 'counter/pembelian/preview';
		
		
		$BiodataId = $_POST['peserta']['BiodataId'];
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
			
			
			$this->load->view('templateadmin',$data);
		
		}
		else {
			// echo 'masuk sini';
			$arrayTransaksi = array(
				'BiodataId' => $BiodataId,
				'DateTransactionNPL' => date('Y-m-d'),
				'TransactionFrom' => 'Counter',
				'Total' => $this->cart->total(),
				'StsPaid' => '0',
				'StsCanceled' => '0',
				'CreateDate' => date('Y-m-d H:i:s'),
			);
			
			foreach ($this->cart->contents() as $items){
				$arrayTransaksiDetail[] = array(
					'ScheduleId' => $items['id'],
					'ItemId' => $items['options']['ItemId'],
					'NPLType' => $items['options']['Tipe NPL'],
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
                    
					redirect('counter/pembelian/lists/','refresh');

				} else if ($responseApiInsert['status'] == 0){ 

					$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
					redirect('counter/pembelian/add/','refresh');

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
