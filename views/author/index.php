
<h2>Quản lý tác giả</h2>

<form action="">
  <label for="">Tìm kiếm</label>
  <input type="text" name="search_value">
  <input type="submit" value="Tìm kiếm" class="button">
</form>

<table>
  <th>Mã TG</th> <th>Tên TG</th> <th>Thông tin</th> <th>Chức năng</th>
  <?php foreach($data_tg as $tg){ ?>
    <tr>
      <?php foreach($tg as $key=>$value){ ?>
        <td><?= $value?></td>  
      <?php } ?>
      <td><a href="" class="button warning">Sửa</a></td>
    </tr>
  <?php }?>
</table>

<a href="?controller=author&action=add" class="button alert">Thêm</a>