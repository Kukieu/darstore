-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lis 2017, 13:17
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ds_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `password` varchar(255) COLLATE cp1250_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'balu', 'admin1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) COLLATE cp1250_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Polecane'),
(7, 'Doczepiane włosy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `loginattempts`
--

INSERT INTO `loginattempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('::1', 2, '2017-09-18 16:26:57', 'blodak', 1),
('::1', 4, '2017-09-19 10:39:42', 'kukieu', 2),
('::1', 1, '2017-10-13 11:07:56', 'balu', 3),
('::1', 1, '2017-09-21 12:33:59', 'almark', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `verified`, `mod_timestamp`) VALUES
('1260859c0d7c2c8dd9', 'kukieu', '$2y$10$V2bTgxZfgdup/K36qTPCVOaVw.hG.YFwN4.8a3hLswXJe.KT3Bx02', 'email@gmail.com', 1, '2017-09-19 08:39:49'),
('1414459bfd7750bff3', 'Blodak', '$2y$10$pxuQHmSYN9.y33YqONzbDOC99atuHuwKXfQk34.GnriiiopGZHlWC', 'stiekerosiem@gmail.com', 1, '2017-09-18 14:29:18'),
('2099059c39572d3aa1', 'almark', '$2y$10$gnMu8Zhh0b9WXgyQ4e/s.eSO86KnQXIXgiOyYS6S6zdAbxRgOgibm', 'mail@gmail.com', 1, '2017-09-21 10:33:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `order_status` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `order_currency` varchar(255) COLLATE cp1250_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(1, 30, '46456', 'Completed', 'PLN'),
(2, 30, '46456', 'Completed', 'PLN'),
(3, 30, '46456', 'Completed', 'PLN');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(24) COLLATE cp1250_polish_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `short_desc` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_color` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_cap_type` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_tip` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_density` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_length` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_image` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `add_image_2` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `add_image_3` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `add_image_4` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `add_image_5` varchar(255) COLLATE cp1250_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_color`, `product_cap_type`, `product_tip`, `product_density`, `product_length`, `product_image`, `add_image_2`, `add_image_3`, `add_image_4`, `add_image_5`) VALUES
(1, 'Coś1', 1, 8, 2, 'OPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOPIIIIIIISSOP', 'OPIIIIIIISSOPIIIIIIISSOP', '', '', '', '', '', 'apple_ex.png', 'banana_PNG842.png', 'Conan.jpg', 'Mario-Transparent-Background.png', '1817.jpg'),
(2, 'Popcorn', 1, 3.39, 3, 'Fajny popcorn', 'MEGA popcorn', '', '', '', '', '', 'Popcorn.jpg', '1204.jpg', '1817.jpg', '21534286_1947291025528526_697734247_o.png', 'e6y1hja8xzhz.jpg'),
(7, 'Kupa', 1, 0, 0, 'ALEJANDRO\\r\\n\\r\\n\\r\\n\\r\\nALEJANDRO\\r\\n\\r\\nALEJANDRO', '', '', '', '', '', '', 'photo.jpg', '', '', '', ''),
(8, 'hh', 1, 2, 2, 'hh', 'hh', '', '', '', '', '', '21533605_1947290832195212_107260882_o.png', 'Conan.jpg', '', '', ''),
(9, 'Test', 1, 2, 2, 'gg', 'ggg', 'ff', 'gg', 'hh', 'jj', '', '4948c8ee46ccad25cc63c749997a.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(13, 1, 27, 30, 'OPM manga 10 ą', 1),
(14, 2, 27, 500, 'jakiś produkt kurdebele', 2),
(15, 3, 27, 40, 'Conan', 3),
(16, 1, 28, 30, 'OPM manga 10 ą', 1),
(17, 2, 29, 500, 'jakiś produkt kurdebele', 2),
(18, 3, 30, 40, 'Conan', 3),
(19, 2, 31, 500, 'jakiś produkt kurdebele', 1),
(21, 17, 1, 19.99, 'Klatka', 1),
(22, 19, 2, 99.99, 'Kurs web-dev', 2),
(23, 17, 3, 19.99, 'Klatka', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) COLLATE cp1250_polish_ci NOT NULL,
  `slide_image` text COLLATE cp1250_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(1, 'Tesssssst', 'Frizzies.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `reg_time`) VALUES
(2, 'balu', 'admin1', 'stiekerosiem@gmail.com', '2017-09-15 18:34:57');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT dla tabeli `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
