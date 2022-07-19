-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 juil. 2022 à 00:11
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `children`
--

CREATE TABLE `children` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_firstname` varchar(25) NOT NULL,
  `child_birthdate` datetime NOT NULL,
  `child_scheme` tinyint(3) UNSIGNED NOT NULL,
  `child_allergies` varchar(50) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `registered_at` datetime NOT NULL,
  `unsuscribed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `message` varchar(255) NOT NULL,
  `message_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



