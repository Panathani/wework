<?php
error_reporting(0);
include('login-company_db.php');
include('signup-company_db.php');

if (isset($_SESSION['comName'])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM company_position INNER JOIN position On company_position.position_id = position.position_id 
    INNER JOIN company On company.company_id = company_position.company_id WHERE company_position.compo_id=$id";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    $id = $_GET["id"];
    $sql = "SELECT * FROM company_position INNER JOIN position On company_position.position_id = position.position_id 
    INNER JOIN company On company.company_id = company_position.company_id WHERE company_position.compo_id=$id";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครงาน WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
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
                        <a class="nav-link active" href="allwork.php">หางาน</a>
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

    <!--Body-->
    <form action="jobs_db.php" method="post" enctype="multipart/form-data">
        <div class="body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                        <div class="card border-0 mt-2 shadow">
                            <img src="profile_images/<?php echo $row["img"]; ?>">
                            <div class="card-body p-1-9 p-xl-5">
                                <div class="mb-4">
                                    <h3 class="h3 mb-3">
                                        <?php echo $row["com_name"] ?>
                                    </h3>
                                    <span class="text-primary">ตำแหน่ง: </span><span>
                                        <?php echo $row["position"] ?>
                                    </span><br />
                                    <span class="text-primary">ประเภทงาน: </span><span>
                                        <?php echo $row["type"] ?>
                                    </span><br />
                                    <span class="text-primary">ระยะเวลารับสมัคร: </span><span>
                                        <?php echo $row["start"] ?><span class="text-primary"> ถึง </span>
                                        <?php echo $row["end"] ?>
                                    </span><br />
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="web mb-3">
                                        <i class="fas fa-light fa-briefcase display-25 me-3 text-secondary"></i>
                                        <?php echo $row["email"] ?>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marker-alt display-25 me-3 text-secondary "></i>
                                        <?php echo $row["location"] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ps-lg-1-6 ps-xl-5">
                            <div class="mb-5 wow fadeIn">
                                <div class="col pt-5 d-flex flex-column position-static">

                                    <div class="cardd card-margin">
                                        <div class="card-header no-border">
                                            <h3 class="card-title p-3">รายละเอียดงาน</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="widget-49">
                                                <p class="mb-auto">
                                                    <?php echo str_replace(array("\r\n", "\n", "\r"), "<br>",$row["detail"]) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col d-flex flex-column position-static">
                                    <div class="cardd card-margin">
                                        <div class="card-header no-border">
                                            <h3 class="card-title p-3">คุณสมบัติและเอกสาร</h3>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="widget-49">
                                                <p class="mb-auto">
                                                    <?php echo str_replace(array("\r\n", "\n", "\r"), "<br>", $row["quali"]) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-4 col-md-3 col-xl-3 mb-4 d-flex align-items-stretch">

                                        <div class="cardd card-margin">
                                            <div class="card-header no-border">
                                                <h3 class="card-title p-3">เงินเดือน</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="widget-49">
                                                    <p class="mb-auto">
                                                        <?php echo $row["salary"] ?> บาท
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9 col-xl-9 mb-4 align-items-stretch">
                                        <div class="cardd card-margin">
                                            <div class="card-header no-border">
                                                <h3 class="card-title p-3">ไฟล์เอกสาร</h3>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="widget-49">
                                                    <font color="red">*อัพโหลดได้เฉพาะ .pdf เท่านั้น </font><br>
                                                    <input class="form-control" type="file" name="file"
                                                        required="required" /><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <button type="submit" name="submit" class="btn btn-success px-5 py-2"
                                style="display: block; margin: 0 auto;"
                                onclick="return confirm('คุณต้องการสมัครงานใช่หรือไม่')">สมัคร</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
