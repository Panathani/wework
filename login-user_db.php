<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($email)) {
            array_push($errors, "โปรดกรอกอีเมล์");
        }

        if (empty($password)) {
            array_push($errors, "โปรดกรอกรหัสผ่าน");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM jobber WHERE email='$email' AND j_password='$password'";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            if (!$result){
                die("error");
            }
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['userName'] = $row["j_name"];
                $_SESSION['userID'] = $row["jobber_id"];
                $_SESSION['lastName'] = $row["j_last"];
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                header("location: index.php");
            } else {
                array_push($errors, "โปรดตรวจสอบอีเมล์หรือรหัสผ่านใหม่อีกครั้ง");
                $_SESSION['error'] = "โปรดตรวจสอบอีเมล์หรือรหัสผ่านใหม่อีกครั้ง";
                header("location: login-user.php"); 
            }
        } else {
            array_push($errors, "โปรดกรอกอีเมล์หรือรหัสผ่านให้ถูกต้อง");
            $_SESSION['error'] = "โปรดกรอกอีเมล์หรือรหัสผ่านให้ถูกต้อง";
            header("location: login-user.php");
        } 
    }
?>
