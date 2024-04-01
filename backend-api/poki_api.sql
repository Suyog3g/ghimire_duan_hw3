-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2024 at 08:50 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: poki_api
--

-- --------------------------------------------------------

--
-- Table structure for table pokemon
--

CREATE TABLE pokemon (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  weight decimal(10,2) NOT NULL,
  height decimal(10,2) NOT NULL,
  abilities text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table pokemon
--

INSERT INTO pokemon (id, name, weight, height, abilities) VALUES
(1, 'Charizard', '905.00', '17.00', 'Blaze, Solar-power'),
(2, 'Charmeleon', '190.00', '11.00', 'Blaze, Solar-power'),
(3, 'Bulbasaur', '69.00', '7.00', 'Overgrow, Chlorophyll'),
(4, 'Wartortle', '225.00', '10.00', 'Torrent, Rain-dish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table pokemon
--
ALTER TABLE pokemon
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table pokemon
--
ALTER TABLE pokemon
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
