<?php
require 'dbconfig/config.php';
require 'header.php';
$key = $_GET['q'];
$results=mysqli_query($con,"SELECT * FROM images WHERE keyword LIKE '%$key%'");
echo '<div class="flex-container">';
foreach ($results as $result) {
	echo "<img src='".$result['images']."' height='300px' width='300px'>";
}
echo '</div>';
	

?>
