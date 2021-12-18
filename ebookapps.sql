-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2021 pada 17.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookapps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` char(4) NOT NULL,
  `cover` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `author`, `category`, `price`, `cover`) VALUES
(1, 'C++ Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_4fe263c4f5e6de0c50a1613628ab3ff6.jpg'),
(2, 'Laravel Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_99be0b8f93fb080bee9fdd64c47f6317.jpg'),
(3, 'CSS Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_7af5bb267f368dda20be42ec73250ee5.jpg'),
(4, 'Learning Go Programming', 'Shubhangi Agarwal', 'Programming Languages', 'Paid', 'IMG_024c8602bb9d2799e256b1e672b198fd.jpg'),
(5, 'Object Oriented Programming with Angular', 'Balram Morsing Chavan', 'Programming Languages', 'Paid', 'IMG_fffdfb2c87576a0bdad00725ad8529c8.jpg'),
(6, 'JAVA8 Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_fd1477dff59ed4f8744928ae5ac71793.jpg'),
(7, 'Python Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_3b27e77f6875dd86bf72c5ca052a10cf.jpg'),
(8, 'Dart Programming Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'IMG_1b0f510928a162c83aa4f7f546cf6f26.jpg'),
(9, 'Kali Linux Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'IMG_4a0e4eb91f8f180be897ea535c12b820.jpg'),
(10, 'Fundamentals of Information Security', 'Sanil Nadkarni', 'IT &amp; Software', 'Paid', 'IMG_8237dc3b77c87165d721fe5195b766e8.jpg'),
(11, 'Arduino Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'IMG_6da2f64d88207836cec3a644d83d10ba.jpg'),
(12, 'Operating System Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'IMG_94be509757316ce59ccf6e207ae10bba.jpg'),
(13, 'Docker Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'IMG_61b64030d4d76e049acfb1520d7ed427.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$xTef0WFu1Z/SgWjzdwcwnu4J5xoBT3UAJSrPkZG06wO0WrOBYVlPy', 'admin'),
(2, 'member', '$2y$10$LkvpELIhyEPsvNbxrQ5OjOpLpUyPtcS89Hl99hbkVleP03saU9AEq', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
