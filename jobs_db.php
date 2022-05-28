<?php
  session_start();
  include('server.php');
  if (isset($_POST['submit'])) {
    $compo_id = $_POST['id'];
    $jobber_id = $_SESSION['userID'];
    // for the database
    $pdf = time() . '-' . $_FILES["file"]["name"];
    echo $pdf;
    // For image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($pdf);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['file']['size'] > 1000000) {
      echo "ขนาดไฟล์ใหญ่ไป";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO `position_jobber` (`compo_id`, `jobber_id`, `resume`) VALUES ('$compo_id', '$jobber_id', '$pdf')";
        mysqli_query($conn, $sql);
        header("location:allwork.php");
      }
    }
  }
?>