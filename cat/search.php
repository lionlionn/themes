<?php get_header(); ?>
<?php require("config.php"); ?>

<!--內容 start -->
<div id="content">

<!--路徑 start-->
<div class="page_path"><a href="<?php if(qtrans_getLanguage() == "en"){ echo get_bloginfo('home')."?lang=en"; }else{ echo get_bloginfo('home'); } ?>">HOME</a>/ <?php if(qtrans_getLanguage() == "en"){ echo "search result"; }else{ echo "搜尋結果"; } ?></div>
<!--路徑 end-->

<!--大標題 start-->
<div id="big_titleBox"> 
<div id="search_title"><?php if(qtrans_getLanguage() == "en"){ echo "search result"; }else{ echo "搜尋結果"; } ?></div> 
</div>
<!--大標題 end-->

<!-- 版型2 Box1 start -->
<div class="main2_box1">
  <table width="586" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><img src="<?php echo get_search_image("rectangle_long"); ?>"  width="586" height="39" /></td>

    </tr>
    
    <tr>
      <td style="padding-top:10px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line2.gif" width="586" height="2" /></td>
    </tr>
 
     <?php 
	 	//echo $_GET["fromwho"];
	   //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       //query_posts('posts_per_page=5&year='. $_GET["s"] . '&author_name=lion');
	   //query_posts('posts_per_page=1&s=k&author_name=admin');
	   //query_posts('s=k&author_name=admin');
	   if ( have_posts() ) : while ( have_posts() ) : the_post(); 
 	 ?>

    <!-- 重覆item start --> 
    <tr valign="top">
      <td>
       <table width="586" border="0" cellspacing="0" cellpadding="0">
    	<tr valign="bottom">
          <td valign="top" class="search_dateL" >

             <table border="0" cellspacing="0" cellpadding="0" class="search_date">
              <tr>
                 <td><?php the_time('Y-m-d'); ?></td>
              </tr>              
             </table>

          </td>
          <td  valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td  class="search_cat"><?php if(qtrans_getLanguage() == "en"){ echo "Posted at"; }else{ echo "張貼於"; } ?>&nbsp;&nbsp;
              <?php 
			     if($post->post_type == "post"){ 
  		            $list_categories = get_the_category();
					$tempRV = rand(0,(count($list_categories)-1));
  	                $list_cat = $list_categories[$tempRV]->cat_ID;
                    $list_cat_name = $list_categories[$tempRV]->cat_name;
					echo "<a href=\"".get_category_link($list_cat)."\">".$list_cat_name."</a>";
			     }else{ 
		 	   		//$list_page = get_page($post->ID);
			        //$list_parent = $list_page->post_parent;
					echo "<a href=\"".get_page_link($post->ID)."\">".get_the_title($post->ID)."</a>";
				 }
			  ?>        
              </td>
            </tr>
            <tr>

              <td><a href="<?php the_permalink() ?>"><div  class="search_dateR" ><?php //echo "(".$post->post_type.")"; ?><?php the_title(); ?></div></a></td>
            </tr>
          </table></td>
        </tr>
       </table>       
      </td>
    </tr>
    
    <tr>
      <td style="padding-top:8px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line2.gif" width="586" height="2" /></td>
    </tr>
	<!-- 重覆item end -->
    
    
    <?php 
	  endwhile; 
    ?>

    
	<!--分頁 start-->    
    <tr valign="bottom">
      <td height="22"> <?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?> </td>
    </tr>
    <!--分頁 end-->
    
	<?php
    else:
	?>
    
    <tr valign="top">
      <td height="100" align="center" valign="middle">
        <h4>no data...</h4>
      </td>
    </tr>    
    
    <?php
	  endif; 
	  //wp_reset_query(); 
	?>    
   </table>
</div>
<!-- 版型2 Box1 end -->

<!-- 版型2 Box2 start -->
<div class="main2_box2"></div>
<!-- 版型2 Box2 end -->

<div style="clear:both;"></div>
</div>
<!--內容  end -->

<?php get_footer(); ?>

