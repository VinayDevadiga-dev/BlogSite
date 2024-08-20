<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route
#$routes->get('/', 'Home::index');










$routes->get('/', 'MainController::index');



// Admin login routes
/* $routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
$routes->get('admin', 'AdminController::index'); */

// User login routes
/* $routes->get('userlogin', 'AuthController::showUserLoginForm');
$routes->post('userlogin', 'AuthController::userLogin');
$routes->get('welcome', 'AuthController::showWelcome'); */
// Routes for user login, accessible without authentication




$routes->get('userlogin', 'AuthController::showUserLoginForm');
$routes->post('userlogin', 'AuthController::userLogin');
$routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
// User registration routes
$routes->get('register', 'AuthController::showRegisterForm');
$routes->post('register', 'AuthController::register');

// Routes that require user authentication
$routes->group('', ['filter' => 'auth'], function($routes) {
    // Welcome page after user login
    $routes->get('welcome', 'AuthController::showWelcome');
    
    // User logout route
    $routes->get('logout', 'AuthController::logout');

    // Admin dashboard page
    $routes->get('admin', 'AdminController::index');
    
    // Admin logout route
    $routes->get('adminLogout', 'AuthController::adminLogout');
    
    $routes->get('view_blogs', 'BlogController::viewAll');
   $routes->post('/save_blog', 'BlogController::save_blog');
    $routes->get('/view_blogs', 'BlogController::viewAll');


    $routes->get('/create_blog', 'BlogController::create');
    $routes->post('/save_blog', 'BlogController::save_blog');

    $routes->get('/update_blog', 'BlogController::update_blog_form');
    $routes->post('/update_blog/(:num)', 'BlogController::update_blog/$1');

    $routes->get('/view_blogs', 'BlogController::viewAll');

    $routes->get('/view_blogs_admin', 'AdminController::viewBlogs');

    $routes->get('/view_users', 'AdminController::viewUsers');

    

    $routes->post('/admin/deleteUser', 'AdminController::deleteUser');

    $routes->post('/admin/delete_blog/(:num)', 'AdminController::deleteBlog/$1');
    // app/Config/Routes.php

$routes->post('admin/delete_multiple_blogs', 'AdminController::delete_multiple_blogs');



});


 
#$routes->get('update_blog', 'BlogController::update');












//$routes->get('/view_blogs_admin', 'AdminController::viewBlogs');
//$routes->get('/view_users', 'AdminController::viewUsers');

/* $routes->post('/admin/deleteUser', 'AdminController::deleteUser');

//$rutes->get('/view_blogs_admin', 'AdminController::viewBlogs');

//$routes->post('/admin/delete_blog/(:num)', 'AdminController::deleteBlog/$1');

$routes->post('update_blog/(:num)', 'BlogController::updateBlog/$1');
$routes->post('delete_blog/(:num)', 'BlogController::deleteBlog/$1');

$routes->get('create_blog', 'BlogController::create');
$routes->post('save_blog', 'BlogController::save_blog');
$routes->get('update_blog_form', 'BlogController::update_blog_form');
$routes->post('update_blog/(:num)', 'BlogController::update_blog/$1');
$routes->post('delete_blog/(:num)', 'BlogController::deleteBlog/$1');
$routes->get('view_all', 'BlogController::viewAll');


$routes->get('create_blog', 'BlogController::create');
$routes->post('save_blog', 'BlogController::save_blog');
$routes->get('update_blog_form', 'BlogController::update_blog_form');
$routes->post('update_blog/(:num)', 'BlogController::update_blog/$1');
$routes->post('delete_blog/(:num)', 'BlogController::deleteBlog/$1');
$routes->get('view_all', 'BlogController::viewAll');


$routes->post('save_blog', 'BlogController::saveBlog');



//Logout

$routes->get('logout', 'AuthController::logout');
$routes->get('adminLogout', 'AuthController::adminLogout');
 */

/*
 * ------------------------------------------------------------------------------------------------------------------------
 * Additional Routing
 * -----------------------------------------------------------------------------------------------------------------------
 *
 * This file will be loaded after the app/Config/Routes.php file.
 * You will have access to the $routes object within that file
 * without needing to reload it.
 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
