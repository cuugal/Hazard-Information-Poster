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
	padding:5px;
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
<!-- <link rel="stylesheet" type="text/css" href="./css/style.css" /> -->
<link rel="stylesheet" type="text/css" href="http://www.uts.edu.au/css/generic/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="http://www.uts.edu.au/css/generic/site-template.css" />
<!--[if lt IE 7]>   <link rel="stylesheet" type="text/css" href="http://www.uts.edu.au/css/generic/ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="print" href="http://www.uts.edu.au/css/generic/print.css" />

<link rel="shortcut icon" href="http://www.uts.edu.au/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="http://www.safetyandwellbeing.uts.edu.au/css/override.css" />

<script src="http://datasearch2.uts.edu.au/common-assets/js/jquery.js" type="text/javascript"></script>
<script src="http://datasearch2.uts.edu.au/common-assets/js/tabber.js" type="text/javascript"></script>
<script src="http://www.safetyandwellbeing.uts.edu.au/js/randomimage.js" type="text/javascript"></script>
<script src="http://www.safetyandwellbeing.uts.edu.au/js/utils.js" type="text/javascript"></script>

<style type="text/css">

#tablink-2 {
width: 130px;
}

#tab-nav ul li.tab-2 a:link#tablink-2, 
#tab-nav ul li.tab-2 a:visited#tablink-2
{
color: #fff; 
border: none; 
background: none; 
padding: 2px 0 7px 0;
background: #09c url(http://www.uts.edu.au/images/css/tabs_active_corner2.gif) top right no-repeat;
border-left: 1px solid #fff;
}

#tab-nav ul li#group-1,
#tab-nav ul li#group-2,
#tab-nav ul li#group-3,
#tab-nav ul li#group-4
{display: none;}

#tab-nav ul li#group-2
{display: block;}

<!-- CL CSS -->
/* label {color: red;} */


</style>
</head>
<body>

<!-- Skip Links -->
<div id="skip-links">
	<a href="#start-content"><img src="http://www.uts.edu.au/images/css/skip.jpg" alt="Skip to content" width="0" height="0" /></a>
	<a href="#navigation"><img src="http://www.uts.edu.au/images/css/skip.jpg" alt="Skip to navigation" width="0" height="0" /></a>
	<a href="http://www.uts.edu.au/about/utsweb-statements/accessibility-statement"><img src="http://www.uts.edu.au/images/css/skip.jpg" alt="Accessibility statement" width="0" height="0" /></a>
	<p class="hidden">Using a modern browser that supports web standards ensures that the site's full visual experience is available.  Consider upgrading your browser if you are using an older technology.</p>

</div>


<!-- Global Utility Bar (Banner) -->
<div id="global-utility-bar">
<!-- UTS Logo -->
<div id="uts-logo">
<a href="http://www.uts.edu.au"><img src="http://www.uts.edu.au/images/css/utslogo.gif" alt="University of Technology, Sydney homepage" width="132" height="30" /></a>
</div>

<!-- Main Title -->
<div class="hidden-title">
<p>University of Technology, Sydney</p>
</div>

<!-- Global Utility Bar Navigation -->
<div id="global-utility-bar-nav">
<a name="navigation"></a><!-- Skip to Navigation Anchor -->
<a href="https://email.itd.uts.edu.au/webapps/directory/byname/">Staff directory</a> | 
<a href="http://www.uts.edu.au/about/maps-and-facilities/campus-maps-and-facilities">Campus maps</a> | 
<a href="http://newsroom.uts.edu.au/">Newsroom</a> | 
<a href="http://www.events.uts.edu.au/web/">What's on</a>
</div>



