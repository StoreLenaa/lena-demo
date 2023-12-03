<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LANA - Lịch Sử Giao Dịch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>

    <!-- Main content -->
    <div class="container">
        <h1>Lịch Sử Giao Dịch</h1>
        <?php
        include_once(__DIR__ . '/../connect.php');

        // Check if the total_amount is set in the GET parameters
        $total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : '0';

        // Update the 'total_amount' in the database for each member
        $sql = "SELECT * FROM member";
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // Update the 'total_amount' for each member
            $memberId = $row['id'];
            $updateSql = "UPDATE member SET total_amount = '$total_amount' WHERE id = $memberId";
            mysqli_query($connect, $updateSql);
        }

        // Fetch updated data after the update
        $result = mysqli_query($connect, $sql);
        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum,
                'id' => $row['id'],
                'username' => $row['username'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'total_amount' => $row['total_amount'],
            );
            $rowNum++;
        }
        ?>

        <table class="table table-borderd">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Tài Khoản</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Tổng số tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['rowNum']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['total_amount']; ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-primary">Quay lại</a>
    </div>
</body>

</html>
