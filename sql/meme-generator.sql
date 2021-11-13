-- Adminer 4.8.1 MySQL 5.5.5-10.6.4-MariaDB-1:10.6.4+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `meme-generator`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `memes`;
CREATE TABLE `memes` (
                         `id` bigint(20) NOT NULL AUTO_INCREMENT,
                         `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `usuario` bigint(20) NOT NULL,
                         PRIMARY KEY (`id`),
                         KEY `usuario` (`usuario`),
                         CONSTRAINT `memes_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
                            `id` bigint(20) NOT NULL AUTO_INCREMENT,
                            `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2021-11-12 22:52:09

