<?php 

  class Publisher{
    public $MaNXB;
    public $TenNXB;
    public $ThongTin;
    private $table_name = 'nha_xuat_bang';

    function __construct()
    {
      
    }

    public static function makeNewPublisher($id, $name, $info){
      $new_nxb = new Publisher();
      $new_nxb->MaNXB = $id;
      $new_nxb->TenNXB = $name;
      $new_nxb->ThongTin = $info;

      return $new_nxb;
    }

    public static function getProperties(){
      return array(
        'MaNXB' => ['type' => 'text', 'label'=> "Mã NXB"],
        'TenNXB' => ['type' => 'text', 'label'=> "Tên NXB"],
        'ThongTin' => ['type' => 'text', 'label'=> "Thông tin"]
      );
    }

    public function add(){
      $db = DB::getInstance();
      $req = $db->prepare("insert into $this->table_name values (:MaNXB, :TenNXB, :ThongTin)");
      $req->execute(
        [
          ":MaNXB" => $this->MaNXB,
          ":TenNXB" => $this->TenNXB,
          ":ThongTin" => $this->ThongTin
        ]
      );
    }

    static function find($id){
      $db = DB::getInstance();
      $req = $db->prepare("select * from nha_xuat_bang where MaNXB = :id");
      $req->execute(array('id'=>$id, 'table'));

      $item = $req->fetch();
      return $item;
    }

    static function getALL(){
      $db = DB::getInstance();
      $req = $db->prepare("select * from nha_xuat_bang where 1 = 1");
      $req->execute();
      $item = $req->fetchAll(PDO::FETCH_ASSOC);
      return $item;
    }
  }

?>