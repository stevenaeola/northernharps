<?php
include "markdown.php";

function pageTop($title){
  global $page;
  $page = new StdClass;
   $page->title = $title;
  global $siteRoot;
  $siteRoot="/";

  if(is_file("localise.php")){
	include "localise.php";
  }

   $page->siteRoot = $siteRoot;

  $urlbits=explode("/",$_SERVER['PHP_SELF']);
  $fname=array_pop($urlbits);
  $dir=array_pop($urlbits);
  switch($dir){
  case "courses":
    $page->banner="Northern Harps Courses";
    $page->imgs = ["2013learning_harp_h400.jpg"];
    break;
    
  case "lessons":
    $page->banner="Lessons";
    $page->imgs = ["harps_brancepeth_chapel_h400.jpg"];
    break;

  case "harpists":
      $page->banner="Harpist";
      $page->imgs = [ "livvy_beamish_h400.jpg"];
      if($fname == "testimonials.php"){
      	    $page->imgs = [ "gibside_livvy_kids_h400.jpg"];
      }
      break;

  default:{
    $menuitems=array();
    $page->imgs = ["louise_smile_h400.jpg"];
// $page->imgs = ["livvy_curve_h400.jpg","livvy_beamish_h400.jpg","gibside_livvy_kids_h400.jpg","louise_smile_h400.jpg", "livvy_pins_h400","harp_logo_h400.jpg","harps_brancepeth_chapel_h400"];
    $page->banner="Louise Bradley - Harpist";
    }
  }

  shuffle($page->imgs);
  include "head.php";
}

function pageBottom(){
  include "foot.php";
}
?>



