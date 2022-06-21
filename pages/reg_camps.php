<?php
session_start();
include '../resources/sessions.php';
$ses = new Sessions();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : "";
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
$camp = isset($_SESSION['camp']) ? $_SESSION['camp'] : "";
if ($role == "" || $uid == "" || $camp == "") {
    header("location:../index.php");
}

if (isset($_POST['reg'])) {
    $camp_name = $_POST['camp_name'];
    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $camp_address = $_POST['camp_address'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    
    $checker = $ses->checkUsername($email);
    
    if ($checker) {
        $ses->newCamp($camp_name, $camp_address, $state, $lga, $admin_name, $email, $mobile);
        $get_campid = $ses->getSingleCampByAdmin($email);
        $campid = $get_campid['campid'];
        $ses->newLogin($email, $email, "admin", $campid);
        
        echo "<script>alert('Registration successful!'); "
        . "window.location.href='view_camps.php';</script>";
    } else {
        echo "<script>alert('Email already registered!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title><?php echo $ses->APP_TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <meta name="keywords" content="Recruit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- Custom Theme files -->
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="all">
        <!-- font-awesome icons -->
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <!-- //Custom Theme files -->
        <!-- online-fonts -->
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
              rel="stylesheet">
    </head>

    <body>
        <!-- header -->
        <?php include '../resources/header.php'; ?>
        <!-- //header -->

        <div class="inner-banner-w3ls" style="background-image: url('../images/nigeria.jpg');">
        </div>
        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-center bg-theme">
                <li class="breadcrumb-item active text-white font-weight-bold" aria-current="page">
                    Register New IDP Camp
                </li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- contact -->
        <section class="contact-w3pvt py-lg-5">
            <div class="container py-md-5">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <!-- register form grid -->
                        <div class="register-top1 ">
                            <form method="post" class="register-wthree ">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                Camp name
                                            </label>
                                            <input class="form-control" type="text" name="camp_name" required="">
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-4">
                                            <label>
                                                Admin Full Name
                                            </label>
                                            <input class="form-control" type="text" name="admin_name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                Mobile
                                            </label>
                                            <input class="form-control" type="text" name="mobile" required="">
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-4">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control" type="email" name="email"
                                                   required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                State
                                            </label>
                                            <input class="form-control" type="text" name="state" required="">
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-4">
                                            <label>
                                                Local Government
                                            </label>
                                            <input class="form-control" type="text" name="lga" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                Camp Address
                                            </label>
                                            <textarea name="camp_address" style="resize: none;" rows="5" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-right">
                                        <button name="reg" type="submit" class="btn btn-primary">Register Camp</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <?php include '../resources/footer.php'; ?>
        <!-- /Footer -->
        <!-- js -->
        <script src="../js/jquery-2.2.3.min.js"></script>
        <!-- Slider-JavaScript -->
        <script src="../js/responsiveslides.min.js"></script>

        <script src="../js/move-top.js"></script>
        <script src="../js/easing.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->
        <!-- smooth-scrolling-of-move-up -->
        <script>
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <script src="../js/SmoothScroll.min.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>