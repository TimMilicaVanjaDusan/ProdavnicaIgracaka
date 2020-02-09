-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 04:24 AM
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
  `cena` varchar(20) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `slika` varchar(50) NOT NULL,
  `stanje` int(10) NOT NULL,
  `tipIgrackeID` int(10) NOT NULL,
  `kategorijaIgrackeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igracka`
--

INSERT INTO `igracka` (`igrackaID`, `nazivIgracke`, `proizvodjac`, `cena`, `opis`, `slika`, `stanje`, `tipIgrackeID`, `kategorijaIgrackeID`) VALUES
(1, 'Kegle', 'Shimmer & Shine', '999.99 RSD', 'Kegle za devojčice. Uzrast 3+ godina.', 'slike/devojcice/kegle3.png', 10, 1, 4),
(2, 'Magična tabla', 'Shimmer & Shine', '999.99 RSD', 'Magična tabla za devojčice. Uzrast 3+ godine.', 'slike/devojcice/magicnaTabla5.png', 4, 1, 2),
(3, 'Drvena kuhinja', 'Nepoznat', '4500.00 RSD', 'San svake male devojčice jeste spremanje hrane svojoj porodici i prijateljima. Omogućite to svojoj maloj kuvarici.', 'slike/devojcice/drvenaKuhinja2.png', 6, 1, 5),
(4, 'Plišani medo', 'Toyzzz', '5000.00 RSD', 'Plišani drugar za decu uzrasta 3+ godine. Visina mede 75 cm.', 'slike/obaPola/medo75cm10.png', 5, 3, 1),
(5, 'Plišano magare', 'Toyzzz', '599.99 RSD', 'Plišani drugar za sve uzraste.', 'slike/obaPola/magare1.png', 13, 3, 1),
(6, 'Učimo azbuku', 'Toddly Fun', '4300.00 RS', 'Pomozite Vašim mališanima da uz igru savladaju azbuku. Za sve uzraste.', 'slike/obaPola/ucimoAzbuku6.png', 4, 3, 2),
(7, 'Tabla sa stalkom', 'Toddly Fun', '2300.00RSD', 'Probudite u Vašem mališanu umetnika uz pomoć table sa stalkom. U paketu dolazi i pakovanje flomaster', 'slike/obaPola/tablaSaStalkom14.png', 10, 3, 2),
(8, 'Koš sa tablom', 'Magic', '500.00 RSD', 'Ideee trojkaaa sa druge planete. Uzrast 3+ godine, namenjen dečacima.', 'slike/decaci/kosSaTablom4.png', 3, 2, 5),
(9, 'Vojna vozila  ', 'Porces', '1400.00 RSD', 'U jednom pakovanju se nalazi 4 kamiona i 1 helikopter. Za dečake svih uzrasta.', 'slike/decaci/vojnaVozila2.png', 12, 2, 4),
(10, 'Science and experiment', 'SCME', '2800.00 RSD', 'Neka Vaše dete razvija inteligenciju kroz ovu igricu.', 'slike/decaci/s&e3.png', 10, 2, 2),
(11, 'Solar energy concept house ', 'DIY', '1649.99 RSD', 'Učite decu kroz ovu igricu kako da štede resurse.', 'slike/decaci/kuca10.png', 7, 2, 2),
(13, 'Učimo azbuku 2', 'Toddy Fun', '1000 RSD', 'Pomozite vašem mališanu da nastavi učenje', 'slike/ucimoAzbuku6.png', 0, 3, 2),
(21, 'Doktorica', 'ok', '1000 RSD', 'knk', 'img/default.png', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorijaigracke`
--

CREATE TABLE `kategorijaigracke` (
  `kategorijaIgrackeID` int(10) NOT NULL,
  `nazivKategorije` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorijaigracke`
--

INSERT INTO `kategorijaigracke` (`kategorijaIgrackeID`, `nazivKategorije`) VALUES
(1, 'Plišane igračke'),
(2, 'Edukativni setovi'),
(3, 'Bicikle i trotineti'),
(4, 'Figure, roboti i životinje '),
(5, 'Ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(10) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `korisnickoIme` varchar(30) NOT NULL,
  `lozinka` varchar(52) NOT NULL,
  `adresa` varchar(60) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `adresa`, `telefon`, `email`, `status`) VALUES
(2, 'Valentina', 'Zivadinovic', 'vale', '01c7cb744adce4244f759abbf0f507be', 'Donji Milanovac', '254862', 'vale@gmail.com', 'korisnik'),
(3, 'Nikola', 'Nikolic', 'nikola', '01c7cb744adce4244f759abbf0f507be', 'Novi Sad', '7841548', 'nikola@gmail.com', 'korisnik'),
(4, 'Milica', 'Golubovic', 'milica', '01c7cb744adce4244f759abbf0f507be', 'Bajina Basta', '7894225', 'milicagolub98@gmail.com', 'admin'),
(7, 'Vanja', 'Vlahovic', 'vanja', 'a80a6b0eadf85afcde2f48cb12cb108e', 'Beograd', '1235468', 'vanja@gmail.com', 'admin'),
(9, 'errwerew', 'rwrewre', 'rwewer', 'ed5e479c8243dc7261c9b79382bcbe35', 'ewrer', 'wrewr', 'admin', 'admin'),
(10, 'Nikola', 'Markovic', 'nikola1', '38db4a76fa07cb45361b272f680242b5', 'Smederevo', '868264924', 'nikola1@gmail.com', 'korisnik'),
(11, 'Nikola', 'Markovic', 'nikola1', 'dd500b22870028a217d2f5c1e905ec4f', 'Smederevo', '868264924', 'nikola1@gmail.com', 'korisnik'),
(12, 'Predrag', 'Danilovic', 'pedja', 'f8ec72e020b0123d6f3bb032446ca7c8', 'Beograd', '27247924', 'pedja@gmail.com', 'korisnik'),
(13, 'Stefan', 'Stefanovic', 'stefan', 'eacb0e15ea42fd58df5bb5c02a10178b', 'Smederevo', '59385932', 'stefo@gmai.com', 'korisnik'),
(14, 'Dusica', 'Golubovic', 'dusica', '7c1bcb6b994fdffaab3f3ee8d0cfd960', 'Bajina Basta', '42048204', 'dusa@gmail.com', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE `kupovina` (
  `kupovinaID` int(10) NOT NULL,
  `korisnik` varchar(100) NOT NULL,
  `igrackaID` int(10) NOT NULL,
  `datumKupovine` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`kupovinaID`, `korisnik`, `igrackaID`, `datumKupovine`) VALUES
(1, 'milica', 1, '2020-02-02 20:20:00'),
(2, 'pedja', 8, '2020-01-31 08:10:10'),
(3, 'nikola', 5, '2020-01-22 09:00:00'),
(4, 'nikola1', 9, '2020-02-06 09:00:00'),
(10, 'pedja', 11, '2020-02-09 02:23:29'),
(11, 'stefan', 3, '2020-02-09 03:12:55');

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
(3, 'za oba pola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igracka`
--
ALTER TABLE `igracka`
  ADD PRIMARY KEY (`igrackaID`) USING BTREE,
  ADD KEY `tipIgrackeID` (`tipIgrackeID`),
  ADD KEY `kategorijaIgrackeID` (`kategorijaIgrackeID`);

--
-- Indexes for table `kategorijaigracke`
--
ALTER TABLE `kategorijaigracke`
  ADD PRIMARY KEY (`kategorijaIgrackeID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD PRIMARY KEY (`kupovinaID`);

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
  MODIFY `igrackaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategorijaigracke`
--
ALTER TABLE `kategorijaigracke`
  MODIFY `kategorijaIgrackeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kupovina`
--
ALTER TABLE `kupovina`
  MODIFY `kupovinaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipigracke`
--
ALTER TABLE `tipigracke`
  MODIFY `tipIgrackeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igracka`
--
ALTER TABLE `igracka`
  ADD CONSTRAINT `igracka_ibfk_1` FOREIGN KEY (`kategorijaIgrackeID`) REFERENCES `kategorijaigracke` (`kategorijaIgrackeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
