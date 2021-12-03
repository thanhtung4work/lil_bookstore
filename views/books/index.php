<div class="grid-container">
  <div class="grid-x">
<?php
foreach ($books as $book){
  echo '<div class="cell small-3">';
  echo "<a href=\"index.php?controller=books&action=showBook&id=$book->BookID\">";
  echo sprintf("<h2>%s</h2>", $book->BookName);
  echo sprintf("<p>%d</p>", $book->Price);
  echo sprintf("<p>%d</p>", $book->Quantity);
  echo '</a></div>';
}
?>
  </div>
</div>