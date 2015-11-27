-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Novembre 2015 à 14:58
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
  `localisation` varchar(64) COLLATE utf8_bin NOT NULL,
  `coodonneesGeo` varchar(48) COLLATE utf8_bin NOT NULL,
  `nbPlaces` int(11) NOT NULL,
  `nbMedecins` int(11) NOT NULL,
  PRIMARY KEY (`id_camp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table reference les donnees sur le camp ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `materielmedical`
--

CREATE TABLE IF NOT EXISTS `materielmedical` (
  `id_materiel_medical` int(11) NOT NULL AUTO_INCREMENT,
  `nomMateriel` varchar(48) COLLATE utf8_bin NOT NULL,
  `descriptionMateriel` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_materiel_medical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table contient les infos sur le materiel medicale' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE IF NOT EXISTS `medicaments` (
  `id_medicament` int(11) NOT NULL AUTO_INCREMENT,
  `nomMedicament` varchar(68) COLLATE utf8_bin NOT NULL,
  `descriptionMedicament` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_medicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table contient les info sur les medicaments' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `etatConscience` tinyint(1) NOT NULL,
  `typeRefugie` varchar(48) COLLATE utf8_bin NOT NULL,
  `nom` varchar(48) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(48) COLLATE utf8_bin NOT NULL,
  `sexe` char(1) COLLATE utf8_bin NOT NULL,
  `trancheAge` varchar(48) COLLATE utf8_bin NOT NULL,
  `dateNaiss` date NOT NULL,
  `taille` int(11) NOT NULL,
  `couleurCheveux` varchar(48) COLLATE utf8_bin NOT NULL,
  `couleurYeux` varchar(48) COLLATE utf8_bin NOT NULL,
  `nationalite` varchar(48) COLLATE utf8_bin NOT NULL,
  `zoneGeographique` varchar(64) COLLATE utf8_bin NOT NULL,
  `descriptif` text COLLATE utf8_bin NOT NULL,
  `photo` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table reference les informations sur les refugiees' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `id_presence` int(11) NOT NULL AUTO_INCREMENT,
  `dateArrivee` date NOT NULL,
  `dateSortie` date NOT NULL,
  `id_pers` int(11) NOT NULL,
  `id_camp` int(11) NOT NULL,
  PRIMARY KEY (`id_presence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table reference les dates de sorties et d''entree dans le camp des refugiee' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stockmateriel`
--

CREATE TABLE IF NOT EXISTS `stockmateriel` (
  `id_stock_materiel` int(11) NOT NULL AUTO_INCREMENT,
  `qtemateriel` int(11) NOT NULL,
  `id_materiel_medical` int(11) NOT NULL,
  `id_camp` int(11) NOT NULL,
  PRIMARY KEY (`id_stock_materiel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table contient la quantite de materiel qu''a un camp' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stockmedicaments`
--

CREATE TABLE IF NOT EXISTS `stockmedicaments` (
  `id_stock_medicaments` int(11) NOT NULL AUTO_INCREMENT,
  `qteMedicaments` int(11) NOT NULL,
  `id_medicaments` int(11) NOT NULL,
  `id_camp` int(11) NOT NULL,
  PRIMARY KEY (`id_stock_medicaments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Cette table donne la quantite de medicament qu''il a dans le camp' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
