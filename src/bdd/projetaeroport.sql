-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 07 mars 2024 à 13:19
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetaeroport`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int NOT NULL AUTO_INCREMENT,
  `nb_place` int NOT NULL,
  `immat` varchar(150) NOT NULL,
  `ref_modele` int NOT NULL,
  PRIMARY KEY (`id_avion`),
  KEY `fk_avion_modele` (`ref_modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `id_companie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL,
  PRIMARY KEY (`id_companie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `id_conge` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_conge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id_destination` int NOT NULL AUTO_INCREMENT,
  `nom_aeroport` varchar(100) NOT NULL,
  `ref_ville` int NOT NULL,
  PRIMARY KEY (`id_destination`),
  KEY `fk_destination_pays` (`ref_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `ville` varchar(100) NOT NULL,
  `fonction` varchar(150) NOT NULL DEFAULT 'Client',
  `ref_compagnie` int DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_user_companie` (`ref_compagnie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `mdp`, `date`, `ville`, `fonction`, `ref_compagnie`) VALUES
(1, 'ROHEE', 'Alexis', 'Hdidogs.pro@gmail.com', '$2y$10$wP/o6uwMBW9LaoU30uMss.dcT73jSr4.OZkDMgk5yJBte9xe4/U.i', '2004-12-24', 'DOMONT', 'Client', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `userconge`
--

DROP TABLE IF EXISTS `userconge`;
CREATE TABLE IF NOT EXISTS `userconge` (
  `ref_user` int NOT NULL,
  `ref_conge` int NOT NULL,
  PRIMARY KEY (`ref_user`,`ref_conge`),
  KEY `fk_userconge_conge` (`ref_conge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `uservol`
--

DROP TABLE IF EXISTS `uservol`;
CREATE TABLE IF NOT EXISTS `uservol` (
  `ref_user` int NOT NULL,
  `ref_vol` int NOT NULL,
  `nbr_billet` int NOT NULL,
  PRIMARY KEY (`ref_user`,`ref_vol`),
  KEY `fk_uservol_vol` (`ref_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `ref_pays` int NOT NULL,
  PRIMARY KEY (`id_ville`),
  KEY `fk_ville_pays` (`ref_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure_emb` time NOT NULL,
  `heure_dep` time NOT NULL,
  `heure_arr` time NOT NULL,
  `prix` float NOT NULL,
  `classe` varchar(100) NOT NULL,
  `ref_compagnie` int NOT NULL,
  `ref_destination` int NOT NULL,
  `ref_avion` int NOT NULL,
  `ref_pilote` int NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `fk_vol_companie` (`ref_compagnie`),
  KEY `fk_vol_avion` (`ref_avion`),
  KEY `fk_vol_destination` (`ref_destination`),
  KEY `fk_vol_user` (`ref_pilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `fk_avion_modele` FOREIGN KEY (`ref_modele`) REFERENCES `modele` (`id_modele`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `fk_destination_ville` FOREIGN KEY (`ref_ville`) REFERENCES `ville` (`id_ville`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_companie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_companie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `userconge`
--
ALTER TABLE `userconge`
  ADD CONSTRAINT `fk_userconge_conge` FOREIGN KEY (`ref_conge`) REFERENCES `conge` (`id_conge`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_userconge_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `uservol`
--
ALTER TABLE `uservol`
  ADD CONSTRAINT `fk_uservol_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_uservol_vol` FOREIGN KEY (`ref_vol`) REFERENCES `vol` (`id_vol`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_ville_pays` FOREIGN KEY (`ref_pays`) REFERENCES `pays` (`id_pays`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_avion` FOREIGN KEY (`ref_avion`) REFERENCES `avion` (`id_avion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_vol_companie` FOREIGN KEY (`ref_compagnie`) REFERENCES `compagnie` (`id_companie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_vol_destination` FOREIGN KEY (`ref_destination`) REFERENCES `destination` (`id_destination`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_vol_user` FOREIGN KEY (`ref_pilote`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
