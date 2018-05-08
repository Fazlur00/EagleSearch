
<?php


$pdo =new PDO('mysql:host=127.0.0.1;dbname=search','root',''); 
$search=$_GET['q'];
@$sear=$_GET['search'];
$urlSearch=urlencode($search);


$searche=explode(" ",$search);
$x=0;
$construct="";
$params=array();
foreach ($searche as $term){
	$x++;
	if($x==1){
		$construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
	}else{
		$construct .= "AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
	}
	$params[":search$x"]=$term;
}
require 'header.php';
echo "<div style='width:900px;margin-left:80px;box-sizing:border-box;'>";
$resu=$pdo->prepare("SELECT * FROM `index` WHERE $construct");
$resu->execute($params);
if($resu->rowCount()==0){
echo "0 results found! <hr/>";
}else{
echo $resu->rowCount()." results found! <hr/>";
}
$results=$pdo->prepare("SELECT * FROM `index` WHERE $construct");
$results->execute($params);
$result_per_page=10;
$num_rows=$resu->rowCount();
$num_of_pages=ceil($num_rows/$result_per_page);
if(!isset($_GET['page'])){
	$page=1;
}else{
	$page=$_GET['page'];
}
$this_page_first_result=($page-1)*$result_per_page;
$results=$pdo->prepare("SELECT * FROM `index` WHERE $construct LIMIT $this_page_first_result,$result_per_page");
$results->execute($params);

foreach($results->fetchAll() as $result) {
	echo "<div style='width:800px;box-sizing:border-box;line-height:30px'>";
	echo "<a href=".$result["url"]." style='font-size:1.4em;color:#609;'>".substr($result["title"],0,60)."</a>";
	echo '<p style="color:#006621">'.substr($result["url"],0,50)."...".'</p>';
	if($result["description"]==""){
		echo "<p>"."No description available."."</p></br>";
	}else{
		echo "<p style='line-height:20px'>".$result["description"]."</p></br>";
	}
	echo "</div>";
	echo "</br>";
}
echo "<div class='pages'>";
for($page=1;$page<=$num_of_pages;$page++){
echo '<a href="webresult.php?q='.$urlSearch.'&search=search&page='.$page.'">'.$page.'</a>'."  ";}
echo "</div>";
echo "</div>";
// print_r($results->fetchAll());
?>