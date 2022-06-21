<?php
$header_ses = new Sessions();
$header_role = isset($_SESSION['role']) ? $_SESSION['role'] : "";
$header_uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
$header_camp = isset($_SESSION['camp']) ? $_SESSION['camp'] : "";
?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <h1><a class="navbar-brand" href="index.php"><?php echo $header_ses->APP_SYMBOL ?>

                </a></h1>
            <button class="navbar-toggler ml-lg-auto ml-sm-5 bg-light" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="ml-lg-5 navbar-nav mr-lg-auto">
                    <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                        <a href="index.php">Home</a>
                    </li>
                    <?php
                    if ($header_role == "super-admin") {
                        ?>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="reg_camps.php">Register Camp</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="view_camps.php">View Camps</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="report.php">Report</a>
                        </li>
                        <?php
                    } else if ($header_role == "admin") {
                        ?>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="reg_staff.php">Register Staff</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="view_staff.php">View Staffs</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="reg_idp.php">Register IDP</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="view_idp.php">View IDPs</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="report.php">Report</a>
                        </li>
                        <?php
                    } else if ($header_role == "staff") {
                        ?>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="reg_idp.php">Register IDP</a>
                        </li>
                        <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                            <a href="view_idp.php">View IDPs</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

                <a href="../logout.php" class="btn w3ls-btn btn-2 ml-lg-1 text-uppercase font-weight-bold d-block">
                    Logout
                </a>
            </div>
        </nav>
    </div>
</header>