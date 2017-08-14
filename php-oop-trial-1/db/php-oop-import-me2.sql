-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 06:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php-oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`, `image`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, 3, '2014-06-01 01:12:26', '2014-05-31 09:12:26', ''),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, 2, '2014-06-01 01:12:26', '2014-05-31 09:12:26', ''),
(3, 'Samsung Galaxy S4', 'How about no?', 600, 3, '2014-06-01 01:12:26', '2014-05-31 09:12:26', ''),
(6, 'Bench Shirt', 'The best shirt!', 29, 1, '2014-06-01 01:12:26', '2014-05-30 18:12:21', ''),
(7, 'Lenovo Laptop', 'My business partner.', 399, 2, '2014-06-01 01:13:45', '2014-05-30 18:13:39', ''),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, 2, '2014-06-01 01:14:13', '2014-05-30 18:14:08', ''),
(9, 'Spalding Watch', 'My sports watch.', 199, 1, '2014-06-01 01:18:36', '2014-05-30 18:18:31', ''),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 300, 2, '2014-06-06 17:10:01', '2014-06-05 10:09:51', ''),
(11, 'Huawei Y300', 'For testing purposes.', 100, 2, '2014-06-06 17:11:04', '2014-06-05 10:10:54', ''),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, 1, '2014-06-06 17:12:21', '2014-06-05 10:12:11', ''),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, 1, '2014-06-06 17:12:59', '2014-06-05 10:12:49', ''),
(25, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', 6666, 1, '2014-11-22 18:42:13', '2014-11-21 11:42:13', '22567ca140d846f4dc52e5781ad7f52a51b2ab9e-sword-art-online-2-2014-anime-high-resolution-wallpaper-1920x1080.jpg'),
(26, 'Another product', 'Awesome product!', 555, 2, '2014-11-22 19:07:34', '2014-11-21 12:07:34', ''),
(27, 'Bag', 'Awesome bag for you!', 999, 1, '2014-12-04 21:11:36', '2014-12-03 14:11:36', ''),
(28, 'Wallet', 'You can absolutely use this one!', 799, 1, '2014-12-04 21:12:03', '2014-12-03 14:12:03', ''),
(30, 'Wal-mart Shirt', '', 555, 2, '2014-12-13 00:52:29', '2014-12-11 17:52:29', ''),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, 1, '2014-12-13 00:52:54', '2014-12-11 17:52:54', ''),
(32, 'Washing Machine Model PTRR', 'Some new product.', 999, 1, '2015-01-08 22:44:15', '2015-01-07 15:44:15', ''),
(39, 'aac cccc', 'new description\r\n', 222, 3, '2017-08-14 16:51:59', '2017-08-14 14:51:59', '220fbed0006c6df75129751bd8d58a2d01a91fe8-sinon-sword-art-online-2-hd-girl-wallpaper-1920x1080-1920x1080.jpg'),
(40, 'bb bb bb b', '', 0, 0, '2017-08-14 16:54:06', '2017-08-14 14:54:06', ''),
(41, 'aaa bbb ccc', 'aabbcc with the photo', 7777, 2, '2017-08-14 18:21:47', '2017-08-14 16:21:47', 'aad086578bfaad96c49230858f36bec126cb30e6-333852.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
