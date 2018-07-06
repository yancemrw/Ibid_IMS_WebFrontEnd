<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThisCart extends CI_Controller { 

	function add(){
		$this->load->library('cart');
		// $this->cart->destroy();
		// echo '<pre>';
		// print_r($_POST);
		
		$ItemLelang = $_POST['TipeObject'];
		$TipeNPL = $_POST['TipeNPL'];
		$CompanyId = $_POST['KotaLelang'];
		$KotaLelangTxt = $_POST['KotaLelangTxt'];
		$ScheduleId = $_POST['ScheduleId'];
		$ScheduleIdTxt = $_POST['ScheduleIdTxt'];
		$Qty = $_POST['Qty'];
		
		$name = $KotaLelangTxt;
		$thisDate = date('d F Y', strtotime($ScheduleIdTxt));
		
		$id = $ScheduleId;
		################################
		## get harga
		$url = linkservice('master') .'item/detail/?itemid='.$ItemLelang;
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) {
			echo "<hr>cURL Error #:" . $responseApi['err'];
		} else {
			$responseApi = json_decode($responseApi['response'], true);
			$ObjectId = $responseApi['data']['ObjectId'];
			
			$harga = $responseApi['data']['PriceNPL'];
			if ($TipeNPL == 5) $harga = $responseApi['data']['PriceUnlimitedNPL'];
			if ($harga == '') $harga = 0;
			
		}
		################################
		if ($ItemLelang == 6) @$ItemName = 'Mobil';
		else if ($ItemLelang == 7) @$ItemName = 'Motor';
		else if ($ItemLelang == 14) @$ItemName = 'HVE';
		else if ($ItemLelang == 12) @$ItemName = 'Gadget';
		else @$ItemName = '';
		
		if ($TipeNPL == 1) @$tipeLelang = 'Online';
		else if ($TipeNPL == 0) @$tipeLelang = 'Live';
		else if ($TipeNPL == 5) {
			@$tipeLelang = 'All';
			$id = (((int)$TipeNPL * 100) + (int)$ItemLelang ) / 100;
		}
		
		## array data cart
		$data = array(
			'id'      => $id,
			'qty'     => $Qty,
			'price'   => @$harga + 0,
			'name'    => @$name,
			'options' => array(
				'Item' => @$ItemName, 
				'Tipe NPL' => @$TipeNPL,
				'Tipe Lelang' => @$tipeLelang,
				'tipeLelangId' => @$TipeNPL,
				'ItemId' => @$ItemLelang,
				'CompanyId' => @$CompanyId,
				'ObjectId' => @$ObjectId,
				'thisDate'    => @$thisDate,
				'ScheduleId'    => @$ScheduleId,
			),
		);
		// insert to cart
		$this->cart->insert($data);
		$this->getCartList();
		// $coba = $this->cart->contents();
		// print_r($coba);
	}

	function getCartList(){
		$trReturn = '';
		$footReturn = '';
		// loop untuk json
		foreach ($this->cart->contents() as $items){
			$allItem[] = $items;
			
			$jadwal = ucfirst(strtolower($items['name'])).', '.$items['options']['thisDate'];
			
			if ($items['options']['tipeLelangId'] == 1) @$tipeLelang = 'Online';
			else if ($items['options']['tipeLelangId'] == 0) @$tipeLelang = 'Live';
			else if ($items['options']['tipeLelangId'] == 5) {
				$jadwal = '-';
				@$tipeLelang = 'Unlimited';
			}
			
			if ($items['options']['ItemId'] == 6){
				$h2Class = 'npl-car';
				$imgPath = base_url().'assetsfront/images/icon/car-white.png';
			}
			else if ($items['options']['ItemId'] == 7){
				$h2Class = 'npl-motorcycle';
				$imgPath = base_url().'assetsfront/images/icon/motorcycle-calendar.png';
			}
			else if ($items['options']['ItemId'] == 14){
				$h2Class = 'npl-hve';
				$imgPath = base_url().'assetsfront/images/icon/hve-white.png';
			}
			else if ($items['options']['ItemId'] == 12){
				$h2Class = 'npl-gadget';
				$imgPath = base_url().'assetsfront/images/icon/gadget-calendar.png';
			}
			else {
				$h2Class = '';
				$imgPath = '';
			}
			
			@$itemCart .= '
			<li class="'.$items['rowid'].'">
				<h2 class="'.$h2Class.'">
					<img src="'.$imgPath.'" alt=""> '.$items['options']['Item'].' 
					<a href="#" class="delete-npl '.$items['rowid'].'" thisrowid="'.$items['rowid'].'" onclick="return thisremove(\''.$items['rowid'].'\')"></a>
				</h2>  
				<div class="desc-npl">
					<p>NPL '.@$tipeLelang.'</p>
					<p>'.$jadwal.'</p>
					<p>'.$items['qty'].'</p>
					<p>Rp. '.number_format($items['subtotal']).'</p>
				</div>
			</li>
			';

			// $trReturn .= '<tr>
				// <td><a href="#" thisrowid="'.$items['rowid'].'" class="btn btn-xs btn-danger" onclick="thisremove(\''.$items['rowid'].'\')"><i class="fa fa-close"></i> </a></td>
				// <td>'.$items['name'].'</td>
				// <td>'.$items['options']['Item'].'</td>
				// <td>'.$items['options']['Tipe NPL'].'</td>
				// <td>
					// <input type="hidden" name="thisId[]" value="'.$items['rowid'].'">
					// <input type="text" name="thisQty['.$items['rowid'].']" value="'.$items['qty'].'" size="5" maxlength="3">
					// <button type="submit" class="btn btn-xs btn-info"><i class="fa fa-refresh"></i></button>
				// </td>
				// <td class="text-right">'.number_format($items['price'],2).'</td>
				// <td class="text-right">'.number_format($items['subtotal'],2).'</td>
			// </tr>';
		}
		// total harga
		$totalHarga = $this->cart->total();
		
		// return value
		$returnData = array(
			'allItem' => @$itemCart,
			'totalHarga' => number_format($totalHarga),
		);
		
		
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET');
		header('Access-Control-Allow-Headers: Origin');
		header('Content-Type: application/json');
		echo json_encode($returnData);
	}
	
	function update(){
		$this->load->library('cart');
		
		$thisQty = $_POST['thisQty'];
		$thisId = $_POST['thisId'];
		for($i=0; $i<count($thisId); $i++){
			$rowid = $thisId[$i];
			$qty = $thisQty[$rowid];
			
			$dataUpdateCart = array(
				'rowid'  => $rowid,
				'qty'    => $qty,
			);
			$this->cart->update($dataUpdateCart);
		}
		
		redirect('pembelian');
		
	}
	function remove(){
		$this->load->library('cart');
		
		$rowid = $_POST['thisRowId'];
		$this->cart->remove($rowid);
		$this->getCartList();
	}
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
