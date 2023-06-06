-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 06 juin 2023 à 02:47
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id_categorie` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id_categorie`, `libelle`, `prix`) VALUES
('A', 'Citadine', 60),
('B', 'Economique', 72),
('C', 'Compacte', 80),
('D', 'Intermediaire', 95),
('E', 'Berline', 120),
('F', 'Grande berline', 150),
('G', 'Sport, SUV', 230),
('V', 'Luxe', 350);

-- --------------------------------------------------------

--
-- Structure de la table `Choix_options`
--

CREATE TABLE `Choix_options` (
  `id_option` int(11) NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Choix_options`
--

INSERT INTO `Choix_options` (`id_option`, `id_location`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 10),
(1, 12),
(1, 13),
(2, 3),
(2, 4),
(2, 9),
(2, 14),
(3, 4),
(3, 5),
(3, 6),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(4, 3),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(5, 6),
(5, 11);

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `id_type_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`id_client`, `nom`, `prenom`, `adresse`, `id_type_client`) VALUES
(1, 'Musk', 'Elon', '1, Miami', 3),
(3, 'Musk', 'Ella', '1, Miami', 3),
(4, 'Guerin', 'Mathis', 'Chantepie', 1),
(5, 'Bessin', 'Léo', '13 Rue Louis Arretche', 1),
(7, 'Garnier', 'Adam', 'Guadeloupe', 3),
(8, 'Guerin', 'Mathis', 'Chantepie', 1),
(9, 'Lepres', 'Jacky', 'Chantepie', 1),
(11, 'Gilbert', 'François', 'Cleunay', 1),
(12, 'Garnier', 'Adam', 'Cesson', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Location`
--

CREATE TABLE `Location` (
  `id_location` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL,
  `id_voiture` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Location`
--

INSERT INTO `Location` (`id_location`, `date_debut`, `date_fin`, `compteur_debut`, `compteur_fin`, `id_voiture`, `id_client`) VALUES
(3, '2023-10-19', '2026-06-11', 8, 30, '499 YGB 117', 3),
(4, '2023-05-30', '2026-09-23', 8, 8, '499 YGB 117', 1),
(5, '2023-06-09', '2023-10-26', 94, 94, '220 PSK 840', 5),
(6, '2023-06-08', '2027-09-23', 45645645, 45645649, '851 AFX 712', 7),
(9, '2023-06-05', '2027-10-05', 4886, 4886, '281 HGO 440', 4),
(10, '2023-06-30', '2027-06-01', 9951, 9951, '369 PRI 594', 9),
(11, '2023-06-08', '2028-09-26', 8712, 8712, '450 JOC 640', 9),
(12, '2023-06-15', '2023-07-01', 9140, 9140, '896 LPJ 221', 11),
(13, '2024-10-17', '2025-07-18', 45645645, 45645645, '851 AFX 712', 5),
(14, '2023-06-10', '2027-10-07', 5528, 5528, '947 GUR 797', 5);

-- --------------------------------------------------------

--
-- Structure de la table `Marque`
--

CREATE TABLE `Marque` (
  `id_marque` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Marque`
--

INSERT INTO `Marque` (`id_marque`, `libelle`) VALUES
(1, 'Alfa Romeo'),
(2, 'B.M.W.'),
(3, 'Citroen'),
(4, 'Fiat'),
(5, 'Ford'),
(6, 'Infinity'),
(7, 'Jaguar'),
(8, 'Mercedes'),
(9, 'Mini'),
(10, 'Opel'),
(11, 'Peugeot'),
(12, 'Porsche'),
(13, 'Skoda'),
(14, 'Smart'),
(15, 'Volkswagen');

-- --------------------------------------------------------

--
-- Structure de la table `Modele`
--

CREATE TABLE `Modele` (
  `id_modele` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `id_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Modele`
--

INSERT INTO `Modele` (`id_modele`, `libelle`, `image`, `id_marque`, `id_categorie`) VALUES
(1, 'Giulietta', 'alfa-romeo-giulietta.jpg', 1, 'D'),
(2, 'S-Max', 'ford-smax.jpg', 5, 'E'),
(3, 'Série 3', 'bmw-3.jpg', 2, 'D'),
(4, 'Série 7', 'bmw-7.jpg', 2, 'F'),
(5, 'Polo', 'vw-polo.jpg', 15, 'B'),
(6, 'Kuga', 'ford-kuga.jpg', 5, 'G'),
(7, '308', 'peugeot-308.jpg', 11, 'B'),
(8, 'Cinquecento', 'fiat-500.jpg', 4, 'A'),
(9, 'Classe E', 'mercedes-e.jpg', 8, 'F'),
(10, '308 Break', 'peugeot-308-break.jpg', 11, 'C'),
(11, 'Q50', 'infiniti-q50.jpg', 6, 'G'),
(12, 'X5', 'bmw-x5.jpg', 2, 'V'),
(13, 'Astra Break', 'opel-astra-break.jpg', 10, 'D'),
(14, 'For Two', 'smart-fortwo.jpg', 14, 'A'),
(15, 'Octavia Break', 'skoda-octavia-break.jpg', 13, 'D'),
(16, 'X1', 'bmw-x1.jpg', 2, 'G'),
(17, 'Scirocco', 'vw-scirocco.jpg', 15, 'D'),
(18, 'XF', 'jaguar-xf.jpg', 7, 'V'),
(19, 'Série 3 Break', 'bmw-3-break.jpg', 2, 'E'),
(20, 'Cooper', 'mini-cooper.jpg', 9, 'C'),
(21, 'Panamera', 'porsche-panamera.jpg', 12, 'V'),
(22, 'Jumpy 9 places', 'citroen-jumpy.jpg', 3, 'E'),
(23, 'C-Max', 'ford-cmax.jpg', 5, 'D'),
(24, 'Classe B', 'mercedes-b.jpg', 8, 'E'),
(25, 'Passat Break', 'vw-passat-break.jpg', 15, 'C'),
(26, '3008', 'peugeot-3008.jpg', 11, 'D');

-- --------------------------------------------------------

--
-- Structure de la table `Option`
--

CREATE TABLE `Option` (
  `id_option` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Option`
--

INSERT INTO `Option` (`id_option`, `libelle`, `prix`) VALUES
(1, 'Assurance complementaire', 50),
(2, 'Nettoyage', 75),
(3, 'Complement carburant', 30),
(4, 'Retour autre ville', 250),
(5, 'Rabais dimanche', -40);

-- --------------------------------------------------------

--
-- Structure de la table `Type_client`
--

CREATE TABLE `Type_client` (
  `id_type_client` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Type_client`
--

INSERT INTO `Type_client` (`id_type_client`, `libelle`) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Administration'),
(4, 'Association'),
(5, 'Longue duree');

-- --------------------------------------------------------

--
-- Structure de la table `Voiture`
--

CREATE TABLE `Voiture` (
  `immatriculation` varchar(50) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Voiture`
--

INSERT INTO `Voiture` (`immatriculation`, `compteur`, `id_modele`) VALUES
('014 UGW 528', 4433, 18),
('031 HSM 373', 6612, 1),
('065 VCY 938', 1026, 5),
('083 LCF 108', 776, 4),
('112 LOX 955', 1609, 19),
('132 ONC 113', 8023, 5),
('150 OBG 139', 456456, 8),
('152 FJA 208', 4931, 15),
('220 PSK 840', 94, 12),
('240 RNW 727', 9866, 23),
('281 HGO 440', 4886, 8),
('322 SKK 240', 434534, 8),
('369 PRI 594', 9951, 14),
('416 NVY 708', 2767, 16),
('429 DZD 419', 3299, 24),
('437 WWB 981', 2735, 2),
('450 JOC 640', 8712, 7),
('499 YGB 117', 9, 21),
('511 OLA 958', 43, 17),
('581 CPG 644', 9225, 25),
('621 EEK 970', 7898, 3),
('665 MKC 238', 2209, 10),
('688 UUM 423', 3121, 13),
('798 IGQ 241', 5, 17),
('800 HML 062', 56, 13),
('817 PJH 717', 2438, 3),
('840 HDQ 314', 4029, 4),
('851 AFX 712', 45645645, 9),
('872 ELT 639', 6094, 11),
('896 LPJ 221', 9140, 22),
('911 QON 559', 456456, 7),
('947 GUR 797', 5528, 1),
('966 AVO 990', 9587, 2),
('992 YMR 210', 3764, 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `Choix_options`
--
ALTER TABLE `Choix_options`
  ADD PRIMARY KEY (`id_option`,`id_location`),
  ADD KEY `FK_Choix_options_Location0` (`id_location`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `FK_Client_Type_client` (`id_type_client`);

--
-- Index pour la table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `FK_Location_Voiture` (`id_voiture`),
  ADD KEY `FK_Location_Client0` (`id_client`);

--
-- Index pour la table `Marque`
--
ALTER TABLE `Marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `Modele`
--
ALTER TABLE `Modele`
  ADD PRIMARY KEY (`id_modele`),
  ADD KEY `FK_Modele_Marque` (`id_marque`),
  ADD KEY `FK_Modele_Categorie0` (`id_categorie`);

--
-- Index pour la table `Option`
--
ALTER TABLE `Option`
  ADD PRIMARY KEY (`id_option`);

--
-- Index pour la table `Type_client`
--
ALTER TABLE `Type_client`
  ADD PRIMARY KEY (`id_type_client`);

--
-- Index pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD PRIMARY KEY (`immatriculation`),
  ADD KEY `FK_Voiture_Modele` (`id_modele`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Choix_options`
--
ALTER TABLE `Choix_options`
  ADD CONSTRAINT `FK_Choix_options_Location0` FOREIGN KEY (`id_location`) REFERENCES `Location` (`id_location`),
  ADD CONSTRAINT `FK_Choix_options_Option` FOREIGN KEY (`id_option`) REFERENCES `Option` (`id_option`);

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `FK_Client_Type_client` FOREIGN KEY (`id_type_client`) REFERENCES `Type_client` (`id_type_client`);

--
-- Contraintes pour la table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `FK_Location_Client0` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id_client`),
  ADD CONSTRAINT `FK_Location_Voiture` FOREIGN KEY (`id_voiture`) REFERENCES `Voiture` (`immatriculation`);

--
-- Contraintes pour la table `Modele`
--
ALTER TABLE `Modele`
  ADD CONSTRAINT `FK_Modele_Categorie0` FOREIGN KEY (`id_categorie`) REFERENCES `Categorie` (`id_categorie`),
  ADD CONSTRAINT `FK_Modele_Marque` FOREIGN KEY (`id_marque`) REFERENCES `Marque` (`id_marque`);

--
-- Contraintes pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD CONSTRAINT `FK_Voiture_Modele` FOREIGN KEY (`id_modele`) REFERENCES `Modele` (`id_modele`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
