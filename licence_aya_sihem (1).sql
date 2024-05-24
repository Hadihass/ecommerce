-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 mai 2024 à 01:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `licence aya/sihem`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`id`, `libelle`, `description`, `date_creation`) VALUES
(1, 'gateau', 'makrout', '2024-03-26 05:34:51'),
(2, 'vetement', 'jean et chemise', '2024-03-29 23:39:04'),
(3, 'meuble', 'home', '2024-05-23 18:48:46');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nomeprenom` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `totalproduit` decimal(10,0) NOT NULL,
  `valide` int(11) DEFAULT 0,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `nomeprenom`, `telephone`, `adresse`, `totalproduit`, `valide`, `date_creation`) VALUES
(5, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 1, '0000-00-00 00:00:00'),
(6, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(7, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(8, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(9, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(10, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(11, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(12, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(13, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(14, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(15, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(16, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(17, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(18, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(19, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(20, 'Hassaine AYA', 798789802, '32 rue Ouled Slimane El hadj', 400, 0, '0000-00-00 00:00:00'),
(21, 'Hassaine AYA', 798789802, '32 rue Ouled Slimane El hadj', 0, 0, '0000-00-00 00:00:00'),
(22, 'Hassaine AYA', 798789802, '32 rue Ouled Slimane El hadj', 0, 0, '0000-00-00 00:00:00'),
(23, 'Hassaine HADJIRA', 798789802, '32 rue Ouled Slimane El hadj', 200, 0, '0000-00-00 00:00:00'),
(24, 'Hassaine HADJIRA', 798789802, '32 rue Ouled Slimane El hadj', 0, 0, '0000-00-00 00:00:00'),
(25, 'Hassaine aya', 798789802, '32 rue Ouled Slimane El hadj', 3800, 0, '0000-00-00 00:00:00'),
(26, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 600, 0, '2024-05-25 01:21:56');

-- --------------------------------------------------------

--
-- Structure de la table `commande_client`
--

CREATE TABLE `commande_client` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nomeprenom` varchar(200) NOT NULL,
  `télephone` int(11) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantité` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valide` int(11) NOT NULL DEFAULT 0,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_client`
--

INSERT INTO `commande_client` (`id`, `id_produit`, `nomeprenom`, `télephone`, `adresse`, `prix`, `quantité`, `total`, `valide`, `date_creation`) VALUES
(2, 2, 'Hassaine aya', 798789802, '32 rue Ouled Slimane El hadj', 200, 11, 2200, 0, '2024-05-22 01:28:06'),
(3, 2, 'Hassaine aya', 798789802, '32 rue Ouled Slimane El hadj', 200, 10, 2000, 1, '2024-05-22 01:28:06'),
(4, 2, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 200, 2, 400, 0, '2024-05-25 00:00:00'),
(5, 2, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 200, 2, 400, 0, '2024-05-25 00:00:00'),
(6, 2, 'Hassaine Informaticien Hadi', 798789802, '32 rue Ouled Slimane El hadj', 200, 2, 400, 0, '2024-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantité` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `prix`, `quantité`, `total`, `id_produit`, `id_commande`) VALUES
(1, 200, 1, 200, 2, 5),
(2, 200, 1, 200, 5, 5),
(3, 200, 1, 200, 2, 6),
(4, 200, 1, 200, 5, 6),
(5, 200, 1, 200, 2, 19),
(6, 200, 1, 200, 5, 19),
(7, 200, 1, 200, 2, 20),
(8, 200, 1, 200, 5, 20),
(9, 200, 1, 200, 2, 23),
(10, 200, 8, 1600, 2, 25),
(11, 200, 11, 2200, 5, 25),
(12, 200, 3, 600, 2, 26);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `id_catégorie` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `id_catégorie`, `date_creation`, `description`, `image`) VALUES
(2, 'makrout', 200, 1, '2024-05-14 00:00:00', 'gateau traditionelle', '66454e49e5d27makrout.jpg'),
(4, 'chemise', 2000, 2, '2024-05-16 00:00:00', 'chemise demi manche', '664635041c909chemise.jpg'),
(5, 'baklawa', 200, 1, '2024-05-17 00:00:00', 'gateau traditionel', '66476e6497136baklawa1.png'),
(6, 't-shirt', 3000, 2, '2024-05-17 00:00:00', 'T Shirt Classique', '66476deacd7cat-shirt.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
(5, 'hadi', '123', '2024-03-24'),
(6, 'hadiha', '123456', '2024-03-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
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
-- AUTO_INCREMENT pour la table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `commande_client`
--
ALTER TABLE `commande_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD CONSTRAINT `commande_client_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
