-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Décembre 2015 à 14:40
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `humanitaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `camp`
--

CREATE TABLE IF NOT EXISTS `camp` (
  `id_camp` int(11) NOT NULL AUTO_INCREMENT,
  `nomCamp` varchar(48) COLLATE utf8_bin NOT NULL,
  `localisation` varchar(64) COLLATE utf8_bin NOT NULL,
  `coodonneesGeo` varchar(48) COLLATE utf8_bin NOT NULL,
  `nbPlaces` int(11) NOT NULL,
  `nbMedecins` int(11) NOT NULL,
  PRIMARY KEY (`id_camp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table reference les donnees sur le camp ' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
