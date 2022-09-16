-- phpMyAdmin SQL Dump


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `e-commerce-symfo`
--

-- DROP database IF EXISTS e-commerce-symfo;
-- Create Database e-commerce-symfo;
use  altrh1730611_12m9mhg;
-- --------------------------------------------------------

--
-- Structure de la table `address`
--
DROP TABLE IF EXISTS address ; 

CREATE TABLE `address` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Structure de la table `carrier`
--
DROP TABLE IF EXISTS carrier ;
CREATE TABLE `carrier` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carrier`
--

INSERT INTO `carrier` (`id`, `name`, `description`, `price`) VALUES
(1, 'Chronopost', 'Livraison standard à domicile en 2 jours ouvrés.', 400),
(2, 'La Poste', 'Si vous préférez trouver dans votre boite à lettres un avis de passage à la place de votre commande.', 190);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--
DROP TABLE IF EXISTS category ;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Manteaux'),
(3, 'Echarpes'),
(4, 'Bonnets'),
(5, 'T-shirts'),
(6, 'Chaussures'),
(7, 'Lunettes'),
(8, 'Chapeaux'),
(9, 'Casquettes');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--
DROP TABLE IF EXISTS doctrine_migration_versions ;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `headers`
--
DROP TABLE IF EXISTS headers ;
CREATE TABLE `headers` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `headers`
--

INSERT INTO `headers` (`id`, `title`, `content`, `btn_title`, `btn_url`, `image`) VALUES
(3, 'Accessoires pour toutes les saisons', 'Laissez vous tenter par nos lunettes, chapeaux aussi bien que nos bonnets ou nos écharpes !', 'Nos articles', '/articles', '2bdbe8484b1ba1c36d19137a2c6b44a314cfdbb8.jpg'),
(4, 'Livraison rapide', 'Profitez de nos services de livraison express, mais aussi de nos retours gratuits ! Essayez, adoptez ou échangez !', 'Je commande', '/articles', '4ba7091fffbc5fa736faa53e65ce7b1d47dd4f8e.jpg'),
(5, 'Chic et élégant', 'Nos derniers articles soldés sur la collection automne', 'Voir', '/articles', 'a92c95e83126727c338110afae40dddb1608e9c4.jpg');

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order` ;

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `carrier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS order_details ;

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `binded_order_id` int NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Structure de la table `product`
--
DROP TABLE IF EXISTS product ;
CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `show_top_vente` int NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `image`, `subtitle`, `description`, `price`, `show_top_vente`) VALUES
(2, 4, 'Bonnet Rouge Pompom', 'bonnet-rouge-pompom', 'e0b7e89b60de57f1e4451fd9831be26a102081e4.jpg', 'Restez au chaud avec style', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', 1800, 0),
(3, 4, 'Bonnet Rouge et Bleu Pompom', 'bonnet-rouge-et-bleu-pompom', '8bf330b14aefcec1ab92b7c3f475290fd7940275.jpg', 'Restez au chaud avec style (encore)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut!', 1600, 0),
(4, 3, 'Echarpe Rouge', 'echarpe-rouge', '9ec1111e99942243bf2157e2fbeaa2aec0a485ac.jpg', 'Pour le ski ou la ville', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', 1400, 0),
(5, 2, 'Manteau chaud', 'manteau-chaud', '5cf449463c611b07451480da81fa048f208fc974.jpg', 'Pour les hivers rudes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit.', 5800, 0),
(6, 5, 'T-shirt Blanc', 't-shirt-blanc', 'ee40d9f7990aead7e8695f2eb4599ea1dbb0b1b1.jpg', 'Simple, basique', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', 1800, 0),
(7, 3, 'Echarpe Rayée', 'echarpe-rayee', '2153f235c1175c595860b612a4d2657402184a04.jpg', 'La classe à Annemasse', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', 1500, 0),
(8, 5, 'T-Shirt Moulant', 't-shirt-moulant', '00a9e824e1a5ba119d9964cc2798fdc3e27b9a84.jpg', 'Pour les bogoss\'', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', 15800, 0),
(9, 7, 'Lunettes new aviator', 'lunettes-new-aviator', '9b63b18c0cde83590b9e36eaaac34092e430712c.jpg', 'Intemporel', 'Lunettes sombres unisexe, printemps, été ou automne.', 2400, 0),
(10, 7, 'Lunettes Wayfarer style', 'lunettes-wayfarer-style', 'dc0f8d0f37e4866c5882c01e0841b7f8b271e49d.jpg', 'Promis ce sont des vraies', 'Souvent imitées, jamais égalées, on a la classe ou ne l\'a pas', 9800, 1),
(11, 9, 'Casquette orange', 'casquette-orange', '242b2cf61210f43c231c6fdec081a554c6757e95.jpg', 'Contre le soleil et le bon gout', 'Superbe casquette orange, il faut aimer le orange.', 400, 1),
(12, 6, 'Chaussures Mike', 'chaussures-mike', '985fc0c43bac9473286fd1f4fabe1d14c21485e7.jpg', 'Mieux que l\'originale', 'Pour faire du skate ou pour rien faire sinon c\'est bien aussi rien faire.', 14900, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
DROP TABLE IF EXISTS user ;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS alert ;
CREATE TABLE `alert` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADRESSE_USER_ID` (`user_id`);

--
-- Index pour la table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ORDER_USER_ID` (`user_id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ORDER_DETAILS_BINDED_ORDER_ID` (`binded_order_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_PRODUCT_CATEGORY_ID` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_USER_ID_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `carrier`
--
ALTER TABLE `carrier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_ADDRESS_ID_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_ORDER_ID_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_ORDER_DETAILS_ID_ORDER_ID` FOREIGN KEY (`binded_order_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY_ID` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

