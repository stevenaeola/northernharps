<?php
include "../harpfunctions.php";
$inputEmail = $_REQUEST['inputEmail'];
if(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)){
  pageTop("Please supply a valid email address so I can respond to you. ");
  print ("$inputEmail is no good. Please <a href='booking.php'>try again</a>");
  pageBottom();
  exit;
 }

date_default_timezone_set("Europe/London");
$stuff="Submitted ".date('l dS \of F Y h:i:s A')."\n";
ob_start();
print_r($_POST);
$stuff.=ob_get_contents();
ob_end_clean();

$ouremail="louise@northernharps.co.uk";

mail($ouremail,"Quotation request",$stuff,"From: $ouremail");
  
pageTop("Quotation request");
print "<h1>Thanks for your interest</h1>\n";
print "<p class='lead'>I'll get back to you as soon as possible</p>\n";
print "<div><img src='../images/portrait/louise_livvy_2.jpg'></img></div>\n"; 
pageBottom();
  
?>

