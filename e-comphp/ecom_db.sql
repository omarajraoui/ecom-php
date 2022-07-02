-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 01:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `uid`, `product_id`, `product_quan`) VALUES
(17, 2, 2, 3),
(18, 2, 5, 1),
(22, 1, 6, 3),
(25, 1, 7, 15),
(26, 6, 1, 5),
(27, 7, 3, 2),
(29, 7, 9, 3),
(30, 5, 2, 1),
(33, 4, 5, 3),
(34, 4, 8, 3),
(37, 0, 4, 1),
(38, 0, 1, 1),
(39, 1, 15, 4),
(40, 0, 15, 1),
(41, 5, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `p_count` int(11) NOT NULL,
  `p_descri` text NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `category` varchar(22) NOT NULL,
  `p_pid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `p_count`, `p_descri`, `image`, `price`, `category`, `p_pid`) VALUES
(15, 'azers', 55, './images/mini_image_160c12a615bc0a.jpg|./images/mini_image_260c12a635e276.jpg|./images/mini_image_360c12a656163a.jpg|./images/mini_image_460c12a6764ac7.jpg|./images/mini_image_560c12a696824a.jpg|lorem loremloremlorem loremlore mloremloreml oremloremlo remlo remloremloreml oremloremlor emlore mlorem loremlo remlore mloremloreml oremloremlor emloreml oremloremloremlorem|8|adidas|[HEADER]: hello everyone welcome to this website./\r\n[another heder]:another paraghraph/', './images/mini_image_60c12a5f59987.jpg', '250', 'Featured Products', 1),
(16, 'Adidas Num-909 serie 0.1', 15, './images/mini_image_160c1f1e76fd08.png|./images/mini_image_260c1f1e87327a.png|./images/mini_image_360c1f1e976109.png|./images/mini_image_460c1f1ea7a47b.png|./images/mini_image_560c1f1eb7b701.png|this product by adidas is the lastest product in this serie |22|ADIDAS| [ Chapter1 ] : hello everyone welcome to this website./  [ ONLY CUPPY THE EXAMPLE] : hello everyone welcome to this website./ ', './images/mini_image_60c1f1e66ecf9.png', '99', 'Featured Products', 1),
(17, 'Adidas Num-909 serie 0.101', 15, './images/mini_image_160c1f205e2a57.png|./images/mini_image_260c1f206e35dd.png|./images/mini_image_360c1f207e7904.png|./images/mini_image_460c1f208e82be.png|./images/mini_image_560c1f209e8d87.png|this product by adidas is the lastest product in this serie |22|ADIDAS| [ Chapter1 ] : hello everyone welcome to this website./  [ ONLY CUPPY THE EXAMPLE] : hello everyone welcome to this website./ ', './images/mini_image_60c1f204e1e0c.png', '120', 'Featured Products', 1),
(18, 'Adidas Num-909 serie 0.101', 15, './images/mini_image_160c1f23438936.png|./images/mini_image_260c1f2353977e.png|./images/mini_image_360c1f2363a4e8.png|./images/mini_image_460c1f2373e6cf.png|./images/mini_image_560c1f2383ef3c.png|this product by nike the lastest product in this serie |30|Nike| [ coppy past] : hello everyone welcome to this website./  [ ONLY CUPPY THE EXAMPLE] : hello everyone welcome to this website./ ', './images/mini_image_60c1f23337dc7.png', '120', 'Featured Products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `u_img` text NOT NULL,
  `priority` int(11) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `u_img`, `priority`, `pass`) VALUES
(1, 'TheWarrior', 'hisokafromhxh@yopmail.com', '', 0, '$2y$10$3B21kMsiibgHd/bDqd.s3O3jCOe6lqUsWeU7Hhq1hmQweQtEDOuNO'),
(3, 'aaezazeaz', 'hisokafdshxh@yopmail.com', '', 1, '$2y$10$ESNWWhkkNG3sqGJJTo9L5Ob7t1bsww3f6xydvqB8oAUlUItgLwqYK'),
(4, 'sdf', 'sdfsd@yopmail.com', '', 1, '$2y$10$MmHDTkSodsIHki2NNZrhjO21yzHqfJhcGPW7JPAuMYOADo.wVSW8S'),
(5, 'aze', 'aa@aa.aa', '', 1, '$2y$10$4DFpQGl4H02Tu5OB0jEIUewiFTnxueNxhu6/O7xzlszxm5rTv0ksu'),
(6, 'Mobydick', 'aa@aaa.aa', '', 1, '$2y$10$SVgG58IwATNMl3iwV/zqpOzScW2UnAGH2F2nYzfevlcBhfwJsuoUq'),
(7, 'mobiduck', 'abizu@gol.com', '', 1, '$2y$10$tHBSz3qvALyUeMlWo0KmF.1GMn6juamsZZQXHgV4Cks4rSSEPuNrm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
