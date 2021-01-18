-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 jan. 2021 à 15:15
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
(44, 'GRIME', 10, 29, '2021-01-15 11:16:59', 'GRIME', ''),
(45, 'debouble', 9, 29, '2021-01-15 11:43:37', 'debouble', ''),
(46, 'gagaaaa', 10, 29, '2021-01-15 11:44:53', 'gagaaaa', ''),
(47, 'ouuuuu', 10, 32, '2021-01-15 11:45:32', 'ouuuuu', ''),
(48, 'test blob', 1, 28, '2021-01-16 13:49:57', 'testblob', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
