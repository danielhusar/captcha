<?php

//////////////////////////////
//                          //
//                          //
//   autor: Daniel Husar    //
//                          //
//                          //
//////////////////////////////

class Captcha{

	public function __construct()
	  {
	  if (!isset($_SESSION))
	  session_start();
	  }

	//create image from random 4 letters
	public function image() {
	  header("Content-type: image/png");
	  $length = 4;
	  $characters = "abcdefghijklmnopqrstuvwxyz";
	  $string = "";   
	   
	  for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters)-1)];
	    }
	    
	  $im = imagecreate(50, 20);
	  $black = imagecolorallocate($im, 0, 0, 0);
	  imagecolortransparent($im, $black);
	  $orange = imagecolorallocate($im, 120, 110, 60);
	  imagestring($im, 6, 3, 2, $string, $orange);
	  imagepng($im);
	  imagedestroy($im);
	  $_SESSION['captcha'] = $string;
	 }

	//compare if text from user match  
	public function compare($text) {
	  if ( ($_SESSION['captcha'] == $text) && ($text != '') )
	    return true;
	  else
	    return false;
	  }

	//return the string from image  
	public function getString() {
	  return $_SESSION['captcha'];
	  }
}

/*

Example:

image.php
$captcha = new Captcha;
$captcha -> image();

guestbook.php
<img src="image.php" alt="captcha">
...
$captcha = new Captcha;
if ($captcha->compare($_POST['textfield'])){
	..continue
} else {
	echo "wrong captcha";
}

*/
?>