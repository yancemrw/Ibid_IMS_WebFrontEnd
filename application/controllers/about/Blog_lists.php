<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_lists extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index()
	{
		$getType = $this->input->get('type');
		$type = '';
		if($getType === 'news') {
			$type = 'News';
			$urlNews = linkservice('cms')."api/news?bahasa=id&kategori=news";
			$methodNews = 'GET';
			$resNews = admsCurl($urlNews, array(), $methodNews);
			$cmsVal = curlGenerate($resNews);
		}
		else if($getType === 'info-tips') {
			$type = 'Info & Tips';
			$urlInfo = linkservice('cms')."api/news?bahasa=id&kategori=info-tips";
			$methodInfo = 'GET';
			$resInfo = admsCurl($urlInfo, array(), $methodInfo);
			$cmsVal = curlGenerate($resInfo);
		}
		
		$data = array(
			'header_white'		=> "header-white",
			'title'				=> 'Blog IBID',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'content'			=> $cmsVal,
			'title_content'		=> $type
		);
		$view = "about/blog_lists";
		template($view, $data);
	}

}

/* End of file Blog_lists.php */
/* Location: ./application/controllers/about/Blog_lists.php */