<!-- Search Form -->
<div id="global-utility-bar-search">
<form method="get" action="http://datasearch2.uts.edu.au/safety-wellbeing/search.cfm">
   <div>
      SEARCH
      &nbsp; <input type="radio" name="scope" value="site" checked="checked" id="search-this-site" /> <label for="search-this-site">this site</label>
      &nbsp; <input type="radio" name="scope" value="uts" id="search-all-UTS" /> <label for="search-all-UTS">UTS</label> &nbsp;
      <label for="input-text"></label><input type="text" name="q" size="14" maxlength="100" id="input-text" />
      <input type="submit" name="btnG" value="Go" />
   </div>
</form>
</div>
</div>

<!--Tab Navigation -->
<div id="tab-navigation-wrapper">
<div id="tab-navigation-leftside"><a href="http://www.safetyandwellbeing.uts.edu.au/"><img src="http://www.safetyandwellbeing.uts.edu.au/images/css/safety-home.png" alt="Safety and Wellbeing Home" width="235" height="136" /></a></div>
<div id="tab-navigation">
<div id="tab-nav">
<ul>
<li class="blank-group"><div id="groupNone" class="groups">&nbsp;</div></li>

<!-- Tab 1 -->
<li class="tab-1">
<a href="http://www.safetyandwellbeing.uts.edu.au/for.html" name="tab1" id="tablink-1" class="tab-1" onmouseover="javascript:switchTab(0);" onkeypress="javascript:switchTab(0);" onfocus="javascript:switchTab(0);" >
Information for</a>
</li>
<li id="group-1"><div id="group1" class="groups"><ul class="section-list">
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/first-aid/officers/index.html">First aid officers</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/student/index.html">Students</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/staff/technical.html">Technical staff</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/researchers/index.html">Researchers</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/contractors/index.html">Contractors and visitors</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/staff/academic.html">Academic staff</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/managers/index.html">Managers and supervisors</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/staff/support.html">Support staff</a></li>
</ul></div></li>

<!-- Tab 2 -->
<li class="tab-2">
<a href="http://www.safetyandwellbeing.uts.edu.au/about.html" name="tab2" id="tablink-2" class="tab-2" onmouseover="javascript:switchTab(1);" onkeypress="javascript:switchTab(1);" onfocus="javascript:switchTab(1);" >
About safety and wellbeing</a></li>
<li id="group-2"><div id="group2" class="groups"><ul class="section-list">
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/branch/index.html">Safety &amp; Wellbeing branch</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/management/index.html">Management system</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/forms/index.html">Forms</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/index.html">Work environments</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/hazards/index.html">Hazards</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/accidents/index.html">Reacting to a hazard, accident or incident</a></li>
<li class="SectionNavLevel3 current"><a href="http://www.safetyandwellbeing.uts.edu.au/preventing/index.html"><span>Preventing injury and illness</span></a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/wellbeing/index.html">Wellbeing</a></li>
<li class="SectionNavLevel3"><a href="http://www.safetyandwellbeing.uts.edu.au/activities/index.html">Activities</a></li>
</ul></div></li>
</ul>


<script type="text/javascript">
<!--
switchTab(-1);
-->
</script>
<script type="text/javascript">
<!--
switchTab(1);
-->
</script>
</div>
</div>
</div>

<div id="full-container"> <!-- includes footer -->
<div id="main-container"> <!-- does not include footer -->

<!-- Sidebar -->
<div id="sidebar-wrapper"> <!-- important for IE6 -->
<div id="sidebar">
	
	<div id="level3-nav">
