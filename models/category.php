<?php

class Category{
  public $MaTL;
  public $TenTL;

  public function __construct($MaTL, $TenTL)
  {
    $this->MaTL = $MaTL;
    $this->TenTL = $TenTL;
  }

  public static function find($id){
    $db = DB::getInstance();
    //echo 'select * from theloai where MaTL = '. $id;
    $req = $db->prepare('select * from theloai where MaTL = :id');
    $req->execute(array('id'=>$id));
    
    $item = $req->fetch();
    if (isset($item)){
      return new Category($item['MaTL'], $item['TenTL']);
    }

    return null;
  }
}