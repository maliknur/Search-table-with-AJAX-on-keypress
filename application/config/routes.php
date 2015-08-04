<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "tables/index";
// $route['tables/index']= "tables/index";
$route['tables/index_html']= "tables/index_html";
$route['tables/from'] = "tables/from";
$route['tables/to'] = "tables/to";
$route['table/dates'] = "tables/dates";

$route['tables/search']= "tables/search";
$route['404_override'] = '';

//end of routes.php
