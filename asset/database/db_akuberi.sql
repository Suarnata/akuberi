-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 07:47 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akuberi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_table`
--

CREATE TABLE `bank_table` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_table`
--

INSERT INTO `bank_table` (`bank_id`, `bank_name`, `bank_image`) VALUES
(2, 'Mastercard', 'mastercard.png'),
(3, 'Mandiri', 'mandiri.png'),
(4, 'BNI', 'bni.png'),
(5, 'BCA', 'bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast_table`
--

CREATE TABLE `broadcast_table` (
  `broadcast_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `bc_subject` varchar(500) NOT NULL,
  `bc_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`) VALUES
(1, 'Inovasi'),
(2, 'Kesehatan'),
(3, 'Anak-Anak'),
(4, 'Pendidikan'),
(5, 'Bencana'),
(6, 'Rumah Ibadah'),
(7, 'Difabel'),
(8, 'Riset');

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE `chat_table` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `chat_data` text NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_table`
--

CREATE TABLE `notification_table` (
  `notif_id` int(11) NOT NULL,
  `notif_target` int(11) NOT NULL,
  `broadcast_id` int(11) NOT NULL,
  `notif_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `post_desc` text NOT NULL,
  `post_img` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_due` date NOT NULL,
  `post_revenue` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `post_rek` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `user_id`, `category_id`, `post_title`, `post_desc`, `post_img`, `post_status`, `post_due`, `post_revenue`, `bank_id`, `post_rek`) VALUES
(1, 3, 5, 'Kerasukan Roh Kotak Amal', 'ayo gaes bantu teman kita yang sedang kerasukan roh kotak amal yang merindukan cintanya', '264a9cc024863388_295694.jpg', 1, '2028-05-02', 0, 5, '6112531623412'),
(2, 3, 6, 'Kejepit Kerudung Janda', 'teman kami terjepit jiwa ny ayo bantu dia', '66dd224c2e6f750b_26484.jpg', 1, '2028-05-02', 0, 4, '8123771234'),
(3, 3, 3, 'Anak Genduruwo Yang Terlantar', 'ada anak genduruwo yang tidak dianggap oleh kedua orangtuanya ayo bantu dia!', 'defaultpost.jpg', 1, '2018-06-02', 0, 3, '234234234324234324');

-- --------------------------------------------------------

--
-- Table structure for table `token_table`
--

CREATE TABLE `token_table` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_table`
--

INSERT INTO `token_table` (`token_id`, `user_id`, `token_code`) VALUES
(2, 2, '914092d53cd142f2d3b4d940a8dc9401753f46ce'),
(5, 2, '525fcb46681fb08235258aff27e43edd95a6ab6b'),
(6, 4, '11ecd4e00b9cbdf36be00bb59647940d366e8a12'),
(7, 5, '20f27f6193bade5784dc09bc8be4f64f24305611'),
(8, 3, '155bfd9504ca1c4d8bb816aa4bcc49945ba51d81');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` text NOT NULL,
  `user_address` text NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phone`, `user_level`, `user_status`, `user_image`) VALUES
(1, 'Admin Akuberi', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Jl.Serpong Raya', '08123456789', 1, 1, 'defaultuser.jpg'),
(2, 'User Akuberi', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jl.Serpong Raya', '08123456789', 2, 1, 'defaultuser.jpg'),
(3, 'Russell  Raimundo', 'raimundorussell@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'asdasdasd', '08123123', 2, 1, 'defaultuser.jpg'),
(4, 'Roger Marino', 'roger@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'Jl.Sermasdasdasds', '081316105021', 2, 1, 'defaultuser.jpg'),
(5, 'Felly  Zefanya', 'felly@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'aseloleeeeeeeasdasd as asdas ds', '0811312312', 2, 1, 'defaultuser.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_table`
--
ALTER TABLE `bank_table`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `broadcast_table`
--
ALTER TABLE `broadcast_table`
  ADD PRIMARY KEY (`broadcast_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `notification_table`
--
ALTER TABLE `notification_table`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `token_table`
--
ALTER TABLE `token_table`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_table`
--
ALTER TABLE `bank_table`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `broadcast_table`
--
ALTER TABLE `broadcast_table`
  MODIFY `broadcast_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_table`
--
ALTER TABLE `notification_table`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token_table`
--
ALTER TABLE `token_table`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
