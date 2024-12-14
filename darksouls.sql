-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 12:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darksouls`
--

-- --------------------------------------------------------

--
-- Table structure for table `alliance_assets`
--

CREATE TABLE `alliance_assets` (
  `alliance_id` int(11) NOT NULL,
  `covenant_id` int(11) NOT NULL,
  `alliance_name` varchar(100) NOT NULL,
  `alliance_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alliance_assets`
--

INSERT INTO `alliance_assets` (`alliance_id`, `covenant_id`, `alliance_name`, `alliance_image`) VALUES
(1, 1, 'GRAVELORD SERVANT 1', 'Asset/Profilee convenant/Gravelord Servant/Nito, First of the Dead.png'),
(2, 1, 'GRAVELORD SERVANT 2', 'Asset/Profilee convenant/Gravelord Servant/Necromancer.png'),
(3, 1, 'GRAVELORD SERVANT 3', 'Asset/Profilee convenant/Gravelord Servant/skeleton.png'),
(4, 2, 'DARKWHRAITH 1', 'Asset/Profilee convenant/Darkwhraith/Darkstalker Kaathe.png'),
(5, 2, 'DARKWHRAITH 2', 'Asset/Profilee convenant/Darkwhraith/The Four Kings.png'),
(6, 2, 'DARKWHRAITH 3', 'Asset/Profilee convenant/Darkwhraith/The Nameless King.png'),
(7, 3, 'PRINCESS GUARD 1', 'Asset/Profilee convenant/Princess Guard/Gwynevere, Princess of Sunlight.png'),
(8, 3, 'PRINCESS GUARD 2', 'Asset/Profilee convenant/Princess Guard/Silver Knights.png'),
(9, 3, 'PRINCESS GUARD 3', 'Asset/Profilee convenant/Princess Guard/sentinel.png'),
(10, 4, 'WARRIOR OF SUNLIGHT 1', 'Asset/Profilee convenant/Warior of Sunlight/Solaire of astora.png'),
(11, 4, 'WARRIOR OF SUNLIGHT 2', 'Asset/Profilee convenant/Warior of Sunlight/Gwyn, Lord of Sunlight'),
(12, 4, 'WARRIOR OF SUNLIGHT 3', 'Asset/Profilee convenant/Warior of Sunlight/The Nameless King.png'),
(13, 5, 'BLADE OF THE DARKMOON 1', 'Asset/Profilee convenant/Blade of the Darkmoon/Dark Sun Gwyndolin.png'),
(14, 5, 'BLADE OF THE DARKMOON 2', 'Asset/Profilee convenant/Blade of the Darkmoon/Darkmoon Knightess.png'),
(15, 5, 'BLADE OF THE DARKMOON 3', 'Asset/Profilee convenant/Blade of the Darkmoon/Yorshka.png'),
(16, 6, 'FOREST HUNTER 1', 'Asset/Profilee convenant/Forest Hunter/Alvina of the Darkroot Wood.png'),
(17, 6, 'FOREST HUNTER 2', 'Asset/Profilee convenant/Forest Hunter/Shiva of the East.png'),
(18, 6, 'FOREST HUNTER 3', 'Asset/Profilee convenant/Forest Hunter/Hunter phantom.png'),
(19, 7, 'UNDEAD LEGION 1', 'Asset/Profilee convenant/Undead Legion/Abyss Watchers.png'),
(20, 7, 'UNDEAD LEGION 2', 'Asset/Profilee convenant/Undead Legion/Knight Artorias.png'),
(21, 7, 'UNDEAD LEGION 3', 'Asset/Profilee convenant/Undead Legion/Wolf of Farron.png'),
(22, 8, 'CHAOS SERVANT 1', 'Asset/Profilee convenant/Chaos Servant/Daughter of Chaos.png'),
(23, 8, 'CHAOS SERVANT 2', 'Asset/Profilee convenant/Chaos Servant/Chaos Witch Quelaag.png'),
(24, 8, 'CHAOS SERVANT 3', 'Asset/Profilee convenant/Chaos Servant/Centipede Demon.png'),
(25, 9, 'PATH OF THE DRAGON 1', 'Asset/Profilee convenant/Path of the Dragon/Stone Dragon.png'),
(26, 9, 'PATH OF THE DRAGON 2', 'Asset/Profilee convenant/Path of the Dragon/Havel the Rock.png'),
(27, 9, 'PATH OF THE DRAGON 3', 'Asset/Profilee convenant/Path of the Dragon/Oswald of Carim.png');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_text` text NOT NULL,
  `covenant_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer_text`, `covenant_id`, `weight`) VALUES
