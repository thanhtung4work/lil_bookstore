<div class="grid-container">
  <div class="grid-x grid-margin-x">
<?php
foreach ($books as $book){
  echo '<div class="cell small-3 card">';
  $id = $book['MaSach'];
  echo "<a href=\"index.php?controller=books&action=showBook&id=$id\">";

  echo sprintf("<img src=\"%s\" \>", $book['ImagePath']);

  echo '<div class="card-section"';
  echo sprintf("<h5>%s</h5>", $book['TenSach']);
  echo sprintf("<h4 class=\"text-danger\">Giá: %d</h4>", $book['DonGia']);
  echo sprintf("<p>Còn: %d</p>", $book['SoLuong']);
  echo '</div>';

  echo '</a>
        </div>';
}
?>
  </div>
</div>