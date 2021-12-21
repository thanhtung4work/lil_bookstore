<h3>Chi Tiết Đơn Hàng <?= $id?></h3>

<div class="grid-x grid-padding-x grid-margin-y">
<?php foreach($details as $detail){ ?>
<?php 
  $book = Book::find($detail['MaSach']);  
?>
<div class="cell small-3">
<h4><?= $book->TenSach?></h4>
<p>Số lượng: <?= $detail['SoLuong']?></p>
<img src="<?=$book->ImagePath?>" alt="" class="img-smol">
</div>
<?php } ?>
</div>