<h3>
  Thêm thể loại
</h3>

<form action="?controller=category&action=submitAdd" method="POST">
  <?php foreach(Category::getProperties() as $key => $value){?>
    <label for="<?=$key?>"><?=$value['label']?></label>
    <input type="<?= $value['type']?>" name="<?=$key?>">
  <?php } ?>
  <input type="submit" value="Thêm" class="button">
</form>