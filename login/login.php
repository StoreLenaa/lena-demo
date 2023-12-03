<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="style.css"/> 
</head> 
<body> 
<form action='login.php' class="dangnhap" method='POST'> 
<h2>ĐĂNG NHẬP</h2>
Tên đăng nhập : <input type='text' name='username' /> 
Mật khẩu : <input type='password' name='password' /> 
<input type='submit' class="button" name="dangnhap" value='Đăng nhập' /> 
<a href='../register/register.php' title='Đăng ký'>Đăng ký</a>  
<a href='../index.php' title='Trang chủ'>Trang chủ</a> 
<?php require 'xuly.php';?> 
<form> 
</body> 
</html>