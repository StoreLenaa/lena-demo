<?php
include_once(__DIR__ . '/../connect.php');

// Lấy thông tin từ form
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total_amount = $_POST['total_amount'];

// Thực hiện truy vấn để chèn dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO member (username, email, phone, total_amount) VALUES ('$username', '$email', '$phone', '$total_amount')";

if (mysqli_query($connect, $sql)) {
    echo "Dữ liệu đã được chèn thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . mysqli_error($connect);
}

// Đóng kết nối
mysqli_close($connect);
?>
