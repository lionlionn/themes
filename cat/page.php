<?php get_header(); ?>
<?php require("config.php"); ?>
<?php
//$page_id = $_GET["page_id"];
$page_id = $post->ID;
$page = get_page( $page_id);
$page_p = $page->post_parent; 
//echo "page_id-->".$page_id."<br>";
//echo "page_p-->".$page_p."<br>";



//
if($page_p == $intro || $page_id== $intro){

	for($i=0; $i<count($introAry); $i++){
    	$typeStr = $typeStr."<a href=\"".get_page_link($introAry[$i])."\">".get_the_title($introAry[$i])."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";
	}
}

//
if($page_p == $lab || $page_id== $lab){

	for($i=0; $i<count($labAry); $i++){
    	$typeStr = $typeStr."<a href=\"".get_page_link($labAry[$i])."\">".get_the_title($labAry[$i])."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";
	}
}

//
if($page_p == $cooperation  || $page_id== $cooperation){
	for($i=0; $i<count($cooperationAry); $i++){
    	$typeStr = $typeStr."<a href=\"".get_page_link($cooperationAry[$i])."\">".get_the_title($cooperationAry[$i])."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";
	}
}


//
if($page_p == $contact  || $page_id== $contact){
	for($i=0; $i<count($contactAry); $i++){
    	$typeStr = $typeStr."<a href=\"".get_page_link($contactAry[$i])."\">".get_the_title($contactAry[$i])."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";
	}
}


$pathStr =getPagePath($page_id); 

?>

<!--內容 start -->
<div id="content">

<!--路徑 start-->
<div class="page_path"><a href="<?php if(qtrans_getLanguage() == "en"){ echo get_bloginfo('home')."/en/"; }else{ echo get_bloginfo('home'); } ?>">HOME</a>/ <?php echo $pathStr; ?></div>
<!--路徑 end-->

<!--分頁子項目 start-->
<?php if(strlen($typeStr) > 0){ ?>
<div class="page_item"><?php echo $typeStr; ?></div>
<?php } ?>
<!--分頁子項目 end-->


<!--大標題 start-->
<div id="big_titleBox"> 
<div id="page_title"><?php echo get_the_title($page_id); ?></div> 
</div>
<!--大標題 end-->

<!-- 版型2 Box1 start -->
<div class="main2_box1">
  <table width="586" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><img src="<?php echo get_page_image($page_id,"rectangle_long"); ?>" width="586" height="39" /></td>
    </tr>
    <tr>
      <td></td>
    </tr>

    <tr>
      <td><?php edit_post_link('編輯', ' <B>[ ',' ]</B>'); ?></td>
    </tr>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <tr>
      <td class="page_con"><?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?></td>
    </tr>
    
    <?php endwhile; endif; ?>
        
  </table>
</div>
<!-- 版型2 Box1 end -->

<!-- 版型2 Box2 start -->
<div class="main2_box2">
  <?php 
  		$side_cout = get_post_meta($page_id, 'side_count', true);
		if(empty($side_cout)){$side_cout = 3;}
		//echo "side_cout-->".$side_cout."<br>";
		for($i=1; $i<=$side_cout; $i++){
			if(get_page_side_image($page_id,"side_".$i) != ""){	  
  ?>
  <div style="padding:0px 0px 5px 0px;"><img src="<?php echo get_page_side_image($page_id,"side_".$i); ?>"  width="266" height="190" /></div>
  <?php 
			}
		} 
  ?>
</div>
<!-- 版型2 Box2 end -->




<div style="clear:both;"></div>
</div>
<!--內容  end -->



<?php get_footer(); ?>