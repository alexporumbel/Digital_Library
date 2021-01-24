<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'student';
$route['admin'] = 'admin';
$route['admin/studenti-neconfirmati'] = 'admin/unconfirmedstudents';
$route['admin/management-studenti'] = 'admin/managestudents';
$route['admin/adauga-student'] = 'admin/managestudent';
$route['admin/modifica-student/(:num)'] = 'admin/managestudent/$1';
$route['admin/modifica-status/(:num)'] = 'admin/changestudentstate/$1';
$route['admin/management-discipline'] = 'admin/managedisciplines';
$route['admin/adauga-disciplina'] = 'admin/managediscipline';
$route['admin/modifica-disciplina/(:num)'] = 'admin/managediscipline/$1';
$route['admin/management-categorii'] = 'admin/managecategories';
$route['admin/adauga-categorie'] = 'admin/managecategory';
$route['admin/modifica-categorie/(:num)'] = 'admin/managecategory/$1';
$route['admin/management-staff'] = 'admin/managestaffaccs';
$route['admin/adauga-staff'] = 'admin/managestaff';
$route['admin/modifica-staff/(:num)'] = 'admin/managestaff/$1';
$route['admin/management-publicatii'] = 'admin/managepublications';
$route['admin/adauga-publicatie'] = 'admin/managepublication';
$route['admin/modifica-publicatie/(:num)'] = 'admin/managepublication/$1';
$route['admin/sterge-publicatie/(:num)'] = 'admin/deletepublication/$1';
$route['admin/setari-generale'] = 'admin/generalsettings';
$route['admin/solicitari-publicatii'] = 'admin/managerequests';
$route['admin/solicitare/(:num)'] = 'admin/managerequest/$1';
$route['admin/statistici'] = 'admin/statistics'; 
$route['admin/descarca'] = 'admin/exportcsv'; 
$route['home/pagina-(:num)'] = 'student/home/$1';
$route['home'] = 'student/home';
$route['logout'] = 'student/logout';
$route['forget'] = 'student/forgot';  
$route['reset'] = 'student/reset';  
$route['inregistrare'] = 'student/register';
$route['solicitari/(:any)'] = 'student/viewrequest/$1';
$route['disciplina/(:any)'] = 'student/discipline/$1';
$route['disciplina/(:any)/pagina-(:num)'] = 'student/discipline/$1/$2';
$route['categorie/(:any)'] = 'student/category/$1';
$route['categorie/(:any)/pagina-(:num)'] = 'student/category/$1/$2';
$route['subiect/(:any)'] = 'student/subject/$1';
$route['subiect/(:any)/pagina-(:num)'] = 'student/subject/$1/$2';
$route['an/(:any)'] = 'student/year/$1';
$route['an/(:any)/pagina-(:num)'] = 'student/year/$1/$2';
$route['(:any)_pub(:num)'] = 'student/publication/$2';
$route['addtofav'] = 'student/addtofav';
$route['unfav'] = 'student/unfav';
$route['caut'] = 'student/startsearch';
$route['cauta'] = 'student/search';
$route['cauta/pagina-(:num)'] = 'student/search/$1';
$route['trimitesolicitare'] = 'student/request';
$route['favorite'] = 'student/favorites';
$route['favorite/pagina-(:num)'] = 'student/favorites/$1';
$route['download/(:num)'] = 'student/download/$1';
$route['log'] = 'student/logactivity';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
