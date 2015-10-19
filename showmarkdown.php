<?php
  // make a symbolic link to this file and it will render the markdown
  // in the corresponding .txt file

include "harpfunctions.php";
$fname=str_replace(".php",".txt",$_SERVER['SCRIPT_FILENAME']);
$file=file($fname);
$title=$file[0];
if(substr($title,0,1)=="<"){
  $title="Home";
 }
$filecontents=implode("",$file);
pageTop($title);
ob_start();
eval("?>$filecontents");
$stuff=ob_get_contents();
ob_end_clean();
print Markdown($stuff);
pageBottom();
?>