<?php
    include('server.php');
    include('login-company_db.php');
    
    $comID = $_SESSION['comID'];
    $poID  = $_REQUEST['position'];
    $detail = $_REQUEST['detail'];
    $quali = $_REQUEST['qualification'];
    $salary = $_REQUEST['salary'];
    $type = $_REQUEST['type'];
    $start = $_REQUEST['start'];
    $end = $_REQUEST['end'];

    $sql = "INSERT INTO company_position (company_id, position_id, detail,quali,salary,type, start, end)
    VALUES ('$comID', '$poID', '$detail', '$quali', '$salary', '$type', '$start', '$end')";

    $result = mysqli_query($conn, $sql);
    header('location: company-position.php');   
?>
