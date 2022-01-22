-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 jan. 2022 à 23:24
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_exam_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(12) NOT NULL,
  `USER_ADMIN` varchar(80) NOT NULL,
  `ADMIN_MAIL` varchar(80) NOT NULL,
  `ADMIN_PWD` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USER_ADMIN`, `ADMIN_MAIL`, `ADMIN_PWD`) VALUES
(5, 'Kevin', 'kevin@admin.fr', '4bd074cf429ab454cd7bee74be51083a93cd8aa9'),
(6, 'Clement', 'clement@admin.fr', '4bd074cf429ab454cd7bee74be51083a93cd8aa9'),
(7, 'Timothy', 'tim@admin.fr', '4bd074cf429ab454cd7bee74be51083a93cd8aa9'),
(8, 'admin', 'admin@admin.fr', '4bd074cf429ab454cd7bee74be51083a93cd8aa9');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(80) NOT NULL,
  `DESCRIPTION` varchar(80) NOT NULL,
  `DATE_CREATION` date NOT NULL,
  `ID_AUTHOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ID`, `TITLE`, `DESCRIPTION`, `DATE_CREATION`, `ID_AUTHOR`) VALUES
(9, 'coucou', 'Je fais un test pour voir si ça fonctionnne', '2022-01-22', 21),
(11, 'YES !!!!!', 'Il semblerait que cela fonctionne !!', '2022-01-22', 21),
(12, 'coucou', 'un test de pls', '2022-01-22', 21),
(13, 'Clement le boloss', 'Ah ouais tu sais pas chargé une DB ... :P', '2022-01-22', 21),
(18, 'Nouveau test', 'Moi ça marche', '2022-01-22', 22),
(19, 'coucou', 'coucou c\'est tim', '2022-01-22', 22);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(80) NOT NULL,
  `PASSWORD` varchar(80) NOT NULL,
  `MAIL` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `MAIL`) VALUES
(19, 'test', 'test', 'test@test'),
(20, 'kevin', 'test', 'test@test.fr'),
(21, 'KORO', '4bd074cf429ab454cd7bee74be51083a93cd8aa9', 'koro@db.fr'),
(22, 'Tim', '4bd074cf429ab454cd7bee74be51083a93cd8aa9', 'tim@pain.fr'),
(23, 'Kevin', '4bd074cf429ab454cd7bee74be51083a93cd8aa9', 'kevin@ynov.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `USER_ADMIN` (`USER_ADMIN`),
  ADD UNIQUE KEY `ADMIN_MAIL` (`ADMIN_MAIL`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_AUTHOR` (`ID_AUTHOR`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`,`MAIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`ID_AUTHOR`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
