<?php
require_once 'controllers/base_controller.php';
require_once 'models/book.php';

class AuthorsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'authors';
  }

  public function index()
  {
    $books = Book::getAll();
    $data = array('books' => $books);
    $this->render('index', $data);
  }

  public function showBook(){
    $book = Book::find($_GET['id']);
    $data = array('book' => $book);
    $this->render('show', $data);
  }

  public function addAuthor(){
    $this->render('add');
  }

  public function submitAdd(){
    if( isset($_POST['BookID']) ){
      $bookToAdd = new Book($_POST['BookID'], $_POST['BookName'], 
                            $_POST['CateID'], $_POST['AuthorID'], 
                            $_POST['PublisherID'], $_POST['Quantity'], 
                            $_POST['Price'], $_POST['ImagePath']);
      
      $bookToAdd->add();
    }

     header('Location: index.php?controller=books&action=addBook');
  }
}