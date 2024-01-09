<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User - Cat Care</title>
        <link href="<?= base_url('') ?>/admin/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            .checkmark {
                width: 100px;
                height: 100px;
                margin: 25px auto;
                display: block;
            }
            
            .checkmark__circle {
                fill: none;
                stroke: #51cda0;
                stroke-width: 3;
                stroke-dasharray: 166;
                stroke-dashoffset: 166;
                animation: checkmarkCircle 0.6s ease-in-out forwards;
            }
            
            .checkmark__check {
                fill: none;
                stroke: #51cda0;
                stroke-width: 3;
                stroke-linecap: round;
                stroke-dasharray: 48;
                stroke-dashoffset: 48;
                animation: checkmarkCheck 0.3s ease-in-out 0.3s forwards;
            }
            
            @keyframes checkmarkCircle {
                0% {
                    stroke-dashoffset: 166;
                }
                100% {
                    stroke-dashoffset: 0;
                }
            }
            
            @keyframes checkmarkCheck {
                0% {
                    stroke-dashoffset: 48;
                }
                100% {
                    stroke-dashoffset: 0;
                }
            }
        </style>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= base_url('user/index') ?>">Hi, <?php echo session('nama'); ?> !<a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            
                            <?php
                            // Set the current page based on the actual page you are on
                            $currentPage = 'dashboard'; // Set the value according to the current page

                            ?>
                            <?php if (session('level')!="reguler") { ?>
                                <a class="nav-link <?php if ($currentPage === 'index') echo 'active'; ?>" href="<?= base_url('user/index') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>

                                <!-- <a class="nav-link <?php if ($currentPage === 'order') echo 'active'; ?>" href="<?= base_url('user/order') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                    Order
                                </a> -->
                                
                                <a class="nav-link <?php if ($currentPage === 'food') echo 'active'; ?>" href="<?= base_url('user/menu/food') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-hotdog"></i></div>
                                    Food
                                </a>
                                
                                <a class="nav-link <?php if ($currentPage === 'shampoo') echo 'active'; ?>" href="<?= base_url('user/menu/shampoo') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-bath"></i></div>
                                    Shampoo
                                </a>
                                
                                <a class="nav-link <?php if ($currentPage === 'toolkit') echo 'active'; ?>" href="<?= base_url('user/menu/toolkit') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                    Toolkit
                                </a>

                                <?php if (in_array(session('level'), ["platinum", "admin", "user"])) { ?>
                                    <a class="nav-link <?php if ($currentPage === 'service') echo 'active'; ?>" href="<?= base_url('user/service') ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                                        Service
                                    </a>
                                <?php } ?>

                                <a class="nav-link <?php if ($currentPage === 'history') echo 'active'; ?>" href="<?= base_url('user/history') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                    Order History
                                </a>

                                <a class="nav-link <?php if ($currentPage === 'logout') echo 'active'; ?>" href="<?= base_url('user/logout') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                    Logout
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as (username):</div>
                        <?php echo session('username'); ?>
                    </div>
                </nav>
            </div>