-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Novembre 2014 à 00:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `uoanalyse`
--

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

CREATE TABLE IF NOT EXISTS `armure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `attaque`
--

CREATE TABLE IF NOT EXISTS `attaque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `defense`
--

CREATE TABLE IF NOT EXISTS `defense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `degat`
--

CREATE TABLE IF NOT EXISTS `degat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass_md5` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `mm`
--

CREATE TABLE IF NOT EXISTS `mm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `monstres`
--

CREATE TABLE IF NOT EXISTS `monstres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `niveau` tinyint(4) NOT NULL,
  `id_Att` int(11) NOT NULL,
  `id_Def` int(11) NOT NULL,
  `id_PV` int(11) NOT NULL,
  `id_MM` int(11) NOT NULL,
  `id_Armure` int(11) NOT NULL,
  `id_Degat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `pv`
--

CREATE TABLE IF NOT EXISTS `pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
