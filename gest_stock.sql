-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2020 at 01:05 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gest_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
CREATE TABLE IF NOT EXISTS `caisse` (
  `PRODUIT` char(15) DEFAULT NULL,
  `PRIX_DU_PRODUIT` int(11) DEFAULT NULL,
  `SOMME_DU_` int(11) DEFAULT NULL,
  `ID_CAISSE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CAISSE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CATEGORIE` int(11) NOT NULL,
  `NOM_CATEGORIE` int(11) NOT NULL,
  `DESCRIPTION` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(30) DEFAULT NULL,
  `PRENOM_S` varchar(30) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  `ADRESSE` varchar(30) DEFAULT NULL,
  `LOCALITE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `DATE_DE_COMMANDE` date DEFAULT NULL,
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_client` int(11) NOT NULL,
  `Etat_command` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_COMMANDE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `NOM_` text,
  `PRENOMS_` text,
  `TYPE` varchar(10) DEFAULT NULL,
  `ID_FOURNISSEUR` varchar(12) NOT NULL,
  `TEL` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_FOURNISSEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ID_PRODUIT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PRODUIT` varchar(11) NOT NULL,
  `ID_FOURNISSEUR` varchar(12) NOT NULL,
  `UNITE_STOCK` varchar(30) DEFAULT NULL,
  `PRIX_UNITAIRE` varchar(90) DEFAULT NULL,
  `ID_CATEGORIE` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUIT`),
  KEY `FK_APPROVISIONNER` (`ID_FOURNISSEUR`),
  KEY `FK_CONTENIR` (`NOM_PRODUIT`),
  KEY `FK_EGISTRER` (`ID_CATEGORIE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`ID_PRODUIT`, `NOM_PRODUIT`, `ID_FOURNISSEUR`, `UNITE_STOCK`, `PRIX_UNITAIRE`, `ID_CATEGORIE`) VALUES
(1, 'mangspo', 'sa', '23123', '26700', 23),
(3, 'avoca', '3', '23', '45', 2),
(4, 'goyave', '4', '2', '45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(30) DEFAULT NULL,
  `PRENOM` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `DATE_VENTE` date DEFAULT NULL,
  `QTE_PROD` varchar(100) DEFAULT NULL,
  `ID_VENTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CAISSE` int(11) NOT NULL,
  `ID_PRODUIT` int(11) DEFAULT NULL,
  `ETAT_VENTE` varchar(30) DEFAULT NULL,
  `ID_CLIENT` int(11) DEFAULT NULL,
  `PRIX_UNITAIRE` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_VENTE`),
  KEY `AK_IDENTIFIANT_1` (`ID_VENTE`),
  KEY `FK_ENREGISTRER` (`ID_CAISSE`),
  KEY `FK_EGISTjjjRER` (`ID_PRODUIT`),
  KEY `FK_EGISTjjjbbRER` (`ID_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
