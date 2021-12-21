<?php 
  require_once ROOT_PATH.'/models/customer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/css/foundation.min.css">
  <link rel="stylesheet" href="../../css/css/app.css">
  <script src="../../css/js/vendor/foundation.min.js"></script>
  <script src="../../css/js/vendor/jquery.js"></script>
</head>
<body>

  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="dropdown menu" data-dropdown-menu>
        <li>
          <h4 class="app-logo"><a href="index.php">LiL Bookstore</a></h4>
        </li>
        <li>
          <h4><a href="index.php?controller=books&action=index">Sách</a></h4>
        </li>
        <?php if (!isset($_SESSION['currentCust'])){ ?> 
          <li>
            <h4><a href="index.php?controller=pages&action=login">Đăng nhập</a></h4>
          </li>
          <li>
            <h4><a href="index.php?controller=pages&action=signup">Đăng ký</a></h4>
          </li>
          <li>
            <h4><a href="index.php?controller=pages&action=employee">Quản trị</a></h4>
          </li>
        <?php }?>
        <?php 
          if (isset($_SESSION['currentCust'])){
            $cust = unserialize($_SESSION['currentCust']);
            echo "<li><h4><a href=\"?controller=customer&action=viewInfo\">Chào, ".$cust->Ten."</a></h4></li>";
            echo "<li><a href=\"index.php?controller=customer&action=submitLogout\">Đăng xuất</a></li>";
          }
        ?>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><input type="search" placeholder="Search"></li>
        <li><button type="button" class="button">Search</button></li>
      </ul>
    </div>
  </div>

  <div class="grid-container app-section">
    <?= @$content ?>
  </div>
  <div class="cart"><a href="index.php?controller=cart" class="alert button">Giỏ hàng</a></div>
  <hr>
  <footer class="grid-container">
    <div class="grid-x grid-padding-x grid-margin-x">
      <div class="cell small-4">
        <h5>LiLBookstore.com</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis libero nam sunt non amet obcaecati iusto, consequatur eveniet quo recusandae harum maiores dolorum nobis dolor rerum iste. Enim, hic quas.</p>
      </div>
      <div class="cell small-8">
        <h5>Dịch vụ</h5>
        <h5>Hỗ trợ</h5>
        <h5>Tài khoản</h5>
      </div>
    </div>
  </footer>
</body>
</html>