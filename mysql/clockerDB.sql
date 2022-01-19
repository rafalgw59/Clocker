-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 19 Sty 2022, 18:49
-- Wersja serwera: 5.7.34
-- Wersja PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `clockerDB`
--
CREATE DATABASE IF NOT EXISTS `clockerDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `clockerDB`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` text COLLATE utf8_polish_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `usersId` text COLLATE utf8_polish_ci NOT NULL,
  `project_name` text COLLATE utf8_polish_ci,
  `duration` time NOT NULL,
  `client_name` text COLLATE utf8_polish_ci,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersFirstName` varchar(50) NOT NULL,
  `usersLastName` varchar(50) NOT NULL,
  `usersLogin` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`usersId`, `usersFirstName`, `usersLastName`, `usersLogin`, `usersEmail`, `usersPassword`) VALUES
(46, 'Adam', 'Adamowicz', 'adama123', 'adama123@o2.pl', '$2y$10$2I.P5XyxaHD4e6elx/PeiOI5.HV4SmltmvKtFSd6PfBl1rX4lMXVi'),
(47, 'Admin', 'Adminowski', 'admin', 'admin@clocker.pl', '$2y$10$JGhpdLoeBdo2YgZ78Yp0nemxNdWzNHVZFPbmL/gSGc4G5dr4SzlMG'),
(48, 'Hfgwefw', 'fwefwefwe', 'fwefwf', 'heee@o2.pl', '$2y$10$EdQ5yGLVH2e6t9mBBUArme.loEJhFcu2crYOh0flA.TwEKkSdth52'),
(49, 'Matt', 'ZmienioneDwa', 'Matt', 'matt@matttt.pl', '$2y$10$hZ9WKUIgQI4MRmwhQCN.X..5jdfWLF0w8Gg3keMOJm7sY75tOZBou');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
