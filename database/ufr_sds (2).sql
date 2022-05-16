-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2022 at 03:26 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufr_sds`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`nom`, `email`, `password`) VALUES
('ilboudo', 'ilboudosouleymane4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(100) NOT NULL,
  `idTuteur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`nom`, `prenom`, `date_naiss`, `email`, `numero`, `idTuteur`) VALUES
('Souleymane', 'Ilboudo', '2022-05-25', 'ilboudosouleymane4@gmail.com', '49846848', '45123658'),
('Souleymane', 'Ilboudo', '2022-05-18', 'ilboudosouleymane4@gmail.com', '55993984', NULL),
('Tassi', 'Namountougou', '2022-05-04', 'tassi@gmail.com', '55998984', NULL),
('Sylva', 'Hungry', '2022-05-18', 'sylva@gmail.com', '56214584', '4887885'),
('az', 'Souleymane', '2022-05-12', 'dimhe@gmail.com', '653563546', '4887885');

-- --------------------------------------------------------

--
-- Table structure for table `Tuteur`
--

CREATE TABLE `Tuteur` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numero` varchar(100) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Tuteur`
--

INSERT INTO `Tuteur` (`nom`, `prenom`, `numero`, `email`) VALUES
('Kam ', 'Aphro ', '01020304', 'ilboudosouleym@gmail.Com'),
('Kadio', 'Soumaila', '45123658', 'sbSOul@gmail.Com'),
('Aphro', 'jumia', '4887885', 'ilboudosouleymane4@gmail.com'),
('Motor', 'Original', '55994587', 'origi@gmail.com'),
('Boureima', 'Namountougou', '71731548', 'nnamo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `IdTuteur` (`idTuteur`);

--
-- Indexes for table `Tuteur`
--
ALTER TABLE `Tuteur`
  ADD PRIMARY KEY (`numero`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD CONSTRAINT `IdTuteur` FOREIGN KEY (`idTuteur`) REFERENCES `Tuteur` (`numero`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
