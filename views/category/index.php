
<h2>Quản lý thể loại</h2>

<form action="">
  <label for="">Tìm kiếm</label>
  <input type="text" name="search_value">
  <input type="submit" value="Tìm kiếm" class="button">
</form>

<table>
  <th>Mã TL</th> <th>Tên TL</th> <th>Thông tin</th> <th>Chức năng</th>
  <?php foreach($data_tl as $tl){ ?>
    <tr>
      <?php foreach($tl as $key=>$value){ ?>
        <td><?= $value?></td>  
      <?php } ?>
      <td><a href="" class="button warning">Sửa</a></td>
    </tr>
  <?php }?>
</table>

<a href="?controller=category&action=add" class="button alert">Thêm</a>