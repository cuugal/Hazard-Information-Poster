<?php

//*****************
// This script created and maintained by Andrew Edwards
// CB01.20.19 Phone: x2843
// Faculty of Engineering and IT
// Updated with higher res 2/3/2011
// Updated with stickers ported to csv (no longer hard coded). Better use of temp variables. Greatly reduced redundant code (~100lines)
// Updated with more stickers and relocation 7/2/2012
// A3 pdf output 15/8/12
//*****************

//need more memory
ini_set("memory_limit","256M");

date_default_timezone_set("Australia/Sydney");
// Create image instances

//Base Poster
$src = imagecreatefrompng('./img/poster_base.png');

//Blank Canvas
$dest = imagecreatetruecolor(3508, 4961);

//location of sticker spots
$warningx = 180;
$warningy = 963;
$safetyx = 1986;
$safetyy = 2200;
$emergencyx = 1082;
$emergencyy = 3445;

// Text vars
$black = imagecolorallocate($dest, 0, 0, 0);
$red = imagecolorallocate($dest, 255, 0, 0);
$font = 'ARIAL.TTF';

// Copy
imagecopy($dest, $src, 0, 0, 0, 0, 3508, 4961);

//Place Warning Stickers (from html form)
$newline = 0;
if (isset($_POST['hazards']))
{
  foreach($_POST['hazards'] as $value) {
	$temp = imagecreatefrompng('./img/stickers/hazard/'.$value.'.png');
    imagecopy($dest, $temp, $warningx, $warningy, 0, 0, 408, 524);
    $warningx += 452;
    $newline ++;
    //check if reached end slots...
    if($newline=="7") {
      $warningy += 533;
      $warningx = 180;
      }
  }  
}

if (isset($_POST['customHzds']))
{
  // Place custom hazards (freetext)
  foreach($_POST['customHzds'] as $haztext)
  {
	if (!empty($haztext))
	{
		$temp = addLabelText("./img/stickers/hazard/exclamation.png", 430, $haztext, $black, $font);
		imagecopy($dest, $temp, $warningx, $warningy, 0, 0, 408, 524);
		$warningx += 452;
		$newline ++;
		//check if reached end slots...
		if($newline=="7") {
		  $warningy += 533;
		  $warningx = 180;
		}
	}
  }
}

// Create a label with custom text
function addLabelText($imgSrc, $startHeight, $text, $color, $font)
{
		$arrStr = explode(" ",$text);
		if (empty($imgSrc))
		{
			$temp = imagecreatetruecolor(408, 524);
			$white = imagecolorallocate($temp, 255, 255, 255);
			imagefill($temp, 0, 0, $white);
		}
		else
		{
			$temp = imagecreatefrompng($imgSrc);
		}
		$yPos = $startHeight;
		
		// make string to fit label width
		$buff = "";
		
		foreach ($arrStr as $str)
		{
			$count = strlen($buff) + strlen($str) + 1;	// plus space
			if ($count > 16)
			{
				// print a full line
				imagettftext($temp, 40, 0, 15, $yPos,  $color, $font, $buff);
				$yPos += 45;
				$buff = $str;
			}
			else
			{
				if (empty($buff)) { $buff = $str; } else {	$buff = $buff." ".$str;} 
			}
		}
		imagettftext($temp, 40, 0, 15, $yPos,  $color, $font, $buff);
		return $temp;
}


//Place Safety Stickers

if (isset($_POST['protections']))
{
  $newline = 0;
  foreach($_POST['protections'] as $value) {
    $temp = imagecreatefrompng('./img/stickers/protection/'.$value.'.png');
    imagecopy($dest, $temp, $safetyx, $safetyy, 0, 0, 408, 524);
    $safetyx += 452;
    $newline ++;
    //check if reached end slots...
    if($newline=="3") {
      $safetyy += 533;
      $safetyx = 180;
      }
  }
}