(1, 1, 'Kuning', 3, 5),
(2, 1, 'Emas', 4, 5),
(3, 1, 'Hitam', 2, 5),
(4, 1, 'Merah', 1, 5),
(5, 1, 'Hijau', 6, 5),
(6, 1, 'Biru', 5, 5),
(7, 1, 'Oren', 8, 5),
(8, 1, 'Abu', 7, 5),
(9, 2, 'Singa', 4, 5),
(10, 2, 'Serigala', 6, 5),
(11, 2, 'Ular', 2, 5),
(12, 2, 'Naga', 9, 5),
(13, 2, 'Burung Hantu', 5, 5),
(14, 2, 'Phoenix', 8, 5),
(15, 3, 'Membantu menyelesaikan dengan damai', 3, 5),
(16, 3, 'Melawan langsung dengan kekuatan penuh', 2, 5),
(17, 3, 'Memastikan keadilan ditegakkan', 5, 5),
(18, 3, 'Menyusun strategi diam-diam', 8, 5),
(19, 3, 'Melindungi apa yang penting tanpa memedulikan ancaman', 6, 5),
(20, 3, 'Menarik diri untuk mencari keseimbangan', 9, 5),
(21, 4, 'Cahaya', 4, 5),
(22, 4, 'Kegelapan ', 2, 5),
(23, 4, 'Api', 8, 5),
(24, 4, 'Alam', 6, 5),
(25, 4, 'Keseimbangan', 9, 5),
(26, 5, 'Bekerja sama dalam tim', 4, 5),
(27, 5, 'Mengatasi tantangan sendirian', 2, 5),
(28, 5, 'Membantu orang lain dengan kemampuanmu', 3, 5),
(29, 5, 'Melindungi wilayah atau lingkungan tertentu', 6, 5),
(30, 5, 'Menemukan kedamaian melalui meditasi', 9, 5),
(31, 5, 'Mengejar keadilan dalam kegelapan', 5, 5),
(32, 5, 'Menghadapi kekacauan dengan tenang', 7, 5),
(33, 6, 'Matahari ', 4, 5),
(34, 6, 'Tengkorak', 1, 5),
(35, 6, 'Naga', 9, 5),
(36, 6, 'Pedang suci', 5, 5),
(37, 6, 'Pohon', 6, 5),
(38, 6, 'Api ', 8, 5),
(39, 7, 'Sebagai pahlawan yang membawa cahaya', 4, 5),
(40, 7, 'Sebagai pemimpin tangguh yang tak kenal takut', 2, 5),
(41, 7, 'Sebagai penjaga yang melindungi yang lemah', 5, 5),
(42, 7, 'Sebagai penjaga keseimbangan yang bijaksana', 7, 5),
(43, 7, 'Sebagai pembawa perubahan dalam kekacauan', 8, 5),
(44, 8, 'Hidup untuk melayani dan membantu orang lain', 3, 5),
(45, 8, 'Kekuasaan adalah segalanya', 2, 5),
(46, 8, 'Setiap tindakan memiliki konsekuensi, keadilan harus ditegakkan', 5, 5),
(47, 8, 'Hidup adalah keseimbangan antara ketertiban dan kekacauan', 9, 5),
(48, 8, 'Alam harus dijaga dan dilindungi', 6, 5),
(49, 8, 'Kekuatan berasal dari pengorbanan', 1, 5),
(50, 9, 'Melindungi orang-orang terdekat', 6, 5),
(51, 9, 'Menghadapi ancaman langsung', 4, 5),
(52, 9, 'Merencanakan langkah strategis', 7, 5),
(53, 9, 'Mencari tempat yang aman untuk bermeditasi', 9, 5),
(54, 9, 'Menemukan solusi terbaik bersama tim', 3, 5),
(55, 10, 'Menawarkan bantuan', 4, 5),
(56, 10, 'Menjaga jarak, tetapi tetap waspada', 6, 5),
(57, 10, 'Mencari tahu niat mereka terlebih dahulu', 7, 5),
(58, 10, 'Menguji kekuatan mereka', 2, 5),
(59, 10, 'Mengabaikan dan terus melanjutkan perjalananmu', 9, 5),
(60, 11, 'Istana atau kuil suci', 3, 5),
(61, 11, 'Hutan yang tenang ', 6, 5),
(62, 11, 'Tempat terpencil di puncak gunung', 9, 5),
(63, 11, 'Kuil matahari', 4, 5),
(64, 11, 'Wilayah gelap atau gua bawah tanah', 1, 5),
(65, 11, 'Tempat penuh api dan lava', 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `covenants`
--

CREATE TABLE `covenants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `covenants`
--

INSERT INTO `covenants` (`id`, `name`, `description`) VALUES
(1, 'Gravelord Servant', 'Covenant yang melambagkan kehancuran, kekacauan, dan kematian.'),
(2, 'Darkwraith', 'Refleksi dari sisi gelap manusia keserakahan, penghianatan, dan keinginan untuk mengambil dari orang lain.'),
(3, 'Princess Guard', 'Covenant yang melambangkan belas kasih, kehangatan,dan perlindungan.'),
(4, 'Warrior Of Sunlight', 'Covenant yang mencerminkan nilai-nilai altruisme/tidak mementingkan diri sendiri.'),
(5, 'Blade Of The Darkmoon', 'Simbol dari keadilan yang tidak sempurna tetapi tetap penting dalam dunia yang suram dan kacau.'),
(6, 'Forest Hunter', 'Covenant yang mencerminkan nilai kehormatan dan perlindungan.'),
(7, 'Undead Legion', 'memiliki satu tujuan tunggal menghentikan penyebaran Abyss yang korosif, bahkan dengan mengorbankan hidup mereka sendiri.'),
(8, 'Chaos Servant', 'Kehancuran yang terjadi ketika kekuatan besar tidak dapat dikendalikan.'),
(9, 'Path Of The Dragon', 'Perjalanan menuju pencerahan dan kekuatan sejati melalui keseimbangan, ketenangan, dan transformasi.');

-- --------------------------------------------------------

--
-- Table structure for table `covenants_assets`
--

CREATE TABLE `covenants_assets` (
  `id` int(11) NOT NULL,
  `covenant_id` int(11) NOT NULL,
  `cov_char_left` varchar(255) NOT NULL,
  `cov_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `cov_desk` varchar(255) NOT NULL,
  `aliansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `covenants_assets`
--

INSERT INTO `covenants_assets` (`id`, `covenant_id`, `cov_char_left`, `cov_name`, `logo`, `nickname`, `cov_desk`, `aliansi`) VALUES
(1, 1, 'Asset/Profilee convenant/Gravelord Servant/Nito, First of the Dead.png', 'GRAVELORD SERVANT', 'Asset/Profilee convenant/Gravelord Servant/Logo.png', 'As a fearless leader', 'Gravelord Servant melambangkan kehancuran, kekacauan, dan kematian. Covenant ini \nadalah kebalikan dari tema penyembuhan atau perlindungan, menyoroti sisi gelap\ndan tak terelakkan dari siklus kehidupan dan kematian.', ''),
(2, 2, 'Asset/Profilee convenant/Darkwhraith/The Four Kings.png', 'DARKWHRAITH', 'Asset/Profilee convenant/Darkwhraith/logo.png', 'Shadow in the night', 'Darkwraiths adalah refleksi dari sisi gelap manusia-keserakahan, penghianatan, dan keinginan untuk \nmengambil dari orang lain. Covenant ini menghadirkan moralitas abu-abu, dengan memberikan pemain\n pilihan untuk mendukung Age of Dark dan menolak tatanan A', ''),
(3, 3, 'Asset/Profilee convenant/Princess Guard/Silver Knights.png', 'PRINCESS GUARD', 'Asset/Profilee convenant/Princess Guard/logo.png', 'As a protrctor of light', 'Princess Guard melambangkan belas kasih, keindahan, dan perlindungan. Ini mencerminkan peran \nGwynevere sebagai simbol kehangatan dan harapan di dunia Dark Souls yang suram dan\npenuh penderitaan.', ''),
(4, 4, 'Asset/Profilee convenant/Warior of Sunlight/Solaire of astora.png', 'WARRIOR OF SUNLIGHT', 'Asset/Profilee convenant/Warior of Sunlight/logo mataharri.png', 'The Hero Who Brings the Light', 'Warrior of Sunlight mencerminkan nilai-nilai altruisme (tidak mementingkan diri sendiri) dan\n heroisme. Fokus mereka pada kerja sama dan penyebaran cahaya memberikan harapan dan \npersatuan dalam dunia Dark Souls yang gelap dan penuh penderitaan. Covenant ', ''),
(5, 5, 'Asset/Profilee convenant/Blade of the Darkmoon/Dark Sun Gwyndolin.png', 'BLADE OF THE DARKMOON', 'Asset/Profilee convenant/Blade of the Darkmoon/logo.png', 'Pursuing justice in the dark', 'Blade of the Darkmoon adalah simbol dari keadilan yang tidak sempurna tetapi tetap\npenting dalam dunia yang suram dan kacau. Filosofi mereka mengajarkan bahwa bahkan \ndari bayang-bayang, cahaya keadilan dapat bersinar.', ''),
(6, 6, 'Asset/Profilee convenant/Forest Hunter/Hunter phantom.png', 'FOREST HUNTER', 'Asset/Profilee convenant/Forest Hunter/Logo.png', 'As a guard who protects the weak', 'Forest Hunter mencerminkan nilai kehormatan dan perlindungan. Covenant ini tidak hanya \nmelibatkan PvP, tetapi juga menyoroti tanggung jawab untuk menjaga wilayah sakral dari para\nperusak. Pemain yang menjadi bagian dari Forest Hunter dianggap sebagai pen', ''),
(7, 7, 'Asset/Profilee convenant/Undead Legion/Abyss Watchers.png', 'UNDEAD LEGION', 'Asset/Profilee convenant/Undead Legion/Logo.png', 'One soul, many blades', 'Undead Legion of Farron, atau Abyss Watchers, adalah sekumpulan prajurit legendaris yang\ndipimpin oleh Wolnir dan memiliki satu tujuan tunggal: menghentikan penyebaran Abyss yang\nkorosif, bahkan dengan mengorbankan hidup mereka sendiri.', ''),
(8, 8, 'Asset/Profilee convenant/Chaos Servant/Daughter of Chaos.png', 'CHAOS SERVANT', 'Asset/Profilee convenant/Chaos Servant/logo.png', 'As a bringer of change in chaos', 'Chaos Servant Covenant menggambarkan kehancuran yang terjadi ketika kekuatan besar \ntidak dapat dikendalikan. Api Chaos, yang dimaksudkan untuk memperbarui dunia, justru \nmenjadi simbol kekacauan dan penderitaan. Covenant ini adalah tentang pengabdian kep', ''),
(9, 9, 'Asset/Profilee convenant/Path of the Dragon/Stone Dragon.png', 'PATH OF THE DRAGON', 'Asset/Profilee convenant/Path of the Dragon/logo.png', 'Through scales, find perfection', 'Path of the Dragon merepresentasikan perjalanan menuju pencerahan dan kekuatan sejati \nmelalui keseimbangan, ketenangan, dan transformasi. Para anggota melihat naga sebagai\nsimbol kesempurnaan fisik dan spiritual, berusaha menjadi satu dengan keabadian da', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`) VALUES
(1, 'Apa warna favoritmu?'),
(2, 'Hewan mana yang paling menggambarkan dirimu?'),
(3, 'Bagaimana cara kamu menghadapi konflik?'),
(4, 'Pilih elemen yang paling mencerminkan dirimu:'),
(5, 'Aktivitas apa yang paling kamu nikmati?'),
(6, 'Pilih simbol yang paling menarik bagimu:'),
(7, 'Bagaimana kamu ingin dikenang oleh orang lain?'),
(8, 'Apa filosofi hidupmu?'),
(9, 'Dalam situasi berbahaya, apa langkah pertama yang akan kamu ambil?'),
(10, 'Apa yang kamu lakukan ketika bertemu orang asing di perjalanan?'),
(11, 'Pilih tempat tinggal idealmu:');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `covenant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(11, 'radit', '$2y$10$VK30TemGPzq8XRiGKof.Y.eqrORZhxyq8ijjByN5DiRugyRl7p.RS', 'yusuf'),
(12, 'doni', '$2y$10$2zUf4f9yzFKKBRL2HkEclOgiWnf5Ijx9eJbwGPdsOW6NcONVbhfG2', 'doni@gmail.com'),
(13, 'nabil', '$2y$10$oPmFRrQMhsCuON24gSHTEOckLR1KBN6fHCUUqmTIwDZjvQAlnHo/6', 'nabilmonti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alliance_assets`
--
ALTER TABLE `alliance_assets`
  ADD PRIMARY KEY (`alliance_id`),
  ADD KEY `covenant_id` (`covenant_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `covenant_id` (`covenant_id`);

--
-- Indexes for table `covenants`
--
ALTER TABLE `covenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covenants_assets`
--
ALTER TABLE `covenants_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `covenant_id` (`covenant_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `covenant_id` (`covenant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alliance_assets`
--
ALTER TABLE `alliance_assets`
  MODIFY `alliance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `covenants`
--
ALTER TABLE `covenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `covenants_assets`
--
ALTER TABLE `covenants_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alliance_assets`
--
ALTER TABLE `alliance_assets`
  ADD CONSTRAINT `alliance_assets_ibfk_1` FOREIGN KEY (`covenant_id`) REFERENCES `covenants_assets` (`covenant_id`);

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`covenant_id`) REFERENCES `covenants` (`id`);

--
-- Constraints for table `covenants_assets`
--
ALTER TABLE `covenants_assets`
  ADD CONSTRAINT `covenants_assets_ibfk_1` FOREIGN KEY (`covenant_id`) REFERENCES `covenants` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`covenant_id`) REFERENCES `covenants` (`id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `user_answers_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
