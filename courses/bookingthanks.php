<?php
include "../harpfunctions.php";

$requiredfields=array("name","confirmage","email","address","payment");

$badfields=array();
foreach($requiredfields as $requiredfield){
  if(!$_POST[$requiredfield]){
    $badfields[]=$requiredfield;
  }
}
if(count($badfields)){
  pageTop("Please complete all of the fields");
  print "<h2>You need to fill in all of the starred fields</h2>\n";
  print "<form action='booking.php' method='post'>\n";
  foreach($_POST as $var=>$val){
    print "<input type='hidden' name='$var' value='$val'/>";
  }
  print "<input type='submit' value='Try again'/>";
  print "</form>";
  pageBottom();
  exit;
 }

date_default_timezone_set("Europe/London");
$stuff="Submitted ".date('l dS \of F Y h:i:s A')."\n";
ob_start();
print_r($_POST);
$stuff.=ob_get_contents();
ob_end_clean();

if($_SERVER['SERVER_NAME']=="www.dur.ac.uk"){
  $ouremail="s.p.bradley@durham.ac.uk";
 }
 else{
   $ouremail="courses@northernharps.co.uk";
 }

mail($ouremail,"Booking for harp course",$stuff,"From: $ouremail");
  
pageTop("Thanks for booking");
 
$message = <<<EOT
_Thanks for your booking request_

We can confirm your place on the Harp Course once we have received
your deposit of 50.00 GBP.
EOT;

  switch($_POST['payment']){
  case "paypal":
    $message.=<<<EOT

You said you would pay by paypal, which you can do as follows

1.  Go to http://www.paypal.co.uk
2.  Log In (if you've already used PayPal) or Sign up (if not)
3.  Click on 'Send Money' just to the right of 'My Account'
4.  Send 50.00 GBP (pounds) to payments@northernharps.co.uk as Service/Other
5.  We will then accept your payment and let you know you are booked on the course

_If this doesn't work for you_, you may wish to send us a cheque instead. Just 
send us an email at

<courses@northernharps.co.uk>

to let us know you're paying by cheque.
EOT;
  case "cheque": // n.b. no break deliberately
$message.=<<<EOT


Please send a cheque for 50.00 payable to Louise Bradley at

       Annfield House
       Front Street
       Langley Park
       Durham
       DH7 9XE
       
Once we receive your deposit we'll let you know.

Thanks from Louise.
EOT;
	  } //end switch

      print Markdown($message);
    mail($_POST['email'],"Brancepeth Harp Course: Thanks for booking",$message,"From: $ouremail");
    
   print "<p>We've also sent these instructions to your email address, but there's no need to pay twice!</p>\n";

  pageBottom();
  
?>