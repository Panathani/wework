<?php 
    include ('login-company_db.php');
    $id = $_POST['id'];
    $update_firstname = $_POST['update_firstname'];
    $update_lastname = $_POST['update_lastname'];
    $update_email = $_POST['update_email'];
    $update_phone = $_POST['update_phone'];
    $update_uni = $_POST['update_uni'];
    $update_major = $_POST['update_major'];
    $update_gpax = $_POST['update_gpax'];
    $update_workEx = $_POST['update_workEx'];

    $sql ="UPDATE `jobber` 
    SET j_name = '$update_firstname', 
    j_last = '$update_lastname', 
    phone = '$update_phone', 
    email = '$update_email', 
    uni = '$update_uni', 
    major = '$update_major',
    gpax = '$update_gpax',
    work_exp = '$update_workEx'
    WHERE jobber_id = $id";

    $result=mysqli_query($conn,$sql);
    
    header("location:jobber-profile.php");
?>
