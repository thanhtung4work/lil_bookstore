<?php
require_once 'controllers/base_controller.php';
require_once 'models/book.php';

class BooksController extends BaseController
{
  function __construct()
  {
    $this->folder = 'books';
  }

  public function index()
  {
    $books = Book::getAll();
    $data = array('books' => $books);
    $this->render('index', $data);
  }

  public function manage()
  {
    $books = Book::getAll();
    $data = array('books' => $books);
    $this->render('manage', $data);
  }

  public function showBook(){
    $book = Book::find($_GET['id']);
    $data = array('book' => $book);
    $this->render('show', $data);
  }

  public function addBook(){
    $this->render('add');
  }

  public function submitAdd(){
    if( isset($_POST['MaSach']) ){
      $bookToAdd = Book::newFromArray($_POST);
      
      $bookToAdd->add();
      
    }

     header('Location: index.php?controller=books&action=addBook');
  }
}