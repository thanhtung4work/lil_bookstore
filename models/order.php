<?php 

class Order{
  public $MaDH;
  public $MaKH;
  public $NgayLap;
  public $MaThanhToan;
  public $TrangThai = 0;
  public $MaNV = 0;

  function __construct($MaDH, $MaKH, $NgayLap, $MaThanhToan, $TrangThai, $MaNV)
  {
    $this->MaDH = $MaDH;
    $this->MaKH = $MaKH;
    $this->NgayLap = $NgayLap;
    $this->MaThanhToan = $MaThanhToan;
    $this->TrangThai = $TrangThai;
    $this->MaNV = $MaNV;
  }

  static function newFromArray(){

  }

  static function FindDetails($id){
    $db = DB::getInstance();
    $req = $db->prepare('select * from chitietdonhang where MaDH = :MaDH');
    $req->execute(
      [':MaDH' => $id]
    );

    $items = $req->fetchAll();
    return $items;
  }

  static function GetOrderHistory($MaKH){
    $db = DB::getInstance();
    $req = $db->prepare('select * from donhang where MaKH = :MaKH');
    $req->execute(
      [':MaKH' => $MaKH]
    );

    $items = $req->fetchAll();
    return $items;
  }

  function add(){
    $db = DB::getInstance();
    $req = $db->prepare('insert into donhang values (:MaDH, :MaKH, :NgayLap, :MaThanhToan, :TrangThai, :MaNV)');
    $req->execute(
      array(
        ':MaDH' => $this->MaDH,
        ':MaKH' => $this->MaKH,
        ':NgayLap' => $this->NgayLap,
        ':MaThanhToan' => $this->MaThanhToan,
        ':TrangThai' => $this->TrangThai,
        ':MaNV' => $this->MaNV
      )
    );
  }

  function add_details($details = []){
    $db = DB::getInstance();
    $req = $db->prepare('insert into chitietdonhang values (:MaDH, :MaSach, :SoLuong)');
    foreach($details as $key => $value){
      $req->execute(
        array(':MaDH' => $this->MaDH, ':MaSach' => $key, ':SoLuong' => $value)
      );
    }

  }

  function getProperties(){
    return array(
      'MaDH',
      'MaKH',
      'NgayLap',
      'MaThanhToan',
      'TrangThai',
      'MaNV'
    );
  }
}