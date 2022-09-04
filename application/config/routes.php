<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['download/(:any)'] = "/Admin/download/$1";
$route['image-upload'] = 'DropzoneImageController';
$route['image-upload/post']['post'] = 'DropzoneImageController/imageUploadPost';