<div class="level3-nav-heading">
<a href="http://www.safetyandwellbeing.uts.edu.au/preventing/index.html">Preventing injury and illness</a>
</div>
<ul class="section-list">
<li class="SectionNavLevel4"><a href="http://www.safetyandwellbeing.uts.edu.au/risk-management/index.html">Risk management</a></li>
<li class="SectionNavLevel4 current"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/index.html"><span>Work environments</span></a>
<ul id="sectionGroup20657">
<li class="SectionNavLevel5"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/office/index.html">Offices and general work areas</a></li>
<li class="SectionNavLevel5 current"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/lab/index.html"><span>Labs and workshops</span></a>
<ul id="sectionGroup20663">
<li class="SectionNavLevel7"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/lab/accreditation.html">Accreditation programs for labs and workshops</a></li>
<li class="SectionNavLevel7 current"><a href="http://www.safetyandwellbeing.uts.edu.au/environment/lab/posters.html"><span>Hazard info posters</span></a>
<ul id="sectionGroup30473">
<li class="SectionNavLevel8" id="currentpage"><a href="http://safetyapp.adsroot.uts.edu.au/haz/">Create a poster</a></li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
<li class="SectionNavLevel4"><a href="http://www.safetyandwellbeing.uts.edu.au/activities/index.html">Activities</a></li>
<li class="SectionNavLevel4"><a href="http://www.safetyandwellbeing.uts.edu.au/hazards/index.html">Hazards</a></li>
</ul>
</div>
<div id="undernav-wrapper">
<div id="sidebar-buttons"><a href="https://uts.riskcloud.net/" id="report1"></a></div>
<div id="tabber" class="sb">

	<!-- News -->
	<h2><a href="#">Notices</a></h2>
	<!-- News -->
<!-- neAttributes -->






















<script type="text/javascript">
<!-- 
/* <![CDATA[ */
	if (typeof jQuery != 'undefined') {
		//set variables and get the data
		jQuery(document).ready(function(){
			//hide the template until it has been populated
			jQuery("#" + 'news-container').hide();
			var nePublicationId = '328';
			var neTemplate = 'news-container';
			var neNoRecordsText = 'No notices';
			var neHideIfEmpty = 'false';
			var neGetOnly = 'current';
			var neMaxRows= '5';
			var neTopFeatured = '2';
			var neStartRow = '1';
			var neSortBy = 'published';
			var neSortDirection = 'DESC';
			var neCategoryId = '';
			var neExcludeCategoryId = '';
			var neThemeId = '';
			var neSectionId = '';
			var neCampusId = '';
			var neBuildingId = '';
			var neAudienceId = '';
			var neCourseId = '';
			var neAddCategories = 'false';	
			var neSummaryWordLength = 'false';
			var callback = '';
			var randomNumber=Math.floor(Math.random()*1000);
			var neAttributes = '';
			if (neGetOnly.length) {neAttributes = neAttributes + '&GetOnly=' + neGetOnly;}
			if (neMaxRows.length) {neAttributes = neAttributes + '&MaxRows=' + neMaxRows;}
			if (neTopFeatured.length) {neAttributes = neAttributes + '&TopFeatured=' + neTopFeatured;}
			if (neStartRow.length) {neAttributes = neAttributes + '&StartRow=' + neStartRow;}
			if (neSortBy.length) {neAttributes = neAttributes + '&SortBy=' + neSortBy;}
			if (neSortDirection.length) {neAttributes = neAttributes + '&SortDirection=' + neSortDirection;}
			if (neCategoryId.length) {neAttributes = neAttributes + '&CategoryId=' + neCategoryId;}
			if (neExcludeCategoryId.length) {neAttributes = neAttributes + '&ExcludeCategoryId=' + neExcludeCategoryId;}
			if (neThemeId.length) {neAttributes = neAttributes + '&ThemeId=' + neThemeId;}
			if (neSectionId.length) {neAttributes = neAttributes + '&SectionId=' + neSectionId;}
			if (neCampusId.length) {neAttributes = neAttributes + '&CampusId=' + neCampusId;}
			if (neBuildingId.length) {neAttributes = neAttributes + '&BuildingId=' + neBuildingId;}
			if (neAudienceId.length) {neAttributes = neAttributes + '&AudienceId=' + neAudienceId;}
			if (neCourseId.length) {neAttributes = neAttributes + '&ItemCourseId=' + neCourseId;}
			if (neAddCategories.length) {neAttributes = neAttributes + '&AddCategories=' + neAddCategories;}
			if (neSummaryWordLength.length) {neAttributes = neAttributes + '&SummaryWordLength=' + neSummaryWordLength;}
			if (neHideIfEmpty.length) {neAttributes = neAttributes + '&HideIfEmpty=' + neHideIfEmpty;}
			if (callback.length) {neAttributes = neAttributes + '&callback=' + callback;}
			neAttributes = neAttributes + '&dataPrefix=' + randomNumber;
			//get data and display it
			jQuery.getScript("http://www.events.uts.edu.au/app/feedJquery.cfm?PublicationId=" + nePublicationId + neAttributes, function(){
				getData(neTemplate,neNoRecordsText,nePublicationId,randomNumber);
			});
		});
	}
	else {
		alert('No jQuery!');
	}
