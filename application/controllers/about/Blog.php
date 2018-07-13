<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$urlTesti = linkservice('cms')."api/home";
		$methodTesti = 'GET';
		$resTesti = admsCurl($urlTesti, array(), $methodTesti);
		$cmsTesti = curlGenerate($resTesti);

		$urlBanner = linkservice('cms')."api/banner";
		$methodBanner = 'GET';
		$resBanner = admsCurl($urlBanner, array(), $methodBanner);
		$cmsBanner = curlGenerate($resBanner);

		$urlNews = linkservice('cms')."api/news?bahasa=id&kategori=news";
		$methodNews = 'GET';
		$resNews = admsCurl($urlNews, array(), $methodNews);
		$cmsNews = curlGenerate($resNews);

		$urlInfo = linkservice('cms')."api/news?bahasa=id&kategori=info-tips";
		$methodInfo = 'GET';
		$resInfo = admsCurl($urlInfo, array(), $methodInfo);
		$cmsInfo = curlGenerate($resInfo);

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Blog IBID',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'content'			=> $cmsTesti,
			'banner'			=> $cmsBanner,
			'news'				=> $cmsNews,
			'info'				=> $cmsInfo
		);
		$view = "about/blog";
		template($view, $data);
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/about/Blog.php */