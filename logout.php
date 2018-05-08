<?php
session_start();

if(session_destroy()){
	header("location:login.php");
}
else{
	header("location:home.php");
}