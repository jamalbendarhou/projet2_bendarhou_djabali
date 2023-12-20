-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 20:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom2_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `street_nb` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `zipcode` varchar(6) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `street_name`, `street_nb`, `city`, `province`, `zipcode`, `country`) VALUES
(1, '123 Main Street', 10, 'Montreal', 'Quebec', 'h3r2t4', 'Canada'),
(2, '123 Main Street', 10, 'Montreal', 'Quebec', 'h3r2t4', 'Canada'),
(3, '456 Elm Street', 20, 'Montreal', 'Quebec', 'h1h2h3', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `order_has_product`
--

CREATE TABLE `order_has_product` (
  `user_order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qtty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `qtty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `qtty`, `price`, `url_img`, `description`) VALUES
(1, 'Honda CRF450RS', 2, 12000, 'mm2.jpg', 'Description du produit 2 pour les motos.'),
(2, 'Suzuki GSXR600Z', 10, 14000, 'mm3.jpg', 'Description du produit 3 pour les motos.'),
(3, 'Suzuki GSX-S1000GTA', 10, 18000, 'mm4.jpg', 'Description du produit 4 pour les motos.'),
(4, 'Suzuki C50 Boulevard VL800', 10, 18950, 'mm5.jpg', 'Description du produit 5 pour les motos.'),
(5, 'Suzuki SV650 ABS', 10, 10050, 'mm6.jpg', 'Description du produit 6 pour les motos.'),
(7, 'Piaggio Piaggio 1 Active Euro 5 Arctic M', 10, 5000, 'ss2.jpg', 'Description du produit 2 pour les Scooters.'),
(8, 'Piaggio Liberty 50 Euro 5 Bianco Luna', 10, 4500, 'ss3.jpg', 'Description du produit 3 pour les Scooters.'),
(9, 'Piaggio Liberty 50 S Euro 5 Grigio Mater', 10, 3500, 'ss4.jpg', 'Description du produit 4 pour les Scooters.'),
(10, 'Piaggio Liberty 50 S Euro 5 Marrone Terr', 10, 3500, 'ss5.jpg', 'Description du produit 5 pour les Scooters.'),
(11, 'Piaggio Liberty 50 Euro 5 Rosso Atlas', 10, 3500, 'ss6.jpg', 'Description du produit 6 pour les Scooters.'),
(12, 'CFORCE 600 TOURING', 10, 11000, 'qq1.jpg', 'Description du produit 1 pour les Quads.'),
(13, 'CFORCE 1000 EPS LX', 10, 12000, 'qq2.jpg', 'Description du produit 2 pour les Quads.'),
(14, 'CFORCE 800 XC CLASSIC', 10, 12900, 'qq3.jpg', 'Description du produit 3 pour les Quads.'),
(15, 'CFORCE 400 EPS LX', 10, 8000, 'qq4.jpg', 'Description du produit 4 pour les Quads.'),
(16, 'CFORCE 800 XC EPS LX', 10, 13000, 'qq5.jpg', 'Description du produit 5 pour les Quads.'),
(17, 'ZFORCE 950 SPORT', 10, 22000, 'qq6.jpg', 'Description du produit 6 pour les Quads.'),
(19, 'Suzuki DR650SE', 15, 7600, 'mm1.jpg', 'Description du produit 1 pour les motos.');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'description super admin'),
(2, 'admin', 'description admin'),
(3, 'client', 'description client');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `billing_address_id` bigint(20) NOT NULL,
  `shipping_address_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `token`, `username`, `fname`, `lname`, `pwd`, `billing_address_id`, `shipping_address_id`, `role_id`) VALUES
(1, 'test@test.ca', 'random_token_generated_here', 'test', 'test', 'test', '$2y$10$VuQgD2eDSD3PO.Zv/Kj5Q.R.BKO8o3gVK7OUWMS6eZKRpy3Fv.vKe', 1, 1, 3),
(2, 'test1@test.ca', 'random_token_generated_here', 'test1', 'test1', 'test1', '$2y$10$ZQBIRyGeENBLKjwy/86ihO8Yj5N09s5fsWgYTQ62Zq55D2QADSzsC', 1, 1, 3),
(3, 'admin@admin.ca', 'random_token_generated_here', 'admin', 'admin', 'admin', '$2y$10$CDLxr8eAtpsru5OubSIsIeDssbUnXxIM16Zp1biQFBV0BzRt8t63i', 1, 1, 1),
(4, 'djabali@yacine.ca', 'random_token_generated_here', 'yacine', 'yacine', 'yacine', '$2y$10$7.HkNrsVDk0HzX.RokQvae8bfNg08YQVqzwL7MA/rzJyMnbVKI3ia', 1, 1, 3),
(5, 'testtest@test.ca', 'random_token_generated_here', 'ronaldo', 'test5', 'test5', '$2y$10$ZnMJr0gYAZAfaicvsptUCe0kexuAv9nXlYGph2pV1GUJF2RQUuzvm', 1, 1, 3),
(6, 'salim@gmail.ca', 'random_token_generated_here', 'salim', 'salim', 'salim', '$2y$10$JHJNNujz1bRccAyGc/7aVOdHx1HQSOjMr5yZ/RxeiQ01jJ839iCGO', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_order`
--

CREATE TABLE `user_order` (
  `id` bigint(20) NOT NULL,
  `ref` varchar(40) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD PRIMARY KEY (`user_order_id`,`product_id`),
  ADD KEY `lkmlk` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`role_id`),
  ADD KEY `hdfbv` (`shipping_address_id`),
  ADD KEY `oekfekf` (`billing_address_id`);

--
-- Index pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userorder` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_order` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_billing_address` FOREIGN KEY (`billing_address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_shipping_address` FOREIGN KEY (`shipping_address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
