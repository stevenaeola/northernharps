<?php
include "markdown.php";

function pageTop($title){
  global $siteRoot;
  if($_SERVER['SERVER_NAME']=="northernharps.co.uk"){
    $siteRoot="/";
  }
  else{
    $siteRoot="/~stevenbradley/northernharps/";
  }
  $urlbits=explode("/",$_SERVER['PHP_SELF']);
  $fname=array_pop($urlbits);
  $dir=array_pop($urlbits);
  switch($dir){
  case "courses":
    $menuitems=array(
		'index.php'=>'HARP COURSE',
		'outline.php'=>'OUTLINE',
		'venue.php'=>'VENUE',
		'accommodation.php'=>'ACCOMMODATION',
		//		'eating.php'=>'EATING',
		'booking.php'=>'BOOKING',
		'resources.php'=>'RESOURCES',
		'../'=>'NORTHERN HARPS');
    $banner="Northern Harps Courses";
    break;
  case "teaching":
    $menuitems=array(
		'index.php'=>'TEACHING',
		'../courses/'=>'HARP COURSE',
		'../'=>'NORTHERN HARPS');
    $banner="Northern Harps Teaching";
    break;
  default:
    $menuitems=array(
		     ''=>'NORTHERN HARPS',
		     'harpists/harpist.html'=>'HARPISTS',
		     'courses/'=>'COURSES',
		     'teaching/'=>'TEACHING'
		     );
    $menuitems=array();
    $banner="Northern Harps";
    
  }

?>
<html>
<head>
    <TITLE><?php print "$banner - $title";?></TITLE> 
<link rel="shortcut icon" href="<?php print ${siteRoot};?>images/harplogotiny.png" />
<meta name="Description" content="Harpist ~ Northern Harps ~ We organise courses for the harp held in the north east in Esh village county durham. Wendy Stewart is a tutor on the course and .">

<meta name="Author" content="David ">

<meta name="Description" content="Harpist ~ Northern Harps ~ Find harpists for your wedding, located in the North of England, Jen Morris and Louise Bradley play the Celtic harp for private and public functions such as wedding ceremonies, wedding receptions, birthdays, anniversaries, corporate events, garden parties, and cocktail evenings, references and repertoire. They also organise a harp course in Esh with Wendy Stewart teaching Scottish celtic lever harp (folk harp or clarsach).">

<meta name="Keywords" content="Harpist, wedding harpists, find a harpist, Cheshire, Manchester, Lancashire, Durham, Esh, Newcastle, harp, weddings, reception, professional, live, private, function, breakfast, corporate, company, event, ball, banquet, birthday, cocktail, garden, party, conference, art exhibition, fashion show, Hotel, Traditional,  Irish, Celtic, Medieval, CD  Recording, music, musician, course, tutor, folk, clarsach">

<meta name="Copyright" content="Northern Harps, 2008">

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<?php
  print "<link rel='stylesheet' type='text/css' href='${siteRoot}harps.css' />\n";
?>
</head>

<body>

<?php
    if(count($menuitems)){
      print "<div id='menu'>\n";
      foreach($menuitems as $url=>$title){
	if($url==$fname){
	  print "&raquo;";
	}
	print "<a href='$url'>$title</a><br/>\n";
      }
    print "</div>\n";
    print "<div id='main'>\n";
    }
    else{
      print "<div id='home'>\n";
      //      print Markdown("Any questions? Drop us a line on <info@northernharps.co.uk>");

    }
?>
<div id='banner'>
<table class='layout'>
<tr class='layout'>
<td class='layout'>
    <?php 
  print "<img src='${siteRoot}images/harplogosmall.jpg'/></td>\n";
  print "<td class='layout'>\n";
  print (str_replace(" ","<br/>",$banner));
  print "</td></tr></table></div>\n";
}

function pageBottom(){
  print "</div></body></html>\n";
}
?>



