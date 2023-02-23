-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 fév. 2023 à 17:54
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
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `active`, `update_at`, `created_at`) VALUES
(5, 'Plat', 1, '2023-02-23 17:38:50', '2023-02-23 14:59:31'),
(6, 'Dessert', 1, '2023-02-23 17:39:01', '2023-02-23 14:59:41'),
(7, 'Entrée', 1, '2023-02-23 17:42:47', '2023-02-23 17:01:38');

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
('DoctrineMigrations\\Version20230223065340', '2023-02-23 06:53:48', 71),
('DoctrineMigrations\\Version20230223140105', '2023-02-23 14:01:19', 141);

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
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `prix`, `image`, `updated_at`, `active`, `created_at`) VALUES
(1, 6, 'Crepes suzette', '<div>Une crêpe Suzette est un dessert français composé d\'une crêpe au beurre Suzette, une sauce à base de sucre caramélisé et de beurre, de jus de mandarine ou d\'orange, de zeste et de liqueur Grand Marnier ou de curaçao.</div>', '250.00', 'joyful-vT5xrj3z1OE-unsplash.jpg', '2023-02-23 17:42:28', 1, '2023-02-23 17:40:18'),
(2, 6, 'mini glaces', '<div>En France, d\'après la législation, les glaces se répartissent en trois catégories distinctes : la crème glacée, la glace et le sorbet. DE quoi faire valsé vos pailles non ? Miam !</div>', '250.00', 'najlacam-f8TajCVv4s8-unsplash (1).jpg', '2023-02-23 17:42:39', 1, '2023-02-23 17:42:12'),
(3, 6, 'Tarte citron meringué', '<div>La tarte au citron meringuée est une tarte au citron complétée par une meringue italienne. C\'est une tarte sucrée garnie de crème à base de citron réalisée à partir d\'un mélange d\'œufs, de sucre, de jus de citron et de zeste de citron.</div>', '350.00', '13on-z4BJGODf6O4-unsplash (1).jpg', NULL, 1, '2023-02-23 17:43:43'),
(4, 5, 'salade César', '<div>La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, ...</div>', '650.00', 'hermes-rivera-OzBLe_Eg1mg-unsplash (1).jpg', NULL, 1, '2023-02-23 17:44:56'),
(5, 5, 'salade fruits de mer', '<div>La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, ...</div>', '650.00', 'anna-pelzer-IGfIGP5ONV0-unsplash (1).jpg', NULL, 1, '2023-02-23 17:46:14'),
(6, 5, 'bœuf bourguignon', '<div>Le bœuf bourguignon est une recette de cuisine d\'estouffade de bœuf, traditionnelle de la cuisine bourguignonne, en France. Cuisinée au vin rouge de Bourgogne, avec une garniture de champignons, de petits oignons et de lardons, ses variations d\'accompagnement sont multiples.</div>', '1500.00', 'farhad-ibrahimzade-TvMWBS6TIsg-unsplash (1).jpg', '2023-02-23 17:48:11', 1, '2023-02-23 17:47:54'),
(7, 5, 'blanquette de veaux', '<div>La blanquette, ou blanquette de veau ou blanquette de veau à l\'ancienne, est une recette de cuisine traditionnelle de cuisine française, à base de viande de veau cuite dans un bouillon avec carotte, poireau, oignon et bouquet garni, liée en sauce blanche à la crème et au beurre et aux champignons de Paris.</div>', '1500.00', 'farhad-ibrahimzade-KpOl9jV2aJM-unsplash (1).jpg', NULL, 1, '2023-02-23 17:49:15'),
(8, 5, 'sautée de fruit de mer', '<div>Sautés, grillés, poêlés, en brochettes ou en fricassées, les fruits de mer révèlent leurs saveurs lorsqu’ils sont juste saisis ! Accompagnés de sauces aux fruits, de champignons ou de légumes, d’épices ou d’herbes, les gambas, calamars, moules ou crevettes n’en sont que meilleurs !</div>', '1500.00', 'farhad-ibrahimzade-HNmcgpzPHag-unsplash.jpg', NULL, 1, '2023-02-23 17:50:41');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
(1, 'test@hotmail.com', '[]', '$2y$13$MFUro8.4olS4oTMMKybwmOj3eBFsBFBro2orS3wbSIAsNqyjCNrom', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
