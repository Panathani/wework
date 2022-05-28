<?php 
    require("login-company_db.php");

    $compo_id=$_POST["compo_id"];
    $detail = $_POST['detail'];
    $quali = $_POST['qualification'];
    $salary = $_POST['salary'];
    $type = $_POST['type'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql ="UPDATE company_position SET 
            detail = '$detail',
            quali ='$quali' , 
            salary = '$salary' , 
            type = '$type' ,
            start = '$start' ,
            end = '$end' 
        WHERE compo_id = $compo_id";

    $result=mysqli_query($conn,$sql);

    if($result){
        header("location:company-position.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาดเกิดขึ้น".mysqli_error($connect);
    }
?>