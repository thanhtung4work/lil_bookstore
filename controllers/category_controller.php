<?php
require_once 'controllers/base_controller.php';
require_once 'models/category.php';

class CategoryController extends BaseController
{
  function __construct()
  {
    $this->folder = 'category';
  }

  public function index()
  {
    $arr_tl = Category::getALL();
    $data = array('data_tl' => $arr_tl);
    $this->render('index', $data);
  }


  public function add(){
    $this->render('add');
  }

  public function submitAdd(){
    if( isset($_POST['MaTL']) ){
      $new_tl = new Category($_POST['MaTL'], $_POST['TenTL'], $_POST['ThongTin']);
      
      $new_tl->add();
    }

     header('Location: index.php?controller=category&action=index');
  }
}