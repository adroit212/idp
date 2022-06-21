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

if (isset($_POST['del'])) {
    $delid = $_POST['delid'];
    $ses->removeSingleStaff($delid);
    $ses->removeSingleLogin($delid);
    
    echo "<script>alert('Operation successful!'); "
    . "window.location.href='view_staff.php';</script>";
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
                    View All Registered Staffs
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
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Staff Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Camp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sn = 1;
                                            $all_staffs = $ses->getAllStaffByCamp($camp);
                                            foreach ($all_staffs as $single_staff) {
                                                $s_camp = $ses->getSingleCamp($single_staff['camp']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $sn ?></td>  
                                                    <td><?php echo $single_staff['fullname'] ?></td>  
                                                    <td><?php echo $single_staff['email'] ?></td>  
                                                    <td><?php echo $single_staff['mobile'] ?></td>  
                                                    <td><?php echo $s_camp['camp_name'] ?></td>  
                                                    <td>
                                                        <form method="post" onsubmit="return confirm('Comfirm Delete!')">
                                                            <input type="hidden" name="delid" value="<?php echo $single_staff['email'] ?>"/>
                                                            <button name="del" class="btn btn-danger fa fa-trash"></button>
                                                        </form>
                                                    </td>   
                                                </tr>
                                                <?php
                                                $sn++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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