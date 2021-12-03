
<?php 
  require_once ROOT_PATH.'\\models\\category.php';
  $cate = Category::find( $book->CateID );
  
  echo "<h2>$book->BookName</h2>";
  echo "Thể loại: " . $cate->TenTL;
  echo "<p>Giá: $book->Price</p>"
?>
<a href="" class="button <?=(!isset($_SESSION['currentCust'])?'disabled':'') ?>">Thêm vào giỏ</a>

<div>
<?php if(!isset($_SESSION['currentCust'])){
  echo "<a href=\"index.php?controller=pages&action=login\">Vui lòng đăng nhập để mua hàng</a>";
}?>
</div>