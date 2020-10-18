-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 18 oct. 2020 à 12:35
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre_article` varchar(500) NOT NULL,
  `contenu_article` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `id_auteur` int(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre_article`, `contenu_article`, `image`, `date`, `id_categories`, `id_auteur`, `status`) VALUES
(162, 'Lorem ipsum dolor sit amet, consectetur ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.\r\n\r\nMorbi risus nisl, pretium vitae suscipit a, aliquet id arcu. Praesent faucibus enim eget lorem fermentum, ut commodo velit ullamcorper. Aenean non condimentum tellus. Nunc cursus accumsan enim, id tincidunt ex dignissim eget. Proin ac mi congue, aliquet orci ut, blandit quam. Nunc viverra nisl quis justo scelerisque, ac malesuada massa mollis. Curabitur at purus mauris.\r\n\r\nPellentesque mollis commodo justo. Vivamus vitae ipsum eu risus condimentum tincidunt. Integer tempor gravida est vitae bibendum. Morbi a odio ut nisi rutrum blandit in id neque. Ut dignissim orci ut libero tempor interdum. Cras quis nibh tempus, condimentum ipsum sit amet, porta lacus. Donec id erat eget lacus feugiat lacinia ut auctor risus. Nunc viverra gravida lorem id facilisis. Aliquam finibus ante a nunc ornare viverra. Vivamus euismod lectus elit, ut tempus ipsum fringilla sit amet. In hac habitasse platea dictumst. Praesent volutpat libero dolor, a ultricies lorem facilisis sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sollicitudin ut augue sit amet lacinia. Mauris cursus sem nec fermentum porttitor.\r\n\r\nSed ut nisl tortor. Nullam eu egestas tellus. Nunc blandit lacus viverra, tincidunt turpis non, laoreet urna. Nunc vehicula, felis ac volutpat fermentum, velit sapien bibendum odio, at egestas justo magna nec ante. Duis quis urna non odio convallis tempor. Praesent vitae sapien et est tristique dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed interdum, massa at molestie cursus, ante turpis rutrum magna, sit amet aliquam mi ligula vitae ligula. Suspendisse potenti. Duis dapibus dui lectus, a ultricies mi aliquam non. Vestibulum pellentesque sapien pretium blandit volutpat. Nam vulputate mi at accumsan placerat. Duis laoreet nunc nec ullamcorper feugiat. Donec ornare erat sit amet dui venenatis, vel lacinia dui pellentesque.\r\n\r\nPhasellus placerat molestie eros, facilisis euismod urna faucibus quis. Aenean luctus dolor a mi bibendum, at tincidunt diam consequat. Etiam consequat, velit a volutpat tempor, ex nisi condimentum justo, et volutpat lorem nisi sit amet risus. Sed gravida feugiat finibus. Nulla facilisi. Donec rhoncus ornare massa, eget efficitur mi rutrum sed. Sed euismod commodo velit et mattis. Maecenas odio est, aliquam vel tincidunt varius, tincidunt eget sem. Praesent eleifend bibendum iaculis. Mauris blandit velit ut ligula posuere auctor. Fusce sit amet suscipit arcu, nec dictum neque. Sed consectetur hendrerit est, accumsan malesuada massa tempor nec. Donec ultrices, leo vel porta efficitur, arcu nisl blandit mi, quis porta arcu elit ut lectus.', 'Casa-del-XVI-hotel-saint-domingue9.jpg', '2020-08-22', 257, 52, 0),
(165, 'Sed gravida feugiat finibus. Nulla facilidsd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.\r\n\r\nMorbi risus nisl, pretium vitae suscipit a, aliquet id arcu. Praesent faucibus enim eget lorem fermentum, ut commodo velit ullamcorper. Aenean non condimentum tellus. Nunc cursus accumsan enim, id tincidunt ex dignissim eget. Proin ac mi congue, aliquet orci ut, blandit quam. Nunc viverra nisl quis justo scelerisque, ac malesuada massa mollis. Curabitur at purus mauris.\r\n\r\nPellentesque mollis commodo justo. Vivamus vitae ipsum eu risus condimentum tincidunt. Integer tempor gravida est vitae bibendum. Morbi a odio ut nisi rutrum blandit in id neque. Ut dignissim orci ut libero tempor interdum. Cras quis nibh tempus, condimentum ipsum sit amet, porta lacus. Donec id erat eget lacus feugiat lacinia ut auctor risus. Nunc viverra gravida lorem id facilisis. Aliquam finibus ante a nunc ornare viverra. Vivamus euismod lectus elit, ut tempus ipsum fringilla sit amet. In hac habitasse platea dictumst. Praesent volutpat libero dolor, a ultricies lorem facilisis sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sollicitudin ut augue sit amet lacinia. Mauris cursus sem nec fermentum porttitor.\r\n\r\nSed ut nisl tortor. Nullam eu egestas tellus. Nunc blandit lacus viverra, tincidunt turpis non, laoreet urna. Nunc vehicula, felis ac volutpat fermentum, velit sapien bibendum odio, at egestas justo magna nec ante. Duis quis urna non odio convallis tempor. Praesent vitae sapien et est tristique dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed interdum, massa at molestie cursus, ante turpis rutrum magna, sit amet aliquam mi ligula vitae ligula. Suspendisse potenti. Duis dapibus dui lectus, a ultricies mi aliquam non. Vestibulum pellentesque sapien pretium blandit volutpat. Nam vulputate mi at accumsan placerat. Duis laoreet nunc nec ullamcorper feugiat. Donec ornare erat sit amet dui venenatis, vel lacinia dui pellentesque.\r\n\r\nPhasellus placerat molestie eros, facilisis euismod urna faucibus quis. Aenean luctus dolor a mi bibendum, at tincidunt diam consequat. Etiam consequat, velit a volutpat tempor, ex nisi condimentum justo, et volutpat lorem nisi sit amet risus. Sed gravida feugiat finibus. Nulla facilisi. Donec rhoncus ornare massa, eget efficitur mi rutrum sed. Sed euismod commodo velit et mattis. Maecenas odio est, aliquam vel tincidunt varius, tincidunt eget sem. Praesent eleifend bibendum iaculis. Mauris blandit velit ut ligula posuere auctor. Fusce sit amet suscipit arcu, nec dictum neque. Sed consectetur hendrerit est, accumsan malesuada massa tempor nec. Donec ultrices, leo vel porta efficitur, arcu nisl blandit mi, quis porta arcu elit ut lectus.', 'PicMonkey-Collage1.jpg1.jpg', '2020-08-22', 258, 56, 0),
(166, 'Morbi egestas placerat auctor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.', 'holi-inde.jpg', '2020-08-22', 258, 56, 0),
(167, 'Morbi egestas placerat auctor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.', 'volkswagen-569315_1280.jpg', '2020-08-22', 257, 52, 0),
(168, 'Morbi egestas placerat auctor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.', 'golden-gate-bridge-388917_1920.jpg', '2020-08-22', 257, 52, 0),
(170, 'Donec molestie tempor convallis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas facilisis ipsum eget magna venenatis semper. Cras aliquet at odio sed vestibulum. Integer vestibulum consectetur interdum. Morbi ac ipsum sit amet leo blandit ultrices a id ipsum. Nam bibendum fringilla consectetur. Curabitur at tortor vitae elit varius mollis sed nec elit. Vestibulum sed dapibus ex, quis bibendum mi. Proin id venenatis orci. Proin scelerisque hendrerit ligula eget elementum. Proin blandit facilisis leo quis scelerisque. Suspendisse eget lobortis nulla. Aenean turpis risus, vehicula ac luctus eu, placerat sit amet nunc. Aliquam faucibus massa nec iaculis imperdiet. Suspendisse ut malesuada eros. Pellentesque erat velit, ullamcorper non magna eget, viverra vestibulum augue. Integer dictum libero nec diam accumsan sollicitudin.\r\n\r\nMorbi egestas placerat auctor. Donec molestie tempor convallis. Phasellus a pharetra orci. Sed rhoncus mi eget luctus viverra. Integer leo ex, faucibus in euismod eu, venenatis id enim. Nam id consequat nulla, et tristique massa. Morbi in elit egestas, vulputate nisi nec, convallis velit. Etiam lacus turpis, vestibulum posuere iaculis feugiat, suscipit vel ante. Integer sollicitudin nec eros sit amet tincidunt. Nulla sed ligula egestas, scelerisque dolor nec, consequat leo. Sed consectetur ultricies ligula nec auctor. Nunc efficitur, dui sed pulvinar ultrices, urna ipsum efficitur purus, vel tempus ex elit a nisi. Integer viverra interdum elit ut scelerisque.', 'paris-4119828_1280.jpg', '2020-08-22', 259, 57, 0),
(179, 'consequat dolor at porta. Aliquam congue varius pulvinar.', 'consequat dolor at porta. Aliquam congue varius pulvinar.', 'Desert.jpg', '2020-09-19', 257, 58, 0);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(65) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `role` tinyint(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `username`, `email`, `password`, `name`, `avatar`, `role`) VALUES
(51, 'lahcen', 'lahcen@gmail.com', '$2y$10$RL8AgBGdF2OcCpysKIJcquzcDks9lIzP7odVRtZWrKhj8y2HA2fzK', 'lahcen', '3.png', 1),
(52, 'sara', 'sara1@gmail.com', '$2y$10$ybCTK4tYDPWGB0./Bc.du.DXLxfSjobB2O.FbP6We62fo6j0BP/ea', 'sara', 'images (2).jpg', 1),
(54, 'kamal', 'kamal@gmail.Com', '$2y$10$MEglBMOP5PzOTWapEurS7.61uVTZmOlfo5sZhcK3M.Hznt.qPyHoq', 'kamal', 'vIqzOHXj.jpg', 2),
(55, 'admin', 'ad@admin.com', '$2y$10$cqMuvK6fDYf2OmLklEuE/Ogu856vfrzZrRzHHlJZ0Sh/JOio03y0C', 'admin', 'ryan.jpg', 2),
(56, 'admin', 'a@admin.com', '$2y$10$ybCTK4tYDPWGB0./Bc.du.DXLxfSjobB2O.FbP6We62fo6j0BP/ea', 'admin', 'Desert.jpg', 1),
(57, 'nabil', 'nabil@gmail.com', '$2y$10$sFP4rCZyM7I9CSrnnfapaeNQuG/AOIlk1mDXUSj6/aCHbrZLHwGRa', 'nabil', 'fyXUlj0e.jpg', 2),
(58, 'admin', 'admin@gmail.com', '$2y$10$SYZrU8uCLStmpEofGmSsiOxO1fiusBQeopXy13C/UM5RaTVgvEetm', 'test', 'images (1).jpg', 1),
(59, 'test0', 'test0@gmail.com', '$2y$10$3rK/uvuaMa8jXP3exron5.3vJnDiUCQcyeMWP9SFaSQuQ7S65MZ3C', 'test1', '6.jpg', 2),
(60, 'test00', 'test00@gmail.com', '$2y$10$1TdvmZ156tUm8Lo/dherwOBAss2Ci24nKJ/OGO0SRKsqJbVDkiXSS', 'test00', '5ad6544317498fd10e7f2f2d_face19.jpg', 2),
(62, ' test10', 'test10@gmail.com', '$2y$10$HxuRlCDyYJ0UwVY3NU3HM.eD08V8Sgxxojp/vx6UkpVXfjIj20pY2', 'test10', 'ryan.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `name`, `image`, `id_auteur`) VALUES
(257, 'FOOD ', 'PicMonkey-Collage1.jpg1.jpg', 51),
(258, 'MATERIEL', 'materiel-photo-video-voyage.jpg', 51),
(259, 'CONSEILS ET BONS PLANS', 'Camping_Lou_Cigalon_La_Couronne_39381-min.jpg', 51),
(262, 'INSPIRATION test', 'Desert.jpg', 58),
(263, 'test  categorie', 'Desert.jpg', 58);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `nickname`, `contenu`, `id_article`) VALUES
(290, 'cdvdv', 'cdcdvdv', NULL),
(291, 'cdc', 'dccdc', NULL),
(292, 'cdc', 'dccdc', NULL),
(293, 'cdc', 'dccdc', NULL),
(308, 'bhfh', 'hhhh', NULL),
(309, 'dsds', 'dsqdsqd', NULL),
(352, 'scdc', 'vfv', 162),
(355, 'test', 'test ', 162),
(357, 'test', 'test comment', 166);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `article_ibfk_1` (`id_auteur`),
  ADD KEY `article_ibfk_2` (`id_categories`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `commentaire_ibfk_1` (`id_article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
