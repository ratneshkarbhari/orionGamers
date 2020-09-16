<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Tetragon</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo site_url('assets/materialize/css/materialize.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/dashboard_custom.css'); ?>">
</head>
<body>
    <script src="<?php echo site_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    
    <header id="dashboard-header">

        <nav>
            <div class="nav-wrapper" style="background-color: red;">

                <div style="width: 90%; margin: 0 auto;">
                
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li><div class="user-view" style="border-bottom: 1px solid darkgray; padding-bottom: 3%;">
                    <a href="#name"><span class="black-text name"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></span></a>
                    </div></li>
                    <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                    <li><a href="<?php echo site_url('all-games'); ?>">Games</a></li>
                    <li><a href="<?php echo site_url('all-game-products'); ?>">Game Products</a></li>
                    <li><a href="<?php echo site_url('all-sales'); ?>">Sales</a></li>
                </ul>
                
                <a href="#" data-target="slide-out" class="sidenav-trigger" style="margin: none !important;"><i class="material-icons text-white">menu</i></a>        
                <a href="<?php echo site_url('admin-dashboard'); ?>" class="brand-logo center">
                <h4 style="margin: 5% 0; padding: 0; font-size: 25px;">Orion Gamers</h4>
                <!-- Logo Position -->
                </a>
                <ul id="nav-mobile" class="right">
                    <li>
                        <a href="<?php echo site_url('admin-logout'); ?>"><i class="material-icons">exit_to_app</i></a>   
                    </li>
                </ul>
                
                </div>

                
            </div>
        </nav>
    
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
