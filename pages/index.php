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

if (isset($_POST['search'])) {
    $fullname = $_POST['fullname'];
    $result = $ses->searchIDP($fullname);
    if (count($result) > 0) {
        header("location:search_result.php?search=" . $fullname);
    } else {
        echo "<script>alert('No Person found with such name!');</script>";
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
        <!-- Slider -->
        <div class="w3-banner-info-w3ltd position-relative" >
            <!-- header -->
            <?php include '../resources/header.php'; ?>
            <!-- //header -->
            <div class="slider">
                <ul class="rslides" id="slider">
                    <li>
                        <div class="d-flex banner-w3pvt-bg1 common-bg" style="background-image: url('../images/nigeria.jpg');">
                            <div class="d-flex mx-auto align-items-center justify-content-center flex-column">
                                <div class="bnr-w3pvt text-center">
                                    <h3><?php echo $ses->APP_SYMBOL ?></h3>
                                    <div class="d-flex justify-content-between bnr-sub-txt align-items-center">
                                        <span></span>
                                        <p class="text-uppercase text-white">
                                            <?php echo $ses->APP_TITLE ?>
                                        </p>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="row justify-content-between bnr-form-w3ls">
                                    <div class="col-lg-4">
                                        <h4>Search for Internally Displaced Person.</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <form method="post" class="bnr-field">
                                            <div class="row">

                                                <div class="col-md-10 mb-md-0 form-group">
                                                    <label class="text-capitalize">

                                                    </label>
                                                    <input class="form-control" type="text" name="fullname" required=""
                                                           placeholder="IDP Name">
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button name="search" type="submit" class="btn btn-w3ltd btn-block w-100 bg-theme font-weight-bold text-uppercase"><span
                                                            class="fa fa-search"></span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Slider -->
        <!-- Footer -->
        <?php include '../resources/footer.php'; ?>
        <!-- /Footer -->

        <!-- js -->
        <script src="../js/jquery-2.2.3.min.js"></script>
        <!-- Slider-JavaScript -->
        <script src="../js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider, #slider1").responsiveSlides({
                    auto: true,
                    nav: false,
                    speed: 1500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <!-- //Slider-JavaScript -->
        <!-- script for password match -->
        <script>
            window.onload = function () {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("password1").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
        </script>
        <!-- script for password match -->
        <!-- //js -->
        <script src="js/move-top.js"></script>
        <script src="js/easing.js"></script>
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