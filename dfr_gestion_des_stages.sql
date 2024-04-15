-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 avr. 2024 à 08:28
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
-- Base de données : `dfr_gestion_des_stages`
--
CREATE DATABASE IF NOT EXISTS `dfr_gestion_des_stages` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dfr_gestion_des_stages`;

-- --------------------------------------------------------

--
-- Structure de la table `accueillir`
--

DROP TABLE IF EXISTS `accueillir`;
CREATE TABLE IF NOT EXISTS `accueillir` (
  `annee` datetime NOT NULL,
  `id_classe_id` int(11) NOT NULL,
  `id_specialitee_id` int(11) NOT NULL,
  `id_etudiant_id` int(11) NOT NULL,
  `id_entreprise_id` int(11) NOT NULL,
  PRIMARY KEY (`id_classe_id`,`id_specialitee_id`,`id_etudiant_id`,`id_entreprise_id`),
  UNIQUE KEY `UNIQ_AE67D359DE92C5CF` (`annee`),
  KEY `IDX_AE67D359F6B192E` (`id_classe_id`),
  KEY `IDX_AE67D35912F96F9C` (`id_specialitee_id`),
  KEY `IDX_AE67D359C5F87C54` (`id_etudiant_id`),
  KEY `IDX_AE67D3591A867E8F` (`id_entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueillir`
--

INSERT INTO `accueillir` (`annee`, `id_classe_id`, `id_specialitee_id`, `id_etudiant_id`, `id_entreprise_id`) VALUES
('2019-01-01 00:00:00', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `libelle`) VALUES
(1, '1SIO'),
(2, '2SIO'),
(3, 'Alternant');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240321164714', '2024-03-28 14:42:14', 187),
('DoctrineMigrations\\Version20240325110058', '2024-03-28 14:42:14', 46),
('DoctrineMigrations\\Version20240326085702', '2024-03-28 14:42:14', 2402),
('DoctrineMigrations\\Version20240328132418', '2024-03-28 14:42:17', 428),
('DoctrineMigrations\\Version20240328140041', '2024-03-28 14:42:17', 367),
('DoctrineMigrations\\Version20240328144625', '2024-03-28 14:46:39', 2112),
('DoctrineMigrations\\Version20240328145510', '2024-03-28 14:55:20', 89),
('DoctrineMigrations\\Version20240328152823', '2024-03-28 15:28:39', 1425),
('DoctrineMigrations\\Version20240328154540', '2024-03-28 15:46:08', 409),
('DoctrineMigrations\\Version20240404120015', '2024-04-04 12:00:25', 721),
('DoctrineMigrations\\Version20240404123844', '2024-04-04 12:38:52', 108),
('DoctrineMigrations\\Version20240404124751', '2024-04-04 12:49:06', 46),
('DoctrineMigrations\\Version20240404124851', '2024-04-04 12:49:06', 67),
('DoctrineMigrations\\Version20240404130919', '2024-04-04 13:09:25', 60),
('DoctrineMigrations\\Version20240404131817', '2024-04-04 13:18:22', 134),
('DoctrineMigrations\\Version20240404131949', '2024-04-04 13:19:54', 123),
('DoctrineMigrations\\Version20240404142900', '2024-04-04 14:29:35', 303);

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(2, 'sjourdan@3ddentalstore.fr'),
(3, 'gmarcotte3ds@3ddentalstore.fr'),
(4, 'gmarcotte@cooptechnodent.fr');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activitee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `rs`, `adresse`, `ville`, `pays`, `activitee`, `code_postal`) VALUES
(1, 'Attinos', '20 Bd Ferdinand Lesseps', 'Rouen', 'France', 'ESN', NULL),
(2, '3D DENTAL STORE', '75 route de Lyons la Forêt', 'Rouen', 'France', NULL, '76000');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(38) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(38) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`) VALUES
(1, 'Follet', 'Yaroslav'),
(2, 'Delattre', 'Louis');

-- --------------------------------------------------------

--
-- Structure de la table `lier`
--

