-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content` (`content`),
  KEY `author` (`author`),
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `author`) VALUES
(1,	'First article',	'Hi, it\'s my first article !',	'saidou'),
(2,	'Second article',	'Hi, it\'s my second article !',	'jean'),
(3,	'Third article',	'Hello, it\'s my third article !',	'saidou'),
(4,	'Test',	'azertyuiop',	'lili'),
(5,	'test de momo',	'testeur momo',	'momo'),
(8,	'testu',	'hhjkkl',	'saidou');

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `content`, `article`) VALUES
(1,	'louis',	'It\'s my second comment',	2),
(2,	'Paul',	'It\'s my first comment',	1),
(3,	'erwan',	'abcdefgh',	1);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  FULLTEXT KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(40,	'saidou',	'$2y$10$eBjQIBWURtbEghdmflBNHei1VcvDEo6HtlqRu6sBWG3DJhn2.3k0m'),
(41,	'jean',	'$2y$10$iNC9.Qm3ONYXkXEUInEiqOZwIc4PTRI08NznEKk97M3WO4uPhdb1S'),
(42,	'paul',	'$2y$10$BrKbQxhOfqfssadqDF4IvOc8RvJxKi6ThKrM9hnyS2htIuq47mVem'),
(43,	'loic',	'$2y$10$A0b1BxRqOggpGEo.FsnyZOwQxsutP0OdeS2Fky4.kEDVWLehhLtNu'),
(46,	'carl',	'$2y$10$8H7CmRSdnkkA0FF9GzlEWedBq91ERcmgJ8kvKsgZiM/B0WhbWo1fK'),
(47,	'momo',	'$2y$10$WsOAgk5FG7BB.5e/9osXqeuLqloUnkZtMTfgU2fCuIU5rSSJjrFaS'),
(48,	'lili',	'$2y$10$Zk0FEXjmjeH229MHNcuk9.ap5xk65yMtgppVm.fWwdN3jHKDmGQr2'),
(50,	'aaz',	'$2y$10$LdC5LUeI4a7Otf8PpJhNdu9YPRlqtzh36IpsRsz0/b3/3A3Oa.dkW'),
(51,	'LOI',	'$2y$10$43D.4E2IGnU6XZOpsNCPiOGeh8dgr0mB3mL4eF4Dfq4NtgZ3XPqi2'),
(56,	'TTT',	'$2y$10$F1hNP.6f1dGJTeoLiau38.U1Epalmybpmj4J7xRcW1R6tY7homQha');

-- 2019-01-30 23:50:31
