<?php 
class Book{
  public string $BookID;
  public string $BookName;
  public string $AuthorID;
  public string $PublisherID;
  public string $CateID;
  public string $Quantity;
  public string $Price;
  public $ImagePath;

  function __construct($id, $name, $authorID, $publisherID, $cateID,  $quantity, $price, $imagePath)
  {
    $this->BookID = $id;
    $this->BookName = $name;
    $this->AuthorID = $authorID;
    $this->PublisherID = $publisherID;
    $this->CateID = $cateID;
    $this->Quantity = $quantity;
    $this->Price = $price;
    $this->ImagePath = $imagePath;
  }

  static function getAll(){
    $list = [];
    $database = DB::getInstance();
    $req = $database->query('Select * from sach');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Book($item['MaSach'], $item['TenSach'], $item['MaTG'], $item['MaNXB'],$item['MaTL'],  $item['SoLuong'], $item['DonGia'], $item['ImagePath']);
    }

    return $list;
  }

  static function find($id){
    $db = DB::getInstance();
    $req = $db->prepare('select * from sach where MaSach = :id');
    $req->execute(array(':id'=>$id));
    
    $item = $req->fetch();
    if (isset($item)){
      return new Book($item['MaSach'], $item['TenSach'], $item['MaTG'], $item['MaNXB'],$item['MaTL'],  $item['SoLuong'], $item['DonGia'], $item['ImagePath']);
    }

    return null;
  }

  public function add(){
    $db = DB::getInstance();
    $req = $db->prepare("insert into sach values (:MaSach, :TenSach, :MaTL, :MaTG, :MaNXB, :SoLuong, :DonGia, :ImagePath)");
    $req->execute(
      array(':MaSach' => $this->BookID,
            ':TenSach' => $this->BookName,
            ':MaTL' => $this->CateID,
            ':MaTG' => $this->AuthorID,
            ':MaNXB'=> $this->PublisherID,
            ':SoLuong' => $this->Quantity,
            ':DonGia' => $this->Price,
            ':ImagePath' => $this->ImagePath
      )
    );
  }

  static function getProperties(){
    return array(
        'BookID' => array('type' => 'text'), 
        'BookName' => array('type' => 'text'), 
        'CateID' => array('type' => 'text'), 
        'AuthorID' => array('type' => 'text'), 
        'PublisherID' => array('type' => 'text'), 
        'Quantity' => array('type' => 'number'), 
        'Price' => array('type' => 'number'), 
        'ImagePath' => array('type' => 'text'));
  }
}