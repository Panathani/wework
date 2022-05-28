<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มตำแหน่งงาน · WeWork</title>
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
                        <h3 class="text-center">แบบฟอร์มเพิ่มตำแหน่งงาน</h3>
                        <form action="insert.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-form-label" for="position">ตำแหน่งงาน<span
                                            class="text-muted required">*</span></label>
                                    <select class="form-select" name="position">
                                        <option value="" selected="selected" hidden="hidden">เลือกตำแหน่งงาน
                                        </option>
                                        <option value="1">iOS Developer</option>
                                        <option value="2">Andriod Developer</option>
                                        <option value="3">Backend/Frontend Developer</option>
                                        <option value="4">Data Analyst/Data Scientist</option>
                                        <option value="5">Database Administration</option>
                                        <option value="6">System Analyst</option>
                                        <option value="7">Software Engineer</option>
                                        <option value="8">UX/UI Designer</option>
                                        <option value="9">Cyber Security</option>
                                        <option value="10">Programmer</option>
                                        <option value="11">IT support</option>
                                        <option value="12">Others</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-8">
                                    <div class="item">
                                        <label class="col-form-label" for="detail">รายละเอียดงาน<span
                                                class="text-muted required">*</span></label>
                                        <textarea class="form-control" rows="5" placeholder="Position Details"
                                            name="detail" required></textarea>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="question">
                                        <label class="col-form-label" for="type">ประเภทงาน<span
                                                class="text-muted required">*</span></label>
                                        <div class="question-answer">
                                            <label><input type="radio" value="พนักงานประจำ" name="type" required />
                                                <span>พนักงานประจำ</span></label><br>
                                            <label><input type="radio" value="พนักงาน Part-Time" name="type" required />
                                                <span>พนักงาน Part-Time</span></label><br>
                                            <label><input type="radio" value="ฝึกงาน" name="type" required />
                                                <span>ฝึกงาน</span></label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="item">
                                <p><br>คุณสมบัติและเอกสาร<span>*</span></p>
                                <textarea class="form-control" rows="5" placeholder="Qualification and Documents"
                                    name="qualification" required></textarea>
                            </div>


                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>เงินเดือน<span>*</span></p>
                                        <div class="name-item">
                                            <input type="text" name="salary" placeholder="First" required />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>วันเริ่มการประกาศ<span class="required">*</span></p>
                                        <div class="name-item">
                                            <input type="date" id="start" name="start">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <p><br>วันสิ้นสุดการประกาศ<span class="required">*</span></p>
                                        <div class="name-item">
                                            <input type="date" id="end" name="end">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-5 form-group text-center">
                                    <button type="submit" class="btn btn-primary me-4"
                                        value="Submit">เพิ่มตำแหน่ง</button>
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