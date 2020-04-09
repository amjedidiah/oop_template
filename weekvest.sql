-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2020 at 09:19 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weekvest`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `email`, `pass`, `reset_key`) VALUES
('0720ed8af6dc27758ac5fd3ced9f2213', 'far@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('093b1454df6ea9607a1a7670a015edb1', 'nsa@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('0d8eaf4638be49234f553804973e3859', 'vwr@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('1a75a21404f6a0c3c71560863a402c78', 'aja@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('2fc124bdea1a99dc745dbb1357547b5a', 'imunacnhode@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('30d07fd70a32152f5935c33dbe71f778', 'amaraegbu.jedidiah@crmintcol.org', 'bf5015228457dd196c293578c540e70e', ''),
('39be2d7c680410718c466772a3e14ae2', 'daqqaq@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('3efcf11c3396e991a8c807fbbc708caa', 'daqqaqsqae@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('433d120de70fbc7a455ad9fe8d474881', 'vsd@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('5513d60ee20b94dacde0439baa1e33aa', 'jbrgafs@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('57f674f7cb6d67ad9a6f4193357bafaa', 'jbrgfs@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('5b55e6cfee835be02be4322d72abb5a2', 'imunacjode@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('5d8fb6366f66d7e8f1d0e8b3abf43916', 'mavinakiqn@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('66cd799a6539d3ed9e9abbbc0b9dd082', 'imunacode@gmail.com', '55bcd34bc3867df2af7b1f06c8c357ff', ''),
('6d88c11c163cf877aec21511f80fe81c', 'imunacodejuyt@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('7aa81da11bd790af798cdbbff5528c43', 'jidwithja341@crmintcol.org', 'bf5015228457dd196c293578c540e70e', ''),
('7ad296b672a9f50b5244e54174f92a47', 'daq@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('7f04dc597b9ed175eb8df50fc8f0529f', 'ada@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('81f76206da26c78dd74d4fd313cad0c0', 'brgfs@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('87cdbc01972d67cb169ba855f534e81b', 'imunacwodeqw@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('9db8d20dc6c4ea76787afe825e8719ed', 'mavinakin@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('a3d7936a803e207c77c14bddabe65357', 'daqqaqe@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('aeaa1a19e8d0fe742a90d1ba4b53985d', 'abuahmed@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('c4f31eaac65d29ffe857d5ad9d430050', 'imunacoiode@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('c7b6e62099fa936e6c3bf3fca4cb1352', 'imunacwode@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('d38961a04e400ff758f4c41c026fedc1', 'daqq@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('db4d5360a8a7aae19f9ae89abb08411c', 'byeimunacode@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('dbea848cb34f8e4255e4528dc5c83fa0', 'bgfs@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('ee34cd6d9a27cdb483aea7b3104b0252', 'imunacodwayae@gmail.com', 'bf5015228457dd196c293578c540e70e', ''),
('efc062a23e2b556313a6bc51bbf38624', 'balo@gmail.com', 'bd70ffe98a66334bc097e516a7753c40', ''),
('fb8eb84df570a6101328ae02f9af28fb', 'rane@gmail.com', 'bf5015228457dd196c293578c540e70e', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_admin`
--

CREATE TABLE `auth_admin` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_admin`
--

INSERT INTO `auth_admin` (`id`, `pass`) VALUES
('cd08706f1f7fb06b6dbf08dc4fb1d436', '0b84e8e8a8b5d607b205b4d5c6285913'),
('f648a3d9e451b0c2c6ad5345cee0dc96', '0b84e8e8a8b5d607b205b4d5c6285913');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user`, `bank`, `name`, `number`) VALUES
(6, '0d8eaf4638be49234f553804973e3859', 'First Bank', 'Jedidiah Amaraegbu', '3063897196');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunityID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchasedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `units` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `opportunityID`, `userID`, `purchasedOn`, `units`, `paid`) VALUES
(12, '0fe1c6355349dc80de9c4521bd569208', 'fb8eb84df570a6101328ae02f9af28fb', '2020-03-07 16:29:00', 4, 20000),
(13, '0fe1c6355349dc80de9c4521bd569208', '7aa81da11bd790af798cdbbff5528c43', '2020-03-09 12:17:52', 20, 100000),
(14, '29e7b45bb9462c8ac98012d2620a4220', '0d8eaf4638be49234f553804973e3859', '2020-03-10 14:29:56', 1, 20000),
(15, '17213a4965c02d2b983d42d01d190661', '30d07fd70a32152f5935c33dbe71f778', '2020-03-11 10:01:51', 6, 30000),
(16, '17213a4965c02d2b983d42d01d190661', '30d07fd70a32152f5935c33dbe71f778', '2020-03-11 10:07:08', 1, 5000),
(17, '17213a4965c02d2b983d42d01d190661', '30d07fd70a32152f5935c33dbe71f778', '2020-03-11 10:08:02', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `investors` int(11) NOT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `units_total` int(11) NOT NULL,
  `units_sold` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`id`, `name`, `interest`, `duration`, `price`, `investors`, `partner`, `info`, `category`, `verified`, `units_total`, `units_sold`, `date_start`, `date_end`) VALUES
