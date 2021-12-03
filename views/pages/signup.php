<?php 
  require_once "models/customer.php";
?>
<div class="grid-container">
<h2>Đăng ký</h2>
<form action="" class="callout grid-container">
  <div class="grid-x grid-margin-x">
    <?php foreach(Customer::getProperties() as $key => $value) { ?>
      <div class="cell small-6 <?=($key=="MaKH")?"hide":""?>">
        <label for=""><?php echo $value['label']; ?></label>
        <input type="<?php echo $value['type']; ?>" name="<?php echo $key; ?>" required>
      </div>
    <?php } ?>
  </div>
  <input type="submit" value="Đăng ký" class="button">
</form>
</div>
<?php ?>