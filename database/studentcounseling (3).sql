-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 03:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentcounseling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `short_name` varchar(52) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `status`, `full_name`, `short_name`) VALUES
(1, 'aitmaster2020@gmail.com', 1, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `student_id` varchar(15) DEFAULT NULL,
  `teacher_id` varchar(15) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL,
  `message` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `teacher_message` longtext DEFAULT NULL,
  `change_time_message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`student_id`, `teacher_id`, `course_id`, `message`, `date`, `time`, `status`, `appointment_id`, `teacher_message`, `change_time_message`) VALUES
('6548', 'teacher_josepht', 'SPC3039-D20', 'asdasdas', '2020-09-25', '14:00:00', 0, 4, 'Sorry i am busy on the day. So can we change the date.', NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', 'Hello I am utsav katuwal. I have problems is ....', '2020-09-30', '17:30:00', 3, 5, 'adadasd', NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', 'This is test message. I want to book appointment.', '2020-09-26', '23:00:00', 2, 6, NULL, 'sorry'),
('6548', 'teacher_josepht', 'SPC3039-D20', 'asdadsdsad', '2020-10-08', '10:00:00', 2, 7, 'sorry i am bg this day. please change the date and request again.', NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', 'Dignissimos do simil', '2023-06-06', '22:00:00', 0, 8, NULL, NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', NULL, '2021-02-18', '19:00:00', 0, 9, NULL, NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', NULL, '2021-02-12', '12:30:00', 0, 10, NULL, NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', 'Hello sir i am facing problem........ this is test email.', '2021-03-04', '19:00:00', 0, 11, NULL, NULL),
('6548', 'teacher_josepht', 'SPC3039-D20', 'Hello I want to book this appointment', '2021-06-01', '19:00:00', 0, 12, NULL, NULL),
('6423', 'teacher_josepht', 'SPC3039-D20', 'Hello appointment book test.', '2021-05-20', '12:30:00', 0, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(15) NOT NULL,
  `integration_id` varchar(10) DEFAULT NULL,
  `short_name` varchar(11) DEFAULT NULL,
  `long_name` varchar(37) DEFAULT NULL,
  `account_id` varchar(8) DEFAULT NULL,
  `term_id` varchar(3) DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL,
  `start_date` varchar(10) DEFAULT NULL,
  `end_date` varchar(10) DEFAULT NULL,
  `course_format` varchar(6) DEFAULT NULL,
  `blueprint_course_id` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `integration_id`, `short_name`, `long_name`, `account_id`, `term_id`, `status`, `start_date`, `end_date`, `course_format`, `blueprint_course_id`) VALUES
('ANI1006-D20', '', 'ANI1006', '3D Introduction', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1006'),
('ANI1016-D20-MLB', '', 'ANI1016-MLB', 'Animation', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1016'),
('ANI1016-D20-SYD', '', 'ANI1016-SYD', 'Animation', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1016'),
('ANI1017-D20', '', 'ANI1017', '2D Animation', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1017'),
('ANI1027-D20', '', 'ANI1027', '3D Modelling', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1027'),
('ANI1031-D20', '', 'ANI1031', '3D Animation', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1031'),
('ANI1037-D20', '', 'ANI1037', 'Advanced 2D Animation', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1037'),
('ANI1044-D20', '', 'ANI1044', 'Animation Production', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1044'),
('ANI1050-D20', '', 'ANI1050', 'Motion Graphics', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1050'),
('ANI1051-D20', '', 'ANI1051', 'Typography for Screen and Motion', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI1051'),
('ANI3025-D20', '', 'ANI3025', 'Motion Capture', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI3025'),
('ANI3032-D20', '', 'ANI3032', 'Advanced 3D Animation', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI3032'),
('ANI3033-D20', '', 'ANI3033', 'Advanced 3D Modelling', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI3033'),
('ANI3056-D20', '', 'ANI3056', 'Game Assets', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI3056'),
('ANI3060-D20', '', 'ANI3060', 'Advanced Game Assets', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-ANI3060'),
('CMP1041-D20', '', 'CMP1041', 'Foundation Programming', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP1041'),
('CMP1042-D20', '', 'CMP1042', 'Information Systems', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP1042'),
('CMP1043-D20', '', 'CMP1043', 'Introduction to Software Engineering', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP1043'),
('CMP1046-D20', '', 'CMP1046', 'Enterprise Systems', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP1046'),
('CMP3044-D20', '', 'CMP3044', 'Foundation Networks', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP3044'),
('CMP3045-D20', '', 'CMP3045', 'Systems Analysis and Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-CMP3045'),
('DES1002-D20', '', 'DES1002', 'Communication Design Theory', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1002'),
('DES1003-D20', '', 'DES1003', 'Design Thinking and Process', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1003'),
('DES1004-D20', '', 'DES1004', 'Design Practice and Ethics', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1004'),
('DES1012-D20', '', 'DES1012', 'Costume Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1012'),
('DES1013-D20-A', '', 'DES1013-A', 'Digital Images', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1013'),
('DES1013-D20-B', '', 'DES1013-B', 'Digital Images', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1013'),
('DES1013-D20-C', '', 'DES1013-C', 'Digital Images', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1013'),
('DES1013-D20-D', '', 'DES1013-D', 'Digital Images', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1013'),
('DES1014-D20', '', 'DES1014', 'Design Principles', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1014'),
('DES1020-D20-MLB', '', 'DES1020-MLB', 'Creative Drawing', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1020'),
('DES1020-D20-SYD', '', 'DES1020-SYD', 'Creative Drawing', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1020'),
('DES1021-D20', '', 'DES1021', 'Digital Illustration', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1021'),
('DES1030-D20', '', 'DES1030', 'Prototype Illustration', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1030'),
('DES1050-D20-MLB', '', 'DES1050-MLB', 'Shooting and Editing', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1050'),
('DES1050-D20-SYD', '', 'DES1050-SYD', 'Shooting and Editing', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1050'),
('DES1060-D20', '', 'DES1060', 'Interface and Experience Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1060'),
('DES1070-D20', '', 'DES1070', 'Intro to Print and Publication Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1070'),
('DES1071-D20', '', 'DES1071', 'Typography', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1071'),
('DES1081-D20', '', 'DES1081', 'Advertising and Brand Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-DES1081'),
('FIL1010-D20-MLB', '', 'FIL1010-MLB', 'Screen Language', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1010'),
('FIL1010-D20-SYD', '', 'FIL1010-SYD', 'Screen Language', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1010'),
('FIL1019-D20', '', 'FIL1019', 'Cinematography', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1019'),
('FIL1020-D20', '', 'FIL1020', 'Digital Audio Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1020'),
('FIL1034-D20', '', 'FIL1034', 'Screen Production', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1034'),
('FIL1060-D20', '', 'FIL1060', 'Visual Effects (VFX)', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL1060'),
('FIL3036-D20', '', 'FIL3036', 'Advanced Screen Production', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL3036'),
('FIL3037-D20', '', 'FIL3037', 'Documentary Production', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL3037'),
('FIL3065-D20', '', 'FIL3065', 'Commercial Film', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-FIL3065'),
('INT1012-D20', '', 'INT1012', 'Introduction to Web', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1012'),
('INT1024-D20', '', 'INT1024', 'Visual Effects (VFX)', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1024'),
('INT1028-D20', '', 'INT1028', '2D Interactivity', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1028'),
('INT1029-D20', '', 'INT1029', 'Game Development', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1029'),
('INT1035-D20', '', 'INT1035', 'Advanced Game Project', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1035'),
('INT1050-D20-MLB', '', 'INT1050-MLB', 'Digital Project Management', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1050'),
('INT1050-D20-SYD', '', 'INT1050-SYD', 'Digital Project Management', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1050'),
('INT1059-D20', '', 'INT1059', 'Advanced Web', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1059'),
('INT1150-D20', '', 'INT1150', 'Information Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT1150'),
('INT2001-D20', '', 'INT2001', 'Basic Game Engine Programming', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT2001'),
('INT2007-D20', '', 'INT2007', 'Advanced Game Engine Programming', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT2007'),
('INT3030-D20', '', 'INT3030', 'Advanced Game Development', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3030'),
('INT3052-D20', '', 'INT3052', 'Cross-platform Applications', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3052'),
('INT3053-D20', '', 'INT3053', 'Data-driven Apps', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3053'),
('INT3506-D20-MLB', '', 'INT3506-MLB', 'Advanced Studio #1 (Capstone)', 'TF', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3506'),
('INT3506-D20-SYD', '', 'INT3506-SYD', 'Advanced Studio #1 (Capstone)', 'TF', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3506'),
('INT3516-D20-MLB', '', 'INT3516-MLB', 'Advanced Studio #2 (Capstone)', 'TF', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3516'),
('INT3516-D20-SYD', '', 'INT3516-SYD', 'Advanced Studio #2 (Capstone)', 'TF', 'D20', 'active', '', '', 'online', 'MASTER-D20-INT3516'),
('MED1001-D20', '', 'MED1001', 'Digital Pathways', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED1001'),
('MED1007-D20', '', 'MED1007', 'Digital Storytelling', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED1007'),
('MED1022-D20-MLB', '', 'MED1022-MLB', 'Game Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED1022'),
('MED1022-D20-SYD', '', 'MED1022-SYD', 'Game Design', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED1022'),
('MED1060-D20', '', 'MED1060', 'Entertainment and Media', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED1060'),
('MED3011-D20', '', 'MED3011', 'Decoding Media', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-MED3011'),
('PRG1002-D20', '', 'PRG1002', 'Programming I', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1002'),
('PRG1006-D20', '', 'PRG1006', 'Programming II', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1006'),
('PRG1010-D20', '', 'PRG1010', 'Discrete Mathematics', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1010'),
('PRG1042-D20', '', 'PRG1042', 'Information Systems', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1042'),
('PRG1048-D20', '', 'PRG1048', 'Database Systems', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1048'),
('PRG1049-D20', '', 'PRG1049', 'JAVA', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1049'),
('PRG1050-D20', '', 'PRG1050', 'Mobile Apps Android', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG1050'),
('PRG2006-D20', '', 'PRG2006', 'Artificial Intelligence', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG2006'),
('PRG3002-D20', '', 'PRG3002', 'Augmented Reality', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG3002'),
('PRG3051-D20-MLB', '', 'PRG3051-MLB', 'Mobile Apps iOS', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG3051'),
('PRG3051-D20-SYD', '', 'PRG3051-SYD', 'Mobile Apps iOS', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRG3051'),
('PRO1001-D20', '', 'PRO1001', 'The Forge', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRO1001'),
('PRO1010-D20-MLB', '', 'PRO1010-D20', 'The Launch Pad', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRO1010'),
('PRO1010-D20-SYD', '', 'PRO1010-SYD', 'The Launch Pad', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRO1010'),
('PRO1030-D20', '', 'PRO1030', 'Internship', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-PRO1030'),
('SPC3038-D20', '', 'SPC3038', 'Internship', 'AIT-ELEC', 'D20', 'active', '', '', 'online', 'MASTER-D20-SPC3038'),
('SPC3039-D20', '', 'SPC3039', 'External Project', 'AIT-CORE', 'D20', 'active', '', '', 'online', 'MASTER-D20-SPC3039');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `course_id` varchar(15) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `role` varchar(7) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  `section_id` varchar(15) DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL,
  `associated_user_id` varchar(10) DEFAULT NULL,
  `limit_section_privileges` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`course_id`, `user_id`, `role`, `role_id`, `section_id`, `status`, `associated_user_id`, `limit_section_privileges`) VALUES
('INT3516-D20-MLB', '6423', 'student', 3, 'INT3516-D20-MLB', 'active', '', 'FALSE'),
('INT3053-D20', '6423', 'student', 3, 'INT3053-D20-MLB', 'active', '', 'FALSE'),
('SPC3039-D20', '6423', 'student', 3, 'SPC3039-D20-MLB', 'active', '', 'FALSE'),
('INT3052-D20', '6548', 'student', 3, 'INT3052-D20-MLB', 'active', '', 'FALSE'),
('PRG3002-D20', '6548', 'student', 3, 'PRG3002-D20-MLB', 'active', '', 'FALSE'),
('SPC3039-D20', '6548', 'student', 3, 'SPC3039-D20-MLB', 'active', '', 'FALSE'),
('SPC3039-D20', 'teacher_josepht', 'teacher', 4, '', 'active', '', 'FALSE'),
('CMP3044-D20', 'teacher_josepht', 'teacher', 4, '', 'active', '', 'FALSE'),
('SPC3038-D20', 'teacher_josepht', 'teacher', 4, 'SPC3038-D20-MLB', 'active', '', 'FALSE'),
('INT3516-D20-SYD', 'teacher_kriss', 'teacher', 4, '', 'active', '', 'FALSE'),
('INT3506-D20-SYD', 'teacher_kriss', 'teacher', 4, '', 'active', '', 'FALSE'),
('SPC3038-D20', 'teacher_kriss', 'teacher', 4, 'SPC3038-D20-MLB', 'active', '', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` varchar(17) NOT NULL,
  `course_id` varchar(15) DEFAULT NULL,
  `integration_id` varchar(10) DEFAULT NULL,
  `name` varchar(34) DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL,
  `start_date` varchar(25) DEFAULT NULL,
  `end_date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `course_id`, `integration_id`, `name`, `status`, `start_date`, `end_date`) VALUES
('ANI1006-D20-MLB', 'ANI1006-D20', '', 'Melbourne', 'active', '', ''),
('ANI1006-D20-SYD', 'ANI1006-D20', '', 'Sydney', 'active', '', ''),
('ANI1016-D20-MLB', 'ANI1016-D20-MLB', '', 'Melbourne', 'active', '', ''),
('ANI1016-D20-SYD-A', 'ANI1016-D20-SYD', '', 'Sydney-A', 'active', '', ''),
('ANI1016-D20-SYD-B', 'ANI1016-D20-SYD', '', 'Sydney-B', 'active', '', ''),
('ANI1016-D20-SYD-C', 'ANI1016-D20-SYD', '', 'Sydney-C', 'active', '', ''),
('ANI1017-D20-MLB', 'ANI1017-D20', '', 'Melbourne', 'active', '', ''),
('ANI1017-D20-SYD', 'ANI1017-D20', '', 'Sydney', 'active', '', ''),
('ANI1027-D20-MLB', 'ANI1027-D20', '', 'Melbourne', 'active', '', ''),
('ANI1027-D20-SYD', 'ANI1027-D20', '', 'Sydney', 'active', '', ''),
('ANI1031-D20-MLB', 'ANI1031-D20', '', 'Melbourne', 'active', '', ''),
('ANI1031-D20-SYD', 'ANI1031-D20', '', 'Sydney', 'active', '', ''),
('ANI1037-D20-MLB', 'ANI1037-D20', '', 'Melbourne', 'active', '', ''),
('ANI1037-D20-SYD', 'ANI1037-D20', '', 'Sydney', 'active', '', ''),
('ANI1044-D20-MLB', 'ANI1044-D20', '', 'Melbourne', 'active', '', ''),
('ANI1044-D20-SYD', 'ANI1044-D20', '', 'Sydney', 'active', '', ''),
('ANI1050-D20-MLB', 'ANI1050-D20', '', 'Melbourne', 'active', '', ''),
('ANI1050-D20-SYD', 'ANI1050-D20', '', 'Sydney', 'active', '', ''),
('ANI1051-D20-MLB', 'ANI1051-D20', '', 'Melbourne', 'active', '', ''),
('ANI1051-D20-SYD', 'ANI1051-D20', '', 'Sydney', 'active', '', ''),
('ANI3025-D20-MLB', 'ANI3025-D20', '', 'Melbourne', 'active', '', ''),
('ANI3025-D20-SYD', 'ANI3025-D20', '', 'Sydney', 'active', '', ''),
('ANI3032-D20-MLB', 'ANI3032-D20', '', 'Melbourne', 'active', '', ''),
('ANI3032-D20-SYD', 'ANI3032-D20', '', 'Sydney', 'active', '', ''),
('ANI3033-D20-MLB', 'ANI3033-D20', '', 'Melbourne', 'active', '', ''),
('ANI3033-D20-SYD', 'ANI3033-D20', '', 'Sydney', 'active', '', ''),
('ANI3056-D20-MLB', 'ANI3056-D20', '', 'Melbourne', 'active', '', ''),
('ANI3056-D20-SYD', 'ANI3056-D20', '', 'Sydney', 'active', '', ''),
('ANI3060-D20-MLB', 'ANI3060-D20', '', 'Melbourne', 'active', '', ''),
('ANI3060-D20-SYD', 'ANI3060-D20', '', 'Sydney', 'active', '', ''),
('CMP1041-D20-MLB', 'CMP1041-D20', '', 'Melbourne', 'active', '', ''),
('CMP1041-D20-SYD', 'CMP1041-D20', '', 'Sydney', 'active', '', ''),
('CMP1042-D20-MLB', 'CMP1042-D20', '', 'Melbourne', 'active', '', ''),
('CMP1042-D20-SYD', 'CMP1042-D20', '', 'Sydney', 'active', '', ''),
('CMP1043-D20-MLB', 'CMP1043-D20', '', 'Melbourne', 'active', '', ''),
('CMP1043-D20-SYD', 'CMP1043-D20', '', 'Sydney', 'active', '', ''),
('CMP1046-D20-MLB', 'CMP1046-D20', '', 'Melbourne', 'active', '', ''),
('CMP1046-D20-SYD', 'CMP1046-D20', '', 'Sydney', 'active', '', ''),
('CMP3044-D20-MLB', 'CMP3044-D20', '', 'Melbourne', 'active', '', ''),
('CMP3044-D20-SYD', 'CMP3044-D20', '', 'Sydney', 'active', '', ''),
('CMP3045-D20-MLB', 'CMP3045-D20', '', 'Melbourne', 'active', '', ''),
('CMP3045-D20-SYD', 'CMP3045-D20', '', 'Sydney', 'active', '', ''),
('DES1002-D20-MLB', 'DES1002-D20', '', 'Melbourne', 'active', '', ''),
('DES1002-D20-SYD', 'DES1002-D20', '', 'Sydney', 'active', '', ''),
('DES1003-D20-MLB', 'DES1003-D20', '', 'Melbourne', 'active', '', ''),
('DES1003-D20-SYD', 'DES1003-D20', '', 'Sydney', 'active', '', ''),
('DES1004-D20-MLB', 'DES1004-D20', '', 'Melbourne', 'active', '', ''),
('DES1004-D20-SYD', 'DES1004-D20', '', 'Sydney', 'active', '', ''),
('DES1012-D20-MLB', 'DES1012-D20', '', 'Melbourne', 'active', '', ''),
('DES1012-D20-SYD', 'DES1012-D20', '', 'Sydney', 'active', '', ''),
('DES1013-D20-A', 'DES1013-D20-A', '', 'Class A', 'active', '', ''),
('DES1013-D20-B', 'DES1013-D20-B', '', 'Class B', 'active', '', ''),
('DES1013-D20-C', 'DES1013-D20-C', '', 'Class C', 'active', '', ''),
('DES1013-D20-D', 'DES1013-D20-D', '', 'Class D', 'active', '', ''),
('DES1014-D20-MLB', 'DES1014-D20', '', 'Melbourne', 'active', '', ''),
('DES1014-D20-SYD', 'DES1014-D20', '', 'Sydney', 'active', '', ''),
('DES1020-D20-MLB', 'DES1020-D20-MLB', '', 'Melbourne', 'active', '', ''),
('DES1020-D20-SYD-A', 'DES1020-D20-SYD', '', 'Sydney-A', 'active', '', ''),
('DES1020-D20-SYD-B', 'DES1020-D20-SYD', '', 'Sydney-B', 'active', '', ''),
('DES1021-D20-MLB', 'DES1021-D20', '', 'Melbourne', 'active', '', ''),
('DES1021-D20-SYD', 'DES1021-D20', '', 'Sydney', 'active', '', ''),
('DES1030-D20-MLB', 'DES1030-D20', '', 'Melbourne', 'active', '', ''),
('DES1030-D20-SYD', 'DES1030-D20', '', 'Sydney', 'active', '', ''),
('DES1050-D20-MLB', 'DES1050-D20-MLB', '', 'Melbourne', 'active', '', ''),
('DES1050-D20-SYD', 'DES1050-D20-SYD', '', 'Sydney', 'active', '', ''),
('DES1060-D20-MLB', 'DES1060-D20', '', 'Melbourne', 'active', '', ''),
('DES1060-D20-SYD', 'DES1060-D20', '', 'Sydney', 'active', '', ''),
('DES1070-D20-MLB', 'DES1070-D20', '', 'Melbourne', 'active', '', ''),
('DES1070-D20-SYD', 'DES1070-D20', '', 'Sydney', 'active', '', ''),
('DES1071-D20-MLB', 'DES1071-D20', '', 'Melbourne', 'active', '', ''),
('DES1071-D20-SYD', 'DES1071-D20', '', 'Sydney', 'active', '', ''),
('DES1081-D20-MLB', 'DES1081-D20', '', 'Melbourne', 'active', '', ''),
('DES1081-D20-SYD', 'DES1081-D20', '', 'Sydney', 'active', '', ''),
('FIL1010-D20-MLB', 'FIL1010-D20-MLB', '', 'Melbourne', 'active', '', ''),
('FIL1010-D20-SYD', 'FIL1010-D20-SYD', '', 'Sydney', 'active', '', ''),
('FIL1019-D20-MLB', 'FIL1019-D20', '', 'Melbourne', 'active', '', ''),
('FIL1019-D20-SYD', 'FIL1019-D20', '', 'Sydney', 'active', '', ''),
('FIL1020-D20-MLB', 'FIL1020-D20', '', 'Melbourne', 'active', '', ''),
('FIL1020-D20-SYD', 'FIL1020-D20', '', 'Sydney', 'active', '', ''),
('FIL1034-D20-MLB', 'FIL1034-D20', '', 'Melbourne', 'active', '', ''),
('FIL1034-D20-SYD', 'FIL1034-D20', '', 'Sydney', 'active', '', ''),
('FIL1060-D20-MLB', 'FIL1060-D20', '', 'Melbourne', 'active', '', ''),
('FIL1060-D20-SYD', 'FIL1060-D20', '', 'Sydney', 'active', '', ''),
('FIL3036-D20-MLB', 'FIL3036-D20', '', 'Melbourne', 'active', '', ''),
('FIL3036-D20-SYD', 'FIL3036-D20', '', 'Sydney', 'active', '', ''),
('FIL3037-D20-MLB', 'FIL3037-D20', '', 'Melbourne', 'active', '', ''),
('FIL3037-D20-SYD', 'FIL3037-D20', '', 'Sydney', 'active', '', ''),
('FIL3065-D20-MLB', 'FIL3065-D20', '', 'Melbourne', 'active', '', ''),
('FIL3065-D20-SYD', 'FIL3065-D20', '', 'Sydney', 'active', '', ''),
('INT1012-D17-A', 'INT1012-D17', '', 'INT1012-D17-A Introduction to Web', 'active', '', ''),
('INT1012-D17-B', 'INT1012-D17', '', 'INT1012-D17-B Introduction to Web', 'active', '', ''),
('INT1012-D17-C', 'INT1012-D17', '', 'INT1012-D17-C Introduction to Web', 'active', '2017-07-10T00:01:00+10:00', '2017-10-21T23:59:00+11:00'),
('INT1012-D17-MA', 'INT1012-D17', '', 'INT1012-D17-MA Introduction to Web', 'active', '', ''),
('INT1012-D20-MLB', 'INT1012-D20', '', 'Melbourne', 'active', '', ''),
('INT1012-D20-SYD', 'INT1012-D20', '', 'Sydney', 'active', '', ''),
('INT1024-D20-MLB', 'INT1024-D20', '', 'Melbourne', 'active', '', ''),
('INT1024-D20-SYD', 'INT1024-D20', '', 'Sydney', 'active', '', ''),
('INT1028-D20-MLB', 'INT1028-D20', '', 'Melbourne', 'active', '', ''),
('INT1028-D20-SYD', 'INT1028-D20', '', 'Sydney', 'active', '', ''),
('INT1029-D20-MLB', 'INT1029-D20', '', 'Melbourne', 'active', '', ''),
('INT1029-D20-SYD', 'INT1029-D20', '', 'Sydney', 'active', '', ''),
('INT1035-D20-MLB', 'INT1035-D20', '', 'Melbourne', 'active', '', ''),
('INT1035-D20-SYD', 'INT1035-D20', '', 'Sydney', 'active', '', ''),
('INT1050-D20-MLB', 'INT1050-D20-MLB', '', 'Melbourne', 'active', '', ''),
('INT1050-D20-SYD', 'INT1050-D20-SYD', '', 'Sydney', 'active', '', ''),
('INT1059-D20-MLB', 'INT1059-D20', '', 'Melbourne', 'active', '', ''),
('INT1059-D20-SYD', 'INT1059-D20', '', 'Sydney', 'active', '', ''),
('INT1150-D20-MLB', 'INT1150-D20', '', 'Melbourne', 'active', '', ''),
('INT1150-D20-SYD', 'INT1150-D20', '', 'Sydney', 'active', '', ''),
('INT2001-D20-MLB', 'INT2001-D20', '', 'Melbourne', 'active', '', ''),
('INT2001-D20-SYD', 'INT2001-D20', '', 'Sydney', 'active', '', ''),
('INT2007-D20-MLB', 'INT2007-D20', '', 'Melbourne', 'active', '', ''),
('INT2007-D20-SYD', 'INT2007-D20', '', 'Sydney', 'active', '', ''),
('INT3030-D20-MLB', 'INT3030-D20', '', 'Melbourne', 'active', '', ''),
('INT3030-D20-SYD', 'INT3030-D20', '', 'Sydney', 'active', '', ''),
('INT3052-D20-MLB', 'INT3052-D20', '', 'Melbourne', 'active', '', ''),
('INT3052-D20-SYD', 'INT3052-D20', '', 'Sydney', 'active', '', ''),
('INT3053-D20-MLB', 'INT3053-D20', '', 'Melbourne', 'active', '', ''),
('INT3053-D20-SYD', 'INT3053-D20', '', 'Sydney', 'active', '', ''),
('INT3506-D20-MLB', 'INT3506-D20-MLB', '', 'Melbourne', 'active', '', ''),
('INT3506-D20-SYD', 'INT3506-D20-SYD', '', 'Sydney', 'active', '', ''),
('INT3516-D20-MLB', 'INT3516-D20-MLB', '', 'Melbourne', 'active', '', ''),
('INT3516-D20-SYD', 'INT3516-D20-SYD', '', 'Sydney', 'active', '', ''),
('MED1001-D20-MLB', 'MED1001-D20', '', 'Melbourne', 'active', '', ''),
('MED1001-D20-SYD', 'MED1001-D20', '', 'Sydney', 'active', '', ''),
('MED1007-D20-MLB', 'MED1007-D20', '', 'Melbourne', 'active', '', ''),
('MED1007-D20-SYD', 'MED1007-D20', '', 'Sydney', 'active', '', ''),
('MED1022-D20-MLB', 'MED1022-D20-MLB', '', 'Melbourne', 'active', '', ''),
('MED1022-D20-SYD', 'MED1022-D20-SYD', '', 'Sydney', 'active', '', ''),
('MED1060-D20-MLB', 'MED1060-D20', '', 'Melbourne', 'active', '', ''),
('MED1060-D20-SYD', 'MED1060-D20', '', 'Sydney', 'active', '', ''),
('MED3011-D20-MLB', 'MED3011-D20', '', 'Melbourne', 'active', '', ''),
('MED3011-D20-SYD', 'MED3011-D20', '', 'Sydney', 'active', '', ''),
('PRG1002-D20-MLB', 'PRG1002-D20', '', 'Melbourne', 'active', '', ''),
('PRG1002-D20-SYD', 'PRG1002-D20', '', 'Sydney', 'active', '', ''),
('PRG1006-D20-MLB', 'PRG1006-D20', '', 'Melbourne', 'active', '', ''),
('PRG1006-D20-SYD', 'PRG1006-D20', '', 'Sydney', 'active', '', ''),
('PRG1010-D20-MLB', 'PRG1010-D20', '', 'Melbourne', 'active', '', ''),
('PRG1010-D20-SYD', 'PRG1010-D20', '', 'Sydney', 'active', '', ''),
('PRG1042-D20-MLB', 'PRG1042-D20', '', 'Melbourne', 'active', '', ''),
('PRG1042-D20-SYD', 'PRG1042-D20', '', 'Sydney', 'active', '', ''),
('PRG1048-D20-MLB', 'PRG1048-D20', '', 'Melbourne', 'active', '', ''),
('PRG1048-D20-SYD', 'PRG1048-D20', '', 'Sydney', 'active', '', ''),
('PRG1049-D20-MLB', 'PRG1049-D20', '', 'Melbourne', 'active', '', ''),
('PRG1049-D20-SYD', 'PRG1049-D20', '', 'Sydney', 'active', '', ''),
('PRG1050-D20-MLB', 'PRG1050-D20', '', 'Melbourne', 'active', '', ''),
('PRG1050-D20-SYD', 'PRG1050-D20', '', 'Sydney', 'active', '', ''),
('PRG2006-D20-MLB', 'PRG2006-D20', '', 'Melbourne', 'active', '', ''),
('PRG2006-D20-SYD', 'PRG2006-D20', '', 'Sydney', 'active', '', ''),
('PRG3002-D20-MLB', 'PRG3002-D20', '', 'Melbourne', 'active', '', ''),
('PRG3002-D20-SYD', 'PRG3002-D20', '', 'Sydney', 'active', '', ''),
('PRG3051-D20-MLB', 'PRG3051-D20-MLB', '', 'Melbourne', 'active', '', ''),
('PRG3051-D20-SYD', 'PRG3051-D20-SYD', '', 'Sydney', 'active', '', ''),
('PRO1001-D20-MLB', 'PRO1001-D20', '', 'Melbourne', 'active', '', ''),
('PRO1001-D20-SYD', 'PRO1001-D20', '', 'Sydney', 'active', '', ''),
('PRO1010-D20-MLB', 'PRO1010-D20-MLB', '', 'Melbourne', 'active', '', ''),
('PRO1010-D20-SYD', 'PRO1010-D20-SYD', '', 'Sydney', 'active', '', ''),
('PRO1030-D20-MLB', 'PRO1030-D20', '', 'Melbourne', 'active', '', ''),
('PRO1030-D20-SYD', 'PRO1030-D20', '', 'Sydney', 'active', '', ''),
('SPC3038-D20-MLB', 'SPC3038-D20', '', 'Melbourne', 'active', '', ''),
('SPC3038-D20-SYD', 'SPC3038-D20', '', 'Sydney', 'active', '', ''),
('SPC3039-D20-MLB', 'SPC3039-D20', '', 'Melbourne', 'active', '', ''),
('SPC3039-D20-SYD', 'SPC3039-D20', '', 'Sydney', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `integration_id` varchar(10) DEFAULT NULL,
  `authentication_provider_id` varchar(1) DEFAULT NULL,
  `login_id` varchar(35) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `first_name` varchar(7) DEFAULT NULL,
  `last_name` varchar(14) DEFAULT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `sortable_name` varchar(21) DEFAULT NULL,
  `short_name` varchar(21) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `integration_id`, `authentication_provider_id`, `login_id`, `password`, `first_name`, `last_name`, `full_name`, `sortable_name`, `short_name`, `email`, `status`) VALUES
('6423', '', '3', '6423@ait.nsw.edu.au', '', 'Phu', 'Thuc Khon', 'Phu Thuc Khon', 'Thuc Khon, Phu', '', '6423@ait.nsw.edu.au', 'active'),
('6548', '', '3', '6548@ait.nsw.edu.au', '', 'Katuwal', 'Utsav', 'Katuwal Utsav', 'Utsav, Katuwal', '', '6548@ait.nsw.edu.au', 'active'),
('teacher_josepht', '', '3', 'joseph.tagudin@ait.nsw.edu.au', '', 'Joseph', 'Tagudin', 'Joseph Tagudin', 'Tagudin, Joseph', 'Joseph Tagudin', 'joseph.tagudin@ait.nsw.edu.au', 'active'),
('teacher_kriss', '', '3', 'kriss.mahatumaratana@ait.nsw.edu.au', '', 'Kriss', 'Mahatumaratana', 'Kriss Mahatumaratana', 'Mahatumaratana, Kriss', 'Kriss, Mahatumaratana', 'kriss.mahatumaratana@ait.nsw.edu.au', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
