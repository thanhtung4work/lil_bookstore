<?php

require_once('controllers/base_controller.php');

class CartController extends BaseController {
  function __construct()
  {
    $this->folder = 'cart';
  }

  function index(){
    $this->render('index');
  }

  function add(){
    if(isset($_GET['MaSach']) && isset($_POST['SoLuong'])){
      if(isset($_SESSION['cart'][$_GET['MaSach']])){
        $_SESSION['cart'][$_GET['MaSach']] += $_POST['SoLuong'];
      }else
        $_SESSION['cart'][$_GET['MaSach']] =  $_POST['SoLuong'];
    }
    header("Location: ?controller=cart");
  }

  function clear(){
    if(isset($_SESSION['cart'])){
      unset($_SESSION['cart']);
    }
    header("Location: ?controller=cart");
  }
}