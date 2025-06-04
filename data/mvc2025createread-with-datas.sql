-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 19 mai 2025 à 14:29
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.3.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `mvc2025createread`
--
DROP DATABASE IF EXISTS `mvc2025createread`;
CREATE DATABASE IF NOT EXISTS `mvc2025createread` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvc2025createread`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `idarticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `article_title` varchar(120) NOT NULL,
                                         `article_text` text NOT NULL,
                                         `article_date_created` datetime DEFAULT current_timestamp(),
                                         `article_date_published` datetime DEFAULT NULL,
                                         `article_is_published` tinyint(3) UNSIGNED DEFAULT 0,
                                         `user_iduser` mediumint(8) UNSIGNED NOT NULL,
                                         PRIMARY KEY (`idarticle`),
                                         KEY `fk_article_user_idx` (`user_iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `article_title`, `article_text`, `article_date_created`, `article_date_published`, `article_is_published`, `user_iduser`) VALUES
    (1, 'Comprendre le Modèle MVC en PHP : Une Architecture Essentielle pour le Développement Web Moderne', 'Dans le monde du développement web, et particulièrement avec PHP, l\'organisation du code est primordiale pour la maintenabilité, l\'évolutivité et la collaboration. \r\n\r\nL\'un des patrons d\'architecture (design patterns) les plus éprouvés et largement adoptés pour structurer les applications est le Modèle-Vue-Contrôleur, ou MVC. \r\n\r\nComprendre MVC est une étape cruciale pour tout développeur PHP souhaitant créer des applications robustes et bien structurées.\r\n\r\nQu\'est-ce que le Modèle MVC ?\r\nLe modèle MVC est un patron d\'architecture logicielle qui sépare une application en trois composants principaux interconnectés :\r\n\r\nModèle (Model) : Le cerveau de l\'application.\r\n\r\nVue (View) : L\'interface utilisateur.\r\n\r\nContrôleur (Controller) : L\'intermédiaire qui gère les interactions.\r\n\r\nCette séparation des préoccupations (Separation of Concerns) est l\'un des avantages majeurs de MVC. Chaque composant a une responsabilité distincte, ce qui rend le code plus modulaire, plus facile à tester et à maintenir.', '2025-05-19 16:27:20', '2025-05-19 16:28:49', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
                                      `iduser` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `user_login` varchar(50) NOT NULL,
                                      `user_name` varchar(120) NOT NULL,
                                      `user_pwd` varchar(255) NOT NULL,
                                      `user_role` varchar(50) NOT NULL DEFAULT 'admin',
                                      PRIMARY KEY (`iduser`),
                                      UNIQUE KEY `user_login_UNIQUE` (`user_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `user_login`, `user_name`, `user_pwd`, `user_role`) VALUES
                                                                                      (1, 'admin', 'Pitz Michaël', '$2y$10$24YL1yeeW5L9m0K0ZFqsh.YN9tSdW17bXkS1t15QIWfCqOdnNnCgy', 'admin'),
                                                                                      (2, 'modo', 'Sandron Pierre', '$2y$10$4EVJ5I8jCkoCstGM1Vfrieb7su6jg0iZPO06gdsYMWsswD2fmU3yC', 'modo'),
                                                                                      (3, 'user1', 'Sall Magib', '$2y$10$gHe.sGKMS5SU0LWA/HHCMeXBm3hN/Ybfy23zruoa8.rRaqbudExgC', 'redac');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
