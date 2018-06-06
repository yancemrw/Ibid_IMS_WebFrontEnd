<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whislist extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('auth/login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		// get cabang
		$urlCabang = linkservice('master')."cabang/get";  
        $methodCabang = 'GET';
        $responseApiCabang = admsCurl($urlCabang, array('tipePengambilan'=>'dropdownlist'), $methodCabang);
        $dataCabang = curlGenerate($responseApiCabang);
        $arrCabang = array();
        foreach ($dataCabang as $keyCabang => $valueCabang) {
        	$arrCabang[$valueCabang->CompanyId] = $valueCabang->CompanyName;
        }

		// get data favorite
		$url = linkservice('stock')."favorite/Lists";
		$method = 'POST';
		$responseApi = admsCurl($url, array('userid' => $this->userdata['UserId']), $method);
		$data = curlGenerate($responseApi);

		$dataPrice = array();
		$dataCompare = array();
		if(count($data) > 0) {
			foreach($data as $key => $row) {
				// get data images
				$urlImg = linkservice('taksasi')."icar/getimage?AuctionItemId=".$row->AuctionItemId;
				$methodImg = 'GET';
				$resImg = admsCurl($urlImg, array('userid' => $this->userdata['UserId']), $methodImg);
				$dataImg = curlGenerate($resImg);
				$data[$key]->ImagePath = @$dataImg[0]->ImagePath ? 'http:'.$dataImg[0]->ImagePath : base_url('assetsfront/images/background/default.png');

				// get data taksasi
				$urlTaksasi = linkservice('taksasi')."nilaiicar/detail?AuctionItemId=".$row->AuctionItemId;
				$methodTaksasi = 'GET';
				$resTaksasi = admsCurl($urlTaksasi, array('userid' => $this->userdata['UserId']), $methodTaksasi);
				$dataTaksasi = curlGenerate($resTaksasi);
				$data[$key]->TotalEvaluationResult = @$dataTaksasi->TotalEvaluationResult ? $dataTaksasi->TotalEvaluationResult : '-';

				$data[$key]->dataPrice = @$row->FinalPriceItem ? $this->currency_format($row->FinalPriceItem) : '0';
				$data[$key]->Lot = @$row->thisLotNo ? $row->thisLotNo : '-';

				$data[$key]->Company = (@$row->CompanyId) ? $arrCabang[$row->CompanyId] : 'Belum Tersedia';
				$data[$key]->datetime = (@$data[$key]->date) ? date('d F Y',strtotime($value->date)).' '.$value->waktu : 'Belum Tersedia';

				// set json for data compare
				$jsonCompare = new stdClass();
				$jsonCompare->AuctionItemId = $row->AuctionItemId;
                $jsonCompare->BahanBakar = $row->bahanbakar;
                $jsonCompare->Image = $dataImg[0]->ImagePath;
                $jsonCompare->Kilometer = $row->km;
                $jsonCompare->Lot = $row->thisLotNo;
                $jsonCompare->Merk = $row->merk;
                $jsonCompare->Model = $row->model;
                $jsonCompare->NoKeur = $row->nokeur;
                $jsonCompare->NoMesin = $row->nomesin;
                $jsonCompare->NoPolisi = $row->nopolisi;
                $jsonCompare->NoRangka = $row->norangka;
                $jsonCompare->NoSTNK = $row->nostnk;
                $jsonCompare->Seri = $row->seri;
                $jsonCompare->Silinder = $row->silinder;
                $jsonCompare->TaksasiGrade = $dataTaksasi->TotalEvaluationResult;
                $jsonCompare->Tahun = $row->tahun;
                $jsonCompare->Transmisi = $row->transmisi;
                $jsonCompare->Tipe = $row->grade;
                $jsonCompare->Price = $row->FinalPriceItem;
                $jsonCompare->Warna = $row->warna;
                $dataCompare[$key] = json_encode($jsonCompare);
			}
		}

		$datax = array(
			'header_white'		=> "header-white",
			'userdata'		=> $this->userdata,
			'title'			=> 'Favorit',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'		=> login_Status_form($this->userdata),
			'data'			=> $data,
			'jsonCompare'	=> $dataCompare
		);
		$datax['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		$view = "akun/whislist";
		template($view, $datax);
	}
	
	function currency_format($value) {
		return number_format($value, 0, ",", ".");
	}

}

/* End of file Whislist.php */
/* Location: ./application/controllers/akun/Whislist.php */
