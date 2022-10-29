<?php
session_start();
if(!isset($_SESSION['username'])){header("Location: http://localhost/login-system/app/account/presentation/ui/account.php");}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pages - Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/include/header.php'); ?>
        <link href="../../../resources/css/pages-icons.css" rel="stylesheet" type="text/css">
        <link href="../../../resources/css/select2.css" rel="stylesheet" type="text/css">
        <link class="main-stylesheet" href="../../../resources/css/pages.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="fixed-header dashboard">

        <nav class="page-sidebar" data-pages="sidebar">
            <div class="sidebar-header">
                <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
                <div class="sidebar-header-controls">
                </div>
            </div>
            <div class="sidebar-menu">

                <ul class="menu-items">
                    <li>
                        <a href="javascript:;"><span class="title">Drugs</span>
                        <span class=" arrow"></span></a>
                        <span class="icon-thumbnail"><i class="pg-calender"></i></span>
                        <ul class="sub-menu">
                            <li class="">
                            <a href="#" id='adddrugs'>Add Drugs</a>
                            </li>
                            <li class="">
                            <a href="#" id='viewdrugs'>View Drugs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><span class="title">Orders</span>
                        <span class=" arrow"></span></a>
                        <span class="icon-thumbnail"><i class="pg-calender"></i></span>
                        <ul class="sub-menu">
                            <li class="">
                            <a href="#" id='createorder'>Create Order</a>
                            </li>
                            <li class="">
                            <a href="#" id='vieworder'>View Order</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                    <a href="http://changelog.pages.revox.io/" target="_blank"><span class="title">Changelog</span></a>
                    <span class="icon-thumbnail">Cl</span>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>

        </nav><!-- end of nav -->

        <div class="page-container ">

            <div class="header dashboardheader">

                <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
                </a>

                <div class="">
                    <div class="brand inline">
                    <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
                        <span class="semi-bold">David</span> <span class="text-master">Nest</span>
                    </div><!-- display of username  -->
                    <div class="dropdown pull-right d-lg-block d-none">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="thumbnail-wrapper d32 circular inline">
                                <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                            <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
                            <a href="#" class="clearfix bg-master-lighter dropdown-item">
                            <span class="pull-left">Logout</span>
                            <span class="pull-right"><i class="pg-power"></i></span>
                            </a>
                        </div>
                    </div><!-- display of avatar -->
                </div>
            </div><!-- End of dashboard header -->
            <div class='container' style='margin-top:60px;'>
                <div class='row'>
                    <div class='col-md-12 maincontent'>
                        <?php require_once(dirname(__FILE__).'/../../../drugs/presentation/ui/AddDrugs.php'); ?>
                        <?php require_once(dirname(__FILE__).'/../../../drugs/presentation/ui/FetchDrugs.php'); ?>
                        <?php require_once(dirname(__FILE__).'/../../../drugs/presentation/ui/UpdateDrug.php'); ?>
                        <?php require_once(dirname(__FILE__).'/../../../order/presentation/ui/CreateOrder.php'); ?>
                    </div>
                </div>
            </div>
            
<?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/include/footer.php'); ?>
        <script src="../../../resources/js/pages.js"></script>
        <script src="../../../resources/js/dashboard.js"></script>
    </body><!-- End of body -->
</html><!-- End of html -->