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
    <header class="header header-static bg-black" style="box-shadow: 0px 0px 50px red;">
        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: black; color: white;">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo site_url('assets/images/text_logo_navbar.png'); ?>" id="siteRedLogo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white;"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-auto">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            GAMES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($all_games as $game): ?>
                            <a class="dropdown-item" href="<?php echo site_url('game-details/'.$game['slug']); ?>"><?php echo $game['title']; ?></a>
                            <?php endforeach; ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('how-it-works'); ?>" tabindex="-1">HOW IT WORKS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('contact'); ?>">CONTACT</a>
                        </li>
                    </ul>
                    
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        
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
                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('customer-login'); ?>">LOGIN</a></li>
                        <?php endif; ?>
                        
                        
                    </ul>
                    
                </div>
            </nav>

        </div>
        
    </header>
    
    <!--Header section end-->
    