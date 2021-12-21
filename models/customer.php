<?php 

class Customer{
  public $MaKH;
  public $Ho;
  public $Ten;
  public $SoDienThoai;
  public $DiaChi;
  public $Email;
  public $TenDangNhap;
  public $MatKhau;

  function __construct()
  {
    
  }

  public static function new($MaKH, $Ho, $Ten, $SoDienThoai, $DiaChi, $Email){
    $newCust = new Customer();
    $newCust->MaKH = $MaKH;
    $newCust->Ho = $Ho;
    $newCust->Ten = $Ten;
    $newCust->SoDienThoai = $SoDienThoai;
    $newCust->DiaChi = $DiaChi;
    $newCust->Email = $Email;

    return $newCust;
  }

  /**
   * $array: ASSOC array
   */
  public static function newFromArray($array){
    $newCust = new Customer();
    foreach( self::getProperties() as $key => $value){
      $newCust->$key = $array[$key];
    }

    return $newCust;
  }

  public static function getProperties(){
    return array(
      "MaKH" => ["type" => "text", "label"=>""], 
      "Ho" => ["type" => "text", "label"=>"Họ"], 
      "Ten" => ["type" => "text", "label"=>"Tên"], 
      "SoDienThoai" => ["type" => "number", "label"=>"Số điện thoại"],
      "DiaChi" => ["type" => "text", "label"=>"Địa chỉ"], 
      "Email" => ["type" => "email", "label"=>"Email"],
      "TenDangNhap" => ["type" => "text", "label"=>"Tên đăng nhập (username)"], 
      "MatKhau" => ["type" => "password", "label"=>"Mật khẩu"]
    );
  }

  public static function login ($username, $password){
    $db =  DB::getInstance();
    $req = $db->prepare("select * from khachhang where TenDangNhap = :username and MatKhau = :password");
    $req->execute(
      array(":username" => $username, ":password" => $password)
    );
    $cust = $req->fetch();
    print_r($cust);
    if( $cust ){
      return self::newFromArray($cust);
    }
    return null;
  }

  public function signup(){
    $db = DB::getInstance();
    $req = $db->prepare("insert into khachhang values (:MaKH, :Ho, :Ten, :SoDienThoai, :DiaChi, :Email, :TenDangNhap, :MatKhau)");
    $req->execute(
      array(
            ":MaKH" => $this->MaKH,
            ":Ho" => $this->Ho, 
            ":Ten" => $this->Ten, 
            ":SoDienThoai" => $this->SoDienThoai,
            ":DiaChi" => $this->DiaChi, 
            ":Email" => $this->Email,
            ":TenDangNhap" => $this->TenDangNhap, 
            ":MatKhau" => $this->MatKhau
      )
    );
  }
}