/* ]]> */
-->
</script>

<div class="tab-content">
	<h2>Notices</h2>

	<noscript><p>Display of this content requires JavaScript to be enabled. Please do so in your browser or use the links below.</p></noscript>
	<ul id="news-container">
		<li>
			<h3><a href="http://datasearch2.uts.edu.au/safety-wellbeing/notices/detail.cfm?ItemId={itemid}">{title}</a></h3>
			<p class="story-summary">{summary}</p>
			<p class="story-date">{published}</p>
		</li>
	</ul>
	<a href="http://datasearch2.uts.edu.au/safety-wellbeing/notices/index.cfm" class="more-newsevents" id="more-news">More notices</a>
	<a href="http://datasearch2.uts.edu.au/safety-wellbeing/notices/past/index.cfm" class="more-newsevents" id="past-news">Past notices</a>
	<a href="http://datasearch2.uts.edu.au/safety-wellbeing/notices/rss.cfm" class="rss-feed">RSS feed</a>
</div>

	<h2><a href="#">Contact</a></h2>
	<div class="tab-content">
		<div class="contact-in-a-tab">

<h3>Safety &amp; Wellbeing</h3>
<p><strong>In person</strong>, please phone ahead for an appointment:<br />
Level 6, 235 Jones Street (Building 10)<br/>
City campus<br/>
University of Technology, Sydney<br/>
Broadway NSW 2007<br/>
Australia</p>

<p><strong>By post</strong>:<br />
Safety &amp; Wellbeing<br />
University of Technology, Sydney<br />
PO Box 123<br />
Broadway NSW 2007<br />
Australia</p>
<p><strong>By fax</strong>:<br/>
+61 2 9514 1327</p>

</div>
	</div>
</div>
<div id="contact-out-of-tab"></div>
<div id="sidebar-logos"></div>
</div>
</div>
</div>

<!-- Main Column -->
<div id="main-column">

<!-- Banner -->
<div id="banner-wrapper">
            <div id="banner">

               <div class="internalbanner">

                  <div class="rightside"><img src="http://www.uts.edu.au/images/dot_clear.gif" width="304" height="100" alt="" /></div>
                  <div class="middleside"><h1>Create a poster</h1></div>

               </div>
            </div>
          </div>

<!-- Content -->
<div id="main-content-nobanner">
<div id="main-content">

<!-- Skip to Contents Anchor -->
<a name="start-content"></a>

<!-- Content Columns -->


<div id="content">
<div class="ie-images"> <!-- fixes problem where images don't display in ie6 -->

<h1>Hazard information poster generator</h1>




<!-- main poster generator starts here -->
	<p>This form allows you to generate Hazard Information posters for laboratories, workshops, plant rooms and other hazardous areas.</p>
	<p>When you click  the "Submit" button,  it will output an image which you may print (in A3-size, portrait aspect, in colour) then affix to the entrance to the facility.</p>

<hr style="width: 35%; color: #5A8033; font-size: 1px; line-height: 0; overflow: visible; max-height: 0;" /><br />
				
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

		<input type="submit" value="Submit" name="submit">
		</form>
<!-- 		</div>	-->
<!-- main poster generator ends here -->	


</div>

</div>



</div>
<div class="clear"><img src="http://www.uts.edu.au/images/dot_clear.gif" width="15" height="2" alt="" /></div>
</div>


