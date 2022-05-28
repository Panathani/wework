<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $University = mysqli_real_escape_string($conn, $_POST['University']);
        $Major = mysqli_real_escape_string($conn, $_POST['Major']);
        $GPAX = mysqli_real_escape_string($conn, $_POST['GPAX']);
        $workExperience = mysqli_real_escape_string($conn, $_POST['workExperience']);

        if (empty($username)) {
            array_push($errors, "โปรดใส่ชื่อจริง"); //ถ้าเป็นค่าว่าง 
            $_SESSION['error'] = "โปรดใส่ชื่อจริง";
        }
        if (empty($lastname)) {
            array_push($errors, "โปรดใส่นามสกุล"); 
            $_SESSION['error'] = "โปรดใส่นามสกุล";
        }
        if (empty($email)) {
            array_push($errors, "โปรดใส่อีเมล์");
            $_SESSION['error'] = "โปรดใส่อีเมล์";
        }
        if (strlen($password_1)<8) {
            array_push($errors, "รหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
        }
        if ($password_1<8) {
            array_push($errors, "รหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
        }

        if ($password_1 != $password_2) {
            array_push($errors, "ยืนยันรหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "ยืนยันรหัสผ่านไม่ถูกต้อง";
        }
        if (empty($phoneNumber)) {
            array_push($errors, "โปรดใส่เบอร์โทรศัพท์"); //ถ้าเป็นค่าว่าง 
            $_SESSION['error'] = "โปรดใส่เบอร์โทรศัพท์";
        }
        if (empty($University)) {
            array_push($errors, "โปรดใส่ชื่อมหาวิทยาลัย");
            $_SESSION['error'] = "โปรดใส่ชื่อมหาวิทยาลัย";
        }
        if (empty($Major)) {
            array_push($errors, "โปรดใส่ภาควิชา");
            $_SESSION['error'] = "โปรดใส่ภาควิชา";
        }
        if (empty($GPAX)) {
            array_push($errors, "โปรดใส่คะแนนเฉลี่ย");
            $_SESSION['error'] = "โปรดใส่คะแนนเฉลี่ย";
        }
        if (empty($workExperience)) {
            array_push($errors, "โปรดใส่ประสบการณ์การทำงาน ถ้าไม่มีใส่ -");
            $_SESSION['error'] = "โปรดใส่ประสบการณ์การทำงาน ถ้าไม่มีใส่ -";
        }
//checkว่ามี email, username ในระบบรึยัง
        $user_check_query = "SELECT * FROM jobber WHERE email = '$email' OR phone = '$phoneNumber' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['email'] === $email) {
                array_push($errors, "อีเมล์นี้มีอยู่ในระบบแล้ว");
            }
            //if ($result['phoneNumber'] === $phoneNumber) {
                //array_push($errors, "เบอร์โทรศัพท์นี้มีอยู่ในระบบแล้ว");
            //}
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO jobber (j_name, j_last,phone,email,j_password, uni,major, gpax, work_exp) VALUES ('$username','$lastname','$phoneNumber', '$email', '$password', '$University', '$Major', '$GPAX', '$workExperience')";
            mysqli_query($conn, $sql);

            $query = "SELECT * FROM jobber WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            if (!$result){
                die("error");
            }
            if (mysqli_num_rows($result) == 1) {
            $_SESSION['lastname'] = $lastname;
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $row["jobber_id"];
            $_SESSION['success'] = "ลงทะเบียนสำเร็จ";
            header("location: index.php");}

        } else {
            header("location: signup-user.php");
        } 
    }
?>