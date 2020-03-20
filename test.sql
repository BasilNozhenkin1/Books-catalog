-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2020 at 11:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_table`
--

DROP TABLE IF EXISTS `books_table`;
CREATE TABLE IF NOT EXISTS `books_table` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `book_year` int(4) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_table`
--

INSERT INTO `books_table` (`book_id`, `book_name`, `author_name`, `book_year`) VALUES
(12, 'Книга1', 'Новенький', 1997),
(3, 'Евгений Онегин', 'Пушкин А.С.', 1850),
(11, 'Анна Каренина', 'Толстой Л.Н.', 2020),
(17, '12', '12', 1),
(16, '2111111111111', '211111111', 2019),
(15, '21111111', '21111111', 2020),
(14, 'Анна Каренина1', 'Лол', 2020),
(13, '212112', 'Автор1', 112),
(18, 'Новая книга', 'Новый автор', 2020);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
