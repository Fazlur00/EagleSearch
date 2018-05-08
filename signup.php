<?php 
 require'dbconfig/config.php';
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
        .signup-ol {
            background: #ffffff;
            position: relative;
            width: 300px;
            height: 450px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);
            box-sizing: border-box;
        }
        h1{
            text-align:center;
            color:#5f8d43;
            text-decoration:underline;
            margin-bottom:10px;
        }
        .signupp{
            width:100%;
            margin:auto;
            box-sizing:border-box;
        }
          .signup-ol .signupp input[type=text], .signupp input[type=password]  {
                margin: 7px auto;
                border: none;
                border-bottom: 2px solid #5f8d43;
                padding: 2px 5px;
                width: 90%;
                margin-right:10px;
                font-size: 1.1em;
                box-sizing: border-box;
            }
            .signupp .bday{
                width:80%;
            }
            .signupp input[type=date] {
                margin: 5px auto;
                border: none;
                border-bottom: 2px solid #5f8d43;
                padding: 2px 5px;
                font-size: 1.1em;
                box-sizing: border-box;
            }
        .inna{
            color:#5f8d43;
            font-size:1.1em;
        }
        .signupp input[type=submit] {
            margin: 20px auto;
            border: none;
            width: 60%;
            color: white;
            font-size: 1.1em;
            padding: 4px 4px;
            border: 2px thin #5f8d43;
            background: #5f8d43;
            cursor: pointer;
        }
    </style>
    <title></title>
</head>
<body>
    <!--navigation-->
    <div class="nav">
        <p class="title">Eagle Search</p>
        <div class="nav-acnt">
            <a href="login.php">Log In</a>
        </div>
        <div class="nav-menu">
            <a href="#mail-page">Mail</a>
            <a href="#image-page">Images</a>
            <a href="#product-page">Product</a>
        </div>
    </div>
    <!--Login Form-->
    <div class="signup-ol">
        <h1>Create Account</h1>
        <div class="signupp">
            <form method="post" action="signup.php">
                <!--<div class="inna">Enter The First Name</div>-->
                <input type="text" name="firstname" placeholder="First Name">
                <!--<div class="inna">Enter The last Name</div>-->
                <input type="text" name="lastname" placeholder="Last Name">
                <!--<div class="inna">Pick a Username</div>-->
                <input type="text" name="username" placeholder="Username">
                <!--<div class="inna">Enter The Password</div>-->
                <input type="password" name="password" placeholder="Password">
                <!--<div class="inna">confirm The Password</div>-->
                <input type="password" name="cpassword" placeholder="Confirm Password">
                <!--<div class="inna">Select Gender</div>-->
                <div>
                    <input type="radio" value="male" name="gender"><span>Male</span>
                    <input type="radio" value="female" name="gender"><span>Female</span>
                </div>
                <!--<div class="inna">Birth Day</div>-->
                <div class="bday">
                    <select name='day'>
                    <?php 
                        
                        foreach(range(1,31,1) as $day){
                            echo "<option value='$day'>$day</option>";
                        }
                        echo "</select>";

                        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                        echo "<select name='month'>";
                        foreach ($months as $month) {
                            echo "<option value='$month'>$month</option>";
                        }
                        echo "</select>";
                         echo "<select name='year'>";
                         $cyear=date('Y');
                        foreach (range($cyear,1920,1) as $year) {
                            echo "<option value='$year'>$year</option>";
                        }
                        echo "</select>";

                    ?>
                 </div>
                <input name="sbt_btn" type="submit" value="Create Account" />
                <?php
                 if(isset($_POST['sbt_btn'])){
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $cpassword=$_POST['cpassword'];
                    $gender=$_POST['gender'];
                    $day=$_POST['day'];
                    $month=$_POST['month'];
                    $year=$_POST['year'];
                    $dob="{$day}-{$month}-{$year}";
                    $dob=date('Y-m-d',strtotime($dob));
                    if($password==$cpassword)
                        {
                        $query="select * from user WHERE username ='$username'";
                        $query_run=mysqli_query($con,$query);   
                                if(mysqli_num_rows($query_run)>0)
                                    {
                                        echo '<script type="text/javascript">alert("user already exist");</script>';
                                    }
                                    else
                                    {
                                    $query="INSERT INTO `user`(`firstname`, `lastname`, `username`, `password`, `gender`, `dob`) VALUES ('$firstname','$lastname','$username','$password','$gender','$dob')";
                                    $query_run=mysqli_query($con,$query);
                                    if($query_run)
                                     {
                                     echo '<script type="text/javascript">alert("account created");</script>';
                                     }
                                     else
                                     {
                                    echo '<script type="text/javascript">alert("ERORR!");</script>';
                                     }
                                     }
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("Confirm Password and Password are not Matched");</script>';
                        }
                }
                ?>
            </form>
        </div>
        <!--</div><div class="">-->
    </div>
</body>
</html>