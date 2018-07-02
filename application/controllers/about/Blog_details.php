<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index($id) {
		$id = $this->input->get('id');
		$slug = $this->input->get('slug');

		$url = linkservice('cms')."api/news/details?id=".$id;
		$method = 'GET';
		$res = admsCurl($url, array(), $method);
		$cms = curlGenerate($res);

		if($slug === 'news') {
			$urlBanner = linkservice('cms')."api/news?bahasa=id&kategori=news";
			$methodBanner = 'GET';
			$resBanner = admsCurl($urlBanner, array(), $methodBanner);
			$cmsBanner = curlGenerate($resBanner);
		}
		else if($slug === 'info-tips') {
			$urlBanner = linkservice('cms')."api/news?bahasa=id&kategori=info-tips";
			$methodBanner = 'GET';
			$resBanner = admsCurl($urlBanner, array(), $methodBanner);
			$cmsBanner = curlGenerate($resBanner);
		}

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Tentang IBID',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'data'				=> $cms,
			'dataBanner'		=> $cmsBanner->news
		);
		$view = "about/blog_details";
		template($view, $data);
	}

}

/* End of file Blog_details.php */
/* Location: ./application/controllers/about/Blog_details.php */