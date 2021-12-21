<h1>Ho ho ho! Merry bookmas</h1>
<hr>
<div class="grid-x grid-margin-x">
  <div class="cell small-6 card">
    <h3>Quảng cáo 1</h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, dolore neque. Provident officiis praesentium maiores! Culpa ad impedit earum, dolore quidem iusto odio molestias, saepe sequi deleniti ea cumque suscipit?</p>
  </div>
  <div class="cell small-6 card">
    <h3>Quảng cáo 2</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque iusto ea dolores magnam itaque vitae doloribus optio? Incidunt asperiores ducimus iste ut adipisci repudiandae impedit, aut ab aspernatur, quam praesentium.</p>
  </div>
</div>

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
