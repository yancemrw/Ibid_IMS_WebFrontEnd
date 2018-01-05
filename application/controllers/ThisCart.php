<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThisCart extends CI_Controller { 

	function add(){
		$this->load->library('cart');
		// $this->cart->destroy();
		
		$itemLelang = $_POST['itemLelang'];
		$ScheduleId = $_POST['ScheduleId'];
		
		$id = $ScheduleId;
		$Qty = $_POST['Qty'];
		$harga = @$_POST['harga'];
		$name = $_POST['getScheduleId'];
		$ItemName = $_POST['ItemName'];
		$tipeLelang = $_POST['tipeLelang'];
		$tipeLelangId = $_POST['tipeLelangId'];
		$CompanyId = $_POST['CompanyId'];
		$ObjectId = @$_POST['ObjectId'];
		
		################################
		## get harga
		$url = linkservice('master') .'item/detail/?itemid='.$itemLelang;
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) {
			echo "<hr>cURL Error #:" . $responseApi['err'];
		} else {
			$responseApi = json_decode($responseApi['response'], true);
			$harga = $responseApi['data']['PriceNPL'];
			$ObjectId = $responseApi['data']['ObjectId'];
		}
		################################
		
		// array data cart
		$data = array(
			'id'      => $id,
			'qty'     => $Qty,
			'price'   => $harga + 0,
			'name'    => $name,
			'options' => array(
				'Item' => $ItemName, 
				'Tipe NPL' => $tipeLelang,
				'tipeLelangId' => $tipeLelangId,
				'ItemId' => $itemLelang,
				'CompanyId' => $CompanyId,
				'ObjectId' => $ObjectId,
			),
		);
		
		// insert to cart
		$this->cart->insert($data);
		$this->getCartList();
	}

	function getCartList(){
		$trReturn = '';
		$footReturn = '';
		// loop untuk json
		foreach ($this->cart->contents() as $items){
			$allItem[] = $items;
			$trReturn .= '<tr>
				<td><a href="#" thisrowid="'.$items['rowid'].'" class="btn btn-xs btn-danger" onclick="thisremove(\''.$items['rowid'].'\')"><i class="fa fa-close"></i> </a></td>
				<td>'.$items['name'].'</td>
				<td>'.$items['options']['Item'].'</td>
				<td>'.$items['options']['Tipe NPL'].'</td>
				<td>
					<input type="hidden" name="thisId[]" value="'.$items['rowid'].'">
					<input type="text" name="thisQty['.$items['rowid'].']" value="'.$items['qty'].'" size="5" maxlength="3">
					<button type="submit" class="btn btn-xs btn-info"><i class="fa fa-refresh"></i></button>
				</td>
				<td class="text-right">'.number_format($items['price'],2).'</td>
				<td class="text-right">'.number_format($items['subtotal'],2).'</td>
			</tr>';
		}
		// total harga
		$totalHarga = $this->cart->total();
		
		// return value
		$returnData = array(
			'allItem' => $trReturn,
			'totalHarga' => number_format($totalHarga,2),
		);
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
