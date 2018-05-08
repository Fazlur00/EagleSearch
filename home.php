<?php
require'dbconfig/config.php';
session_start();
if(!isset($_SESSION['$username']))
{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Georgia;
        }

        .body {
            background: #808080;
            height: 100%;
            width: 100%;     
        }
        .nav a {
            text-decoration: none;
            color: #ffffff;
            font-size: 1em;
        }

        .nav {
            background-color: #000000;
            overflow: hidden;
            box-sizing: border-box;
            padding: 5px;
        }

        .title {
            color: #ffffff;
            float: left;
            padding: 5px;
            font-size: 1.1em;
        }

            .title:hover {
                color: #5f8d43;
                cursor: pointer;
            }

        .nav-acnt, .nav-menu {
            display: inline-block;
            float: right;
            margin-right: 10px;
        }


            .nav-acnt a, .nav-menu a:hover {
                background-color: #5f8d43;
                border-radius: 5px;
            }

            .nav-acnt a, .nav-menu a {
                display: inline-block;
                padding: 5px;
            }
            .si {
                height:200px;
                width:1000px;
                margin:100px auto;
            }
            .main-wrapper{
                height: 50px;
                width:500px;
                margin:auto;
                line-height: 90px;
            }
            .sh{
                text-align: center;
                font-family: helvatica;
                font-size: 2.2em;
                color:#5f8d43;
            }
            .si .sit input[type="text"],.si .sit input[type="submit"]{
                display: block;

            }
            .si .sit input[type="text"]{
                margin:30px auto 0px;
                height:30px;
                width:350px;
                max-width:445px;
                padding:2px 10px;
            }
            .si .sit input[type="submit"]{
                border:none;
                height:30px;
                width:100px;
                background:..

                ;
                color:white;
                border-radius:2px;
                margin:15px auto; 
            }
    </style>
    <title></title>
</head>
<body>
    <!--navigation-->
    <div class="nav">
        <p class="title">Eagle Search</p>
        <div class="nav-acnt">
            <a href="logout.php">Log Out</a>
        <!-- <?php 
            // if(isset[])
        ?> -->
        </div>
        <div class="nav-menu">
            <a href="#mail-page">Mail</a>
            <a href="#image-page">Images</a>
            <a href="#product-page">Product</a>
        </div>
    </div>
    <!--search engine Form-->
    <div class="si">
        <div class="main-wrapper">
        <div class="sh"><h1>Eagle Search</h1></div>
        <div class="sit"><form method="GET" action="webresult.php">
            <input type="text" name="q">
            <input type="Submit" name="search" value="search">
        </div>
        </form>
        </div>
    </div>
</body>
</html>