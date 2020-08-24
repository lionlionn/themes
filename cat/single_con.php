<?php 

//get_the_time('Y');

//global $post;

$categories = get_the_category();

//$cat = $categories[0]->cat_ID;



$tempRV = rand(0,(count($categories)-1));

$cat = $categories[$tempRV]->cat_ID;

//$cat_name = $categories[$tempRV]->cat_name;		   

		   

$totalCat="";

for($i=0; $i<count($categories); $i++){

	$totalCat = $totalCat."-".$categories[$i]->cat_ID;

}   



//$tempRV = rand(0,(count($categories)-1));

//$cat = $categories[$tempRV]->cat_ID;

//$cat_name = $categories[$tempRV]->cat_name;





//100714 add

$rc = $_GET["rc"];

if($rc == ""){

	//echo $totalCat;

}else{

	//echo $rc;

	$cat = $rc;

}



//2010.07.15 add

$tempStr = get_category_parent($cat, false, '/',true);

//echo "tempStr--->".$tempStr."<br>";

$tempAry = explode("/",$tempStr);

//echo "parent_length-->".(count($tempAry)-2)."<br><br>";

/*

for($i=0; $i<count($tempAry)-1; $i++){

	echo $i."---".$tempAry[$i]."<br>";     

} 

*/

for($j=0; $j<count($itemAry[$tempAry[1]]); $j++){	

	$shorCat = $itemAry[$tempAry[1]][$j];

	//echo "j---->".$shorCat."<br>";

    //$itemStr = $itemStr."<img src=\"".get_cat_image($shorCat,"square")."\" width=\"8\" height=\"8\" /><a href=\"".get_category_link($shorCat).$year."\"> ".		getCatName($shorCat)."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";

	    $itemStr = $itemStr."<img src=\"".get_cat_image($shorCat,"square")."\" width=\"8\" height=\"8\" /><a href=\"".get_category_link($shorCat)."\"> ".		getCatName($shorCat)."</a><img src=\"".get_bloginfo('stylesheet_directory')."/images/empty.gif\" width=\"15\" height=\"5\" />";



 	   

}



//year start

   $now_year = date('Y');

   $count_year = $now_year - $start_year; 



   $y = $_GET["y"];   

   if(empty($y)){

     $y = "";

   }

  

   if($y > $now_year && !empty($y) ){

	  $y = $now_year;

   }

   

   if($y < $start_year && !empty($y) ){

      $y = $start_year;

   } 

	 

   $boxWidth=36;

   $setWidth=288;

   $set =  $setWidth / $boxWidth;

   

   if($y == ""){

      $temp_year = $now_year - $now_year;

   }else{

	  $temp_year = $now_year - $y;

   }

   $temp_year2= $temp_year / $set;

   $ftemp_year2 = floor($temp_year2);

   $addPx = $ftemp_year2 * $setWidth;

   

   if($y == ""){

	   $year_no = $now_year - $start_year;

   }else{

	   $year_no = $y - $start_year;

   }



//year end



$y =get_the_time('Y');

?>



<SCRIPT type=text/javascript>





$(document).ready(function(){

  //alert("ready");

  

  var outterCWidth = $('#outtercontainer').width();

  var innerCWidth = $('#contenttable').width();

  var marginLeft = parseInt($('#innercontainer').css('margin-left'));



  //alert("outterCWidth--->"+outterCWidth);

  //alert("innerCWidth--->"+innerCWidth);

  //alert("count_year--->"+<?php echo $count_year+1; ?>);

  //alert("margin-left--->"+marginLeft);

  

  if(innerCWidth < outterCWidth){

  	$('#innercontainer').css('margin-left', 0 + 'px');

  }else{

    $('#innercontainer').css('margin-left', (outterCWidth - innerCWidth + <?php echo $addPx; ?>) + 'px');

  }

  

  <?php if($year_no < 10){ ?>

    $('#innercontainer').css('margin-left', 0 + 'px');

  <?php } ?>



  $('#scrollLeftButton').mouseover(function(){scrollingLeft();});

  $('#scrollLeftButton').mouseout(function(){scrollingStop();});

  

  $('#scrollRightButton').mouseover(function(){scrollingRight();});

  $('#scrollRightButton').mouseout(function(){scrollingStop();});

  

  

  if(innerCWidth < outterCWidth){

     $('#scrollLeftButton').hide();

     $('#scrollRightButton').hide();

  }else{

     checkLeft();

     checkRight();

  }

  

});



</SCRIPT>





<!--內容 start -->
<div id="content">

<!--路徑 start-->
<div class="archive_path"><a href="<?php if(qtrans_getLanguage() == "en"){ echo get_bloginfo('home')."/en/"; }else{ echo get_bloginfo('home'); } ?>">HOME</a>/ <?php echo getCatPath($cat); ?></div>
<!--路徑 end-->

