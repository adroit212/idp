<?php
session_start();
include 'resources/sessions.php';
$ses = new Sessions();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : "";
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
$camp = isset($_SESSION['camp']) ? $_SESSION['camp'] : "";
if ($role != "" && $uid != "" && $camp != "") {
    header("location:pages/index.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $ses->userLogin($username, $password);
    if ($result != NULL) {
        $_SESSION['role'] = $result['role'];
        $_SESSION['uid'] = $username;
        $_SESSION['camp'] = $result['camp'];

        header("location:pages/index.php");
    } else {
        echo "<script>alert('Incorrect login details!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $ses->APP_TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Tiny Ui Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="login/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="login/css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--web font-->
        <!-- //web font -->
    </head>
    <body>
        <!-- main -->
        <div class="main-agileits">
            <h1><?php echo $ses->APP_TITLE ?></h1>
            <div class="mainw3-agileinfo">
                <!-- login form -->
                <div class="login-form">  
                    <div class="login-agileits-top"> 	
                        <form method="post"> 
                            <p>Username </p>
                            <input id="input1" type="text" class="name" name="username" required="required"/>
                            <p>Password</p>
                            <input id="input2" type="password" class="password" name="password" required="required"/>  
                            <label class="anim">
                                <!--<input type="checkbox" class="checkbox">
                                <span> Remember me ?</span>--> 
                            </label>   
                            <input name="login" type="submit" value="Login"> 
                        </form> 	
                    </div>  
                </div> 
            </div>	
        </div>	
        <!-- //main -->
        <!-- copyright -->
        <div class="w3copyright-agile">
            <p>© <?php echo date("Y") ?> <?php echo $ses->APP_TITLE ?>. All rights reserved.</p>
        </div>
        <!-- //copyright -->
        <!-- js -->  
        <script src="login/js/superplaceholder.js"></script>

        <!-- //js --> 
    </body>
</html>