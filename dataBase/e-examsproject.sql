-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 05:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-examsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `doctor_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `subject_id`) VALUES
(1, 'ch1', 4),
(2, 'ch2', 3),
(3, 'ch2', 4),
(4, 'CH1', 8),
(5, 'CH2', 8),
(6, 'CH3', 8),
(7, 'CH4', 8),
(8, 'MOKA', 9),
(9, 'omg', 4),
(10, 'ch1', 30),
(11, 'X', 31),
(12, 'ch1', 32),
(13, 'ch2', 32);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `level`) VALUES
(1, 'se', 3),
(2, 'it', 3),
(3, 'cs', 3),
(4, 'is', 3),
(14, 'moka', 4),
(15, 'newDep', 4),
(16, 'NEW', 10),
(17, 'd3bis', 11),
(18, 'arabic', 13),
(19, 'english', 13);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(30) NOT NULL,
  `exam_time` float NOT NULL,
  `gpa_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `university` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `university`) VALUES
(4, 'fci', 5),
(36, 'medican', 5),
(39, 'new', 6),
(41, 'wow', 5),
(45, 'd3bis', 58),
(48, 'education', 62);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) NOT NULL,
  `floor_num` varchar(30) NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `floor_num`, `facility_id`) VALUES
(1, 'floor number 1', 4),
(2, 'floor number 2', 4),
(3, 'floor number 3', 4),
(4, 'floor number 4', 4),
(5, 'floor number 1', 36);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `facility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `facility`) VALUES
(3, 'lvl3', 4),
(4, 'lvl4', 4),
(8, 'lvl2', 4),
(9, 'lvl1', 4),
(10, 'test', 36),
(11, 'd3bis', 45),
(13, 'levelOne', 48),
(14, 'levelTwo', 48);

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `id` int(11) NOT NULL,
  `admins` int(11) NOT NULL,
  `universities` int(11) NOT NULL,
  `faculties` int(11) NOT NULL,
  `levels` int(11) NOT NULL,
  `departments` int(11) NOT NULL,
  `subjects` int(11) NOT NULL,
  `floors` int(11) NOT NULL,
  `offices` int(11) NOT NULL,
  `professors` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `exams` int(11) NOT NULL,
  `std_pass_year` int(11) NOT NULL,
  `std_fail_year` int(11) NOT NULL,
  `std_pass_with_subjects` int(11) NOT NULL,
  `std_reg_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `office_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `floor_id`, `office_num`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `name`) VALUES
(1, 'Accepted'),
(2, 'Rejected'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `university` int(11) NOT NULL,
  `facility` int(11) NOT NULL,
  `exist_from` float NOT NULL,
  `exist_to` float NOT NULL,
  `Office_name` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `name`, `email`, `password`, `university`, `facility`, `exist_from`, `exist_to`, `Office_name`, `status`) VALUES
(5, 'mohamed', 'mohamedelerdeny1@gmail.com', '123', 5, 4, 9, 11, 1, 1),
(6, 'ali', 'ali@yahoo.com', 'ali123', 5, 4, 11, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`) VALUES
(3, 'mcq'),
(4, 'T&F'),
(5, 'matching');

-- --------------------------------------------------------

--
-- Table structure for table `questions_difficulty`
--

CREATE TABLE `questions_difficulty` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_difficulty`
--

INSERT INTO `questions_difficulty` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `questions_in_each_chapter`
--

CREATE TABLE `questions_in_each_chapter` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_in_each_chapter`
--

INSERT INTO `questions_in_each_chapter` (`id`, `question_id`, `chapter_id`, `subject_id`) VALUES
(2, 3, 2, 3),
(3, 4, 2, 3),
(5, 3, 4, 8),
(6, 5, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` int(11) NOT NULL,
  `question_content` int(11) NOT NULL,
  `right_answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`id`, `question_content`, `right_answer`) VALUES
(1, 2, 'moka'),
(3, 3, 'test1'),
(4, 5, 'answer2'),
(5, 4, 'answer1');

-- --------------------------------------------------------

--
-- Table structure for table `question_content`
--

CREATE TABLE `question_content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `question_type` int(11) NOT NULL,
  `question_difficulty` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_content`
--

