<?php
    include('server.php');
    $id  = $_POST['ID'];
    if (isset($_POST['save_profile'])) {
        // for the database
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        // For image upload
        $target_dir = "profile_images/";
        $target_file = $target_dir . basename($profileImageName);
        // VALIDATION
        // validate image size. Size is calculated in Bytes
        if ($_FILES['profileImage']['size'] > 200000) {
            echo "Image size should not be greated than 200Kb";
        }
        // Upload image only if no errors
        if (empty($error)) {
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                $sql = "UPDATE jobber SET img='$profileImageName' WHERE jobber_id = $id";
                mysqli_query($conn, $sql);
                header("location:index.php");
            }
        }
    }
?>
