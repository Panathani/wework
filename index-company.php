<?php
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="index-company.php"><img src="img/Logo.png" alt="" width="35" height="35"
                    class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="company-profile.php">หน้าบริษัท</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="company-position.php">งานทั้งหมด</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="company-applicant.php">ผู้สมัครทั้งหมด</a>
                    </li>
                </ul>
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

    <div class="container">
        <h1 class="text-center" id="wework"><br>WeWork</h1>
        <div class="carouselpage1">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <img src="img/banner1.png" alt="banner1" class="d-block mx-auto img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="img/banner2.png" alt="banner2" class="d-block mx-auto img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="img/banner3.png" alt="banner3" class="d-block mx-auto img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="img/banner4.png" alt="banner4" class="d-block mx-auto img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="img/banner5.png" alt="banner5" class="d-block mx-auto img-fluid">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        <p><br>WeWork เป็นเว็บไซต์หางานอันดับ 1 ของประเทศไทย พวกเรามีรางวัลการันตีความสำเร็จมากมาย อีกทั้ง WeWork
            เป็นpartner
            กับบริษัททั้งใหญ่และเล็กมากมาย ขอให้พวกคุณเชื่อมั่นและเลือกใช้บริการของเรา
            เราจะทำให้คุณได้งานที่คุณต้องการและได้พนักงานที่เหมาะสมกับบริษัทของคุณ
            ทำให้ทุกธุรกิจดำเนินการไปได้อย่างราบรื่นและสมบูรณ์แบบ เพราะ เรา เข้าใจคุณดีกว่าใคร </p>

        <h3>Partner</h3>
        <img class="partner" src="img/Toyo.png">
        <img class="partner" src="img/AIS.png">
        <img class="partner" src="img/Bit.png">
        <img class="partner" src="img/CBS.png">
        <img class="partner" src="img/CP.png">
        <img class="partner" src="img/MM.png">
        <img class="partner" src="img/Pepsi.png">
        <img class="partner" src="img/ptt.png">
        <img class="partner" src="img/SCB.png">
        <img class="partner" src="img/SK.png">
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

    <div class="homecontent">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <h3>
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
        <?php endif ?>
    </div>

    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>