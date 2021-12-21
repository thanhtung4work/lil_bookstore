
<form action="index.php?controller=books&action=submitAdd" method="POST" style="width: 70%; margin: auto;">
  <?php foreach(Book::getProperties() as $key => $value) { ?>
    <div class="group">
      <label for=""><?php echo $key; ?></label>
      <input type="<?php echo $value['type']; ?>" name="<?php echo $key; ?>" required>
    </div>
  <?php } ?>
  <label for="">Tác giả</label>
  <select name="MaTG" id="">
    <option value="">tác giả</option>
  </select>
  <label for="">Thể loại</label>
  <select name="MaTL" id="">
    <option value="">thể loại</option>
  </select>
  <input type="submit" value="Thêm" class="button">
</form>