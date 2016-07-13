<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--
// This script created and maintained by Andrew Edwards
// CB01.20.19 Phone: x2843
// Faculty of Engineering and IT
// Further details in hazardscript.php
-->

<style type="text/css">
div.sticker { 
	float:left; 
	padding:15px;
	width:70px;
	height:150px;
	justify-content:space-between;
	text-align: center;
}
.evenly {
  display:flex;
}
.clearBoth { clear:both; }
</style>

<?php
date_default_timezone_set("Australia/Sydney");
function getStickers($type)
{
	$i = 0;	// track how many stickers have been printed
	$file_handle = fopen("stickers.csv", "r");
	echo '<div class="evenly">';
	while (!feof($file_handle) ) 
	{
		$line_of_text = fgetcsv($file_handle, 1024);
		if ($line_of_text[2]==$type)
		{
			$basename = $line_of_text[1];
			$desc = $line_of_text[0];
			echo "<div class='sticker'><img src='./img/stickers/$type/$basename.png' width=50 /> <input type='checkbox' name='{$type}s[]' value='$basename' /><br />$desc</div>";
			++$i;
		}
		if ($i >= 9)
		{
			$i =0;
			echo '</div><div class="evenly">';
		}
	}
	echo '</div>';
	echo '<br class="clearBoth" />';
	fclose($file_handle);
    return;
}
?>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>UTS Hazard Information Poster Generator</title>


<link rel="shortcut icon" href="http://www.uts.edu.au/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="./css/orr.css" media="all">

<script src="http://datasearch2.uts.edu.au/common-assets/js/jquery.js" type="text/javascript"></script>
<script src="http://datasearch2.uts.edu.au/common-assets/js/tabber.js" type="text/javascript"></script>
<script src="http://www.safetyandwellbeing.uts.edu.au/js/randomimage.js" type="text/javascript"></script>
<script src="http://www.safetyandwellbeing.uts.edu.au/js/utils.js" type="text/javascript"></script>

</head>


<body class=" __plain_text_READY__">

<div id="logo">
<img src="images/UTS_logo.png" alt="UTS" width="152" height="50" style="border: 1px; vertical-align:top; float:left;">
</div>

<div id="wrappertop">
<div id="content">

<!-- Main Title -->
<!--div class="hidden-title"-->
<br />
<h1 class="pagetitle">Create a Hazard Information Poster</h1>
<br />
</div>
</div>
<div id="main-column">
<!--h2 class="pagetitle">Hazard information poster generator</h2-->


<!-- main poster generator starts here -->
	<p>This form allows you to generate Hazard Information posters for laboratories, workshops, plant rooms and other hazardous areas.</p>
	<p>When you click  the "Submit" button,  it will output an image which you may print (in A3-size, portrait aspect, in colour) then affix to the entrance to the facility.</p>

<hr><br />
				
		<form method="post" action="hazardscript.php" target="_blank">
		<p>
		<label>Facility Name</label>&nbsp;<input type="text" name="facility" value="" size="40"/> eg. Signals Lab<br />
		<label>Room Number</label>&nbsp;<input type="text" name="room" size="20" value="" /> eg. CB01.04.35<br />
		<label>Faculty/Unit</label>&nbsp;<input type="text" name="faculty" value="" size="44" /></p>
		<!-- <label>Faculty/Unit</label>&nbsp;<input type="text" name="faculty" value="" /></p> -->
		<!-- First Aid Kit Located: <input type="text" name="aid_kit" size="5" value="" /><br /> -->
		<p>First Aid Officer(s)<br />
		1) <label>Name</label>&nbsp;<input type="text" name="aid1_name" value="" /> Room <input type="text" name="aid1_room" size="15" value="" /> Ext <input type="text" name="aid1_ext" size="5" value="x" /><br />
		2) Name <input type="text" name="aid2_name" value="" /> Room <input type="text" name="aid2_room" size="15" value="" /> Ext <input type="text" name="aid2_ext" size="5" value="x" /><br />
&nbsp;<a href="http://cfsites1.uts.edu.au/safetyandwellbeing/first-aid/list.cfm?SortBy=NAMEPATH" target="_blank">(View the listing of designated First Aid Officers)</a>
</p>
		<p>Facility supervisor<br />Name <input type="text" name="super_name" value="" /> Room <input type="text" name="super_room" size="15" value="" /> Ext <input type="text" name="super_ext" size="5" value="x" /></p>
		<p>Building Services Officer<br />Name <input type="text" name="bso_name" value="" /> Ext <input type="text" name="bso_ext" size="5" value="x" /> Fax <input type="text" name="bso_fax" size="5" value="x" /><br />

<hr />	

			<strong>Safety hazards that may be encountered in this area</strong><br />			
			<?php	getStickers("hazard");	?>
			<!-- Custom Safety Hazard Input -->
			<div class='sticker' style='height:auto'><img src='./img/stickers/hazard/exclamation.png' width=50></div>
				<div>
					Other Hazard 1 (freetext): <input type="text" name="customHzds[]"><br />
					Other Hazard 2 (freetext): <input type="text" name="customHzds[]"><br />
					Other Hazard 3 (freetext): <input type="text" name="customHzds[]">
				</div>
			
			<br class="clearBoth" />

			
<hr />	

			<strong>Precautionary measures that may be required</strong><br />
			<input type="radio" name="induction" value="hard" Checked />Safety induction required before entering<br />
			<input type="radio" name="induction" value="soft" />Safety induction required before working unsupervised<br />
			<input type="radio" name="induction" value="essentials" />Safety and Wellbeing Essentials required before working.<br />
			<input type="radio" name="induction" value="custom" />
			Other Induction Message (freetext): <input type="text" name="customInduct" />
			<?php	getStickers("protection");	?>

<hr />
			<strong>In case of an emergency or accident</strong><br />
			<?php	getStickers("equipment");	?>

<hr />

<!--		<div style="clear: both;"> -->
		Select a file type (select 'none' for web viewing): <br />
		<input type="radio" name="filetype" value="none" Checked />none
		<input type="radio" name="filetype" value="png" /> .png
		<input type="radio" name="filetype" value="gif" /> .gif
		<input type="radio" name="filetype" value="jpeg" /> .jpeg
		<input type="radio" name="filetype" value="pdf" /> .pdf
		<br />
		&nbsp;
		<br />

		<input type="submit" value="Submit" name="submit">
		</form>
<!-- 		</div>	-->
<!-- main poster generator ends here -->	

<br />
<hr />
<br />


</div>



</body>
</html>