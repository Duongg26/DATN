<?php
session_start();
include 'connect.php';
if (isset($_POST['login'])) {
    $u_name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM account WHERE User ='$u_name' and Pass='$pass' and Status =1 ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $id=$row['IdAcc'];
        header("Location:http://localhost/DATN/index.php?IdAcc=".$id);
        exit();
    } else {
        echo '<script>
        alert("Sai tài khoản hoặc mật khẩu. Vui lòng nhập lại.");
        window.history.back();
    </script>';
    }

}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
