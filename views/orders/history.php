<h3>Lịch sử mua hàng</h3>

<?php 
  foreach($orderHistory as $order) {
?>
<div class='card'>
<p>Mã đơn hàng: <?= $order['MaDH']?></p>
<p>Trạng thái:  <?= $order['TrangThai']?'<span class="button success">Đã xử lý':'<span class="button warning">Đang sử lý'?></span></p>
<a href="?controller=orders&action=details&id=<?= $order['MaDH'] ?>">Chi tiết đơn hàng</a>
</div>
<?php }?>