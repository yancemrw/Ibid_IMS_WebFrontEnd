<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->session->userdata('userdata'),
			'title' => 'Rincian Kendaraan',
			'link_detail' => base_url('index.php/detail_lelang'),
			'img1' => base_url('assetsfront/images/background/image-header-1.jpg'),
			'img2' => base_url('assetsfront/images/background/image-header-2.jpg'),
			'img3' => base_url('assetsfront/images/background/image-header-3.jpg'),
			'img_bg1' => base_url('assetsfront/images/background/1.jpg'),
			'img_bg2' => base_url('assetsfront/images/background/2.jpg'),
			'img_bg3' => base_url('assetsfront/images/background/3.jpg'),
			'img_rec' => base_url('assetsfront/images/background/img-recommend-1.jpg')
		);
		$view = "find/find_details";
		template($view, $data);
	}

}

/* End of file Find_details.php */
/* Location: ./application/controllers/find/Find_details.php */