
<?php
require_once('connection.php');
require_once('models/book.php');
require_once('models/publisher.php');
require_once('models/category.php');
require_once('models/author.php');

session_start();
define('ROOT_PATH', __DIR__);
if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'home';
}
require_once('routes.php');
