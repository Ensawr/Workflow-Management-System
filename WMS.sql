-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 11:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcodemaker_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(16) NOT NULL,
  `itemCode` varchar(32) NOT NULL,
  `color` varchar(32) NOT NULL,
  `colorCode` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `itemCode`, `color`, `colorCode`) VALUES
(1, '6161610006631', 'ABC.XYZ.0001', 'White', 'C100'),
(2, '6161610009209', 'ABC.XYZ.0001', 'Gray', 'C050'),
(3, '6161610003633', 'ABC.XYZ.0001', 'Black', 'C000'),
(4, '6161610004514', 'ABC.XYZ.0002', 'White', 'C100'),
(5, '6161610009697', 'ABC.XYZ.0002', 'Gray', 'C050'),
(6, '6161610007177', 'ABC.XYZ.0002', 'Black', 'C000'),
(7, '6161610006930', 'ABC.XYZ.0003', 'White', 'C100'),
(8, '6161610007057', 'ABC.XYZ.0003', 'Gray', 'C050'),
(9, '6161610005596', 'ABC.XYZ.0003', 'Black', 'C000'),
(10, '6161610005966', 'ABC.XYZ.0004', 'White', 'C100'),
(11, '6161610002169', 'ABC.XYZ.0004', 'Gray', 'C050'),
(12, '6161610004954', 'ABC.XYZ.0004', 'Black', 'C000'),
(13, '6161610006079', 'ABC.XYZ.0005', 'White', 'C100'),
(14, '6161610006171', 'ABC.XYZ.0005', 'Gray', 'C050'),
(15, '6161610008494', 'ABC.XYZ.0005', 'Black', 'C000'),
(16, '6161610003689', 'ABC.XYZ.0006', 'White', 'C100'),
(17, '6161610009374', 'ABC.XYZ.0006', 'Gray', 'C050'),
(18, '6161610008604', 'ABC.XYZ.0006', 'Black', 'C000'),
(19, '6161610005346', 'ABC.XYZ.0007', 'White', 'C100'),
(20, '6161610004157', 'ABC.XYZ.0007', 'Gray', 'C050'),
(21, '6161610004150', 'ABC.XYZ.0007', 'Black', 'C000'),
(22, '6161610007292', 'ABC.XYZ.0008', 'White', 'C100'),
(23, '6161610006297', 'ABC.XYZ.0008', 'Gray', 'C050'),
(24, '6161610002731', 'ABC.XYZ.0008', 'Black', 'C000'),
(25, '6161610007117', 'ABC.XYZ.0009', 'White', 'C100'),
(26, '6161610009944', 'ABC.XYZ.0009', 'Gray', 'C050'),
(27, '6161610009961', 'ABC.XYZ.0009', 'Black', 'C000'),
(28, '6161610002181', 'QWE.XYZ.0001', 'Red', 'C010'),
(29, '6161610001161', 'QWE.XYZ.0001', 'Blue', 'C020'),
(30, '6161610005635', 'QWE.XYZ.0002', 'Red', 'C010'),
(31, '6161610009820', 'QWE.XYZ.0002', 'Blue', 'C020'),
(32, '6161610009542', 'QWE.XYZ.0003', 'Red', 'C010'),
(33, '6161610001180', 'QWE.XYZ.0003', 'Blue', 'C020'),
(34, '6161610005353', 'QWE.XYZ.0004', 'Red', 'C010'),
(35, '6161610009081', 'QWE.XYZ.0004', 'Blue', 'C020'),
(36, '6161610006458', 'QWE.XYZ.0005', 'Red', 'C010'),
(37, '6161610002490', 'QWE.XYZ.0005', 'Blue', 'C020'),
(38, '6161610006785', 'QWE.XYZ.0006', 'Red', 'C010'),
(39, '6161610007694', 'QWE.XYZ.0006', 'Blue', 'C020'),
(40, '6161610002898', 'QWE.XYZ.0007', 'Red', 'C010'),
(41, '6161610001363', 'QWE.XYZ.0007', 'Blue', 'C020'),
(42, '6161610009567', 'QWE.XYZ.0008', 'Red', 'C010'),
(43, '6161610009485', 'QWE.XYZ.0008', 'Blue', 'C020'),
(44, '6161610008646', 'QWE.XYZ.0009', 'Red', 'C010'),
(45, '6161610006874', 'QWE.XYZ.0009', 'Blue', 'C020'),
(46, '6161610007587', 'QWE.PHP.0001', 'Green', 'C030'),
(47, '6161610006068', 'QWE.PHP.0001', 'Purple', 'C040'),
(48, '6161610006637', 'QWE.PHP.0001', 'Orange', 'C060'),
(49, '6161610001508', 'QWE.PHP.0002', 'Green', 'C030'),
(50, '6161610005623', 'QWE.PHP.0002', 'Purple', 'C040'),
(51, '6161610006436', 'QWE.PHP.0002', 'Orange', 'C060'),
(52, '6161610007965', 'QWE.PHP.0003', 'Green', 'C030'),
(53, '6161610004681', 'QWE.PHP.0003', 'Purple', 'C040'),
(54, '6161610005153', 'QWE.PHP.0003', 'Orange', 'C060'),
(55, '6161610006956', 'QWE.PHP.0004', 'Green', 'C030'),
(56, '6161610003838', 'QWE.PHP.0004', 'Purple', 'C040'),
(57, '6161610005647', 'QWE.PHP.0004', 'Orange', 'C060'),
(58, '6161610007598', 'QWE.PHP.0005', 'Green', 'C030'),
(59, '6161610006338', 'QWE.PHP.0005', 'Purple', 'C040'),
(60, '6161610006784', 'QWE.PHP.0005', 'Orange', 'C060'),
(61, '6161610002083', 'QWE.PHP.0006', 'Green', 'C030'),
(62, '6161610006799', 'QWE.PHP.0006', 'Purple', 'C040'),
(63, '6161610007200', 'QWE.PHP.0006', 'Orange', 'C060'),
(64, '6161610004004', 'QWE.PHP.0007', 'Green', 'C030'),
(65, '6161610007392', 'QWE.PHP.0007', 'Purple', 'C040'),
(66, '6161610002486', 'QWE.PHP.0007', 'Orange', 'C060'),
(67, '6161610009534', 'QWE.PHP.0008', 'Green', 'C030'),
(68, '6161610005327', 'QWE.PHP.0008', 'Purple', 'C040'),
(69, '6161610007583', 'QWE.PHP.0008', 'Orange', 'C060'),
(70, '6161610002136', 'QWE.PHP.0009', 'Green', 'C030'),
(71, '6161610008938', 'QWE.PHP.0009', 'Purple', 'C040'),
(72, '6161610006294', 'QWE.PHP.0009', 'Orange', 'C060');