INSERT INTO `question_content` (`id`, `content`, `question_type`, `question_difficulty`, `chapter_id`, `subject_id`) VALUES
(2, 'first mcq a question test', 3, 1, 2, 3),
(3, 'second mcq question a test', 3, 1, 2, 3),
(4, 'moka is a very important question', 3, 1, 4, 8),
(5, 'moka is not an important question', 3, 2, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `question_score`
--

CREATE TABLE `question_score` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specific_question_difficulty`
--

CREATE TABLE `specific_question_difficulty` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `diffculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_question_difficulty`
--

INSERT INTO `specific_question_difficulty` (`id`, `questions_id`, `diffculty_id`) VALUES
(2, 3, 1),
(3, 3, 2),
(7, 5, 1),
(8, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `university` int(11) NOT NULL,
  `facility` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `gpa` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `university`, `facility`, `level`, `department`, `gpa`, `status`) VALUES
(35, 'mohamed', 'mohamedelerdeny1@gmail.com', '123', 5, 4, 3, 1, 3, 1),
(36, 'ali', 'ali@yahoo.com', '123', 10, 36, 4, 3, 3, 1),
(51, 'rami', 'ramo@gmail.com', '123', 5, 36, 10, 16, 0, 3),
(52, 'amr', 'amr@yahoo.com', '123', 62, 48, 13, 18, 0, 1),
(53, 'ahmed', 'ahmed@yahoo.com', '123', 5, 4, 3, 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`) VALUES
(37, 35, 3),
(39, 35, 4),
(42, 36, 8),
(43, 53, 3),
(44, 53, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `department`, `doctor`, `level`, `hours`) VALUES
(3, 'math', 1, 6, 3, 2),
(4, 'arabic', 1, 5, 3, 5),
(5, 'HTML', 3, 6, 3, 2),
(7, 'CSS', 2, 5, 4, 2),
(8, 'JS', 3, 6, 4, 2),
(9, 'AJAX', 3, 5, 4, 2),
(10, 'Bootstrap', 4, 6, 4, 2),
(30, 'moka', 3, 6, 3, 3),
(31, 'MOKA1', 3, 5, 3, 2),
(32, 'subject1', 18, 5, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`) VALUES
(5, 'kfs'),
(6, 'ali'),
(7, 'ali'),
(10, 'new'),
(58, 'moka'),
(62, 'helwan');

-- --------------------------------------------------------

--
-- Table structure for table `wrong_answers`
--

CREATE TABLE `wrong_answers` (
  `id` int(11) NOT NULL,
  `real_question_id` int(11) NOT NULL,
  `Answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wrong_answers`
--

INSERT INTO `wrong_answers` (`id`, `real_question_id`, `Answer`) VALUES
(1, 2, 'moka'),
(2, 2, 'koko'),
(3, 2, 'lolo'),
(4, 2, 'roro'),
(5, 3, 'test1'),
(6, 3, 'test2'),
(7, 3, 'test3'),
(8, 3, 'test4'),
(9, 4, 'answer1'),
(10, 4, 'answer2'),
(11, 4, 'answer3'),
(12, 4, 'answer4'),
(13, 5, 'test1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university` (`university`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility` (`facility`);

--
-- Indexes for table `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins` (`admins`),
  ADD KEY `departments` (`departments`),
  ADD KEY `faculties` (`faculties`),
  ADD KEY `levels` (`levels`),
  ADD KEY `floors` (`floors`),
  ADD KEY `universities` (`universities`),
  ADD KEY `subjects` (`subjects`),
  ADD KEY `students` (`students`),
  ADD KEY `offices` (`offices`),
  ADD KEY `professors` (`professors`),
  ADD KEY `exams` (`exams`),
  ADD KEY `std_reg_sub` (`std_reg_sub`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university` (`university`),
  ADD KEY `facility` (`facility`),
  ADD KEY `Office_name` (`Office_name`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_difficulty`
--
ALTER TABLE `questions_difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_in_each_chapter`
--
ALTER TABLE `questions_in_each_chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_content` (`question_content`);

--
-- Indexes for table `question_content`
--
ALTER TABLE `question_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_difficulty` (`question_difficulty`),
  ADD KEY `question_type` (`question_type`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `question_score`
--
ALTER TABLE `question_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_id` (`questions_id`);

--
-- Indexes for table `specific_question_difficulty`
--
ALTER TABLE `specific_question_difficulty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diffculty_id` (`diffculty_id`),
  ADD KEY `questions_id` (`questions_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`),
  ADD KEY `facility` (`facility`),
  ADD KEY `level` (`level`),
  ADD KEY `students_ibfk_4` (`university`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `real_question_id` (`real_question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions_difficulty`
--
ALTER TABLE `questions_difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions_in_each_chapter`
--
ALTER TABLE `questions_in_each_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_content`
--
ALTER TABLE `question_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_score`
--
ALTER TABLE `question_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specific_question_difficulty`
--
ALTER TABLE `specific_question_difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `professors` (`id`);

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`level`) REFERENCES `levels` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `professors` (`id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_2` FOREIGN KEY (`university`) REFERENCES `universities` (`id`);

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_ibfk_1` FOREIGN KEY (`facility`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `numbers`
--
ALTER TABLE `numbers`
  ADD CONSTRAINT `numbers_ibfk_1` FOREIGN KEY (`admins`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `numbers_ibfk_10` FOREIGN KEY (`professors`) REFERENCES `professors` (`id`),
  ADD CONSTRAINT `numbers_ibfk_11` FOREIGN KEY (`exams`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `numbers_ibfk_12` FOREIGN KEY (`std_reg_sub`) REFERENCES `student_subjects` (`id`),
  ADD CONSTRAINT `numbers_ibfk_2` FOREIGN KEY (`departments`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `numbers_ibfk_3` FOREIGN KEY (`faculties`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `numbers_ibfk_4` FOREIGN KEY (`levels`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `numbers_ibfk_5` FOREIGN KEY (`floors`) REFERENCES `floors` (`id`),
  ADD CONSTRAINT `numbers_ibfk_6` FOREIGN KEY (`universities`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `numbers_ibfk_7` FOREIGN KEY (`subjects`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `numbers_ibfk_8` FOREIGN KEY (`students`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `numbers_ibfk_9` FOREIGN KEY (`offices`) REFERENCES `offices` (`id`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`);

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_ibfk_1` FOREIGN KEY (`university`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `professors_ibfk_2` FOREIGN KEY (`facility`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `professors_ibfk_3` FOREIGN KEY (`Office_name`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `professors_ibfk_4` FOREIGN KEY (`status`) REFERENCES `pending` (`id`);

--
-- Constraints for table `questions_in_each_chapter`
--
ALTER TABLE `questions_in_each_chapter`
  ADD CONSTRAINT `questions_in_each_chapter_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`),
  ADD CONSTRAINT `questions_in_each_chapter_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `questions_in_each_chapter_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD CONSTRAINT `question_answer_ibfk_1` FOREIGN KEY (`question_content`) REFERENCES `question_content` (`id`);

--
-- Constraints for table `question_content`
--
ALTER TABLE `question_content`
  ADD CONSTRAINT `question_content_ibfk_1` FOREIGN KEY (`question_difficulty`) REFERENCES `questions_difficulty` (`id`),
  ADD CONSTRAINT `question_content_ibfk_2` FOREIGN KEY (`question_type`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `question_content_ibfk_3` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`),
  ADD CONSTRAINT `question_content_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `question_score`
--
ALTER TABLE `question_score`
  ADD CONSTRAINT `question_score_ibfk_1` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `specific_question_difficulty`
--
ALTER TABLE `specific_question_difficulty`
  ADD CONSTRAINT `specific_question_difficulty_ibfk_1` FOREIGN KEY (`diffculty_id`) REFERENCES `questions_difficulty` (`id`),
  ADD CONSTRAINT `specific_question_difficulty_ibfk_2` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`facility`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`level`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`university`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`status`) REFERENCES `pending` (`id`);

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `student_subjects_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`doctor`) REFERENCES `professors` (`id`),
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`level`) REFERENCES `levels` (`id`);

--
-- Constraints for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  ADD CONSTRAINT `wrong_answers_ibfk_1` FOREIGN KEY (`real_question_id`) REFERENCES `question_content` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
