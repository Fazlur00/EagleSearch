<?php 
 require 'dbconfig/config.php';

$keyword="thenewcollege chennai";
$url="http://www.bing.com/images/search?q=".str_replace(" ","+",$keyword)."&qs=n&form=QBILPG&sp=-1&pq=".str_replace(" ","+",$keyword)."&sc=8-9&sk=&cvid=B2C423E3F2D94410AB758636BF7FB7E9";
$output=get($url);
// echo $output;

function get($url){
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// curl_exec($curl,CURLOPT_SSL_VERIFYPEER,false);

$output=curl_exec($curl);
curl_close($curl);
return $output;
}
preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!',$output,$url_matches);
// print_r($url_matches[1]);

$local_path='C:\XAMPP\htdocs\se\images\\';

for($i=0;$i<count($url_matches[1]);$i++){

	preg_match_all("!.*?/!",$url_matches[1][$i],$matches);
	$last_part=end($matches[0]);

	preg_match("!$last_part(.*?.jpg)!",$url_matches[1][$i],$match);
	$image_name=str_replace("+","-",$match[1]);
	$image_pat='images/'.$image_name;
	$image_url=$url_matches[1][$i];
	$image_data=get($image_url);
	
	$file=fopen($local_path.$image_name,'w');
	fwrite($file,$image_data);
	fclose($file);
 mysqli_query($con,"INSERT into images VALUES('','$keyword','$image_pat')");
}