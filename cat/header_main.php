<?php
  $doc = new DOMDocument();
  $doc->load( 'list_office.xml' );
  $items = $doc->getElementsByTagName( "Item" );
  //echo "count-->".$items->length."<br><br>";
?>
<div id="header_main_left">
<a href="<?php if(qtrans_getLanguage() == "en"){ echo get_bloginfo('home')."/en/"; }else{ echo get_bloginfo('home'); } ?>"><img src="<?php echo get_bloginfo("stylesheet_directory")."/images/header_main_left.jpg" ?>"  width="233" height="243" border="0"/></a></div>
<div id="header_main_right">
<?php
	if($items->length == 0){
?>
	<img src="<?php echo get_bloginfo("stylesheet_directory")."/images/post_banner_default.jpg" ?>" width="668" height="243" /></div>
<?php }else{ ?>
	<img src="<?php echo $items->item(rand(0 ,($items->length-1)))->getAttribute("picURL"); ?>" width="668" height="243" /></div>
<?php } ?>

