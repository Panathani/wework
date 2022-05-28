<?php 
    error_reporting(0);
    include('login-company_db.php');
    include('signup-company_db.php');
    
    if (isset($_SESSION['comName'])) {
        $sql = "SELECT c.com_name, p.position, s.compo_id, s.type, s.salary, s.start, s.end
                From position p
                INNER JOIN company_position s
                ON s.position_id= p.position_id
                INNER JOIN company c
                ON c.company_id = s.company_id
                WHERE c.com_name = '" . $_SESSION['comName'] . "'";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT c.com_name, p.position, s.compo_id, s.type, s.salary, s.start, s.end
                From position p
                INNER JOIN company_position s
                ON s.position_id= p.position_id
                INNER JOIN company c
                ON c.company_id = s.company_id
                WHERE c.com_name = '" . $_SESSION['companyName'] . "'";
        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตำแหน่งงานทั้งหมด · WeWork</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
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
                        <a class="nav-link active" href="company-position.php">งานทั้งหมด</a>
                    </li>
                    <li class="nav-item">
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

    <br><br>
    <h1 class="text-center">ตำแหน่งงานทั้งหมด</h1><br>

    <div class="container-xl">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>ตำแหน่งที่เปิดรับ</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input id="myInput" onkeyup="searchTable()" type="text" class="form-control"
                                placeholder="ค้นหา&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="scrollable">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="30%">ตำแหน่ง</th>
                            <th width="14%">ประเภท</th>
                            <th width="14%">เงินเดือน</th>
                            <th width="14%">วันเริ่มการประกาศ</th>
                            <th width="14%">วันสิ้นสุดการประกาศ</th>
                            <th width="14%">Actions</th>

                        </tr>
                    </thead>
                    <tbody id="table_body">

                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <?php echo $row['position']; ?>
                            </td>
                            <td>
                                <?php echo $row['type']; ?>
                            </td>
                            <td>
                                <?php echo $row['salary']; ?>
                            </td>
                            <td>
                                <?php echo $row['start']; ?>
                            </td>
                            <td>
                                <?php echo $row['end']; ?>
                            </td>
                            <td>
                                <a href="update-compo.php?compo_id=<?php echo $row['compo_id']?>" class="edit">
                                    <i class="material-icons" title="Edit">&#xE254;</i></a>
                                <a href="company-apppo.php?compo_id=<?php echo $row['compo_id']?>" class="view">
                                    <i class="material-icons" title="View Applicant">&#xE417;</i></a>
                                <a href="delete-compo.php?compo_id=<?php echo $row['compo_id']?>" class="delete"
                                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">
                                    <i class="material-icons" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="text-center">
                <a href="company-addposition.php" class="btn btn-primary me-4">เพิ่มตำแหน่ง</a>
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

<script>
    function searchTable() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_body");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>


</html>