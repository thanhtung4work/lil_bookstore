<?php ?>
<div class="grid-container">
<h2>Đăng nhập</h2>
<form action="index.php?controller=customer&action=submitLogin" method="POST" class="grid-container callout">
  <div>
    <label for="username">Tên đăng nhập</label>
    <input type="text" name="username" placeholder="Tên đăng nhập">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="text" name="password" placeholder="Mật khẩu">
  </div>
  <input type="submit" value="Đăng nhập" class="button">
</form>
<a href="index.php?controller=pages&action=signup">Bạn chưa có tài khoản? Đăng ký ngay</a>
</div>
<?php ?>