<!--大標題 start-->
<div id="big_titleBox"> 
<div id="archive_title"><?php echo getCatName($cat); ?></div> 
<div id="archive_year">
            <TABLE height=13 cellSpacing=0 cellPadding=0 width=351px  border=0>
              <TR>
                <TD class=year width=23 height=13 style="TEXT-ALIGN: left;">
   				   <a  href="<?php echo get_category_link($cat); ?>">ALL</a>
    		  </TD>
 			  <TD class=year width=10 height=13 style="TEXT-ALIGN:left;">│</TD>
                <TD class=year  height=13 align=center>
                  <DIV id=scrollLeftButton style="CURSOR: pointer; width:15px;" >&lt;</DIV>
                </TD>
                
                
                <TD class=year height=13>
                  <!--outtercontainer start-->
                  <DIV id=outtercontainer style="OVERFLOW: hidden; WIDTH: <?php echo $setWidth; ?>px">
                    
                    <!--innercontainer start-->
                    <DIV id=innercontainer>
                      
                      <TABLE id=contenttable height=13 cellSpacing=0 cellPadding=0 <?php if(($now_year - $start_year) < 10){ ?>align=left<?php }else{ ?>align=center<?php } ?> border=0>
                        <TR>
                          
                          <?php 
		      				  for($i=$start_year; $i <= $now_year; $i++){ 
		     			  ?>
                          <!--item box start --> 
                          <TD class=year width=36  height=13> 
                            <DIV style="WIDTH: <?php echo $boxWidth; ?>px; TEXT-ALIGN: center;-webkit-text-size-adjust:none;"> 
                               <a style="<?php if($y == $i){ ?>COLOR: #EB5C2B;<?php } ?>" href="<?php echo get_category_link($cat); ?>?y=<?php echo $i; ?>"><?php echo $i; ?></A>
                            </DIV> 
                          </TD> 
                          <!--item box end--> 
                          <?php
		        			 }
		     			  ?>	
						</TR>
                      </TABLE>
                      <!--innercontainer end-->
                    </DIV>
                    
                    <!--outtercontainer end-->
                  </DIV>
                </TD>
                <TD class=year height=13 align=center>
                  <DIV id=scrollRightButton style="CURSOR: pointer; width:15px;">&gt;</DIV>
                </TD>
              </TR>
  </TABLE>

</div>
<div style="clear:both;"></div>
</div>
<!--大標題 end-->

<!-- 版型2 Box1 start -->
<div class="main2_box1"> 
  <table width="586" border="0" cellspacing="0" cellpadding="0"> 
 
    <tr> 
 
      <td><img src="<?php echo get_cat_image($cat,"rectangle_long"); ?>" width="586" height="39" /></td> 
 
    </tr> 
 
    <tr> 
 
      <td style="padding:10px 0px 0px 0px;"> 
 
      <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
 
        <tr> 
 
          <td>
         <?php echo $itemStr; ?>
          </td> 
 
        </tr> 
 
      </table> 
 
      </td> 
 
    </tr> 
 
    <tr> 
 
      <td style="padding-top:10px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line2.gif" width="586" height="2" /></td> 
 
    </tr> 
 
   
    <?php  if (have_posts()) : while (have_posts()) : the_post();	?>
 
    
    <tr valign="top"> 
 
      <td height="25"> 
 
       <table width="586" border="0" cellspacing="0" cellpadding="0"> 
 
    	<tr valign="bottom"> 
 
          <td height="20" valign="top" class="single_dateL" > 
 
             <table border="0" cellpadding="0" cellspacing="0"> 
 
              <tr> 
 
                 <td><?php the_time('Y-m-d'); ?></td> 
 
              </tr> 
 
              
 
             
 
 
 
              <tr> 
 
                 <td class="cat_rectangle" ><img src="<?php echo get_cat_image($cat,"rectangle"); ?>" width="76" height="2" /></td> 
 
              </tr> 
 
              
 
             
 
              
 
              
 
             </table>          </td> 
 
 <td height="20" valign="top" class="single_dateR" ><span class="single_title"><?php //echo "(".$cat."--".$totalCat.")"; ?><?php the_title(); ?></span></td>
        </tr> 
 
       </table>      </td> 
 
    </tr> 
 
    
 
    <tr> 
 
      <td style="padding-top:5px;padding-bottom:5px;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/list_line2.gif" width="586" height="2" /></td> 
 
    </tr> 
 
    
 
    <tr> 
 
      <td></td> 
 
    </tr> 
 
    
    <tr>

      <td><?php edit_post_link('編輯', ' <B>[ ',' ]</B>'); ?></td>

    </tr>
    
    
    <tr> 
 
      <td> 
 
        <div align="left"> 
 
        <table width="586" border="0" cellspacing="0" cellpadding="0"> 
 
              <tr> 
 
                <td  class="single_con"><?php //the_author_posts_link(); ?><?php the_content(); ?></td> 
 
              </tr> 
 
       </table> 
 
       </div> 
 
     </td> 
 
    </tr> 
 
 
   <?php endwhile; else: ?>



	<tr valign="top">

      <td height="100" align="center" valign="middle">

        <h4>no data...</h4>

      </td>

    </tr>





    <?php endif; ?>

 
 
    
 
 
 
 
 
 
  </table> 
  
 
 
  
 
</div> 
<!-- 版型2 Box1 end -->
 
<!-- 版型2 Box2 start -->
<div class="main2_box2">
  <?php 
  		$side_cout = get_post_meta($post->ID, 'side_count', true);
		if(empty($side_cout)){$side_cout = 3;}
		//echo "side_cout-->".$side_cout."<br>";
		for($i=1; $i<=$side_cout; $i++){ 
  			if(get_post_side_image($post->ID,"side_".$i) != ""){
  ?>
  <div style="padding:0px 0px 5px 0px;"><img src="<?php echo get_post_side_image($post->ID,"side_".$i); ?>" width="266" height="190" /></div>
  <?php 
  			}
  		}
  ?>
</div>
<!-- 版型2 Box2 end --> 
 
 
 
<div style="clear:both;"></div> 
</div> 
<!--內容 end -->





