<?php
require("config.php");
//require("common_function.php");


/*****************************************************************

*  

*  功能：取得分類名稱

*  參數：分類ID

*  

******************************************************************/

function getCatName($catID){

   $tempStr = get_category_parents($catID, false, '/');

   //echo $tempStr;

   $tempAry = explode("/",$tempStr);

   $tempCount = count($tempAry);

   $tempLevel = $tempCount-1;   

   return $tempAry[($tempLevel-1)];

}



/*****************************************************************

*  

*  功能：取得分類的路徑

*  參數：分類ID,層級

*  

******************************************************************/

function getCatPath($catID,$upLevel=0){

   $tempStr = get_category_parents($catID, true, '--');

   $tempAry = explode("--",$tempStr);

   $tempCount = count($tempAry);

   $tempLevel = $tempCount-1;   

   $tempReStr="";

   for($i=0; $i<($tempLevel-$upLevel); $i++){

	 if($i >0){

		 $tempOneCat = $tempAry[$i];

	 }else{

	 	$tempOneCat = strip_tags($tempAry[$i]);

	 }

	 

	 $tempReStr =$tempReStr.$tempOneCat;

     if($i < ($tempLevel-$upLevel-1)){

        $tempReStr = $tempReStr."/ ";

     }

   }

   return $tempReStr;

}



/*****************************************************************

*  

*  功能：取得分類的標籤(url)

*  參數：

*  

******************************************************************/

function getCatSigPath($catID,$upLevel=0){

   $tempStr = get_category_parents($catID, false, '/',true);

   //echo $tempStr;

   $tempAry = explode("/",$tempStr);

   $tempCount = count($tempAry);

   $tempLevel = $tempCount-1;   

   $tempReStr="";

   for($i=0; $i<($tempLevel-$upLevel); $i++){

     $tempReStr =$tempReStr.$tempAry[$i];

     if($i < ($tempLevel-$upLevel-1)){

        $tempReStr = $tempReStr."/";

     }

   }

   return $tempReStr;

}



/*****************************************************************

*  

*  功能：取得分頁的路徑

*  參數：分頁ID

*  

******************************************************************/

function getPagePath($pageID){

   $page = get_page( $pageID);

   $parent = $page->post_parent;

   //echo "parent-->".$parent."<br>";

   while ( $parent ) {

      $temp_p = $parent;

      $page = get_page( $parent );

      $parent = $page->post_parent;

  	  if(empty($parent)){

	      $tempStr = get_the_title($temp_p)."/ ".$tempStr;	      

	  }else{

	  	  $tempStr = "<a href=\"".get_page_link($temp_p)."\">".get_the_title($temp_p)."</a>/ ".$tempStr;

	  }

   }

   $tempStr = $tempStr."<a href=\"".get_page_link($parent)."\">".get_the_title($pageID)."</a>";

   return $tempStr;   

}



/*****************************************************************

*  

*  功能：取得分頁的標籤(url)

*  參數：分頁ID

*  

******************************************************************/

function getPageSigPath($pageID){

   $page = get_page( $pageID);

   $parent = $page->post_parent;

   while ( $parent ) {

      $page_sub = get_page( $parent );

      $tempStr = $page_sub ->post_name."/".$tempStr;    

      $parent = $page_sub->post_parent;

  }

  $tempStr = $tempStr.$page->post_name;

  return $tempStr;   

}



/*****************************************************************

*  

*  功能：取得分類相關的圖示

*  參數：分類ID,型態

*  

******************************************************************/

