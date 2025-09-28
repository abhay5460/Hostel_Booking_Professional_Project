-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 05:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `stu_id` int(5) NOT NULL,
  `hostel_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback`, `stu_id`, `hostel_id`) VALUES
(3, 'We really enjoyed our stay. Staff great facilities were also great.', 1, 2),
(92, 'Hostels services are too good,and the food is ossm', 23, 1),
(116, 'Hostel is good,but food quality is not so impressi e.', 42, 10),
(117, 'My hostel is good in terms of qualtiy of food and \r\nservices.', 57, 2),
(118, 'why this is odd all the time', 57, 2),
(119, 'my hostel is very good yet some issues are there about that i can not tell you now but may be in future please refer out this notice from a student side,thank you', 61, 2),
(120, 'this is the best hostel ever i have seen.', 61, 38),
(121, 'feel very ambitious while i join my hostel and do this for everybody so out hostel is good and also very impressive also i am thinking about my life decisions so that help me to choose this hostel for stay , so thank you guys for making my day with full o', 58, 14),
(122, 'feel very ambitious while i join my hostel and do this for everybody so out hostel is good and also very impressive also i am thinking about my life decisions so that help me to choose this hostel for stay , so thank you guys for making my day with full o', 0, 0),
(123, 'jamna ke paar kuch hai', 52, 45),
(124, 'hello ji', 53, 38);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(3) NOT NULL,
  `hostel_name` varchar(70) NOT NULL,
  `hostel_description` varchar(200) NOT NULL,
  `hostel_type` varchar(7) NOT NULL,
  `hostel_fees` varchar(30) NOT NULL,
  `hostel_address` varchar(80) NOT NULL,
  `hostel_photo_id` varchar(100) NOT NULL,
  `hostel_photo_path` varchar(250) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hostelowner_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hostel_name`, `hostel_description`, `hostel_type`, `hostel_fees`, `hostel_address`, `hostel_photo_id`, `hostel_photo_path`, `city`, `hostelowner_id`) VALUES
(1, 'Samras Boy\'s Hostel', 'Our hostel contains all of the facilities \r\nwith reasonable prices,so come and see the show..', 'boys', '18000', 'Block No. - 4/1, Dr. Jivraj Mahta Bhavan, Gandhinagar', '', 'Imges/Hostel.jpg', 'Gandhinagar', 1),
(2, 'Shri Ganesh boys hostel', 'our goal is to provide good service to students and other ones.', 'boys', '16000', ' 4GPG+PR7, Shiv Shakti Nagar, D Colony, Ahmedabad, Khodiyar, Gujarat 380060', '', 'Imges/group-of-women-walk-past-a-hostel-at-sunset-istanbul-turkey.jpg', 'Ahmedabad', 2),
(10, 'Arya Dormitory Hostel', ' Natural History Museum of Los Angeles County is 3.2 km from the hostel, while California Science Center is 4.3 km away. The nearest airport is Los Angeles International Airport, 20 km from PRIVATE RO', 'Nonac', '12000', 'Bus Station, Opp. Rathyatra office, Chavdigate Near Central, Bhavnagar, Gujarat ', '', 'Imges/the-hostel.jpg', 'Bhavnagar', 3),
(12, 'Shivam hostel, Boys Hostel', ' Natural History Museum of Los Angeles County is 3.2 km from the hostel, while California Science Center is 4.3 km away. The nearest airport is Los Angeles International Airport, 20 km from PRIVATE RO', 'Ac', '20000', 'Near New Parimal School, Kalawad Rd, opposite Atmiya Collage, Rajkot, Gujarat 36', '', 'Imges/sign-on-wall-hostel-260nw-353314664.jpg', 'ahmedabad', 5),
(13, 'chirutha hostel', ' f;kjaf;sf', 'general', '45000', 'chandlodia,chankpur', '', 'Imges/street-view-at-rudesheim-germany.jpg', 'Chandkheda', 19),
(14, 'Shri Venkateshwaraya Anjanandre hostel', ' Our hostel aim ', 'general', '325325', 'vankar dham ghatlodia', '', 'imges/401062021012106108.jpg', 'Gandhinagar', 20),
(22, 'shubha hostel', ' our aim is to give a service with reasonable price', 'general', '50000', 'Income tax,area vadaj', '', 'imges/johns-hopkins-university-gilman-hall-school-universities.jpg', 'Ahmedabad', 28),
(38, 'Sudha Kongra  Hostel', 'Your will have no complain in our services for sure...', 'general', '36000', 'karnavati club sj highway', '', 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/johns-hopkins-university-gilman-hall-school-universities.jpg\r\n', 'Ahmedabad', 45),
(45, 'jamnadas hostel', ' To provide a service with reasonable price', 'general', '16000', 'veteran road,m.j mall', '', 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/modern-youth-hostel-building-accommodation-for-travellers-building-exterior-2GNCB96.jpg', 'surat', 52);

-- --------------------------------------------------------

--
-- Table structure for table `hostelowner`
--

CREATE TABLE `hostelowner` (
  `hostelowner_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_password` varchar(100) NOT NULL,
  `owner_mobileno` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostelowner`
