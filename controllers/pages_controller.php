<?php
require_once('controllers/base_controller.php');
require_once 'models/book.php';

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $books = Book::getAll();
    $data = ['books' => $books];
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

  public function employee()
  {
    $this->render('employee');
  }
}