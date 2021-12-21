
<h2>Quản lý sách</h2>

<form action="">
  <label for="">Tìm kiếm</label>
  <input type="text" name="search_value">
  <input type="submit" value="Tìm kiếm" class="button">
</form>

<table>
  <th>Mã sách</th> <th>Tên sách</th> <th>Mã nxb</th> <th>Số lượng</th> <th>Đơn giá</th> <th>Đường dẫn</th> <th>Thông tin</th> <th>Chức năng</th>
  <?php foreach($books as $book){ ?>
    <tr>
      <?php foreach($book as $key=>$value){ ?>
        <td><?= $value?></td>  
      <?php } ?>
      <td><a href="" class="button warning">Sửa</a></td>
    </tr>
  <?php }?>
</table>

<a href="?controller=books&action=addBook" class="button alert">Thêm</a>