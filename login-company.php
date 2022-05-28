<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบสำหรับบริษัท · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href=" home.php"><img src="img/Logo.png" alt="" width="35" height="35"
                    class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">หน้าหลัก</a>
                    </li>
                </ul>
                <div class="text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle me-2"
                            data-bs-toggle="dropdown" aria-expanded="false">เข้าสู่ระบบ</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login-company.php">สำหรับบริษัท</a></li>
                            <li><a class="dropdown-item" href="login-user.php">สำหรับผู้หางาน</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle me-4" data-bs-toggle="dropdown"
                            aria-expanded="false">ลงทะเบียน</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="signup-company.php">สำหรับบริษัท</a></li>
                            <li><a class="dropdown-item" href="signup-user.php">สำหรับผู้หางาน</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- navigation bar -->

    <div class="text-center">
        <h1 class="top center"><br>สำหรับบริษัท</h1>
        <form class="form-signin" action="login-company_db.php" method="post">
            <br>
            <h1 class="h3 mb-3 font-weight-normal">เข้าสู่ระบบ<br></h1>
            <br>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <br><br>
            <button type="submit" name="login_company" class="btn btn-lg btn-success btn-block">เข้าสู่ระบบ</button>
            <br><br>
            <p>ยังไม่ได้ลงทะเบียน <a href="signup-company.php">ลงทะเบียน</a></p>

        </form>
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
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>