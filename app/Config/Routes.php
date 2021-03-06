<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Pages::index');

// Home
$routes->get('/', 'Home::home');
$routes->get('/home/', 'Home::home');
$routes->get('/home/(:num)', 'Home::home');

// Movies
$routes->get('/movies/nowPlaying/', 'Movies::nowPlaying');
$routes->get('/movies/nowPlaying/(:num)', 'Movies::nowPlaying/$1');
$routes->get('/movies/upcoming/', 'Movies::upcoming');
$routes->get('/movies/upcoming/(:num)', 'Movies::upcoming/$1');
$routes->get('/movies/recommendation/', 'Movies::recommendation');
$routes->get('/movies/recommendation/(:num)', 'Movies::recommendation/$1');
$routes->get('/movies/details/(:num)', 'Movies::details/$1');

// TV
$routes->get('/tv/onAir/', 'TV::onAir');
$routes->get('/tv/onAir/(:num)', 'TV::onAir/$1');
$routes->get('/tv/recommendation/', 'TV::recommendation');
$routes->get('/tv/recommendation/(:num)', 'TV::recommendation/$1');
$routes->get('/tv/details/(:num)', 'TV::details/$1');

// People
$routes->get('/people/popular', 'People::popular');
$routes->get('/people/popular/(:num)', 'People::popular/$1');
$routes->get('/people/details/(:num)', 'People::details/$1');

// Search
$routes->get('/search/', 'Search::search');
$routes->get('/search/(:num)', 'Search::search/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
