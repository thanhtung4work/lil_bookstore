<?php
require_once 'controllers/base_controller.php';
require_once 'models/author.php';

class AuthorController extends BaseController
{
  function __construct()
  {
    $this->folder = 'author';
  }

  public function index()
  {
    $arr_tg = Author::getALL();
    $data = array('data_tg' => $arr_tg);
    $this->render('index', $data);
  }


  public function add(){
    $this->render('add');
  }

  public function submitAdd(){
    if( isset($_POST['MaTG']) ){
      $new_tl = new Author($_POST['MaTG'], $_POST['TenTG'], $_POST['ThongTin']);
      
      $new_tl->add();
    }

     header('Location: index.php?controller=author&action=index');
  }
}