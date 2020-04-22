-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 avr. 2020 à 14:40
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rush`
--
CREATE DATABASE IF NOT EXISTS `rush` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rush`;

-- --------------------------------------------------------

--
-- Structure de la table `citation`
--

DROP TABLE IF EXISTS `citation`;
CREATE TABLE IF NOT EXISTS `citation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `citation`
--

INSERT INTO `citation` (`id`, `texte`, `image`, `date`) VALUES
(1, 'dqs', 'dqs', '2020-04-22');

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

DROP TABLE IF EXISTS `conseil`;
CREATE TABLE IF NOT EXISTS `conseil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `jour` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conseil`
--

INSERT INTO `conseil` (`id`, `nom`, `texte`, `jour`) VALUES
(1, 'bienetre', 'le test dune vie', '2020-04-22'),
(2, 'bienetre2', 'le test dune vie', '2020-04-22'),
(3, 'reboli', 'dqsdqssd', '2020-04-23');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `jour` date NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `nom`, `texte`, `jour`, `video`) VALUES
(1, 'Pompes posées', 'Lorsque l’on fait du sport chez soi sans matériel, difficile de passer à côté des pompes. Cet exercice au poids de corps est incontournable pour muscler ses pectoraux et offre de nombreuses possibilités. Parmi elles, connaissez-vous les pompes posées ? Il s’agit de réaliser une pompe, de poser la poitrine au sol en levant brièvement les mains, et de pousser avec les bras afin de revenir à la position initiale. Le fait de poser le torse au sol va augmenter l’intensité et la sensation d’étirement.', '2020-04-22', '1.mp4'),
(3, 'Rowing inversé', 'Deux chaises et un manche à balai suffisent pour muscler son dos à la maison. Placez-vous entre les deux chaises et saisissez le manche en prise pronation (paumes de mains vers le sol). Tirez ensuite avec vos bras et contractez vos dorsaux pour amener votre poitrine au niveau du manche, tout en restant gainé, le dos bien droit.', '2020-04-23', '2.mp4'),
(5, 'reboli', 'fds', '2020-04-24', '3.mp4'),
(6, 'reboli', 'fds', '2020-04-25', '4.mp4'),
(7, 'reboli', 'fds', '2020-04-26', '5.mp4'),
(8, 'reboli', 'fds', '2020-04-27', '6.mp4'),
(9, 'reboli', 'fds', '2020-04-28', '7.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `arrondissement` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `arrondissement`, `date`) VALUES
(1, 'admin', '$2y$12$6WeDTMgDcTwg/piORKvt..ch4bVkxNGNIGCpElc/P5eqWjhGpRJYC', 131313, '2020-04-22 13:31:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
