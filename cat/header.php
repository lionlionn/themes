<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-TW" >
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7;" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slidemenu.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/year.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-latest.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/imageOverChange.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/objectSwap.js"></script>

<?php wp_head(); ?>

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
function isIE(){ 
	$user_agent = $_SERVER["HTTP_USER_AGENT"]; 
	if(strpos($user_agent,"MSIE")){ 
		return true; 
	}else { 
		return false; 
	}
}

if ( is_home() ) {
?>
<?php } else { // No sidebar ?>
	#header_swf { height: 243px;  }
<?php } ?>


</style>
</head>

<?php require("config.php"); ?>
<?php //require("common_function.php"); ?>

<?php //echo "get_pagenum_link--->".esc_url(get_pagenum_link()); ?>

<?php
if(qtrans_getLanguage() == "en"){
   $home_link=get_bloginfo('home')."/en/";
}else{
   $home_link=get_bloginfo('home');
}

 
if(empty($_GET["y"])){
   $year = "";
}else{
   $year = "?y=". $_GET["y"];
}

if(empty($_GET["rc"])){
   $rc = "";
}else{
   $rc = "?rc=". $_GET["rc"];
}

//echo "rc----->".$rc."<Br>";
//echo "year--->".$year."<br>";
//echo "cat---->".get_query_var('cat')."<br>";

if(is_home()){
   //echo "is home<br>";
   $langURL = get_bloginfo('home');
   $langEnURL = get_bloginfo('home')."/en/";
}

if(is_category()){
   //echo "is category<br>";
   $langURL = get_bloginfo('home')."/category/".getCatSigPath(get_query_var('cat')).$year;
   $langEnURL = get_bloginfo('home')."/en/category/".getCatSigPath(get_query_var('cat')).$year;
}

if(is_single()){
   //echo "is single<br>";
   $pp_path=$post->ID.".html";
   $langURL = get_bloginfo('home')."/".$pp_path.$rc;
   $langEnURL = get_bloginfo('home')."/en/".$pp_path.$rc;
}

if(is_page()){
   //echo "is page<br>";
   $langURL = get_bloginfo('home')."/".getPageSigPath($post->ID);
   $langEnURL = get_bloginfo('home')."/en/".getPageSigPath($post->ID);    
}

if(is_search()){
   //echo "is_search<br>";
   $pp_path=$post->ID.".html";
   $langURL = get_bloginfo('home')."/?s=".urlencode($_GET["s"]);
   $langEnURL = get_bloginfo('home')."/en/?s=".urlencode($_GET["s"]);
}

//echo "langURL---".$langURL."<br>";
//echo "langEnURL---".$langEnURL."<br>";
?>

<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){
	    //alert("ready");

	});
<!--
function langToEn(){
	//alert("langToEn start");
	window.self.location.href="<?php echo $langEnURL; ?>";
}
function langToCh(){
	//alert("langToCh start");
	window.self.location.href="<?php echo $langURL; ?>";
}
function homeLink(){
	//alert("homeLink start");
	window.self.location.href="<?php echo $home_link; ?>";
}
function postLink(id){
	//alert("postLink start");
	//alert("id--->"+id);
	<?php   if(qtrans_getLanguage() == "en"){ ?>
		window.self.location.href="<?php echo $home_link; ?>"+id+".html";
	<?php   }else{ ?>
	    window.self.location.href="<?php echo $home_link; ?>/"+id+".html";
	<?php } ?>
}

// -->
</script>   


<body>

