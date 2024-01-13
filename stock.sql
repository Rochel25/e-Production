-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 jan. 2023 à 13:29
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `bon_ent`
--

DROP TABLE IF EXISTS `bon_ent`;
CREATE TABLE IF NOT EXISTS `bon_ent` (
  `NUM_BE` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_UT` int(5) NOT NULL,
  `NUM_F` int(5) NOT NULL,
  `NUM_PROD` int(5) NOT NULL,
  `ID_E` int(11) NOT NULL,
  `QT_E` float NOT NULL,
  `NUM_SERIE` varchar(30) NOT NULL,
  `AFFECTATION` varchar(20) NOT NULL,
  `DATEE` date DEFAULT NULL,
  `PU` float NOT NULL,
  `OBS` varchar(40) NOT NULL,
  PRIMARY KEY (`NUM_BE`),
  KEY `I_FK_BON_ENT_FOURNISSEUR` (`NUM_F`),
  KEY `I_FK_BON_ENT_PRODUIT` (`NUM_PROD`),
  KEY `I_FK_BON_ENT_UTLISATEUR` (`NUM_UT`) USING BTREE,
  KEY `emprunt` (`ID_E`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bon_ent`
--

INSERT INTO `bon_ent` (`NUM_BE`, `NUM_UT`, `NUM_F`, `NUM_PROD`, `ID_E`, `QT_E`, `NUM_SERIE`, `AFFECTATION`, `DATEE`, `PU`, `OBS`) VALUES
(31, 4, 1, 11, 0, 1, 'FUT/GPS/20-12-2022/4', '', '2022-12-20', 1000000, ''),
(16, 4, 6, 11, 0, 1, 'FUT/GPS/30-11-2022/2', '', '2022-11-30', 820000, ''),
(13, 4, 3, 10, 0, 5, '', 'Anti-delestage', '2022-11-28', 20000, ''),
(12, 4, 0, 5, 5, 10, '', '', '2022-11-28', 0, 'ds'),
(5, 4, 2, 3, 0, 4, '', 'GPS', '2022-11-17', 20000, ''),
(7, 4, 2, 3, 0, 1, '', 'GPS', '2022-11-18', 20000, ''),
(15, 4, 6, 11, 0, 1, 'FUT/GPS/30-11-2022/1', '', '2022-11-30', 820000, ''),
(9, 4, 2, 3, 0, 2, '', 'Anti-delestage', '2022-11-18', 200000, ''),
(10, 4, 6, 7, 0, 1, 'FUT/A.D/20-11-2022/1', '', '2022-11-20', 200000, ''),
(11, 4, 6, 7, 0, 1, 'FUT/A.D/20-11-2022/2', '', '2022-11-20', 200000, ''),
(14, 4, 5, 10, 0, 1, '', 'Anti-delestage', '2022-11-29', 200000, ''),
(17, 4, 6, 7, 0, 1, 'FUT/A.D/1-12-2022/3', '', '2022-12-01', 100000, ''),
(20, 4, 6, 7, 0, 1, 'FUT/A.D/5-12-2022/4', '', '2022-12-05', 100000, ''),
(21, 4, 0, 5, 6, 5, '', '', '2022-12-11', 0, 'niditra'),
(22, 4, 0, 5, 6, 5, '', '', '2022-12-11', 0, ''),
(23, 4, 0, 5, 7, 5, '', '', '2022-12-12', 0, 'VDF'),
(24, 4, 0, 5, 7, 15, '', '', '2022-12-12', 0, 'vdf'),
(25, 4, 0, 8, 4, 5, '', '', '2022-12-12', 0, 'dfds'),
(26, 4, 0, 5, 8, 5, '', '', '2022-12-12', 0, 'gfh'),
(27, 4, 0, 5, 9, 5, '', '', '2022-12-12', 0, 'JG'),
(28, 4, 0, 5, 8, 15, '', '', '2022-12-12', 0, 'tcyt'),
(29, 4, 0, 5, 9, 15, '', '', '2022-12-12', 0, ''),
(30, 4, 1, 11, 0, 1, 'FUT/GPS/18-12-2022/3', '', '2022-12-18', 1000000, ''),
(32, 4, 0, 5, 10, 2, '', '', '2022-12-21', 0, 'ffz'),
(33, 4, 0, 5, 11, 10, '', '', '2022-12-21', 0, 'fdsf'),
(34, 4, 0, 5, 12, 1, '', '', '2022-12-25', 0, 'fferf'),
(35, 4, 3, 10, 0, 20, '', 'Anti-delestage', '2022-12-25', 200000, ''),
(36, 4, 2, 5, 0, 50, '', '', '2022-12-25', 1000, ''),
(37, 4, 1, 7, 0, 1, 'FUT/A.D/4-1-2023/5', '', '2023-01-04', 100000, '');

-- --------------------------------------------------------

--
-- Structure de la table `bon_so`
--

DROP TABLE IF EXISTS `bon_so`;
CREATE TABLE IF NOT EXISTS `bon_so` (
  `NUM_BS` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_UT` int(5) NOT NULL,
  `NUM_PROD` int(5) DEFAULT NULL,
  `ID_E` int(5) NOT NULL,
  `QT_S` float NOT NULL,
  `PV` float NOT NULL,
  `RAISON` varchar(50) NOT NULL,
  `DATE_S` date DEFAULT NULL,
  PRIMARY KEY (`NUM_BS`),
  KEY `I_FK_BON_SO_PRODUIT` (`NUM_PROD`),
  KEY `I_FK_BON_SO_UTILISATEUR` (`NUM_UT`) USING BTREE,
  KEY `emprunt` (`ID_E`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bon_so`
--

INSERT INTO `bon_so` (`NUM_BS`, `NUM_UT`, `NUM_PROD`, `ID_E`, `QT_S`, `PV`, `RAISON`, `DATE_S`) VALUES
(17, 4, 5, 10, 2, 0, 'gergr', '2022-12-20'),
(4, 4, 8, 3, 10, 0, 'GRTG', '2022-11-18'),
(5, 4, 8, 4, 5, 0, 'GDFG', '2022-11-18'),
(10, 4, 11, 0, 1, 984000, 'Vente', '2022-11-30'),
(7, 4, 7, 0, 1, 220000, 'Vente', '2022-11-20'),
(8, 4, 5, 5, 10, 0, 'fsd', '2022-11-22'),
(9, 4, 3, 0, 1, 0, 'Fabrication', '2022-11-28'),
(11, 4, 7, 0, 1, 120000, 'Vente', '2022-12-01'),
(12, 4, 5, 6, 10, 0, 'mindra', '2022-12-11'),
(13, 4, 5, 7, 20, 0, 'DFD', '2022-12-11'),
(14, 4, 5, 8, 20, 0, 'DS', '2022-12-12'),
(15, 4, 5, 9, 20, 0, 'FG', '2022-12-12'),
(16, 4, 7, 0, 1, 120000, 'vente', '2022-12-15'),
(18, 4, 5, 11, 12, 0, 'ytt', '2022-12-21'),
(19, 4, 5, 12, 1, 0, 'dze', '2022-12-25'),
(20, 4, 11, 0, 1, 1200000, 'sortie', '2022-12-25'),
(21, 4, 11, 0, 1, 1200000, 'ok', '2022-12-25'),
(22, 4, 5, 13, 2, 0, 'ampiasaina', '2022-12-25'),
(23, 4, 3, 0, 4, 0, 'cds', '2022-12-25'),
(24, 4, 10, 0, 23, 0, 'kbkj', '2022-12-25'),
(25, 4, 8, 14, 8, 0, 'hbiuyb', '2023-01-19');

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `ID_EL` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_PROD` int(5) NOT NULL,
  `PROD_FINI` varchar(30) NOT NULL,
  `QT_EL` float NOT NULL,
  `COUT` float NOT NULL,
  PRIMARY KEY (`ID_EL`),
  KEY `NUM_PROD` (`NUM_PROD`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`ID_EL`, `NUM_PROD`, `PROD_FINI`, `QT_EL`, `COUT`) VALUES
(1, 3, 'GPS', 4, 800000),
(2, 10, 'GPS', 1, 200000),
(5, 3, 'Anti-delestage', 0.5, 100000);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `NUM_EMP` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_SERV` int(5) NOT NULL,
  `NUM_F` int(5) NOT NULL,
  `NOM` char(50) DEFAULT NULL,
  `TEL` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NUM_EMP`),
  KEY `I_FK_EMPLOYE_SERVICE` (`NUM_SERV`),
  KEY `I_FK_EMPLOYE_FOURNISSEUR` (`NUM_F`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`NUM_EMP`, `NUM_SERV`, `NUM_F`, `NOM`, `TEL`) VALUES
(1, 1, 1, 'APPRO SOCIETE', '0344620232'),
(2, 1, 0, 'RAKOTO Jean', '0341526321'),
(3, 1, 6, 'RINDRA', '0342112365');

-- --------------------------------------------------------

--
-- Structure de la table `emprunteur`
--

DROP TABLE IF EXISTS `emprunteur`;
CREATE TABLE IF NOT EXISTS `emprunteur` (
  `ID_E` int(5) NOT NULL AUTO_INCREMENT,
  `NOM_E` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_E`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunteur`
--

INSERT INTO `emprunteur` (`ID_E`, `NOM_E`) VALUES
(8, 'RANTO'),
(7, 'RIVO'),
(4, 'RAKOTO Jean'),
(5, 'RINDRA'),
(6, 'RABE'),
(9, 'RANTO'),
(10, 'APPRO SOCIETE'),
(11, 'RINDRA'),
(12, 'RINDRA'),
(13, 'RINDRA'),
(14, 'RAKOTO Jean');

-- --------------------------------------------------------

--
-- Structure de la table `fichetech`
--

DROP TABLE IF EXISTS `fichetech`;
CREATE TABLE IF NOT EXISTS `fichetech` (
  `ID_FIC` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_EMP` int(5) DEFAULT NULL,
  `HEURE_ENT` time DEFAULT NULL,
  `HEURE_SORT` time DEFAULT NULL,
  `NB_PROD_FINI` int(5) DEFAULT NULL,
  `NUM_PROD_FINI` varchar(30) NOT NULL,
  `DATEF` date DEFAULT NULL,
  `OBS` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_FIC`),
  KEY `I_FK_FICHETECH_EMPLOYE` (`NUM_EMP`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichetech`
--

INSERT INTO `fichetech` (`ID_FIC`, `NUM_EMP`, `HEURE_ENT`, `HEURE_SORT`, `NB_PROD_FINI`, `NUM_PROD_FINI`, `DATEF`, `OBS`) VALUES
(1, 1, '21:30:38', '00:00:00', 1, '0', '2022-11-09', 'df'),
(2, 1, '21:31:56', '21:48:44', 1, 'FUT/GPS/9-11-2022/1', '2022-11-09', 'vdf'),
(3, 1, '21:48:33', '21:48:39', 1, 'FUT/GPS/9-11-2022/1', '2022-11-09', 'VFD'),
(4, 1, '14:13:10', '15:47:31', 1, 'FUT/GPS/11-11-2022/2', '2022-11-11', 'cdv'),
(5, 3, '11:40:52', '11:40:59', 1, 'FUT/GPS/30-11-2022/1', '2022-11-30', 'OK'),
(6, 3, '11:44:16', '11:45:08', 1, 'FUT/GPS/30-11-2022/2', '2022-11-30', 'Vita'),
(7, 3, '14:59:37', '14:59:56', 1, 'FUT/A.D/5-12-2022/4', '2022-12-05', 'BUV'),
(8, 1, '16:26:44', '16:26:50', 1, 'FUT/GPS/18-12-2022/3', '2022-12-18', 'OK');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `NUM_F` int(5) NOT NULL AUTO_INCREMENT,
  `NOM` char(50) DEFAULT NULL,
  `ADRESSE` varchar(30) NOT NULL,
  `TEL` varchar(10) DEFAULT NULL,
  `TRANS` tinyint(1) NOT NULL,
  PRIMARY KEY (`NUM_F`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`NUM_F`, `NOM`, `ADRESSE`, `TEL`, `TRANS`) VALUES
(1, 'APPRO SOCIETE', '', '0344620232', 0),
(2, 'COMETE', 'AMPASAMBAZAHA', '0342222258', 1),
(3, 'QUINCAILLERIE', 'FIANARANTSOA', '0322322221', 1),
(4, 'QUINCA TANA', 'ANTANANARIVO', '0322422222', 1),
(5, 'MARCHE', 'FIANARANTSOA', '0322522221', 1),
(6, 'RINDRA', '', '0342112365', 0);

-- --------------------------------------------------------

--
-- Structure de la table `magasinier`
--

DROP TABLE IF EXISTS `magasinier`;
CREATE TABLE IF NOT EXISTS `magasinier` (
  `NUM_F` int(5) NOT NULL,
  `NOM` char(50) DEFAULT NULL,
  `TEL` varchar(10) DEFAULT NULL,
  `ADRESSE` varchar(30) NOT NULL,
  KEY `NUM_F` (`NUM_F`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `magasinier`
--

INSERT INTO `magasinier` (`NUM_F`, `NOM`, `TEL`, `ADRESSE`) VALUES
(2, 'COMETE', '0342222258', 'AMPASAMBAZAHA'),
(3, 'QUINCAILLERIE', '0322322221', 'FIANARANTSOA'),
(4, 'QUINCA TANA', '0322422222', 'ANTANANARIVO'),
(5, 'MARCHE', '0322522221', 'FIANARANTSOA');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

DROP TABLE IF EXISTS `pointage`;
CREATE TABLE IF NOT EXISTS `pointage` (
  `IDPOINTAGE` int(5) NOT NULL AUTO_INCREMENT,
  `NUM_EMP` int(5) NOT NULL,
  `NUM_SERV` int(5) NOT NULL,
  `HEUREENTMA` time NOT NULL,
  `HEURESORTMA` time NOT NULL,
  `HEUREENTSO` time NOT NULL,
  `HEURESORTSO` time NOT NULL,
  `DATEPOINTAGE` date NOT NULL,
  `OBSERVATION` varchar(50) NOT NULL,
  PRIMARY KEY (`IDPOINTAGE`),
  KEY `INDEX_P` (`NUM_EMP`) USING BTREE,
  KEY `INDEX_S` (`NUM_SERV`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`IDPOINTAGE`, `NUM_EMP`, `NUM_SERV`, `HEUREENTMA`, `HEURESORTMA`, `HEUREENTSO`, `HEURESORTSO`, `DATEPOINTAGE`, `OBSERVATION`) VALUES
(1, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-10-27', ''),
(2, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-10-28', ''),
(3, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-02', ''),
(4, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-09', ''),
(5, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-10', ''),
(6, 1, 1, '16:04:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-11', ''),
(7, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-14', ''),
(8, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-15', ''),
(9, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-15', ''),
(10, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-16', ''),
(11, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-16', ''),
(12, 1, 1, '20:42:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-17', ''),
(13, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-17', ''),
(14, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-17', ''),
(15, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-18', ''),
(16, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-18', ''),
(17, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-18', ''),
(18, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-19', ''),
(19, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-19', ''),
(20, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-19', ''),
(21, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-20', ''),
(22, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-20', ''),
(23, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-20', ''),
(24, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-21', ''),
(25, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-21', ''),
(26, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-21', ''),
(27, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-22', ''),
(28, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-22', ''),
(29, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-22', ''),
(30, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-27', ''),
(31, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-27', ''),
(32, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-27', ''),
(33, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-28', ''),
(34, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-28', ''),
(35, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-28', ''),
(36, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-29', ''),
(37, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-29', ''),
(38, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-29', ''),
(39, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-30', ''),
(40, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-30', ''),
(41, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-11-30', ''),
(42, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-01', ''),
(43, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-01', ''),
(44, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-01', ''),
(45, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-02', ''),
(46, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-02', ''),
(47, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-02', ''),
(48, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-05', ''),
(49, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-05', ''),
(50, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-05', ''),
(51, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-06', ''),
(52, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-06', ''),
(53, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-06', ''),
(54, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-07', ''),
(55, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-07', ''),
(56, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-07', ''),
(57, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-09', ''),
(58, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-09', ''),
(59, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-09', ''),
(60, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-11', ''),
(61, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-11', ''),
(62, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-11', ''),
(63, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-12', ''),
(64, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-12', ''),
(65, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-12', ''),
(66, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-13', ''),
(67, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-13', ''),
(68, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-13', ''),
(69, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-15', ''),
(70, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-15', ''),
(71, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-15', ''),
(72, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-16', ''),
(73, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-16', ''),
(74, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-16', ''),
(75, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-17', ''),
(76, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-17', ''),
(77, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-17', ''),
(78, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-18', ''),
(79, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-18', ''),
(80, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-18', ''),
(81, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-19', ''),
(82, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-19', ''),
(83, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-19', ''),
(84, 1, 1, '14:22:00', '14:22:00', '14:22:00', '14:22:00', '2022-12-20', ''),
(85, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-20', ''),
(86, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-20', ''),
(87, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-21', ''),
(88, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-21', ''),
(89, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-21', ''),
(90, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-22', ''),
(91, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-22', ''),
(92, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-22', ''),
(93, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-25', ''),
(94, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-25', ''),
(95, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-12-25', ''),
(96, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-01', ''),
(97, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-01', ''),
(98, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-01', ''),
(99, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-02', ''),
(100, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-02', ''),
(101, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-02', ''),
(102, 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-04', ''),
(103, 2, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-04', ''),
(104, 3, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-01-04', '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `NUM_PROD` int(5) NOT NULL AUTO_INCREMENT,
  `DESIGNATION` varchar(50) NOT NULL,
  `CATEGORIE` varchar(20) NOT NULL,
  `STOCK` int(5) NOT NULL,
  `STOCK1` int(5) NOT NULL,
  `SEUILMIN` int(11) NOT NULL,
  `SEUILMAX` int(11) NOT NULL,
  `TAVR` int(5) NOT NULL,
  `QTA` int(5) NOT NULL,
  PRIMARY KEY (`NUM_PROD`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`NUM_PROD`, `DESIGNATION`, `CATEGORIE`, `STOCK`, `STOCK1`, `SEUILMIN`, `SEUILMAX`, `TAVR`, `QTA`) VALUES
(9, 'stock', 'Outillage', 21, 21, 1, 3, 0, 0),
(3, 'fer', 'Matière première', 2, 0, 1, 2, 0, 0),
(11, 'GPS', 'Produit fini', 1, 0, 0, 5, 0, 0),
(5, 'Outil', 'Outillage', 90, 86, 1, 2, 0, 0),
(7, 'Anti-delestage', 'Produit fini', 2, 0, 1, 2, 0, 0),
(8, 'TEST FARANY', 'Outillage', 20, 12, 1, 30, 0, 0),
(10, 'Convertisseur', 'Matière première', 3, 0, 1, 10, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `NUM_SERV` int(5) NOT NULL AUTO_INCREMENT,
  `DEPARTEMENT` char(32) DEFAULT NULL,
  `RESP` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_SERV`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`NUM_SERV`, `DEPARTEMENT`, `RESP`) VALUES
(1, 'Eléctro-méca', 'Cadre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `NUM_UT` int(5) NOT NULL AUTO_INCREMENT,
  `NOM_UT` char(32) DEFAULT NULL,
  `ROLE` char(32) DEFAULT NULL,
  `MDP` char(32) DEFAULT NULL,
  `EMAIL` varchar(30) NOT NULL,
  PRIMARY KEY (`NUM_UT`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`NUM_UT`, `NOM_UT`, `ROLE`, `MDP`, `EMAIL`) VALUES
(4, 'Rindra', 'admin', '250599', 'rindra@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