('0fe1c6355349dc80de9c4521bd569208', 'Mango Sale', 100, 21, 5000, 2, 'Green Life', 'Invest in the export of mangoes', 'agriculture', 1, 100, 24, '2020-03-09 23:00:00', '2020-03-30 23:00:00'),
('17213a4965c02d2b983d42d01d190661', 'Green Pepper', 10, 1, 5000, 3, 'WeekVest Limited', 'Seling green pepper', 'agriculture', 1, 10, 8, '2020-03-11 23:00:00', '2020-03-12 23:00:00'),
('29e7b45bb9462c8ac98012d2620a4220', 'Orange Sales', 5, 1, 20000, 1, 'Unity Farms', 'I sell oranges', 'agriculture', 1, 1, 1, '2020-03-10 23:00:00', '2020-03-11 23:00:00'),
('a9d1c0a6dab00e1edbf86c9038aee470', 'Water Melon farm', 100, 21, 5000, 1, 'Unity Farms', 'This is an investment', 'agriculture', 1, 100, 0, '2020-03-06 23:00:00', '2020-03-27 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `name`, `user`, `transID`, `used`) VALUES
(17, 'IMG_2464.JPG', 'fb8eb84df570a6101328ae02f9af28fb', '042e3b2865c975a8d4e107c91ed975a2', 1),
(18, 'IMG_2368.JPG', 'fb8eb84df570a6101328ae02f9af28fb', '4593876457fc940d22ce91d4afb6baa3', 1),
(19, 'schoolfocus sticker bold.png', '7aa81da11bd790af798cdbbff5528c43', '37ae8b757e97f35be2b8626f752bdf26', 1),
(21, 'IMG_0709.JPG', '0d8eaf4638be49234f553804973e3859', '7fa748a9a36222cd568580fca84b5bcd', 1),
(22, 'IMG_0709.JPG', '30d07fd70a32152f5935c33dbe71f778', '7fa748a9a36222cd568580fca84b5bcd', 1),
(23, 'IMG_0998.JPG', '0d8eaf4638be49234f553804973e3859', '039b232b4f0a821d30f04476983c548f', 1),
(24, 'IMG_1002.JPG', '0d8eaf4638be49234f553804973e3859', 'b64aabb45d1751c5873af0f133d175b0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`id`, `user`, `question`, `answer`) VALUES
('0073341aa1534774b3425f3f1a2623bb', '0d8eaf4638be49234f553804973e3859', 'What is the name of your first pet?', 'Champion'),
('1b8925c475f54c30cd0bd7170d42ec38', '0d8eaf4638be49234f553804973e3859', 'What elementary school did you attend?', 'NEBS'),
('272fa37440b8133483a6ee09c04ae383', '0d8eaf4638be49234f553804973e3859', 'What is the name of the town where you were born?', 'Lagos'),
('3f3f429534db4bcabe2be09a9a3d2a9e', 'efc062a23e2b556313a6bc51bbf38624', 'What elementary school did you attend?', 'CRMIC'),
('b67eae83d18b7c956d64607029182b9c', 'efc062a23e2b556313a6bc51bbf38624', 'What is the name of the town where you were born?', 'Lagos'),
('bad7d0fd328c7b6d7f7afdb75627f66d', 'efc062a23e2b556313a6bc51bbf38624', 'What is the name of your first pet?', 'Bingo');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) NOT NULL,
  `approvedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user`, `type`, `transID`, `amount`, `createdAt`, `approved`, `approvedBy`) VALUES
