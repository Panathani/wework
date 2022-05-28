<?php
    error_reporting(0);
    include 'login-company_db.php';
    include('signup-company_db.php');
    if (isset($_SESSION['comName'])) {
        $com_name = $_SESSION['comName'];
    } else {
        $com_name = $_SESSION['companyName'];
    }

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

    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index-company.php"><img src="img/Logo.png" alt="" width="35" height="35" class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="company-profile.php">หน้าบริษัท</a>
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

    <br>
    <h1 class="text-center">หน้าบริษัท</h1><br>

    <div class="container">
        <div>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `company` WHERE com_name = '$com_name'") or die('query failed');
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
                    <a href="company-pic.php?com_name=<?php echo $fetch['com_name'] ?>" class="edit">
                        <i class="fa fa-camera" style="color: #fff;"></i></a>
                </div>
            </div>
            <!--Upload Image-->

            <br>
            <br>
            <form action="company-profile_db.php" method="POST">
                <input type="hidden" value="<?php echo $fetch["com_name"]; ?>" name="com_name">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <label for="companyName" class="form-label">ชื่อบริษัท<span class="text-muted"></span></label>
                        <input type="text" class="form-control" name="update_comname" value="<?php echo $fetch['com_name']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="country" class="form-label">ประเภทบริษัท</label>
                        <select class="form-select" name="com_type">
                            <option value="Small-Medium" <?php if($fetch["com_type"]=='Small-Medium'){echo "selected";}?>>วิสาหกิจขนาดเล็ก-กลาง</option>
                            <option value="Large" <?php if($fetch["com_type"]=='Large'){echo "selected";}?>>วิสาหกิจขนาดใหญ่</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="companyAddress">ที่อยู่บริษัท<span class="text-muted"></span></label>
                        <select class="form-select" name="location">
                            <option value="ฺBangkok" <?php if($fetch["location"]=='ฺBangkok'){echo "selected";}?>>กรุงเทพมหานคร</option>
                            <option value="Khonkaen" <?php if($fetch["location"]=='Khonkaen'){echo "selected";}?>>ขอนแก่น</option>
                            <option value="Chaing Mai" <?php if($fetch["location"]=='Chaing Mai'){echo "selected";}?>>เชียงใหม่</option>
                            <option value="Nakhonsithammarat" <?php if($fetch["location"]=='Nakhonsithammarat'){echo "selected";}?>>นครศรีธรรมราช</option>
                            <option value="Nakhon Ratchasima" <?php if($fetch["location"]=='Nakhon Ratchasima'){echo "selected";}?>>นครราชสีมา</option>
                            <option value="Buriram" <?php if($fetch["location"]=='Buriram'){echo "selected";}?>>บุรีรัมย์</option>
                            <option value="Sisaket" <?php if($fetch["location"]=='Sisaket'){echo "selected";}?>>ศรีสะเกษ</option>
                            <option value="Surin" <?php if($fetch["location"]=='Surin'){echo "selected";}?>>สุรินทร์</option>
                            <option value="Udonthani" <?php if($fetch["location"]=='Udonthani'){echo "selected";}?>>อุดรธานี</option>
                            <option value="Ubonratchathani" <?php if($fetch["location"]=='Ubonratchathani'){echo "selected";}?>>อุบลราชธานี</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="form-label">E-mail<span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="update_email" value="<?php echo $fetch['email']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="text" class="form-control" name="update_phone" value="<?php echo $fetch['phone']; ?>">
                    </div>
                    <hr class="my-4">
                    <label for="hr_username">ผู้ประสานงาน<span class="text-muted"></span></label>

                    <div class="col-sm-6">
                        <label for="hr_username" class="form-label">ชื่อจริง<span class="text-muted"></span></label>
                        <input type="text" class="form-control" name="update_firstname" value="<?php echo $fetch['firstname']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="hr_lastname" class="form-label">นามสกุล<span class="text-muted"></span></label>
                        <input type="text" class="form-control" name="update_lastname" value="<?php echo $fetch['lastname']; ?>">
                    </div>
                </div>
                <br>
                <div class = "text-center"><input type="submit" value="อัปเดตข้อมูล" class="btn btn-success"></div>
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