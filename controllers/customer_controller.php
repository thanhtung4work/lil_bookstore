<?php

require_once "controllers/base_controller.php";
require_once "models/customer.php";

class CustomerController extends BaseController{
  function __construct()
  {
    $this->folder = "customer";
  }

  function submitSignUp(){

  }

  function submitLogin(){
    if (isset($_POST['username'])){
      if( Customer::login($_POST['username'], $_POST['password']) == null ){
        header("Location: index.php?controller=pages&action=login");
      } else {
        session_start();
        $cust = Customer::login($_POST['username'], $_POST['password']);
        $_SESSION['currentCust'] = serialize($cust);
        header("Location: index.php");
      }
    }
  }

  function submitLogout(){
    session_start();
    unset($_SESSION['currentCust']);
    header("Location: index.php");
  }

  function viewInfo(){
    
  }
}