// Place induction requirement - amended 25/9/2014 CL/S&W ;amended 10/3/14 drew
switch ($_POST['induction'])
{
	case "soft":
		$induct = imagecreatefrompng('./img/stickers/induct_soft.png');
		break;
	case "essentials":
		$induct = imagecreatefrompng('./img/stickers/induct_essentials.png');
		break;
	case "hard":
		$induct = imagecreatefrompng('./img/stickers/induct_hard.png');
		break;
	case "custom":
		$induct = addLabelText(null, 50, $_POST['customInduct'], $red, $font);
		break;
}
imagecopy($dest, $induct, 1534, 2200, 0, 0, 408, 524);

//Place Emergency Stickers

if (isset($_POST['equipments']))
{
  foreach($_POST['equipments'] as $value) {
    $temp = imagecreatefrompng('./img/stickers/equipment/'.$value.'.png');
    imagecopy($dest, $temp, $emergencyx, $emergencyy, 0, 0, 408, 524);
    $emergencyx += 904;
  }
}

//Write Text

imagettftext($dest, 60, 0, 670, 515,  $black, $font, $_POST['facility']);
imagettftext($dest, 60, 0, 700, 605,  $black, $font, $_POST['room']);
imagettftext($dest, 60, 0, 650, 695,  $black, $font, $_POST['faculty']);
//imagettftext($dest, 60, 0, 245, 905,  $black, $font, $_POST['aid_kit']);
imagettftext($dest, 60, 0, 760, 4087,  $black, $font, $_POST['aid1_name']);
imagettftext($dest, 60, 0, 2120, 4087,  $black, $font, $_POST['aid1_room']);
imagettftext($dest, 60, 0, 2840, 4087,  $black, $font, $_POST['aid1_ext']);
imagettftext($dest, 60, 0, 760, 4190,  $black, $font, $_POST['aid2_name']);
imagettftext($dest, 60, 0, 2120, 4190,  $black, $font, $_POST['aid2_room']);
imagettftext($dest, 60, 0, 2840, 4190,  $black, $font, $_POST['aid2_ext']);
//imagettftext($dest, 60, 0, 2120, 4190,  $black, $font, $_POST['aid2_room']);
//imagettftext($dest, 60, 0, 2900, 4190,  $black, $font, $_POST['aid2_ext']);
imagettftext($dest, 60, 0, 770, 4455,  $black, $font, $_POST['super_name']);
imagettftext($dest, 60, 0, 2030, 4455,  $black, $font, $_POST['super_room']);
imagettftext($dest, 60, 0, 2750, 4455,  $black, $font, $_POST['super_ext']);

imagettftext($dest, 60, 0, 980, 4695,  $black, $font, $_POST['bso_name']);
imagettftext($dest, 60, 0, 1950, 4695,  $black, $font, $_POST['bso_ext']);
imagettftext($dest, 60, 0, 2750, 4695,  $black, $font, $_POST['bso_fax']);

// Output and free from memory based on which filetype (some redundant code if i wanna fix it sometime)
$filetype = $_POST['filetype'];

switch ($filetype) {
	case "png":
		header('Content-Type: image/png');
		header('Content-disposition: attachment; filename="'.$_POST['room'].'_hazardposter.png"');
		imagepng($dest,NULL,0,NULL);
		break;
	case "gif":
		header('Content-Type: image/gif');
		header('Content-disposition: attachment; filename="'.$_POST['room'].'_hazardposter.gif"');
		imagegif($dest,NULL);
		break;
	case "jpeg":
		header('Content-Type: image/jpeg');
		header('Content-disposition: attachment; filename="'.$_POST['room'].'_hazardposter.jpeg"');
		imagejpeg($dest,NULL,100);
		break;
	case "pdf":
		require('./lib/fpdf.php');		
		//create temp file
		$filename = './tmp/'.date("YmdHis").'.gif';
		imagegif($dest,$filename);		
		//create pdf
		$pdf = new FPDF('P','mm','A3');
		$pdf->AddPage();
		$pdf->Image($filename,0,0,297);
		$pdf->Output("HazardInformationPoster.pdf","D");
		unlink($filename);
		break;
	default:
		header('Content-Type: image/png');
		imagepng($dest,NULL,6,NULL);
		break;
}

//close up shop
imagedestroy($dest);
imagedestroy($src);


?>