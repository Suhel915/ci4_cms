<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    
});
$routes->get('/', 'Home::index');
$routes->get('/users', 'Viewuser::view');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');

$routes->get('/articles', 'Articles::index');
$routes->get('articles/new', 'Articles::new');
$routes->get('articles/view_all_articles','Articles::view_all_articles');
$routes->get('articles/show/(:num)', 'Articles::show/$1');
$routes->get('articles/edit/(:num)', 'Articles::edit/$1');
$routes->post('articles/update/(:num)', 'Articles::update/$1');
$routes->get('articles/delete/(:num)', 'Articles::delete/$1');
$routes->post('articles/comment/(:num)', 'Articles::comment/$1');
$routes->get('articles/showcomment/(:num)', 'Articles::showcomment/$1');
$routes->get('articles/view_all_comments', 'Articles::view_all_comments');
$routes->get('articles/delete_comment/(:num)', 'Articles::delete_comment/$1');

$routes->get('users/dashboard','viewuser::dashboard');
$routes->get('users/view/(:num)', 'Viewuser::view_user/$1');
$routes->get('users/edit/(:num)', 'Viewuser::edit_user/$1');
$routes->post('users/update/(:num)', 'Viewuser::update_user/$1');
$routes->get('users/delete/(:num)', 'Viewuser::delete/$1');

