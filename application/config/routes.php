<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login register
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';

// dashboard
$route['user/dashboard'] = 'Dashboard_user';  // User umum
$route['petugas/dashboard'] = 'Dashboard_petugas';  // Petugas
$route['admin/dashboard'] = 'Dashboard_admin';  // Admin

$route['auth/register_admin'] = 'dashboard_admin/register_akun';
$route['admin/list_akun'] = 'dashboard_admin/list_akun';

$route['auth/logout'] = 'Auth/logout'; // atau sesuai dengan nama controller dan fungsi yang Anda gunakan

$route['petugas/data_barang'] = 'Lelang/index'; // Route for the admin page to manage barang

// User routes (Dashboard_user controller)
$route['user/dashboard'] = 'Dashboard_user/index'; // Route for the user dashboard page

// Optional: Create a route for specific barang details
$route['user/barang/(:num)'] = 'Dashboard_user/view/$1'; // Route for viewing a specific barang (optional)

// Petugas routes
$route['petugas/data_lelang'] = 'Dashboard_petugas/data_lelang';
$route['dashboard_petugas/edit_barang/(:num)'] = 'Dashboard_petugas/edit_barang/$1';
$route['dashboard_petugas/update_barang/(:num)'] = 'Dashboard_petugas/update_barang/$1';
$route['petugas/data_pemenang'] = 'lelang/data_pemenang';

// user
$route['dashboard_user/detail_barang/(:num)'] = 'Dashboard_user/detail_barang/$1';
