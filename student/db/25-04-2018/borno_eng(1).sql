-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 01:06 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `borno_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `borno_gb_info`
--

DROP TABLE IF EXISTS `borno_gb_info`;
CREATE TABLE IF NOT EXISTS `borno_gb_info` (
  `borno_gb_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_gb_type` varchar(50) NOT NULL,
  `borno_gb_name` varchar(300) NOT NULL,
  `borno_gb_desig` varchar(300) NOT NULL,
  `borno_gb_address` varchar(300) NOT NULL,
  `borno_gb_phone` varchar(25) NOT NULL,
  `borno_mgt_staf_photo` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_gb_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `borno_gb_info`
--

INSERT INTO `borno_gb_info` (`borno_gb_info_id`, `borno_school_id`, `borno_school_branch_id`, `borno_gb_type`, `borno_gb_name`, `borno_gb_desig`, `borno_gb_address`, `borno_gb_phone`, `borno_mgt_staf_photo`) VALUES
(1, 1, 1, 'GB', 'Ali Noyon', 'Chairman', 'Mirpur', '8801812101010', ''),
(2, 1, 1, 'GB', 'Ali Mortaja Noyon', 'Member', 'Mirpur', '8801712101413', '');

-- --------------------------------------------------------

--
-- Table structure for table `borno_grading_chart`
--

DROP TABLE IF EXISTS `borno_grading_chart`;
CREATE TABLE IF NOT EXISTS `borno_grading_chart` (
  `borno_grading_chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `marks_from1` int(11) NOT NULL,
  `marks_from2` int(11) NOT NULL,
  `marks_from3` int(11) NOT NULL,
  `marks_from4` int(11) NOT NULL,
  `marks_from5` int(11) NOT NULL,
  `marks_from6` int(11) NOT NULL,
  `marks_from7` int(11) NOT NULL,
  `marks_to1` int(11) NOT NULL,
  `marks_to2` int(11) NOT NULL,
  `marks_to3` int(11) NOT NULL,
  `marks_to4` int(11) NOT NULL,
  `marks_to5` int(11) NOT NULL,
  `marks_to6` int(11) NOT NULL,
  `marks_to7` int(11) NOT NULL,
  `letter_grade1` varchar(10) NOT NULL,
  `letter_grade2` varchar(10) NOT NULL,
  `letter_grade3` varchar(10) NOT NULL,
  `letter_grade4` varchar(10) NOT NULL,
  `letter_grade5` varchar(10) NOT NULL,
  `letter_grade6` varchar(10) NOT NULL,
  `letter_grade7` varchar(10) NOT NULL,
  `grade_point1` float NOT NULL,
  `grade_point2` float NOT NULL,
  `grade_point3` float NOT NULL,
  `grade_point4` float NOT NULL,
  `grade_point5` float NOT NULL,
  `grade_point6` float NOT NULL,
  `grade_point7` float NOT NULL,
  PRIMARY KEY (`borno_grading_chart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `borno_grading_chart`
--

INSERT INTO `borno_grading_chart` (`borno_grading_chart_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `marks_from1`, `marks_from2`, `marks_from3`, `marks_from4`, `marks_from5`, `marks_from6`, `marks_from7`, `marks_to1`, `marks_to2`, `marks_to3`, `marks_to4`, `marks_to5`, `marks_to6`, `marks_to7`, `letter_grade1`, `letter_grade2`, `letter_grade3`, `letter_grade4`, `letter_grade5`, `letter_grade6`, `letter_grade7`, `grade_point1`, `grade_point2`, `grade_point3`, `grade_point4`, `grade_point5`, `grade_point6`, `grade_point7`) VALUES
(1, 1, 5, 2018, 80, 70, 60, 50, 40, 33, 0, 100, 79, 69, 59, 49, 39, 32, 'A+', 'A', 'A-', 'B', 'C', 'F', 'F', 5, 4, 3.5, 3, 2, 0, 0),
(2, 1, 13, 2018, 80, 70, 60, 50, 40, 35, 0, 100, 80, 70, 60, 50, 40, 34, 'A+', 'A', 'B', 'C', 'D', 'E', 'F', 5, 4, 3.5, 3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_mgt_staff_info`
--

DROP TABLE IF EXISTS `borno_mgt_staff_info`;
CREATE TABLE IF NOT EXISTS `borno_mgt_staff_info` (
  `borno_mgt_staff_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_staff_serial_no` int(11) NOT NULL,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_shift_id` int(11) NOT NULL,
  `borno_mgt_staf_desig` varchar(300) NOT NULL,
  `borno_mgt_staff_name` varchar(300) NOT NULL,
  `borno_staff_father_name` varchar(300) NOT NULL,
  `borno_staff_mother_name` varchar(300) NOT NULL,
  `borno_staff_spouse_name` varchar(300) NOT NULL,
  `borno_staff_id` varchar(300) NOT NULL,
  `borno_staff_gadget_no` varchar(300) NOT NULL,
  `borno_staff_dob` date NOT NULL,
  `borno_staff_religion` varchar(300) NOT NULL,
  `borno_staff_gender` varchar(300) NOT NULL,
  `borno_staff_marital_status` varchar(300) NOT NULL,
  `borno_staff_blood_group` varchar(300) NOT NULL,
  `borno_staff_qualification` varchar(300) NOT NULL,
  `borno_staff_subject` varchar(300) NOT NULL,
  `borno_staff_national_id` int(11) NOT NULL,
  `borno_staff_passport_no` varchar(300) NOT NULL,
  `borno_staff_email_id` varchar(300) NOT NULL,
  `borno_staff_tin` varchar(300) NOT NULL,
  `borno_staff_first_join` date NOT NULL,
  `borno_staff_join_in_school` date NOT NULL,
  `borno_staff_mailing_address` varchar(300) NOT NULL,
  `borno_staff_permanent_address` varchar(300) NOT NULL,
  `borno_staff_org_type` varchar(50) NOT NULL,
  `borno_staff_phone` varchar(25) NOT NULL,
  `borno_staff_photo` varchar(150) NOT NULL,
  PRIMARY KEY (`borno_mgt_staff_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `borno_mgt_staff_info`
--

INSERT INTO `borno_mgt_staff_info` (`borno_mgt_staff_info_id`, `borno_staff_serial_no`, `borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_mgt_staf_desig`, `borno_mgt_staff_name`, `borno_staff_father_name`, `borno_staff_mother_name`, `borno_staff_spouse_name`, `borno_staff_id`, `borno_staff_gadget_no`, `borno_staff_dob`, `borno_staff_religion`, `borno_staff_gender`, `borno_staff_marital_status`, `borno_staff_blood_group`, `borno_staff_qualification`, `borno_staff_subject`, `borno_staff_national_id`, `borno_staff_passport_no`, `borno_staff_email_id`, `borno_staff_tin`, `borno_staff_first_join`, `borno_staff_join_in_school`, `borno_staff_mailing_address`, `borno_staff_permanent_address`, `borno_staff_org_type`, `borno_staff_phone`, `borno_staff_photo`) VALUES
(1, 1, 1, 1, 1, 'Office Staff', 'Nahid Hasan', 'A', 'B', 'C', '123', '10210', '2018-04-22', 'Islam', 'Male', 'Married', 'O +', 'B.Sc Eng. Com', 'Computer', 2147483647, 'MG124563', 'nahid.psoft@gmail.com', '1245675986', '2018-04-22', '2018-04-22', 'Dholaikhal', 'Madaripur', 'School', '8801914467257', '');

-- --------------------------------------------------------

--
-- Table structure for table `borno_result_add_term`
--

DROP TABLE IF EXISTS `borno_result_add_term`;
CREATE TABLE IF NOT EXISTS `borno_result_add_term` (
  `borno_result_term_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_result_term_name` varchar(150) NOT NULL,
  `borno_result_term_percent` int(11) NOT NULL,
  `term_type` int(11) NOT NULL,
  `term_status` int(11) NOT NULL,
  PRIMARY KEY (`borno_result_term_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `borno_result_add_term`
--

INSERT INTO `borno_result_add_term` (`borno_result_term_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `borno_result_term_name`, `borno_result_term_percent`, `term_type`, `term_status`) VALUES
(1, 1, 5, 2018, '1st Term Exam', 33, 1, 0),
(2, 1, 5, 2018, '2nd Term Exam', 33, 2, 0),
(4, 1, 13, 2018, 'First', 25, 1, 0),
(5, 1, 13, 2018, 'Seconh', 25, 2, 0),
(7, 1, 13, 2018, 'Annual', 50, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_result_number_type`
--

DROP TABLE IF EXISTS `borno_result_number_type`;
CREATE TABLE IF NOT EXISTS `borno_result_number_type` (
  `borno_result_number_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_result_subject_id` int(11) NOT NULL,
  `borno_school_number_type1` varchar(100) NOT NULL,
  `borno_school_number_type2` varchar(100) NOT NULL,
  `borno_school_number_type3` varchar(100) NOT NULL,
  `borno_school_number_type4` varchar(100) NOT NULL,
  `borno_school_number_type5` varchar(100) NOT NULL,
  `borno_school_number_type6` varchar(100) NOT NULL,
  PRIMARY KEY (`borno_result_number_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `borno_result_number_type`
--

INSERT INTO `borno_result_number_type` (`borno_result_number_type_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `borno_result_subject_id`, `borno_school_number_type1`, `borno_school_number_type2`, `borno_school_number_type3`, `borno_school_number_type4`, `borno_school_number_type5`, `borno_school_number_type6`) VALUES
(2, 1, 13, 2018, 0, 'Creative', 'Objective', 'Practical', 'CA', 'HW', 'CW');

-- --------------------------------------------------------

--
-- Table structure for table `borno_result_subject`
--

DROP TABLE IF EXISTS `borno_result_subject`;
CREATE TABLE IF NOT EXISTS `borno_result_subject` (
  `borno_result_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_school_subject_name` varchar(300) NOT NULL,
  `borno_school_subject_fullmark` int(11) NOT NULL,
  `subst` int(11) NOT NULL,
  PRIMARY KEY (`borno_result_subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `borno_result_subject`
--

INSERT INTO `borno_result_subject` (`borno_result_subject_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `borno_school_subject_name`, `borno_school_subject_fullmark`, `subst`) VALUES
(1, 1, 13, 2018, 'Bangla', 100, 0),
(2, 1, 13, 2018, 'Mathematics', 100, 0),
(3, 1, 13, 2018, 'English', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_result_subject_details`
--

DROP TABLE IF EXISTS `borno_result_subject_details`;
CREATE TABLE IF NOT EXISTS `borno_result_subject_details` (
  `borno_result_subject_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_result_term_id` int(11) NOT NULL,
  `borno_result_subject_id` int(11) NOT NULL,
  `number_type1_marks` int(11) NOT NULL,
  `number_type1_pass` int(11) NOT NULL,
  `number_type1_conv` int(11) NOT NULL,
  `number_type2_marks` int(11) NOT NULL,
  `number_type2_pass` int(11) NOT NULL,
  `number_type2_conv` int(11) NOT NULL,
  `number_type3_marks` int(11) NOT NULL,
  `number_type3_pass` int(11) NOT NULL,
  `number_type3_conv` int(11) NOT NULL,
  `number_type4_marks` int(11) NOT NULL,
  `number_type4_pass` int(11) NOT NULL,
  `number_type4_conv` int(11) NOT NULL,
  `number_type5_marks` int(11) NOT NULL,
  `number_type5_pass` int(11) NOT NULL,
  `number_type5_conv` int(11) NOT NULL,
  `number_type6_marks` int(11) NOT NULL,
  `number_type6_pass` int(11) NOT NULL,
  `number_type6_conv` int(11) NOT NULL,
  PRIMARY KEY (`borno_result_subject_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `borno_result_subject_details`
--

INSERT INTO `borno_result_subject_details` (`borno_result_subject_details_id`, `borno_school_id`, `borno_school_class_id`, `borno_school_session`, `borno_result_term_id`, `borno_result_subject_id`, `number_type1_marks`, `number_type1_pass`, `number_type1_conv`, `number_type2_marks`, `number_type2_pass`, `number_type2_conv`, `number_type3_marks`, `number_type3_pass`, `number_type3_conv`, `number_type4_marks`, `number_type4_pass`, `number_type4_conv`, `number_type5_marks`, `number_type5_pass`, `number_type5_conv`, `number_type6_marks`, `number_type6_pass`, `number_type6_conv`) VALUES
(1, 1, 13, 2018, 4, 1, 30, 10, 100, 40, 13, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0),
(2, 1, 13, 2018, 4, 2, 50, 17, 100, 30, 10, 100, 5, 2, 100, 15, 4, 100, 0, 0, 0, 0, 0, 0),
(3, 1, 13, 2018, 4, 3, 40, 13, 100, 30, 10, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0),
(4, 1, 13, 2018, 5, 1, 30, 10, 100, 40, 13, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0),
(5, 1, 13, 2018, 5, 2, 50, 17, 100, 30, 10, 100, 5, 2, 100, 15, 4, 100, 0, 0, 0, 0, 0, 0),
(6, 1, 13, 2018, 5, 3, 40, 13, 100, 30, 10, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0),
(7, 1, 13, 2018, 7, 1, 30, 10, 100, 40, 13, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0),
(8, 1, 13, 2018, 7, 2, 50, 17, 100, 30, 10, 100, 5, 2, 100, 15, 4, 100, 0, 0, 0, 0, 0, 0),
(9, 1, 13, 2018, 7, 3, 40, 13, 100, 30, 10, 100, 10, 3, 100, 20, 7, 100, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_school`
--

DROP TABLE IF EXISTS `borno_school`;
CREATE TABLE IF NOT EXISTS `borno_school` (
  `borno_school_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_name` varchar(300) NOT NULL,
  `borno_school_address` varchar(300) NOT NULL,
  `borno_school_phone` varchar(150) NOT NULL,
  `borno_school_email` varchar(150) NOT NULL,
  `borno_school_logid` varchar(150) NOT NULL,
  `borno_school_logpass` varchar(150) NOT NULL,
  `borno_school_logo` varchar(300) NOT NULL,
  `borno_user_id` int(11) NOT NULL,
  `borno_school_status` int(11) NOT NULL,
  PRIMARY KEY (`borno_school_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `borno_school`
--

INSERT INTO `borno_school` (`borno_school_id`, `borno_school_name`, `borno_school_address`, `borno_school_phone`, `borno_school_email`, `borno_school_logid`, `borno_school_logpass`, `borno_school_logo`, `borno_user_id`, `borno_school_status`) VALUES
(1, 'Tegharia High School', '', '', '', 'Tegharia', 'f7355f835a2f3f570f17b41ff4330693', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_branch`
--

DROP TABLE IF EXISTS `borno_school_branch`;
CREATE TABLE IF NOT EXISTS `borno_school_branch` (
  `borno_school_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_name` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_school_branch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `borno_school_branch`
--

INSERT INTO `borno_school_branch` (`borno_school_branch_id`, `borno_school_id`, `borno_school_branch_name`) VALUES
(1, 1, 'Main'),
(2, 1, 'Motijheel'),
(3, 1, 'moin'),
(4, 1, 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_class`
--

DROP TABLE IF EXISTS `borno_school_class`;
CREATE TABLE IF NOT EXISTS `borno_school_class` (
  `borno_school_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_class_name` varchar(300) NOT NULL,
  `clorder` int(11) NOT NULL,
  `class_step` int(11) NOT NULL,
  PRIMARY KEY (`borno_school_class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `borno_school_class`
--

INSERT INTO `borno_school_class` (`borno_school_class_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_name`, `clorder`, `class_step`) VALUES
(1, 1, 1, 'Ten', 14, 2),
(2, 1, 1, 'Nine', 13, 2),
(3, 1, 1, 'Eight', 12, 1),
(4, 1, 1, 'Seven', 11, 1),
(5, 1, 1, 'Six', 10, 1),
(6, 2, 2, 'Four', 8, 0),
(10, 2, 2, 'Five', 9, 0),
(13, 0, 0, 'One', 5, 0),
(14, 0, 0, 'Two', 6, 0),
(15, 0, 0, 'Three', 7, 0),
(16, 0, 0, 'Eleven', 15, 3),
(17, 0, 0, 'Twelve', 16, 3),
(18, 0, 0, 'Play', 1, 0),
(19, 0, 0, 'Nursery', 2, 0),
(20, 0, 0, 'KG', 3, 0),
(21, 1, 1, 'Shishu', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_group`
--

DROP TABLE IF EXISTS `borno_school_group`;
CREATE TABLE IF NOT EXISTS `borno_school_group` (
  `borno_school_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_group_Name` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_school_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `borno_school_group`
--

INSERT INTO `borno_school_group` (`borno_school_group_id`, `borno_school_id`, `borno_school_group_Name`) VALUES
(6, 1, 'Tanvir Noyon'),
(3, 1, 'Noyon'),
(5, 1, 'Siam Hossain');

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_group_number`
--

DROP TABLE IF EXISTS `borno_school_group_number`;
CREATE TABLE IF NOT EXISTS `borno_school_group_number` (
  `borno_school_group_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_group_id` int(11) NOT NULL,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_group_us_name` varchar(300) NOT NULL,
  `borno_school_group_us_number` varchar(15) NOT NULL,
  PRIMARY KEY (`borno_school_group_number_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `borno_school_group_number`
--

INSERT INTO `borno_school_group_number` (`borno_school_group_number_id`, `borno_school_group_id`, `borno_school_id`, `borno_school_group_us_name`, `borno_school_group_us_number`) VALUES
(1, 3, 1, 'Faruk', '8801818101210'),
(2, 3, 1, 'Moin', '8801911091611'),
(3, 3, 1, 'Nahid', '8801911091611');

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_section`
--

DROP TABLE IF EXISTS `borno_school_section`;
CREATE TABLE IF NOT EXISTS `borno_school_section` (
  `borno_school_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_shift_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_section_name` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_school_section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `borno_school_section`
--

INSERT INTO `borno_school_section` (`borno_school_section_id`, `borno_school_shift_id`, `borno_school_class_id`, `borno_school_branch_id`, `borno_school_id`, `borno_school_section_name`) VALUES
(3, 3, 5, 1, 1, 'A'),
(4, 3, 5, 1, 1, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_set_class`
--

DROP TABLE IF EXISTS `borno_school_set_class`;
CREATE TABLE IF NOT EXISTS `borno_school_set_class` (
  `borno_school_set_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `class_order` int(11) NOT NULL,
  PRIMARY KEY (`borno_school_set_class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `borno_school_set_class`
--

INSERT INTO `borno_school_set_class` (`borno_school_set_class_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `class_order`) VALUES
(1, 1, 1, 5, 1),
(2, 1, 1, 4, 2),
(3, 1, 1, 3, 3),
(4, 1, 1, 2, 4),
(5, 1, 1, 1, 5),
(6, 1, 1, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borno_school_shift`
--

DROP TABLE IF EXISTS `borno_school_shift`;
CREATE TABLE IF NOT EXISTS `borno_school_shift` (
  `borno_school_shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_shift_name` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_school_shift_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `borno_school_shift`
--

INSERT INTO `borno_school_shift` (`borno_school_shift_id`, `borno_school_class_id`, `borno_school_branch_id`, `borno_school_id`, `borno_school_shift_name`) VALUES
(1, 0, 0, 0, 'No'),
(2, 0, 0, 0, 'Morning'),
(3, 0, 0, 0, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `borno_sent_sms`
--

DROP TABLE IF EXISTS `borno_sent_sms`;
CREATE TABLE IF NOT EXISTS `borno_sent_sms` (
  `borno_sent_sms_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_shift_id` int(11) NOT NULL,
  `borno_school_section_id` int(11) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_school_roll` int(11) NOT NULL,
  `borno_school_student_name` varchar(300) NOT NULL,
  `borno_sent_sms_phone` varchar(25) NOT NULL,
  `borno_sms_status` varchar(20) NOT NULL,
  `borno_sms_type` int(11) NOT NULL,
  `borno_sent_sms_message` varchar(300) NOT NULL,
  `borno_sms_date` date NOT NULL,
  `borno_sms_time` time NOT NULL,
  PRIMARY KEY (`borno_sent_sms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=885 ;

--
-- Dumping data for table `borno_sent_sms`
--

INSERT INTO `borno_sent_sms` (`borno_sent_sms_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_roll`, `borno_school_student_name`, `borno_sent_sms_phone`, `borno_sms_status`, `borno_sms_type`, `borno_sent_sms_message`, `borno_sms_date`, `borno_sms_time`) VALUES
(1, 1, 1, 5, 2, 333, 2018, 0, 'Abdullah Mohammad Shuon', '888801869227887', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(2, 1, 1, 2, 3, 12, 2018, 1, 'RIDITA SARKER', '8801912427008', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(3, 1, 1, 1, 3, 6, 2018, 1, 'MST.SHORMILA AKTHER', '8801758157900', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(4, 1, 1, 5, 3, 21, 2018, 1, 'Mrs Lamia Akter', '8801735098297', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(5, 1, 1, 3, 3, 13, 2018, 1, 'JAKARIA MAHMUD RIZVE', '8801860650149', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(6, 1, 1, 5, 3, 20, 2018, 1, 'Rafida Islam', '8801715114326', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(7, 1, 1, 1, 3, 1, 2018, 1, 'MD.RAYHAN MIAH', '8801748302947', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(8, 1, 1, 3, 3, 15, 2018, 1, 'ROFIA TABASSUM', '8801743545068', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(9, 1, 1, 4, 3, 17, 2018, 1, 'JOYA TALUKDER', '8801708671524', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(10, 1, 1, 3, 3, 14, 2018, 1, 'NUSRAT JAHAN AKHI', '8801715664087', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(11, 1, 1, 4, 3, 16, 2018, 1, 'PIAN SARKER', '8801940392739', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(12, 1, 1, 4, 3, 18, 2018, 1, 'KANIJ SADIA ALMA', '8801743056440', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(13, 1, 1, 2, 3, 9, 2018, 1, 'RABBI HASAN', '8801764463111', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(14, 1, 1, 5, 3, 0, 2018, 1, 'Noyon', '888801864236548', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(15, 1, 1, 2, 3, 12, 2018, 2, 'RIMA AKTER', '8801754880051', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(16, 1, 1, 1, 3, 6, 2018, 2, 'TAMANNA MIM', '8801793313147', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(17, 1, 1, 1, 3, 3, 2018, 2, 'SAKIB HASAN HRIDOY', '8801720246805', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(18, 1, 1, 4, 3, 18, 2018, 2, 'MORIOM AKTER SINTHIA', '8801765582513', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(19, 1, 1, 3, 3, 14, 2018, 2, 'JOUTI SARKAR', '8801859141517', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(20, 1, 1, 5, 3, 20, 2018, 2, 'Khadija Aktar Nupur', '8801714287693', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(21, 1, 1, 3, 3, 13, 2018, 2, 'MD.ABU KASEM', '8801991073496', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(22, 1, 1, 5, 3, 0, 2018, 2, 'Anil Ahmad', '88880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(23, 1, 1, 2, 3, 7, 2018, 2, 'MD.TOUHID', '8801796998662', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(24, 1, 1, 4, 3, 17, 2018, 2, 'NAYONTARA AKTER', '8801684689469', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(25, 1, 1, 2, 3, 10, 2018, 2, 'Rima Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(26, 1, 1, 3, 3, 15, 2018, 2, 'JANNAT AKTER', '8801787727159', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(27, 1, 1, 4, 3, 16, 2018, 2, 'APON SARKAR', '8801987794873', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(28, 1, 1, 5, 3, 21, 2018, 2, 'Rumpa Akter', '8801949566067', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(29, 1, 1, 2, 3, 12, 2018, 3, 'PRIANKA BISWAS', '8801916980981', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(30, 1, 1, 4, 3, 17, 2018, 3, 'HELENA AKTER HENA', '8801716173293', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(31, 1, 1, 4, 3, 16, 2018, 3, 'MD. ALBI HOSSAIN', '8801912725355', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(32, 1, 1, 1, 3, 3, 2018, 3, 'MD.HASANANUR RAHAMAN(HASAN)', '8801750915852', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(33, 1, 1, 3, 3, 14, 2018, 3, 'JANNAT AKTER', '8801710010392', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(34, 1, 1, 5, 3, 20, 2018, 3, 'Musfika Aktar Sabrin', '8801876342318', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(35, 1, 1, 2, 3, 9, 2018, 3, 'SIDHU SARKAR', '8801712723590', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(36, 1, 1, 5, 3, 21, 2018, 3, 'Fatema Akter', '8801825391996', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(37, 1, 1, 3, 3, 13, 2018, 3, 'MD.NAEEM KAZI', '8801790966834', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(38, 1, 1, 3, 3, 15, 2018, 3, 'LATA GHOSH TISHA', '8801712261161', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(39, 1, 1, 1, 3, 4, 2018, 3, 'PUJA MOLLIK', '8801775114932', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(40, 1, 1, 4, 3, 16, 2018, 3, 'Mansdura', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(41, 1, 1, 4, 3, 18, 2018, 4, 'JARIN AKTER MIM', '8801731101779', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(42, 1, 1, 4, 3, 16, 2018, 4, 'AZIZUL HOK TAHASAN', '8801912725355', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(43, 1, 1, 4, 3, 17, 2018, 4, 'ARINA SHIKDER', '8801704959735', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(44, 1, 1, 3, 3, 14, 2018, 4, 'ESMOTARA', '8801980118596', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(45, 1, 1, 5, 3, 20, 2018, 4, 'Srabonty Talukder', '8801882045238', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(46, 1, 1, 1, 3, 3, 2018, 4, 'MD.NAYEMUL ISLAM', '8801874911289', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(47, 1, 1, 3, 3, 15, 2018, 4, 'PATA GHOSH TINA', '8801712261161', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(48, 1, 1, 3, 3, 13, 2018, 4, 'PALASH BISWAS', '8801920450180', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(49, 1, 1, 5, 3, 21, 2018, 4, 'Sanjida Akter', '8801704989535', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(50, 1, 1, 1, 3, 4, 2018, 4, 'AFROZA AKTER SUMANA', '8801714287698', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(51, 1, 1, 1, 3, 5, 2018, 5, 'AKHI AKTER', '8801989091849', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(52, 1, 1, 2, 3, 12, 2018, 5, 'SADIA AKTER', '8801790094966', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(53, 1, 1, 2, 3, 9, 2018, 5, 'MD. MAHBUB HOSSAIN', '8801715040699', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(54, 1, 1, 5, 3, 19, 2018, 5, 'Mustakn', '8801711733468', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(55, 1, 1, 4, 3, 17, 2018, 5, 'UMMA TULY', '8801752577596', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(56, 1, 1, 4, 3, 16, 2018, 5, 'MD. SAKIBUL HASAN', '8801798094302', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(57, 1, 1, 5, 3, 20, 2018, 5, 'Mithela Aktar', '8801945347723', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(58, 1, 1, 1, 3, 1, 2018, 5, 'MANIK SHAHA', '8801789993222', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(59, 1, 1, 3, 3, 14, 2018, 5, 'NUSRAT JAHAN LUBNA', '8801704655252', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(60, 1, 1, 4, 3, 18, 2018, 5, 'MORIOM AKTER', '8801994327045', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(61, 1, 1, 5, 3, 21, 2018, 5, 'Mim Akter', '8801912722391', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(62, 1, 1, 3, 3, 15, 2018, 5, 'URMILA AKTER', '8801935848229', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(63, 1, 1, 3, 3, 13, 2018, 5, 'Udoy Mollik', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(64, 1, 1, 2, 3, 10, 2018, 6, 'APORNA GHOSH', '8801728166771', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(65, 1, 1, 5, 3, 20, 2018, 6, 'Fahima Aktar', '8801732674574', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(66, 1, 1, 3, 3, 14, 2018, 6, 'ARPIOTA TALUKDER', '8801715346187', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(67, 1, 1, 4, 3, 18, 2018, 6, 'KAKOLI RANE DAS', '880184647017', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(68, 1, 1, 4, 3, 16, 2018, 6, 'SRABON SARKAR JOY', '8801728068610', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(69, 1, 1, 5, 3, 21, 2018, 6, 'Hapy Akter', '8801720915944', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(70, 1, 1, 1, 3, 4, 2018, 6, 'PUJA SARKER', '8801770919139', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(71, 1, 1, 3, 3, 13, 2018, 6, 'MD.MUNNA', '8801764012360', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(72, 1, 1, 5, 3, 19, 2018, 6, 'Shamim', '8801748679634', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(73, 1, 1, 4, 3, 17, 2018, 6, 'JOBA TALUKDER', '8801948890453', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(74, 1, 1, 1, 3, 1, 2018, 6, 'Sakib Ahmad', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(75, 1, 1, 3, 3, 15, 2018, 6, 'Afroja Akter Ruma', '8801913778614', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(76, 1, 1, 2, 3, 12, 2018, 7, 'ARIFA AKTER', '8801965383393', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(77, 1, 1, 1, 3, 6, 2018, 7, 'AFRIN AKTER', '8801818623188', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(78, 1, 1, 1, 3, 3, 2018, 7, 'MD.YEAMIN ISLAM RAFI', '8801714881380', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(79, 1, 1, 2, 3, 7, 2018, 7, 'ANTAR SARKAR', '8801789424502', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(80, 1, 1, 4, 3, 17, 2018, 7, 'NUPUR SARKER', '8801715691683', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(81, 1, 1, 3, 3, 13, 2018, 7, 'SHEFATUZAMAN SHEFAT', '8801828178867', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(82, 1, 1, 5, 3, 19, 2018, 7, 'Shahin Ahmad', '8801922184275', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(83, 1, 1, 4, 3, 18, 2018, 7, 'BIBI KHADIJA', '8801798819937', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(84, 1, 1, 3, 3, 15, 2018, 7, 'HUMAIYA AKTER HENA', '8801789635365', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(85, 1, 1, 5, 3, 21, 2018, 7, 'Irin Akter', '8801724067479', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(86, 1, 1, 5, 3, 20, 2018, 7, 'Shopna Aktar', '8801869742911', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(87, 1, 1, 3, 3, 14, 2018, 7, 'RITU SARKER', '8801936300302', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(88, 1, 1, 1, 3, 3, 2018, 8, 'SHAMIM MOLLA', '8801922184275', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(89, 1, 1, 5, 3, 20, 2018, 8, 'Mrs.sumaiya Aktar', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(90, 1, 1, 5, 3, 21, 2018, 8, 'Farjana Akter', '8801928896148', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(91, 1, 1, 4, 3, 17, 2018, 8, 'SRABONTI SARKER', '8801757134482', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(92, 1, 1, 3, 3, 15, 2018, 8, 'RAKIBA AKTER MEGHLA', '8801922029713', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(93, 1, 1, 3, 3, 14, 2018, 8, 'ANYTA ISLAM HIMU', '8801704655252', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(94, 1, 1, 3, 3, 13, 2018, 8, 'MD.TARIKUL ISLAM SHITOL', '8801833264539', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(95, 1, 1, 5, 3, 19, 2018, 8, 'Pritom Talukder', '8801915011553', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(96, 1, 1, 4, 3, 18, 2018, 8, 'FATEMA AKTER', '8801741601211', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(97, 1, 1, 1, 3, 4, 2018, 8, 'KOBITA AKTER', '8801929427478', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(98, 1, 1, 4, 3, 16, 2018, 8, 'Md.Samir Hossen', '8801795599687', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(99, 1, 1, 2, 3, 10, 2018, 8, 'Boishakhi Akter Tisa', '8801799141939', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(100, 1, 1, 2, 3, 7, 2018, 8, 'Dipto Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(101, 1, 1, 1, 3, 6, 2018, 9, 'SELINA AKTER', '8801763049969', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(102, 1, 1, 4, 3, 16, 2018, 9, 'FASHEL AHMED OVE', '8801920804423', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(103, 1, 1, 5, 3, 20, 2018, 9, 'Sdiya Aktar', '8801924095819', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(104, 1, 1, 3, 3, 13, 2018, 9, 'SHAWON SARKAR', '8801861158919', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(105, 1, 1, 4, 3, 18, 2018, 9, 'LAMEYA AKTER ALPONA', '8801709450456', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(106, 1, 1, 3, 3, 15, 2018, 9, 'MARIA AKTER', '8801797670393', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(107, 1, 1, 2, 3, 7, 2018, 9, 'MIDUL HASEN ROHAN', '8801947426232', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(108, 1, 1, 1, 3, 1, 2018, 9, 'SOGIB DAS', '8801798827491', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(109, 1, 1, 5, 3, 21, 2018, 9, 'Hape  Akter', '8801833612193', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(110, 1, 1, 4, 3, 17, 2018, 9, 'ANEMA TALUKDER', '8801731705021', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(111, 1, 1, 5, 3, 19, 2018, 9, 'Md.Shiyam Ahmad', '8801715522151', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(112, 1, 1, 3, 3, 14, 2018, 9, 'Shupty Talukder', '880171422748', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(113, 1, 1, 1, 3, 6, 2018, 10, 'MUSKA JAHAN EIFAT', '8801961694501', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(114, 1, 1, 1, 3, 1, 2018, 10, 'ABDUL ROHMAN SOJIB', '8801716614365', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(115, 1, 1, 5, 3, 19, 2018, 10, 'Jisan ul Islam Somrat', '8801760482106', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(116, 1, 1, 3, 3, 13, 2018, 10, 'MD.WALID AHMED', '8801776718640', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(117, 1, 1, 5, 3, 21, 2018, 10, 'Ivana', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(118, 1, 1, 3, 3, 14, 2018, 10, 'ETIY SARKER', '8801714393134', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(119, 1, 1, 3, 3, 15, 2018, 10, 'SHAHEDA AKTER', '8801824335764', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(120, 1, 1, 4, 3, 17, 2018, 10, 'ANU TALUKDER', '8801928912618', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(121, 1, 1, 5, 3, 20, 2018, 10, 'Megla Aktar Irin', '8801786536494', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(122, 1, 1, 2, 3, 7, 2018, 10, 'EMON TALUK DER', '8801765834312', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(123, 1, 1, 2, 3, 10, 2018, 10, 'NUSRAT JAHAN ANTORA', '8801850074389', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(124, 1, 1, 4, 3, 16, 2018, 10, 'Fardin Ahmad', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(125, 1, 1, 4, 3, 18, 2018, 10, 'Runa Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(126, 1, 1, 2, 3, 11, 2018, 11, 'RABAYA AKTER', '8801981061578', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(127, 1, 1, 1, 3, 6, 2018, 11, 'FATEMA AKTER KEYA', '8801754881196', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(128, 1, 1, 4, 3, 17, 2018, 11, 'SABONTY SARKER', '8801715794502', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(129, 1, 1, 3, 3, 15, 2018, 11, 'ISRAT GHAN', '8801789979111', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(130, 1, 1, 1, 3, 1, 2018, 11, 'YEASIN MIA', '8801798885780', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(131, 1, 1, 5, 3, 21, 2018, 11, 'Anika Akter Sinthia', '8801675378386', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(132, 1, 1, 5, 3, 19, 2018, 11, 'Tanbir Ahmad', '8801859514657', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(133, 1, 1, 3, 3, 13, 2018, 11, 'RAJESH SARKER', '8801725177017', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(134, 1, 1, 4, 3, 18, 2018, 11, 'FATEMA AKTER', '8801878589150', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(135, 1, 1, 5, 3, 20, 2018, 11, 'Arfa Aktar Joy', '8801726917757', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(136, 1, 1, 2, 3, 7, 2018, 11, 'MD. EMON MIA', '8801776308158', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(137, 1, 1, 4, 3, 16, 2018, 11, 'DIP SARKAR', '8801924075639', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(138, 1, 1, 3, 3, 14, 2018, 11, 'Pranty sarker', '8801932989984', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(139, 1, 1, 2, 3, 11, 2018, 12, 'SORNA AKTER', '8801978939444', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(140, 1, 1, 1, 3, 1, 2018, 12, 'EMON PODDER SONET', '8801722484489', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(141, 1, 1, 3, 3, 14, 2018, 12, 'AFRIN AKTTER', '8801715092264', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(142, 1, 1, 4, 3, 17, 2018, 12, 'ASHA AKTER SAFEYA', '8801763540279', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(143, 1, 1, 5, 3, 21, 2018, 12, 'Mukta Akter', '8801922848803', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(144, 1, 1, 5, 3, 20, 2018, 12, 'Jerin Aktar', '8801747797732', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(145, 1, 1, 3, 3, 13, 2018, 12, 'MD.JUNAYED HOSSAIN', '8801835217188', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(146, 1, 1, 5, 3, 19, 2018, 12, 'Maruf Billah', '8801750484219', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(147, 1, 1, 1, 3, 4, 2018, 12, 'TISA MONI', '8801708957238', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(148, 1, 1, 3, 3, 15, 2018, 12, 'Tanzila Akter', '8801718287006', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(149, 1, 1, 4, 3, 16, 2018, 12, 'Ontu Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(150, 1, 1, 4, 3, 18, 2018, 12, 'Karina Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(151, 1, 1, 2, 3, 7, 2018, 12, 'Md.Rony Showdagar', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(152, 1, 1, 2, 3, 11, 2018, 13, 'ASIA AKTER MUNMUN', '8801737932339', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(153, 1, 1, 1, 3, 6, 2018, 13, 'SUMIYA AKTER SIMU', '8801796601386', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(154, 1, 1, 3, 3, 14, 2018, 13, 'KHADIJA AKTER MITU', '8801913895480', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(155, 1, 1, 5, 3, 20, 2018, 13, 'Nusrat Islam', '8801928717357', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(156, 1, 1, 3, 3, 13, 2018, 13, 'OLIMUR', '8801819992771', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(157, 1, 1, 5, 3, 19, 2018, 13, 'Shahim Ahmad Antor', '8801787735058', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(158, 1, 1, 1, 3, 1, 2018, 13, 'MEHEDI HASAN', '8801797222302', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(159, 1, 1, 5, 3, 21, 2018, 13, 'Kulsum Begum', '8801766813724', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(160, 1, 1, 2, 3, 7, 2018, 13, 'MD. MD. SAEIM', '8801712181378', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(161, 1, 1, 4, 3, 17, 2018, 13, 'LAMIA AKTER TISHA', '8801938678322', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(162, 1, 1, 4, 3, 18, 2018, 13, 'TINA ISLAM', '8801738212943', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(163, 1, 1, 3, 3, 15, 2018, 13, 'MESEL', '8801780486275', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(164, 1, 1, 4, 3, 16, 2018, 13, 'Choyon Talukder', '8801867501645', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(165, 1, 1, 1, 3, 5, 2018, 14, 'MASTURA RASHID', '8801764373054', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(166, 1, 1, 2, 3, 11, 2018, 14, 'PINKE AKTER MUNNI', '8801715392468', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(167, 1, 1, 5, 3, 20, 2018, 14, 'Tanjila Aktar', '8801775452648', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(168, 1, 1, 1, 3, 1, 2018, 14, 'MD.SOYKAT', '8801727846520', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(169, 1, 1, 4, 3, 18, 2018, 14, 'SUMAIYA AKTER SINTHIA', '8801929552036', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(170, 1, 1, 4, 3, 16, 2018, 14, 'MD. SAIFUL ISLAM', '8801797169089', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(171, 1, 1, 4, 3, 17, 2018, 14, 'JOHURA AKTER FATAMA', '8801757389394', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(172, 1, 1, 3, 3, 13, 2018, 14, 'MD.WALID', '8801850823560', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(173, 1, 1, 3, 3, 15, 2018, 14, 'RABAYA AKTER', '8801740907074', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(174, 1, 1, 5, 3, 21, 2018, 14, 'Simla Mondol', '8801789604793', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(175, 1, 1, 5, 3, 19, 2018, 14, 'Arafat  Hossain Shihab', '8801712457016', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(176, 1, 1, 3, 3, 14, 2018, 14, 'ETIY ROY', '8801731337156', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(177, 1, 1, 2, 3, 7, 2018, 14, 'Sipon Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(178, 1, 1, 1, 3, 5, 2018, 15, 'JANNATUL ISLAM', '8801760669309', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(179, 1, 1, 4, 3, 16, 2018, 15, 'MD. MAHFUZ HASSAN', '8801816689100', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(180, 1, 1, 4, 3, 18, 2018, 15, 'SURUVI AKTER', '8801741777550', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(181, 1, 1, 3, 3, 15, 2018, 15, 'SUMIYA AKTER TANHA', '8801720316740', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(182, 1, 1, 3, 3, 14, 2018, 15, 'SONIYA AKTER', '8801798890559', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(183, 1, 1, 2, 3, 10, 2018, 15, 'SANTA AKTER', '8801742566579', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(184, 1, 1, 3, 3, 13, 2018, 15, 'SHOSIKUL ISLAM', '8801818552264', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(185, 1, 1, 5, 3, 21, 2018, 15, 'Aleya Akter Ratri', '8801994276544', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(186, 1, 1, 5, 3, 19, 2018, 15, 'habibur Rahaman Jihad', '8801712907274', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(187, 1, 1, 5, 3, 20, 2018, 15, 'Megla Talukder', '8801912993369', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(188, 1, 1, 2, 3, 7, 2018, 15, 'SOLYMAN SHAK', '8801778060426', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(189, 1, 1, 2, 3, 11, 2018, 15, 'Santa Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(190, 1, 1, 1, 3, 3, 2018, 15, 'Mehebub Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(191, 1, 1, 1, 3, 4, 2018, 16, 'NUSRAT ZAHAN NADIA', '8801722527733', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(192, 1, 1, 3, 3, 13, 2018, 16, 'JONY HOSSIN', '8801839820813', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(193, 1, 1, 4, 3, 16, 2018, 16, 'HASAN', '8801757753219', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(194, 1, 1, 2, 3, 7, 2018, 16, 'SIAM HOSEN', '8801733534764', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(195, 1, 1, 5, 3, 20, 2018, 16, 'Shuchona Ray', '8801775835740', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(196, 1, 1, 1, 3, 1, 2018, 16, 'MD.ARAFAT MOLLAH', '8801721527535', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(197, 1, 1, 3, 3, 14, 2018, 16, 'NUSRAT JAHAN TABASSUM', '8801712145543', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(198, 1, 1, 4, 3, 17, 2018, 16, 'ISRAT JAHAN MOLI', '8801720246825', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(199, 1, 1, 4, 3, 18, 2018, 16, 'SUMAIYA', '8801859986031', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(200, 1, 1, 5, 3, 21, 2018, 16, 'Lamia Akter', '8801727614963', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(201, 1, 1, 5, 3, 19, 2018, 16, 'Orpon Talukder', '8801798885778', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(202, 1, 1, 2, 3, 11, 2018, 16, 'Fhusbu Akter', '8801779285422', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(203, 1, 1, 3, 3, 15, 2018, 16, 'Santa Akter', '8801760793708', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(204, 1, 1, 1, 3, 5, 2018, 17, 'Prity Talukder', '8801915011553', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(205, 1, 1, 2, 3, 11, 2018, 17, 'TANVIR MAHAMUD', '8801712621256', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(206, 1, 1, 4, 3, 17, 2018, 17, 'SANALI AKTER MAYA', '8801715876118', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(207, 1, 1, 2, 3, 9, 2018, 17, 'MD. MEHEDI HASAN', '8801869667313', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(208, 1, 1, 3, 3, 15, 2018, 17, 'MIS.FATEMA RAKHE', '8801771611358', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(209, 1, 1, 3, 3, 14, 2018, 17, 'SRISTY TALUKDER', '8801932989985', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(210, 1, 1, 5, 3, 21, 2018, 17, 'Akhi Akter', '8801766593050', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(211, 1, 1, 3, 3, 13, 2018, 17, 'GISUN', '8801960629216', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(212, 1, 1, 1, 3, 1, 2018, 17, 'ZUNAED', '8801704959793', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(213, 1, 1, 5, 3, 20, 2018, 17, 'Oshi Ray', '8801954596518', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(214, 1, 1, 5, 3, 19, 2018, 17, 'Shabon Talukder', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(215, 1, 1, 4, 3, 16, 2018, 17, 'Tanbir Mahmud', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(216, 1, 1, 4, 3, 18, 2018, 17, 'Bristy Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(217, 1, 1, 1, 3, 6, 2018, 18, 'AMENA AKTER PRIYA', '8801754881196', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(218, 1, 1, 5, 3, 19, 2018, 18, 'Arafat Shinha', '8801765337080', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(219, 1, 1, 3, 3, 14, 2018, 18, 'HASINA AKTER', '8801959393730', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(220, 1, 1, 3, 3, 13, 2018, 18, 'OVI SARKER', '8801727857922', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(221, 1, 1, 1, 3, 1, 2018, 18, 'MD.PARVEZ AHMED', '8801865423948', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(222, 1, 1, 4, 3, 18, 2018, 18, 'MIM AKTER', '8801715002253', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(223, 1, 1, 5, 3, 21, 2018, 18, 'Sonia', '8801756869814', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(224, 1, 1, 3, 3, 15, 2018, 18, 'SUMAIYA AKTER', '8801923474656', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(225, 1, 1, 5, 3, 20, 2018, 18, 'Shuma Aktar', '8801758454000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(226, 1, 1, 4, 3, 16, 2018, 18, 'Rifat Hosan', '88017459110723', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(227, 1, 1, 4, 3, 17, 2018, 18, 'Nisat tasnim Shobnam', '8801725830229', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(228, 1, 1, 2, 3, 10, 2018, 18, 'Satu Talukder', '8801765670546', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(229, 1, 1, 2, 3, 7, 2018, 18, 'Md.Abir Hossain', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(230, 1, 1, 1, 3, 5, 2018, 19, 'MIM AKTER', '8801856658564', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(231, 1, 1, 3, 3, 14, 2018, 19, 'SNEHA', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(232, 1, 1, 5, 3, 21, 2018, 19, 'Aleka Akter Khuku', '8801747777252', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(233, 1, 1, 3, 3, 13, 2018, 19, 'SHAWON AHMED KAIUM', '8801709432528', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(234, 1, 1, 3, 3, 15, 2018, 19, 'RUMA AKTER RAJMONY', '8801762410350', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(235, 1, 1, 1, 3, 1, 2018, 19, 'EMON TUHIN MOLLA', '8801912222677', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(236, 1, 1, 2, 3, 10, 2018, 19, 'EITE MOLLICK', '8801935940027', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(237, 1, 1, 4, 3, 18, 2018, 19, 'SUMYIA AHMMED SOHANA', '8801791763802', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(238, 1, 1, 5, 3, 20, 2018, 19, 'Shanjida Islam Seneha', '8801913449627', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(239, 1, 1, 4, 3, 17, 2018, 19, 'NODY', '8801989370516', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(240, 1, 1, 2, 3, 7, 2018, 19, 'ABIR MAHAMUD SHIHAV', '8801954938103', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(241, 1, 1, 5, 3, 19, 2018, 19, 'Mostafijur Rhaman Rahad', '8801777422705', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(242, 1, 1, 4, 3, 16, 2018, 19, 'Tonmoy Sorkar', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(243, 1, 1, 1, 3, 5, 2018, 20, 'MST. SANTA', '8801727842347', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(244, 1, 1, 1, 3, 2, 2018, 20, 'MD. PMAR FARUK', '8801799589767', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(245, 1, 1, 2, 3, 10, 2018, 20, 'RATNA AKTER', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(246, 1, 1, 5, 3, 19, 2018, 20, 'Shohel Rana', '8801858914752', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(247, 1, 1, 3, 3, 14, 2018, 20, 'MIM AKTER', '8801732265966', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(248, 1, 1, 5, 3, 21, 2018, 20, 'Shamia Akter Juthi', '8801914982082', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(249, 1, 1, 2, 3, 8, 2018, 20, 'MD. TIPU', '8801741029429', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(250, 1, 1, 4, 3, 18, 2018, 20, 'YEASMIN AKTER', '8801791919066', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(251, 1, 1, 5, 3, 20, 2018, 20, 'Urmy Mollik', '8801719336633', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(252, 1, 1, 4, 3, 17, 2018, 20, 'Jannat ', '8801719994539', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(253, 1, 1, 3, 3, 13, 2018, 20, 'Mahruf Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(254, 1, 1, 5, 3, 21, 2018, 20, 'Samia ', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(255, 1, 1, 4, 3, 16, 2018, 20, 'Md.Jahid Hossain', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(256, 1, 1, 3, 3, 15, 2018, 20, 'Sonali Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(257, 1, 1, 4, 3, 18, 2018, 21, 'MAYA AKTEI MARUFA', '8801955269267', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(258, 1, 1, 5, 3, 19, 2018, 21, 'Ganguly Sarkar', '8801814100234', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(259, 1, 1, 3, 3, 15, 2018, 21, 'PRITY SARKER', '8801956587815', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(260, 1, 1, 1, 3, 3, 2018, 21, 'AUVI JEET SARKER', '8801753419131', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(261, 1, 1, 5, 3, 21, 2018, 21, 'Nupur Sarker', '8801748562104', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(262, 1, 1, 5, 3, 20, 2018, 21, 'Anita Aktar', '8801913449627', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(263, 1, 1, 2, 3, 9, 2018, 21, 'MD. YEARUB HOSSAIN', '8801871266029', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(264, 1, 1, 4, 3, 16, 2018, 21, 'MD. SAKIL SHEIKH', '8801712609374', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(265, 1, 1, 1, 3, 4, 2018, 21, 'ORPITA SARKAR', '8801623813929', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(266, 1, 1, 2, 3, 10, 2018, 21, 'Oporna Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(267, 1, 1, 3, 3, 14, 2018, 21, 'Afrin Jahan Payel', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(268, 1, 1, 3, 3, 13, 2018, 21, 'Eyasin', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(269, 1, 1, 2, 3, 11, 2018, 22, 'BRISTY ROY', '8801963274664', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(270, 1, 1, 1, 3, 2, 2018, 22, 'MD. SEFAT MIA', '8801715092262', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(271, 1, 1, 3, 3, 13, 2018, 22, 'MARUF AHMED', '8801716424393', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(272, 1, 1, 5, 3, 19, 2018, 22, 'Mishon Mollik', '8801924573646', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(273, 1, 1, 3, 3, 15, 2018, 22, 'AKHI AKTER SRITI', '8801777556118', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(274, 1, 1, 5, 3, 21, 2018, 22, 'jannatul Ferdows jui', '8801717370544', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(275, 1, 1, 4, 3, 17, 2018, 22, 'NUPUR AKTAR', '8801621459058', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(276, 1, 1, 3, 3, 14, 2018, 22, 'AFROZA AKTER', '8801862704217', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(277, 1, 1, 5, 3, 20, 2018, 22, 'Keya Aktar', '8801836336864', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(278, 1, 1, 1, 3, 4, 2018, 22, 'ANTORA AKTER', '8801724672341', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(279, 1, 1, 4, 3, 16, 2018, 22, 'Siyam Rockman', '8801704656081', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(280, 1, 1, 4, 3, 18, 2018, 22, 'Samiul Akter Nishy', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(281, 1, 1, 2, 3, 7, 2018, 22, 'Sojib Talukder', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(282, 1, 1, 1, 3, 6, 2018, 23, 'TAMANNA AKTER', '8801763909107', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(283, 1, 1, 2, 3, 10, 2018, 23, 'CHOITY MOLLICK', '8801798878320', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(284, 1, 1, 3, 3, 13, 2018, 23, 'SHAON HOSSIAN', '8801764372900', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(285, 1, 1, 3, 3, 15, 2018, 23, 'RAJIA AKTER', '8801731206975', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(286, 1, 1, 5, 3, 21, 2018, 23, 'Shohana Akter', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(287, 1, 1, 5, 3, 20, 2018, 23, 'Marufa Aktar', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(288, 1, 1, 5, 3, 19, 2018, 23, 'Md.Najmul', '8801687136240', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(289, 1, 1, 1, 3, 1, 2018, 23, 'MD.SHANTO MIA', '8801878180516', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(290, 1, 1, 4, 3, 17, 2018, 23, 'SRETI', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(291, 1, 1, 3, 3, 14, 2018, 23, 'PRIONTI TALUKDER', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(292, 1, 1, 4, 3, 16, 2018, 23, 'Md.Nadim', '880179960199', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(293, 1, 1, 4, 3, 18, 2018, 23, 'Shimla Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(294, 1, 1, 1, 3, 2, 2018, 24, 'MD. SOHAN ISLAM', '8801924095819', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(295, 1, 1, 3, 3, 13, 2018, 24, 'ARNOB TALUKDER', '8801991056193', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(296, 1, 1, 3, 3, 15, 2018, 24, 'SONIA AKTER', '8801747875196', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(297, 1, 1, 5, 3, 21, 2018, 24, 'Ummy Habiba Shefa', '8801918383832', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(298, 1, 1, 5, 3, 19, 2018, 24, 'Himel Sarkar', '8801934412313', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(299, 1, 1, 5, 3, 20, 2018, 24, 'Nasiya Aktar', '8801723583414', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(300, 1, 1, 4, 3, 17, 2018, 24, 'JANNATUL FERDOUS RITU', '8801943789702', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(301, 1, 1, 2, 3, 7, 2018, 24, 'MD. MERAJ', '8801934552105', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(302, 1, 1, 4, 3, 16, 2018, 24, 'BIJOY  SARKER', '8801911884739', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(303, 1, 1, 1, 3, 4, 2018, 24, 'MAGLA TALUKDER', '8801674378583', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(304, 1, 1, 4, 3, 18, 2018, 24, 'MIM AKTER', '8801736499348', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(305, 1, 1, 3, 3, 14, 2018, 24, 'Zilik Bapari', '8801914511519', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(306, 1, 1, 2, 3, 11, 2018, 24, 'Zakiya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(307, 1, 1, 3, 3, 13, 2018, 25, 'SEFAT MOLLA', '8801763909107', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(308, 1, 1, 4, 3, 16, 2018, 25, 'SHIMUL', '8801773241220', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(309, 1, 1, 4, 3, 17, 2018, 25, 'RIYA TALUKDER', '8801716371313', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(310, 1, 1, 5, 3, 20, 2018, 25, 'Shusmita Talukder', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(311, 1, 1, 2, 3, 7, 2018, 25, 'MD. ISMAIL HOSSAIN', '8801798819985', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(312, 1, 1, 3, 3, 15, 2018, 25, 'MORIYOM MIM', '8801812323839', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(313, 1, 1, 5, 3, 19, 2018, 25, 'Proshad Sarkar', '8801855053168', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(314, 1, 1, 1, 3, 4, 2018, 25, 'UMMA HABIBA', '8801752577596', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(315, 1, 1, 2, 3, 10, 2018, 25, 'Potima Mondol', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(316, 1, 1, 5, 3, 21, 2018, 25, 'Asha Akter Akhi', '8801922818807', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(317, 1, 1, 4, 3, 18, 2018, 25, 'MST. ROTNA', '8801706580806', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(318, 1, 1, 3, 3, 14, 2018, 25, 'KHAINUR AKTER KEYA', '8801729844414', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(319, 1, 1, 1, 3, 2, 2018, 25, 'MD. SAJJAD HOSSEN', '8801966744883', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(320, 1, 1, 2, 3, 9, 2018, 25, 'Ismail Hossain', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(321, 1, 1, 1, 3, 2, 2018, 26, 'SRIJON SARKAR', '8801861158199', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(322, 1, 1, 3, 3, 13, 2018, 26, 'AHOSAN HOQ EMON', '8801836570496', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(323, 1, 1, 3, 3, 14, 2018, 26, 'SHAHINUR AKTER', '8801732153762', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(324, 1, 1, 5, 3, 19, 2018, 26, 'Onik Boshu', '8801733088229', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(325, 1, 1, 3, 3, 15, 2018, 26, 'SUMAIYA AKTER', '8801716614365', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(326, 1, 1, 4, 3, 16, 2018, 26, 'MOBARAK HOSSAIN NUR', '8801763000026', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(327, 1, 1, 5, 3, 20, 2018, 26, 'Shanjida Aktar', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(328, 1, 1, 5, 3, 21, 2018, 26, 'Shanjida Akter Shorna', '8801833963890', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(329, 1, 1, 1, 3, 4, 2018, 26, 'MIM AKTER', '8801835070713', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(330, 1, 1, 4, 3, 17, 2018, 26, 'Mahmuda Akter', '8801712945837', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(331, 1, 1, 4, 3, 18, 2018, 26, 'Romana Akter Simu', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(332, 1, 1, 2, 3, 11, 2018, 26, 'Bristy Mondol', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(333, 1, 1, 2, 3, 7, 2018, 27, 'NURUL ISLAM NIAM', '8801835127148', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(334, 1, 1, 3, 3, 14, 2018, 27, 'LOTUFA AKTER', '8801778204169', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(335, 1, 1, 5, 3, 20, 2018, 27, 'Mrs.Bristy Aktar Dhigy', '8801777556118', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(336, 1, 1, 3, 3, 13, 2018, 27, 'AB.ROHIM', '8801715810197', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(337, 1, 1, 5, 3, 19, 2018, 27, 'Meherab Islam Bijoy', '8801792553075', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(338, 1, 1, 4, 3, 16, 2018, 27, 'ABDUL AHAD', '8801715047462', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(339, 1, 1, 4, 3, 17, 2018, 27, 'AYESHA', '8801787727350', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(340, 1, 1, 1, 3, 1, 2018, 27, 'MD.YEAMEN', '8801929779840', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(341, 1, 1, 5, 3, 21, 2018, 27, 'Fahima Akter', '8801798807274', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(342, 1, 1, 3, 3, 15, 2018, 27, 'NUSRAT JAHAN', '8801716797458', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(343, 1, 1, 1, 3, 4, 2018, 27, 'JUMA AKTER', '8801720395254', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(344, 1, 1, 2, 3, 11, 2018, 27, 'Shongita Sarker', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(345, 1, 1, 5, 3, 19, 2018, 28, 'Abdullah Mohammad Shuon', '8801869227887', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(346, 1, 1, 3, 3, 14, 2018, 28, 'ARNIKA SARKER', '8801720429347', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(347, 1, 1, 3, 3, 15, 2018, 28, 'EANUR', '8801715160011', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(348, 1, 1, 4, 3, 17, 2018, 28, 'KAKOLI RANI', '8801923623851', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(349, 1, 1, 4, 3, 16, 2018, 28, 'MERAJ HOSAN', '8801768701617', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(350, 1, 1, 1, 3, 1, 2018, 28, 'MD.TAKBIR AHMED', '8801740542931', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(351, 1, 1, 5, 3, 21, 2018, 28, 'Hafsha Akter Khadija', '8801705765217', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(352, 1, 1, 1, 3, 4, 2018, 28, 'BRISTY SARKER', '8801782684292', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(353, 1, 1, 2, 3, 7, 2018, 28, 'FAHIM MIA', '8801709432831', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(354, 1, 1, 3, 3, 13, 2018, 28, 'MD.MAHEBUB AHMED SANJID', '8801716230062', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(355, 1, 1, 5, 3, 20, 2018, 28, 'Shetheya Aktar', '8801706967489', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(356, 1, 1, 2, 3, 11, 2018, 28, 'Mim', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(357, 1, 1, 1, 3, 5, 2018, 29, 'LAMIA AKTER', '8801683693910', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(358, 1, 1, 2, 3, 7, 2018, 29, 'MD. RIFAT', '8801873491972', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(359, 1, 1, 5, 3, 19, 2018, 29, 'Abul Hossain Shujon', '8801869227887', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(360, 1, 1, 1, 3, 1, 2018, 29, 'MD.IBRAHIM', '8801742021941', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(361, 1, 1, 4, 3, 18, 2018, 29, 'ALO AKTHER ROJA', '8801725504259', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(362, 1, 1, 4, 3, 17, 2018, 29, 'SORNA SARKER', '8801775604713', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(363, 1, 1, 3, 3, 15, 2018, 29, 'MAHFUZA AKTER MORIOM', '8801718205617', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(364, 1, 1, 3, 3, 14, 2018, 29, 'MARIA', '8801883257745', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(365, 1, 1, 5, 3, 21, 2018, 29, 'Srabonty Akter', '8801884640787', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(366, 1, 1, 3, 3, 13, 2018, 29, 'SHUVA SARKAR', '8801782684292', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(367, 1, 1, 5, 3, 20, 2018, 29, 'Kajol Rekha', '8801721832266', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(368, 1, 1, 4, 3, 16, 2018, 29, 'Yamin', '8801715254477', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(369, 1, 1, 2, 3, 10, 2018, 29, 'Tammanna Khanom', '8801741709211', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(370, 1, 1, 1, 3, 5, 2018, 30, 'TASLIM AKTAR', '8801741360300', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(371, 1, 1, 3, 3, 13, 2018, 30, 'JOY SARKER', '8801741490828', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(372, 1, 1, 4, 3, 17, 2018, 30, 'MARJIA AKTER', '8801988589641', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(373, 1, 1, 5, 3, 19, 2018, 30, 'Amdadul Haq Shihad', '8801985533874', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(374, 1, 1, 5, 3, 20, 2018, 30, 'Choity Sarkar', '8801741463792', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(375, 1, 1, 2, 3, 10, 2018, 30, 'HAJERA AKTER', '8801791282091', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(376, 1, 1, 1, 3, 1, 2018, 30, 'MD.SHAWON MIA', '8801799836176', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(377, 1, 1, 3, 3, 14, 2018, 30, 'TANGINA AKTER MUNA', '8801772042181', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(378, 1, 1, 2, 3, 7, 2018, 30, 'MD.MOLLA OMOR', '8801757767309', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(379, 1, 1, 5, 3, 21, 2018, 30, 'Mrs.Nur Jannat', '8801792805521', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(380, 1, 1, 3, 3, 15, 2018, 30, 'Bithe Das', '8801733667505', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(381, 1, 1, 4, 3, 16, 2018, 30, 'Foysal mia', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(382, 1, 1, 2, 3, 10, 2018, 31, 'TRISHA DAS', '8801832613332', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(383, 1, 1, 4, 3, 16, 2018, 31, 'RAKIB', '8801777643147', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(384, 1, 1, 3, 3, 13, 2018, 31, 'MD.ZIHAD', '8801758454000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(385, 1, 1, 5, 3, 20, 2018, 31, 'Alifa Jahan Munaiya', '8801720902061', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(386, 1, 1, 5, 3, 21, 2018, 31, 'Maniya Akter', '8801915724719', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(387, 1, 1, 3, 3, 15, 2018, 31, 'RUPA AKTER', '8801791434204', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(388, 1, 1, 5, 3, 19, 2018, 31, 'Polas Ahmad Tuhin', '8801790970149', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(389, 1, 1, 3, 3, 14, 2018, 31, 'ANAMIKA SWOA', '8801797222122', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(390, 1, 1, 1, 3, 4, 2018, 31, 'URMI AKTER', '8801709450459', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(391, 1, 1, 2, 3, 7, 2018, 31, 'Md.Sifat', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(392, 1, 1, 1, 3, 1, 2018, 31, 'Abdul Ahad', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(393, 1, 1, 1, 3, 5, 2018, 32, 'ARPITA SARKAR', '8801946274406', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(394, 1, 1, 1, 3, 2, 2018, 32, 'NUR HOSSEN', '8801771260140', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(395, 1, 1, 2, 3, 7, 2018, 32, 'KAWSER ISLAM RAKIB', '8801791565145', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(396, 1, 1, 2, 3, 10, 2018, 32, 'FARJANA AKTER', '8801704807515', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(397, 1, 1, 3, 3, 15, 2018, 32, 'SATHI AKTER', '8801790230977', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(398, 1, 1, 5, 3, 21, 2018, 32, 'Kajol Akter', '8801927808136', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(399, 1, 1, 4, 3, 16, 2018, 32, 'IBTASAM AHMED TASIM', '8801915603562', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(400, 1, 1, 5, 3, 20, 2018, 32, 'Rokeya Aktar Orpa', '8801715297901', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(401, 1, 1, 5, 3, 19, 2018, 32, 'Md.Ibrahim Kholil', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(402, 1, 1, 3, 3, 14, 2018, 32, 'ISRAT JHANE MIM', '8801751584370', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(403, 1, 1, 3, 3, 13, 2018, 32, 'Abul Khayer Polok', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(404, 1, 1, 1, 3, 6, 2018, 33, 'SUBORNA KIRTONIA', '8801709610323', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(405, 1, 1, 5, 3, 20, 2018, 33, 'Tanjila  Aktar Poly', '8801883256969', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(406, 1, 1, 2, 3, 10, 2018, 33, 'MAHARUN NASA', '8801740907074', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(407, 1, 1, 5, 3, 19, 2018, 33, 'Mahi Shek', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(408, 1, 1, 3, 3, 14, 2018, 33, 'JANNATUL NAYMA', '8801924578271', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(409, 1, 1, 4, 3, 17, 2018, 33, 'KANIKA RANI', '8801725691808', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(410, 1, 1, 4, 3, 18, 2018, 33, 'SINTHIA AKTER', '8801715529083', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(411, 1, 1, 5, 3, 21, 2018, 33, 'Farjana  Aktar', '8801866099303', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(412, 1, 1, 1, 3, 1, 2018, 33, 'MD.MERAJ HOSSAIN', '8801758711969', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(413, 1, 1, 4, 3, 16, 2018, 33, 'SAJJAD', '8801741774531', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(414, 1, 1, 3, 3, 13, 2018, 33, 'OMOR FARUK', '8801732319444', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(415, 1, 1, 3, 3, 15, 2018, 33, 'Chadni', '8801799472613', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(416, 1, 1, 2, 3, 7, 2018, 33, 'Sarowar Hossain Omit', '8801715428058', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(417, 1, 1, 2, 3, 11, 2018, 34, 'SADIA AKTER (MIM)', '8801709450456', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(418, 1, 1, 1, 3, 6, 2018, 34, 'URMILA AKTER', '8801706689676', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(419, 1, 1, 1, 3, 2, 2018, 34, 'MD. SOJIB', '8801728827415', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(420, 1, 1, 5, 3, 20, 2018, 34, 'Sadiya Aktar', '8801921468362', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(421, 1, 1, 3, 3, 15, 2018, 34, 'TASMIN AKTER MITU', '8801742167206', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(422, 1, 1, 3, 3, 14, 2018, 34, 'SINTHIA', '8801718334808', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(423, 1, 1, 4, 3, 18, 2018, 34, 'ANTORA', '8801795114859', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(424, 1, 1, 4, 3, 17, 2018, 34, 'SADIA AKTER', '8801787722823', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(425, 1, 1, 5, 3, 19, 2018, 34, 'Shakib Hasan', '8801991169874', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(426, 1, 1, 2, 3, 7, 2018, 34, 'TONMOY MIA', '8801924487022', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(427, 1, 1, 4, 3, 16, 2018, 34, 'SHAHADAT', '8801727888080', 'All student', 1, 'Test', '2018-03-15', '13:01:11');
INSERT INTO `borno_sent_sms` (`borno_sent_sms_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_roll`, `borno_school_student_name`, `borno_sent_sms_phone`, `borno_sms_status`, `borno_sms_type`, `borno_sent_sms_message`, `borno_sms_date`, `borno_sms_time`) VALUES
(428, 1, 1, 5, 3, 21, 2018, 34, 'Tanjila Akter', '8801719022282', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(429, 1, 1, 3, 3, 13, 2018, 34, 'Md.Ali', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(430, 1, 1, 1, 3, 5, 2018, 35, 'ANIKA RANI SARKER', '8801982365484', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(431, 1, 1, 1, 3, 2, 2018, 35, 'MD. SAGOR HOSSAIN', '8801748356690', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(432, 1, 1, 2, 3, 10, 2018, 35, 'Farzana', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(433, 1, 1, 5, 3, 20, 2018, 35, 'Nusrat  Jahan Arifa', '8801913827999', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(434, 1, 1, 5, 3, 21, 2018, 35, 'Maria Akter', '8801984658544', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(435, 1, 1, 4, 3, 17, 2018, 35, 'RUMPA AKTER', '8801782120302', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(436, 1, 1, 3, 3, 14, 2018, 35, 'ARPA SARKAR', '8801812175286', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(437, 1, 1, 5, 3, 19, 2018, 35, 'Md.Shohag Mia', '8801734467197', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(438, 1, 1, 3, 3, 15, 2018, 35, 'FAHIMA AKTER', '8801777086923', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(439, 1, 1, 4, 3, 18, 2018, 35, 'MST. KHADIJA AKTER', '8801834411725', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(440, 1, 1, 3, 3, 13, 2018, 35, 'Jihadul Shek', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(441, 1, 1, 2, 3, 7, 2018, 35, 'Md.Simul', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(442, 1, 1, 3, 3, 13, 2018, 36, 'APURDO MONDOL', '8801925387251', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(443, 1, 1, 2, 3, 10, 2018, 36, 'FARIA AKTER', '8801749379045', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(444, 1, 1, 4, 3, 17, 2018, 36, 'SOHANA', '8801787727350', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(445, 1, 1, 5, 3, 20, 2018, 36, 'Srimita Shrity Das', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(446, 1, 1, 5, 3, 19, 2018, 36, 'Md.Kawsar Ahmad', '8801981061578', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(447, 1, 1, 1, 3, 4, 2018, 36, 'NUSRAT AKTER', '8801792553075', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(448, 1, 1, 5, 3, 21, 2018, 36, 'Tasmim Taniya', '8801798624952', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(449, 1, 1, 2, 3, 7, 2018, 36, 'PROKASH SARKAR', '8801779899223', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(450, 1, 1, 3, 3, 15, 2018, 36, 'Ritu Akter', '8801738825046', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(451, 1, 1, 3, 3, 14, 2018, 36, 'Fatema', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(452, 1, 1, 1, 3, 1, 2018, 36, 'Tusar Islam', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(453, 1, 1, 1, 3, 5, 2018, 37, 'TANIA AKTER', '8801735819538', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(454, 1, 1, 2, 3, 11, 2018, 37, 'NEHA AKTER', '8801922636232', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(455, 1, 1, 5, 3, 21, 2018, 37, 'Ontora Mondol', '8801714877406', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(456, 1, 1, 2, 3, 7, 2018, 37, 'EYASIN SHAK', '8801759138666', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(457, 1, 1, 4, 3, 18, 2018, 37, 'KHADIJA AKTER', '8801911188771', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(458, 1, 1, 3, 3, 13, 2018, 37, 'MARUF AHAMED(SULMAN', '8801827839027', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(459, 1, 1, 4, 3, 16, 2018, 37, 'FORHAD', '8801782370629', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(460, 1, 1, 5, 3, 19, 2018, 37, 'Shudip Dey', '8801855616419', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(461, 1, 1, 3, 3, 14, 2018, 37, 'UPOMA TALUKDER', '880177812500', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(462, 1, 1, 5, 3, 20, 2018, 37, 'Asha Aktar', '8801786060597', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(463, 1, 1, 4, 3, 17, 2018, 37, 'Sumiya Akter', '880188296198', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(464, 1, 1, 3, 3, 15, 2018, 37, 'Rumu Akter', '8801863620893', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(465, 1, 1, 2, 3, 11, 2018, 37, 'Niha Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(466, 1, 1, 1, 3, 2, 2018, 37, 'Rifat Mollah', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(467, 1, 1, 1, 3, 6, 2018, 38, 'SUSHMITA  SARKAR', '8801923778580', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(468, 1, 1, 4, 3, 16, 2018, 38, 'ROKY MIA', '8801764363425', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(469, 1, 1, 5, 3, 20, 2018, 38, 'Orpyta Talukder', '8801712956932', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(470, 1, 1, 5, 3, 19, 2018, 38, 'Jubayer Islam', '8801714300661', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(471, 1, 1, 2, 3, 7, 2018, 38, 'ATIK', '8801791763576', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(472, 1, 1, 3, 3, 15, 2018, 38, 'UMME HABIBA MIM', '8801715886315', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(473, 1, 1, 4, 3, 17, 2018, 38, 'KHADIJA AKTER DHOLI', '8801732999160', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(474, 1, 1, 5, 3, 21, 2018, 38, 'Shuborna Akter', '8801920485579', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(475, 1, 1, 4, 3, 18, 2018, 38, 'NESHA', '8801717844664', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(476, 1, 1, 1, 3, 1, 2018, 38, 'LIKHON SARKER', '8801883426493', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(477, 1, 1, 3, 3, 13, 2018, 38, 'Fahad Molla', '8801816076558', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(478, 1, 1, 3, 3, 14, 2018, 38, 'Santona Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(479, 1, 1, 2, 3, 11, 2018, 38, 'Nadiya Aktar', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(480, 1, 1, 2, 3, 11, 2018, 39, 'KAMRUN NAHER MIM', '8801738424273', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(481, 1, 1, 1, 3, 5, 2018, 39, 'RAZIA SULTANA', '8801823937723', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(482, 1, 1, 3, 3, 14, 2018, 39, 'SUMAIYA AKTER', '8801711237819', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(483, 1, 1, 5, 3, 21, 2018, 39, 'Natijuma Akter  Tarin', '8801754298891', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(484, 1, 1, 3, 3, 13, 2018, 39, 'SOURAV HASAN ROBI', '8801755092912', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(485, 1, 1, 3, 3, 15, 2018, 39, 'SUBORNA AKTER MIM', '8801775986438', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(486, 1, 1, 2, 3, 7, 2018, 39, 'SHOWRAV MONDOL', '8801871308702', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(487, 1, 1, 5, 3, 19, 2018, 39, 'Niyaj Hossain Molla', '8801861152112', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(488, 1, 1, 4, 3, 17, 2018, 39, 'FAMEDA AKTER', '8801726487055', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(489, 1, 1, 5, 3, 20, 2018, 39, 'Jannatul Aktar', '8801930349403', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(490, 1, 1, 1, 3, 1, 2018, 39, 'JOY SARKAR', '8801811420402', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(491, 1, 1, 4, 3, 18, 2018, 39, 'SADIA', '8801681834325', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(492, 1, 1, 4, 3, 16, 2018, 39, 'Eyamin', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(493, 1, 1, 2, 3, 7, 2018, 40, 'BHOJON SARKER', '8801786562777', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(494, 1, 1, 3, 3, 15, 2018, 40, 'MEHERUN NESA', '8801726672061', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(495, 1, 1, 3, 3, 14, 2018, 40, 'MARIA AKHTER BORSHA', '8801771763438', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(496, 1, 1, 4, 3, 16, 2018, 40, 'SAGOR', '8801911396598', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(497, 1, 1, 5, 3, 20, 2018, 40, 'Priya Ghosh', '8801773686094', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(498, 1, 1, 5, 3, 19, 2018, 40, 'Shohag Mia', '8801798829965', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(499, 1, 1, 3, 3, 13, 2018, 40, 'REZWAN UL KARIM NOUR', '8801770045860', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(500, 1, 1, 5, 3, 21, 2018, 40, 'Eti Akter Sumi', '8801934472829', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(501, 1, 1, 1, 3, 3, 2018, 40, 'MD.FARDOUS MOLLA', '8801876285583', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(502, 1, 1, 4, 3, 17, 2018, 40, 'NUSRAT JAHAN NIDRA', '8801926423891', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(503, 1, 1, 1, 3, 4, 2018, 40, 'PRANTI TALUKDAR', '8801780190874', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(504, 1, 1, 2, 3, 11, 2018, 40, 'Eti Kapaly', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(505, 1, 1, 1, 3, 5, 2018, 41, 'NURAJANNAT CHADNI', '8801715178279', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(506, 1, 1, 1, 3, 2, 2018, 41, 'MD. FAYSAL', '8801920485709', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(507, 1, 1, 5, 3, 19, 2018, 41, 'Ashif Mia', '8801797202219', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(508, 1, 1, 5, 3, 21, 2018, 41, 'Fatema Akter', '8801937065653', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(509, 1, 1, 3, 3, 14, 2018, 41, 'ROTNA AKTER', '8801779817470', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(510, 1, 1, 5, 3, 20, 2018, 41, 'Amina Aktar', '8801732838989', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(511, 1, 1, 4, 3, 18, 2018, 41, 'HUMAYRA KHANOM PROMA', '8801674315754', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(512, 1, 1, 3, 3, 13, 2018, 41, 'Jitu Sarker', '8801884640788', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(513, 1, 1, 3, 3, 15, 2018, 41, 'Ms.Mohima Akter', '8801706580829', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(514, 1, 1, 4, 3, 16, 2018, 41, 'Rofikul Islam', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(515, 1, 1, 4, 3, 17, 2018, 41, 'Aska Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(516, 1, 1, 2, 3, 7, 2018, 41, 'Srabon', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(517, 1, 1, 1, 3, 5, 2018, 42, 'NAJMUNNAHER RIA', '8801850135856', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(518, 1, 1, 1, 3, 2, 2018, 42, 'MD ARNOB', '8801869667304', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(519, 1, 1, 4, 3, 17, 2018, 42, 'ARFINE SOSEE', '8801742167206', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(520, 1, 1, 3, 3, 14, 2018, 42, 'JANNATUL FERDUS SUPTY', '8801732588240', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(521, 1, 1, 5, 3, 20, 2018, 42, 'Shurobe', '8801720396373', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(522, 1, 1, 5, 3, 19, 2018, 42, 'Ayon Sarkar', '8801914511519', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(523, 1, 1, 4, 3, 18, 2018, 42, 'SUMAIYA AKTER RUPA', '8801704087875', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(524, 1, 1, 5, 3, 21, 2018, 42, 'Mrs.Meherun Nesha Mou', '8801839475332', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(525, 1, 1, 2, 3, 9, 2018, 42, 'JAERUL ISLAM RABBI', '8801990604997', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(526, 1, 1, 3, 3, 13, 2018, 42, 'LAMIM MOLLA', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(527, 1, 1, 2, 3, 10, 2018, 42, 'PRIYA SARKAR', '8801799141917', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(528, 1, 1, 4, 3, 16, 2018, 42, 'Amin Hosan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(529, 1, 1, 3, 3, 15, 2018, 42, 'Lamiya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(530, 1, 1, 4, 3, 18, 2018, 43, 'RAKHI AKTER MIN', '8801955805492', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(531, 1, 1, 3, 3, 13, 2018, 43, 'MD.REDOY', '88017034959697', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(532, 1, 1, 3, 3, 14, 2018, 43, 'AYSHA', '8801728134222', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(533, 1, 1, 3, 3, 15, 2018, 43, 'PURNIMA SARKER', '8801853001502', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(534, 1, 1, 1, 3, 4, 2018, 43, 'MERINA AKTER', '8801711276519', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(535, 1, 1, 5, 3, 21, 2018, 43, 'Mohima Islam Mim', '8801839475332', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(536, 1, 1, 5, 3, 20, 2018, 43, 'Mim', '8801921609911', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(537, 1, 1, 5, 3, 19, 2018, 43, 'Ponkoj', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(538, 1, 1, 4, 3, 17, 2018, 43, 'Kaniz fatema', '8801790425995', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(539, 1, 1, 2, 3, 12, 2018, 43, 'Md.Kowsar Hossain', '8801765688557', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(540, 1, 1, 2, 3, 11, 2018, 43, 'Fatema Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(541, 1, 1, 1, 3, 1, 2018, 43, 'Md.Jahid Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(542, 1, 1, 3, 3, 14, 2018, 44, 'PRITHI DAS', '8801915187846', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(543, 1, 1, 4, 3, 18, 2018, 44, 'SUMIYA BAKTER RIMU', '8801718383367', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(544, 1, 1, 5, 3, 19, 2018, 44, 'Jubayer Ahmad Rohan', '8801718560882', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(545, 1, 1, 4, 3, 16, 2018, 44, 'SOFIKUL', '8801878780722', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(546, 1, 1, 2, 3, 10, 2018, 44, 'HALIMA AKTER', '8801928041977', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(547, 1, 1, 2, 3, 7, 2018, 44, 'NAIEM BHUYAN RATUL', '8801705149773', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(548, 1, 1, 1, 3, 4, 2018, 44, 'MANIKA SARKAR', '8801726629195', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(549, 1, 1, 5, 3, 21, 2018, 44, 'Shohana Akter', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(550, 1, 1, 5, 3, 20, 2018, 44, 'Anjuma Ara Lisa', '8801799777717', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(551, 1, 1, 3, 3, 15, 2018, 44, 'MUNNI AKHTER', '8801832888331', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(552, 1, 1, 1, 3, 2, 2018, 44, 'AFRIDA AHAMMED', '8801709450447', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(553, 1, 1, 4, 3, 17, 2018, 44, 'Rubyia Aktar', '880188296198', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(554, 1, 1, 3, 3, 13, 2018, 44, 'Shahadat', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(555, 1, 1, 1, 3, 5, 2018, 45, 'ROJINA AKTER', '8801725178279', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(556, 1, 1, 2, 3, 11, 2018, 45, 'SUMYA AKTER', '8801925950005', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(557, 1, 1, 2, 3, 7, 2018, 45, 'NIME', '8801748356690', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(558, 1, 1, 3, 3, 14, 2018, 45, 'ESRAT JAHAN', '8801922337651', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(559, 1, 1, 5, 3, 20, 2018, 45, 'Tusa Sarkar', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(560, 1, 1, 3, 3, 13, 2018, 45, 'MD.GLOM RABEY', '8801790909126', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(561, 1, 1, 5, 3, 21, 2018, 45, 'Joba Akter', '8801791713049', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(562, 1, 1, 3, 3, 15, 2018, 45, 'POPY', '8801780247884', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(563, 1, 1, 4, 3, 18, 2018, 45, 'AMINA AKTER AKHI', '8801716444647', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(564, 1, 1, 5, 3, 19, 2018, 45, 'Imon Das', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(565, 1, 1, 1, 3, 1, 2018, 45, 'MD.SAIFULLAH', '8801983920431', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(566, 1, 1, 4, 3, 17, 2018, 45, 'mim Akter', '8801798807274', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(567, 1, 1, 1, 3, 5, 2018, 46, 'RESMA AKTER', '8801923111552', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(568, 1, 1, 1, 3, 2, 2018, 46, 'RONY SAHA', '8801715794905', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(569, 1, 1, 2, 3, 9, 2018, 46, 'HABIBUR RAHMAN', '8801777579333', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(570, 1, 1, 5, 3, 21, 2018, 46, 'Israt jahan', '88010955335218', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(571, 1, 1, 3, 3, 13, 2018, 46, 'SAYEM AHAMMAD', '8801724271766', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(572, 1, 1, 5, 3, 19, 2018, 46, 'Dipraj Chondho', '880186384396', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(573, 1, 1, 5, 3, 20, 2018, 46, 'Mem', '8801710899559', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(574, 1, 1, 3, 3, 14, 2018, 46, 'TAMANNA AKTER', '88017655448109', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(575, 1, 1, 4, 3, 17, 2018, 46, 'Amina Akay', '8801766812212', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(576, 1, 1, 3, 3, 15, 2018, 46, 'Eva Moni', '8801777422934', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(577, 1, 1, 2, 3, 10, 2018, 46, 'Ritu Sarker', '8801921685420', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(578, 1, 1, 4, 3, 16, 2018, 46, 'Sojib Miah', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(579, 1, 1, 4, 3, 16, 2018, 46, 'Shawon Mondol', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(580, 1, 1, 5, 3, 20, 2018, 47, 'Fatema Aktar', '8801911847610', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(581, 1, 1, 4, 3, 17, 2018, 47, 'MIM AKTER', '8801863758322', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(582, 1, 1, 2, 3, 7, 2018, 47, 'SAGOR', '8801765816987', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(583, 1, 1, 1, 3, 1, 2018, 47, 'MD.NAEEM AHAMED', '8801875479511', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(584, 1, 1, 4, 3, 16, 2018, 47, 'ANTOR GHOSH', '8801813168661', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(585, 1, 1, 5, 3, 19, 2018, 47, 'Al Imran Shihab', '8801745227073', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(586, 1, 1, 3, 3, 14, 2018, 47, 'PAYEL AKTER', '8801777643088', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(587, 1, 1, 2, 3, 10, 2018, 47, 'SUPORNA SARKER', '8801845253064', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(588, 1, 1, 1, 3, 4, 2018, 47, 'UMME HABIBA JUMKA', '8801791713049', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(589, 1, 1, 3, 3, 13, 2018, 47, 'Sobuj Mia', '8801732265966', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(590, 1, 1, 3, 3, 15, 2018, 47, 'Shimla Akter', '8801754074539', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(591, 1, 1, 5, 3, 21, 2018, 47, 'Monira Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(592, 1, 1, 5, 3, 19, 2018, 48, 'Shishir Sarkar', '8801851317378', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(593, 1, 1, 4, 3, 16, 2018, 48, 'ASHU DAS', '8801920259793', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(594, 1, 1, 3, 3, 13, 2018, 48, 'RATUL', '8801911548901', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(595, 1, 1, 1, 3, 1, 2018, 48, 'PROKASH SARKAR', '8801676814750', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(596, 1, 1, 2, 3, 8, 2018, 48, 'MD. SUSMOY MIA', '8801924467022', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(597, 1, 1, 3, 3, 14, 2018, 48, 'SABIHA AKTER RITTIKA', '8801925917662', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(598, 1, 1, 1, 3, 4, 2018, 48, 'KANIG FATEMA', '8801717226724', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(599, 1, 1, 3, 3, 15, 2018, 48, 'DIPTY SORKER', '8801992809023', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(600, 1, 1, 5, 3, 20, 2018, 48, 'Tajrin Aktar', '8801717222192', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(601, 1, 1, 4, 3, 17, 2018, 48, 'Ms.Sadia Akter', '88017421577604', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(602, 1, 1, 5, 3, 21, 2018, 48, 'Samiya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(603, 1, 1, 2, 3, 11, 2018, 48, 'Puza Sha', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(604, 1, 1, 1, 3, 5, 2018, 49, 'SAFALI', '8801799837796', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(605, 1, 1, 2, 3, 10, 2018, 49, 'RAFAZA KHATUN', '8801756359594', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(606, 1, 1, 4, 3, 17, 2018, 49, 'SANGETA ROY', '8801771218014', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(607, 1, 1, 3, 3, 13, 2018, 49, 'ANIK BORMON', '8801761079189', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(608, 1, 1, 2, 3, 8, 2018, 49, 'MURSHID CHAN', '8801717222192', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(609, 1, 1, 3, 3, 15, 2018, 49, 'ANAMIKA DEY', '8801765816987', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(610, 1, 1, 5, 3, 20, 2018, 49, 'Fatema Tuj Puspo', '8801711986295', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(611, 1, 1, 5, 3, 19, 2018, 49, 'Ibrahim', '8801715959242', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(612, 1, 1, 4, 3, 16, 2018, 49, 'HASAN', '8801883257745', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(613, 1, 1, 3, 3, 14, 2018, 49, 'Tasfia Sultana Neha', '8801786333120', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(614, 1, 1, 1, 3, 5, 2018, 50, 'NAHIDA AKTER', '8801682042835', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(615, 1, 1, 1, 3, 2, 2018, 50, 'MD. WARIN', '8801799317126', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(616, 1, 1, 2, 3, 7, 2018, 50, 'MD.RAKIB HASAN', '8801789803166', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(617, 1, 1, 3, 3, 15, 2018, 50, 'MARUFA AKTHER MOHONA', '8801715042461', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(618, 1, 1, 3, 3, 14, 2018, 50, 'SUMAYA AKTER', '8801675578158', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(619, 1, 1, 5, 3, 19, 2018, 50, 'Shourob Moni Das', '8801914878739', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(620, 1, 1, 4, 3, 17, 2018, 50, 'SINTHIA AKTER MIM', '8801709450459', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(621, 1, 1, 5, 3, 20, 2018, 50, 'Ifty Aktar Nishe', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(622, 1, 1, 3, 3, 13, 2018, 50, 'Md.Shamim Mollah', '8801881557895', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(623, 1, 1, 4, 3, 16, 2018, 50, 'Bappy Sarker', '8801675917661', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(624, 1, 1, 3, 3, 14, 2018, 51, 'EFU AKTER', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(625, 1, 1, 1, 3, 4, 2018, 51, 'BORSA JAHAN MIM', '8801838103811', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(626, 1, 1, 5, 3, 20, 2018, 51, 'Mrs.Shumana Aktar', '8801986340108', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(627, 1, 1, 2, 3, 7, 2018, 51, 'AMK', '8801715496968', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(628, 1, 1, 3, 3, 15, 2018, 51, 'NURAIYA AKTER NUPUR', '8801715901018', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(629, 1, 1, 5, 3, 19, 2018, 51, 'Apon Ahman', '8801790529146', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(630, 1, 1, 4, 3, 16, 2018, 51, 'Siduk Islam', '8801729347503', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(631, 1, 1, 4, 3, 17, 2018, 51, 'Afroja Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(632, 1, 1, 1, 3, 1, 2018, 51, 'Shoykat Talukder', '8801722088868', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(633, 1, 1, 2, 3, 11, 2018, 51, 'Nadiya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(634, 1, 1, 3, 3, 13, 2018, 51, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(635, 1, 1, 1, 3, 5, 2018, 52, 'TANJILA AKTER KAKOLY', '8801720829582', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(636, 1, 1, 1, 3, 2, 2018, 52, 'KHALED SHIFULLAH', '8801948343074', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(637, 1, 1, 4, 3, 16, 2018, 52, 'AOUN TALIKDER', '8801742194789', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(638, 1, 1, 3, 3, 13, 2018, 52, 'ARIF TALUKDER', '8801772104112', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(639, 1, 1, 5, 3, 19, 2018, 52, 'Oasim Ahmad', '8801798342281', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(640, 1, 1, 5, 3, 20, 2018, 52, 'Jannatul Aktar Habiba', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(641, 1, 1, 4, 3, 17, 2018, 52, 'SUMIYA AKTHER', '8801710859441', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(642, 1, 1, 3, 3, 14, 2018, 52, 'Rubyia Aktar', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(643, 1, 1, 2, 3, 7, 2018, 52, 'Arpon Talukder', '8801933886041', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(644, 1, 1, 3, 3, 15, 2018, 52, 'BONNA RANI DAS', '8801911091611', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(645, 1, 1, 1, 3, 5, 2018, 53, 'MIM AKTER', '8801991073496', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(646, 1, 1, 5, 3, 19, 2018, 53, 'Joy Das', '8801748383610', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(647, 1, 1, 3, 3, 14, 2018, 53, 'JARIN AKTER', '8801777643088', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(648, 1, 1, 3, 3, 13, 2018, 53, 'FAHAD', '8801774889819', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(649, 1, 1, 1, 3, 1, 2018, 53, 'MD.JUNAYED HOSSAIN', '8801756082174', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(650, 1, 1, 3, 3, 15, 2018, 53, 'ROMANA', '8801724206148', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(651, 1, 1, 2, 3, 7, 2018, 53, 'BODHON MONDOL', '8801987971076', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(652, 1, 1, 2, 3, 11, 2018, 53, 'Oyshi Sarker', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(653, 1, 1, 1, 3, 5, 2018, 54, 'PUJA SARKAR', '8801735117845', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(654, 1, 1, 2, 3, 7, 2018, 54, 'MD.MEHEDI HASAN', '8801790909126', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(655, 1, 1, 2, 3, 10, 2018, 54, 'NAHIDA AKTER PROVA', '8801711931770', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(656, 1, 1, 5, 3, 19, 2018, 54, 'Aminul Islam', '8801949582862', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(657, 1, 1, 3, 3, 13, 2018, 54, 'Asif', '8801749507541', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(658, 1, 1, 4, 3, 16, 2018, 54, 'Midhul Bhuyan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(659, 1, 1, 3, 3, 14, 2018, 54, 'PRIYA RANI', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(660, 1, 1, 3, 3, 15, 2018, 54, 'Borsha Rani Das', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(661, 1, 1, 2, 3, 7, 2018, 55, 'RIDOY TALUCKDER', '8801915446577', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(662, 1, 1, 2, 3, 10, 2018, 55, 'MITHILA AKTER', '8801884301021', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(663, 1, 1, 3, 3, 14, 2018, 55, 'AKHI AKTER', '8801769889693', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(664, 1, 1, 3, 3, 15, 2018, 55, 'SOMPA PAPY', '8801724058360', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(665, 1, 1, 4, 3, 16, 2018, 55, 'JAHID SIKDAR', '8801876056787', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(666, 1, 1, 3, 3, 13, 2018, 55, 'RATUL HASAN', '8801763354153', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(667, 1, 1, 5, 3, 19, 2018, 55, 'Md.Jihad', '8801858916226', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(668, 1, 1, 2, 3, 11, 2018, 56, 'NUPUR BORMON', '8801761079189', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(669, 1, 1, 2, 3, 8, 2018, 56, 'RAKIBul Islam', '888801824135008', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(670, 1, 1, 3, 3, 13, 2018, 56, 'RAJ BADSHA EAHAD', '8801732999160', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(671, 1, 1, 1, 3, 4, 2018, 56, 'DIPTY TALUKDER', '8801784389890', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(672, 1, 1, 3, 3, 14, 2018, 56, 'KUMARI DOLA', '8801823392240', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(673, 1, 1, 5, 3, 19, 2018, 56, 'Md.Rakib', '8801790133313', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(674, 1, 1, 4, 3, 16, 2018, 56, 'MITUL', '8801704087963', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(675, 1, 1, 3, 3, 15, 2018, 56, 'Jannatul Ferdousi Popi', '8801784708461', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(676, 1, 1, 1, 3, 5, 2018, 57, 'FATEMA AKTER', '8801704909337', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(677, 1, 1, 4, 3, 16, 2018, 57, 'MD. ROHID', '8801722529096', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(678, 1, 1, 5, 3, 19, 2018, 57, 'Abdullah Bin Jayed', '8801764363592', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(679, 1, 1, 3, 3, 15, 2018, 57, 'JANNATUL AKTER', '880181383569', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(680, 1, 1, 2, 3, 7, 2018, 57, 'MD JIHAD', '8801976765926', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(681, 1, 1, 3, 3, 13, 2018, 57, 'SHAKIB BAPRI', '8801768616070', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(682, 1, 1, 2, 3, 10, 2018, 57, 'Monisha Gosh', '8801715461496', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(683, 1, 1, 3, 3, 14, 2018, 57, 'RUPALI AKTER', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(684, 1, 1, 1, 3, 5, 2018, 58, 'TAMANNA AKTER', '8801796333539', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(685, 1, 1, 3, 3, 14, 2018, 58, 'UIRME DAS', '8801712860895', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(686, 1, 1, 5, 3, 19, 2018, 58, 'Md.Omor Faruk', '8801883125556', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(687, 1, 1, 4, 3, 16, 2018, 58, 'PRITOM MONDOL', '8801759002489', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(688, 1, 1, 3, 3, 13, 2018, 58, 'MD.SOHIDUL HOSSIN', '8801932352163', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(689, 1, 1, 2, 3, 7, 2018, 58, 'MD.SOLAMAN(SHIPU)', '8801741689586', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(690, 1, 1, 3, 3, 15, 2018, 58, 'Sumaya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(691, 1, 1, 2, 3, 11, 2018, 58, 'Riha Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(692, 1, 1, 1, 3, 5, 2018, 59, 'SUBORNA', '8801771261859', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(693, 1, 1, 2, 3, 11, 2018, 59, 'FATEMA AKTHER', '8801719594439', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(694, 1, 1, 4, 3, 16, 2018, 59, 'RAKIB MIA', '8801914670096', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(695, 1, 1, 5, 3, 19, 2018, 59, 'Md.Foysal', '8801705367497', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(696, 1, 1, 3, 3, 14, 2018, 59, 'MAGLA AKTAR', '8801825598936', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(697, 1, 1, 2, 3, 7, 2018, 59, 'MD.NAZMUL SAKIB', '8801674206926', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(698, 1, 1, 3, 3, 15, 2018, 59, 'BIBI HAJERA PINKE', '8801934020079', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(699, 1, 1, 3, 3, 13, 2018, 59, 'Anondo Mondol', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(700, 1, 1, 1, 3, 5, 2018, 60, 'TASMIN AKTER SADIA', '8801793616210', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(701, 1, 1, 2, 3, 11, 2018, 60, 'ASHA MONE', '8801926823722', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(702, 1, 1, 4, 3, 16, 2018, 60, 'SHID', '8801797880161', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(703, 1, 1, 2, 3, 7, 2018, 60, 'RIDOY TALUK DER', '8801716178754', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(704, 1, 1, 5, 3, 19, 2018, 60, 'Ismail Hossain', '8801629439102', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(705, 1, 1, 3, 3, 14, 2018, 60, 'SANTANA SARKAR', '8801943900534', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(706, 1, 1, 3, 3, 15, 2018, 60, 'Akhi Akter', '8801789538101', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(707, 1, 1, 3, 3, 13, 2018, 60, 'Aronno Chandra Das', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(708, 1, 1, 2, 3, 11, 2018, 61, 'TAMIM AKTER', '8801742547788', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(709, 1, 1, 1, 3, 5, 2018, 61, 'OPI AKTER', '8801757389394', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(710, 1, 1, 5, 3, 19, 2018, 61, 'Md.Habib', '8801787740384', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(711, 1, 1, 3, 3, 15, 2018, 61, 'MINA AKHTER', '8801757700544', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(712, 1, 1, 3, 3, 14, 2018, 61, 'RUPA', '8801910820096', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(713, 1, 1, 2, 3, 7, 2018, 61, 'SAJAL', '8801789777683', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(714, 1, 1, 4, 3, 16, 2018, 61, 'Rijbe Ahmad', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(715, 1, 1, 3, 3, 13, 2018, 61, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(716, 1, 1, 1, 3, 6, 2018, 62, 'MAHERUN NESA', '8801751293765', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(717, 1, 1, 3, 3, 15, 2018, 62, 'SINTHEYA AKTER', '8801681834325', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(718, 1, 1, 5, 3, 19, 2018, 62, 'Shubo Jit Ghosh', '8801992433017', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(719, 1, 1, 3, 3, 14, 2018, 62, 'FARYEH AKTER', '8801729801543', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(720, 1, 1, 2, 3, 8, 2018, 62, 'ASHIK GHOSH', '8801711473759', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(721, 1, 1, 4, 3, 16, 2018, 62, 'Maharab Hossain Sunny', '8801712624678', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(722, 1, 1, 2, 3, 11, 2018, 62, 'Simla Rani', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(723, 1, 1, 3, 3, 13, 2018, 62, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(724, 1, 1, 1, 3, 6, 2018, 63, 'MAKSUDA AKTER KAKOLI', '8801765513879', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(725, 1, 1, 5, 3, 19, 2018, 63, 'Piyas Ghosh', '8801814504998', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(726, 1, 1, 2, 3, 10, 2018, 63, 'TANJILA AKTER', '8801929572417', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(727, 1, 1, 2, 3, 7, 2018, 63, 'TUSAR AHMED SIZAN', '8801913155449', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(728, 1, 1, 4, 3, 16, 2018, 63, 'PRITOM MONDOL', '8801868106081', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(729, 1, 1, 3, 3, 14, 2018, 63, 'LAMIA AKTER', '8801980888630', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(730, 1, 1, 3, 3, 15, 2018, 63, 'Tahiatul Hossain Roza', '8801882970438', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(731, 1, 1, 3, 3, 13, 2018, 63, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(732, 1, 1, 3, 3, 13, 2018, 64, 'PROSENJEET SARKAR', '8801740094297', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(733, 1, 1, 4, 3, 16, 2018, 64, 'NELOY SARKER', '8801710411509', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(734, 1, 1, 5, 3, 19, 2018, 64, 'Radib', '8801864415090', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(735, 1, 1, 3, 3, 14, 2018, 64, 'BASORI AKTER(ISRAT)', '8801992304985', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(736, 1, 1, 2, 3, 7, 2018, 64, 'MD.MOHIUDDIN SANY', '8801988353839', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(737, 1, 1, 1, 3, 4, 2018, 64, 'SHIMLA AKTER', '8801706689676', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(738, 1, 1, 2, 3, 10, 2018, 64, 'Lubna Akter Sonia', '8801926977384', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(739, 1, 1, 3, 3, 15, 2018, 64, 'Sintheya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(740, 1, 1, 1, 3, 5, 2018, 65, 'TUMPA AKTER', '8801712624678', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(741, 1, 1, 2, 3, 7, 2018, 65, 'MD.MUINUDDIN SAYMON', '8801988353839', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(742, 1, 1, 4, 3, 16, 2018, 65, 'AMIT SARKER', '8801770919139', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(743, 1, 1, 5, 3, 19, 2018, 65, 'Jahirul Islam Sihab', '8801866724589', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(744, 1, 1, 3, 3, 13, 2018, 65, 'Milon shek', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(745, 1, 1, 3, 3, 14, 2018, 65, 'Sirin AKter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(746, 1, 1, 2, 3, 11, 2018, 65, 'Sadiya Islam', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(747, 1, 1, 2, 3, 11, 2018, 66, 'TAJMONI AKTER ALO', '8801855191501', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(748, 1, 1, 4, 3, 16, 2018, 66, 'MD. JUNAIT MOLLA', '8801923125711', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(749, 1, 1, 3, 3, 13, 2018, 66, 'AULLAFUN HOSSIN FAHIM', '8801916575841', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(750, 1, 1, 5, 3, 19, 2018, 66, 'Maruf Billah', '8801712795162', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(751, 1, 1, 2, 3, 7, 2018, 66, 'MD.ASIF HOSSAIN', '8801743831445', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(752, 1, 1, 3, 3, 14, 2018, 66, 'Masuma Akter Priya', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(753, 1, 1, 1, 3, 4, 2018, 66, 'Aliya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(754, 1, 1, 2, 3, 11, 2018, 67, 'SUMIYA AKTER', '8801793616210', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(755, 1, 1, 4, 3, 16, 2018, 67, 'MD. SHIAM AHMED', '8801787727341', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(756, 1, 1, 5, 3, 19, 2018, 67, 'Md.Jahid Hossain', '8801777028337', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(757, 1, 1, 2, 3, 7, 2018, 67, 'MD.SOLIMAN', '8801731225010', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(758, 1, 1, 3, 3, 13, 2018, 67, 'MD.EMON HOSSAIN', '8801840472611', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(759, 1, 1, 1, 3, 4, 2018, 67, 'TANJILA AKTER POPY', '8801781907102', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(760, 1, 1, 2, 3, 11, 2018, 68, 'SADIA AKTER', '8801913138089', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(761, 1, 1, 1, 3, 4, 2018, 68, 'TANJINA AKTER', '8801745798944', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(762, 1, 1, 3, 3, 13, 2018, 68, 'MD.JUNAYED HOSSAIN', '8801923684990', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(763, 1, 1, 5, 3, 19, 2018, 68, 'Shiyam Shamin', '8801756307413', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(764, 1, 1, 2, 3, 8, 2018, 68, 'SUMON TALUKDER', '8801765834312', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(765, 1, 1, 4, 3, 16, 2018, 68, 'Jahid Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(766, 1, 1, 1, 3, 5, 2018, 69, 'SHEBA ROHOMAN SHIAM', '8801846736353', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(767, 1, 1, 2, 3, 10, 2018, 69, 'MOHONA AKTER', '8801736790923', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(768, 1, 1, 3, 3, 13, 2018, 69, 'SAJID', '8801748286991', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(769, 1, 1, 4, 3, 16, 2018, 69, 'MD. RAJUL MISLAM', '8801780497547', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(770, 1, 1, 5, 3, 19, 2018, 69, 'Arafat', '8801746054866', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(771, 1, 1, 2, 3, 8, 2018, 69, 'Md.Shohan Ahmad', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(772, 1, 1, 2, 3, 10, 2018, 70, 'SHARMIN AKTER', '8801726882331', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(773, 1, 1, 3, 3, 13, 2018, 70, 'MD.AIMAR HOSSON', '8801716048459', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(774, 1, 1, 1, 3, 4, 2018, 70, 'SONGITA MONDOL', '8801714877406', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(775, 1, 1, 5, 3, 19, 2018, 70, 'Ashif Bepary', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(776, 1, 1, 4, 3, 16, 2018, 70, 'Biplop ', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(777, 1, 1, 2, 3, 10, 2018, 71, 'AYESHA MONI', '8801911188771', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(778, 1, 1, 5, 3, 19, 2018, 71, 'Bijoy Sha', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(779, 1, 1, 1, 3, 4, 2018, 71, 'RIEZ MONDOL', '8801943036627', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(780, 1, 1, 4, 3, 16, 2018, 71, 'RATUK HASSAN', '8801763712090', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(781, 1, 1, 3, 3, 13, 2018, 71, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(782, 1, 1, 1, 3, 5, 2018, 72, 'MARIA AKTER SADIA', '8801988589641', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(783, 1, 1, 5, 3, 19, 2018, 72, 'Md.Shown Mia', '8801704959823', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(784, 1, 1, 4, 3, 16, 2018, 72, 'MARUF', '8801817530515', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(785, 1, 1, 3, 3, 13, 2018, 72, 'MOJAHID MIA', '8801727475706', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(786, 1, 1, 2, 3, 10, 2018, 72, 'Nadiya Islam', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(787, 1, 1, 2, 3, 7, 2018, 72, 'Abdul Rohoman', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(788, 1, 1, 2, 3, 9, 2018, 72, 'Piyas', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(789, 1, 1, 1, 3, 5, 2018, 73, 'LATA SARKAR', '8801871940039', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(790, 1, 1, 2, 3, 10, 2018, 73, 'RUMA AKTER', '8801709432694', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(791, 1, 1, 3, 3, 13, 2018, 73, 'PAVEL', '8801836380634', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(792, 1, 1, 5, 3, 19, 2018, 73, 'Md.Sagor Mia', '8801704959823', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(793, 1, 1, 4, 3, 16, 2018, 73, 'Showmik Ronjon Das', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(794, 1, 1, 2, 3, 8, 2018, 73, 'Md.Rakib Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(795, 1, 1, 4, 3, 16, 2018, 74, 'BILLAL', '8801796601095', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(796, 1, 1, 5, 3, 19, 2018, 74, 'Md.Jaber Hossain', '8801736796943', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(797, 1, 1, 3, 3, 13, 2018, 74, 'NAHID HASAN', '8801712907274', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(798, 1, 1, 1, 3, 4, 2018, 74, 'ANAMIKA RANI DES', '8801768514127', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(799, 1, 1, 2, 3, 10, 2018, 74, 'SUMA AKTER', '8801791549175', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(800, 1, 1, 1, 3, 4, 2018, 75, 'SUMIYA AKTER', '8801799839531', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(801, 1, 1, 5, 3, 19, 2018, 75, 'Hasibul Hasan', '8801709304153', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(802, 1, 1, 3, 3, 13, 2018, 75, 'Apon Talukder', '8801721921925', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(803, 1, 1, 2, 3, 11, 2018, 75, 'Susmita Sarker', '88017900252803', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(804, 1, 1, 4, 3, 16, 2018, 75, 'Mahadi Hasan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(805, 1, 1, 1, 3, 5, 2018, 76, 'ASANA AKTER', '8801712456985', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(806, 1, 1, 2, 3, 11, 2018, 76, 'SHANJIDA AKTER', '8801712707692', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(807, 1, 1, 5, 3, 19, 2018, 76, 'Omor Faruk', '8801924487007', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(808, 1, 1, 3, 3, 13, 2018, 76, 'SAGOR GOSH', '8801747128013', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(809, 1, 1, 4, 3, 16, 2018, 76, 'Emon Hosan', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(810, 1, 1, 1, 3, 4, 2018, 77, 'MORIOM AKTER', '8801715664709', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(811, 1, 1, 5, 3, 19, 2018, 77, 'Shohan', '8801734467197', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(812, 1, 1, 2, 3, 10, 2018, 77, 'NURNAHAR AKTER', '8801884640787', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(813, 1, 1, 3, 3, 13, 2018, 77, 'ANUS HOSSEN', '8801716909432', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(814, 1, 1, 4, 3, 16, 2018, 77, 'Siyam', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(815, 1, 1, 2, 3, 11, 2018, 78, 'ARIFA AKTER', '8801731203102', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(816, 1, 1, 5, 3, 19, 2018, 78, 'Md.Miraj', '8801755229902', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(817, 1, 1, 1, 3, 4, 2018, 78, 'MINA AKTER', '888801963367420', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(818, 1, 1, 3, 3, 13, 2018, 78, 'Badon Ghosh', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(819, 1, 1, 4, 3, 16, 2018, 78, 'Himal Sen', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(820, 1, 1, 1, 3, 4, 2018, 79, 'TASLIMA AKTER NISHI', '8801735116907', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(821, 1, 1, 3, 3, 13, 2018, 79, 'MD.SABBIR HOSSAIN', '8801728293680', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(822, 1, 1, 5, 3, 19, 2018, 79, 'Md.Masud Rana', '8801946917965', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(823, 1, 1, 1, 3, 4, 2018, 80, 'PRIYA MONDOL', '8801869666961', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(824, 1, 1, 5, 3, 19, 2018, 80, 'Md.Shadat', '8800', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(825, 1, 1, 2, 3, 10, 2018, 80, 'Taniya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(826, 1, 1, 3, 3, 13, 2018, 80, 'N/A', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(827, 1, 1, 2, 3, 11, 2018, 81, 'TISHA MONY', '8801850074389', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(828, 1, 1, 1, 3, 4, 2018, 81, 'ASA AKTER ALO', '8801724091618', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(829, 1, 1, 3, 3, 13, 2018, 81, 'EYRAHIM MOLLA', '880', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(830, 1, 1, 5, 3, 19, 2018, 81, 'Shabir Hossain', '8801965367523', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(831, 1, 1, 1, 3, 6, 2018, 82, 'FARJANA AKTER', '8801748331759', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(832, 1, 1, 3, 3, 13, 2018, 82, 'MD.ONTOR EMAM', '8801742193165', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(833, 1, 1, 5, 3, 19, 2018, 82, 'Shojib', '8801824011849', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(834, 1, 1, 5, 3, 19, 2018, 83, 'Abdur Rhaman Mhamud', '8801757145062', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(835, 1, 1, 3, 3, 13, 2018, 83, 'AZMAN HOSSAIN', '8801712815053', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(836, 1, 1, 2, 3, 10, 2018, 83, 'NAHIDA AKTER', '8801913133088', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(837, 1, 1, 1, 3, 4, 2018, 83, 'BOISHAKHI SARKER', '8801814100237', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(838, 1, 1, 1, 3, 5, 2018, 84, 'SUMSUNNAHAR', '8801750353110', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(839, 1, 1, 3, 3, 13, 2018, 84, 'JIHADULE ISLAM', '8801719398271', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(840, 1, 1, 5, 3, 19, 2018, 84, 'Md.Shohan Shek', '8801932553194', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(841, 1, 1, 2, 3, 11, 2018, 84, 'Suborna', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(842, 1, 1, 1, 3, 5, 2018, 85, 'FARJANA AKTER', '8801773841035', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(843, 1, 1, 3, 3, 13, 2018, 85, 'RIAD HOSSAIN', '8801718383367', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(844, 1, 1, 5, 3, 19, 2018, 85, 'Md.Isteak Abedujjaman', '8801811420402', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(845, 1, 1, 2, 3, 11, 2018, 85, 'Achiya Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(846, 1, 1, 1, 3, 4, 2018, 86, 'SHASI TALUKDER', '8801758130038', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(847, 1, 1, 2, 3, 10, 2018, 86, 'SANTA KATER', '8801791434204', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(848, 1, 1, 5, 3, 19, 2018, 86, 'Ashadullah Sorkar', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(849, 1, 1, 3, 3, 13, 2018, 86, 'Konok Sorkar', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(850, 1, 1, 3, 3, 13, 2018, 87, 'Abdur Rohoman', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(851, 1, 1, 2, 3, 10, 2018, 88, 'FATAMA AKTER KEYA', '8801685915754', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(852, 1, 1, 3, 3, 13, 2018, 88, 'Jahidul Islam Rony', '8888', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(853, 1, 1, 2, 3, 10, 2018, 89, 'RITU SARKAR', '8801712921996', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(854, 1, 1, 2, 3, 11, 2018, 90, 'FARJAZA AKTER ASHA', '8801732675273', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(855, 1, 1, 2, 3, 11, 2018, 91, 'MST.SORNA', '8801771261859', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(856, 1, 1, 2, 3, 10, 2018, 92, 'FAHAMIDA AKTER RIYA', '8801832605378', 'All student', 1, 'Test', '2018-03-15', '13:01:11');
INSERT INTO `borno_sent_sms` (`borno_sent_sms_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_school_roll`, `borno_school_student_name`, `borno_sent_sms_phone`, `borno_sms_status`, `borno_sms_type`, `borno_sent_sms_message`, `borno_sms_date`, `borno_sms_time`) VALUES
(857, 1, 1, 2, 3, 10, 2018, 93, 'URMI AKTER', '8801716269553', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(858, 1, 1, 2, 3, 11, 2018, 94, 'RAJMONY AKTER SUMI', '8801855191501', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(859, 1, 1, 2, 3, 11, 2018, 95, 'MIM AKTER MEGLA', '8801881557895', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(860, 1, 1, 2, 3, 11, 2018, 96, 'Ety Akter', '8801935845525', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(861, 1, 1, 2, 3, 11, 2018, 97, 'Sraboni Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(862, 1, 1, 2, 3, 12, 2018, 98, 'AFRIN KHANAM NITU', '8801926213567', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(863, 1, 1, 2, 3, 10, 2018, 98, 'Afrin Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(864, 1, 1, 2, 3, 11, 2018, 99, 'kakoli Akter', '8801735029989', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(865, 1, 1, 2, 3, 10, 2018, 100, 'LIMA AKTER', '8801791282091', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(866, 1, 1, 1, 3, 3, 2018, 100, 'motin vai', '8801971699522', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(867, 1, 1, 2, 3, 10, 2018, 101, 'SMRITI AKTHER', '8801922928039', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(868, 1, 1, 1, 3, 3, 2018, 101, 'forhad ', '8801785575574', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(869, 1, 1, 2, 3, 10, 2018, 102, 'MASKORA AKTER', '8801925919061', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(870, 1, 1, 2, 3, 11, 2018, 103, 'RUPA SARKAR', '8801798807161', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(871, 1, 1, 2, 3, 10, 2018, 104, 'SIMA AKTER', '8801670635200', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(872, 1, 1, 2, 3, 11, 2018, 105, 'JUI', '8801910983952', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(873, 1, 1, 2, 3, 11, 2018, 106, 'HAMIM AKTAR', '8801869132447', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(874, 1, 1, 2, 3, 10, 2018, 107, 'Hira Akter', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(875, 1, 1, 2, 3, 10, 2018, 109, 'Bithe Rani', '8801700000000', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(876, 1, 1, 1, 3, 3, 2018, 111, 'Razzak', '8801770045860', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(877, 1, 1, 2, 3, 7, 2018, 121, 'RONY SAWDAGOR', '8801924075712', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(878, 1, 1, 5, 3, 19, 2018, 500, 'Ali Mortuja Noyon', '8801864236548', 'All student', 1, 'Test', '2018-03-15', '13:01:11'),
(879, 1, 1, 5, 3, 20, 2018, 1, 'Rafida Islam', '8801715114326', 'Absent', 1, 'Dear Guardian, Your Child Rafida Islam                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50'),
(880, 1, 1, 5, 3, 20, 2018, 3, 'Musfika Aktar Sabrin', '8801876342318', 'Absent', 1, 'Dear Guardian, Your Child Musfika Aktar Sabrin                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50'),
(881, 1, 1, 5, 3, 20, 2018, 5, 'Mithela Aktar', '8801945347723', 'Absent', 1, 'Dear Guardian, Your Child Mithela Aktar                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50'),
(882, 1, 1, 5, 3, 20, 2018, 8, 'Mrs.sumaiya Aktar', '880', 'Absent', 1, 'Dear Guardian, Your Child Mrs.sumaiya Aktar                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50'),
(883, 1, 1, 5, 3, 20, 2018, 10, 'Megla Aktar Irin', '8801786536494', 'Absent', 1, 'Dear Guardian, Your Child Megla Aktar Irin                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50'),
(884, 1, 1, 5, 3, 20, 2018, 13, 'Nusrat Islam', '8801928717357', 'Absent', 1, 'Dear Guardian, Your Child Nusrat Islam                                  was absent from college today                                     \r\n                                      2018-03-15. Headmaster (TSC)', '2018-03-15', '15:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `borno_student_info`
--

DROP TABLE IF EXISTS `borno_student_info`;
CREATE TABLE IF NOT EXISTS `borno_student_info` (
  `borno_student_info_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_class_id` int(11) NOT NULL,
  `borno_school_shift_id` int(11) NOT NULL,
  `borno_school_section_id` int(50) NOT NULL,
  `borno_school_session` int(11) NOT NULL,
  `borno_student_id` text NOT NULL,
  `borno_final_student_id` varchar(300) NOT NULL,
  `borno_school_student_name` varchar(300) NOT NULL,
  `borno_school_father_name` varchar(300) NOT NULL,
  `borno_school_mother_name` varchar(300) NOT NULL,
  `borno_school_address` varchar(300) NOT NULL,
  `borno_school_phone` varchar(25) NOT NULL,
  `borno_school_blood_group` varchar(10) NOT NULL,
  `borno_school_dob` varchar(50) NOT NULL,
  `borno_school_religion` varchar(50) NOT NULL,
  `borno_school_status` varchar(100) NOT NULL,
  `borno_school_org` varchar(100) NOT NULL,
  `borno_school_stud_group` varchar(100) NOT NULL,
  `borno_school_roll` int(11) NOT NULL,
  `borno_school_photo` varchar(300) NOT NULL,
  PRIMARY KEY (`borno_student_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `borno_student_info`
--

INSERT INTO `borno_student_info` (`borno_student_info_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_student_id`, `borno_final_student_id`, `borno_school_student_name`, `borno_school_father_name`, `borno_school_mother_name`, `borno_school_address`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`) VALUES
(1, 1, 1, 5, 3, 3, 2018, '', '', 'Nahid Hasan Khuti A', 'A', 'B', 'S', '8801911091611', 'O +', '2017-03-25', 'Islam', 'Regular', 'School', '1', 1, ''),
(2, 1, 1, 5, 3, 3, 2018, '', '', 'Ali Mortaja Noyon Eng', 'A', 'B', 'S', '8801914467257', 'O +', '2017-03-25', 'Islam', 'Regular', 'School', '1', 2, ''),
(4, 1, 1, 5, 3, 3, 2018, '', '', 'Moin', 'A', 'B', 'S', '8802147483647', 'A +', '2018-03-25', 'Islam', 'Regular', 'School', '1', 3, ''),
(6, 1, 1, 5, 3, 3, 2018, '', '', 'Elias', 'A', 'B', 'S', '8802147483647', 'A +', '2017-03-25', 'Islam', 'Regular', 'School', '1', 5, ''),
(7, 1, 1, 5, 3, 3, 2018, '', '', 'Moin', 'A', 'B', 'S', '8802147483647', 'O +', '2017-03-25', 'Islam', 'Regular', 'School', '1', 6, ''),
(9, 1, 1, 5, 3, 4, 2018, '', '', 'Moin', 'A', 'B', 'S', '8802147483647', 'O +', '2018-03-01', 'Islam', 'Regular', 'School', '1', 8, '1524046274_25.jpg'),
(10, 1, 1, 5, 3, 3, 2018, '', '', 'Nahid Hasan Khuti', 'A', 'A', 'A', '8802147483647', 'A +', '2018-04-14', 'Islam', 'Regular', 'School', '1', 13, '1524046253_55.jpg'),
(11, 1, 1, 5, 3, 3, 2018, '', '', 'Nahid', '', '', '', '8802147483647', '', '', '', 'Regular', 'School', 'None', 113, '');

-- --------------------------------------------------------

--
-- Table structure for table `borno_teacher_info`
--

DROP TABLE IF EXISTS `borno_teacher_info`;
CREATE TABLE IF NOT EXISTS `borno_teacher_info` (
  `borno_teacher_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `borno_teachers_serial_no` int(11) NOT NULL,
  `borno_school_id` int(11) NOT NULL,
  `borno_school_branch_id` int(11) NOT NULL,
  `borno_school_shift_id` int(11) NOT NULL,
  `borno_teachers_designation` varchar(300) NOT NULL,
  `borno_teacher_name` varchar(300) NOT NULL,
  `borno_teachers_father_name` varchar(300) NOT NULL,
  `borno_teachers_mother_name` varchar(300) NOT NULL,
  `borno_teachers_spouse_name` varchar(300) NOT NULL,
  `borno_teachers_id` varchar(300) NOT NULL,
  `borno_teachers_gadget_no` varchar(300) NOT NULL,
  `borno_teachers_dob` date NOT NULL,
  `borno_teachers_religion` varchar(300) NOT NULL,
  `borno_teachers_gender` varchar(300) NOT NULL,
  `borno_teachers_marital_status` varchar(300) NOT NULL,
  `borno_teachers_blood_group` varchar(300) NOT NULL,
  `borno_teachers_qualification` varchar(300) NOT NULL,
  `borno_teachers_subject` varchar(300) NOT NULL,
  `borno_teachers_national_id` int(11) NOT NULL,
  `borno_teachers_passport_no` varchar(300) NOT NULL,
  `borno_teachers_email_id` varchar(300) NOT NULL,
  `borno_teachers_tin` varchar(300) NOT NULL,
  `borno_teachers_first_join` date NOT NULL,
  `borno_teachers_join_in_school` date NOT NULL,
  `borno_teachers_mailing_address` varchar(300) NOT NULL,
  `borno_teacher_permanent_address` varchar(300) NOT NULL,
  `borno_teacher_org_type` varchar(50) NOT NULL,
  `borno_teacher_phone` varchar(25) NOT NULL,
  `borno_teacher_photo` varchar(150) NOT NULL,
  PRIMARY KEY (`borno_teacher_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `borno_teacher_info`
--

INSERT INTO `borno_teacher_info` (`borno_teacher_info_id`, `borno_teachers_serial_no`, `borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_teachers_designation`, `borno_teacher_name`, `borno_teachers_father_name`, `borno_teachers_mother_name`, `borno_teachers_spouse_name`, `borno_teachers_id`, `borno_teachers_gadget_no`, `borno_teachers_dob`, `borno_teachers_religion`, `borno_teachers_gender`, `borno_teachers_marital_status`, `borno_teachers_blood_group`, `borno_teachers_qualification`, `borno_teachers_subject`, `borno_teachers_national_id`, `borno_teachers_passport_no`, `borno_teachers_email_id`, `borno_teachers_tin`, `borno_teachers_first_join`, `borno_teachers_join_in_school`, `borno_teachers_mailing_address`, `borno_teacher_permanent_address`, `borno_teacher_org_type`, `borno_teacher_phone`, `borno_teacher_photo`) VALUES
(1, 1, 1, 0, 1, 'Headmaster', 'Nahid Hasan', 'ABC', 'ABC', 'C', '123', '10210', '2018-04-19', 'Islam', 'Male', 'Married', 'O +', 'B.Sc Eng. Com', 'Computer', 2147483647, 'MG124563', 'nahid.psoft@gmail.com', '1245675986', '2018-04-19', '2018-04-19', 'Dholaikhal', 'Madaripur', 'School', '8801914467255', '1524128926_55.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `defalt_msg`
--

DROP TABLE IF EXISTS `defalt_msg`;
CREATE TABLE IF NOT EXISTS `defalt_msg` (
  `dflt_msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `schlog_id` int(11) NOT NULL,
  `msg_type` int(11) NOT NULL,
  `msg_head` varchar(300) NOT NULL,
  `msg_details` text NOT NULL,
  `shortname` varchar(100) NOT NULL,
  PRIMARY KEY (`dflt_msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `defalt_msg`
--

INSERT INTO `defalt_msg` (`dflt_msg_id`, `schlog_id`, `msg_type`, `msg_head`, `msg_details`, `shortname`) VALUES
(1, 1, 0, 'Dear Parents--', '  Absent  ----  ', 'HM---'),
(2, 14, 0, 'Dear Guardian, Your child', 'is absent from school today', '. Headmaster (Police Lines School, Narayanganj).'),
(3, 6, 0, 'Dear Guardian, Your child', '    is absent from school/college today  ', '. Principal (Kurigram Collectorate School & College)'),
(4, 1, 1, 'Dear Guardian, Your Child', '                                 was absent from college today                                     \r\n                                     ', '. Headmaster (TSC)'),
(5, 1, 2, '', 'Apner meye schole aseni jotno nin', ''),
(6, 1, 1, '', 'Happy Birthday to you. Headmaster (TSC)', '');

-- --------------------------------------------------------

--
-- Table structure for table `set_birthday_msg`
--

DROP TABLE IF EXISTS `set_birthday_msg`;
CREATE TABLE IF NOT EXISTS `set_birthday_msg` (
  `set_birthday_msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `schlog_id` int(11) NOT NULL,
  `msg_type` int(11) NOT NULL,
  `msg_details` varchar(300) NOT NULL,
  PRIMARY KEY (`set_birthday_msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `set_birthday_msg`
--

INSERT INTO `set_birthday_msg` (`set_birthday_msg_id`, `schlog_id`, `msg_type`, `msg_details`) VALUES
(1, 1, 1, 'Happy Birthday To You Noyon'),
(2, 1, 2, 'Happy Birthday Elish');
