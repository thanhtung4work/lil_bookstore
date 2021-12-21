<?php

require_once "controllers/base_controller.php";
require_once "models/customer.php";
require_once "models/order.php";

class OrdersController extends BaseController{
  function __construct()
  {
    $this->folder = "orders";
  }

  function history(){
    $customer = unserialize($_SESSION['currentCust']);
    $order_history = Order::GetOrderHistory($customer->MaKH);
    $data = array('orderHistory' => $order_history);
    $this->render('history', $data);
  }

  function details(){
    if(!isset($_GET['id'])) return;
    $id = $_GET['id'];
    $order_details = Order::FindDetails($id);
    $data = array('details' => $order_details, 'id' => $id);
    $this->render('details', $data);
  }
}