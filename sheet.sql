-- Adminer 4.8.1 MySQL 8.0.25-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `sheet`;
CREATE TABLE `sheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sheet_name` varchar(200) NOT NULL,
  `row` int NOT NULL,
  `col` int NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `sheet` (`id`, `sheet_name`, `row`, `col`, `data`) VALUES
(1,	'sibin',	5,	7,	'{\"r2c3\":\"sibin\",\"r1c0\":\"bibin\",\"r2c1\":\"dark\",\"r1c4\":\"mass\"}'),
(4,	'bibin2',	3,	4,	'{\"r0c1\":\"mac\",\"r1c2\":\"android\",\"r2c3\":\"linux\",\"r2c0\":\"windows\",\"r2c1\":\"supe\"}');

-- 2021-05-28 13:37:41
