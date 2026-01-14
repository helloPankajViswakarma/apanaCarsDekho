-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 05:36 AM
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
-- Database: `apanacarsdekho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin123', '$2y$10$96yA53WYC95GKN0MkiCTP.93zyi2KZEbI5jtkazCMEcqibYzujwD2', '2025-12-05 01:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `brand` varchar(50) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `description`, `rating`, `amount`, `model`, `image`, `image1`, `brand`, `fuel_type`, `vehicle_type`, `transmission`, `created_at`) VALUES
(2, 'mahindra thar 4 X 4', 'The Mahindra Thar 4x4 is a rugged, capable off-road SUV known for its classic Jeep-like styling, powerful engine options (petrol/diesel),', 2.0, 1500000.00, '4x4 System', 'car_69666e002633f5.46235878.jpg', 'car_69666e00268e25.42626290.jpg', 'Mahindra', 'Diesel', '', '', '2026-01-13 16:08:32'),
(3, 'Tata Punch', 'The Tata Punch is a car made by Tata. It looks good and has features for driving in the city and also for trips. The car is made to look strong and has a high body. It is a comfortable car that people can drive easily.', 3.0, 800000.00, '5-Speed', 'car_69666f52606b17.11919693.jpg', 'car_69666f5260af99.05379378.jpg', 'Tata', 'Electric', '', '', '2026-01-13 16:14:10'),
(4, 'Maruti FRONX', 'There’s a lot to like about the Fronx, and little to fault. It brings with it a likeable balance between a premium hatchback, a sub-compact SUV and a compact SUV.', 3.0, 900000.00, '98.5 Nm - 147.6 Nm', 'car_6966701817f270.41882430.jpg', 'car_69667018182ae4.16595912.jpg', 'Maruti', 'CNG', '', '', '2026-01-13 16:17:28'),
(5, 'Mahindra XUV 7XO', 'The Mahindra XUV 7XO is launched in India at an introductory price of  Rs 13.66 lakh (ex-showroom). It is offered with familiar petrol and diesel powertrain options paired with manual and automatic transmissions, ', 3.0, 1500000.00, 'Mahindra XUV 7XO', 'car_69667132a334c6.78234991.jpg', 'car_69667132a38518.37577729.jpg', 'Mahindra', 'CNG', '', '', '2026-01-13 16:22:10'),
(6, 'mahindra thar 4 X 8', 'The Mahindra XUV 7XO is launched in India at an introductory price of  Rs 13.66 lakh (ex-showroom). It is offered with familiar petrol and diesel powertrain options paired with manual and automatic transmissions, ', 4.0, 1800000.00, 'Thar 4 * 4 2028', 'car_6966794fd4a616.69506136.jpg', 'car_6966794fd4eec8.21826205.jpg', 'Mahindra', 'Petrol', '', '', '2026-01-13 16:56:47'),
(7, 'Maruti Suzuki Jimny', 'The Top 4×4 Cars in India To Conquer Every Terrain', 4.0, 120000.00, 'Maruti Suzuki Jimny 786', 'car_69667a1400e818.23206303.jpg', 'car_69667a14012eb0.82515006.png', 'Maruti', 'Petrol', '', '', '2026-01-13 17:00:04'),
(8, 'Mahindra Tesala', 'The Mahindra XUV 7XO is launched in India at an introductory price of  Rs 13.66 lakh (ex-showroom). It is offered with familiar petrol and diesel powertrain options paired with manual and automatic transmissions, ', 4.0, 4500000.00, 'Tesla cuber 1 ', 'car_69667bcde6bd44.43591039.jpg', 'car_69667bcde70249.31317474.jpg', 'Kia', 'Electric', '', '', '2026-01-13 17:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `name`, `phone`, `email`, `address`, `created_at`) VALUES
(1, 'Pankaj vishwakarma', '07860724320', 'hiipankajvishwakarma@gmail.com', 'Darana jaunpur uttar pradesh', '2026-01-12 18:13:08'),
(2, 'Pankaj vishwakarma', '07860724320', 'hiipankajvishwakarma@gmail.com', 'Darana jaunpur uttar pradesh', '2026-01-12 18:14:34'),
(3, 'Pankaj vishwakarma', '07860724320', 'pv4612530@gmail.com', 'Darana jaunpur uttar pradesh', '2026-01-13 18:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `otp`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hiipankajvishwakarma@gmail.com', '$2y$10$Xrk7CxaVheoWkfIgk1DUXu7Sd.bFYZHZUw.BB0OHHqZp/T5edbveO', '315148', 0, '2026-01-12 12:46:05', '2026-01-12 12:46:05'),
(2, 'satyam jha', 'pv4612530@gmail.com', '$2y$10$9vyKg6c9HoiGjMTKt64fuO6rKvzw0RyhmptEEUxCmbg7if5xfPOuq', '681474', 0, '2026-01-12 12:47:14', '2026-01-12 12:47:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
