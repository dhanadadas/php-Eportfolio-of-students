<?php
require_once "auth.php";
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Вход</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<script src="js/prefixfree.min.js"></script>
</head>

<body>

  <div class="content">
  <div class="form-wrapper">
    <div class="linker"> 
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
      <span class="ring"></span>
    </div>
      <form  class="login-form" action="index.php" method="POST">
        <input type="text" name="login" value="<?php echo @$data['login'] ?>" placeholder="Логин" >
        <input type="password" name="password" value="<?php echo @$data['password'] ?>"  placeholder="Пароль">
      <button type="submit" name="do_login">ВОЙТИ</button>
    </form>
  </div>
</div>

  <script src="http:"></script>

</body>

</html>