-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2022 at 12:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wework_pj`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `applicant`
-- (See below for the actual view)
--
CREATE TABLE `applicant` (
`j_name` varchar(45)
,`j_last` varchar(45)
,`email` varchar(45)
,`phone` varchar(10)
,`jobpo_id` int(11)
,`reg_date` date
,`resume` varchar(200)
,`position` varchar(45)
,`company_id` int(11)
,`compo_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `com_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `com_password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `com_type` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `img` varchar(200) DEFAULT 'noprofil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `com_name`, `email`, `com_password`, `firstname`, `lastname`, `phone`, `com_type`, `location`, `img`) VALUES
(1, 'PanaMa Insurance', 'PanaMa_hr@gmail.com', 'c059955f96474f6445b94247838c8c08', 'ภณฐานีย์', 'วงศ์พึ่งไชย', '0815951690', 'Large', 'กรุงเทพมหานคร', '1653668575-PanaMa Insurance.png'),
(2, 'Preme Viewer', 'PremeViewer_hr@gmail.com', 'c059955f96474f6445b94247838c8c08', 'ภูพลอย ', 'ทูลคำเตย', '0846118690', 'Small-Medium', 'เชียงใหม่', '1653669720-Preme Viewer Company.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_position`
--

CREATE TABLE `company_position` (
  `compo_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `detail` varchar(550) NOT NULL,
  `quali` varchar(500) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_position`
--

INSERT INTO `company_position` (`compo_id`, `company_id`, `position_id`, `detail`, `quali`, `salary`, `type`, `start`, `end`) VALUES
(1, 1, 2, '1. ออกแบบ สร้าง และพัฒนาระบบ Android Application ตามที่ได้รับมอบหมาย สามารถแก้ไขต่อยอดและปรับปรุงระบบให้มีประสิทธิภาพสูงสุดตรงกับแผนพัฒนาและความต้องการของธุรกิจ\r\n2. รับผิดชอบพัฒนาแอปพลิเคชั่น Android ด้วยภาษา Kotlin, Flutter หรือ ภาษา Java\r\n3. ปฏิบัติงานอื่นๆ ตามที่ได้รับมอบหมาย', '1. วุฒิการศึกษา ปริญญาตรีหรือสูงกว่า สาขาวิทยาการคอมพิวเตอร์ วิศวกรรมคอมพิวเตอร์ วิศวกรรมซอฟต์แวร์ เทคโนโลยีสารสนเทศ หรือสาขาที่เกี่ยวข้อง\r\n2. มีประสบการณ์ด้านการพัฒนา Android Application, ด้านการพัฒนา Android ด้วยภาษา Kotlin และ Java\r\nตั้งแต่ 1 ปีขึ้นไป\r\n3. สามารถเขียนภาษา Kotlin ได้\r\n4. เอกสาร : resume', 70000, 'พนักงานประจำ', '2022-05-10', '2022-07-28'),
(2, 1, 11, '- ติดตั้งระบบคอมพิวเตอร์ให้แก่ผู้ใช้งาน  \r\n- ติดตั้งระบบ Network\r\n- ดูแล แก้ไขปัญหาระบบคอมพิวเตอร์ต่างๆเพื่อให้พร้อมใช้งานอยู่เสมอ\r\n- หน้าที่อื่นที่ได้รับมอบหมาย', '- วุฒิการศึกษาระดับ  ปวส.  ปริญญาตรี  สาขาคอมพิวเตอร์ ไฟฟ้าอิเล็กทรอนิกส์ หรือสาขาที่เกี่ยวข้อง\r\n- เพศชาย\r\n- มีความรู้พื้นฐานในการติดตั้ง Software หรือ Hardware\r\n- มีความรู้พื้นฐานในการใช้เครื่องมือช่าง และระบบไฟฟ้า\r\n- มีทัศนคติที่ดีต่องาน และองค์กร\r\n- มีความขยัน ซื่อสัตย์ อดทน\r\n- มีใจรักในการให้บริการ\r\n- เอกสาร : resume', 30000, 'พนักงานประจำ', '2022-05-25', '2022-07-25'),
(3, 1, 11, '- ติดตั้งระบบคอมพิวเตอร์ให้แก่ผู้ใช้งาน  \r\n- ติดตั้งระบบ Network\r\n- ดูแล แก้ไขปัญหาระบบคอมพิวเตอร์ต่างๆเพื่อให้พร้อมใช้งานอยู่เสมอ\r\n- หน้าที่อื่นที่ได้รับมอบหมาย', '- วุฒิการศึกษาระดับ  ปวส.  ปริญญาตรี  สาขาคอมพิวเตอร์ ไฟฟ้าอิเล็กทรอนิกส์ หรือสาขาที่เกี่ยวข้อง\r\n- เพศชาย\r\n- มีความรู้พื้นฐานในการติดตั้ง Software หรือ Hardware\r\n- มีความรู้พื้นฐานในการใช้เครื่องมือช่าง และระบบไฟฟ้า\r\n- มีทัศนคติที่ดีต่องาน และองค์กร\r\n- มีความขยัน ซื่อสัตย์ อดทน\r\n- มีใจรักในการให้บริการ\r\n- สามารถปฏิบัติงานล่วงเวลาได้ตามที่องค์กรกำหนด\r\n- สามารถทำงานวันหยุดเสาร์ อาทิตย์ได้', 15000, 'พนักงาน Part-Time', '2022-05-25', '2022-07-25'),
(4, 1, 5, '-วิเคราะห์ข้อมูล (Data Analysis) รวบรวม บันทึก อีกทั้งวิเคราะห์ข้อมูลทั้งข้อมูลเชิงปริมาณและข้อมูลเชิงคุณภาพ\r\n-วิเคราะห์ข้อมูลลูกค้าจากฐานข้อมูลทั้งภายในและภายนอกเพื่อทำความเข้าใจพฤติกรรมของลูกค้า เพื่อสร้างโอกาสในการทำกำไรสูงสุด\r\n-วิเคราะห์ข้อมูลลูกค้าหรือช่องทางจากฐานข้อมูลของลูกค้าเพื่อใช้ในการกำหนดกลยุทธ์\r\n-ดึงข้อมูลจากระบบต่างๆ เพื่อจัดทำ Report สรุปผลและรายงานปัญหาต่างๆที่เกิดขึ้นในการทำงานเพื่อปรับปรุงแก้ไข\r\n-จัดเตรียมพร้อมทั้งรวบรวมข้อมูลและนำเสนอข้อมูลการวิเคราะห์ให้กับผู้เกี่ยวข้อง\r\n-ทำงานให้สำเร็จลุล่วงตามเวลาที่กำหนด', '-เพศ ชาย / หญิง อายุไม่เกิน 25-35 ปี\r\n-วุฒิปริญญาตรี วิทยาศาสตร์ คอมพิวเตอร์\r\n-ประสบการณ์ด้านการเขียน/พัฒนาโปรแกรมและการวิเคราะห์ข้อมูล 1-2 ปี\r\n-เชี่ยวชาญและคุ้นเคยกับภาษาของ Microsoft อย่าง ภาษา .Net และภาษาอื่นๆ\r\n-เข้าใจในระบบการเขียนโปรแกรมเป็นอย่างดี\r\n-มีประวัติการเขียนและพัฒนาโปรแกรมต่างๆ\r\n-มีความสามารถในการ คิด วิเคราะห์ แยกแยะ ที่ดี\r\n-เอกสาร : resume', 120000, 'พนักงานประจำ', '2022-05-25', '2022-07-25'),
(5, 1, 10, '- พัฒนาเว็บแอปพลิเคชั่นด้วย PHP, MySQL, HTML5, CSS3, Ajax และ Javascript\r\n- พัฒนาโปรแกรมประยุกต์บนเว็บที่โต้ตอบกับระบบ back-end (APIs)\r\n- วิเคราะห์ระบบเพื่อหาวิธีแก้ปัญหาและทดสอบเว็บแอปพลิเคชั่น\r\n- สรุป Web Performance และ วิเคราะห์ ประสิทธิภาพเว็ปไซต์แต่ละหน้า landing page\r\n- บำรุงรักษาและอัพเดตข้อมูลระบบการออกแบบเว็บไซต์บนแพลตฟอร์มแอปพลิเคชั่น (Web Develop)\r\n- ออกแบบและพัฒนา Application (IOS/Android)\r\n- ดูแลระบบเทคโนโลยีสารสนเทศด้านเทคนิค', '- มีความรู้และประสบการณ์พัฒนาเว็บด้วย CSS, PHP, MySQL, Javascript, Jquery, Ajax\r\n- สามารถออกแบบ Database ได้ดี\r\n- ศึกษาระดับปริญญาตรี สาขาวิศวกรรมคอมพิวเตอร์, วิทยาการคอมพิวเตอร์ หรือสาขาอื่นที่เกี่ยวข้อง\r\n- เอกสาร : resume', 12000, 'ฝึกงาน', '2022-05-25', '2022-07-25'),
(6, 2, 2, '-วางแผน และดำเนินการพัฒนา Android แอพลิเคชั่น\r\n-พัฒนาและแก้ไข UI/UX ใส่ features ต่างๆ เพื่อให้สวยงามและเหมาะสมกับการใช้งานของผู้ใช้\r\n-วิเคราะห์ผลลัพธ์หลังจากที่เปิดให้บริการและแก้ไขปรับปรุงให้ได้ประสิทธิภาพมากยิ่งขึ้น แล้วแก้ไขข้อผิดพลาด และปัญหาต่างๆที่เจอในระหว่างการพัฒนาประสานงาน \r\n-ทำงานร่วมกันเป็นทีม', '- สามารถพัฒนา Android ด้วยภาษา Java ได้\r\n- เคยใช้งานหรือคุ้นเคยกับ github หรือ bitbucket\r\n- เคยทำการเชื่อมต่อ server ได้ทั้งแบบ RESTful API หรือใช้ MQTT protocol จะได้รับการพิจารณาเป็นพิเศษ\r\n- เคยเขียน sqlite database จะพิจารณาเป็นพิเศษ\r\n- มีความเข้าใจใน kotlin language และ flutter framework ได้ จะพิจารณาเป็นพิเศษ\r\n- พัฒนา Application เชื่อมต่อข้อมูลกับ Server\r\n- ค้นหาและพัฒนาทดลอง Feature ใหม่ๆ ตามความต้องการ\r\n- ดูแลและแก้ไข Application หลักและพัฒนาเพิ่มเติม\r\n- งานอื่นๆที่ได้รับมอบหมาย', 25000, 'พนักงาน Part-Time', '2022-05-16', '2022-08-16'),
(7, 2, 11, '๑) ดูแลและแก้ปัญหาการใช้ระบบ Hardware & Software ของเครื่องคอมพิวเตอร์\r\n๒) ติดตั้ง ตรวจสอบ และจัดซ่อมเครื่องคอมพิวเตอร์ เครื่องพิมพ์ เครื่องสำรองไฟฟ้า อุปกรณ์เครือข่าย และอุปกรณ์ต่อพ่วงให้กับหน่วยงานต่างๆ\r\n๓) ดูแล ตรวจสอบ และแก้ไขปัญหาการสำรองและกู้คืนข้อมูล ระบบการพิมพ์งานผ่านเครือข่าย ระบบควบคุมโปรแกรมป้องกันไวรัส ระบบเครือข่ายเบื้องต้น และระบบให้บริการอินเทอร์เน็ตกลาง\r\n๔) จัดหา หรือพัฒนาระบบสำหรับใช้งานในสำนักงาน\r\n๕) สร้าง-ดูแล Website และสื่อ Online ต่างๆ ของหอจดหมายเหตุ\r\n๖) พัฒนาระบบฐานข้อมูลจดหมายเหตุ', '- วุฒิการศึกษา: ปริญญาตรีขึ้นไป สาขาวิศวกรรมคอมพิวเตอร์ วิทยาการณ์คอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\r\n- ประสบการณ์การทำงาน: มีประสบการณ์ ๓ ปีขึ้นไปมีความเข้าใจและสามารถใช้ PHP, MySQL, JavaScript, CSS, HTML (ถ้าใช้ XML หรือ AJAX ได้จะได้รับการพิจาณาเป็นพิเศษ)\r\n- มีความรู้ด้านระบบคอมพิวเตอร์และเครือข่าย\r\n- มีความรับผิดชอบสูง พร้อมเรียนรู้สิ่งใหม่ๆ\r\n- มีความคิดริเริ่มสร้างสรรค์ ความรับผิดชอบ กระตือรือร้น และสามารถทำงานร่วมกับผู้อื่นได้อย่างมีประสิทธิภาพ\r\n- เอกสาร : resume', 55000, 'พนักงานประจำ', '2022-05-16', '2022-08-16'),
(8, 2, 9, '- รับแจ้งเหตุการณ์ภัยคุกคามด้านความมั่นคงปลอดภัยไซเบอร์ (incident report) ทำการสอบสวนเหตุการณ์และการแจ้งเตือนที่ได้รับ\r\n- วิเคราะห์ และระบุระดับภัยคุกคาม (threat level) ลำดับเหตุการณ์ของการโจมตีที่ได้รับแจ้ง (sequence of attack)\r\n- ตรวจสอบความถูกต้องด้วยขั้นตอนและกระบวนการที่เหมาะสมกับเหตุการณ์ และภายในระยะเวลาที่กำหนด (SLA)\r\n- รวบรวม จัดเก็บ วิเคราะห์ หลักฐานทางดิจิทัล (Digital evidence) ทั้งทางระบบเครือข่าย (network) และ เครื่องคอมพิวเตอร์ (end-point) ', '- ปริญญาตรี/โท ในสาขาเทคโนโลยีสารสนเทศ คอมพิวเตอร์ธุรกิจ วิศวกรรมคอมพิวเตอร์ วิทยาศาสตร์คอมพิวเตอร์ วิทยาศาสตร์และเทคโนโลยี\r\n- ประสบการณ์ 3-5 ปี ในการปฏิบัติงานในตำแหน่ง Security Engineer/Security Analyst/ Digital Forensic หรือ Cyber Threat Intelligence\r\n- มีประกาศนียบัตรด้านความมั่นคงปลอดภัยไซเบอร์อย่างน้อย 1 ฉบับ อาทิ GCTI, CCTIA, CySA+, CFCE, CSFA, CCFE ฯลฯ', 60000, 'พนักงานประจำ', '2022-05-16', '2022-08-16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `findwork`
-- (See below for the actual view)
--
CREATE TABLE `findwork` (
`position_id` int(11)
,`company_id` int(11)
,`compo_id` int(11)
,`detail` varchar(550)
,`quali` varchar(500)
,`salary` int(11)
,`type` varchar(50)
,`start` date
,`end` date
,`com_name` varchar(45)
,`email` varchar(45)
,`com_password` varchar(45)
,`firstname` varchar(45)
,`lastname` varchar(45)
,`phone` varchar(10)
,`com_type` varchar(45)
,`location` varchar(45)
,`img` varchar(200)
,`position` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `jobber`
--

CREATE TABLE `jobber` (
  `jobber_id` int(11) NOT NULL,
  `j_name` varchar(45) NOT NULL,
  `j_last` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `j_password` varchar(45) NOT NULL,
  `uni` varchar(45) NOT NULL,
  `major` varchar(45) NOT NULL,
  `gpax` double NOT NULL,
  `work_exp` varchar(555) DEFAULT NULL,
  `img` varchar(200) DEFAULT 'noprofil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobber`
--

INSERT INTO `jobber` (`jobber_id`, `j_name`, `j_last`, `phone`, `email`, `j_password`, `uni`, `major`, `gpax`, `work_exp`, `img`) VALUES
(1, 'มธุริน', 'วงศ์วิเศษ', '0807778303', 'mathurin@gmail.com', 'c059955f96474f6445b94247838c8c08', 'CU', 'สถิติ', 4, '-', '1653722511-IMG_1858.JPG'),
(2, 'วรชิสา', 'เลิศธัญธนา', '0812345678', 'gift@gmail.com', 'c059955f96474f6445b94247838c8c08', 'CU', 'เทคโนโลยีสารสนเทศ', 4, '-', 'noprofil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position`) VALUES
(1, 'iOS Developer'),
(2, 'Andriod Developer'),
(3, 'Backend/Frontend Developer'),
(4, 'Data Analyst/Data Scientist'),
(5, 'Database Administration'),
(6, 'System Analyst'),
(7, 'Software Engineer'),
(8, 'UX/UI Designer'),
(9, 'Cyber Security'),
(10, 'Programmer'),
(11, 'IT support'),
(12, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `position_jobber`
--

CREATE TABLE `position_jobber` (
  `jobpo_id` int(11) NOT NULL,
  `compo_id` int(11) NOT NULL,
  `jobber_id` int(11) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `resume` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_jobber`
--

INSERT INTO `position_jobber` (`jobpo_id`, `compo_id`, `jobber_id`, `reg_date`, `resume`) VALUES
(1, 5, 1, '2022-05-28', '1653675306-cert-1014-25160994.pdf'),
(2, 3, 1, '2022-05-28', '1653675358-cert-1059-25160994.pdf'),
(3, 8, 2, '2022-05-28', '1653675583-cert-1059-25160994.pdf'),
(4, 7, 2, '2022-05-28', '1653675729-cert-1014-25160994.pdf'),
(5, 4, 1, '2022-05-28', '1653710452-cert-1014-25160994.pdf'),
(6, 2, 2, '2022-05-28', '1653722147-cert-1014-25160994.pdf'),
(7, 3, 2, '2022-05-28', '1653731639-cert-1014-25160994.pdf');

-- --------------------------------------------------------

--
-- Structure for view `applicant`
--
DROP TABLE IF EXISTS `applicant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicant`  AS SELECT `j`.`j_name` AS `j_name`, `j`.`j_last` AS `j_last`, `j`.`email` AS `email`, `j`.`phone` AS `phone`, `pj`.`jobpo_id` AS `jobpo_id`, `pj`.`reg_date` AS `reg_date`, `pj`.`resume` AS `resume`, `p`.`position` AS `position`, `cp`.`company_id` AS `company_id`, `cp`.`compo_id` AS `compo_id` FROM (((`position_jobber` `pj` join `jobber` `j` on(`j`.`jobber_id` = `pj`.`jobber_id`)) join `company_position` `cp` on(`cp`.`compo_id` = `pj`.`compo_id`)) join `position` `p` on(`p`.`position_id` = `cp`.`position_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `findwork`
--
DROP TABLE IF EXISTS `findwork`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `findwork`  AS SELECT `company_position`.`position_id` AS `position_id`, `company_position`.`company_id` AS `company_id`, `company_position`.`compo_id` AS `compo_id`, `company_position`.`detail` AS `detail`, `company_position`.`quali` AS `quali`, `company_position`.`salary` AS `salary`, `company_position`.`type` AS `type`, `company_position`.`start` AS `start`, `company_position`.`end` AS `end`, `company`.`com_name` AS `com_name`, `company`.`email` AS `email`, `company`.`com_password` AS `com_password`, `company`.`firstname` AS `firstname`, `company`.`lastname` AS `lastname`, `company`.`phone` AS `phone`, `company`.`com_type` AS `com_type`, `company`.`location` AS `location`, `company`.`img` AS `img`, `position`.`position` AS `position` FROM ((`company_position` join `company` on(`company_position`.`company_id` = `company`.`company_id`)) join `position` on(`company_position`.`position_id` = `position`.`position_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_id` (`company_id`),
  ADD UNIQUE KEY `email` (`company_id`);

--
-- Indexes for table `company_position`
--
ALTER TABLE `company_position`
  ADD PRIMARY KEY (`compo_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `jobber`
--
ALTER TABLE `jobber`
  ADD PRIMARY KEY (`jobber_id`),
  ADD UNIQUE KEY `jobber_id` (`jobber_id`),
  ADD UNIQUE KEY `email` (`jobber_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `postion_id` (`position_id`);

--
-- Indexes for table `position_jobber`
--
ALTER TABLE `position_jobber`
  ADD PRIMARY KEY (`jobpo_id`),
  ADD KEY `jobber_id` (`jobber_id`),
  ADD KEY `combo_id` (`compo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_position`
--
ALTER TABLE `company_position`
  MODIFY `compo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobber`
--
ALTER TABLE `jobber`
  MODIFY `jobber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `position_jobber`
--
ALTER TABLE `position_jobber`
  MODIFY `jobpo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_position`
--
ALTER TABLE `company_position`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`);

--
-- Constraints for table `position_jobber`
--
ALTER TABLE `position_jobber`
  ADD CONSTRAINT `combo_id` FOREIGN KEY (`compo_id`) REFERENCES `company_position` (`compo_id`),
  ADD CONSTRAINT `jobber_id` FOREIGN KEY (`jobber_id`) REFERENCES `jobber` (`jobber_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
