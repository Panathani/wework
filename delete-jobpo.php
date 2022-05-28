<?php
    include('server.php');
    include('login-company_db.php');

    $jobpo_id = $_GET['jobpo_id'];
    echo $jobpo_id;

    $sql = "DELETE FROM position_jobber WHERE jobpo_id = $jobpo_id";

    $result = mysqli_query($conn, $sql);
    header('location: company-applicant.php'); 
?>