--

INSERT INTO `hostelowner` (`hostelowner_id`, `owner_name`, `owner_email`, `owner_password`, `owner_mobileno`) VALUES
(1, 'AryaShankar Prabhu Brahmbhatt', 'AryaDormitoryHotel@gmail.com', 'AryaHostel#12345', 235454545),
(2, 'ShivamKumar mishra', 'ShivamhostelBoyHostel@gmail.com', 'shivam$345', 123456789),
(3, 'mr.motikrut bishnoi ', 'SAANSKAR@gmail.com', 'saanskar@321', 345678901),
(5, 'H.d parmar pandya ', 'ak1257899@gmail.com', 'akshri@234', 122345675),
(19, 'meet sapariya', 'meetu@gmail.com', 'meetu@123', 645646644),
(20, 'Shree Anjanandre Shivam', 'kear@123gmail.com', 'Hanuman#2321', 645646464),
(23, 'krishnakanat mahadev', 'krishna@gmail.com', 'krish$213243', 2147483647),
(28, 'kumar & sons', 'kumar@12345', 'kumar&321456', 45678934),
(41, 'jay prajapati', 'jay32@gmail.com', 'jenz#2321', 2147483647),
(45, 'shree venkat prabhu', 'venkat@gmail.com', 'venki#45', 2147483647),
(52, 'mahedra panchal ', 'jamnadas1334@gmail.com', 'Jamna@95', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_img`
--

CREATE TABLE `hostel_img` (
  `img_id` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `Hostel_cover` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_img`
--

INSERT INTO `hostel_img` (`img_id`, `hostel_id`, `Hostel_cover`) VALUES
(1, 1, 'img/Hostel.jpg'),
(2, 2, 'Img/group-of-women-walk-past-a-hostel-at-sunset-istanbul-turkey.jpg'),
(3, 12, 'Img/sign-on-wall-hostel-260nw-353314664.jpg'),
(5, 10, 'Img/the-hostel.jpg'),
(6, 13, 'Img/modern-youth-hostel-building-accommodation-for-travellers-building-exterior-2GNCB96.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(3) NOT NULL,
  `hostel_id` int(3) NOT NULL,
  `hostel_img` varchar(250) NOT NULL,
  `food` varchar(250) NOT NULL,
  `parking` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `hostel_id`, `hostel_img`, `food`, `parking`) VALUES
(1, 1, 'Imges/Hostel.jpg', 'Imges/Food.jpg', 'imges/Parking2.jpg'),
(2, 2, 'Imges/h1.png', 'Imges/Food2.jpg', 'Imges/egor-myznik-rCZQCbUAQvg-unsplash.jpg'),
(3, 10, 'Imges/sreesanth-p-NHVI1dkl6WU-unsplash.jpg', 'Imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'Imges/parking.jpg'),
(4, 12, 'Imges/h3.jpeg', 'imges/f3.jpeg', 'imges/parking1.jpg'),
(5, 1, 'Imges/Rooms.jpg', 'imges/Food1.jpg', 'imges/Parking3.jpg'),
(10, 12, 'Imges/moksha-jain-PoSPwUpv9IY-unsplash.jpg', 'imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'imges/egor-myznik-rCZQCbUAQvg-unsplash.jpg'),
(16, 2, 'Imges/Room.jpg', 'Imges/f2.jpeg\r\n', 'Imges/parking1.jpg\r\n'),
(17, 10, 'Imges/street-view-at-rudesheim-germany.jpg', 'Imges/f2.jpeg', 'Imges/mak-flex-MVGeKI3wZXw-unsplash.jpg'),
(22, 22, 'Imges/desktop-wallpaper-the-hostel-emmanuel-colleg...', 'imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'imges/mak-flex-MVGeKI3wZXw-unsplash.jpg'),
(23, 14, 'Imges/401062021012106108.jpg', 'Imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'Imges/egor-myznik-rCZQCbUAQvg-unsplash.jpg'),
(24, 14, 'Imges/hostel-dormitory-beds-at-cheap-room.webp', 'Imges/f1.jpg', 'Imges/mak-flex-MVGeKI3wZXw-unsplash.jpg'),
(25, 13, 'Imges/DSC01282-scaled.jpg', 'Imges/f1.jpg', 'Imges/egor-myznik-rCZQCbUAQvg-unsplash.jpg'),
(26, 13, 'Imges/sreesanth-p-NHVI1dkl6WU-unsplash.jpg', 'Imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'Imges/parking.jpg'),
(27, 22, 'Imges/401062021012106108.jpg', 'Imges/f3.jpeg', 'Imges/Parking2.jpg'),
(44, 38, 'Imges/h3.jpeg', 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/Food2.jpg', 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/parking.jpg'),
(45, 38, 'Imges/hostel-dormitory-beds-at-cheap-room.webp', 'Imges/Food1.jpg', 'Imges/egor-myznik-rCZQCbUAQvg-unsplash.jpg'),
(48, 45, 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/modern-youth-hostel-building-accommodation-for-travellers-building-exterior-2GNCB96.jpg', 'C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/barun-ghosh-wClFKcjhNcI-unsplash.jpg', 'Imges/parking.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `hostel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `hostel_id`) VALUES
(1, 'bhavnger', 0),
(2, 'Gandhinagar', 0),
(3, 'Ahmedabad', 0),
(4, 'Rajkot', 0),
(5, 'Rajkot', 0),
(34, 'ahmedabad', 0),
(35, 'Bhavnagar', 0),
(36, 'Bhavnagar', 0),
(37, 'sdcdc', 0),
(38, 'sdvsdv', 0),
(39, 'sdvsdv', 0),
(40, 'vxcv', 0),
(41, 'ascxasc', 0),
(42, 'ascxasc', 0),
(43, 'dvdv', 0),
(44, '', 0),
(45, '', 0),
(46, '', 0),
(47, '', 0),
(48, '', 0),
(49, '', 0),
(50, '', 0),
(51, '', 0),
(52, 'rgreg', 0),
(53, 'rgreg', 0),
(54, 'ahmedabad', 0),
(55, 'fvdfv', 0),
(56, 'x', 0),
(57, 'x', 0),
(58, 'x', 0),
(59, 'x', 0),
(60, 'x', 0),
(61, 'x', 0),
(62, 'x', 0),
(63, 'x', 0),
(64, 'x', 0),
(65, '', 0),
(66, 'hnhj', 0),
(67, 'hnhj', 0),
(68, 'hnhj', 0),
(69, 'hnhj', 0),
(70, 'hnhj', 0),
(71, 'hnhj', 0),
(72, 'hnhj', 0),
(73, 'hnhj', 0),
(74, 'hnhj', 0),
(75, 'hnhj', 0),
(76, 'hnhj', 0),
(77, 'hnhj', 0),
(78, 'hnhj', 0),
(79, 'xc', 0),
(80, 'xc', 0),
(81, 'xc', 0),
(82, 'xc', 0),
(83, 'xc', 0),
(84, 'xc', 0),
(85, 'cdsdc ', 0),
(86, 'hyderabad', 0),
(87, 'hyderabad', 0),
(88, '', 0),
(89, 'Surat', 0),
(90, 'sfsf', 0),
(91, 'sfsf', 0),
(92, 'sfsf', 0),
(93, 'sfsf', 0),
(94, 'sfsf', 0),
(95, 'sfsf', 0),
(96, 'sfsf', 0),
(97, 'sfsf', 0),
(98, 'sfsf', 0),
(99, 'sfsf', 0),
(100, 'sfsf', 0),
(101, 'sfsf', 0),
(102, 'sfsf', 0),
(103, 'sfsf', 0),
(104, 'sfsf', 0),
(105, 'sfsf', 0),
(106, 'sfsf', 0),
(107, 'sfsf', 0),
(108, 'sfsf', 0),
(109, 'sfsf', 0),
(110, 'sfsf', 0),
(111, 'sfsf', 0),
(112, 'sfsf', 0),
(113, 'sfsf', 0),
(114, 'sfsf', 0),
(115, 'sfsf', 0),
(116, 'sfsf', 0),
(117, 'sfsf', 0),
(118, 'sfsf', 0),
(119, 'sfsf', 0),
(120, 'sfsf', 0),
(121, 'sfsf', 0),
(122, 'sfsf', 0),
(123, 'sfsf', 0),
(124, 'sfsf', 0),
(125, 'sfsf', 0),
(126, 'sfsf', 0),
(127, 'sfsf', 0),
(128, 'sfsf', 0),
(129, 'chiloda', 0),
(130, 'chiloda', 0),
(131, 'chiloda', 0),
(132, 'chiloda', 0),
(133, 'chiloda', 0),
(134, 'sdfsf', 0),
(135, 'gadhinagar', 0),
(136, 'gadhinagar', 0),
(137, 'kj;', 0),
(138, 'jljlj', 0),
(139, 'jljlj', 0),
(140, 'jljlj', 0),
(141, 'Chandkheda', 0),
(142, 'Chandkheda', 0),
(143, 'Chandkheda', 0),
(144, 'Chandkheda', 0),
(145, 'Chandkheda', 0),
(146, 'Chandkheda', 0),
(147, 'Chandkheda', 0),
(148, 'Chandkheda', 0),
(149, 'Chandkheda', 0),
(150, 'Chandkheda', 0),
(151, 'Chandkheda', 0),
(152, 'Gandhinagar', 0),
(153, 'Gandhinagar', 0),
(154, 'Gandhinagar', 0),
(155, 'chandkheda', 0),
(156, 'chandkheda', 0),
(157, 'chandkheda', 0),
(158, 'chandkheda', 0),
(159, 'Ahmedabad', 0),
(160, 'Rajkot', 0),
(161, 'Rajkot', 0),
(162, 'Rajkot', 0),
(163, 'Rajkot', 0),
(164, 'Rajkot', 0),
(165, 'Rajkot', 0),
(166, 'Rajkot', 0),
(167, 'Rajkot', 0),
(168, 'Rajkot', 0),
(169, 'Rajkot', 0),
(170, 'Rajkot', 0),
(171, 'Rajkot', 0),
(172, 'Rajkot', 0),
(173, 'Golka', 0),
(174, 'Ahmedabad', 0),
(175, 'Ahmedabad', 0),
(176, 'newzealand', 0),
(177, 'newzealand', 0),
(178, 'newzealand', 0),
(179, 'newzealand', 0),
(180, '', 0),
(181, 'newzealand', 0),
(182, 'surat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `login_id` int(4) NOT NULL,
  `login_ name` varchar(100) NOT NULL,
  `login_password` varchar(50) NOT NULL,
  `hostelowner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`login_id`, `login_ name`, `login_password`, `hostelowner_id`) VALUES
(1, 'ShivamhostelBoyHostel@gmail.com', 'shivam$345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `id` int(5) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `modeofpayment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `student_id`, `id`, `payment_amount`, `payment_date`, `payment_status`, `modeofpayment`) VALUES
(20, 4, 27, 11000, '2024-02-25', 'Yes', 'online'),
(68, 9, 42, 10667, '2024-03-01', 'Yes', 'online'),
(69, 10, 43, 9000, '2024-03-02', 'Yes', 'online'),
(74, 23, 49, 10500, '2024-03-03', 'Yes', 'online'),
(76, 25, 51, 42000, '2024-03-12', 'Yes', 'online'),
(77, 26, 52, 9000, '2024-03-12', 'Yes', 'online'),
(78, 27, 53, 42000, '2024-03-12', 'Yes', 'online'),
(79, 28, 54, 24000, '2024-03-12', 'Yes', 'online'),
(80, 29, 55, 9000, '2024-03-12', 'Yes', 'online'),
(105, 31, 78, 25002, '2024-03-13', 'Yes', 'online'),
(106, 32, 79, 75000, '2024-03-13', 'Yes', 'online'),
(115, 37, 88, 6501, '2024-03-14', 'Yes', 'online'),
(116, 38, 89, 36000, '2024-03-14', 'Yes', 'online'),
(117, 1, 90, 22998, '2024-03-14', 'Yes', 'online'),
(121, 42, 94, 21000, '2024-03-14', 'Yes', 'online'),
(124, 43, 97, 18000, '2024-03-15', 'Yes', 'online'),
(125, 47, 98, 37500, '2024-03-15', 'Yes', 'online'),
(130, 8, 103, 177660, '2024-03-16', 'Yes', 'online'),
(136, 52, 109, 22998, '2024-03-22', 'Yes', 'online'),
(137, 53, 110, 33000, '2024-03-22', 'Yes', 'online'),
(138, 56, 111, 48000, '2024-03-22', 'Yes', 'online'),
(139, 58, 112, 81330, '2024-03-23', 'Yes', 'online'),
(140, 57, 113, 12000, '2024-03-23', 'Yes', 'online'),
(141, 61, 114, 33000, '2024-04-05', 'Yes', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `registiontable`
--

CREATE TABLE `registiontable` (
  `resirationid` int(5) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password1` varchar(120) NOT NULL,
  `phoneno` varchar(120) NOT NULL,
  `date_of_registration` date NOT NULL,
  `hostelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registiontable`
--

INSERT INTO `registiontable` (`resirationid`, `username`, `password1`, `phoneno`, `date_of_registration`, `hostelname`) VALUES
(19, 'raj@1234', '4567', '3435663636', '2024-02-01', ''),
(22, 'karan@123', '4532', '3424242424', '2024-03-01', ''),
(24, 'suresh$213', '35353535', '4533647774', '2024-03-02', ''),
(25, 'bakul@123', 'baku564', '5344363646', '2024-02-25', ''),
(26, 'krunal@123', '345', '2535345675', '2024-02-20', ''),
(37, 'riya@123', '4345353', '9832423466', '2024-03-02', ''),
(38, 'kiran@123', '234567', '9455364647', '2024-03-10', ''),
(39, 'sanay@123', 'sanju@34', '5558908058', '2024-03-12', ''),
(40, 'vipul@123', 'vipro$34', '9457458435', '2024-03-12', ''),
(41, 'chandan@123', 'chnadru@', '9856646464', '2024-03-12', ''),
(42, 'kiku@123', 'kiku#234', '8686776868', '2024-03-12', ''),
(43, 'sharad@123', '34564645', '9978798798', '2024-03-12', ''),
(45, 'vaibhav@123', 'vaibhav#4556', '9869797979', '2024-03-13', ''),
(46, 'mira@123', 'mira4554', '9898975675', '2024-03-13', ''),
(49, 'manthan@123', 'manthu@3', '9887676767', '2024-03-14', ''),
(50, 'dhanu@123', 'dhanu#23', '9997978978', '2024-03-14', ''),
(54, 'sam@123', 'sam#2323', '9887676767', '2024-03-14', ''),
(55, 'aaryan@12', 'aarya$32', '9767898787', '2024-03-15', ''),
(57, 'raj@123', '4567sgg', '9767898787', '2024-03-15', ''),
(58, 'raj@12389', 'hhhk', '9767898787', '2024-03-15', ''),
(59, 'allu#23666', '666Allu', '9887867676', '2024-03-15', ''),
(60, 'raj@1239', 'jjjjjjjj', '9767898787', '2024-03-15', ''),
(61, 'baku@123', 'jkjlkjlj', '9898978787', '2024-03-16', ''),
(62, 'sameer@12345', 'Sameer$3', '9978608097', '2024-03-19', ''),
(63, 'vikram@gmail.com', 'Vura@121', '8788080987', '2024-03-21', ''),
(64, 'pasa&123', 'Parsa!2a', '9795476342', '2024-03-22', ''),
(65, 'vishwak#21222', 'Vishwa@1', '9659467454', '2024-03-22', ''),
(68, 'mani#123', 'Mani!234', '9087876767', '2024-03-22', ''),
(69, 'angel@1231', 'Angel232', '9897878989', '2024-03-22', ''),
(70, 'piyush@123566', 'Piy1#oks', '9796575645', '2024-03-23', ''),
(73, 'survesh#1212', 'Surva@32', '9845564545', '2024-04-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `roomdata`
--

CREATE TABLE `roomdata` (
  `id` int(5) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `hostel_id` int(3) NOT NULL,
  `startDate` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `student_id` int(10) NOT NULL,
  `date_of_booking` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomdata`
--

INSERT INTO `roomdata` (`id`, `room_number`, `room_type`, `hostel_id`, `startDate`, `duration`, `student_id`, `date_of_booking`, `endDate`) VALUES
(27, '107', 'ac', 12, '2023-12-02', '3months', 4, '2023-11-30', '2024-03-02'),
(42, '103', 'ac', 22, '2024-02-27', '3months', 9, '2024-02-25', '2024-05-27'),
(43, '101', 'ac', 10, '2024-02-29', '6months', 10, '2024-02-20', '2024-08-29'),
(49, '102', 'nonac', 1, '2023-12-28', '6months', 23, '2023-11-02', '2024-06-28'),
(51, '106', 'nonac', 1, '2023-03-25', '12months', 25, '2023-03-12', '2024-03-25'),
(52, '106', 'nonac', 1, '2023-12-16', '6months', 26, '2023-09-25', '2024-06-16'),
(53, '108', 'nonac', 1, '2024-03-19', '12months', 27, '2023-03-12', '2025-03-19'),
(54, '103', 'ac', 1, '2023-09-12', '6months', 28, '2023-09-10', '2024-03-12'),
(55, '104', 'nonac', 1, '2024-03-13', '3months', 29, '2024-03-12', '2024-06-13'),
(78, '102', 'ac', 12, '2024-03-28', '6months', 31, '2024-03-13', '2024-09-28'),
(79, '102', 'ac', 13, '2024-03-30', '12months', 32, '2024-03-13', '2025-03-30'),
(88, '102', 'ac', 12, '2024-03-15', '3months', 37, '2024-03-14', '2024-06-15'),
(89, '106', 'nonac', 10, '2024-03-16', '12months', 38, '2024-03-14', '2025-03-16'),
(90, '102', 'ac', 2, '2024-03-16', '6months', 1, '2024-03-14', '2024-09-16'),
(94, '102', 'ac', 10, '2024-03-17', '6months', 42, '2024-03-14', '2024-09-17'),
(97, '102', 'nonac', 10, '2024-03-28', '6months', 43, '2024-03-15', '2024-09-28'),
(98, '102', 'ac', 13, '2024-03-23', '6months', 47, '2024-03-15', '2024-09-23'),
(103, '102', 'ac', 14, '2024-03-22', '6months', 8, '2024-03-16', '2024-09-22'),
(109, '102', 'ac', 45, '2024-11-23', '6months', 52, '2024-03-22', '2025-05-23'),
(110, '102', 'ac', 38, '2024-03-30', '6months', 53, '2024-03-22', '2024-09-30'),
(111, '102', 'ac', 1, '2024-03-29', '12months', 56, '2024-03-22', '2025-03-29'),
(112, '108', 'nonac', 14, '2024-03-30', '3months', 58, '2024-03-23', '2024-06-30'),
(113, '102', 'ac', 1, '2024-03-30', '3months', 57, '2024-03-23', '2024-06-30'),
(114, '102', 'ac', 38, '2024-04-11', '6months', 61, '2024-04-05', '2024-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parents_no` varchar(100) NOT NULL,
  `Gander` varchar(10) NOT NULL,
  `Date_of_brith` varchar(100) NOT NULL,
  `Address1` varchar(200) NOT NULL,
  `city1` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `date_of_register` date NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hostel_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `email`, `parents_no`, `Gander`, `Date_of_brith`, `Address1`, `city1`, `image`, `pincode`, `course_name`, `date_of_register`, `college_name`, `username`, `hostel_id`) VALUES
(1, 'Raj kumar', 'Raj@gmail.com', '3435663636', 'Male', '2024-02-23', 'Bhagya laxmi Row-house,chandlodia,ahmedabad', 'Ahmedabad', 'imges/testimonial-2.jpg', '12345', 'student', '2024-02-01', 'chimanbhai patel institute', 'raj@1234', 2),
(4, 'karan', 'karan@gmail.com', '3424242424', 'Male', '2006-02-28', '6,first-floor,nirkunj society,sarkhej', 'Sarkhej', 'imges/user.jpg', '345612', 'student', '2024-03-01', 'DAIICT', 'karan@123', 12),
(8, 'Suresh', 'suresh453@gmail.com', '4533647774', 'Male', '2003-03-30', '12,First floor,girnar society,kheda', 'Surat', 'imges/testimonial-3.jpg', '556564', 'student', '2024-03-02', 'k.s school of computer applications', 'suresh$213', 14),
(9, 'bakul', 'baku@gmail.com', '5344363646', 'Male', '2000-03-15', '56,b-maha nagar society', 'Rajkot', 'imges/about-1.jpg', '674646', 'working_person', '2024-02-25', 'jindal industries', 'bakul@123', 22),
(10, 'krunal', 'krunal@gmail.com', '2535345675', 'Male', '2000-03-23', '56-B,gokul nagar,mudar', 'Rajkot', 'imges/a1.jpg', '123443', 'working_person', '2024-02-20', 'Aanand industries', 'krunal@123', 10),
(23, 'Riya', 'riya@gmail.com', '9832423466', 'Female', '2004-03-28', '9-ff, nirmal nagar,ghatlodia', 'Ahmedabad', 'Imges/testimonial-1.jpg', '382481', 'student', '2024-03-02', 'l.j institute of c.a', 'riya@123', 1),
(24, 'kiran', 'kiran@gmail.com', '9455364647', 'Female', '2001-04-05', '9-ff,kirit nagar society,vadaj', 'Ahmedabad', 'Imges/a1.jpg', '345678', 'student', '2024-03-10', 'cu shah college of commerce', 'kiran@123', 1),
(25, 'sanjay', 'sanjay@gmail.com', '5558908058', 'Male', '2000-03-20', '12-D,shubham nagar,manya puri', 'rajkot', 'Imges/user.jpg', '979879', 'working_person', '2024-03-12', 'wipro ormax ', 'sanay@123', 1),
(26, 'vipul', 'vipul@yahoo.com', '9457458435', 'Male', '2003-05-07', 'shanti nagar,nr bhavik school,chandlodia', 'Ahmedabad', 'Imges/testimonial-2.jpg', '382481', 'student', '2024-03-12', 'shayona campus,chankyapari', 'vipul@123', 1),
(27, 'chandan', 'chd@gmail.com', '9856646464', 'Male', '2002-04-07', 'k.k nagar,umiya hall char rasta', 'Admedabad', 'Imges/testimonial-3.jpg', '382481', 'student', '2024-03-12', 'ld college of engineering ', 'chandan@123', 1),
(28, 'kiku', 'kundan@gmail.com', '8686776868', 'Male', '2000-03-20', '6,ff bhadrapur society', 'Ahmedabad', 'Imges/testimonial-1.jpg', '382481', 'working_person', '2024-03-12', 'gujarat college', 'kiku@123', 1),
(29, 'sharad', 'sharad@gmail.com', '9978798798', 'Male', '2000-04-04', 'shanti nagar society', 'Surat', 'Imges/team-2.jpg', '565464', 'student', '2024-03-12', 'vidhya nagar college', 'sharad@123', 1),
(31, 'vaibhav', 'vaibhav@gmail.com', '9869797979', 'Male', '2003-04-07', '34,B-bhagyanagar society,bopal', 'Ahmedabad', 'Imges/user.jpg', '382481', 'student', '2024-03-13', 'Anbe Shivam college', 'vaibhav@123', 12),
(32, 'mira', 'mira@gmail.com', '9898975675', 'Female', '2024-03-15', 'vishwak city,bopal', 'Ahmedabad', 'Imges/testimonial-1.jpg', '382481', 'student', '2024-03-13', 'j.g college of administration', 'mira@123', 13),
(37, 'manthan', 'manthan@gmail.com', '9887676767', 'Male', '2003-03-22', 'vaibhav nagar,gurgaon', 'surat', 'Imges/s1.jpg', '864545', 'student', '2024-03-14', 'saraswati collge of science', 'manthan@123', 12),
(38, 'Dhanshree', 'dhanu@gmail.com', '9997978978', 'Female', '2001-03-23', '6-B,virpur society,vadaj.', 'Ahmedabad', 'Imges/testimonial-1.jpg', '382481', 'student', '2024-03-14', 'Department of computer science', 'dhanu@123', 10),
(42, 'samantha', 'sam@gmail.com', '9887676767', 'Female', '2004-07-25', '5-A,Shree leela complex,gift city', 'Gandhinagar', 'Imges/testimonial-1.jpg', '348985', 'student', '2024-03-14', 'chimabhai patel Institute', 'sam@123', 10),
(43, 'Aaryan', 'aarya3@gmail.com', '9767898787', 'Male', '2002-03-20', '6,bharath nagar,chandlodia', 'Ahmedabad', 'Imges/team-2.jpg', '382481', 'student', '2024-03-15', 'l.j institute of c.a', 'aaryan@12', 10),
(47, 'Arjun', 'arjun@gmail.com', '9887867676', 'Male', '2000-03-17', 'Royal puri society,vi city', 'surat', 'Imges/user.jpg', '396578', 'student', '2024-03-15', 'b,k school of businsess adminstration', 'allu#23666', 13),
(49, 'kunji', 'knji@gmail.com', '9898978787', 'Female', '2003-03-19', '8sfsf afafasfa', 'ahmedabd', 'Imges/9.png', '454545', 'student', '2024-03-16', 'jijgar jijijaa', 'baku@123', 2),
(50, 'sameer', 'sameer@gmail.com', '9978608097', 'Male', '2002-03-19', '9,bb vinstar society,vadaj', 'Mehsana', 'Imges/s1.jpg', '865040', 'student', '2024-03-19', 'swisko manjot', 'sameer@12345', 2),
(51, 'vikram', 'vikram@gmail.com', '8788080987', 'Male', '2020-04-05', 'shanti nagar,nr bhavik school ,chandlodia', 'Ahmedabad', 'Imges/classes-3.jpg', '382481', 'student', '2024-03-21', 'Shayona campus', 'vikram@gmail.com', 2),
(52, 'parsottam das', 'parsottam@gmail.com', '9795476342', 'Male', '2011-03-28', '8,bhagya laxmi row house,ranip', 'Ahmedabad', 'Imges/team-2.jpg', '382481', 'student', '2024-03-22', 'h l college of commerce', 'pasa&123', 45),
(53, 'vishwak sen', 'vishwa56@gmail.com', '9659467454', 'Male', '2010-04-04', 'virochan nagar,narol pur', 'surat', 'Imges/s1.jpg', '395656', 'student', '2024-03-22', 'k.s school of computer applications', 'vishwak#21222', 38),
(56, 'manish', 'manish@gmail.com', '9087876767', 'Male', '2000-03-28', 'shakti nagar,nr bhavik school chandlodia', 'Ahmedabad', 'Imges/testimonial-3.jpg', '382481', 'student', '2024-03-22', 'cu shah college of commerce', 'mani#123', 1),
(57, 'Angel', 'angel@gmail.com', '9897878989', 'Female', '2003-03-28', 'Income tax,area vadaj', 'Ahmedabad', 'Imges/testimonial-1.jpg', '382481', 'student', '2024-03-22', 'chimabhai patel Institute', 'angel@1231', 1),
(58, 'Piyush', 'piyush@gmail.com', '9796575645', 'Male', '2003-12-13', '9-S,kesar hieghts,virochan nagar', 'Ahmedabad', 'Imges/s1.jpg', '382481', 'student', '2024-03-23', 'chimanbhai patel institute', 'piyush@123566', 14),
(61, 'survesh', 'survesh@gmail.com', '9845564545', 'Male', '2010-04-25', '9,bb asrani area vadaj', 'Ahmedabad', 'Imges/360_F_219669327_v12pBKc7TB62E3uCJrgRRkDhfVENK3z5.jpg', '382481', 'student', '2024-04-05', 'lj colege of vishwa vidhyalaya', 'survesh#1212', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`),
  ADD KEY `hostelowner_id` (`hostelowner_id`);

--
-- Indexes for table `hostelowner`
--
ALTER TABLE `hostelowner`
  ADD PRIMARY KEY (`hostelowner_id`);

--
-- Indexes for table `hostel_img`
--
ALTER TABLE `hostel_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `hostelowner_id` (`hostelowner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `payment_ibfk_2` (`id`);

--
-- Indexes for table `registiontable`
--
ALTER TABLE `registiontable`
  ADD PRIMARY KEY (`resirationid`);

--
-- Indexes for table `roomdata`
--
ALTER TABLE `roomdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_id` (`hostel_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `hostel_id` (`hostel_id`),
  ADD KEY `room_id` (`date_of_register`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostel_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `hostelowner`
--
ALTER TABLE `hostelowner`
  MODIFY `hostelowner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `hostel_img`
--
ALTER TABLE `hostel_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `login_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `registiontable`
--
ALTER TABLE `registiontable`
  MODIFY `resirationid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `roomdata`
--
ALTER TABLE `roomdata`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`hostelowner_id`) REFERENCES `hostelowner` (`hostelowner_id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_img`
--
ALTER TABLE `hostel_img`
  ADD CONSTRAINT `hostel_img_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD CONSTRAINT `login_admin_ibfk_1` FOREIGN KEY (`hostelowner_id`) REFERENCES `hostelowner` (`hostelowner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id`) REFERENCES `roomdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomdata`
--
ALTER TABLE `roomdata`
  ADD CONSTRAINT `roomdata_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roomdata_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
