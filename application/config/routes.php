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
$route['how-it-works'] = 'SitePageLoader/how_it_works';
$route['contact'] = 'SitePageLoader/contact';
$route['forgot-password'] = 'SitePageLoader/forgot_pwd';
$route['update-google-play-credit-email'] = 'Checkout/create_google_play_credit_request';
$route['terms-and-conditions'] = 'SitePageLoader/tnc';
$route['cashfree-notify'] = 'SitePageLoader/cashfree_notify';
$route['cashfree-return'] = 'SitePageLoader/cashfree_return';


// Authentication endpoints
$route['email-login-exe'] = 'Authentication/email_login_exe';
$route['fb-login-exe'] = 'Authentication/facebookLoginExe';
$route['google-login-exe'] = 'Authentication/googleLoginExe';
$route['customer-logout'] = 'Authentication/customer_logout';
$route['send-verification-email-exe'] = 'Authentication/emailVerif';
$route['verify-code-exe'] = 'Authentication/codeVerifExe';
$route['create-customer-account-exe'] = 'Authentication/create_customer_account';
$route['contact-form-exe'] = 'Authentication/contact_exe';
$route['update-customer-profile'] = 'Authentication/update_customer_profile';
$route['email-verification-api'] = 'Authentication/sendVerificationEmailx';

$route['create-customer-account-with-google'] = 'Authentication/create_customer_account_google';

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
$route['all-sales'] = 'AdminPageLoader/see_all_transactions';
$route['transaction-details/(:num)'] = 'AdminPageLoader/transaction_details/$1';
$route['all-google-play-credit-request'] = 'AdminPageLoader/all_google_play_credit_request';
$route['update-claim-status-to-settled'] = 'Checkout/mark_gplay_claim_settled';
$route['manage-youtube-videos'] = 'AdminPageLoader/manage_yt_videos';
$route['delete-video'] = 'Videos/delete';

// Checkout Endpoints
$route['buy-now'] = 'SitePageLoader/buy_now';
$route['payment-response'] = 'SitePageLoader/payment_response';
$route['thank-you'] = 'SitePageLoader/thank_you';

// Games Exe routes
$route['add-new-game-exe'] = 'Games/add_new';
$route['delete-game-exe'] = 'Games/delete';
// $route['delete-slider-image'] = 'Games/delete_slider_image';
$route['update-game-exe'] = 'Games/update';

// Videos routes
$route['add-new-video-exe'] = 'Videos/add';

// Game Products Routs
$route['add-new-game-product-exe'] = 'GameProducts/add_new';
$route['delete-game-product-exe'] = 'GameProducts/delete';
$route['update-game-product-exe'] = 'GameProducts/update';

// Refund Routes
$route["create-refund-request-exe"] = "SitePageLoader/create_refund_request";