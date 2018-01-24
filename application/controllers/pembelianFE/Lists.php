<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller { 

	function __construct() {
        parent::__construct();
        if (!@$_SESSION['idfront']){ redirect(base_url()); }
    }
	
	function index(){
		$data['title']	= 'Daftar Pembelian NPL';
		$data['page'] 	= 'pembelian/lists';
		$data['message'] = $this->session->flashdata('message');
		
		$BiodataId = trim($_SESSION['idfront']);

		// Hakakses  
		// $data['add']	 = anchor('counter/pembelian/add/', '<i class="fa fa-plus"></i> Tambah' , 'class="btn pull-right btn-purple ttipDatatables"  data-provide="tooltip" data-placement="top" title="Menambahkan Data" data-original-title="Menambahkan Data"');
		
		// $data['detail']  = site_url('counter/pembelian/detail'); 
		// $data['update']  = site_url('counter/pembelian/update'); 
		// $data['delete']	 = site_url('item/delete'); 

		$listTransaksi = array();
		############################################################
		## get list Item Type
		$url = linkservice('npl')."counter/transaksi/GetUser/".$BiodataId;  
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$listTransaksi = $dataApi['data'];
		}
		$data['listTransaksi'] = @$listTransaksi;
		############################################################

		$this->load->view('templateAdminLTE',$data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
