<?php

class Author{
  public $MaTG;
  public $TenTG;
  public $ThongTin;
  static public $table_name = "tac_gia";

  public function __construct($MaTG, $TenTG, $ThongTin)
  {
    $this->MaTG = $MaTG;
    $this->TenTG = $TenTG;
    $this->ThongTin = $ThongTin;
  }

  public static function find($id){
    $db = DB::getInstance();
    //echo 'select * from theloai where MaTL = '. $id;
    $req = $db->prepare('select * from tac_gia where MaTG = :id');
    $req->execute(array('id'=>$id));
    
    $item = $req->fetch();
    if (isset($item)){
      return new Category($item['MaTG'], $item['TenTG'], $item['ThongTin']);
    }

    return null;
  }

  public static function getALL(){
    $db = DB::getInstance();
    //echo 'select * from theloai where MaTL = '. $id;
    $req = $db->prepare('select * from '. self::$table_name);
    $req->execute();
    
    $item = $req->fetchAll(PDO::FETCH_ASSOC);
    return $item;
  }

  public static function getProperties(){
    return array(
      'MaTG' => ['type' => 'text', 'label'=> "Mã tác giả"],
      'TenTG' => ['type' => 'text', 'label'=> "Tên tác giả"],
      'ThongTin' => ['type' => 'text', 'label'=> "Thông tin"]
    );
  }

  public function add(){
    $db = DB::getInstance();
    $req = $db->prepare("insert into ". self::$table_name ." values (:MaTG, :TenTG, :ThongTin)");
    $req->execute(
      [
        ":MaTG" => $this->MaTG,
        ":TenTG" => $this->TenTG,
        ":ThongTin" => $this->ThongTin
      ]
    );
  }
}