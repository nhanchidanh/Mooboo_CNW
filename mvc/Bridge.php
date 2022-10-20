<?php
define('_WEB_ROOT_PATH','http://' . $_SERVER['HTTP_HOST'] . ltrim($_SERVER['REQUEST_URI'], '/'));
define('_PUBLIC_PATH', _WEB_ROOT_PATH . 'public');
define('_UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'] .'upload');

// define('_PATH_AVATAR', _WEB_ROOT . '/upload/avt/');
// define('_PATH_IMG_PRODUCT', _WEB_ROOT . '/upload/product/');

define('CONTROLLER_PATH',__DIR__ . '/controllers/');
define('CORE_PATH',__DIR__ . '/core/');
define('MODEL_PATH',__DIR__ . '/models/');
define('VIEW_PATH', __DIR__ . '/views/');
define('HELPER_PATH', __DIR__ . '/helper/');


// Process URL from browser
require_once CORE_PATH . "App.php";

// How controllers call Views & Models
require_once CORE_PATH . "Controller.php";

// Connect Database
require_once CORE_PATH . "DB.php";

require_once HELPER_PATH . "show_array.php";
?>