function get_cat_image($catID,$type){

	global $catImageType,$catImagePath;

	

	if(qtrans_getLanguage() == "en"){$lang = "_en";}else{$lang = "";}

	

	//彩色條bar沒有中英文之分

	if($type == "rectangle" or $type == "square"){

		//catImageType在config裡面設定

		if($catImageType == "default"){

			$pic_url = get_bloginfo("stylesheet_directory")."/images/cat_".$type."_".$catID.".gif";

		}else if($catImageType == "gallery"){

			$pic_url = get_bloginfo("home").$catImagePath."cat_".$type."_".$catID.".gif";

		}

		//

		if( @fopen($pic_url, "r")){

		  	return $pic_url;

	    }else{

		   return get_bloginfo("stylesheet_directory")."/images/cat_".$type."_default.gif";

	    }

	}



	//左邊大塊和左邊上面

	if($type == "rectangle_long2" or $type == "rectangle_long" or $type == "triangle"){

		if($postImageType == "default"){

			$pic_url = get_bloginfo("stylesheet_directory")."/images/cat_".$type."_".$catID.$lang.".gif";

		}else if($postImageType == "gallery"){

			$pic_url = get_bloginfo("home").$catImagePath."cat_".$type."_".$catID.$lang.".gif";

		}

		//

		if( @fopen($pic_url, "r")){

		  	return $pic_url;

	    }else{

		   return get_bloginfo("stylesheet_directory")."/images/cat_".$type."_default.gif";

	    }

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：取得文章相關的圖示

*  參數：文章ID,型態

*  

******************************************************************/

function get_post_image($postID,$type){
	global $postImageType,$postImagePath;

	

	//postImageType在config裡面設定

	if($postImageType == "default"){

		$pic_url = get_bloginfo("stylesheet_directory")."/images/post_".$type."_".$postID.".jpg";

	}else if($postImageType == "gallery"){

		$pic_url = get_bloginfo("home").$postImagePath."post_".$type."_".$postID.".jpg";

	}

	//
	
	if( @fopen($pic_url, "r")){
	  
	  	return $pic_url;

	}else{
	  
	   return get_bloginfo("stylesheet_directory")."/images/post_".$type."_default.gif";

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：取得文章side的圖示

*  參數：文章ID,型態

*  

******************************************************************/

function get_post_side_image($postID,$type){

	global  $postImageType,$postImagePath;

	

	//pageImageType在config裡面設定
	//jpg優先
	if($postImageType == "default"){
		
		if( @fopen(get_bloginfo("stylesheet_directory")."/images/post_".$type."_".$postID.".jpg", "r")){
			$pic_url = get_bloginfo("stylesheet_directory")."/images/post_".$type."_".$postID.".jpg";
		}else{
			$pic_url = get_bloginfo("stylesheet_directory")."/images/post_".$type."_".$postID.".gif";
		}
	}else if($postImageType == "gallery"){
		if( @fopen(get_bloginfo("home").$postImagePath."post_".$type."_".$postID.".jpg", "r")){
			$pic_url = get_bloginfo("home").$postImagePath."post_".$type."_".$postID.".jpg";
		}else{
			$pic_url = get_bloginfo("home").$postImagePath."post_".$type."_".$postID.".gif";
		}
	}

	//

	if( @fopen($pic_url, "r")){

	   	return $pic_url;

	}else{

	    return "";

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：取得分頁相關的圖示

*  參數：分頁ID,型態

*  

******************************************************************/

function get_page_image($pageID,$type){

	global  $pageImageType,$pageImagePath;

	

	if(qtrans_getLanguage() == "en"){$lang = "_en";}else{$lang = "";}

		 

	//pageImageType在config裡面設定

	if($pageImageType == "default"){

		$pic_url = get_bloginfo("stylesheet_directory")."/images/page_".$type."_".$pageID.$lang.".gif";

	}else if($pageImageType == "gallery"){

		$pic_url = get_bloginfo("home").$pageImagePath."page_".$type."_".$pageID.$lang.".gif";

	}

	//

	if( @fopen($pic_url, "r")){

	   	return $pic_url;

	}else{

	    return get_bloginfo("stylesheet_directory")."/images/page_".$type."_default.gif";

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：取得分頁side的圖示

*  參數：分頁ID,型態

*  

******************************************************************/

function get_page_side_image($pageID,$type){

	global  $pageImageType,$pageImagePath;

	

	//pageImageType在config裡面設定
	//jpg優先
	if($pageImageType == "default"){
		if( @fopen(get_bloginfo("stylesheet_directory")."/images/page_".$type."_".$pageID.".jpg", "r")){
			$pic_url = get_bloginfo("stylesheet_directory")."/images/page_".$type."_".$pageID.".jpg";
		}else{
			$pic_url = get_bloginfo("stylesheet_directory")."/images/page_".$type."_".$pageID.".gif";
		}
	}else if($pageImageType == "gallery"){
		if( @fopen(get_bloginfo("home").$pageImagePath."page_".$type."_".$pageID.".jpg", "r")){
			$pic_url = get_bloginfo("home").$pageImagePath."page_".$type."_".$pageID.".jpg";
		}else{
			$pic_url = get_bloginfo("home").$pageImagePath."page_".$type."_".$pageID.".gif";
		}
	}

	//

	if( @fopen($pic_url, "r")){

	   	return $pic_url;

	}else{

	    return "";

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：取得搜尋頁相關的圖示

*  參數：型態

*  

******************************************************************/

function get_search_image($type){

	global $searchImageType,$searchImagePath;

	

	if(qtrans_getLanguage() == "en"){$lang = "_en";}else{$lang = "";}

	//searchImageType在config裡面設定

	if($searchImageType == "default"){

		$pic_url = get_bloginfo("stylesheet_directory")."/images/search_".$type.$lang.".gif";

	}else if($searchImageType == "gallery"){

		$pic_url = get_bloginfo("home").$searchImagePath."search_".$type.$lang.".gif";

	}

	//

	if( @fopen($pic_url, "r")){

	   	return $pic_url;

	}else{

	    return get_bloginfo("stylesheet_directory")."/images/search_".$type."_default.gif";

	}

	//

	return get_bloginfo("stylesheet_directory")."/images/empty.gif";

}



/*****************************************************************

*  

*  功能：檢查random出來的分類是不是屬於目前父分類下

*  參數：random分類ID,目前父分類ID

*  

******************************************************************/

function checkInCat($catID,$objCatID){

	global $itemAry;

	if(count($itemAry[$catID]) == 0){

		return true;	

		exit();

	}else{

		for($j=0; $j<count($itemAry[$catID]); $j++){	

			$shorCat = $itemAry[$catID][$j];	

 	   		if($objCatID == $shorCat){

				return true;

				exit();

			}

		}

	}

	return false;

}




function lionn_f1(){
	global $catImageType,$catImagePath;
	return $catImagePath;	
}
//echo "lionlionnnnnnnn<br>";




?>
