<?php
    include 'login-company_db.php';
    $com_name  = $_GET['com_name'];
    $select = mysqli_query($conn, "SELECT * FROM `company` WHERE com_name = '$com_name'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ภาพบริษัท · WeWork</title>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- <link href="css/style2.css" rel="stylesheet" type="text/css" /> -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/pic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="compro">

    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href=" #"><img src="img/Logo.png" alt="" width="35" height="35"
                    class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="company-profile.php">หน้าบริษัท</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="company-position.php">งานทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="company-applicant.php">ผู้สมัครทั้งหมด</a>
                    </li>
                </ul>
                <div class="text-end">
                    <div class="text-end">
                        <!-- logged in user information -->
                        <div class="btn-group">
                            <?php if (isset($_SESSION['companyName'])) : ?>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                            <?php endif ?>
                            <?php if (isset($_SESSION['hr_email'])) : ?>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <!-- navigation bar -->

    <body>
        <div class="container">
            <div class="row">
                <div class="col-4 offset-md-4 form-div">
                    <form action="company-pic_db.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $com_name; ?>" name="ID">
                        <h2 class="text-center mb-3 mt-3">แก้ไขภาพ</h2>
                        <div class="form-group text-center" style="position: relative;">
                            <span class="img-div">
                                <div class="text-center img-placeholder" onClick="triggerClick()">
                                    <h4>Update image</h4>
                                </div>
                                <img src="profile_images/<?php echo $fetch["img"]; ?>" onClick="triggerClick()"
                                id="profileDisplay">
                            </span>
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage"
                                class="form-control" style="display: none;">
                            <label>Profile Image</label>
                        </div>
                        <div class="form-group text-center">
                            <br><button type="submit" name="save_profile" class="btn btn-primary btn-block">บันทึก</button>
                        </div>
                        <br>
                    </form>
                </div>
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
                                <a href="#" class="text-dark">หน้าผู้ใช้</a>
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
<script src="js/scripts.js"></script>
