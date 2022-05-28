<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนผู้หางาน · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light-green rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src="img/Logo.png" alt="" width="35" height="35"
                    class="d-inline-block align-middle ms-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">หน้าหลัก</a>
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

    <!--register-->
    <div class="container px-5">
        <h1 class="top center"><br>ลงทะเบียนสำหรับผู้หางาน</h1>
        <br>
        <br>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <form action="signup-user_db.php" method="post">
                    <?php include('errors.php'); ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                        </h3>
                    </div>
                    <?php endif ?>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="username">ชื่อจริง<span class="text-muted"></span></label>
                            <input class="form-control" type="text" name="username" placeholder="ภาษาไทย">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="lastname">นามสกุล<span class="text-muted"></span></label>
                            <input class="form-control" type="text" name="lastname" placeholder="ภาษาไทย">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="email">ที่อยู่อีเมล์<span class="text-muted"></span></label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="phoneNumber">เบอร์โทรศัพท์<span
                                    class="text-muted"></span></label>
                            <input class="form-control" type="tel" name="phoneNumber" placeholder="เช่น 08xxxx-xxxx"
                                pattern=[0][0-9]{9}>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="password_1">รหัสผ่าน<span class="text-muted"></span></label>
                            <input class="form-control" type="password" name="password_1" placeholder="อย่างน้อย 8 ตัว"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="ต้องมีรหัสอย่างน้อย 8 ตัว ประกอบไปด้วย ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก และตัวเลข">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="password_2">ยืนยันรหัสผ่าน<span
                                    class="text-muted"></span></label>
                            <input class="form-control" type="password" name="password_2" placeholder="อย่างน้อย 8 ตัว"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="ต้องมีรหัสอย่างน้อย 8 ตัว ประกอบไปด้วย ตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก และตัวเลข">
                        </div>

                        <hr class="my-4">
                        <div class="col-sm-6">
                            <label class="form-label" for="University">มหาวิทยาลัย<span
                                    class="text-muted"></span></label>
                            <select class="form-select" name="University">
                                <option value="" selected="selected" hidden="hidden">เลือกมหาวิทยาลัย</option>
                                <option value="MU">มหาวิทยาลัยมหิดล</option>
                                <option value="CU">จุฬาลงกรณ์มหาวิทยาลัย</option>
                                <option value="CMU">มหาวิทยาลัยเชียงใหม่</option>
                                <option value="KMUTT">มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</option>
                                <option value="KMITL">สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</option>
                                <option value="KMUTNB">มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>
                                <option value="TU">มหาวิทยาลัยธรรมศาสตร์</option>
                                <option value="RU">มหาวิทยาลัยรามคำแหง</option>
                                <option value="SU">มหาวิทยาลัยศิลปากร</option>
                                <option value="KU">มหาวิทยาลัยเกษตรศาสตร์</option>
                                <option value="SWU">มหาวิทยาลัยศรีนครินทรวิโรฒ</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="Major">ภาควิชา<span class="text-muted"></span></label>
                            <input class="form-control" type="text" name="Major" placeholder="ภาษาไทย">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="GPAX">คะแนนเฉลี่ย<span class="text-muted"></span></label>
                            <input class="form-control" type="number" min="0" max="4" step="0.01" name="GPAX"
                                placeholder="เช่น 4.00">
                        </div>
                        <div class="form-group">
                            <label for="workExperience">ประสบการณ์การทำงาน</label>
                            <textarea class="form-control" name="workExperience" placeholder="ถ้าไม่มี ให้ใส่ -"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <br>
                    <hr class="my-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="save-info" required>
                        <label class="form-check-label"
                            for="save-info">ฉันยินยอมให้ดำเนินการกับข้อมูลส่วนบุคคลที่ฉันได้ให้ไว้กับข้อบังคับการปกป้องข้อมูลในคำชี้แจงสิทธิ์ส่วนบุคคลของข้อมูล</label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="save-info" required>
                        <label class="form-check-label"
                            for="save-info">ฉันยินยอมให้ดำเนินการตามข้อตกลงตามเงื่อนไขของสมาชิกทั้งหมด</label>
                    </div>
                    <hr class="my-4">
                    <button type="submit" name="reg_user" class="w-100 btn btn-success btn-lg">ลงทะเบียน</button>
                    <p>เคยลงทะเบียนแล้ว <a href="login-user.php">เข้าสู่ระบบ</a></p>
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
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
