-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 juin 2020 à 17:14
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(142, 'fahad_altaie', '$2y$10$lli6SEfzr5zpuR4fznzxwu66b0nMRVXJLRIGe7/fp01KRpXbG2nkG'),
(144, 'fahad_altaiedfasdf', '$2y$10$jFNWgJknLwnmCRi.q68KBeeqtzRokhXMnk5H.8Y2uJWnQfis7o9d6'),
(147, 'fahad', '$2y$10$dMJq7UPq3YmeLQnWTCHLQu1Q/nrSo4C05YM/Rye2v3fG5P8nwcoP.'),
(152, 'ahmed', '$2y$10$dR6ZPl.z.ffTt6MDsJTNkOEqDYgjsTqUDfHebPeZHTQNYUfa6JkHK'),
(160, 'fahad_altaieasfasf', '$2y$10$g3A6AwRJjypCmHwTlzZw.uKhMt8F.CR44/sd7ZLv5CCMoU7FCdpH.'),
(161, 'test', '$2y$10$yduroHHON6bwI6PgCyyaleGX9k0T7P1SPIb5ai6OGYaNjxFh.m7P.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `snake` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
