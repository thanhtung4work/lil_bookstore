<?php
require_once('controllers/base_controller.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $data = array();
    $this->render('home', $data);
  }

  public function error()
  {
    $this->render('404_notFound');
  }

  public function login()
  {
    $this->render('login');
  }

  public function signup()
  {
    $this->render('signup');
  }
}