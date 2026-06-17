<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AchatController::selectCaisse');
$routes->get('/caisse', 'AchatController::selectCaisse');
$routes->post('/caisse/select', 'AchatController::chooseCaisse');

$routes->get('/achats', 'AchatController::index');
$routes->post('/achats/add', 'AchatController::add');
$routes->post('/achats/close', 'AchatController::close');
$routes->get('/achats/reset', 'AchatController::reset');

$routes->get('/produits', 'ProduitController::index');
$routes->get('/produit/create', 'ProduitController::create');
$routes->post('/produit/store', 'ProduitController::store');

$routes->get('/produit/edit/(:num)', 'ProduitController::edit/$1');
$routes->post('/produit/update/(:num)', 'ProduitController::update/$1');

$routes->get('/produit/delete/(:num)', 'ProduitController::delete/$1');
