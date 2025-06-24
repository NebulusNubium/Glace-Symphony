-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 juin 2025 à 13:22
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `glace`
--

-- --------------------------------------------------------

--
-- Structure de la table `cone`
--

DROP TABLE IF EXISTS `cone`;
CREATE TABLE IF NOT EXISTS `cone` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cone_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cone`
--

INSERT INTO `cone` (`id`, `cone_type`) VALUES
(1, 'gauffré'),
(2, 'sucré'),
(3, 'luma');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250619142913', '2025-06-19 14:29:25', 91),
('DoctrineMigrations\\Version20250620073351', '2025-06-20 07:34:04', 63),
('DoctrineMigrations\\Version20250620075251', '2025-06-20 07:52:58', 44),
('DoctrineMigrations\\Version20250620075536', '2025-06-20 07:55:41', 143),
('DoctrineMigrations\\Version20250620134452', '2025-06-20 13:45:06', 175),
('DoctrineMigrations\\Version20250624075637', '2025-06-24 07:56:46', 75),
('DoctrineMigrations\\Version20250624091456', '2025-06-24 09:15:03', 48),
('DoctrineMigrations\\Version20250624091846', '2025-06-24 09:18:55', 279);

-- --------------------------------------------------------

--
-- Structure de la table `glace`
--

DROP TABLE IF EXISTS `glace`;
CREATE TABLE IF NOT EXISTS `glace` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredient_special` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cone_id` int DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_A6DD185F6D6AE6B6` (`cone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `glace`
--

INSERT INTO `glace` (`id`, `nom`, `ingredient_special`, `cone_id`, `image_name`, `updated_at`) VALUES
(12, 'Ludo Special', 'ptits lu', 1, 'luce-jubilee-2025-and-1-more-drawn-by-orenji-orenjipiiru-574f3c8a1b42ca8c40bc2ceff5a70423-685a6b1005c13638405665.jpg', '2025-06-24 09:08:32'),
(13, 'CasseNoisettes', 'Bourses', 2, 'lwa-constanze-by-omiza-zu-dck7yqg-685aa2fda7982406260035.jpg', '2025-06-24 13:07:09'),
(14, 'Lorem', 'Ipsum', 1, '30713913-10208816436568073-1664358625302282240-n-685a9c8abaed4962144887.jpg', '2025-06-24 12:39:38'),
(17, 'Virgin Mori', 'Mori', 2, 'iua6pww07r-685aa2bfbcca0622999024.jpg', '2025-06-24 13:06:07');

-- --------------------------------------------------------

--
-- Structure de la table `glace_toppings`
--

DROP TABLE IF EXISTS `glace_toppings`;
CREATE TABLE IF NOT EXISTS `glace_toppings` (
  `glace_id` int NOT NULL,
  `toppings_id` int NOT NULL,
  PRIMARY KEY (`glace_id`,`toppings_id`),
  KEY `IDX_CC5636B7BD89A2B` (`glace_id`),
  KEY `IDX_CC5636BBE2B4234` (`toppings_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `glace_toppings`
--

INSERT INTO `glace_toppings` (`glace_id`, `toppings_id`) VALUES
(13, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `toppings`
--

DROP TABLE IF EXISTS `toppings`;
CREATE TABLE IF NOT EXISTS `toppings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `topping_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `toppings`
--

INSERT INTO `toppings` (`id`, `topping_type`) VALUES
(1, 'chocolat'),
(2, 'caramel'),
(3, 'topping mystère'),
(4, 'cheff\'s choice');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'Patate', '[\"ROLE_USER\"]', '$2y$13$J5oEIJo3T93ge4Enc6njOua/rdAzT0syxLvHmPImbFJS4xgCidunW'),
(2, 'toto2', '[\"ROLE_USER\"]', '$2y$13$qQAbQuaVvmIy1/njzGSpZOw3qfoLDEg7b1ordb.c2E9FN2P3uIJXy'),
(3, 'toto', '[\"ROLE_USER\"]', '$2y$13$X8WZkN.2wwYUMOBfCWCMrOCwkUNnsFsDJ1lRd.mYaiVGxVCOhUnp.'),
(4, 'admin', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$6vyQ0VEILJILakAIu66sQ.yaw0sX/QkW7htyMKQ8IGexIAjFmAA/6'),
(5, 'hello', '[\"ROLE_USER\"]', '$2y$13$Bvki.PCtn95iguNohlCS7euRpiL.EKvoZx.IMF7KG5EhNpjy9IrKq');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `glace`
--
ALTER TABLE `glace`
  ADD CONSTRAINT `FK_A6DD185F6D6AE6B6` FOREIGN KEY (`cone_id`) REFERENCES `cone` (`id`);

--
-- Contraintes pour la table `glace_toppings`
--
ALTER TABLE `glace_toppings`
  ADD CONSTRAINT `FK_CC5636B7BD89A2B` FOREIGN KEY (`glace_id`) REFERENCES `glace` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CC5636BBE2B4234` FOREIGN KEY (`toppings_id`) REFERENCES `toppings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
