-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 août 2020 à 23:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_ocp`
--

-- --------------------------------------------------------

--
-- Structure de la table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `NUM_ACCOUNT` char(255) NOT NULL,
  `CODE_CITY` int(11) DEFAULT NULL,
  `AGENCY` char(255) DEFAULT NULL,
  `ADDRESS` char(255) DEFAULT NULL,
  PRIMARY KEY (`NUM_ACCOUNT`),
  KEY `FK_REFERENCE_4` (`CODE_CITY`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bank_accounts`
--

INSERT INTO `bank_accounts` (`NUM_ACCOUNT`, `CODE_CITY`, `AGENCY`, `ADDRESS`) VALUES
('011590000009210006006980', 46000, 'BMCE BANK', ''),
('007590000935400000001631', 46000, 'ATTIJARIWAFA BANK', '');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `CODE_CITY` int(11) NOT NULL,
  `CITY_NAME` char(255) DEFAULT NULL,
  PRIMARY KEY (`CODE_CITY`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `N_DOCUMENT` char(255) NOT NULL,
  `NUM_COMPTE` char(255) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `OBJECT` char(255) DEFAULT NULL,
  `CIN_BEN` char(255) DEFAULT NULL,
  `NOM_BEN_PC` char(255) DEFAULT NULL,
  `RIB_BEN` char(255) DEFAULT NULL,
  `OP_TYPE` char(255) DEFAULT NULL,
  `DOC_MONTANT` float DEFAULT NULL,
  `TYPE_DOC` varchar(11) DEFAULT NULL,
  `DOC_MONTANT_LETTRE` varchar(255) NOT NULL,
  `SIGNED` int(11) DEFAULT NULL,
  `LINK_SIGNE1` varchar(255) DEFAULT NULL,
  `LINK_SIGNE2` varchar(255) DEFAULT NULL,
  `SIGNED_BY1` varchar(250) DEFAULT NULL,
  `SIGNED_BY2` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`N_DOCUMENT`),
  KEY `FK_REFERENCE_1` (`NUM_COMPTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`N_DOCUMENT`, `NUM_COMPTE`, `DATE`, `OBJECT`, `CIN_BEN`, `NOM_BEN_PC`, `RIB_BEN`, `OP_TYPE`, `DOC_MONTANT`, `TYPE_DOC`, `DOC_MONTANT_LETTRE`, `SIGNED`, `LINK_SIGNE1`, `LINK_SIGNE2`, `SIGNED_BY1`, `SIGNED_BY2`) VALUES
('6/20', '007590000935400000001631', '2020-08-25', 'NULL', 'NULL', 'Kamili Zakaria', '007590000935400220001631', 'Mise Ã  disposition', 15822, 'ORDRE', 'quinze mille huit cent vingt-deux', 2, '5f452b2d2293a.png', '5f452b209713a.png', 'sign1@gmail.com', 'test@gmail.com'),
('5/20', '007590000935400000001631', '2020-08-25', 'NULL', 'VH544652', 'Jamal Hamidi', 'NULL', 'Mise Ã  disposition', 4568, 'MISE', 'quatre mille cinq cent soixante-huit', 2, '5f452abfc7bd1.png', '5f452a9273cfd.png', 'sign1@gmail.com', 'test@gmail.com'),
('4/20', '007590000935400000001631', '2020-08-23', 'NULL', 'GH544652', 'Jamal Rahmani', 'NULL', 'Mise Ã  disposition', 12369, 'MISE', 'douze mille trois cent soixante-neuf', 2, '5f42c95b7baf9.png', '5f42c95095458.png', 'sign1@gmail.com', 'mehdi@gmail.com'),
('3/20', '007590000935400000001631', '2020-08-23', 'NULL', 'NULL', 'Ahmed Tayibi', '007590000935422000001631', 'Ordre de PrÃ©lÃ¨vement', 5555, 'ORDRE', 'cinq mille cinq cent cinquante-cinq', 2, '5f42c8d6f1320.png', '5f42c8cac6290.png', 'sign1@gmail.com', 'mehdi@gmail.com'),
('2/20', '007590000935400000001631', '2020-08-23', 'NULL', 'NULL', 'Yahia Naim', '007590000935400565801631', 'Ordre de PrÃ©lÃ¨vement', 1544, 'ORDRE', 'mille cinq cent quarante-quatre', 2, '5f42c58e4d865.png', '5f42c582e4c67.png', 'sign1@gmail.com', 'mehdi@gmail.com'),
('1/20', '007590000935400000001631', '2020-08-23', 'NULL', 'HH155652', 'Rachid TAHA', 'NULL', 'Mise Ã  disposition', 1566, 'MISE', 'mille cinq cent soixante-six', 2, '5f42c07aca525.png', '5f42c066dcae9.png', 'sign1@gmail.com', 'mehdi@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `signatories`
--

DROP TABLE IF EXISTS `signatories`;
CREATE TABLE IF NOT EXISTS `signatories` (
  `N_DOCUMENT` char(255) NOT NULL,
  `EMAIL` char(255) NOT NULL,
  PRIMARY KEY (`N_DOCUMENT`,`EMAIL`),
  KEY `FK_REFERENCE_3` (`EMAIL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `EMAIL` char(255) NOT NULL,
  `USER` varchar(50) NOT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `SALT` varchar(32) NOT NULL,
  PRIMARY KEY (`EMAIL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`EMAIL`, `USER`, `PASSWORD`, `ROLE`, `SALT`) VALUES
('Nadi@gmail.com', 'Nadia Raji', '997f792e3af13a5b1848167bd62240d7c36c2855729168dcab06262f1c5b0468', 1, '”@å‘WŒ×†qúóåP´Ý³T]YH±T›C„ÿ2<'),
('mehdi@gmail.com', 'Ali Amrani', 'c647b7d86fd33ffdf3fcec3c9216fd4061626b4d5ea70f4f769319d9cac80bd7', 3, 'Éýév¼I¬ÖN?¶Õ\n1J\n\"²¤J­×PþuæÄ§¥E'),
('sign1@gmail.com', 'Aymane choukri', '0ecb0782c0bbca20da48d6248c5dcfae2090447c0633eb12bdf307808117ffe2', 2, 'â³j:/@MgÎ|ºˆAÓ-ºèóHø°kí¢—þ'),
('test@gmail.com', 'Chekouri ibrahim', 'a5f501caa3672424f01211c6eab02f9d3cb6c0bb962dbb39352f1ebe785ed6d6', 3, 'sÉ—Ø=þËÖ–é×i)-ñ2™x0½ÛSà€©À');

-- --------------------------------------------------------

--
-- Structure de la table `users_session`
--

DROP TABLE IF EXISTS `users_session`;
CREATE TABLE IF NOT EXISTS `users_session` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_EMAIL` varchar(255) NOT NULL,
  `HASH` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users_session`
--

INSERT INTO `users_session` (`ID`, `USER_EMAIL`, `HASH`) VALUES
(40, 'sign1@gmail.com', 'd5fa2af1d3ad940e327e07790fc6960bf89b223d464c3dd7738642807b2294d2'),
(39, 'test@gmail.com', '961fa840834bd72fe70509894fd42cf59a07df5a969b41aebb1b27d0c0c56a45'),
(32, '1@gmail.com', '87045a10b7ad5b0cd7b26bbd3c0eccf8e710f764a50e988483d829b991cd6afd'),
(24, 'abdo@gmail.com', 'b6c59beabdf1b734f826cf4d1202324dd74f473a97b994831b1cd9bf88320157'),
(36, 'mehdi@gmail.com', '9f9f920647739776f10a7b2e8ae461b21f065dd7881b392aed797feae54ffe85');

-- --------------------------------------------------------

--
-- Structure de la table `verified_email`
--

DROP TABLE IF EXISTS `verified_email`;
CREATE TABLE IF NOT EXISTS `verified_email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(250) NOT NULL,
  `ADDED_BY` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`,`EMAIL`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `verified_email`
--

INSERT INTO `verified_email` (`ID`, `EMAIL`, `ADDED_BY`) VALUES
(11, 'test@gmail.com', 'Nadi@gmail.com'),
(10, 'mehdi@gmail.com', 'Nadi@gmail.com'),
(9, 'sign1@gmail.com', 'Nadi@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
