<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Atlantik', 'Atlantik::accueil');


$routes->get('voirLesLiaison/(:alphanum)', 'Visiteur::voirLesLiaison/$1');
$routes->get('voirLesLiaison', 'Visiteur::voirLesLiaison');


$routes->match(['get', 'post'], 'creecompte', 'Atlantik::creecompte');