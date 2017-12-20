-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 05:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlyginimai`
--

CREATE TABLE `atlyginimai` (
  `data` date NOT NULL,
  `suma` double NOT NULL,
  `id_Atlyginimas` int(11) NOT NULL,
  `fk_Darbuotojasdarbuotoju_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojai`
--

CREATE TABLE `darbuotojai` (
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `telefonas` varchar(255) DEFAULT NULL,
  `el_pastas` varchar(255) DEFAULT NULL,
  `darbuotoju_nr` int(11) NOT NULL,
  `pareigu_tipas` int(11) NOT NULL,
  `slaptazodis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `darbuotojai`
--

INSERT INTO `darbuotojai` (`vardas`, `pavarde`, `telefonas`, `el_pastas`, `darbuotoju_nr`, `pareigu_tipas`, `slaptazodis`) VALUES
('Domas1', 'Kirdeikis2', '123', 'domas@test.lt', 1111, 2, '123');

-- --------------------------------------------------------

--
-- Table structure for table `islaidos`
--

CREATE TABLE `islaidos` (
  `pavadinimas` varchar(255) NOT NULL,
  `kaina` double NOT NULL,
  `id_islaidos` int(11) NOT NULL,
  `fk_Kelioneid_Kelione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keliones`
--

CREATE TABLE `keliones` (
  `pavadinimas` varchar(255) NOT NULL,
  `aprasymas` varchar(255) NOT NULL,
  `marsutas` varchar(255) NOT NULL,
  `tipas` varchar(255) NOT NULL,
  `kaina_asmeniui` double NOT NULL,
  `vietu_sk` int(11) NOT NULL,
  `trukme` int(11) NOT NULL,
  `isvykimo_data` date NOT NULL,
  `isvykimo_vieta` date NOT NULL,
  `transporto_tipas` int(11) NOT NULL,
  `nakvynes_tipas` int(11) NOT NULL,
  `maitinimo_tipas` int(11) NOT NULL,
  `id_Kelione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keliones`
--

INSERT INTO `keliones` (`pavadinimas`, `aprasymas`, `marsutas`, `tipas`, `kaina_asmeniui`, `vietu_sk`, `trukme`, `isvykimo_data`, `isvykimo_vieta`, `transporto_tipas`, `nakvynes_tipas`, `maitinimo_tipas`, `id_Kelione`) VALUES
('test1', 't', 'asd', 'tipas1', 12, 3, 15, '2017-12-02', '2017-12-07', 2, 2, 2, 1),
('test1', 't', 'asd', 'tipas1', 12, 3, 15, '2017-12-01', '2017-12-07', 2, 2, 2, 2),
('test1', 't', 'asd', 'tipas1', 12, 3, 15, '2017-12-01', '2017-12-07', 2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `keliones_darbuotojai`
--

CREATE TABLE `keliones_darbuotojai` (
  `id_keliones_darbuotojai` int(11) NOT NULL,
  `fk_Kelioneid_Kelione` int(11) NOT NULL,
  `fk_Darbuotojasdarbuotoju_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keliones_kategorijo`
--

CREATE TABLE `keliones_kategorijo` (
  `fk_Keliones_kategorijaid_Keliones_kategorija` int(11) NOT NULL,
  `fk_Kelioneid_Kelione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keliones_kategorijos`
--

CREATE TABLE `keliones_kategorijos` (
  `pavadinimas` varchar(255) NOT NULL,
  `id_Keliones_kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keliones_uzsakymai`
--

CREATE TABLE `keliones_uzsakymai` (
  `uzsakymo_nr` int(11) NOT NULL,
  `sukurimo_data` date NOT NULL,
  `uzsakymo_busena` int(11) NOT NULL,
  `fk_Kelioneid_Kelione` int(11) NOT NULL,
  `fk_Klientaskliento_kodas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kel_pap_pas`
--

CREATE TABLE `kel_pap_pas` (
  `fk_papildomos_paslaugosid_papildomos_paslaugos` int(11) NOT NULL,
  `fk_Keliones_uzsakymasuzsakymo_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klientai`
--

CREATE TABLE `klientai` (
  `kliento_kodas` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `lytis` varchar(255) DEFAULT NULL,
  `telefonas` varchar(255) DEFAULT NULL,
  `adresas` varchar(255) DEFAULT NULL,
  `el_pastas` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) NOT NULL,
  `kliento_tipas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klientai`
--

INSERT INTO `klientai` (`kliento_kodas`, `vardas`, `pavarde`, `lytis`, `telefonas`, `adresas`, `el_pastas`, `slaptazodis`, `kliento_tipas`) VALUES
(2, 'klientas', 'klientas', 'vyr.', '866623333', 'Kaunas 35', 'klientas@mail.com', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kliento_tipai`
--

CREATE TABLE `kliento_tipai` (
  `id_kliento_tipas` int(11) NOT NULL,
  `name` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kliento_tipai`
--

INSERT INTO `kliento_tipai` (`id_kliento_tipas`, `name`) VALUES
(1, 'Lojalus'),
(2, 'Naujas');

-- --------------------------------------------------------

--
-- Table structure for table `maitinimo_tipai`
--

CREATE TABLE `maitinimo_tipai` (
  `id_maitinimo_tipas` int(11) NOT NULL,
  `name` char(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maitinimo_tipai`
--

INSERT INTO `maitinimo_tipai` (`id_maitinimo_tipas`, `name`) VALUES
(1, 'be_maitinimo'),
(2, 'pusryciai'),
(3, 'viskas_iskaiciuota'),
(4, 'pusryciai_vakariene');

-- --------------------------------------------------------

--
-- Table structure for table `mokejimai`
--

CREATE TABLE `mokejimai` (
  `mokejimo_nr` int(11) NOT NULL,
  `data` date NOT NULL,
  `sumoketa_suma` double NOT NULL,
  `mokejimo_busena` int(11) NOT NULL,
  `mokejimo_tipas` int(11) NOT NULL,
  `fk_Keliones_uzsakymasuzsakymo_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mokejimo_busenos`
--

CREATE TABLE `mokejimo_busenos` (
  `id_mokejimo_busena` int(11) NOT NULL,
  `name` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mokejimo_busenos`
--

INSERT INTO `mokejimo_busenos` (`id_mokejimo_busena`, `name`) VALUES
(1, 'negautas'),
(2, 'apdorojamas'),
(3, 'gautas');

-- --------------------------------------------------------

--
-- Table structure for table `mokejimo_tipai`
--

CREATE TABLE `mokejimo_tipai` (
  `id_mokejimo_tipas` int(11) NOT NULL,
  `name` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mokejimo_tipai`
--

INSERT INTO `mokejimo_tipai` (`id_mokejimo_tipas`, `name`) VALUES
(1, 'grynais'),
(2, 'banko_pavedinmu');

-- --------------------------------------------------------

--
-- Table structure for table `nakvynes_tipai`
--

CREATE TABLE `nakvynes_tipai` (
  `id_nakvynes_tipas` int(11) NOT NULL,
  `name` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nakvynes_tipai`
--

INSERT INTO `nakvynes_tipai` (`id_nakvynes_tipas`, `name`) VALUES
(1, 'autobuse'),
(2, 'viezbutyje'),
(3, 'laive'),
(4, 'nenustatyta');

-- --------------------------------------------------------

--
-- Table structure for table `papildomos_paslaugos`
--

CREATE TABLE `papildomos_paslaugos` (
  `pavadinimas` varchar(255) NOT NULL,
  `suma` double NOT NULL,
  `id_papildomos_paslaugos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pareigu_tipai`
--

CREATE TABLE `pareigu_tipai` (
  `id_pareigu_tipas` int(11) NOT NULL,
  `name` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pareigu_tipai`
--

INSERT INTO `pareigu_tipai` (`id_pareigu_tipas`, `name`) VALUES
(1, 'administratorius'),
(2, 'gidas'),
(3, 'vairuotojas');

-- --------------------------------------------------------

--
-- Table structure for table `sekamos_keliones`
--

CREATE TABLE `sekamos_keliones` (
  `id_Sekama_kelione` int(11) NOT NULL,
  `fk_Klientaskliento_kodas` int(11) NOT NULL,
  `fk_Kelioneid_Kelione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transporto_tipai`
--

CREATE TABLE `transporto_tipai` (
  `id_transporto_tipas` int(11) NOT NULL,
  `name` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporto_tipai`
--

INSERT INTO `transporto_tipai` (`id_transporto_tipas`, `name`) VALUES
(1, 'autobusas'),
(2, 'laivas'),
(3, 'lektuvas'),
(4, 'misrus');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_busenos`
--

CREATE TABLE `uzsakymo_busenos` (
  `id_Uzsakymo_busena` int(11) NOT NULL,
  `name` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uzsakymo_busenos`
--

INSERT INTO `uzsakymo_busenos` (`id_Uzsakymo_busena`, `name`) VALUES
(1, 'atsauktas'),
(2, 'neapmoketas'),
(3, 'apmoketa_imoka'),
(4, 'apmoketa'),
(5, 'pabaigta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atlyginimai`
--
ALTER TABLE `atlyginimai`
  ADD PRIMARY KEY (`id_Atlyginimas`),
  ADD KEY `gauna` (`fk_Darbuotojasdarbuotoju_nr`);

--
-- Indexes for table `darbuotojai`
--
ALTER TABLE `darbuotojai`
  ADD PRIMARY KEY (`darbuotoju_nr`),
  ADD KEY `pareigu_tipas` (`pareigu_tipas`);

--
-- Indexes for table `islaidos`
--
ALTER TABLE `islaidos`
  ADD PRIMARY KEY (`id_islaidos`),
  ADD KEY `turi` (`fk_Kelioneid_Kelione`);

--
-- Indexes for table `keliones`
--
ALTER TABLE `keliones`
  ADD PRIMARY KEY (`id_Kelione`),
  ADD KEY `transporto_tipas` (`transporto_tipas`),
  ADD KEY `nakvynes_tipas` (`nakvynes_tipas`),
  ADD KEY `maitinimo_tipas` (`maitinimo_tipas`);

--
-- Indexes for table `keliones_darbuotojai`
--
ALTER TABLE `keliones_darbuotojai`
  ADD PRIMARY KEY (`id_keliones_darbuotojai`),
  ADD KEY `turi2` (`fk_Kelioneid_Kelione`),
  ADD KEY `yra` (`fk_Darbuotojasdarbuotoju_nr`);

--
-- Indexes for table `keliones_kategorijo`
--
ALTER TABLE `keliones_kategorijo`
  ADD PRIMARY KEY (`fk_Keliones_kategorijaid_Keliones_kategorija`,`fk_Kelioneid_Kelione`);

--
-- Indexes for table `keliones_kategorijos`
--
ALTER TABLE `keliones_kategorijos`
  ADD PRIMARY KEY (`id_Keliones_kategorija`);

--
-- Indexes for table `keliones_uzsakymai`
--
ALTER TABLE `keliones_uzsakymai`
  ADD PRIMARY KEY (`uzsakymo_nr`),
  ADD KEY `uzsakymo_busena` (`uzsakymo_busena`),
  ADD KEY `priklauso` (`fk_Kelioneid_Kelione`),
  ADD KEY `sukuria` (`fk_Klientaskliento_kodas`);

--
-- Indexes for table `kel_pap_pas`
--
ALTER TABLE `kel_pap_pas`
  ADD PRIMARY KEY (`fk_papildomos_paslaugosid_papildomos_paslaugos`,`fk_Keliones_uzsakymasuzsakymo_nr`);

--
-- Indexes for table `klientai`
--
ALTER TABLE `klientai`
  ADD PRIMARY KEY (`kliento_kodas`),
  ADD KEY `kliento_tipas` (`kliento_tipas`);

--
-- Indexes for table `kliento_tipai`
--
ALTER TABLE `kliento_tipai`
  ADD PRIMARY KEY (`id_kliento_tipas`);

--
-- Indexes for table `maitinimo_tipai`
--
ALTER TABLE `maitinimo_tipai`
  ADD PRIMARY KEY (`id_maitinimo_tipas`);

--
-- Indexes for table `mokejimai`
--
ALTER TABLE `mokejimai`
  ADD PRIMARY KEY (`mokejimo_nr`),
  ADD KEY `mokejimo_busena` (`mokejimo_busena`),
  ADD KEY `mokejimo_tipas` (`mokejimo_tipas`),
  ADD KEY `priskirtas` (`fk_Keliones_uzsakymasuzsakymo_nr`);

--
-- Indexes for table `mokejimo_busenos`
--
ALTER TABLE `mokejimo_busenos`
  ADD PRIMARY KEY (`id_mokejimo_busena`);

--
-- Indexes for table `mokejimo_tipai`
--
ALTER TABLE `mokejimo_tipai`
  ADD PRIMARY KEY (`id_mokejimo_tipas`);

--
-- Indexes for table `nakvynes_tipai`
--
ALTER TABLE `nakvynes_tipai`
  ADD PRIMARY KEY (`id_nakvynes_tipas`);

--
-- Indexes for table `papildomos_paslaugos`
--
ALTER TABLE `papildomos_paslaugos`
  ADD PRIMARY KEY (`id_papildomos_paslaugos`);

--
-- Indexes for table `pareigu_tipai`
--
ALTER TABLE `pareigu_tipai`
  ADD PRIMARY KEY (`id_pareigu_tipas`);

--
-- Indexes for table `sekamos_keliones`
--
ALTER TABLE `sekamos_keliones`
  ADD PRIMARY KEY (`id_Sekama_kelione`),
  ADD KEY `turi4` (`fk_Klientaskliento_kodas`),
  ADD KEY `yra2` (`fk_Kelioneid_Kelione`);

--
-- Indexes for table `transporto_tipai`
--
ALTER TABLE `transporto_tipai`
  ADD PRIMARY KEY (`id_transporto_tipas`);

--
-- Indexes for table `uzsakymo_busenos`
--
ALTER TABLE `uzsakymo_busenos`
  ADD PRIMARY KEY (`id_Uzsakymo_busena`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keliones_uzsakymai`
--
ALTER TABLE `keliones_uzsakymai`
  MODIFY `uzsakymo_nr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `klientai`
--
ALTER TABLE `klientai`
  MODIFY `kliento_kodas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atlyginimai`
--
ALTER TABLE `atlyginimai`
  ADD CONSTRAINT `gauna` FOREIGN KEY (`fk_Darbuotojasdarbuotoju_nr`) REFERENCES `darbuotojai` (`darbuotoju_nr`);

--
-- Constraints for table `darbuotojai`
--
ALTER TABLE `darbuotojai`
  ADD CONSTRAINT `darbuotojai_ibfk_1` FOREIGN KEY (`pareigu_tipas`) REFERENCES `pareigu_tipai` (`id_pareigu_tipas`);

--
-- Constraints for table `islaidos`
--
ALTER TABLE `islaidos`
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_Kelioneid_Kelione`) REFERENCES `keliones` (`id_Kelione`);

--
-- Constraints for table `keliones`
--
ALTER TABLE `keliones`
  ADD CONSTRAINT `keliones_ibfk_1` FOREIGN KEY (`transporto_tipas`) REFERENCES `transporto_tipai` (`id_transporto_tipas`),
  ADD CONSTRAINT `keliones_ibfk_2` FOREIGN KEY (`nakvynes_tipas`) REFERENCES `nakvynes_tipai` (`id_nakvynes_tipas`),
  ADD CONSTRAINT `keliones_ibfk_3` FOREIGN KEY (`maitinimo_tipas`) REFERENCES `maitinimo_tipai` (`id_maitinimo_tipas`);

--
-- Constraints for table `keliones_darbuotojai`
--
ALTER TABLE `keliones_darbuotojai`
  ADD CONSTRAINT `turi2` FOREIGN KEY (`fk_Kelioneid_Kelione`) REFERENCES `keliones` (`id_Kelione`),
  ADD CONSTRAINT `yra` FOREIGN KEY (`fk_Darbuotojasdarbuotoju_nr`) REFERENCES `darbuotojai` (`darbuotoju_nr`);

--
-- Constraints for table `keliones_kategorijo`
--
ALTER TABLE `keliones_kategorijo`
  ADD CONSTRAINT `turi3` FOREIGN KEY (`fk_Keliones_kategorijaid_Keliones_kategorija`) REFERENCES `keliones_kategorijos` (`id_Keliones_kategorija`);

--
-- Constraints for table `keliones_uzsakymai`
--
ALTER TABLE `keliones_uzsakymai`
  ADD CONSTRAINT `keliones_uzsakymai_ibfk_1` FOREIGN KEY (`uzsakymo_busena`) REFERENCES `uzsakymo_busenos` (`id_Uzsakymo_busena`),
  ADD CONSTRAINT `priklauso` FOREIGN KEY (`fk_Kelioneid_Kelione`) REFERENCES `keliones` (`id_Kelione`),
  ADD CONSTRAINT `sukuria` FOREIGN KEY (`fk_Klientaskliento_kodas`) REFERENCES `klientai` (`kliento_kodas`);

--
-- Constraints for table `kel_pap_pas`
--
ALTER TABLE `kel_pap_pas`
  ADD CONSTRAINT `turi5` FOREIGN KEY (`fk_papildomos_paslaugosid_papildomos_paslaugos`) REFERENCES `papildomos_paslaugos` (`id_papildomos_paslaugos`);

--
-- Constraints for table `klientai`
--
ALTER TABLE `klientai`
  ADD CONSTRAINT `klientai_ibfk_1` FOREIGN KEY (`kliento_tipas`) REFERENCES `kliento_tipai` (`id_kliento_tipas`);

--
-- Constraints for table `mokejimai`
--
ALTER TABLE `mokejimai`
  ADD CONSTRAINT `mokejimai_ibfk_1` FOREIGN KEY (`mokejimo_busena`) REFERENCES `mokejimo_busenos` (`id_mokejimo_busena`),
  ADD CONSTRAINT `mokejimai_ibfk_2` FOREIGN KEY (`mokejimo_tipas`) REFERENCES `mokejimo_tipai` (`id_mokejimo_tipas`),
  ADD CONSTRAINT `priskirtas` FOREIGN KEY (`fk_Keliones_uzsakymasuzsakymo_nr`) REFERENCES `keliones_uzsakymai` (`uzsakymo_nr`);

--
-- Constraints for table `sekamos_keliones`
--
ALTER TABLE `sekamos_keliones`
  ADD CONSTRAINT `turi4` FOREIGN KEY (`fk_Klientaskliento_kodas`) REFERENCES `klientai` (`kliento_kodas`),
  ADD CONSTRAINT `yra2` FOREIGN KEY (`fk_Kelioneid_Kelione`) REFERENCES `keliones` (`id_Kelione`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
