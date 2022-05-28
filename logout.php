<?php
    session_start();
    include('server.php'); 
    session_destroy();
    header("Location: home.php ");	
?>