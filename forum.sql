-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 nov. 2024 à 23:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(200) NOT NULL,
  `auteur` varchar(150) NOT NULL,
  `destinataire` varchar(20) NOT NULL DEFAULT 'publique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `description`, `date`, `auteur`, `destinataire`) VALUES
(1, 'Ma premiere annonce', '2024-09-10', 'abou', 'publique'),
(6, 'Ma premiere annonce', '2024-09-10', 'abou', 'publique'),
(8, 'Ma premiere annonce', '2024-09-10', 'abou', 'publique'),
(9, 'Mon annoce privee', '2024-09-10', 'lamar', 'prive'),
(11, 'Mon annoce privee', '2024-09-10', 'lamar', 'prive'),
(12, 'Mon annoce privee', '2024-09-10', 'lamar', 'prive'),
(13, '2024-11-07 18:09:07', 'lamar', 'pour tout le monde', 'publique'),
(14, 'lamar', '2024-11-07 18:13:57', 'grand publique', 'publique'),
(15, '23 mort 2 blesse', '2024-11-07 18:16:18', 'prive', 'publique'),
(16, 'une jolie pouee', '2024-11-07 18:18:12', 'lamar', 'publique'),
(17, 'ma cHAUssure', '2024-11-07 18:21:31', 'lamar', 'publieeee'),
(18, 'annonce de verification', '2024-11-07 18:24:56', 'lamar', 'prive'),
(19, 'dfdkfdkfnsd,', '2024-11-07 18:27:46', 'lamar', 'public');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `age`, `statut`, `mdp`) VALUES
(1, 'lamar', 'kourouma', '23', 'admin', '1234'),
(2, 'ibra', 'kourouma', '21', 'admin', '4321'),
(4, 'baba', 'kourouma', '65', 'admin', '4545'),
(5, 'abou', 'conte', '36', 'Utilisateur_Simple', '98765');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
