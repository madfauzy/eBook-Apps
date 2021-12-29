-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2021 pada 13.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

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
  `link` varchar(255) NOT NULL,
  `verified` char(3) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `author`, `category`, `price`, `link`, `verified`, `cover`) VALUES
(1, 'C++ Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/cplusplus-tutorial/index.asp', 'Yes', 'IMG_4fe263c4f5e6de0c50a1613628ab3ff6.jpg'),
(2, 'Laravel Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/laravel_tutorial/index.asp', 'Yes', 'IMG_99be0b8f93fb080bee9fdd64c47f6317.jpg'),
(3, 'CSS Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/css_tutorial/index.asp', 'Yes', 'IMG_7af5bb267f368dda20be42ec73250ee5.jpg'),
(4, 'Learning Go Programming', 'Shubhangi Agarwal', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/learning_go_programming/index.asp', 'Yes', 'IMG_024c8602bb9d2799e256b1e672b198fd.jpg'),
(5, 'Object Oriented Programming with Angular', 'Balram Morsing Chavan', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/object_oriented_programming_with_angular/index.asp', 'Yes', 'IMG_fffdfb2c87576a0bdad00725ad8529c8.jpg'),
(6, 'JAVA8 Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/java8_tutorial/index.asp', 'Yes', 'IMG_fd1477dff59ed4f8744928ae5ac71793.jpg'),
(7, 'Python Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/python_tutorial/index.asp', 'Yes', 'IMG_3b27e77f6875dd86bf72c5ca052a10cf.jpg'),
(8, 'Dart Programming Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/dart_programming_tutorial/index.asp', 'Yes', 'IMG_1b0f510928a162c83aa4f7f546cf6f26.jpg'),
(9, 'Kali Linux Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'https://www.tutorialspoint.com/ebook/kali_linux_tutorial/index.asp', 'Yes', 'IMG_4a0e4eb91f8f180be897ea535c12b820.jpg'),
(10, 'Fundamentals of Information Security', 'Sanil Nadkarni', 'IT &amp; Software', 'Paid', 'https://www.tutorialspoint.com/ebook/fundamentals_of_information_security/index.asp', 'Yes', 'IMG_8237dc3b77c87165d721fe5195b766e8.jpg'),
(11, 'Arduino Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'https://www.tutorialspoint.com/ebook/arduino_tutorial/index.asp', 'Yes', 'IMG_6da2f64d88207836cec3a644d83d10ba.jpg'),
(12, 'Operating System Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'https://www.tutorialspoint.com/ebook/operating_system_tutorial/index.asp', 'Yes', 'IMG_94be509757316ce59ccf6e207ae10bba.jpg'),
(13, 'Docker Tutorial', 'Tutorialspoint', 'IT &amp; Software', 'Paid', 'https://www.tutorialspoint.com/ebook/docker_tutorial/index.asp', 'Yes', 'IMG_61b64030d4d76e049acfb1520d7ed427.jpg'),
(14, 'Modern Cybersecurity Practices', 'Tutorialspoint', 'Cyber Security', 'Paid', 'https://www.tutorialspoint.com/ebook/modern_cybersecurity_practices/index.asp', 'Yes', 'IMG_a8bff432332159d4a1e9ece43206ee7a.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
