#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `locauto`
--
CREATE DATABASE IF NOT EXISTS `locauto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locauto`;

#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

DROP TABLE IF EXISTS `Categorie`;

CREATE TABLE Categorie(
        id_categorie Varchar (50) NOT NULL ,
        libelle      Varchar (50) NOT NULL ,
        prix         Float NOT NULL
	,CONSTRAINT PK_Categorie PRIMARY KEY (id_categorie)
)ENGINE=InnoDB;

INSERT INTO `Categorie` (`id_categorie`, `libelle`, `prix`) VALUES
('A', 'Citadine', '60.00'),
('B', 'Economique', '72.00'),
('C', 'Compacte', '80.00'),
('D', 'Intermediaire', '95.00'),
('E', 'Berline', '120.00'),
('F', 'Grande berline', '150.00'),
('G', 'Sport, SUV', '230.00'),
('V', 'Luxe', '350.00');

#------------------------------------------------------------
# Table: Type_client
#------------------------------------------------------------

DROP TABLE IF EXISTS `Type_client`;

CREATE TABLE Type_client(
        id_type_client Int NOT NULL ,
        libelle        Varchar (50) NOT NULL
	,CONSTRAINT PK_Type_client PRIMARY KEY (id_type_client)
)ENGINE=InnoDB;

INSERT INTO `Type_client` (`id_type_client`, `libelle`) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Administration'),
(4, 'Association'),
(5, 'Longue duree');

#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

DROP TABLE IF EXISTS `Client`;

CREATE TABLE Client(
        id_client      Int NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        adresse        Varchar (50) NOT NULL ,
        id_type_client Int NOT NULL
	,CONSTRAINT PK_Client PRIMARY KEY (id_client)

	,CONSTRAINT FK_Client_Type_client FOREIGN KEY (id_type_client) REFERENCES Type_client(id_type_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Option
#------------------------------------------------------------

DROP TABLE IF EXISTS `Option`;

CREATE TABLE Option(
        id_option Int NOT NULL ,
        libelle   Varchar (50) NOT NULL ,
        prix      Float NOT NULL
	,CONSTRAINT PK_Option PRIMARY KEY (id_option)
)ENGINE=InnoDB;

INSERT INTO `Option` (`id_option`, `libelle`, `prix`) VALUES
(1, 'Assurance complementaire', '50.00'),
(2, 'Nettoyage', '75.00'),
(3, 'Complement carburant', '30.00'),
(4, 'Retour autre ville', '250.00'),
(5, 'Rabais dimanche', '-40.00');

#------------------------------------------------------------
# Table: Marque
#------------------------------------------------------------

DROP TABLE IF EXISTS `Marque`;

CREATE TABLE Marque(
        id_marque Int NOT NULL ,
        libelle   Varchar (50) NOT NULL
	,CONSTRAINT PK_Marque PRIMARY KEY (id_marque)
)ENGINE=InnoDB;

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

#------------------------------------------------------------
# Table: Modele
#------------------------------------------------------------

DROP TABLE IF EXISTS `Modele`;

CREATE TABLE Modele(
        id_modele    Int NOT NULL ,
        libelle      Varchar (50) NOT NULL ,
        image        Varchar (50) NOT NULL ,
        id_marque    Int NOT NULL ,
        id_categorie Varchar (50) NOT NULL
	,CONSTRAINT PK_Modele PRIMARY KEY (id_modele)

	,CONSTRAINT FK_Modele_Marque FOREIGN KEY (id_marque) REFERENCES Marque(id_marque)
	,CONSTRAINT FK_Modele_Categorie0 FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie)
)ENGINE=InnoDB;

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

#------------------------------------------------------------
# Table: Voiture
#------------------------------------------------------------

DROP TABLE IF EXISTS `Voiture`;

CREATE TABLE Voiture(
        immatriculation Varchar (50) NOT NULL ,
        compteur        Int NOT NULL ,
        id_modele       Int NOT NULL
	,CONSTRAINT PK_Voiture PRIMARY KEY (immatriculation)

	,CONSTRAINT FK_Voiture_Modele FOREIGN KEY (id_modele) REFERENCES Modele(id_modele)
)ENGINE=InnoDB;

INSERT INTO `Voiture` (`immatriculation`, `compteur`, `id_modele`) VALUES
('031 HSM 373', 6584, 1),
('966 AVO 990', 9587, 2),
('817 PJH 717', 2438, 3),
('840 HDQ 314', 4029, 4),
('132 ONC 113', 8023, 5),
('135 OQO 460', 9725, 6),
('450 JOC 640', 8712, 7),
('281 HGO 440', 4886, 8),
('601 KLD 749', 399, 9),
('665 MKC 238', 2209, 10),
('872 ELT 639', 6094, 11),
('220 PSK 840', 94, 12),
('688 UUM 423', 3121, 13),
('369 PRI 594', 9951, 14),
('152 FJA 208', 4931, 15),
('416 NVY 708', 2767, 16),
('992 YMR 210', 3764, 17),
('689 NQO 523', 7824, 18),
('112 LOX 955', 1609, 19),
('909 NMD 072', 1298, 20),
('352 TSZ 667', 9003, 21),
('896 LPJ 221', 9140, 22),
('240 RNW 727', 9866, 23),
('429 DZD 419', 3299, 24),
('581 CPG 644', 9225, 25),
('443 UEU 073', 4564, 26),
('947 GUR 797', 5528, 1),
('437 WWB 981', 2735, 2),
('621 EEK 970', 7898, 3),
('083 LCF 108', 776, 4),
('065 VCY 938', 1026, 5),
('421 HNA 877', 2287, 6);

#------------------------------------------------------------
# Table: Location
#------------------------------------------------------------

DROP TABLE IF EXISTS `Location`;

CREATE TABLE Location(
        id_location     Int NOT NULL ,
        date_debut      Date NOT NULL ,
        date_fin        Date NOT NULL ,
        compteur_debut  Int NOT NULL ,
        compteur_fin    Int NOT NULL ,
        id_voiture Varchar (50) NOT NULL ,
        id_client       Int NOT NULL
	,CONSTRAINT PK_Location PRIMARY KEY (id_location)

	,CONSTRAINT FK_Location_Voiture FOREIGN KEY (id_voiture) REFERENCES Voiture(immatriculation)
	,CONSTRAINT FK_Location_Client0 FOREIGN KEY (id_client) REFERENCES Client(id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Choix_relations
#------------------------------------------------------------

DROP TABLE IF EXISTS `Choix_opions`;

CREATE TABLE Choix_options(
        id_option   Int NOT NULL ,
        id_location Int NOT NULL
	,CONSTRAINT PK_Choix_relations PRIMARY KEY (id_option,id_location)

	,CONSTRAINT FK_Choix_options_Option FOREIGN KEY (id_option) REFERENCES Option(id_option)
	,CONSTRAINT FK_Choix_options_Location0 FOREIGN KEY (id_location) REFERENCES Location(id_location)
)ENGINE=InnoDB;

