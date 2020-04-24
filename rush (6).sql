-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 avr. 2020 à 08:39
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `citation`
--

INSERT INTO `citation` (`id`, `texte`, `image`, `date`) VALUES
(1, '\"La vie est belle\"', 'lesmains1.jpg', '2020-04-22'),
(2, '\"Apres la pluie vient le beau temps\"', 'arc.jpg', '2020-04-23'),
(3, '\"chaque problème a sa solution\"', 'alpinistes.jpg', '2020-04-24'),
(4, '\"sourit à la vie\"', 'fleur.jpg', '2020-04-25'),
(5, '\"N\'oublie pas que tu es magnifique!\"', 'fleur.jpg', '2020-04-26'),
(6, '\"Zen restons Zen\"', 'galetzen.png', '2020-04-27'),
(7, '\"Derrière les nuages, le solleil brille toujours\"', 'oiseau.jpg', '2020-04-28');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conseil`
--

INSERT INTO `conseil` (`id`, `nom`, `texte`, `jour`) VALUES
(1, 'bienetre', 'le test dune vie', '2020-04-25'),
(2, 'bienetre2', 'le test dune vie', '2020-04-29'),
(3, 'reboli', 'dqsdqssd', '2020-04-23'),
(4, 'bienetre', 'le test dune vie', '2020-04-22'),
(5, 'rebolic', 'tesdfdsfsd', '2020-04-24');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_user`, `id_topic`, `date`) VALUES
(11, 'test test', 1, 3, '2020-04-22 16:09:44'),
(25, 'nice job', 1, 98, '2020-04-22 21:19:31'),
(26, 'juste movie', 1, 98, '2020-04-22 21:23:22'),
(24, 'test teste teste', 1, 3, '2020-04-22 17:56:26'),
(23, 'nice job', 1, 3, '2020-04-22 17:22:25'),
(29, 'yes ', 1, 98, '2020-04-22 23:21:46'),
(34, 'saluttt', 5, 237, '2020-04-24 10:32:59');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `nom`, `texte`, `jour`, `video`) VALUES
(1, 'Pompes posées', 'Lorsque l on fait du sport chez soi sans matériel, difficile de passer a cote des pompes. Cet exercice au poids de corps est incontournable pour muscler ses pectoraux et offre de nombreuses possibilités. Parmi elles, connaissez-vous les pompes posees ? Il s’agit de realiser une pompe, de poser la poitrine au sol en levant brievement les mains, et de pousser avec les bras afin de revenir à la position initiale. Le fait de poser le torse au sol va augmenter l intensite et la sensation d etirement.', '2020-04-22', '1.mp4'),
(3, 'Rowing inversé', 'Deux chaises et un manche a balai suffisent pour muscler son dos a la maison. Placez-vous entre les deux chaises et saisissez le manche en prise pronation (paumes de mains vers le sol). Tirez ensuite avec vos bras et contractez vos dorsaux pour amener votre poitrine au niveau du manche, tout en restant gaine, le dos bien droit.', '2020-04-24', '2.mp4'),
(6, 'reboli', 'fds', '2020-04-25', '4.mp4'),
(7, 'reboli', 'fds', '2020-04-26', '5.mp4'),
(8, 'reboli', 'fds', '2020-04-27', '6.mp4'),
(9, 'reboli', 'fds', '2020-04-28', '7.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetopic` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arrondtopic` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `user_id`, `datetopic`, `arrondtopic`) VALUES
(236, 'azeaze', 'poisson', 1, '2020-04-23 16:37:50', 131313),
(235, 'azeaze', 'poisson', 1, '2020-04-23 16:31:01', 131313),
(238, 'fin du dev', 'rush compliquer', 1, '2020-04-24 08:27:13', 131313);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `arrondissement`, `date`) VALUES
(1, 'admin', '$2y$12$Tif6XHIyxkwf24b2O1fhaeSaQiCiB6MltGB0Kx/OFPbd2DsmlPXpS', 131313, '2020-04-22 13:31:34'),
(5, 'thoni2', '$2y$12$6KpP12ZChQilTeazynZjCObZnSLq2.a869DN8onoLXmSwY/.EQEb6', 130019, '2020-04-24 08:24:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
