-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2016 at 01:16 PM
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
(9, 1),
(10, 1);

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
  `url` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_content`, `category_id`, `img`, `url`, `date`) VALUES
(7, '', '', 1, '', '', '2016-01-06 14:04:22'),
(9, 'Internal Blog: MySQL Data Typess', '\\r\\n							\\r\\n							\\r\\n														\\r\\n							\\r\\n							\\r\\n							\\r\\n\\r\\n							\\r\\n								<div class=\\"flare-horizontal flare-backgroundcolor-light enablecounters enabletotal flare-hidden countloaded countloadfinished\\" data-humbleflarecount=\\"2\\"><span class=\\"loading\\"><span></span></span><span class=\\"flare-total first\\"><strong></strong></span></div><p>In the previous post, we learned how you can <a href=\\"http://www.cloudways.com/blog/connect-mysql-with-php/\\" target=\\"_blank\\">connect your MySQL Database with PHP</a> website. In this post, I am going to share with you knowledge about data types and how they are used.</p>\\r\\n<p><img class=\\"aligncenter wp-image-15697 size-full\\" src=\\"http://www.cloudways.com/blog/wp-content/uploads/banner-mysql.jpg\\" alt=\\"mysql data types\\" width=\\"636\\" height=\\"334\\"></p>\\r\\n<p>Data types are the most important part in creating columns in tables.\\r\\n It define which type of value a column can contain and how long this \\r\\nvalue can be. Data type varies from column to column. Letâ€™s get started:</p>\\r\\n<h2>What is Data Type?</h2>\\r\\n<p>A data type is a particular kind of an item that you store in a \\r\\nvariable, whether it is returned from a function or you have defined it \\r\\nin your code. Data types are of different types, including numbers, \\r\\nstrings, dates and characters.</p>\\r\\n<p>MySQL also define different data types which you can get benefit from\\r\\n while creating columns of your table. Columns in a table can be of \\r\\ndifferent types, it can be a number, string, you can store your whole \\r\\nimage in bytes, or can define a column specifically for date and time. \\r\\nMySQL datatypes can be divided into different categories. I will define \\r\\nthree main, mostly used categories in this blog:</p>\\r\\n<ol><li>Number Type</li><li>String Type</li><li>JSON Type</li></ol>\\r\\n<h2>Number Type</h2>\\r\\n<p>MySQL uses all the numeric data types that you use mostly in your \\r\\nprogramming. Following are the list of commonly used numeric data types \\r\\nalong with their short description.</p>\\r\\n<ol><li>INT: It stores real numbers which can be signed or unsigned. Its range is -2147483648 to 2147483647.</li><li>FLOAT(M,D): It stores floating-point numbers which canâ€™t be \\r\\nunsigned. You can define the display length (M) and the number of \\r\\ndecimals (D). Default value for M and D is 10 and 2. Decimal precision \\r\\ncan go to 24 places</li><li>DOUBLE(M,D): It stores double floating-point numbers which canâ€™t be \\r\\nunsigned. You can define the display length (M) and the number of \\r\\ndecimals (D). Default value for M and D is 16 and 4. Decimal precision \\r\\ncan go to 53 places</li></ol>\\r\\n<h2>String Type</h2>\\r\\n<p>Most of your data will be stored in string formats. For this, MySQL \\r\\nhas provided the string data type. You can choose from them according to\\r\\n your needs. Commonly used string types are:</p>\\r\\n<ol><li>Char(M): It is a fixed length string whose range is between 1-255. Its default value is 1.</li><li>VARCHAR(M): It is variable length string whose range is between 1 â€“ \\r\\n255. Its value must be defined when creating a VARCHAR column.</li><li>TEXT: It stores large amount of data. You donâ€™t have to define a length for this when defining it. Its maximum length is 65535.</li><li>BLOB: These are Binary large objects, it stores the large amount of \\r\\nbinary data such images. You donâ€™t have to define a length for this when\\r\\n defining it. Its maximum length is 65535.</li></ol>\\r\\n<h2>JSON Type</h2>\\r\\n<p>In MySQL 5.7.7 they have introduced a <a href=\\"http://dev.mysql.com/doc/refman/5.7/en/json.html\\" target=\\"_blank\\">new datatype JSON</a>.\\r\\n It used to store data which is in the form of JSON. Before this you can\\r\\n store your JSON format data in TEXT or VARCHAR fields but you have to \\r\\nwrite your own verification function before storing it on your database.\\r\\n However, after you have chooses this datatype for column it \\r\\nautomatically validates that the data which is being entered is in JSON \\r\\nformat or not. Its maximum length is 1073741824.</p>\\r\\n<h2>Conclusion:</h2>\\r\\n<p>Datatypes are the most necessary part of your database. It shows what\\r\\n the values of your columns really are. For example, if you are saving \\r\\nthe driving license of a person you can use VARCHAR and can set a limit \\r\\nof of 17 with hyphens, and a limit of 14 if you are not using hyphens. \\r\\nBy this way your database will automatically generate error if the limit\\r\\n crosses.</p>\\r\\n<p>Optimized MySQL Hosting&nbsp;with combined powers of Nginx, Apache web \\r\\nservers, PHP, and Varnish HTTP Accelrator along with Memcached and Redis\\r\\n cache, Cloudways ensures that load time of your website improves by \\r\\n100% on the Cloudways Platform.</p>\\r\\n<p>Sign up now with XMAS30 code enjoy the seamless <a href=\\"http://www.cloudways.com/en/mysql-hosting.php\\">Cloudways MySQL Hosting Platform</a> now.\\r\\n</p>', 2, '46.jpg', 'Internal-Blog-MySQL-Data-Typess', '2016-01-14 17:34:00'),
(10, 'What is New in PHP', 'asdsadsa sa dsa das das sad sa', 2, '76.png', 'what-is-new-in-php', '2016-01-23 15:26:26');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cweb` varchar(50) DEFAULT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'ahmed', 'khan', 'ahmedkhan', '$2y$10$fCEasQ.r5CBE7JXxlfZiY.jwC0A3KJdGmsGfrJE3e6ugl46a/kqVe', 'ahmedkhan_847@hotmail.com', '26.jpg', 'pakistan', 'karachi');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment` (`article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
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

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
