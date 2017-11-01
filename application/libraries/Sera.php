<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth
*
* Author: Ben Edmunds
*		  ben.edmunds@gmail.com
*         @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Sera
{
	public function __construct()
	{ 
		$this->load->library('database');
	}
	public function cekHak($userid = '', $uri = '')
	{
		$this->load->library('database');
		// $this->load->library(array('ion_auth', 'url')); 
		
		$data 	= $this->db->query("SELECT b.*, c.* from hakakses a
			inner join master_menu_admin b on a.id_menu = b.id_menu
			inner join master_menu_detail_admin c on a.id_menu_detail = c.id_menu_detail
			where a.id_group = '$userid' and link_menu_detail = '$uri'")->row();

		if (!$data) {
			redirect('back/dashboard','refresh');
		}
	}


}