<?php
require'dbconfig/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family:Georgia;
        }
        .body{
            background:#808080;
            height:100%;
            width:100%;
        }
        .nav a{
            text-decoration:none;
            color:#ffffff;
            font-size:1em;
        }
        .nav {
            background-color: #000000;
            overflow: hidden;
            box-sizing:border-box;
            padding:5px;
        }
        .title{
            color:#ffffff;
            float:left;
            padding:5px;
            font-size:1.1em;
        }
        .title:hover{
            color: #5f8d43;
            cursor:pointer;
        }
        .nav-acnt, .nav-menu {
            display: inline-block;
            float: right;
            margin-right: 10px;
        }
        .nav-acnt,.nav-menu {
            display: inline-block;
            float: right;
            margin-right: 10px;
        }
            .nav-acnt a,.nav-menu a:hover{
                background-color:#5f8d43;
                border-radius:5px;

            }
            .nav-acnt a, .nav-menu a {
                display: inline-block;
                padding: 5px;
            }
        .login-ol {
            background: #ffffff;
            position: relative;
            width: 300px;
            height:300px;
            margin:100px auto;
            padding:20px;
            box-shadow:2px 2px 2px 2px rgba(0,0,0,0.5);
            box-sizing:border-box;
        }
            .login-ol input{
                display:block;
            }
        h1 {
            text-align: center;
            text-decoration: underline;
            color: #5f8d43;
        }
        .loginp input[type=text], .loginp input[type=password] {
            margin: 25px auto;
            border: none;
            border-bottom: 2px solid #5f8d43;
            padding: 2px 5px;
            width: 80%;
            font-size: 1.1em;
            box-sizing: border-box;
        }
        .loginp input[type=submit] {
            margin: 20px auto;
            border: none;
            width:60%;
            color:white;
            font-size:1.1em;
            padding:4px 4px;
            border: 2px thin #5f8d43;
            background: #5f8d43;
            cursor:pointer;
        }
        .signup {
            border: 2px solid #5f8d43;
            background: #eee;
            display: block;
            text-align: center;
            width: 60%;
            margin:6px auto;
            color:black;
        }
            .signup a {
                text-decoration: none;
                color: white;
                font-size: 1.1em;
                color: black;
            }
            .signup :hover {
                background: #5f8d43;
                color:white;
            }
    </style>
</head>
<body>
    <!--navigation-->
    <div class="nav">
        <p class="title">Eagle Search</p>
        <div class="nav-acnt">
            <a href="signup.php">Sign Up</a>
        </div>
        <div class="nav-menu">
            <a href="#mail-page">Mail</a>
            <a href="#image-page">Images</a>
            <a href="#product-page">Product</a>
        </div> 
    </div>
    <!--Login Form-->
    <div class="login-ol">
        <h1>Sign In</h1>
        <div class="loginp">            
            <form method="post" action="login.php">
                <input name="username" type="text" placeholder="Enter The Username">
                <input name="password" type="password"  placeholder="Enter The Password">
                <input type="submit" name="submit" value="submit">
                <div class="signup"><a href="signup.php">Create Account</a></div>
                <?php 
                    if(isset($_POST['submit']))
                    {
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $query="select * from user WHERE username='$username' AND password='$password'";
                        $query_run=mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0)
                            {
                                $_SESSION['$username']=$username;
                                header('location:home.php');
                            }
                            else
                            {
                                 echo '<script type="text/javascript">alert("Invalid username or password");</script>';
                            }
                    }
                ?>
            </form>
        </div>
    <!--</div><div class="">-->
    </div>
</body>
</html>