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

$idpid = isset($_GET['idpid']) ? $_GET['idpid'] : "";
if ($idpid == "") {
    header("location:index.php");
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
                    Internally Displaced Person's Details
                </li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- contact -->
        <section class="contact-w3pvt py-lg-5">
            <div class="container py-md-5">
                <div class="row">
                    <?php
                    $idp = $ses->getSingleIDP($idpid);
                    $idp_camp = $ses->getSingleCamp($idp['camp']);
                    ?>
                    <div class="col-12 mx-auto">
                        <!-- register form grid -->
                        <div class="register-top1 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <img width="200" src="../photos/<?php echo $idp['img_url'] ?>" alt="photo"/>
                                </div>
                                <div class="col-md-6" style="color: #000;">
                                    <p>
                                        <strong>Full Name: </strong> <span><?php echo $idp['fullname'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Email: </strong> <span><?php echo $idp['email'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Mobile: </strong> <span><?php echo $idp['mobile'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Date Of Birth: </strong> <span><?php echo date_format(date_create($idp['dob']), "d M Y") ?></span>
                                    </p> 
                                    <p>
                                        <strong>Gender: </strong> <span><?php echo $idp['gender'] ?></span>
                                    </p>
                                    <p>
                                        <strong>Registration Date: </strong> <span><?php echo $idp['reg_date'] ?></span>
                                    </p>  
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <strong>Sate: </strong> <span><?php echo $idp['state'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Local Government: </strong> <span><?php echo $idp['lga'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Village: </strong> <span><?php echo $idp['village'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Camp: </strong> <span><?php echo $idp_camp['camp_name'] ?></span>
                                    </p> 
                                    <p>
                                        <strong>Last Homme Address: </strong> <span><?php echo $idp['last_home_address'] ?></span>
                                    </p> 
                                </div>
                            </div>
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