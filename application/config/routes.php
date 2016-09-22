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

//$route['default_controller'] = 'welcome';

$route['default_controller'] = "home/index";

$route['admin'] = 'admin/index';

$route['404_override'] = 'home/notfound';

$route['translate_uri_dashes'] = FALSE;



$route['gioi-thieu'] = "home/intro";

$route['dang-ky'] = "home/users";

$route['dang-nhap'] = "home/users/login";

$route['thoat'] = "home/users/logout";

$route['tai-khoan'] = "home/users/manage";

$route['don-hang'] = "home/users/order";

$route['san-pham-yeu-thich'] = "home/users/save";

$route['sua-thong-tin'] = "home/users/update_info";

$route['man-hinh-laptop'] = "home/monitor";

$route['tin-tuc'] = "home/articles";

$route['tin-tuc/(:num)'] = "home/articles";

$route['([a-zA-Z0-9-_]+)/ac(:num)'] = "home/articles/list_news/(:num)";

$route['tin-tuc/([a-zA-Z0-9-_]+)/(:num)'] = "home/articles/detail/(:num)";

$route['san-pham-khuyen-mai'] = "home/product_sale";

$route['san-pham-khuyen-mai/(:num)'] = "home/product_sale";

$route['san-pham-moi'] = "home/product_new";

$route['san-pham-moi/(:num)'] = "home/product_new";

$route['san-pham-ban-chay'] = "home/product_bestsale";

$route['san-pham-ban-chay/(:num)'] = "home/product_bestsale";

$route['([a-zA-Z0-9-_]+)/c(:num)'] = "home/product/index/(:num)";

$route['([a-zA-Z0-9-_]+)/p(:num)'] = "home/detail/index/(:num)";

$route['([a-zA-Z0-9-_]+)/c(:num)/(:num)'] = "home/product/index/(:num)/(:num)";

$route['page/([a-zA-Z0-9-_]+)/(:num)'] = "home/page/detail/(:num)";

$route['lien-he'] = "home/customer_contact";

$route['tim-kiem'] = "home/search";

$route['gio-hang'] = "home/cart";



//Other

$route['view_ip'] = "home/index/view";

$route['setup/update_key'] = "home/setup/update_key";

$route['close'] = "home/setup/web_close";

