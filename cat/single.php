<?php get_header(); ?>
<?php require("config.php"); ?>

<?php 
$allTypeAry=array();

//中心公告
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

if( in_category($allTypeAry) ){
   include(TEMPLATEPATH . '/single_con.php');
} else{
 	echo "不在範圍內...";  
}

?>
<?php get_footer(); ?>





