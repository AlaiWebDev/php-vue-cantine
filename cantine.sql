-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 juil. 2022 à 15:51
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cantine`
--
CREATE DATABASE IF NOT EXISTS `cantine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cantine`;

-- --------------------------------------------------------

--
-- Structure de la table `children`
--

CREATE TABLE `children` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_firstname` varchar(25) NOT NULL,
  `child_birthdate` date NOT NULL,
  `child_scheme` tinyint(3) UNSIGNED NOT NULL,
  `child_allergies` varchar(50) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `registered_at` date NOT NULL,
  `unsuscribed_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `children`
--

INSERT INTO `children` (`id`, `parent_id`, `child_firstname`, `child_birthdate`, `child_scheme`, `child_allergies`, `approved`, `registered_at`, `unsuscribed_at`) VALUES
(1, 18, 'Anthony', '2010-07-10', 2, 'Aucune', 0, '2022-07-10', '0000-00-00'),
(2, 18, 'Léa', '2009-03-07', 2, 'Gluten, Arachide', 1, '2022-07-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `paid_at` datetime NOT NULL,
  `amount` float UNSIGNED NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_profile` tinyint(4) NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `user_profile`, `sender_id`, `message`, `message_created`) VALUES
(3, 18, 0, 16, 'L\'administrateur vous souhaite la bienvenue sur l\'application Cantine.', '2022-07-10 05:54:41'),
(4, 16, 2, 18, 'Merci pour votre message de bienvenue !', '2022-07-10 05:59:25'),
(61, 16, 2, 18, 'coucou', '2022-07-10 11:46:03');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_street` varchar(50) NOT NULL,
  `user_city` varchar(30) NOT NULL,
  `user_zipcode` int(5) UNSIGNED NOT NULL,
  `user_profile` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_street`, `user_city`, `user_zipcode`, `user_profile`, `created_at`, `deleted_at`) VALUES
(16, 'ORLUK', 'alainwebdev@free.fr', '0769552043', '$2y$10$zDlwOp9JEty3oVM3hJzLR.G4MHf6GI//LBW7b2Cev5zl3eIsipBsW', '2C rue des fleurs', 'Rosheim', 67560, 0, '2022-07-10', '0000-00-00'),
(18, 'MAXHUNI', 'zerina@gmail.com', '0388498435', '$2y$10$YIuoak/sXVkcZfFE3uMT8eER1kMJTxHQIfg6UobXZCigBkE3RVMkq', 'Route de la Wantzenau', 'Strasbourg', 67200, 2, '2022-07-10', '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_parent_children_id` (`parent_id`);

--
-- Index pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contribution_child_id` (`child_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_message_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `FK_parent_children_id` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `FK_contribution_child_id` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_user_message_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



