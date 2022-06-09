-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 04:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tukangpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'VGA'),
(2, 'Processor'),
(3, 'Monitor'),
(4, 'Keyboard'),
(5, 'Mouse'),
(11, 'RAM');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `nama`, `gambar`, `detail`) VALUES
(4, 1, 'MSI RTX 3090 Ventus 3X 24G OC - RTX 3090 GDDR6X', 'vDYuG3aYXScX8xBUkaoz.jpg', 'MSI RTX 3090 Ventus 3X 24G OC - RTX 3090 GDDR6X'),
(5, 3, 'dffdaadf', 'TLbheXBxu55XRe73z02l.png', 'asfsfa'),
(6, 1, 'XFX RADEON RX 6600 XT CORE 8GB DDR6 SPEEDSTER SWFT210 - RX-66XT8DFDQ', 'VDqi1aqLQlmgH6WgUfe7.png', 'XFX RADEON RX 6600 XT CORE 8GB DDR6 SPEEDSTER SWFT210 - RX-66XT8DFDQ'),
(7, 1, 'GALAX Geforce RTX 3080 12GB DDR6X SG (1-Click OC) - TRIPLE ARGB FAN - LHR Version', 'dySrrMBkeBCxB0TnHEFk.png', 'GALAX Geforce RTX 3080 12GB DDR6X SG (1-Click OC) - TRIPLE ARGB FAN - LHR Version'),
(8, 11, 'ADATA DDR4 XPG SPECTRIX D50 PC25600 3200MHz 32GB (2X16GB) Dual Channel - RGB - AX4U320016G16A-DT50', 'CnUvyN3t81h5DUcTQzlU.png', 'SPECTRIX D50 DDR4 RGB MEMORY MODULE\r\nTHE NEED FOR SPEED\r\n-Blazing Fast\r\n-Solid Construction\r\n-Elegant Geometric Styling\r\n-RGB Your Way\r\n-Supports Intel® Extreme Memory Profile (XMP) 2.0\r\n-Ready for AMD- and Intel-based systems');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admins', '$2y$10$CkWyCyfizqqH0VaIotJkYuBiqOPY/PkxMxsPnwqFLzBthiME7WPjq', 1),
(2, 'admin', '$2y$10$hrqzHGf5HX2QE9wWwpIx.Ol6QVMnhmzkLR9q2h6BG1nezBFY8e0x.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
