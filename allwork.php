<?php
    session_start();
    include('server.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตำแหน่งงานทั้งหมด · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="f_css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.png" alt="" width="35" height="35" class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="allwork.php">หางาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jobber-profile.php">ข้อมูลส่วนตัว</a>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>งานทั้งหมด</h4>
                    </div>
                </div>
            </div>
            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>ตัวกรอง
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>ตำแหน่งงาน</h6>
                            <hr>
                            <?php
                            $sql = "SELECT * FROM position ORDER BY position_id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $jobs) {
                                    $checked = [];
                                    if (isset($_GET['jobs'])) {
                                        $checked = $_GET['jobs'];
                                }
                            ?>
                                <div>
                                    <input type="checkbox" name="jobs[]" value="<?= $jobs['position_id']; ?>" <?php if (in_array($jobs['position_id'], $checked)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> />
                                    <?= $jobs['position']; ?>
                                </div>
                            <?php
                                }
                            } else {
                                echo "No Jobs Found";
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-9 mt-3">
                <!-- Brand Items - Products -->

                <?php
                if (isset($_GET['jobs'])) {
                    $branchecked = [];
                    $branchecked = $_GET['jobs'];
                    foreach ($branchecked as $rowbrand) {
                        $all_jobs = "SELECT * FROM findwork WHERE position_id IN ($rowbrand) ORDER BY end";
                        $run = mysqli_query($conn, $all_jobs);
                        if (mysqli_num_rows($run) > 0) {
                            foreach ($run as $items) :
                ?>
                                <div class="row p-2 bg-white border rounded mt-2">
                                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="profile_images/<?php echo $items["img"]; ?>" height=165 width=165></div>
                                    <div class="col-md-6 mt-1">
                                        <h5><?php echo $items['position']; ?></h5>
                                        <div class="mt-1 mb-1 spec-1"><span>บริษัท </span><span><?php echo $items['com_name']; ?></span></div>
                                        <div class="mt-1 mb-1 spec-1"><span>ประเภท </span><span><?php echo $items['type']; ?></span></div>
                                        <div class="mt-1 mb-1 spec-1"><span>พื้นที่ </span><span class="dot"></span><span><?php echo $items['location']; ?></span></div>
                                        <p class="text-justify text-truncate para mb-0"><?php echo $items['detail']; ?><br><br></p>
                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                        <div class="d-flex flex-row align-items-center">
                                            <h4 class="mr-1"><?php echo $items['salary']; ?> &nbsp;</h4><span class="strike-text">บาท</span>
                                        </div>
                                        <h6 class="text-secondary">ปิดรับสมัคร <?php echo $items['end']; ?></h6>
                                        <br>
                                        <div class="d-flex flex-column mt-4">
                                            <a href="jobs.php?id=<?php echo $items["compo_id"] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        }
                    }
                } else {
                    $all_jobs = "SELECT * FROM findwork ORDER BY end";
                    $run = mysqli_query($conn, $all_jobs);
                    if (mysqli_num_rows($run) > 0) {
                        foreach ($run as $items) :
                            ?>
                            <div class="row p-2 bg-white border rounded mt-2">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="profile_images/<?php echo $items["img"]; ?>" height=165 width=165></div>
                                <div class="col-md-6 mt-1">
                                    <h5><?php echo $items['position']; ?></h5>
                                    <div class="mt-1 mb-1 spec-1"><span>บริษัท </span><span><?php echo $items['com_name']; ?></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>ประเภท </span><span><?php echo $items['type']; ?></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>พื้นที่ </span><span class="dot"></span><span><?php echo $items['location']; ?></span></div>
                                    <p class="text-justify text-truncate para mb-0"><?php echo $items['detail']; ?><br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1"><?php echo $items['salary']; ?> &nbsp;</h4><span class="strike-text">บาท</span>
                                    </div>
                                    <h6 class="text-secondary">ปิดรับสมัคร <?php echo $items['end']; ?></h6>
                                    <br>
                                    <div class="d-flex flex-column mt-4">
                                        <a href="jobs.php?id=<?php echo $items["compo_id"] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>
                                </div>
                            </div>
                <?php
                        endforeach;
                    } else {
                        echo "No Items Found";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

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
                        <a href="jobber_profile.php" class="text-dark">หน้าผู้ใช้</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">สำหรับบริษัท</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-dark">โพสต์งาน</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">ดูเรซูเม่</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">ติดตามเรา</h5>

                <p><i></i>ปทุมวัน, กรุงเทพฯ 10530, ประเทศไทย</p>
                <p><i></i>info@wework.com</p>
                <p><i ></i> + 66 000 000 0</p>
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

</html>