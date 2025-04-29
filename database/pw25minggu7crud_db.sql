-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 04:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw25minggu7crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_047`
--

CREATE TABLE `crud_047` (
  `id_produk` varchar(5) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_item` decimal(12,2) NOT NULL,
  `diskon` decimal(5,2) DEFAULT 0.00,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_047`
--

INSERT INTO `crud_047` (`id_produk`, `tgl_beli`, `nama_produk`, `harga_item`, `diskon`, `jumlah_beli`) VALUES
('P0001', '2025-04-29 14:00:00', 'Jaket Hoodie', 250000.00, 10.00, 2),
('P0002', '2025-04-28 13:30:00', 'Sepatu Sneakers', 550000.00, 5.00, 1),
('P0003', '2025-04-27 12:45:00', 'Celana Jeans', 320000.00, 0.00, 3),
('P0004', '2025-04-26 10:20:00', 'T-Shirt Oversize', 150000.00, 0.00, 4),
('P0005', '2025-04-25 09:00:00', 'Topi Bucket', 80000.00, 15.00, 1),
('P0006', '2025-04-24 16:00:00', 'Kemeja Flanel', 275000.00, 7.00, 2),
('P0007', '2025-04-23 17:15:00', 'Jam Tangan', 600000.00, 10.00, 1),
('P0008', '2025-04-22 15:50:00', 'Kaos Polos', 100000.00, 0.00, 5),
('P0009', '2025-04-21 14:00:00', 'Sweater Rajut', 220000.00, 5.00, 2),
('P0010', '2025-04-20 11:45:00', 'Sandal Casual', 180000.00, 0.00, 2),
('P0011', '2025-04-19 13:30:00', 'Celana Pendek', 130000.00, 10.00, 3),
('P0012', '2025-04-18 09:30:00', 'Kacamata Hitam', 90000.00, 0.00, 1),
('P0013', '2025-04-17 08:15:00', 'Ransel Travel', 480000.00, 8.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_047`
--
ALTER TABLE `crud_047`
  ADD PRIMARY KEY (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
