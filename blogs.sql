-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2016 at 01:43 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `user_id`) VALUES
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_content`, `category_id`, `img`, `date`) VALUES
(5, 'Internal Blog: MySQL Data Types', '<b style="" font-weight:normal;""="" id="" docs-internal-guid-0ba970a0-0d00-8be1-0a72-98a73844a1d8""=""><h2 dir="" ltr""="" style="" line-height:1.38;margin-top:18pt;margin-bottom:6pt;""=""><span style="" font-size:21.333333333333332px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">What is Data Type?</span></h2><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">A data type is a particular kind of item that you store in a variable, whether it is returned from a function or you have define it in your code. Data types are of different types numbers,strings, dates and characters.</span></p><br><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">MySQL also define different data types which you can get benefit of while creating columns of your table. Columns in a table can be of different types, it can be a number, string, you &nbsp;can store your whole image in bytes, or can be a column specifically for date and time. MySQL datatypes can be categories into different categories I will define three main categories in this blog which is mostly used &nbsp;in databases:</span></p><br><ol style="" margin-top:0pt;margin-bottom:0pt;""=""><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">Number Type</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">String Type</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">JSON Type</span></p></li></ol><br><h2 dir="" ltr""="" style="" line-height:1.38;margin-top:18pt;margin-bottom:6pt;""=""><span style="" font-size:21.333333333333332px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">Number Type</span></h2><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">MySQL uses all the numeric data types that you use mostly in your programming. Following are the list of commonly used numeric data types and there short description.</span></p><br><ol style="" margin-top:0pt;margin-bottom:0pt;""=""><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">INT : It stores real numbers which can be signed or unsigned. Itâ€™s range is </span><span style="" font-size:15.333333333333332px;font-family:verdana;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">-2147483648 to 2147483647.</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">FLOAT(M,D) : It stores floating-point numbers which canâ€™t be unsigned. You can define the display length (M) and the number of decimals (D). Default value for M and D is 10 and 2. Decimal precision can go to 24 places</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">DOUBLE(M,D) : &nbsp;It stores double floating-point numbers which canâ€™t be unsigned. You can define the display length (M) and the number of decimals (D). Default value for M and D is 16 and 4. Decimal precision can go to 53 places</span></p></li></ol><br><h2 dir="" ltr""="" style="" line-height:1.38;margin-top:18pt;margin-bottom:6pt;""=""><span style="" font-size:21.333333333333332px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">String Type</span></h2><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">Mostly of your data will be stored in string formats for this MySQL has provided you string type. You can choose from them according to your needs. Commonly used string types are:</span></p><br><ol style="" margin-top:0pt;margin-bottom:0pt;""=""><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">Char(M) : It is a fixed length string whose range is between 1-255. Its default value is 1.</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">VARCHAR(M): It is variable length string whose range is between 1 - 255. Its value must be defined when creating a VARCHAR column.</span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">TEXT: It stores large amount of data. You donâ€™t have to define a length for this when defining it. Its maximum length is 65535. </span></p></li><li dir="" ltr""="" style="" list-style-type:decimal;font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;""=""><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">BLOB: These are Binary large objects, it stores the large amount of binary data such images. You donâ€™t have to define a length for this when defining it. Its maximum length is 65535. </span></p></li></ol><br><h2 dir="" ltr""="" style="" line-height:1.38;margin-top:18pt;margin-bottom:6pt;""=""><span style="" font-size:21.333333333333332px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">JSON Type</span></h2><p dir="" ltr""="" style="" line-height:1.38;margin-top:0pt;margin-bottom:0pt;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""="">In MySQL 5.7.7 they have introduced a </span><a href="" http:="" dev.mysql.com="" doc="" refman="" 5.7="" en="" json.html""="" style="" text-decoration:none;""=""><span style="" font-size:14.666666666666666px;font-family:arial;color:#1155cc;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;vertical-align:baseline;white-space:pre-wrap;""="">new datatype JSON</span></a><span style="" font-size:14.666666666666666px;font-family:arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;""=""> it used to store data which is in the form of JSON. Before this you can store your JSON format data in TEXT or VARCHAR fields but you have write your own verification function before storing it on your database. But now after you have choose this datatype for column it automatically validate that the data which is being entered is in JSON format or not. Its maximum length is 1073741824.</span></p></b><br class="" apple-interchange-newline""="">', 5, '24.jpg', '2016-01-04 19:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'php'),
(2, 'html5'),
(3, 'js'),
(4, 'css'),
(5, 'sql server');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `u_fname` varchar(50) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_psw` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `u_fname`, `u_lname`, `user_name`, `user_psw`, `user_email`, `img`, `user_city`, `user_country`) VALUES
(1, 'ahmed', 'khan', 'ahmedkhan', '$2y$10$TmSmKqZE5CooLFp3.g2rJeEqq4Hw3PJWMiBUDodgHoyiISsKPMysO', 'a@mail.com', '26.jpg', 'pakistan', 'karachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD KEY `arts` (`article_id`),
  ADD KEY `uses` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `cats` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `arts` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uses` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `cats` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
