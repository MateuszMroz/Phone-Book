-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lip 2017, 12:40
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiazka_telefoniczna`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `id` int(15) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `numer_telefonu` int(15) NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  `notatka` text COLLATE utf8_polish_ci NOT NULL,
  `uzytkownikID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kontakty`
--

INSERT INTO `kontakty` (`id`, `imie`, `nazwisko`, `numer_telefonu`, `mail`, `notatka`, `uzytkownikID`) VALUES
(1, 'Agnieszka', 'Wojciechowska', 662456905, 'agnieszka.w.w.7@gmail.com', 'girfriend', 29),
(2, 'Mateusz', 'MrÃ³z', 519412272, 'mateusz.mroz10@gmail.com', 'my number', 29),
(4, 'Mateusz', 'MrÃ³z', 530126743, 'mateusz_mroz10@gmail.com', 'ktoÅ› inny ', 29),
(5, 'Jan', 'Kowalski', 123456789, 'janKowalski@gmail.com', 'janek', 6),
(6, 'Agnieszka', 'Wojciechowska', 664906457, 'agnieszka.w.w.7@gmail.com', 'drugi numer', 29),
(7, 'Jan', 'Kowalski', 123456789, 'jan.kowalski@gmail.com', 'mate', 29),
(8, 'Piotr', 'Nowak', 789456345, 'piotr_nowak@gmail.com', 'ktoÅ› tam ', 29),
(9, 'Agnieszka', 'Wojciechowska', 660345290, 'agnieszka.w.7.7@gmail.com', 'girlfriend', 33);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nick` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nick`, `haslo`, `imie`, `nazwisko`, `email`) VALUES
(1, 'mateusz_mroz', '$2y$10$5hAUEw9M.lHHivXSPuDMhu2Qb3IyBv5LAR6BNW4.lgJPMaFuA4rA6', 'Mateusz', 'Mroz', 'mateusz.mroz10@gmail.com'),
(6, 'mateusz123', '$2y$10$VA/5uQ/HUEl3ftU7IbhZ0OvjNn3v/UW0VpnyywzL.7/Nj/tLeU012', 'Mat', 'Mroz', 'mat.mroz@gmail.com'),
(7, 'aadam', '$2y$10$5QcojWQ5qUBweeu3gFa97OLCdar4RzjR/Ytm8dlJ3if0ClkDEskcS', 'Adam', 'Kowalski', 'adam.kowalski@gmail.com'),
(13, 'mat', '$2y$10$5LbYaStd49KZl8DnTmwCU.9Q7kNvN1InjRyJyWRhVMcZdfGi1wW7K', 'Mat', 'Mroz', 'mat.mrooz@gmail.com'),
(29, 'qwerty', '$2y$10$5NP7gwrHDRfnEukpDxgqROTqj5n2sDM.ZeJ.Pk65YYReYURpC/lY.', 'qwe', 'rty', 'qwerty@gmail.com'),
(30, 'Agulca', '$2y$10$LvROjoXZZV5bQr9vFYUp3.dzwcsCdzd100h23mVmsiK8fHrTp2rzi', 'Agnieszka', 'Wojciechowska', 'agn.woj@gm.pl'),
(32, 'mateusz12', '$2y$10$gRWQkpsgE.pHcoGzF5Csze6iTXBdD4V7yQ.IH7AwjDNq4o16WE5ke', 'Mateusz', 'Mroz', 'mateusz_mroz123@gmail.com'),
(33, 'mMroz', '$2y$10$GYg.8GBZGNMz95yCmOyZPu2l7j1E2ms7eFJKWMsGw5ywHyrbT5QF2', 'Mateusz', 'MrÃ³z', 'mateusz.mroz@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownikID` (`uzytkownikID`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  ADD CONSTRAINT `kontakty_ibfk_1` FOREIGN KEY (`uzytkownikID`) REFERENCES `uzytkownicy` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
