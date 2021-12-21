<?php 
class Book{
  public string $MaSach;
  public string $TenSach;
  public string $MaNXB;
  public string $SoLuong;
  public string $DonGia;
  public $ImagePath;
  public $ThongTin;

  function __construct()
  {
    
  }

  static function getAll(){
    $database = DB::getInstance();
    $req = $database->query('Select * from sach');

    $list = $req->fetchAll(PDO::FETCH_ASSOC);

    return $list;
  }

  static function find($id){
    $db = DB::getInstance();
    $req = $db->prepare('select * from sach where MaSach = :id');
    $req->execute(array(':id'=>$id));
    
    $item = $req->fetch();
    if (isset($item)){
      return self::newFromArray($item);
    }

    return null;
  }

  static function newFromArray($array = array()){
    $newBook = new Book();
    foreach(self::getProperties() as $key => $value){
      $newBook->$key = $array[$key];
    }
    return $newBook;
  }

  public function add(){
    $db = DB::getInstance();
    $req = $db->prepare("insert into sach values (:MaSach, :TenSach, :MaNXB, :SoLuong, :DonGia, :ImagePath, :ThongTin)");
    $req->execute(
      array(':MaSach' => $this->MaSach,
            ':TenSach' => $this->TenSach,
            ':MaNXB'=> $this->MaNXB,
            ':SoLuong' => $this->SoLuong,
            ':DonGia' => $this->DonGia,
            ':ImagePath' => $this->ImagePath,
            ':ThongTin' => $this->ThongTin
      )
    );
  }

  public function setBookAuthor($author_id){
    $db = DB::getInstance();
    $req = $db->prepare("insert into tac_gia_cua_sach values (:MaSach, :MaTG)");
    $req->execute(
      array(':MaSach' => $this->MaSach,
            ':MaTG' => $author_id
      )
    );
  }

  public function setBookCategory($cate_id){
    $db = DB::getInstance();
    $req = $db->prepare("insert into the_loai_cua_sach values (:MaSach, :MaTL)");
    $req->execute(
      array(':MaSach' => $this->MaSach,
            ':MaTL' => $cate_id
      )
    );
  }

  static function getProperties(){
    return array(
        'MaSach' => array('type' => 'text'), 
        'TenSach' => array('type' => 'text'), 
        'MaNXB' => array('type' => 'text'), 
        'SoLuong' => array('type' => 'number'), 
        'DonGia' => array('type' => 'number'), 
        'ImagePath' => array('type' => 'file'),
        'ThongTin' => array('type' => 'text')
      );
  }
}