</div>
</div>

</div>
</div>

<!-- Footer -->

<div id="footer-wrapper">
<div id="website-footer">

<div id="footer-nav"><p><a href="http://www.safetyandwellbeing.uts.edu.au/for.html">Information for</a> 
<img src="http://www.safetyandwellbeing.uts.edu.au/images/css/separator.gif" alt="" width="4" height="6" /> 
<a href="http://www.safetyandwellbeing.uts.edu.au/about.html">About safety and wellbeing at UTS</a></p><div class="backto-sw-home"><a href="http://www.safetyandwellbeing.uts.edu.au/index.html"><img src="http://www.uts.edu.au/images/dot_clear.gif" alt="Home page" /></a></div></div>

<div id="footer-subnav">
<p>
<a href="http://www.safetyandwellbeing.uts.edu.au/index.html">UTS: Safety and wellbeing</a> | 
<a href="http://www.safetyandwellbeing.uts.edu.au/sitemap.html">Site map</a> | 
<a href="http://www.safetyandwellbeing.uts.edu.au/branch/contacts/index.html">Contacts</a> | 
<a href="http://datasearch2.uts.edu.au/safety-wellbeing/notices/index.cfm">Notices</a> | 
<a href="http://datasearch2.uts.edu.au/safety-wellbeing/events/index.cfm">Events</a></p>
</div>
<div class="backto-hru-home"><a href="http://hru.uts.edu.au/"><img src="http://www.uts.edu.au/images/dot_clear.gif" alt="HRU site" /></a></div>
</div>
<div id="global-footer">
<div id="footer-img">
<a href="http://www.uts.edu.au/">
<img src="http://www.uts.edu.au/images/css/uts_logo_footer.gif" alt="UTS homepage" width="130" height="29" /></a>
<br /><a href="http://www.atn.edu.au">UTS is a member of the<br />Australian Technology Network of Universities</a>
</div>

<div id="footer-text">
<div class="primary-links">
<a href="https://email.itd.uts.edu.au/webapps/directory/byname/">Staff directory</a> 
<img src="http://www.uts.edu.au/images/css/separator.gif" alt="" width="4" height="6" /> 
<a href="http://www.uts.edu.au/about/maps-and-facilities/campus-maps-and-facilities">Campus maps</a>
<img src="http://www.uts.edu.au/images/css/separator.gif" alt="" width="4" height="6" /> 
<a href="http://newsroom.uts.edu.au/">Newsroom</a>
<img src="http://www.uts.edu.au/images/css/separator.gif" alt="" width="4" height="6" /> 
<a href="http://www.events.uts.edu.au/web/">What's on</a>
</div>
&copy; Copyright UTS - CRICOS Provider No: 00099F - 9 March 2012 5:02PM<br />
The page is authorised by Branch Manager, Safety &amp; Wellbeing - 
Send comments to <a href="mailto:Campbell.Lee@uts.edu.au?subject=Web comment - Hazard information poster generator page">Safety &amp; Wellbeing</a><br />
<a href="http://www.uts.edu.au/node/4984">Disclaimer</a> |
<a href="http://www.uts.edu.au/node/4989">Privacy</a> |
<a href="http://www.uts.edu.au/about/utsweb-statements/copyright-statement">Copyright</a> |
<a href="http://www.uts.edu.au/about/utsweb-statements/accessibility-statement">Accessibility</a> |
<a href="http://www.gsu.uts.edu.au/policies/webpolicy.html">Web policy</a> |
<a href="http://www.uts.edu.au/">UTS homepage</a>
</div>
</div>
</div>



<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16622082-1");
pageTracker._trackPageview();

var utsMasterTracker = _gat._getTracker("UA-10919634-1");
utsMasterTracker._trackPageview("http://www.safetyandwellbeing.uts.edu.au");
utsMasterTracker._setDomainName(".uts.edu.au");



} catch(err) {}</script>
</body>
</html>