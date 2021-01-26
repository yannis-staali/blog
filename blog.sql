-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 26 jan. 2021 à 03:10
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titre` varchar(255) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`, `titre`, `data`) VALUES
(1, 'mouton', 1, 1, '2021-01-15 05:58:14', 'mouton', ''),
(2, 'Poulet thai', 1, 1, '2021-01-15 05:58:06', 'Poulet thai', ''),
(3, 'Le bœuf Stroganov ou bœuf Stroganoff ( Gowjadina Stroganov, en russe) est une recette traditionnelle de la cuisine russe1 : un ragoût de viande de bœuf mariné, sauté, puis braisé avec une sauce à la crème smetana ou de crème aigre, de moutarde, de paprika, d\'oignons, et de champignons. Cette recette classique de la cuisine russe, est à ce jour répandue dans le monde entier sous de nombreuses variantes2.', 1, 1, '2021-01-09 11:12:37', 'Boeuf stroganov', ''),
(4, 'Le homard à l\'américaine ou homard à l\'armoricaine est une spécialité culinaire gastronomique traditionnelle des cuisine parisienne et gastronomie française, à base de homard (ou de langouste) à la sauce américaine2,3 (huile d\'olive, beurre, sauce tomate, oignon, échalote, ail, vin blanc, et cognac...)4,5.', 1, 2, '2021-01-09 18:53:47', 'Homar à l\'armoricaine', ''),
(5, 'Le gravelax (du suédois gravlax, « saumon séché » ou « saumon enterré ») est une spécialité culinaire des cuisines traditionnelles scandinave-nordiques, à base de filets de saumon cru longuement marinés, macérés, et séchés avec du sel, du sucre, du poivre, et de l\'aneth.', 1, 2, '2021-01-09 18:53:58', 'Saumon Gravlax', ''),
(7, 'Le gratin dauphinois ou pommes de terre à la dauphinoise est un plat gratiné traditionnel de la cuisine française, d\'origine dauphinoise, à base de pommes de terre et de lait. Ce plat est connu en Amérique du Nord comme « au gratin style potatoes » ou « pommes de terre au gratin ».', 1, 3, '2021-01-09 18:54:10', 'Gratin Dauphinois', ''),
(14, 'Truite', 1, 2, '2021-01-15 06:03:00', 'Truite', ''),
(15, 'Boeuf sauté', 1, 1, '2021-01-15 06:03:12', 'Boeuf sauté', ''),
(16, 'Veau', 1, 1, '2021-01-15 06:03:20', 'Veau', ''),
(27, 'fraisier', 1, 4, '2021-01-15 06:03:54', 'fraisier', ''),
(28, 'canard2', 1, 1, '2021-01-15 06:03:37', 'canard2', ''),
(32, 'blanquette veau', 1, 1, '2021-01-15 06:03:45', 'blanquette veau', ''),
(34, 'cabillaud', 1, 2, '2021-01-15 06:03:29', 'cabillaud', ''),
(35, 'Cerf', 1, 1, '2021-01-15 05:57:46', 'Cerf', ''),
(36, 'agneau', 1, 1, '2021-01-15 05:57:52', 'agneau', ''),
(37, '3 CHOCOLATS', 1, 4, '2021-01-15 06:04:09', '3 CHOCOLATS', ''),
(38, 'Tarte citron', 1, 4, '2021-01-15 06:04:16', 'Tarte citron', ''),
(39, 'poulet jaune', 1, 1, '2021-01-15 05:58:14', 'poulet jaune', ''),
(40, 'boeuf epice', 1, 1, '2021-01-15 05:58:14', 'boeuf epice', ''),
(41, 'poulet dakatine', 1, 1, '2021-01-15 05:58:14', 'poulet dakatine', ''),
(42, 'magret canard', 1, 1, '2021-01-15 05:57:46', 'magret canard', ''),
(43, 'GANG', 2, 29, '2021-01-15 11:14:34', 'GANG', ''),
(44, 'GRIME', 10, 29, '2021-01-15 11:16:59', 'GRIME', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Viande'),
(2, 'Poisson'),
(3, 'Garniture'),
(4, 'dessert'),
(7, 'salami'),
(8, 'phillipe'),
(9, 'baba'),
(18, 'jaja'),
(28, 'bobby32'),
(29, 'cristalinne');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'Miam c\'était trop bon !', 1, 1, '2021-01-09 14:53:55'),
(2, 'Encore une recette incroyable', 2, 1, '2021-01-09 07:45:06'),
(5, 'Encore une recette incroyableqsfdsqfsfqddsfdqefeqsfsef', 2, 3, '2021-01-09 07:45:06'),
(6, 'Encore une recette incroyable de ouuuuuuuf', 2, 4, '2021-01-09 07:45:06'),
(7, 'Encore une recette incroyable de ouuuuuuufddddd', 2, 5, '2021-01-09 07:45:06'),
(8, 'yo bobbyyyyy', 29, 1, '2021-01-14 20:19:38'),
(10, 'commment ca va ???', 29, 1, '2021-01-14 20:19:49'),
(13, 'trankil', 29, 1, '2021-01-14 20:26:01'),
(14, 'oui', 29, 1, '2021-01-14 20:26:22'),
(15, 'helllo', 38, 1, '2021-01-15 11:10:30'),
(16, 'salut fraté', 43, 1, '2021-01-15 11:15:40'),
(17, 'jarrive', 45, 9, '2021-01-15 11:43:59'),
(18, 'yo', 46, 10, '2021-01-15 11:45:04'),
(19, 'oui', 47, 10, '2021-01-15 11:45:45'),
(20, 'yo', 43, 1, '2021-01-16 15:22:08'),
(21, 'heeloo', 65, 10, '2021-01-22 11:26:34'),
(22, 'trop cool', 65, 10, '2021-01-22 11:26:41'),
(23, 'responsive is the new black', 65, 1, '2021-01-22 15:17:44'),
(24, ' vbgbg', 65, 1, '2021-01-23 08:43:34'),
(25, 'trop bon', 63, 14, '2021-01-25 08:04:29'),
(26, 'Awesome', 62, 14, '2021-01-25 08:04:45');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'admin', '$2y$10$XTI4xywxY3ZCtHI1Z2CH1eqsQ6W9v6o7jEmnDbBnKPu5vr8kAZRdy', 'admin@admin', 1337),
(2, 'moderateur', '$2y$10$1bufR/goXSpPm0x8Gnn1ge.Hj.yfzAXtVXLdz35gWa529R2nHVctm', 'moderateur@gmail.com', 42),
(4, 'baba', 'baba', 'baba@gmail.com', 1),
(5, 'Edward', 'Norton', 'edward@gmail.com', 1),
(6, 'bobby', '$2y$10$TOG.HNetkM5oEFOpiXjKculqPmE3SBBbZNwQlEWQqsNFpp5gPI5Aq', 'Bobby@gmail.com', 1),
(8, 'boubou', 'boubou', 'boubou@gmail.com', 1),
(9, 'gaudi', '$2y$10$sbHI/7zcAtWXz.ElQKCpX.RLcT4LS8uaoXU0a1Qb7RVmI1LKEpyjq', 'gaudi@gmail.com', 1),
(10, 'washington', '$2y$10$QDCyFQqCZ9uiQwzo2ilJY.67nKAyjrMmuUTQFMp1tEq1u2lq04OIy', 'washington@gmail.com', 1),
(15, 'dracofeu', '$2y$10$cOJ56rVtT5epgQPXNrajKeQyZBbpSO9uoa3ZPsl1eXK6cPQKTZxBG', 'dracofeu@gmail.com', 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
