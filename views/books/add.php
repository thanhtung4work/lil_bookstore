
<form action="index.php?controller=books&action=submitAdd" method="POST" style="width: 70%; margin: auto;">
  <?php foreach(Book::getProperties() as $key => $value) { ?>
    <?php if($key == "MaNXB"):?>
      <label for="">Nhà Xuất Bản</label>
      <select name="MaNXB" id="">
        <?php foreach(Publisher::getALL() as $nxb) {?>
          <option value="<?=$nxb['MaNXB']?>"><?=$nxb['TenNXB']?></option>
        <?php }?>
      </select>
    <?php continue; endif;?>
    <div class="group">
      <label for=""><?php echo $key; ?></label>
      <input type="<?php echo $value['type']; ?>" name="<?php echo $key; ?>" required>
    </div>
  <?php } ?>
  <label for="">Tác giả</label>
  <select name="MaTG" id="">
    <?php foreach(Author::getALL() as $tg) {?>
      <option value="<?=$tl['MaTG']?>"><?=$tg['TenTG']?></option>
    <?php }?>
  </select>
  <label for="">Thể loại</label>
  <select name="MaTL" id="">
    <?php foreach(Category::getALL() as $tl) {?>
      <option value="<?=$tl['MaTL']?>"><?=$tl['TenTL']?></option>
    <?php }?>
  </select>
  <input type="submit" value="Thêm" class="button">
</form>