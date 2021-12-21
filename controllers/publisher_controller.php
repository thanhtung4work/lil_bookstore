<?php
require_once 'controllers/base_controller.php';
require_once 'models/publisher.php';

class PublisherController extends BaseController
{
  function __construct()
  {
    $this->folder = 'publisher';
  }

  public function index()
  {
    $arr_nxb = Publisher::getALL();
    $data = array('data_nxb' => $arr_nxb);
    $this->render('index', $data);
  }


  public function add(){
    $this->render('add');
  }

  public function submitAdd(){
    if( isset($_POST['MaNXB']) ){
      $new_nxb = Publisher::makeNewPublisher($_POST['MaNXB'], $_POST['TenNXB'], $_POST['ThongTin']);
      
      $new_nxb->add();
    }

     header('Location: index.php?controller=publisher&action=index');
  }
}