<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_company'])) {
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
            $query = "SELECT * FROM company WHERE email='$email' AND com_password='$password'";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            if (!$result){
                die("error");
            }
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['comName'] = $row["com_name"];
                $_SESSION['hr_email'] = $email;
                $_SESSION['comID'] = $row['company_id'];
                $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                header("location: company-position.php");
            } else {
                array_push($errors, "โปรดตรวจสอบอีเมล์หรือรหัสผ่านใหม่อีกครั้ง");
                $_SESSION['error'] = "โปรดตรวจสอบอีเมล์หรือรหัสผ่านใหม่อีกครั้ง";
                header("location: login-company.php"); 
            }
        } else {
            array_push($errors, "โปรดกรอกอีเมล์หรือรหัสผ่านให้ถูกต้อง");
            $_SESSION['error'] = "โปรดกรอกอีเมล์หรือรหัสผ่านให้ถูกต้อง";
            header("location: login-company.php");
        }
    }
?>
