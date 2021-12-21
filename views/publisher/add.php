<h3>
  Thêm nhà xuất bản
</h3>

<form action="?controller=publisher&action=submitAdd" method="POST">
  <?php foreach(Publisher::getProperties() as $key => $value){?>
    <label for="<?=$key?>"><?=$value['label']?></label>
    <input type="<?= $value['type']?>" name="<?=$key?>">
  <?php } ?>
  <input type="submit" value="Thêm" class="button">
</form>