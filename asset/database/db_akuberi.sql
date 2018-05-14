-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 05:31 AM
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
  `bc_description` text NOT NULL,
  `bc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcast_table`
--

INSERT INTO `broadcast_table` (`broadcast_id`, `user_id`, `target_id`, `bc_description`, `bc_date`) VALUES
(1, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-05-14');

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
  `chat_data` text NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_table`
--

CREATE TABLE `history_table` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `history_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_table`
--

CREATE TABLE `notification_table` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `broadcast_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `notif_type` int(11) NOT NULL,
  `notif_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_table`
--

INSERT INTO `notification_table` (`notif_id`, `user_id`, `target_id`, `broadcast_id`, `post_id`, `notif_type`, `notif_date`) VALUES
(1, 1, 3, 1, 0, 1, '2018-05-14');

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
  `post_created` date NOT NULL,
  `post_due` date NOT NULL,
  `post_target` int(11) NOT NULL,
  `post_revenue` int(11) NOT NULL,
  `target_achieved` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `post_rek` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `user_id`, `category_id`, `post_title`, `post_desc`, `post_img`, `post_status`, `post_created`, `post_due`, `post_target`, `post_revenue`, `target_achieved`, `bank_id`, `post_rek`) VALUES
(1, 3, 5, 'Ayo Bantu Saudara Kita Yang Menjadi Korban Bom Di Gereja Surabaya', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'dd2968c5e7e3bf33_705040_720.jpg', 1, '2018-05-14', '2018-05-21', 90000000, 0, 0, 5, '61159318123'),
(2, 3, 3, 'Ayo Bantu Teman-Teman Kita Yang Kelaparan Di Papua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '9e194dcdbcd0800e_large-papuaaaa-36fb28eec4d84837665badef58093297.jpg', 1, '2018-05-14', '2018-05-17', 700000000, 0, 0, 4, '61152361242'),
(3, 5, 1, 'Ayo Bantu Wujudkan Pesawat Buatan Anak Bangsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2e5970022c41f018_mantap-habibie-rancang-pesawat-r80-untuk-selamatkan-dunia-dirgantara-tanah-air-1cU37IVieS.jpeg', 1, '2018-05-14', '2018-06-14', 100000000, 0, 0, 3, '611524812631'),
(4, 5, 4, 'Bantu Biaya Pembangunan SDN 5 Banjarwangi ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fc3c4854d9f0356c_750xauto-pertanyaan-anak-sd-ini-uji-level-kecerdasanmu-coba-jawab-kalau-bisa-170828p.jpg', 1, '2018-05-14', '2019-05-14', 15000000, 0, 0, 2, '61124512631'),
(5, 6, 6, 'Mohon Bantuan Untuk Biaya Pembangunan Gereja Kristus Raja', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'b88c8545825b3d2d_gereja-sambas_20171219_012825.jpg', 1, '2018-05-14', '2028-05-14', 1000000000, 0, 0, 2, '6115234162461');

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
(3, 3, '4952eb9981c8141b30de92e993e002aabbea6601'),
(6, 1, '9fc39c2c8cdaeb5943b880414eeb6d57d0fa2096');

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
(0, 'System', '', '', '', '', 0, 0, ''),
(1, 'Admin Akuberi', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Jl.Serpong Raya', '081999067181', 1, 1, 'defaultuser.jpg'),
(2, 'User Akuberi', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jl.Serpong Raya', '08123456789', 2, 1, 'defaultuser.jpg'),
(3, 'Russell  Raimundo', 'raimundorussell@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'Jl. Serma Durna No.5A Denpasar', '08123123123', 2, 1, '7d9c838dbbf137bf_bae.jpg'),
(4, 'Roger Marino', 'roger@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'Jl.Sermasdasdasds', '081316105021', 2, 1, 'defaultuser.jpg'),
(5, 'Felly  Zefanya', 'felly@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'aseloleeeeeeeasdasd as asdas ds', '0811312312', 2, 1, '40635bd6eda49441_00125300.jpg'),
(6, 'James Martin', 'james@gmail.com', 'fece7a3025a1cfdaaa5b864fa10b3e96', 'Jl.SermaSesamaKitaSemua', '081123172471', 2, 1, 'defaultuser.jpg');

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
-- Indexes for table `history_table`
--
ALTER TABLE `history_table`
  ADD PRIMARY KEY (`history_id`);

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
  MODIFY `broadcast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `history_table`
--
ALTER TABLE `history_table`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_table`
--
ALTER TABLE `notification_table`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token_table`
--
ALTER TABLE `token_table`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
