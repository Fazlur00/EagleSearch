<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	*{
		margin:0px;
		font-family:sans-serif;
	}
	.buttons{
		display: flex;
			margin:0 75px;
			box-sizing: border-box;
	}
	.buttons>form>button{
			border:none;
			margin:5px;
			width:90px;
			height:30px;
			background: #e1e1e1;
		}
		.flex-container {
			width:100%;
  			display: flex;
			flex-wrap: wrap;
  			justify-content: center;
}
		.flex-container img{
			margin:8px;
		}
		.logo{
			font-size:2em!important;
			color:#5f8d43;
		}
		.si{
			margin-left:30px;
			position: absolute;
			top:50%;
			transform: translateY(-50%);
		}
		.si .search{
			border:none;
			box-shadow:0 3px 8px 0 rgba(0,0,0,0.2), 0 0 0 1px rgba(0,0,0,0.08);
			padding:5px ;
		}
		.pages{
			over
		}
		.pages a{
			text-decoration: none;
			margin-right:10px;
		}

	</style>
</head>
<body>

<div class="head" style="width:100%;padding:20px 50px;box-sizing: border-box;background:white;box-shadow: 0 0 10px #aaa;margin-bottom:20px;position: relative;">
	<div class="logo" style="display: inline-block;display:inline-block;font-size:1.5em;">Eagle Search</div>
	<div class="si" style="display: inline-block;">
		<form action="webresult.php?q=" method="get" >
		<?php 
		echo '<input class="search" type="text" style="width:400px;font-size:1.1em;" name="q" value="'.$_GET['q'].'">';
		echo '<input type="submit" value="search" name="search" style="margin-left:20px;font-size:1.1em;">';
		?>
</div>
	</form>
 	</div>
 	<div class="buttons" style="">
 		<form action="webresult.php">
 			<input type="hidden" name="q" value="<?php echo $_GET['q'] ?>">
 		<button type="submit">web</button>
 		</form>
 		<form method="get" action="imgresult.php">
 		<?php
 		echo "<input type='hidden' name='q' value='".$_GET['q']."'>";
 		echo "<button type='submit'>image</button>";
 		?>
 		</form>
 	</div>


 <br>
 <br/>