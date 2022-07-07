-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 juin 2022 à 19:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `file_rouge_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle_categorie`) VALUES
(1, 'albums'),
(2, 'pistes'),
(3, 'evenements');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_commande` varchar(50) NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `commande_id_utilisateur_fk` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `libelle_commande`, `date_commande`, `id_utilisateur`) VALUES
(1, 'achat album', '2022-06-03 14:27:36', 83);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_comm` text,
  `date_comm` datetime NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_evenement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `commentaire_id_produit_fk` (`id_produit`),
  KEY `commentaire_id_utilisateur_fk` (`id_utilisateur`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `contenu_comm`, `date_comm`, `id_produit`, `id_utilisateur`, `id_evenement`) VALUES
(2, 'essais', '2022-06-28 18:39:22', NULL, 83, 10),
(3, 'essai', '2022-06-28 18:52:56', NULL, 84, 10),
(4, 'essais2', '2028-06-20 22:00:00', NULL, 83, 10);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_commande`),
  KEY `commande_FK` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_produit`, `id_commande`) VALUES
(10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `droit_utilisateur`
--

DROP TABLE IF EXISTS `droit_utilisateur`;
CREATE TABLE IF NOT EXISTS `droit_utilisateur` (
  `id_droit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_droit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_droit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droit_utilisateur`
--

INSERT INTO `droit_utilisateur` (`id_droit`, `nom_droit`) VALUES
(1, 'utilisateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evenement` varchar(100) NOT NULL,
  `description_evenement` text NOT NULL,
  `date_evenement` date NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `description_evenement`, `date_evenement`) VALUES
(10, 'Concert Brunch', 'Concert Brunch', '2022-06-11');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `description_produit` varchar(50) NOT NULL,
  `prix_produit` int(50) NOT NULL,
  `img_produit` text,
  `id_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `produit_id_categorie_fk` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description_produit`, `prix_produit`, `img_produit`, `id_categorie`) VALUES
(10, 'Unconscious harmony', 'CD', 10, './imageProduit/16540146672145414722', 1),
(11, 'Intuition', 'EP', 10, './imageProduit/1654022894666889928', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `addresse_utilisateur` varchar(100) NOT NULL,
  `mdp_utilisateur` varchar(250) NOT NULL,
  `id_droit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `utilisateur_droit_utilisateur_pk` (`id_droit`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `addresse_utilisateur`, `mdp_utilisateur`, `id_droit`) VALUES
(83, 'pato', 'pat', 'pat@gmail.com', '31 chemin Camparnaud', '$2y$10$EyIMQZADfnuhpyYIR5OkouXLmSEbKSu.Cfi6HWiwUGwM4MxQf0wYu', 2),
(84, 'pat', 'pat', 'pato@gmail.com', '31 chemin Camparnaud', '$2y$10$KQyIulgMrVSd.ztWyR69Q./y1WFkYUle3IRZEnvhY.cyFO8wEo6r2', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_id_utilisateur_fk` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_id_evenement_fk` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`),
  ADD CONSTRAINT `commentaire_id_produit_fk` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `commentaire_id_utilisateur_fk` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `commande_FK` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `contenir_produit_fk` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `produit_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_id_categorie_fk` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_droit_utilisateur_pk` FOREIGN KEY (`id_droit`) REFERENCES `droit_utilisateur` (`id_droit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
