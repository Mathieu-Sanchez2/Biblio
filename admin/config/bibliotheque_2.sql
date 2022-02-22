-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 fév. 2022 à 14:33
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id`, `libelle`) VALUES
(1, 'ajouter'),
(2, 'modifier'),
(3, 'supprimer'),
(4, 'clôturer');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom_de_plume` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `nom_de_plume`, `adresse`, `ville`, `code_postal`, `mail`, `numero`, `photo`) VALUES
(1, 'Rowling', 'Joanne', 'J.K Rowling', '123 rue des patates', 'Paris', '75001', 'jk-rowling@biblio.fr', '0102030405', 'jk-rowling.png');

-- --------------------------------------------------------

--
-- Structure de la table `auteur_livre`
--

DROP TABLE IF EXISTS `auteur_livre`;
CREATE TABLE IF NOT EXISTS `auteur_livre` (
  `id_auteur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date` datetime NOT NULL,
  KEY `id_auteur` (`id_auteur`),
  KEY `id_livre_auteur` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur_livre`
--

INSERT INTO `auteur_livre` (`id_auteur`, `id_livre`, `date`) VALUES
(1, 1, '2022-02-01 08:02:19'),
(1, 2, '2022-02-01 08:02:19'),
(1, 3, '2022-02-01 08:02:19'),
(1, 4, '2022-02-01 08:02:19'),
(1, 5, '2022-02-01 08:02:19'),
(1, 1, '2022-02-01 08:02:19');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Horreur'),
(2, 'Roman'),
(3, 'Action'),
(4, 'Jeunesse'),
(5, 'Société'),
(6, 'Romance'),
(7, 'Cuisine'),
(8, 'Science-fiction'),
(9, 'Manga'),
(10, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_livre`
--

DROP TABLE IF EXISTS `categorie_livre`;
CREATE TABLE IF NOT EXISTS `categorie_livre` (
  `id_categorie` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  KEY `id_categorie` (`id_categorie`),
  KEY `id_livre_categorie` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_livre`
--

INSERT INTO `categorie_livre` (`id_categorie`, `id_livre`) VALUES
(3, 5),
(3, 15),
(4, 15),
(5, 15),
(2, 16),
(4, 16),
(3, 17),
(1, 18),
(2, 18),
(3, 18),
(4, 18),
(5, 18),
(7, 18),
(8, 18),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `mail`, `objet`, `message`, `date`) VALUES
(8, 'aaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa', 'ththth', '2022-02-02 11:38:48');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denomination` varchar(255) NOT NULL,
  `siret` varchar(14) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero_tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `denomination`, `siret`, `adresse`, `ville`, `code_postal`, `mail`, `numero_tel`) VALUES
(1, 'Gallimard Jeunesse', '12345678912345', '123 rue des cerises', 'Pau', '64000', 'galimard@biblio.fr', '0504030201');

-- --------------------------------------------------------

--
-- Structure de la table `editeur_livre`
--

DROP TABLE IF EXISTS `editeur_livre`;
CREATE TABLE IF NOT EXISTS `editeur_livre` (
  `id_editeur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `nb_exemplaire` int(11) NOT NULL,
  `date` datetime NOT NULL,
  KEY `id_editeur` (`id_editeur`),
  KEY `id_livre_editeur` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
(1, 'Neuf'),
(2, 'Bon'),
(3, 'Moyen'),
(4, 'Détérioré');

-- --------------------------------------------------------

--
-- Structure de la table `etat_livre`
--

DROP TABLE IF EXISTS `etat_livre`;
CREATE TABLE IF NOT EXISTS `etat_livre` (
  `id_livre` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  KEY `id_etat` (`id_etat`),
  KEY `id_livre` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_livre`
--

INSERT INTO `etat_livre` (`id_livre`, `id_etat`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_ISBN` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `illustration` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `resume` longtext CHARACTER SET utf8mb4 NOT NULL,
  `prix` double NOT NULL,
  `nb_pages` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `num_ISBN`, `titre`, `illustration`, `resume`, `prix`, `nb_pages`, `date_achat`, `disponibilite`) VALUES
(1, '123-456-789', 'Harry potter 2', 'illustration2.jpg', 'Lor&eacute;m Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19.99, 433, '2022-01-30', 0),
(2, '894-321-654', 'Harry potter 3', 'illustration3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum hsages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 14.99, 422, '2022-01-18', 0),
(3, '123-789-456', 'Harry potter 4', 'illustration4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16.99, 322, '2022-01-31', 0),
(4, '321-456-987', 'Harry Potter 1, l\'école des sorciers', 'hp1.png', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 29.99, 350, '2022-02-01', 0),
(5, '321-456-987', 'Harry potter 5', 'hp5.png', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 49.99, 200, '2022-02-07', 0),
(6, '987-321-456', 'Harry Potter 6', 'hp6.png', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 19.99, 425, '2022-02-08', 0),
(7, '654-789-321', 'Harry Potter 7 (partie1)', 'hp7.png', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 9.99, 300, '2022-02-09', 0),
(8, '654-321-789', 'Harry Potter (partie 2)', 'hp7.2.png', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 12.99, 700, '2022-02-03', 0),
(9, '123-321-456', 'Harry Potter 8', 'hp8.png', 'Blablabla', 19.54, 300, '2022-02-01', 0),
(10, '123-321-456', 'Harry Potter 8', 'hp8.png', 'Blablabla', 19.54, 300, '2022-02-01', 0),
(14, '1111111', '1111111', 'avatar_3.png', '1111111111', 11, 11, '2022-02-15', 0),
(15, '111-222-333', 'Bonjour', 'user5.png', '&lt;h1&gt;CKEDITOR&lt;/h1&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;CKEDITOR&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;strong&gt;1&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;2&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;3&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 1.99, 6, '2022-02-23', 0),
(16, '999-888-777', 'Allo le monde', 'avatar_3.png', '&lt;p&gt;grethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyjgrethetryjtyj&lt;/p&gt;', 0.99, 2, '2022-02-18', 0),
(17, '222-555-888', 'Hello world', 'user1.png', '<p>gzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregzgzregz</p>\r\n', 2.99, 1, '2022-03-11', 0),
(18, '444-555-667', 'DemoCat', 'exo2.png', '&lt;p&gt;AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA&lt;/p&gt;', 1.99, 8, '2022-02-10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usager` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `etat_debut` int(11) NOT NULL,
  `etat_retour` int(11) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_livre_location` (`id_livre`),
  KEY `id_usager_location` (`id_usager`),
  KEY `id_etat_avant` (`etat_debut`),
  KEY `id_etat_apres` (`etat_retour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Admin'),
(2, 'Salarié');

-- --------------------------------------------------------

--
-- Structure de la table `role_utilisateur`
--

DROP TABLE IF EXISTS `role_utilisateur`;
CREATE TABLE IF NOT EXISTS `role_utilisateur` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  KEY `id_role` (`id_role`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role_utilisateur`
--

INSERT INTO `role_utilisateur` (`id_role`, `id_utilisateur`) VALUES
(1, 1),
(2, 2),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf32 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf32 NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf32 NOT NULL,
  `ville` varchar(255) CHARACTER SET utf32 NOT NULL,
  `code_postal` varchar(5) CHARACTER SET utf32 NOT NULL,
  `mail` varchar(255) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `mail`) VALUES
(1, 'Bernard', 'Michel', '147 avenue des pantins', 'Dax', '40100', 'usager1@biblio.fr'),
(2, 'Arnaud', 'Stéphane', '123 rue des lillas', 'Bayonne', '64100', 'usager2@biblio.fr'),
(3, 'Bukowski', 'Charles', '143 rue des cordon bleu', 'Bayonne', '64100', 'usager3@biblio.fr'),
(4, 'Sanchez', 'Mathieu', '123 Rue des lillas', 'Dax', '40100', 'demo@biblio.fr'),
(5, 'Sanchez1', 'Mathieu1', '123 Avenue des cordon bleu', 'Dax', '40100', 'mail@mail.fr'),
(6, 'Sanchez1', 'Mathieu1', '123 Avenue des cordon bleu', 'Dax', '40100', 'mail@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `num_telephone` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `mail`, `mot_de_passe`, `num_telephone`, `avatar`, `adresse`, `ville`, `code_postal`) VALUES
(1, 'Jean-michel', 'bliblibli', 'JM-Does', 'jm-does@hotmail.fr', '$2y$10$qgAVLUXlFl/IWBr5mV9OYubSxppqR0yAWs4XCKb6ng2EjoYtlAzcC', '0506070809', 'user1.png', '123 rue des lillas', 'Dax', '40100'),
(2, 'Bliblibli', 'bliblibli', 'Patricia-BerBer', 'BerBer@gmail.com', '$2y$10$DEmOUwzFQBEYpMshLAvXQO25CCMyy.bA3G0ewhp4VT5oRtSe0yLAq', '0605040302', 'user2.png', '147 rue du cordon bleu', 'Monaco', '99138'),
(3, 'Bliblibli', 'bliblibli', 'admin', 'admin@bibliotheque.fr', '$2y$10$udC/ykKMfbo/.Gh9bawkKOZMNWydzyVzTgsXztVJFcKwGxwfQ7f26', '0102030405', 'user3.png', '159 Avenue de Flanbolo', 'Bayonne', '64100'),
(10, 'Bliblibli', 'bliblibli', 'blabla', 'blabla@blabla.Fr', '$2y$10$saTWXJKq5LCkUvAvTLAs0e0ijg.NeLcIf0841mV0L6CK43FArhvoq', '0502010304', 'user3.png', 'blablablabla', 'blabla', '40100'),
(11, 'Bliblibli', 'bliblibli', 'blabla', 'blabla@blabla.Fr', '$2y$10$saTWXJKq5LCkUvAvTLAs0e0ijg.NeLcIf0841mV0L6CK43FArhvoq', '0502010304', 'user3.png', 'blablablabla', 'blabla', '40100'),
(12, 'ezez', 'ezeze', 'zazzz', 'aaa@aaa.fr', '$2y$10$saTWXJKq5LCkUvAvTLAs0e0ijg.NeLcIf0841mV0L6CK43FArhvoq', '0102030405', 'aaa.png', '123 rue du petit', 'Dax', '40100'),
(13, 'aaaaaaaaaaaaaaaaaaaaa', 'abbbbbbbbbbbbbbbbbb', 'cccccccccccccccccccccccccc', 'cdddd@ddd.fr', '$2y$10$5NVoDADftdiHrt4WdKM8qeXk5HHKRQe1fZbWhWXqI8wl2e/tIrG1.', '0102030405', 'user6.png', '123 rue des patates', 'dax', '44010');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_action`
--

DROP TABLE IF EXISTS `utilisateur_action`;
CREATE TABLE IF NOT EXISTS `utilisateur_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utillisateur` int(11) NOT NULL,
  `id_usager` int(11) DEFAULT NULL,
  `id_livre` int(11) DEFAULT NULL,
  `id_contact` int(11) DEFAULT NULL,
  `id_editeur` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_etat` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  `id_location` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usager_action` (`id_usager`),
  KEY `id_contact_action` (`id_contact`),
  KEY `id_editeur_action` (`id_editeur`),
  KEY `id_auteur_action` (`id_auteur`),
  KEY `id_livre_action_user` (`id_livre`),
  KEY `id_cat_action` (`id_categorie`),
  KEY `id_etat_action` (`id_etat`),
  KEY `id_location_action` (`id_location`),
  KEY `id_role_action` (`id_role`),
  KEY `id_action_action` (`id_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur_livre`
--
ALTER TABLE `auteur_livre`
  ADD CONSTRAINT `id_auteur` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `id_livre_auteur` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `categorie_livre`
--
ALTER TABLE `categorie_livre`
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `id_livre_categorie` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `editeur_livre`
--
ALTER TABLE `editeur_livre`
  ADD CONSTRAINT `id_editeur` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id`),
  ADD CONSTRAINT `id_livre_editeur` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `etat_livre`
--
ALTER TABLE `etat_livre`
  ADD CONSTRAINT `id_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `id_etat_apres` FOREIGN KEY (`etat_retour`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_etat_avant` FOREIGN KEY (`etat_debut`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre_location` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `id_usager_location` FOREIGN KEY (`id_usager`) REFERENCES `usager` (`id`);

--
-- Contraintes pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur_action`
--
ALTER TABLE `utilisateur_action`
  ADD CONSTRAINT `id_action_action` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`),
  ADD CONSTRAINT `id_auteur_action` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `id_cat_action` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `id_editeur_action` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id`),
  ADD CONSTRAINT `id_etat_action` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre_action_user` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `id_location_action` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `id_role_action` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `id_usager_action` FOREIGN KEY (`id_usager`) REFERENCES `usager` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
