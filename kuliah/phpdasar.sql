-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 05:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` char(9) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(2, '213040140', 'Wildan N', 'wildannasrulloh321@gmail.com', 'Teknik Informatika', 'wildann.jpg'),
(4, '213040001', 'Bruno Mars', 'brunomars@gmail.com', 'Teknik Pangan', 'bruno.png'),
(5, '213040139', 'Justin Bukber', 'justinbieber@gmail.com', 'Teknik Industri', 'just.jpeg'),
(14, '123123134', 'asdasdsad', 'wildanreliyanto2@gmail.com', 'asdsadasd', 'asdadfaff'),
(25, 'aew2', '124124e', '12e1we', '12re1wer', '21re21qr'),
(26, 'aeraw', 'Ericko Lim', 'riko@aaasd', 'Geming', 'ericko.jpeg'),
(27, '10923809', 'Kemal Palevi', 'kp@sakdasd', 'Lawakers', 'kemal.jpg'),
(28, '132414', 'Los retros', 'losfia', 'Musical', 'losretros.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
