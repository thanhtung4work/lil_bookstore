<?php

class Category{
  public $MaTL;
  public $TenTL;
  public $ThongTin;
  static public $table_name = "the_loai";

  public function __construct($MaTL, $TenTL, $ThongTin)
  {
    $this->MaTL = $MaTL;
    $this->TenTL = $TenTL;
    $this->ThongTin = $ThongTin;
  }

  public static function find($id){
    $db = DB::getInstance();
    //echo 'select * from theloai where MaTL = '. $id;
    $req = $db->prepare('select * from theloai where MaTL = :id');
    $req->execute(array('id'=>$id));
    
    $item = $req->fetch();
    if (isset($item)){
      return new Category($item['MaTL'], $item['TenTL'], $item['ThongTin']);
    }

    return null;
  }

  public static function getALL(){
    $db = DB::getInstance();
    //echo 'select * from theloai where MaTL = '. $id;
    $req = $db->prepare('select * from '. Category::$table_name);
    $req->execute();
    
    $item = $req->fetchAll(PDO::FETCH_ASSOC);
    return $item;
  }

  public static function getProperties(){
    return array(
      'MaTL' => ['type' => 'text', 'label'=> "Mã thể loại"],
      'TenTL' => ['type' => 'text', 'label'=> "Tên thể loại"],
      'ThongTin' => ['type' => 'text', 'label'=> "Thông tin"]
    );
  }

  public function add(){
    $db = DB::getInstance();
    $req = $db->prepare("insert into ". self::$table_name ." values (:MaTL, :TenTL, :ThongTin)");
    $req->execute(
      [
        ":MaTL" => $this->MaTL,
        ":TenTL" => $this->TenTL,
        ":ThongTin" => $this->ThongTin
      ]
    );
  }
}