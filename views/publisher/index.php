
<h2>Quản lý Nhà xuất bản</h2>

<form action="">
  <label for="">Tìm kiếm</label>
  <input type="text" name="search_value">
  <input type="submit" value="Tìm kiếm" class="button">
</form>

<table>
  <th>Mã NXB</th> <th>Tên NXB</th> <th>Thông tin</th> <th>Chức năng</th>
  <?php foreach($data_nxb as $nxb){ ?>
    <tr>
      <?php foreach($nxb as $key=>$value){ ?>
        <td><?= $value?></td>  
      <?php } ?>
      <td><a href="" class="button warning">Sửa</a></td>
    </tr>
  <?php }?>
</table>

<a href="?controller=publisher&action=add" class="button alert">Thêm</a>