<div id="global_menu">
  <div id="horizon_menu">
	<ol>
    	<!--第一項 start-->
		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>135px<?php }else{ ?>75px<?php } ?>"><span><a href="<?php echo get_category_link($annAry[0]); ?>"><?php echo getCatName($ann); ?></a></span>
           	<!--第一項 細項start-->
			<ul class="collapsed">
                <?php for($i=0; $i<count($annAry); $i++){ ?>
				<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>49px<?php }else{ ?>60px<?php } ?>" >
                	<a href="<?php echo get_category_link($annAry[$i]); ?>"><?php echo getCatName($annAry[$i]); ?></a>
                </li>
                <?php } ?>	
			</ul>
            <!--第一項 細項end-->
		</li>
        <!--第一項 end-->
        
        <!--第二項 start-->
		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>115px<?php }else{ ?>75px<?php } ?>"><span><a href="<?php echo get_page_link($introAry[0]); ?>"><?php echo get_the_title($intro); ?></a></span>
       		<!--第二項 細項start-->
			<ul class="collapsed">
                <?php for($i=0; $i<count($introAry); $i++){ ?>
				<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>77px<?php }else{ ?>60px<?php } ?>" >
                	<a href="<?php echo get_page_link($introAry[$i]); ?>"><?php echo get_the_title($introAry[$i]); ?></a>
                </li>
                <?php } ?>	
			</ul>
            <!--第二項 細項end-->
		</li>
        <!--第二項 end-->
        
        <!--第三項 start--> 
  		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>88px<?php }else{ ?>75px<?php } ?>"><span><a href="<?php echo get_category_link($recAry[0]); ?>"><?php echo getCatName($rec); ?></a></span>
            <!--第三項 細項start-->
			<ul class="collapsed">
                <?php for($i=0; $i<count($recAry); $i++){ ?>
				<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>78px<?php }else{ ?>60px<?php } ?>" >
                	<a href="<?php echo get_category_link($recAry[$i]); ?>"><?php echo getCatName($recAry[$i]); ?></a>
                </li>
                <?php } ?>	
			</ul>
            <!--第三項 細項end-->
		</li>
        <!--第三項 end--> 
        
        <!--第四項 start-->  
		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>89px<?php }else{ ?>75px<?php } ?>"><span><a href="<?php echo get_page_link($labAry[0]); ?>"><?php echo get_the_title($lab); ?></a></span>
             <!--第四項 細項start-->
			<ul class="collapsed">
               <?php for($i=0; $i<count($labAry); $i++){ ?>
				<li  style="width:<?php if(qtrans_getLanguage() == "en"){ ?>172px<?php }else{ ?>115px<?php } ?>" ><a href="<?php echo get_page_link($labAry[$i]); ?>"><?php echo get_the_title($labAry[$i]); ?></a></li>
                <?php } ?>	
			</ul>
            <!--第四項 細項end-->
		</li>
        <!--第四項 end--> 
        
        <!--第五項 start--> 
		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>97px<?php }else{ ?>75px<?php } ?>"><span><a href="<?php echo get_page_link($cooperationAry[0]); ?>"><?php echo get_the_title($cooperation); ?></a></span>
            <!--第五項 細項start-->
			<ul class="collapsed">
               <?php for($i=0; $i<count($cooperationAry); $i++){ ?>
				<li  style="width:<?php if(qtrans_getLanguage() == "en"){ ?>77px<?php }else{ ?>60px<?php } ?>" ><a href="<?php echo get_page_link($cooperationAry[$i]); ?>"><?php echo get_the_title($cooperationAry[$i]); ?></a></li>
                <?php } ?>	
			</ul>
            <!--第五項 細項end-->
		</li>
        <!--第五項 end-->
        <!--第六項 start-->
		<li style="width:<?php if(qtrans_getLanguage() == "en"){ ?>135px<?php }else{ ?>60px<?php } ?>"><span><a href="<?php echo get_page_link($contact); ?>"><?php echo get_the_title($contact); ?></a></span>                  
	</ol>
</div><!--horizon_menu end-->
</div><!--global_menu end-->

<script type="text/javascript">
	var menu=new slideMenu('horizon_menu');
	menu.handler='onmouseover';
	menu.init();
	$('#horizon_menu').mouseleave(function() {
	   //alert("mouseleave....");														
	   menu.collapseOther();
    });
	$('#horizon_menu ul.collapsed').mouseleave(function() {
	   //alert("mouseleave....");														
	   menu.collapseOther();
    });
</script>
<!--</div>-->




