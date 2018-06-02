<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

	public function index() {
		echo "Captcha Created By Ank";
	}

	public function newCaptcha() {
		$string = '';
		for($i = 0; $i < 5; $i++) {
			$string .= chr(rand(97, 122));
		}

		$this->session->set_userdata('captcha', $string); //store the captcha
		$dir = APPPATH.'../assetsfront/fonts/';
		$image = imagecreatetruecolor(165, 50); //custom image size
		$font = "Captureit2.ttf"; // custom font style
		$color = imagecolorallocate($image, 128, 51, 255); // custom color
		$white = imagecolorallocate($image, 255, 255, 255); // custom background color
		imagefilledrectangle($image, 0, 0, 399, 99, $white);
		imagettftext($image, 30, 0, 10, 40, $color, $dir.$font, $this->session->userdata('captcha'));

		header("Content-type: image/png");
		imagepng($image);
	}

	public function checkCaptcha() {
		if(isset($_REQUEST['code'])) {
			echo json_encode(strtolower($_REQUEST['code']) == strtolower($this->session->userdata('captcha')));
		}
		else {
			echo 0; // no code
		}
	}

}

/* End of file Captcha.php */
/* Location: ./application/controllers/Captcha.php */