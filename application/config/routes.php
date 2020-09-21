<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'SitePageLoader/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom
$route['games'] = 'SitePageLoader/games';
$route['game-details/(:any)'] = 'SitePageLoader/game_details/$1';
$route['login'] = 'SitePageLoader/login';
$route['account'] = 'SitePageLoader/account';



// Customer site routes
$route['admin-login'] = 'SitePageLoader/admin_login';
$route['customer-login'] = 'SitePageLoader/customer_login';
$route['google-login-redirect'] = 'Authentication/google_login_redirect';
$route['privacy-policy'] = 'SitePageLoader/privacy_policy';
$route['my-account'] = 'SitePageLoader/my_account';
$route['game-details/(:any)'] = 'SitePageLoader/game_details/$1';
$route['buy-now'] = 'SitePageLoader/buy_now';

// Authentication endpoints
$route['email-login-exe'] = 'Authentication/email_login_exe';
$route['fb-login-exe'] = 'Authentication/facebookLoginExe';
$route['google-login-exe'] = 'Authentication/googleLoginExe';
$route['customer-logout'] = 'Authentication/customer_logout';

// admin CMS routes
$route['admin-dashboard'] = 'AdminPageLoader/dashboard';
$route['all-games'] = 'AdminPageLoader/all_games';
$route['admin-login-exe'] = 'Authentication/admin_login_exe';
$route['admin-logout'] = 'Authentication/admin_logout';
$route['add-new-game'] = 'AdminPageLoader/add_new_game';
$route['edit-game/(:any)'] = 'AdminPageLoader/edit_game/$1';
$route['all-game-products'] = 'AdminPageLoader/all_game_products';
$route['add-new-game-product'] = 'AdminPageLoader/add_new_game_product';
$route['edit-game-product/(:any)'] = 'AdminPageLoader/edit_game_product/$1';

$route['save-transaction-add-purchase'] = 'Checkout/save_transaction';

// Games Exe routes
$route['add-new-game-exe'] = 'Games/add_new';
$route['delete-game-exe'] = 'Games/delete';
// $route['delete-slider-image'] = 'Games/delete_slider_image';
$route['update-game-exe'] = 'Games/update';



// Game Products Routs
$route['add-new-game-product-exe'] = 'GameProducts/add_new';
$route['delete-game-product-exe'] = 'GameProducts/delete';
$route['update-game-product-exe'] = 'GameProducts/update';