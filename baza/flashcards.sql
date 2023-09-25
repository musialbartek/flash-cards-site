-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Kwi 2020, 21:05
-- Wersja serwera: 10.1.39-MariaDB
-- Wersja PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `flashcards`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kits`
--

CREATE TABLE `kits` (
  `id_kit` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_subject` int(10) DEFAULT NULL,
  `created_by` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kits`
--

INSERT INTO `kits` (`id_kit`, `name`, `id_subject`, `created_by`) VALUES
(38, 'UTK - bartek', 4, 'bartek'),
(39, 'sieciaki - bartek', 2, 'bartek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statues`
--

CREATE TABLE `statues` (
  `id_status` int(1) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `statues`
--

INSERT INTO `statues` (`id_status`, `name`) VALUES
(1, 'aktywny'),
(2, 'nieaktywny'),
(3, 'zablokowany'),
(4, 'usunięty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name`) VALUES
(1, 'Systemy operacyjne'),
(2, 'Sieci komputerowe'),
(3, 'Witryny i aplikacje'),
(4, 'utk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `mail_code` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `mail`, `mail_code`, `password`, `created_at`, `last_activity`, `id_status`) VALUES
(13, 'Katekan', 'thestonegolem2024@gmail.com', '6548', '$2y$10$nMHPLNwPH9YfRrMV9tvTHuZtjbV5gafXUHRkuaAhXYwx.lL0mDoWC', '2020-03-30 21:17:05', '2020-03-31 17:45:42', 1),
(14, 'bartek', 'bartek.musial7@gmail.com', '7643', '$2y$10$vCLtsY13q2OvqaEzfR9r1uBYdq/RrNcmrelBuxU99x61koPtQo72e', '2020-03-31 13:11:47', '2020-04-01 18:46:35', 1),
(15, 'admin', 'bartek.musial@hotmail.com', '4658', '$2y$10$mza1wyuVrxWtHLKNRTCmKex2Y/1Xu4hHiYfs9RKITgau8/VndUEdW', '2020-04-01 21:01:38', '2020-04-01 19:02:29', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words`
--

CREATE TABLE `words` (
  `id_word` int(10) NOT NULL,
  `kit_name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `polish_word` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `english_word` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `words`
--

INSERT INTO `words` (`id_word`, `kit_name`, `polish_word`, `english_word`) VALUES
(57, 'UTK - bartek', 'obwód', 'circuit'),
(58, 'sieciaki - bartek', 'medium transmisyjne', 'transmission medium'),
(59, 'sieciaki - bartek', 'karta sieciowa', ' network card');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kits`
--
ALTER TABLE `kits`
  ADD PRIMARY KEY (`id_kit`),
  ADD UNIQUE KEY `kits_unique` (`name`),
  ADD KEY `id_subject` (`id_subject`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeksy dla tabeli `statues`
--
ALTER TABLE `statues`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeksy dla tabeli `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeksy dla tabeli `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id_word`),
  ADD KEY `kit_name` (`kit_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kits`
--
ALTER TABLE `kits`
  MODIFY `id_kit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `statues`
--
ALTER TABLE `statues`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `words`
--
ALTER TABLE `words`
  MODIFY `id_word` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kits`
--
ALTER TABLE `kits`
  ADD CONSTRAINT `kits_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `kits_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`login`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `statues` (`id_status`);

--
-- Ograniczenia dla tabeli `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`kit_name`) REFERENCES `kits` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
