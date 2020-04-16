<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//login
$route['login'] = 'login';

//dashboard
$route['dashboard'] = 'dashboard';
$route['dashboard/pages'] = 'dashboard/pages';
$route['dashboard/blogs'] = 'dashboard/blogs';
$route['dashboard/properties'] = 'dashboard/properties';

//single
$route['dashboard/page'] = 'dashboard/page';
$route['dashboard/blog'] = 'dashboard/blog';
$route['dashboard/property'] = 'dashboard/property';

//webpage
$route['blogs'] = 'webpage/blogs';
$route['properties'] = 'webpage/properties';
$route['page/(:any)'] = 'webpage/page/$1';
$route['blog/(:any)'] = 'webpage/blog/$1';


$route['default_controller'] = 'webpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
