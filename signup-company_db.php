<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    if (isset($_POST['reg_company'])) {
        $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
        $companyType = mysqli_real_escape_string($conn, $_POST['companyType']);
        $companyAddress = mysqli_real_escape_string($conn, $_POST['companyAddress']);
        $hr_username = mysqli_real_escape_string($conn, $_POST['hr_username']);
        $hr_lastname = mysqli_real_escape_string($conn, $_POST['hr_lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($companyName)) {
            array_push($errors, "โปรดใส่ชื่อบริษัท"); //ถ้าเป็นค่าว่าง 
            $_SESSION['error'] = "โปรดใส่ชื่อบริษัท";
        }
        if (empty($companyType)) {
            array_push($errors, "โปรดใส่ประเภทบริษัท"); 
            $_SESSION['error'] = "โปรดใส่ประเภทบริษัท";
        }
        if (empty($email)) {
            array_push($errors, "โปรดใส่อีเมล์");
            $_SESSION['error'] = "โปรดใส่อีเมล์";
        }
        if (empty($password_1)) {
            array_push($errors, "โปรดใส่รหัสผ่าน");
            $_SESSION['error'] = "โปรดใส่รหัสผ่าน";
        }
        if (strlen($password_1)<8) {
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
        if (empty($hr_username)) {
            array_push($errors, "โปรดใส่ชื่อผู้ประสานงาน");
            $_SESSION['error'] = "โปรดใส่ชื่อผู้ประสานงาน";
        }
        if (empty($hr_lastname)) {
            array_push($errors, "โปรดใส่นามสกุลผู้ประสานงาน");
            $_SESSION['error'] = "โปรดใส่นามสกุลผู้ประสานงาน";
        }
        if (empty($companyAddress)) {
            array_push($errors, "โปรดใส่ที่อยู่บริษัท");
            $_SESSION['error'] = "โปรดใส่ที่อยู่บริษัท";
        }

        $user_check_query = "SELECT * FROM company WHERE email = '$email' OR phone = '$phoneNumber' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['email'] === $email) {
                array_push($errors, "อีเมล์นี้มีอยู่ในระบบแล้ว");
            }
            if ($result['phoneNumber'] === $phoneNumber) {
                array_push($errors, "เบอร์โทรศัพท์นี้มีอยู่ในระบบแล้ว");
            }
        }
        if (count($errors) == 0){
                $password = md5($password_1);
                $sql = "INSERT INTO company (com_name, email, com_password, firstname, lastname, phone, com_type, location) VALUES ('$companyName','$email','$password', '$hr_username', '$hr_lastname', '$phoneNumber', '$companyType', '$companyAddress')";
                mysqli_query($conn,$sql);

                $query = "SELECT * FROM company WHERE com_name='$companyName'";
                $result = mysqli_query($conn, $query);
                $row = $result->fetch_assoc();
                if (!$result){
                    die("error");
                }
                if (mysqli_num_rows($result) == 1) {
                $_SESSION['comID'] = $row['company_id'];
                $_SESSION['companyName'] = $companyName;
                $_SESSION['success'] = "ลงทะเบียนสำเร็จ";
                header('location: company-position.php');
            }
        } else {header("location: signup-company.php");}    
    }
?>