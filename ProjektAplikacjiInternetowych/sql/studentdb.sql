-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2019, 22:06
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `studentdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `studenci`
--

CREATE TABLE `studenci` (
  `ID` int(11) NOT NULL,
  `Imie` varchar(30) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Wiek` int(5) NOT NULL,
  `Adres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `studenci`
--

INSERT INTO `studenci` (`ID`, `Imie`, `Nazwisko`, `Email`, `Wiek`, `Adres`) VALUES
(1, 'Janusz', 'Kowalski', 'janusz_kowalski@edu.uekat.pl', 42, 'Osiedle N, Tychy'),
(2, 'Marian', 'Nowak', 'marian_nowak', 18, 'Srodula, Sosnowiec'),
(4, 'Kinga', 'Wierna', 'kinga_wierna@edu.uekat.pl', 2, 'Korfantego, Katowice'),
(12, 'Franio', 'Walony', 'walonyfranio@wp.pl', 90, 'Ujejskiego 2/13 Sosnowiec');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `studenci`
--
ALTER TABLE `studenci`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `studenci`
--
ALTER TABLE `studenci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
