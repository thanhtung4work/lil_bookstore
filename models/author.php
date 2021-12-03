<?php 

  class Author{
    public $AuthorID;
    public $AuthorName;
    public $HomeTown;

    function __construct()
    {
      
    }

    public static function makeNewAuthor($AuthorID, $AuthorName, $HomeTown){
      $newAuthor = new Author();
      $newAuthor->AuthorID = $AuthorID;
      $newAuthor->AuthorName = $AuthorName;
      $newAuthor->HomeTown = $HomeTown;

      return $newAuthor;
    }

    /**
    * @array  Associative Array only
    */
    public static function makeNewAuthorFromArray($array = array()){
      $newAuthor = new Author();
      $newAuthor->AuthorID = $array['AuthorID'];
      $newAuthor->AuthorName = $array['AuthorName'];
      $newAuthor->HomeTown = $array['HomeTown'];

      return $newAuthor;
    }

    public static function getProperties(){
      return array(
        'AuthorID' => ['type' => 'text'],
        'AuthorName' => ['type' => 'text'],
        'HomeTown' => ['type' => 'text']
      );
    }

    public function add(){
      $db = DB::getInstance();
      $req = $db->prepare("insert into values (:MaTG, :TenTG, :QueQuan)");
      $req->execute(
        array('MaTG' => $this->AuthorID,
              'TenTG' => $this->AuthorName,
              ':QueQuan' => $this->HomeTown)
      );
    }

    static function find($id){
      $db = DB::getInstance();
      $req = $db->prepare("select * from tacgia where MaTG = :id");
      $req->execute(array('id'=>$id));

      $item = $req->fetch();
      if (isset($item)){
        return self::makeNewAuthor($item['MaTG'], $item['TenTG'], $item['QueQuan']);
      }
      return null;
    }
  }

?>