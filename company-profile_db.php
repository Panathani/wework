<?php 
    include ('login-company_db.php');
    $com_name = $_POST['com_name'];
    $update_comname = $_POST['update_comname'];
    $update_email = $_POST['update_email'];
    $update_firstname = $_POST['update_firstname'];
    $update_lastname = $_POST['update_lastname'];
    $update_phone = $_POST['update_phone'];
    $update_comtype = $_POST['com_type'];
    $update_location = $_POST['location'];

    $sql ="UPDATE `company` 
    SET com_name = '$update_comname', 
    email = '$update_email', 
    firstname = '$update_firstname', 
    lastname = '$update_lastname', 
    phone = '$update_phone', 
    com_type = '$update_comtype', 
    location = '$update_location' 
    WHERE com_name = '$com_name'";

    $result=mysqli_query($conn,$sql);
    

    if (isset($_FILES["image"]["name"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
        } elseif ($imageSize > 1200000) {
        } else {
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $query = "UPDATE company SET img = '$newImageName' WHERE company_id = $id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'profile_images/' . $newImageName);
        }
    }

    $_SESSION['comName'] = $update_comname;
    header("location:company-position.php");
