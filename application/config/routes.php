<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['login'] = 'users/login';

$route['posts'] = 'posts/flow';
$route['posts/publish/(:num)/(:any)'] = 'posts/publish/$1/$2';
$route['posts/update/(:num)'] = 'posts/update/$1';
$route['posts/delete/(:num)'] = 'posts/delete/$1';
$route['posts/like/(:num)'] = 'posts/like/$1';
$route['posts/liked/(:num)'] = 'posts/liked/$1';
$route['posts/postlist/(:num)'] = 'posts/postlist/$1';
$route['posts/search/(:any)/(:num)'] = 'posts/search/$1/$2';
$route['posts/(:any)/(:num)'] = 'posts/flow/$1/$2';
$route['posts/(:num)/(:any)'] = 'posts/view/$1/$2';
$route['posts/(:any)'] = 'posts/$1';

$route['uploads/(:any)/(:num)'] = 'uploads/$1/$2';
$route['uploads/(:any)'] = 'uploads/$1';

$route['comments/(:any)'] = 'comments/$1';

$route['contact/(:any)'] = 'contact/$1';
$route['quotes/(:any)'] = 'quotes/$1';
$route['users/(:any)'] = 'users/$1';
$route['instagram/(:any)'] = 'instagram/$1';
$route['rss'] = 'RSSFeed';

$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['admin/(:any)'] = 'admin/view/$1';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'posts/flow';

/* End of file routes.php */
/* Location: ./application/config/routes.php */