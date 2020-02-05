-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 06:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojabaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `igracka`
--

CREATE TABLE `igracka` (
  `igrackaID` int(10) NOT NULL,
  `nazivIgracke` varchar(40) NOT NULL,
  `proizvodjac` varchar(40) NOT NULL,
  `cena` double(10,2) NOT NULL,
  `opis` varchar(100) NOT NULL,
  `slika` varchar(50) NOT NULL,
  `stanje` int(10) NOT NULL,
  `tipIgrackeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igracka`
--

INSERT INTO `igracka` (`igrackaID`, `nazivIgracke`, `proizvodjac`, `cena`, `opis`, `slika`, `stanje`, `tipIgrackeID`) VALUES
(1, 'Kegle', 'Shimmer & Shine', 1000.00, 'Kegle za devojčice. Uzrast 3+ godina.', 'slike/devojcice/kegle.png', 10, 1),
(2, 'Magična tabla', 'Shimmer & Shine', 1000.00, 'Magična tabla za devojčice. Uzrast 3+ godine.', 'slike/devojcica/magicnaTabla.png', 5, 1),
(3, 'Drvena kuhinja', 'Nepoznat', 4500.00, 'San svake male devojčice jeste spremanje hrane svojoj porodici i prijateljima. Omogućite to svojoj m', 'slika/devojcice/drvenaKuhinja.png', 10, 1),
(4, 'Plišani medo ', 'Toyzzz', 5000.00, 'Plišani drugar za decu uzrasta 3+ godine. Visina mede 75 cm.', 'slike/obaPola/medo75cm.png', 3, 4),
(5, 'Plišano magare', 'Toyzzz', 600.00, 'Plišani drugar za sve uzraste.', 'slike/obaPola/magare.png', 10, 4),
(6, 'Učimo azbuku', 'Toddly Fun', 4300.00, 'Pomozite Vašim mališanima da uz igru savladaju azbuku. Za sve uzraste.', 'slike/obaPola/ucimoAzbuku.png', 11, 4),
(7, 'Tabla sa stalkom', 'Toddly Fun', 2300.00, 'Probudite u Vašem mališanu umetnika uz pomoć table sa stalkom. U paketu dolazi i pakovanje flomaster', 'slike/obaPola/tablaSaStalkom.png', 2, 4),
(8, 'Drveni bilijar', 'Toyzz', 4000.00, 'Drveni bilijar za dečake. Uzrast 7+ godina. ', 'slike/decaci/drveniBilijar', 3, 2),
(9, 'Koš sa tablom', 'Magic', 500.00, 'Ideee trojkaaa sa druge planete. Uzrast 3+ godine, namenjen dečacima.', 'slike/decaci/kosSaTablom', 11, 2),
(10, 'Vojna vozila', 'Porces', 1400.00, 'U jednom pakovanju se nalazi 4 kamiona i 1 helikopter. Za dečake svih uzrasta.', 'slike/decaci/vojnaVozila', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(10) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `korisnickoIme` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `adresa` varchar(60) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipigracke`
--

CREATE TABLE `tipigracke` (
  `tipIgrackeID` int(11) NOT NULL,
  `pol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipigracke`
--

INSERT INTO `tipigracke` (`tipIgrackeID`, `pol`) VALUES
(1, 'za devojcice'),
(2, 'za decake'),
(3, 'za bebe'),
(4, 'oba pola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igracka`
--
ALTER TABLE `igracka`
  ADD PRIMARY KEY (`igrackaID`) USING BTREE,
  ADD KEY `tipIgrackeID` (`tipIgrackeID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `tipigracke`
--
ALTER TABLE `tipigracke`
  ADD PRIMARY KEY (`tipIgrackeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igracka`
--
ALTER TABLE `igracka`
  MODIFY `igrackaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipigracke`
--
ALTER TABLE `tipigracke`
  MODIFY `tipIgrackeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
