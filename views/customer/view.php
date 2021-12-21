<h3>Thông tin cá nhân</h3>
<div class="grid-container">
<?php 
  foreach(Customer::getProperties() as $key => $value){
    if ($key === 'MaKH' || $key === 'MatKhau'){
      continue;
    }
    echo '<h5>' . $value['label'] . ": " . $customer->$key . '</h5>';
  }
?>

<div class="grid-x mt-1">
  <div class="cell small-3"><a href="" class="button warning">Thay đổi thông tin</a></div>
  <div class="cell small-3"><a href="" class="button alert">Thay đổi mật khẩu</a></div>
  <div class="cell small-3"><a href="?controller=orders&action=history" class="button primary">Lịch sử mua hàng</a></div>
</div>
</div>

