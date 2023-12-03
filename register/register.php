<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<form method="post" action="register.php" class="form">

<h2>ĐĂNG KÝ</h2>

Tên Đăng Nhập: <input type="text" name="username" value="" required>

Mật Khẩu: <input type="text" name="password" value="" required/>

Email: <input type="email" name="email" value="" required/>

Số Điện Thoại: <input type="text" name="phone" value="" required/>

<input type="submit" name="dangky" value="Đăng Ký"/>
<a href='../login/login.php'>Đăng nhập</a>
<a href='../index.php' title='Trang chủ'>Trang chủ</a> 
<?php require 'xuly.php';?>
</form>

</body>
</html>