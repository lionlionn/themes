<?php get_header(); ?>
<?php require("config.php"); ?>

<?php 

//中心公告
$allTypeAry=array();
for($i=0; $i < count($annAry); $i++){
    array_push($allTypeAry,$annAry[$i]);
	$item_t = $itemAry[$annAry[$i]];
	for($j=0; $j<count($item_t); $j++){
	   array_push($allTypeAry,$item_t[$j]);
	}
}

//中心紀事
for($i=0; $i < count($recAry); $i++){
    array_push($allTypeAry,$recAry[$i]);
	$item_t = $itemAry[$recAry[$i]];
	for($j=0; $j<count($item_t); $j++){
	   array_push($allTypeAry,$item_t[$j]);
	}
}

/*
echo "count--->".count($allTypeAry)."<br>";
for($i=0; $i < count($allTypeAry); $i++){
    echo $i."---".$allTypeAry[$i]."<br>";	
}
*/

if( is_category($allTypeAry) ){
   include(TEMPLATEPATH . '/archive_con.php');
} else{
   //echo "cat--->".get_query_var('cat')."<br>";
   if(get_query_var('cat') == $ann){
	   //echo "cat-0--->".$annAry[0]."<br>";
	   $tempSubCat=$annAry[0];
   }else if(get_query_var('cat') == $rec){
	   //echo "cat-0--->".$recAry[0]."<br>";
   	   $tempSubCat=$recAry[0];
   }   
   echo "<script language=\"javascript\">";
   echo "window.self.location.href=\"".get_category_link($tempSubCat)."\";";
   echo "</script>";	   
}


?>
<?php get_footer(); ?>