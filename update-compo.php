<?php 
    require("login-company_db.php");

    $compo_id = $_GET['compo_id'];

    $sql = "SELECT p.position, c.compo_id, c.detail, c.quali, c.salary, c.type, c.start, c.end 
                FROM company_position c
                INNER JOIN position p
                ON p.position_id= c.position_id
                WHERE compo_id = $compo_id";

    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขตำแหน่งงาน · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <h3 class="text-center">แบบฟอร์มแก้ไขตำแหน่งงาน</h3>
                        <form action="updateData.php" method="POST">
                            <input type="hidden" value="<?php echo $row["compo_id"];?>" name="compo_id">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="position">ตำแหน่งงาน<span class="text-muted required">*</span></label>
                                    <input type="text" name="position" class="form-control"
                                        value="<?php echo $row['position']; ?>" required readonly>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-8">
                                    <div class="item">
                                        <label class="col-form-label" for="detail">รายละเอียดงาน<span
                                                class="text-muted required">*</span></label>
                                        <textarea class="form-control" rows="5"
                                            name="detail"><?php echo $row['detail']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="question">
                                        <label class="col-form-label" for="type">ประเภทงาน<span
                                                class="text-muted required">*</span></label><br>
                                        <?php
                                            if($row['type'] == 'พนักงานประจำ') {
                                                echo "<label><input type='radio' value='พนักงานประจำ' name='type' required checked><span>พนักงานประจำ</span></label><br>";
                                                echo "<label><input type='radio' value='พนักงาน Part-Time' name='type' required><span>พนักงาน Part-Time</span></label><br>";
                                                echo "<label><input type='radio' value='ฝึกงาน' name='type' required><span>ฝึกงาน</span></label><br>";
                                            } else if($row['type'] == 'พนักงาน Part-Time') {
                                                echo "<label><input type='radio' value='พนักงานประจำ' name='type' required><span>พนักงานประจำ</span></label><br>";
                                                echo "<label><input type='radio' value='พนักงาน Part-Time' name='type' required checked><span>พนักงาน Part-Time</span></label><br>";
                                                echo "<label><input type='radio' value='ฝึกงาน' name='type' required><span>ฝึกงาน</span></label><br>";
                                            } else {
                                                echo "<label><input type='radio' value='พนักงานประจำ' name='type' required><span>พนักงานประจำ</span></label><br>";
                                                echo "<label><input type='radio' value='พนักงาน Part-Time' name='type' required><span>พนักงาน Part-Time</span></label><br>";
                                                echo "<label><input type='radio' value='ฝึกงาน' name='type' required checked><span>ฝึกงาน</span></label><br>";
                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>

                            <div class="item">
                                <p><br>คุณสมบัติและเอกสาร<span>*</span></p>
                                <textarea class="form-control" rows="5" name="qualification"
                                    required><?php echo $row['quali']; ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>เงินเดือน<span>*</span></p>
                                        <div class="name-item">
                                            <input type="text" name="salary" value="<?php echo $row['salary']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>วันเริ่มการประกาศ<span class="required">*</span></p>
                                        <div class="name-item">
                                            <input type="date" id="start" name="start"
                                                value="<?php echo $row['start']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>วันสิ้นสุดการประกาศ<span class="required">*</span></p>
                                        <div class="name-item">
                                            <input type="date" id="end" name="end" value="<?php echo $row['end']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-5 form-group text-center">
                                    <button type="submit" class="btn btn-primary me-4"
                                        value="Submit">แก้ไขตำแหน่ง</button>
                                </div>
                                <div class="col-md-5 form-group text-center">
                                    <a href="company-position.php" class="btn btn-secondary">ย้อนกลับ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>