-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 mars 2023 à 16:27
-- Version du serveur : 5.7.40
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lequaiantique`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inverse` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('DoctrineMigrations\\Version20230306142159', '2023-03-06 14:22:05', 380);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matin_debut` time NOT NULL,
  `matin_fin` time NOT NULL,
  `aprem_debut` time NOT NULL,
  `aprem_fin` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `jour`, `matin_debut`, `matin_fin`, `aprem_debut`, `aprem_fin`, `active`) VALUES
(1, 'Lundi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(2, 'mardi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(3, 'mercredi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(4, 'jeudi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(5, 'vendredi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(6, 'samedi', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 1),
(7, 'dimanche', '11:30:00', '14:00:00', '19:30:00', '20:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `horaire_reservation`
--

DROP TABLE IF EXISTS `horaire_reservation`;
CREATE TABLE IF NOT EXISTS `horaire_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_resto`
--

DROP TABLE IF EXISTS `info_resto`;
CREATE TABLE IF NOT EXISTS `info_resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `info_resto`
--

INSERT INTO `info_resto` (`id`, `nom`, `telephone`, `email`, `adresse`, `cp`, `ville`, `pays`, `active`) VALUES
(1, 'Le Quai Antique', '0401123334', 'le.quai.antique@hotmail.com', '99 rue Croix d\'or', '73000', 'Chambéry', 'France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `product_of_moment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `nb_persons` int(11) NOT NULL,
  `nb_children` int(11) DEFAULT NULL,
  `comentaire` longtext COLLATE utf8_unicode_ci,
  `allergie` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C84955F2A733EB` (`heure_id`),
  KEY `IDX_42C84955A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `heure_id`, `user_id`, `name_client`, `date`, `nb_persons`, `nb_children`, `comentaire`, `allergie`) VALUES
(1, 1, 1, 'heello', '2023-03-18 00:00:00', 5, 5, NULL, 0),
(2, 1, 1, 'heello', '2023-03-15 00:00:00', 5, 0, NULL, 0),
(3, 1, 1, 'heello', '2023-03-09 00:00:00', 5, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation_horaire`
--

DROP TABLE IF EXISTS `reservation_horaire`;
CREATE TABLE IF NOT EXISTS `reservation_horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `nb_place` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reservation_horaire`
--

INSERT INTO `reservation_horaire` (`id`, `heure`, `active`, `nb_place`) VALUES
(1, '11:30:00', 1, 2),
(2, '11:45:00', 1, 10),
(3, '12:00:00', 1, 10),
(4, '12:15:00', 1, 10),
(5, '12:30:00', 1, 10),
(6, '12:45:00', 1, 10),
(7, '13:00:00', 1, 10),
(8, '13:15:00', 1, 10),
(9, '13:30:00', 1, 10),
(10, '13:45:00', 1, 10),
(11, '14:00:00', 1, 10),
(12, '19:30:00', 1, 10),
(13, '19:45:00', 1, 10),
(14, '20:00:00', 1, 10),
(15, '20:15:00', 1, 10),
(16, '20:30:00', 1, 10),
(17, '20:45:00', 1, 10),
(18, '21:00:00', 1, 10),
(19, '21:15:00', 1, 10),
(20, '21:30:00', 1, 10),
(21, '21:45:00', 1, 10),
(22, '22:00:00', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `name`) VALUES
(1, 'Admin@hotmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$LckVhlPn37j3t6gzQYTP.ecSMkGyKdPwy8ne07AqhF9wXC0Vo7S56', 0, 'Admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_42C84955F2A733EB` FOREIGN KEY (`heure_id`) REFERENCES `reservation_horaire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
