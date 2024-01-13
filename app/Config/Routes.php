<?php

namespace Config;

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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



$routes->post('/', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/register1', 'Register::reg');

$session = session();
if($session->get('NUM_UT')){
	$routes->get('/home', 'Home::index');
	$routes->get('/produit', 'Produit::index');
	$routes->get('/fournisseur', 'Fournisseur::index');
	$routes->get('/bnent', 'Bnent::index');
	$routes->get('/employe', 'Employe::index');
	$routes->get('/bnsort', 'Bnsort::index');
	$routes->get('/fiche', 'Fiche::index');
	$routes->get('/pdffiche', 'Pdffiche::index');
	$routes->get('/pdfhistorique', 'Pdfhistorique::index');
	$routes->get('/pdfabsence', 'Pdfabsence::index');
	$routes->get('/fichestock', 'Fichestock::index');
	$routes->get('/utilisateur', 'Utilisateur::index');
	$routes->get('/historique', 'Historique::index');
	$routes->get('/pointage', 'Pointage::index');
	$routes->get('/absence', 'Absence::index');
	$routes->get('/retard', 'Retard::index');
	$routes->get('/emprunt', 'Emprunt::index');
	$routes->get('/element', 'Element::index');
	$routes->get('/etatfinancier', 'Etatfinancier::index');
	$routes->get('/etatstock', 'Etatstock::index');
	
}else{
	$routes->get('/home', 'Login::index');
	$routes->get('/produit', 'Login::index');
	$routes->get('/fournisseur', 'Login::index');
	$routes->get('/bnent', 'Login::index');
	$routes->get('/bnsort', 'Login::index');
	$routes->get('/fiche', 'Login::index');
	$routes->get('/pdffiche', 'Login::index');
	$routes->get('/pdfhistorique', 'Login::index');
	$routes->get('/pdfabsence', 'Login::index');
	$routes->get('/fichestock', 'Login::index');
	$routes->get('/utilisateur', 'Login::index');
	$routes->get('/historique', 'Login::index');
	$routes->get('/pointage', 'Login::index');
	$routes->get('/absence', 'Login::index');
	$routes->get('/retard', 'Login::index');
	$routes->get('/emprunt', 'Login::index');
	$routes->get('/element', 'Login::index');
	$routes->get('/etatfinancier', 'Login::index');
	$routes->get('/etatstock', 'Login::index');
}

/*
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
