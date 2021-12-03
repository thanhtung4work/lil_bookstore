<?php 
  require_once ROOT_PATH.'/models/customer.php';

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/css/foundation.min.css">
  <script src="../../css/js/vendor/foundation.min.js"></script>
  <script src="../../css/js/vendor/jquery.js"></script>
</head>
<body>

  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="dropdown menu" data-dropdown-menu>
        <li class="menu-text">
          <a href="index.php">LiL Bookstore</a>
        </li>
        <li>
          <a href="index.php?controller=books&action=index">Sách</a>
        </li>
        <?php if (!isset($_SESSION['currentCust'])){ ?> 
          <li><a href="index.php?controller=pages&action=login">Đăng nhập</a></li>
          <li><a href="index.php?controller=pages&action=signup">Đăng ký</a></li>
        <?php }?>
        <?php 
          if (isset($_SESSION['currentCust'])){
            $cust = unserialize($_SESSION['currentCust']);
            echo "<li>Chào, <a href=\"\">".$cust->Ten."</a></li>";
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

  <div class="grid-container">
    <?= @$content ?>
  </div>
</body>
</html>