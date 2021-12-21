<h3>
  Thêm tác giả
</h3>

<form action="?controller=author&action=submitAdd" method="POST">
  <?php foreach(Author::getProperties() as $key => $value){?>
    <label for="<?=$key?>"><?=$value['label']?></label>
    <input type="<?= $value['type']?>" name="<?=$key?>">
  <?php } ?>
  <input type="submit" value="Thêm" class="button">
</form>