-- --------------------------------------------------------

--
-- Table structure for table `routes_product`
--

CREATE TABLE `routes_product` (
  `id` int(11) NOT NULL,
  `barcode` varchar(32) NOT NULL,
  `first_location` varchar(16) NOT NULL,
  `second_location` varchar(16) NOT NULL,
  `retouch` varchar(16) NOT NULL,
  `control` varchar(16) NOT NULL,
  `hierarchy` varchar(32) NOT NULL,
  `time_first_action` varchar(64) NOT NULL,
  `time_first_studio` varchar(64) NOT NULL,
  `time_second_studio` varchar(64) NOT NULL,
  `time_retouch` varchar(64) NOT NULL,
  `time_completed` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `auth` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth`, `name`) VALUES
(1, 'admin', 'admin!', 'admin', 'Ensar'),
(6, 'storage', '123', 'storage', 'Storage Auth'),
(7, 'std_manager', '123', 'studio_manager', 'Studio Manager'),
(8, 'std1', '123', 'studio1', 'Studio 1 User'),
(9, 'std2', '123', 'studio2', 'Studio 2 User'),
(10, 'std3', '123', 'studio3', 'Studio 3 User'),
(11, 'std4', '123', 'studio4', 'Studio 4 User'),
(12, 'retouch', '123', 'retouch', 'Retoucher User'),
(13, 'product_manager', '123', 'product', 'Product Manager');

-- --------------------------------------------------------

--
-- Table structure for table `_info_auths`
--

CREATE TABLE `_info_auths` (
  `id` int(11) NOT NULL,
  `auth` varchar(16) NOT NULL,
  `auth_desc` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_info_auths`
--

INSERT INTO `_info_auths` (`id`, `auth`, `auth_desc`) VALUES
(1, 'admin', 'Admin yetkisi'),
(2, 'storage', 'Depocu yetkisi'),
(3, 'studio_manager', 'Stüdyo yönetici yetkisi'),
(4, 'studio1', 'Stüdyo kullanıcı yetkisi'),
(5, 'studio2', 'Stüdyo kullanıcı yetkisi'),
(6, 'studio3', 'Stüdyo kullanıcı yetkisi'),
(7, 'studio4', 'Stüdyo kullanıcı yetkisi'),
(8, 'retouch', 'Retoucher yetkisi'),
(9, 'product', 'Ürün kontrol yetkisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes_product`
--
ALTER TABLE `routes_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_info_auths`
--
ALTER TABLE `_info_auths`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `routes_product`
--
ALTER TABLE `routes_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `_info_auths`
--
ALTER TABLE `_info_auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