DROP TABLE IF EXISTS `lier`;
CREATE TABLE IF NOT EXISTS `lier` (
  `id_profil_id` int(11) NOT NULL,
  `id_salarie_id` int(11) NOT NULL,
  `annee` datetime DEFAULT NULL,
  PRIMARY KEY (`id_profil_id`,`id_salarie_id`),
  KEY `IDX_B133E8FAA76B6C5F` (`id_profil_id`),
  KEY `IDX_B133E8FAFDD3139D` (`id_salarie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lier`
--

INSERT INTO `lier` (`id_profil_id`, `id_salarie_id`, `annee`) VALUES
(1, 1, '2019-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `libelle`) VALUES
(1, 'DRH'),
(2, 'Chargée de recrutement');

-- --------------------------------------------------------

--
-- Structure de la table `preferer`
--

DROP TABLE IF EXISTS `preferer`;
CREATE TABLE IF NOT EXISTS `preferer` (
  `id_specialitee_id` int(11) NOT NULL,
  `id_classe_id` int(11) NOT NULL,
  `id_entreprise_id` int(11) NOT NULL,
  PRIMARY KEY (`id_specialitee_id`,`id_classe_id`,`id_entreprise_id`),
  KEY `IDX_1C2A70212F96F9C` (`id_specialitee_id`),
  KEY `IDX_1C2A702F6B192E` (`id_classe_id`),
  KEY `IDX_1C2A7021A867E8F` (`id_entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `libelle`) VALUES
(1, 'Tuteur'),
(2, 'Personne a contacter pour les CV'),
(3, 'Jury');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_poste_id` int(11) DEFAULT NULL,
  `id_entreprise_id` int(11) DEFAULT NULL,
  `nom` varchar(38) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(38) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_828E3A1AF04BBC13` (`id_poste_id`),
  KEY `IDX_828E3A1A1A867E8F` (`id_entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`id`, `id_poste_id`, `id_entreprise_id`, `nom`, `prenom`) VALUES
(1, NULL, NULL, 'Jourdan', 'Sophie'),
(2, NULL, NULL, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `salarie_email`
--

DROP TABLE IF EXISTS `salarie_email`;
CREATE TABLE IF NOT EXISTS `salarie_email` (
  `salarie_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  PRIMARY KEY (`salarie_id`,`email_id`),
  KEY `IDX_CB411FD45859934A` (`salarie_id`),
  KEY `IDX_CB411FD4A832C1C9` (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salarie_telephone`
--

DROP TABLE IF EXISTS `salarie_telephone`;
CREATE TABLE IF NOT EXISTS `salarie_telephone` (
  `salarie_id` int(11) NOT NULL,
  `telephone_id` int(11) NOT NULL,
  PRIMARY KEY (`salarie_id`,`telephone_id`),
  KEY `IDX_DA3866535859934A` (`salarie_id`),
  KEY `IDX_DA386653FE649A29` (`telephone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `specialitee`
--

DROP TABLE IF EXISTS `specialitee`;
CREATE TABLE IF NOT EXISTS `specialitee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialitee`
--

INSERT INTO `specialitee` (`id`, `libelle`) VALUES
(1, 'SLAM'),
(2, 'SISIR');

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE IF NOT EXISTS `telephone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `telephone`
--

INSERT INTO `telephone` (`id`, `telephone`) VALUES
(1, '0652666210'),
(2, '0230322403');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role_id` int(11) NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B389E8BDC` (`id_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `id_role_id`, `identifiant`, `mot_de_passe`) VALUES
(1, 1, 'Admin', '$2y$12$VBQ9oJi97LDguIz0uJud7u2Qnm0YEGP0LTraDtcqOWL8CSZer7QUy'),
(2, 1, 'Yaroslav', '1234');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accueillir`
--
ALTER TABLE `accueillir`
  ADD CONSTRAINT `FK_AE67D35912F96F9C` FOREIGN KEY (`id_specialitee_id`) REFERENCES `specialitee` (`id`),
  ADD CONSTRAINT `FK_AE67D3591A867E8F` FOREIGN KEY (`id_entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_AE67D359C5F87C54` FOREIGN KEY (`id_etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_AE67D359F6B192E` FOREIGN KEY (`id_classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `lier`
--
ALTER TABLE `lier`
  ADD CONSTRAINT `FK_B133E8FAA76B6C5F` FOREIGN KEY (`id_profil_id`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `FK_B133E8FAFDD3139D` FOREIGN KEY (`id_salarie_id`) REFERENCES `salarie` (`id`);

--
-- Contraintes pour la table `preferer`
--
ALTER TABLE `preferer`
  ADD CONSTRAINT `FK_1C2A70212F96F9C` FOREIGN KEY (`id_specialitee_id`) REFERENCES `specialitee` (`id`),
  ADD CONSTRAINT `FK_1C2A7021A867E8F` FOREIGN KEY (`id_entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_1C2A702F6B192E` FOREIGN KEY (`id_classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `FK_828E3A1A1A867E8F` FOREIGN KEY (`id_entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_828E3A1AF04BBC13` FOREIGN KEY (`id_poste_id`) REFERENCES `poste` (`id`);

--
-- Contraintes pour la table `salarie_email`
--
ALTER TABLE `salarie_email`
  ADD CONSTRAINT `FK_CB411FD45859934A` FOREIGN KEY (`salarie_id`) REFERENCES `salarie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CB411FD4A832C1C9` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `salarie_telephone`
--
ALTER TABLE `salarie_telephone`
  ADD CONSTRAINT `FK_DA3866535859934A` FOREIGN KEY (`salarie_id`) REFERENCES `salarie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DA386653FE649A29` FOREIGN KEY (`telephone_id`) REFERENCES `telephone` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B389E8BDC` FOREIGN KEY (`id_role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
