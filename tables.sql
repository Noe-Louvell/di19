-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 05 fév. 2020 à 11:51
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


drop table if exists articles;

drop table if exists category;

drop table if exists user;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_cesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--
create table articles
(
    Id              bigint auto_increment
        primary key,
    Titre           varchar(50)  null,
    Description     text         null,
    DateAjout       date         null,
    Auteur          varchar(50)  null,
    ImageRepository varchar(50)  null,
    ImageFileName   varchar(255) null
);


--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
    `id_cat` int(11) NOT NULL,
    `cat_libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
    `id_uti` int(11) NOT NULL,
    `uti_mail` varchar(250) NOT NULL,
    `uti_nom` varchar(50) NOT NULL,
    `uti_prenom` varchar(50) NOT NULL,
    `uti_token` varchar(64) DEFAULT NULL,
    `uti_role` varchar(250) DEFAULT NULL,
    `uti_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `articles`
    ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE category
    ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE user
    ADD PRIMARY KEY (`id_uti`);

--
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
    MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE category
    MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE user
    MODIFY `id_uti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