(1, 'fb8eb84df570a6101328ae02f9af28fb', 'credit', '042e3b2865c975a8d4e107c91ed975a2', 1000, '2020-03-07 14:59:45', 1, ''),
(2, 'fb8eb84df570a6101328ae02f9af28fb', 'credit', '4593876457fc940d22ce91d4afb6baa3', 30000, '2020-03-07 15:08:58', 1, ''),
(4, 'fb8eb84df570a6101328ae02f9af28fb', 'debit', '0fe1c6355349dc80de9c4521bd569208', 20000, '2020-03-07 16:29:00', 1, ''),
(5, '7aa81da11bd790af798cdbbff5528c43', 'credit', '37ae8b757e97f35be2b8626f752bdf26', 200000, '2020-03-09 12:17:10', 1, ''),
(6, '7aa81da11bd790af798cdbbff5528c43', 'debit', '0fe1c6355349dc80de9c4521bd569208', 100000, '2020-03-09 12:17:53', 1, ''),
(7, '0d8eaf4638be49234f553804973e3859', 'credit', '7fa748a9a36222cd568580fca84b5bcd', 1000000, '2020-03-10 14:17:56', 1, ''),
(8, '0d8eaf4638be49234f553804973e3859', 'debit', '29e7b45bb9462c8ac98012d2620a4220', 20000, '2020-03-10 14:29:56', 1, ''),
(9, '30d07fd70a32152f5935c33dbe71f778', 'credit', '7fa748a9a36222cd568580fca84b5bcd', 1000000, '2020-03-11 08:49:16', 1, ''),
(10, '30d07fd70a32152f5935c33dbe71f778', 'debit', '17213a4965c02d2b983d42d01d190661', 30000, '2020-03-11 10:01:51', 1, ''),
(11, '30d07fd70a32152f5935c33dbe71f778', 'debit', '17213a4965c02d2b983d42d01d190661', 5000, '2020-03-11 10:07:08', 1, ''),
(12, '30d07fd70a32152f5935c33dbe71f778', 'debit', '17213a4965c02d2b983d42d01d190661', 5000, '2020-03-11 10:08:02', 1, ''),
(13, '0d8eaf4638be49234f553804973e3859', 'credit', '039b232b4f0a821d30f04476983c548f', 299998, '2020-03-24 12:03:18', 1, ''),
(14, '0d8eaf4638be49234f553804973e3859', 'withdraw', '0d8eaf4638be49234f553804973e3859', 111, '2020-03-24 13:48:00', 0, ''),
(15, '0d8eaf4638be49234f553804973e3859', 'withdraw', '0d8eaf4638be49234f553804973e3859', 1000000, '2020-03-24 15:24:04', 1, 'f648a3d9e451b0c2c6ad5345cee0dc96'),
(16, '0d8eaf4638be49234f553804973e3859', 'withdraw', '0d8eaf4638be49234f553804973e3859', 9000, '2020-03-24 18:15:32', 1, 'f648a3d9e451b0c2c6ad5345cee0dc96');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet` int(11) NOT NULL DEFAULT '0',
  `verification_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_mail` tinyint(1) NOT NULL,
  `verified_question` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `gender`, `dob`, `state`, `lga`, `avatar`, `wallet`, `verification_mail`, `verified_mail`, `verified_question`) VALUES
('$md5email', '$fname', '$lname', '$email', '$phone', '', '2020-03-10 12:22:48', '', '', '', 0, '$verification_mail', 0, 0),
('0720ed8af6dc27758ac5fd3ced9f2213', 'Amaraegbu', 'Jedidiah', 'far@gmail.com', '8165972229', '', '2020-03-04 21:03:29', '', '', '', 840, '', 1, 0),
('093b1454df6ea9607a1a7670a015edb1', 'Jedidiah', 'Amaraegbu', 'nsa@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('0d8eaf4638be49234f553804973e3859', 'Jedidiah', 'Amaraegbu', 'vwr@gmail.com', '08165972229', 'Male', '2020-03-12 23:00:00', 'Ekiti', 'Ado Ekiti', '', 270887, '', 1, 1),
('1a75a21404f6a0c3c71560863a402c78', 'Ahmid', 'Aja', 'aja@gmail.com', '08165972229', '', '2020-03-27 23:00:00', '', '', '', 0, '', 1, 0),
('2fc124bdea1a99dc745dbb1357547b5a', 'Amaraegbu', 'Jedidiah', 'imunacnhode@gmail.com', '8165972229', '', '2020-03-27 23:00:00', '', '', '', 0, '53c3b9f490543d8d1098038f76eb00fa', 0, 0),
('30d07fd70a32152f5935c33dbe71f778', 'Jedidiah', 'Amaraegbu', 'amaraegbu.jedidiah@crmintcol.org', '08165972229', '', '2020-03-20 23:00:00', '', '', './img/uploads/avatars/30d07fd70a32152f5935c33dbe71f778.jpg', 960000, '3c11527821a8bf3f4902cbf01cddee2f', 1, 0),
('39be2d7c680410718c466772a3e14ae2', 'Daq', 'Habilis', 'daqqaq@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('3efcf11c3396e991a8c807fbbc708caa', 'Daq', 'Habilis', 'daqqaqsqae@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('433d120de70fbc7a455ad9fe8d474881', 'Jedidiah', 'Amaraegbu', 'vsd@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('5513d60ee20b94dacde0439baa1e33aa', 'Jedidiah', 'Amaraegbu', 'jbrgafs@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('57f674f7cb6d67ad9a6f4193357bafaa', 'Jedidiah', 'Amaraegbu', 'jbrgfs@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('5b55e6cfee835be02be4322d72abb5a2', 'Jedidiah', 'Amaraegbu', 'imunacjode@gmail.com', '08165972229', '', '2020-03-10 12:24:05', '', '', '', 0, '7deda8de0b09c367f70abb20eb7a1e5a', 0, 0),
('5d8fb6366f66d7e8f1d0e8b3abf43916', 'Mavin', 'Akin', 'mavinakiqn@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('66cd799a6539d3ed9e9abbbc0b9dd082', 'Amos', 'Amaraegbu', 'imunacode@gmail.com', '08165972229', 'Male', '2020-02-29 23:00:00', '', '', './img/uploads/avatars/66cd799a6539d3ed9e9abbbc0b9dd082.jpg', 244, '', 1, 0),
('6d88c11c163cf877aec21511f80fe81c', 'Jedidiah', 'Amaraegbu', 'imunacodejuyt@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '624af80c48e13b6fc5761013ec904afe', 0, 0),
('7aa81da11bd790af798cdbbff5528c43', 'Jedidiah', 'Amaraegbu', 'jidwithja341@crmintcol.org', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 100000, '03a940bf70118295beffa1052d5ccd34', 1, 0),
('7ad296b672a9f50b5244e54174f92a47', 'Daq', 'Habilis', 'daq@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('81f76206da26c78dd74d4fd313cad0c0', 'Jedidiah', 'Amaraegbu', 'brgfs@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('87cdbc01972d67cb169ba855f534e81b', 'Jedidiah', 'Amaraegbu', 'imunacwodeqw@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '6e66a556aea788a0bf28e5451a14d5cc', 0, 0),
('9db8d20dc6c4ea76787afe825e8719ed', 'Mavin', 'Akin', 'mavinakin@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('a3d7936a803e207c77c14bddabe65357', 'Daq', 'Habilis', 'daqqaqe@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('aeaa1a19e8d0fe742a90d1ba4b53985d', 'Abu', 'Ahmed', 'abuahmed@gmail.com', '08165972229', '', '2020-03-08 08:39:39', '', '', '', 0, '', 1, 0),
('c4f31eaac65d29ffe857d5ad9d430050', 'Jedidiah', 'Amaraegbu', 'imunacoiode@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, 'a0600b26564385f40de5e3148fb257de', 0, 0),
('c7b6e62099fa936e6c3bf3fca4cb1352', 'Jedidiah', 'Amaraegbu', 'imunacwode@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, 'ac35138b900f8c0b3a6fa5ab29291a0c', 0, 0),
('d38961a04e400ff758f4c41c026fedc1', 'Daq', 'Habilis', 'daqq@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('db4d5360a8a7aae19f9ae89abb08411c', 'Jedidiah', 'Amaraegbu', 'byeimunacode@gmail.com', '08165972229', '', '2020-03-20 23:00:00', '', '', '', 0, '76c998961846b7fd7c62786aa9894091', 0, 0),
('dbea848cb34f8e4255e4528dc5c83fa0', 'Jedidiah', 'Amaraegbu', 'bgfs@gmail.com', '08165972229', '', '2020-03-06 23:00:00', '', '', '', 0, '', 1, 0),
('e5fae1eddbf8854096dd2150571efb10', 'Daq', 'Habilis', 'daqqaqsqe@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '', 1, 0),
('ee34cd6d9a27cdb483aea7b3104b0252', 'Jedidiah', 'Amaraegbu', 'imunacodwayae@gmail.com', '08165972229', '', '2020-03-13 23:00:00', '', '', '', 0, '62e642ba064ed299459219694d2a0146', 0, 0),
('efc062a23e2b556313a6bc51bbf38624', 'Balo', 'Azeez', 'balo@gmail.com', '08165972229', 'Female', '2020-03-20 23:00:00', '', '', '', 0, '754e59cdc218f9cbc197cc12617fdabd', 1, 1),
('fb8eb84df570a6101328ae02f9af28fb', 'Ken', 'Dibor', 'rane@gmail.com', '08165971119', 'Male', '2002-02-12 23:00:00', '', '', '../img/uploads/avatars/fb8eb84df570a6101328ae02f9af28fb.jpg', 4000, '', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `auth_admin`
--
ALTER TABLE `auth_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
