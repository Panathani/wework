<?php
error_reporting(0);
include 'login-user_db.php';
include('signup-user_db.php');
$id = $_SESSION['userID']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าบริษัท · WeWork</title>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- <link href="css/style2.css" rel="stylesheet" type="text/css" /> -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/pic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="compro">

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.png" alt="" width="35" height="35"
                    class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allwork.php">หางาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="jobber-profile.php">ข้อมูลส่วนตัว</a>
                    </li>
                </ul>
                <div class="text-end">
                    <!-- logged in user information -->
                    <div class="btn-group">
                        <?php if (isset($_SESSION['username'])) : ?>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                        <?php endif ?>
                        <?php if (isset($_SESSION['email'])) : ?>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- navigation bar -->

    <br>
    <h1 class="text-center">ข้อมูลส่วนตัว</h1><br>

    <div class="container">
        <div>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `jobber` WHERE jobber_id = $id") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            ?>

            <!--Upload Image-->
            <div class="upload">
                <?php
                $image = $fetch["img"];
                ?>
                <img src="profile_images/<?php echo $image; ?>" width=125 height=125 title="<?php echo $image; ?>">
                <div class="round">
                    <a href="jobber-pic.php?id=<?php echo $id ?>" class="edit">
                        <i class="fa fa-camera" style="color: #fff;"></i></a>
                </div>
            </div>
            <!--Upload Image-->

            <br>
            <br>
            <form action="jobber-profile_db.php" method="POST">
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <label for="hr_username" class="form-label">ชื่อจริง<span class="text-muted"></span></label>
                        <input type="text" class="form-control" name="update_firstname"
                            value="<?php echo $fetch['j_name']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="hr_lastname" class="form-label">นามสกุล<span class="text-muted"></span></label>
                        <input type="text" class="form-control" name="update_lastname"
                            value="<?php echo $fetch['j_last']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="form-label">E-mail<span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="update_email"
                            value="<?php echo $fetch['email']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="text" class="form-control" name="update_phone"
                            value="<?php echo $fetch['phone']; ?>">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="University">มหาวิทยาลัย<span class="text-muted"></span></label>
                        <select class="form-select" name="update_uni">
                            <option value="MU" <?php if($fetch["uni"]=='MU'){echo "selected";}?>>มหาวิทยาลัยมหิดล</option>
                            <option value="CU" <?php if($fetch["uni"]=='CU'){echo "selected";}?>>จุฬาลงกรณ์มหาวิทยาลัย</option>
                            <option value="CMU" <?php if($fetch["uni"]=='CMU'){echo "selected";}?>>มหาวิทยาลัยเชียงใหม่</option>
                            <option value="KMUTT" <?php if($fetch["uni"]=='KMUTT'){echo "selected";}?>>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</option>
                            <option value="KMITL" <?php if($fetch["uni"]=='KMITL'){echo "selected";}?>>สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</option>
                            <option value="KMUTNB" <?php if($fetch["uni"]=='KMUTNB'){echo "selected";}?>>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>
                            <option value="TU" <?php if($fetch["uni"]=='TU'){echo "selected";}?>>มหาวิทยาลัยธรรมศาสตร์</option>
                            <option value="RU" <?php if($fetch["uni"]=='RU'){echo "selected";}?>>มหาวิทยาลัยรามคำแหง</option>
                            <option value="SU"<?php if($fetch["uni"]=='SU'){echo "selected";}?>>มหาวิทยาลัยศิลปากร</option>
                            <option value="KU" <?php if($fetch["uni"]=='KU'){echo "selected";}?>>มหาวิทยาลัยเกษตรศาสตร์</option>
                            <option value="SWU" <?php if($fetch["uni"]=='SWU'){echo "selected";}?>>มหาวิทยาลัยศรีนครินทรวิโรฒ</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="Major">ภาควิชา<span class="text-muted"></span></label>
                        <input class="form-control" type="text" name="update_major"
                            value="<?php echo $fetch['major']; ?>">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="GPAX">คะแนนเฉลี่ย<span class="text-muted"></span></label>
                        <input class="form-control" type="number" min="0" max="4" step="0.01" name="update_gpax"
                            value="<?php echo $fetch['gpax']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="workExperience">ประสบการณ์การทำงาน</label>
                        <textarea class="form-control" name="update_workEx" placeholder="ถ้าไม่มี ให้ใส่ -"
                            value="<?php echo $fetch['work_exp']; ?>" rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="text-center"><input type="submit" value="อัปเดตข้อมูล" class="btn btn-success"></div>
            </form>
        </div>
    </div>


    <!--footer-->
    <div><br><br><br></div>
    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">เกี่ยวกับ WeWork</h5>
                    <p>
                        Wework แพลตฟอร์มหางานด้านไอที ที่ใหญ่ที่สุดในประเทศไทย
                        ได้รับการยอมรับจากและไว้วางใจจากผู้ใช้ และบริษัทชั้นนำ

                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">สำหรับผู้หางาน</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="allwork.php" class="text-dark">หางาน</a>
                        </li>
                        <li>
                            <a href="jobber-profile.php" class="text-dark">หน้าผู้ใช้</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">สำหรับบริษัท</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="company-position.php" class="text-dark">โพสต์งาน</a>
                        </li>
                        <li>
                            <a href="company-applicant.php" class="text-dark">ดูเรซูเม่</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">ติดตามเรา</h5>

                    <p><i></i>ปทุมวัน, กรุงเทพฯ 10530, ประเทศไทย</p>
                    <p><i></i>info@wework.com</p>
                    <p><i></i> + 66 000 000 0</p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!--footer-->
</body>

</html>