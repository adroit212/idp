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
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $village = $_POST['village'];
    $gender = $_POST['gender'];
    $last_home_address = $_POST['last_home_address'];
    $photo_path = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $ext_array = array("jpg", "jpeg", "png");
    $ext = pathinfo($photo_name, PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $ext_array)) {
        $new_photoid = "photo-" . date("YmdHis") . "." . $ext;

        move_uploaded_file($photo_path, "../photos/" . $new_photoid);
        $ses->newIDP($fullname, $email, $mobile, $dob, $state, $lga, $village, 
                $gender, $camp, $new_photoid, $last_home_address);

        echo "<script>alert('Registration successful!'); "
        . "window.location.href='view_idp.php';</script>";
    } else {
        echo "<script>alert('Wrong Photo Format!');</script>";
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
                    Register New Internally Displaced Person
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
                            <form enctype="multipart/form-data" method="post" class="register-wthree ">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                Full Name
                                            </label>
                                            <input class="form-control" type="text" name="fullname" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                Photo (JPEG, JPG, PNG)
                                            </label>
                                            <input class="form-control" type="file" name="photo" required="">
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-4">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control" type="text" name="email" required="">
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
                                                Date of Birth
                                            </label>
                                            <input class="form-control" type="datetime-local" name="dob"
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
                                        <div class="col-md-6">
                                            <label>
                                                Village
                                            </label>
                                            <input class="form-control" type="text" name="village" required="">
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-4">
                                            <label>
                                                Gender
                                            </label>
                                            <select class="form-control" name="gender" required="">
                                                <option value=""></option>
                                                <option value="female">Female</option>
                                                <option value="male">Male</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                Last Home Address
                                            </label>
                                            <textarea name="last_home_address" style="resize: none;" rows="3" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-right">
                                        <button name="reg" type="submit" class="btn btn-primary">Register IDP</button>
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