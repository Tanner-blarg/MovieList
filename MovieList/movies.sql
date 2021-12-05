-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 07:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `movie_num` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_type` varchar(100) NOT NULL,
  `where_to_watch` varchar(250) NOT NULL,
  `when_was_made` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`movie_num`, `movie_title`, `movie_type`, `where_to_watch`, `when_was_made`) VALUES
(1, 'Star Wars Episode IV A New Hope', 'Action, Adventure, Science-Fiction', 'Disney+', 1977),
(2, 'Star Wars Episode V The Empire Strikes Back', 'Action, Adventure, Science-Fiction', 'Disney+', 1980),
(3, 'Star Wars Episode VI Return Of The Jedi', 'Action, Adventure, Science-Fiction', 'Disney+', 1983);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES
('Tanner', 'Habel', 'tannerhabel@gmail.com', '$2y$10$YSNTZPrKGf7kMRDNIUamOuyfX4PPhgms.uB5pm3ieUM'),
('joe', 'smoe', 'josm@hotmail.com', '$2y$10$9wTNSslYHcFHye.BrPdUJO3lPQlAxET0lVM689Op4gK');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `movie_title` varchar(100) NOT NULL,
  `movie_type` varchar(100) NOT NULL,
  `where_to_watch` varchar(100) NOT NULL,
  `when_was_made` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `movie_title` varchar(100) NOT NULL,
  `movie_type` varchar(100) NOT NULL,
  `where_to_watch` varchar(100) NOT NULL,
  `when_was_made` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`movie_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `movie_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
