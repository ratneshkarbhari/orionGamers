<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?> | OriGamers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/qanto.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/bauhaus93.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/icofont.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/helper.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style.css'); ?>">   
    <!-- Modernizr JS -->
    <script
  src="<?php echo site_url('assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
</head>

<body>
    
<div id="main-wrapper">
   
    <!--Header section start-->
    <header class="header header-static bg-black header-sticky">
        <div class="default-header menu-right">
            <div class="container container-1520">
                <div class="row">
                    
                    <!--Logo start-->
                    <div class="col-12 col-md -3 col-lg-3  ">
                        <div class="logo">
                            <a class="navbar-brand" href="<?php echo site_url(); ?>"> <img src="<?php echo site_url('assets/images/text_logo_navbar.png'); ?>"></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    
                    <!--Menu start-->
                    <div class="col-lg-6 col-12 order-md-3 order-lg-2 d-flex justify-content-center">
                        <nav class="main-menu menu-style-2">
                            <ul>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    GAMES
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach($all_games as $single_game): ?>
                                    <a class="dropdown-item" href="<?php echo site_url('game-details/'.$single_game['slug']); ?>"><?php echo $single_game['title']; ?></a>
                                    <?php endforeach; ?>
                                    </div>
                                </li>
                                
                                <li><a href="<?php echo site_url('contact'); ?>">How It Works?</a></li>
                                <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->
                    
                    <!--Header Right Wrap-->
                    <div class="col-12 col-md-9 order-md-2 order-lg-3 col-lg-3">
                        <div class="header-right-wrap">
                            <ul>
                                <?php if($this->session->userdata('logged_in_as')=='customer'): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['first_name']; ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo site_url('my-account'); ?>">MY ACCOUNT</a>
                                    <a class="dropdown-item" href="<?php echo site_url('customer-logout'); ?>">LOGOUT</a>
                                    </div>
                                </li>
                                <?php else: ?>
                                <li><a href="<?php echo site_url('customer-login'); ?>">LOGIN</a></li>
                                <?php endif; ?>
                                <li class="header-search"><a class="header-search-toggle" href="#"><i class="icofont-search-2"></i></a>
                                    <div class="header-search-form">
                                        <form method="POST" action="<?php echo site_url('search-game'); ?>">
                                            <input type="text" name="search-query" placeholder="Type and hit enter">
                                            <button><i class="icofont-search"></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Header Right Wrap-->
                    
                </div>
                
                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->
                
            </div>
        </div>
    </header>
    
    <!--Header section end-->