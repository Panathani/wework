<?php
    include('server.php');
    include('login-company_db.php');
        
    $compo_id = $_GET['compo_id'];
        
    $sql = "DELETE FROM company_position WHERE compo_id = $compo_id";

    $result = mysqli_query($conn, $sql);
    header('location: company-position.php');    
?>
   