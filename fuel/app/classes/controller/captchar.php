<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */


class Controller_Captchar extends Controller
{

	public function action_index()
	{
		
		$code=rand(1000,9999);
		Session::set("captcha_code", $code);
		$im = imagecreatetruecolor(50, 24);
		$bg = imagecolorallocate($im, 255, 148, 0); //background color blue
		$fg = imagecolorallocate($im, 255, 255, 255);//text color white
		imagefill($im, 0, 0, $bg);
		imagestring($im, 5, 5, 5,  $code, $fg);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-type: image/png');
		imagepng($im);
		imagedestroy($im);
		
	}

	
}
