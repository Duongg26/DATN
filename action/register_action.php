<?php
session_start();
include 'connect.php';
$u_name = $_POST['username'];
$pass = $_POST['password'];
$fname = $_POST['fname'];
$phoneNumber = $_POST['phoneNumber'];
$checkUsernameQuery = "SELECT * FROM account WHERE User = '$u_name'";
$checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
if (!$checkUsernameResult) {
    $_SESSION['message'] = "Lỗi trong quá trình kiểm tra tên đăng nhập: " . mysqli_error($conn);
} elseif (mysqli_num_rows($checkUsernameResult) > 0) {
    echo '<script>
    alert("Tên tài khoản đã tồn tại vui lòng đổi tên khác.");
    window.history.back();
</script>';
    exit();
}
elseif(!preg_match('/^0\d{9}$/', $phoneNumber)){
    echo '<script>
    alert("Số điện thoại không hợp lệ.");
    window.history.back();
</script>';
}
else{
    $sql = "INSERT INTO account (User, Pass, FName, Tell) VALUES ('$u_name', '$pass', '$fname', '$phoneNumber')";
if ($conn->query($sql) === TRUE) {
       $sql1="SELECT * FROM account WHERE User = '$u_name'";
       $query = mysqli_query($conn, $sql1);
       $row = mysqli_fetch_array($query);
       if ($row) {
           $id=$row['IdAcc'];
           header("Location:http://localhost/DATN/index.php?IdAcc=".$id);
       }
        
        
}
}
?>