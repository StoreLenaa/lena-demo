<!-- Đây là phần bắt đầu của tài liệu HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Thiết lập các thông tin về ký tự và chế độ tương thích -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Thiết lập viewport cho thiết bị di động -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Liên kết với font chữ từ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Liên kết với Font Awesome để sử dụng biểu tượng -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Đặt tiêu đề của trang -->
    <title>LANA - Thương Hiệu Thời Trang Sang Trọng</title>
    <!-- Liên kết với Boxicons để sử dụng biểu tượng -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Liên kết với tệp CSS để tùy chỉnh giao diện -->
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>
    <!-- Bắt đầu phần thân của trang -->

    <!-- Phần thanh điều hướng -->
    <nav>
        <!-- Phần đầu thanh điều hướng -->
        <div class="navTop">
            <div class="navItem">
                <!-- Logo của trang -->
                <img src="./Images/lana3.png" height="125" width="145" alt="" id="siteLogo">
            </div>
        </div> 

        <!-- Kịch bản JavaScript để xử lý sự kiện khi click vào logo -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Tìm logo trang bằng id
                var siteLogo = document.getElementById('siteLogo');
            
                // Thêm sự kiện click cho logo
                siteLogo.addEventListener('click', function() {
                    // Chuyển hướng về trang chủ
                    window.location.href = 'index.php';
                });
            });
        </script>

        <!-- Phần tìm kiếm và giỏ hàng -->
        <div class="search-account-container">
            <div class="search-box">
                <!-- Nút tìm kiếm -->
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <!-- Ô nhập liệu tìm kiếm -->
                <input type="text" class="input-search" placeholder="Tìm Kiếm..." id="searchInput">
            </div>
            <!-- Biểu tượng giỏ hàng -->
            <i class='bx bx-shopping-bag' id="cart-icon"></i>
            <!-- Phần giỏ hàng -->
            <div class="cart">
                <h2 class="cart-title">Giỏ Hàng</h2>
                <!-- Nội dung giỏ hàng -->
                <div class="cart-content">
                </div>
                <!-- Tổng tiền -->
                <div class="total">
                    <div class="total-title">Tổng Tiền</div>
                    <div class="total-price">0đ</div>
                </div>
                <!-- Nút thanh toán -->
                <button type="button" class="btn-buy">Thanh Toán Ngay</button>
                <!-- Biểu tượng đóng giỏ hàng -->
                <i class='bx bx-x' id="cart-close"></i>
            </div>
            <!-- Liên kết với tệp JavaScript để xử lý sản phẩm và giỏ hàng -->
            <script src="./JS/Ao.js"></script>
            <!-- Phần đăng nhập và đăng ký -->
            <div class="accountContainer">
                <!-- Biểu tượng đăng nhập -->
                <img src="./Images/Account.png" width="35" height="32" alt="Login" class="accountIcon">
                <!-- Lựa chọn đăng nhập và đăng ký -->
                <div class="loginOptions">
                    <a href="../DO_AN_WEB/login/login.php" class="loginLink">Đăng nhập</a>
                    <a href="../DO_AN_WEB/register/register.php" class="registerLink">Đăng ký</a>
                </div>
            </div>
        </div>
        <!-- Phần cuối thanh điều hướng -->
        <div class="navBottom">
            <!-- Liên kết đến các danh mục sản phẩm -->
            <a href="Ao.html" class="menuItem"><h2>Áo</h2></a>
            <a href="Quan.html" class="menuItem"><h2>Quần</h2></a>
            <a href="Giay.html" class="menuItem"><h2>Giày</h2></a>
            <a href="Balo.html" class="menuItem"><h2>Balo</h2></a>
            <a href="Phukien.html" class="menuItem"><h2>Phụ Kiện</h2></a>
            <a href="Ve-lana.html" class="menuItem"><h2>Về Lana</h2></a>
            <a href="../DO_AN_WEB/lichsugiaodich/lichsugiaodich.php" class="menuItem"><h2> Lịch sử giao dịch</h2></a>
            
        </div>
    </nav>

    <!-- Phần Slider -->
    <div class="slider">
        <!-- Danh sách các hình ảnh trong slider -->
        <div class="list">
            <div class="item">
                <img src="./Images/slider1.jpg" alt="">
            </div>
            <div class="item">
                <img src="./Images/slider2.jpg" alt="">
            </div>
            <div class="item">
                <img src="./Images/slider4.jpg" alt="">
            </div>
            <div class="item">
                <img src="./Images/slider5.jpg" alt="">
            </div>
        </div>
        <!-- Nút điều hướng và các điểm để chuyển đổi ảnh trong slider -->
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <!-- Liên kết với tệp JavaScript để xử lý sự kiện trong Slider -->
    <script src="./JS/index.js"></script>

    <footer>
        <!-- Phần chân trang -->
        <div class="footer-container">
            <!-- Menu chân trang -->
            <div class="footer-menu">
                <h3>DỊCH VỤ KHÁCH HÀNG</h3>
                <!-- Danh sách các liên kết dịch vụ khách hàng -->
                <ul>
                    <li><a href="Ve-lana.html">Chất liệu sản phẩm</a></li>
                    <li><a href="Ve-lana.html">Câu hỏi thường gặp</a></li>
                    <li><a href="Ve-lana.html">Chính sách đổi trả</a></li>
                    <li><a href="Ve-lana.html">Chính sách bảo mật</a></li>
                    <li><a href="Ve-lana.html">Chính sách giao hàng</a></li>
                    <li><a href="Ve-lana.html">Điều khoản dịch vụ</a></li>
                    <li><a href="Ve-lana.html">Hướng dẫn Mua hàng &amp; Hướng dẫn Bảo quản</a></li>
                    <li><a href="Ve-lana.html">Hướng dẫn chọn size</a></li>
                </ul>
            </div>
            
            <!-- Menu danh mục sản phẩm -->
            <div class="footer-menu">
                <h3>DANH MỤC SẢN PHẨM</h3>
                <!-- Danh sách các liên kết danh mục sản phẩm -->
                <ul>
                    <li><a href="/collections/all">Tất cả sản phẩm</a></li>
                    <li><a href="Ao.html">Áo</a></li>
                    <li><a href="Quan.html">Quần</a></li>
                    <li><a href="Balo.html">Ba lô</a></li>
                    <li><a href="Phukien.html">Phụ kiện</a></li>
                </ul>
            </div>
    
            <!-- Thông tin liên hệ -->
            <div class="footer-contact">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                <!-- Địa chỉ, số điện thoại, email, và các liên kết mạng xã hội -->
                <p>Địa chỉ: 497, P16, Quận Gò Vấp, TP.HCM</p>
                <p>Số điện thoại: <a href="tel:0775571158">0775571158</a></p>
                <p>Email: <a href="mailto:lanaofficial.vn">lanaofficial.vn</a></p>
                <a href="https://www.facebook.com/lanaofficial.vn" target="_blank" title="Theo dõi Facebook LANA"><img src="./Images/facebook.png" width="40" height="40" alt="facebook"></a>
                <a href="https://zalo.me/g/ordqrg369" target="_blank" title="Theo dõi Zalo LANA"><img src="./Images/zalo.jpg" width="40" height="40" alt="zalo"></a>
                <a href="https://www.instagram.com/__lenashop__/" target="_blank" title="Theo dõi instagram LANA"><img src="./Images/instagram.png" width="40" height="40" alt="zalo"></a>
            </div>
        </div>
    </footer>
    <!-- Nút lên đầu trang -->
    <button id="myBtn" title="Lên đầu trang">
        <img src='./Images/Button1.png' title='lên đầu trang' width='50px'/></button>
    <!-- Kịch bản JavaScript để xử lý sự kiện cuộn trang và nút lên đầu trang -->
    <script>
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        
        document.getElementById('myBtn').addEventListener("click", function(){
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>
    </body>
    </html>
    
</body>
</html>
