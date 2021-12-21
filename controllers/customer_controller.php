<?php

require_once "controllers/base_controller.php";
require_once "models/customer.php";
require_once "models/order.php";

class CustomerController extends BaseController{
  function __construct()
  {
    $this->folder = "customer";
  }

  function submitSignUp(){
    if (isset($_POST['TenDangNhap']))
    {
      $info = $_POST;
      $info['MaKH'] ='0000';
      $cust = Customer::newFromArray($info);
      $cust->signup();
    }
    header("Location: index.php?controller=pages&action=login");
  }

  function submitLogin(){
    if (isset($_POST['username'])){
      if( Customer::login($_POST['username'], $_POST['password']) == null ){
        header("Location: index.php?controller=pages&action=login");
      } else {
        session_start();
        $cust = Customer::login($_POST['username'], $_POST['password']);
        $_SESSION['currentCust'] = serialize($cust);
      }
    }
    header("Location: index.php");
  }

  function submitLogout(){
    unset($_SESSION['currentCust']);
    header("Location: index.php");
  }

  function viewInfo(){
    $cust = unserialize($_SESSION['currentCust']);
    $data = array('customer' => $cust);
    $this->render('view', $data);
  }

  function buy(){
    if( !isset($_SESSION['cart']) ) header("Location: index.php");
    $kh = unserialize( $_SESSION['currentCust'] );
    $timestamp = strtotime('now');
    $id = $kh->MaKH . $timestamp;
    $date = date('Y/m/d');
    echo $id . '<br>' . $date;
    $order = new Order($id, $kh->MaKH, $date, 'TM', 0, 0);
    $order->add();
    $order->add_details($_SESSION['cart']);
    unset($_SESSION['cart']);
    header("Location: index.php");
  }
}