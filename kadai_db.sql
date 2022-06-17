-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 17 日 01:20
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_an_db`
--

CREATE TABLE `kadai_an_db` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `naiyou` text,
  `indate` datetime NOT NULL,
  `age2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kadai_an_db`
--

INSERT INTO `kadai_an_db` (`id`, `name`, `email`, `naiyou`, `indate`, `age2`) VALUES
(114, 'honga', 'sh091965@gmail.com', 'テスト', '2022-06-16 23:44:51', 1),
(115, '手札f', 'fdfd', 'fdfd', '2022-06-16 23:45:00', 2),
(116, 'fdf', 'fdfd', 'dfd', '2022-06-16 23:45:07', 3),
(117, '復活', 'fdfd', 'fdfd', '2022-06-16 23:45:19', 4),
(118, 'fd', 'fd', 'dfdd', '2022-06-16 23:45:26', 5),
(119, 'でfdf', 'fdfd', 'fddfd', '2022-06-16 23:45:34', 5),
(120, 'fdfd', 'dfdfd', 'fdfdファ', '2022-06-16 23:45:44', 6),
(121, 'fdfdfdffd', 'fdfdfd', 'fdfd', '2022-06-16 23:45:52', 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_user_table`
--

CREATE TABLE `kadai_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kadai_user_table`
--

INSERT INTO `kadai_user_table` (`id`, `name`, `u_id`, `u_pw`, `kanri_flg`, `life_flg`) VALUES
(1, '本賀', 'honga', 'honga', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai_an_db`
--
ALTER TABLE `kadai_an_db`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kadai_user_table`
--
ALTER TABLE `kadai_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai_an_db`
--
ALTER TABLE `kadai_an_db`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- テーブルの AUTO_INCREMENT `kadai_user_table`
--
ALTER TABLE `kadai_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