<!-- ID:page start -->
<div id="page">
<!-- ID:header start -->
<div id="header">
<div id="header_tnua">
     <!--tnua logo start-->
    <a href="http://www.tnua.edu.tw"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tnua.gif" /></a>
     <!--tnua logo end -->
    </div>

    <div id="header_search">
    <?php if(qtrans_getLanguage() == "en"){ ?>
    <!-- 搜尋(英文) start -->
	<form role="search2" method="get" id="searchform" action="http://lionlionn.vgocities.net/case/100429/en/" > 
	<div class="ss">
      <!--<input name="fromwho" type="hidden" id="textfield" value="admin" />-->
      <div class="ss1_2"><input name="s" type="text" id="textfield" /></div>
      <div class="ss2_2"><input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/s_btn_en.gif"  width="51" height="21" id="Image222" onmouseover="MM_swapImage('Image222','','<?php bloginfo('stylesheet_directory'); ?>/images/s_btn_en_over.gif',0)" onmouseout="MM_swapImgRestore()"  /></div>
	</div>
	</form>
	<!-- 搜尋(英文) end -->
	<?php }else{ ?>   
    <!-- 搜尋(中文) start -->
	<form role="search2" method="get" id="searchform" action="http://lionlionn.vgocities.net/case/100429/" > 
	<div class="ss">
      <!--<input name="fromwho" type="hidden" id="textfield" value="lion" />-->
      <div class="ss1"><input name="s" type="text" id="textfield" /></div>
      <div class="ss2"><input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/s_btn.gif"  width="39" height="21" id="Image22" onmouseover="MM_swapImage('Image22','','<?php bloginfo('stylesheet_directory'); ?>/images/s_btn_over.gif',0)" onmouseout="MM_swapImgRestore()"  />		</div>
	</div>
	</form>
    <!-- 搜尋(中文) end -->
	<?php } ?> 
    </div>
    
    <div style="clear:both;"></div>
    <div id="header_swf">
<?php
if(is_home()){
   //首頁
   include(TEMPLATEPATH . '/header_index.php');
} else{
   //其它
   include(TEMPLATEPATH . '/header_main.php');
}
?> 
    <!--header_swf end-->
	</div>
<?php if(! is_home()){    ?>
	<div style="clear:both;"></div>
	<div id="header_main_line">
    
    <?php if(qtrans_getLanguage() == "en"){ ?>
		 <a href="<?php echo $langEnURL; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/en_sel.gif" border="0" /></a><img src="<?php bloginfo('stylesheet_directory'); ?>/images/empty.gif" width="10px" /><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lang_line.gif" /><img src="<?php bloginfo('stylesheet_directory'); ?>/images/empty.gif" width="7px" /><a href="<?php echo $langURL; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ch.gif" border="0"  id="Image5" onmouseover="MM_swapImage('Image5','','<?php bloginfo('stylesheet_directory'); ?>/images/ch_sel.gif',0)" onmouseout="MM_swapImgRestore()"  /></a></div> 
        
       
    
    <?php }else{ ?>    
        
        <a href="<?php echo $langEnURL; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/en.gif" border="0" id="Image4" onmouseover="MM_swapImage('Image4','','<?php bloginfo('stylesheet_directory'); ?>/images/en_sel.gif',0)" onmouseout="MM_swapImgRestore()"  /></a><img src="<?php bloginfo('stylesheet_directory'); ?>/images/empty.gif" width="10px" /><img src="<?php bloginfo('stylesheet_directory'); ?>/images/lang_line.gif" /><img src="<?php bloginfo('stylesheet_directory'); ?>/images/empty.gif" width="7px" /><a href="<?php echo $langURL; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ch_sel.gif" border="0" /></a></div> 
	
    <?php } ?> 
          
<?php } ?>    


<!-- 分格線 start -->
<div id="header_line">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/header_line.gif" alt="<?php //echo lionn_f1(); ?>" width="895" height="8" /></div>
<!-- 分格線 end -->

<!-- ID:header end -->
</div>
<?php 
   //bloginfo('stylesheet_directory'); 
   //http://www.lionlionn.com/case/100429/wp-content/themes/default 
?>
