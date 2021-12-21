<?php 
  include_once 'models/book.php';
?>

<h3>Giỏ hàng của bạn</h3>

<?php 

  if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id => $soluong){
      $book = Book::find($id);
      $giaVND = number_format($book->DonGia);
      echo "
      <div>
      <a href=\"?controller=books&action=showBook&id=$book->MaSach\">
      <h4>$book->TenSach</h4>
      <p>$giaVND đ</p>
      <p>Số lượng: $soluong</p>
      </a>     
      </div>
      ";
    }
  }
?>
<?php if(isset($_SESSION['cart'])){ ?>
<a href="?controller=cart&action=clear" class='button alert'>Xóa tất cả</a>
<a href="?controller=customer&action=buy" class='button primary'>Xác nhận mua hàng</a>
<?php }?>