
<?php 
  require_once ROOT_PATH.'\\models\\category.php';
  $cate = Category::find( $book->MaTL );
  echo "<div class=\"grid-x\">";

  echo "<div class=\"cell small-6\">";
  echo sprintf('<img src="%s" class="img-smol">', $book->ImagePath);
  echo '</div>';

  echo "<div class=\"cell small-6\">";
  echo "<h2>$book->TenSach</h2>";
  echo "<p>Thể loại: " . $cate->TenTL . "</p>";
  echo "<p>Tác giá: " . "?" . "</p>";
  echo "<p>Nhà xuất bản: " . "?" . "</p>";
  echo "<h4 class='text-danger'>Giá: $book->DonGia</h4>";
  echo "<button class=\"button hollow alert\">Like</button>";
  echo '</div>';

  echo "</div>";
?>

<form action="?controller=cart&action=add&MaSach=<?= $book->MaSach?>" method="POST">
  <label for="SoLuong">Số lượng: </label>
  <input type="number" name="SoLuong" id="" value='1' style="width: 100px;">
  <input type="submit" value="Thêm vào giỏ" class="button">
</form>



<div class="callout">
  <h3>Thông tin sản phẩm</h3>
  <p><?= "Mã hàng";?></p>
  <p><?= "Nhà xuất bản";?></p>
  <p><?= "Năm xuất bản";?></p>
  <p><?= "Tác giả";?></p>
  <p><?= "Khác";?></p>
  <hr>
  <p><?= $book->ThongTin?></p>
</div>