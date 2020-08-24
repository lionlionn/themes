<?php get_header(); ?>

<?php require("config.php"); ?>





<!--內容 start -->
<div id="content">


<!-- 版型1 Box1 start -->
<div class="index_box1">
  <table width="440" border="0" cellspacing="0" cellpadding="0">
	<!--標題 start-->
    <tr>
      <td><table width="430" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="372"><?php if(qtrans_getLanguage() == "en"){ ?><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/index_center_en.gif"/><?php }else{ ?><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/index_center.gif"/><?php } ?></td>
          <td width="58" align="right"><a href="<?php echo get_category_link($annAry[0]); ?>" class="index_more">more...</a></td>
        </tr>
      </table></td>
    </tr>
	<!--標題 end-->
    
    <!--分格線 start-->
    <tr>
      <td style="padding-top:8px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line.gif" width="426" height="1" /></td>
    </tr>
    <!--分格線 start-->
    
    <?php             
	   query_posts('cat='.$annAry[0].'&posts_per_page=10');
	   if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		   $categories = get_the_category();
		   //$totalCat只是debug看總共所屬的分類 
		   $totalCat="";
		   for($i=0; $i<count($categories); $i++){
				$totalCat = $totalCat."-".$categories[$i]->cat_ID;
		   }   

		   //100718 add check;101201 update	
		   if(count($itemAry[$annAry[0]]) == 0){
		     $cat = $annAry[0];
		   }else{
	   	      $tempRV = rand(0,(count($categories)-1));
		   	  $cat = $categories[$tempRV]->cat_ID;

			  while(checkInCat($annAry[0],$cat) == false){
				  $tempRV = rand(0,(count($categories)-1));
		    	  $cat = $categories[$tempRV]->cat_ID;
		  	 };
		   }
		   
		   $titleLen = mb_strlen($post->post_title,"UTF-8");
		   if($titleLen > $index_TCount){
			   $after_title = mb_substr($post->post_title,0,$index_TCount,"UTF-8")."...";
		   }else{
	    	   $after_title	 = $post->post_title;
		   }
	?>
   
    <!--重覆item start-->
    <tr valign="top">
      <td height="20">
       <table width="430" border="0" cellspacing="0" cellpadding="0">
    	<tr valign="bottom">
          <td height="20" valign="top" class="index_dateL" >
             <table border="0" cellspacing="0" cellpadding="0" alt="<?php echo getCatName($cat); ?>" title="<?php echo getCatName($cat); ?>">
              <tr>
                 <td><?php the_time('m-d'); ?></td>
              </tr>
              <tr>
                 <td class="cat_rectangle"><img src="<?php echo get_cat_image($cat,"rectangle"); ?>" width="39" height="2" /></td>
              </tr>
             </table>
          </td>
          <td height="20" valign="top"><?php edit_post_link('編輯', ' <B>[ ',' ]</B>'); ?><a href="<?php the_permalink() ?>?rc=<?php echo $cat; ?>" alt="<?php //echo $index_TCount."/".$titleLen; //echo "(".count($itemAry[$annAry[0]])."--".$annAry[0]."--".$cat."--[".$totalCat."]--".$cat.")"; ?>" title="<?php //echo $index_TCount."/".$titleLen; //echo "(".count($itemAry[$annAry[0]])."--".$annAry[0]."--".$cat."--[".$totalCat."]--".$cat.")"; ?>" ><div class="index_dateR"><?php the_title();//echo $after_title; ?></div></a></td>
        </tr>

       </table>       
      </td>
    </tr>
    
    <tr>
      <td style="padding-top:2px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line.gif" width="426" height="1" /></td>
    </tr>
	<!--重覆item end-->
   <?php 
	  endwhile; 
	  endif; 
	  wp_reset_query(); 
   ?>
 </table>
</div>
<!-- 版型1 Box1 end -->


<!-- 版型1 Box2 start -->
<div class="index_box2">
<table width="410" border="0" align="right" cellspacing="0" cellpadding="0">
	<!--標題 start-->
    <tr>
      <td><table width="430" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td width="372"><?php if(qtrans_getLanguage() == "en"){ ?><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/index_event_en.gif"/><?php }else{ ?><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/index_event.gif"/><?php } ?></td>
          <td width="58" align="right"><a href="<?php echo get_category_link($annAry[1]); ?>" class="index_more">more...</a></td>
        </tr>
      </table></td>
    </tr>
    <!--標題 end-->
    
    <!--分隔線 start-->
    <tr>
      <td style="padding-top:8px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line.gif"  width="426" height="1" /></td>
    </tr>
    <!--分隔線 end-->
    
       <?php             

	   query_posts('cat='.$annAry[1].'&posts_per_page=6');

	   if ( have_posts() ) : while ( have_posts() ) : the_post(); 

	   	   $categories = get_the_category();

		   //$totalCat只是debug看總共所屬的分類 

		   $totalCat="";

		   for($i=0; $i<count($categories); $i++){

				$totalCat = $totalCat."-".$categories[$i]->cat_ID;

		   }   



		   //100718 add check;101201 update	

   	       if(count($itemAry[$annAry[1]]) == 0){

		     $cat = $annAry[1];

		   }else{

	   	      $tempRV = rand(0,(count($categories)-1));

		   	  $cat = $categories[$tempRV]->cat_ID;



			  while(checkInCat($annAry[1],$cat) == false){

				  $tempRV = rand(0,(count($categories)-1));

		    	  $cat = $categories[$tempRV]->cat_ID;

		  	 };

		   }
			
		   $titleLen = mb_strlen($post->post_title,"UTF-8");
		   if($titleLen > $index_PCount){
			   $after_title = mb_substr($post->post_title,0,$index_PCount,"UTF-8")."...";
		   }else{
	    	   $after_title	 = $post->post_title;
		   }

	?>

    <!--重覆item start-->
    <tr>
      <td height="32">
       <table width="430" border="0" cellspacing="0" cellpadding="0">
    	<tr valign="top">
          <td class="index_picL"><img src="<?php echo get_post_image($post->ID,"index"); ?>" alt="<?php echo getCatName($cat); ?>" title="<?php echo getCatName($cat); ?>" width="90" height="30" /></td>
          <td><?php edit_post_link('編輯', ' <B>[ ',' ]</B>'); ?><a href="<?php the_permalink() ?>?rc=<?php echo $cat; ?>" alt="<?php //echo $index_PCount."/".$titleLen; //echo "(".count($itemAry[$annAry[1]])."--".$annAry[1]."--".$cat."--[".$totalCat."]--".$cat.")"; ?>" title="<?php //echo $index_PCount."/".$titleLen; //echo "(".count($itemAry[$annAry[1]])."--".$annAry[1]."--".$cat."--[".$totalCat."]--".$cat.")"; ?>" ><?php //echo "(".count($itemAry[$annAry[1]])."--".$annAry[1]."--".$cat."--[".$totalCat."]--".$cat.")"; ?><div class="index_picR"><?php the_title();//echo $after_title; ?></div></a></td>

        </tr>
       </table>       
      </td>
    </tr>
    <tr>
      <td style="padding-top:8px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line.gif" width="426" height="1" /></td>
    </tr>
  	<!--重覆item end-->
    
   <?php 

	  endwhile; 

	  endif; 

	  wp_reset_query(); 

   ?>


 </table>
</div>
<!-- 版型1 Box2 end -->

<div style="clear:both;"></div>
</div>
<!--內容 end -->






<?php get_footer(); ?>