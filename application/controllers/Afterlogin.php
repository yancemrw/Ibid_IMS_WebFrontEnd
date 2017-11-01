<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afterlogin extends CI_Controller {

	public function index()
	{
		// echo "<center>";	
		// echo "<h1>";	
		// echo $this->session->flashdata('pesan');
		// echo "</h1>";
		// echo "<br>";
		// echo "<br>";
		// echo "Haloo ......    ";
		// echo @$this->session->userdata('namefb');
		// echo @$this->session->userdata('namegoogle');
		// echo @$this->session->userdata('namelinkedin');
		// echo "<br>";
		// echo @$this->session->userdata('emailfb');
		// echo @$this->session->userdata('emailgoogle');
		// echo @$this->session->userdata('emaillinkedin');

		// echo "Kamu sudah berhasil login";
		// echo "<hr>";
		// echo "<a href='".site_url()."'>Logout</a>";
		// echo "</center>";	
		$this->load->view('homeCustomer');
	}

}

/* End of file Afterlogin.php */
/* Location: ./application/controllers/Afterlogin.php */
