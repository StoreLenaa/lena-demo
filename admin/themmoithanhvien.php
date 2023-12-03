<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LANA - Thương Hiệu Thời Trang Sang Trọng</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <!-- Main content -->
    <div class="container">
        <h1>Form Thêm mới Nhà cung cấp</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã nhà cung cấp</td>
                    <td><input type="text" name="username" id="username" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" id="email" class="form-control" /></td>
                </tr>
                <tr>    
                    <td>Số điện thoại</td>
                    <td><input name="phone" id="phone" class="form-control"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once(__DIR__ . '/../connect.php');

    // 2. Người dùng mới truy cập trang lần đầu tiên (người dùng chưa gởi dữ liệu `btnSave` - chưa nhấn nút Save) về Server
    // có nghĩa là biến $_POST['btnSave'] chưa được khởi tạo hoặc chưa có giá trị
    // => hiển thị Form nhập liệu

    // Nếu biến $_POST['btnSave'] đã được khởi tạo
    // => Người dùng đã bấm nút "Lưu dữ liệu"
    if ( isset($_POST['btnSave']) ) {
        
        // 3. Nếu người dùng có bấm nút `Lưu dữ liệu` thì thực thi câu lệnh INSERT
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $username = $_POST['username'];
        $email= $_POST['email'];
        $phone = $_POST['phone'];
        $created_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        $updated_at = NULL;

        // 4. Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];

        // --- Kiểm tra Mã nhà cung cấp (validate)
        // required (bắt buộc nhập <=> không được rỗng)
        if (empty($username)) {
            $errors['username'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $username,
                'msg' => 'Vui lòng nhập mã Nhà cung cấp'
            ];
        }
        // minlength 3 (tối thiểu 3 ký tự)
        if (!empty($username) && strlen($username) < 3) {
            $errors['username'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $username,
                'msg' => 'Mã Nhà cung cấp phải có ít nhất 3 ký tự'
            ];
        }
        // maxlength 50 (tối đa 50 ký tự)
        if (!empty($username) && strlen($username) > 50) {
            $errors['username'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $username,
                'msg' => 'Mã Nhà cung cấp không được vượt quá 50 ký tự'
            ];
        }
        if (empty($email)) {
            $errors['email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $email,
                'msg' => 'Vui lòng nhập email'
            ];
        }
        if (!empty($email) && strlen($email) < 3) {
            $errors['email'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $email,
                'msg' => 'Email phải có ít nhất 3 ký tự'
            ];
        }
        if (!empty($email) && strlen($email) > 255) {
            $errors['email'][] = [
                'rule' => 'maxlength',
                'rule_value' => 255,
                'value' => $email,
                'msg' => 'Email không được vượt quá 255 ký tự'
            ];
        }
        // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
        // dd($errors);
        if (!empty($errors)) {
            // In ra thông báo lỗi
            // kèm theo dữ liệu thông báo lỗi
            foreach($errors as $errorField) {
                foreach($errorField as $error) {
                    echo $error['msg'] . '<br />';
                }
            }
            return;
        }

        // 6. Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
        // Câu lệnh INSERT
        $sqlInsert = <<<EOT
        INSERT INTO member (username, email, phone ) 
        VALUES ('$username', '$email', '$phone') 
        EOT;

        // Code dùng cho DEBUG
        // var_dump($sqlInsert); die;

        // Thực thi INSERT
        mysqli_query($connect, $sqlInsert);

        mysqli_close($connect);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:danhsachthanhvien.php');   
    }
    ?>

    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>