
<form action="index.php?controller=books&action=submitAdd" method="POST">
  <?php foreach(Book::getProperties() as $key => $value) { ?>
    <div class="group">
      <label for=""><?php echo $key; ?></label>
      <input type="<?php echo $value['type']; ?>" name="<?php echo $key; ?>" required>
    </div>
  <?php } ?>
  <input type="submit" value="Them">
</form>