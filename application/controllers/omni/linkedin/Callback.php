<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function index()
	{

		$key =  $this->session->userdata('key');
		@$email = $key->emailAddress;

		if (empty($email)) {
			$this->session->unset_userdata('OAUTH_ACCESS_TOKEN');
			$this->session->unset_userdata('key');
			echo "belum diauthentifikasi";
			// redirect('omni/linkedin/linkedin/','refresh');
		}
		// echo $this->session->userdata('OAUTH_ACCESS_TOKEN');
		print_r($this->session->all_userdata());		
	}

}

/* End of file Callback.php */
/* Location: ./application/controllers/omni/linkedin/Callback.php */