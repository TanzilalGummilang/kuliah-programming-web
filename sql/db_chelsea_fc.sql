-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 01:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chelsea_fc`
--

-- --------------------------------------------------------

--
-- Table structure for table `players_table`
--

CREATE TABLE `players_table` (
  `player_code` char(6) NOT NULL,
  `player_name` varchar(100) DEFAULT NULL,
  `player_image` varchar(100) DEFAULT NULL,
  `player_number` char(2) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `position_detail` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `height` char(3) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `contract_expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players_table`
--

INSERT INTO `players_table` (`player_code`, `player_name`, `player_image`, `player_number`, `position`, `position_detail`, `nationality`, `birth_place`, `birth_date`, `height`, `salary`, `contract_expire`) VALUES
('ply001', 'Kepa Arrizabalaga', 'kepa.jpeg', '1', 'Goalkeeper', 'GK', 'Spain', 'Ondarroa, Spain', '1994-10-03', '186', 155000, '2025-06-30'),
('ply002', 'Antonio Rudiger', '61ab004d052cc.jpg', '2', 'Defender', 'CB', 'Germany', 'Berlin, Germany', '1993-03-03', '190', 100000, '2022-06-30'),
('ply003', 'Marcos Alonso', 'alonso.jpg', '3', 'Defender', 'LB, LWB, LM', 'Spain', 'Madrid, Spain', '1990-12-28', '189', 100000, '2023-06-30'),
('ply004', 'Andreas Christensen', '61ab90f2224fa.jpg', '4', 'Defender', 'CB', 'Denmark', 'Allerod, Denmark', '1996-04-10', '188', 80000, '2022-06-30'),
('ply005', 'Jorge Luiz Frello Filho (Jorginho)', '61ab910b617c1.jpg', '5', 'Midfielder', 'CDM, CM', 'Italy', 'Imbituba, Brazil', '1991-12-20', '180', 110000, '2023-06-30'),
('ply006', 'Thiago Silva', '61ab91247e807.jpg', '6', 'Defender', 'CB, CDM', 'Brazil', 'Rio de Janeiro, Brazil', '1984-09-22', '181', 105000, '2022-06-30'),
('ply007', 'N\'Golo Kante', '61ab938498404.jpg', '7', 'Midfielder', 'CDM, CM', 'France', 'Paris, France', '1991-03-29', '168', 290000, '2023-06-30'),
('ply008', 'Mateo Kovacic', '61ab924d5a37a.jpg', '8', 'Midfielder', 'CM, CDM', 'Croatia', 'Linz, Austria', '1994-05-06', '176', 150000, '2024-06-30'),
('ply009', 'Romelu Lukaku', '61aba3cdaa51f.jpeg', '9', 'Forward', 'ST', 'Belgium', 'Antwerp, Belgium', '1993-05-13', '191', 325000, '2026-06-30'),
('ply010', 'Christian Pulisic', 'pulisic.jpg', '10', 'Forward', 'LW, CF, LF, RW', 'United States', 'Hershey, Pennsylvania, United States', '1998-09-18', '177', 150000, '2024-06-30'),
('ply011', 'Timo Werner', '61aba3f65b5f5.jpg', '11', 'Forward', 'CF, LW, LF, RW', 'Germany', 'Stuttgart, Germany', '1996-03-06', '180', 272000, '2025-06-30'),
('ply012', 'Ruben Loftus-Cheek', 'rlc.jpg', '12', 'Midfielder', 'CM, CDM, CAM', 'England', 'London, England', '1996-01-23', '191', 60000, '2024-06-30'),
('ply013', 'Marcus Bettinelli', '61ab8529c6434.png', '13', 'Goalkeeper', 'GK', 'England', 'London, England', '1992-05-24', '193', 0, '0000-00-00'),
('ply014', 'Trevoh Chalobah', '61aba4163e971.jpeg', '14', 'Defender', 'CB, CM, CDM', 'England', 'Sierra Leone, Freetown, 5 July 1999', '1999-07-05', '190', 0, '0000-00-00'),
('ply016', 'Edouard Mendy', '61aba42fd41e8.jpg', '16', 'Goalkeeper', 'GK', 'Senegal', 'Montivilliers, France', '1992-03-01', '194', 52000, '2025-06-30'),
('ply017', 'Saul Niguez', '61aba46705649.jpg', '17', 'Midfielder', 'CM', 'Spain', 'Elche, Spain', '1994-11-21', '183', 198169, '2022-06-30'),
('ply018', 'Ross Barkley', '61aba48ed3e57.jpg', '18', 'Midfielder', 'CAM, CM', 'England', 'Liverpool, England', '1993-12-05', '185', 105000, '2023-06-30'),
('ply019', 'Mason Mount', '61aba4a1c5e78.jpeg', '19', 'Midfielder', 'CAM, LW, RW, CM', 'England', 'Portsmouth, England', '1999-01-10', '180', 88462, '2024-06-30'),
('ply020', 'Callum Hudson-Odoi', 'odoi.jpg', '20', 'Forward', 'RW, RM, LW, LM', 'England', 'London, England', '2000-11-07', '178', 120000, '2024-06-30'),
('ply021', 'Ben Chilwell', '61aba4cd5ff74.jpg', '21', 'Defender', 'LB, LWB, LM', 'England', 'Milton Keynes, England', '1999-12-21', '180', 190000, '2025-06-30'),
('ply022', 'Hakim Ziyech', '61aba4fe423fb.jpg', '22', 'Forward', 'RW, RF, CF, AMF', 'Maroco', 'Dronten, Netherland', '1993-03-19', '180', 100000, '2025-06-30'),
('ply024', 'Reece James', 'reecejames.jpg', '24', 'Defender', 'RWB, RB, CB, RM', 'England', 'London, England', '1999-12-08', '170', 58000, '2025-06-30'),
('ply028', 'Cesar Azpilicueta', '61aba51b6da19.jpg', '28', 'Defender', 'RB, CB, RWB, RM', 'Spain', 'Pamplona, Spain', '1989-08-28', '178', 155000, '2022-06-30'),
('ply029', 'Kai Havertz', '61aba55093938.jpg', '29', 'Forward', 'CF, CAM, RF, RW', 'Germany', 'Aachen, Germany', '1999-06-11', '190', 150000, '2025-06-30'),
('ply031', 'Malang Sarr', 'malangsarr.jpg', '31', 'Defender', 'CB', 'France', 'Nice, France', '1999-01-23', '182', 130000, '2025-06-30'),
('ply032', 'Lewis Baker', '61aba57523b7d.jpg', '32', 'Midfielder', 'CM, CAM', 'England', 'Luton, England', '1995-04-25', '182', 48000, '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_name`, `user_password`) VALUES
('admin01', 'admin01'),
('admin02', 'admin02'),
('admin03', '$2y$10$ON/AMdKIc/Pe.9AFT5xPxePTkkPdcFQVtGTeFuFm5jsVk1Mo..0r2'),
('admin04', '$2y$10$S7r2PomOsGhMio85zf9gNeiCAL6qlqnZBpuDt9a1sgpxRwtK1brmW'),
('admin05', '$2y$10$1/JZUDDjeVjQk7oFS/0RO.vY3uZvBSKUJwQYx8OwUMFye0W8R75iu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players_table`
--
ALTER TABLE `players_table`
  ADD PRIMARY KEY (`player_code`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
