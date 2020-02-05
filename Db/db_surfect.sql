-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2020 às 23:40
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_surfect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(10) NOT NULL,
  `address_name` varchar(65) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `district` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `addresses`
--

INSERT INTO `addresses` (`address_id`, `address_name`, `zip_code`, `district`, `email`, `country`) VALUES
(1, 'Exemplo 1', '1111-111', 'Leiria', 'ruifmiguel@hotmail.com', 'Portugal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(65) NOT NULL,
  `admin_password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 'miguelmendonca@hotmail.com', NULL),
('admin', 'ruifmiguel@hotmail.com', NULL),
('costumer', 'asswd@hotmail.com', 1579215340);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin has all options', NULL, NULL, NULL, NULL),
('costumer', 1, 'costumer has some options', NULL, NULL, NULL, NULL),
('create.category', 1, 'allows to create a category', NULL, NULL, NULL, NULL),
('create.purchase', 1, 'allows user to create a purchase', NULL, NULL, NULL, NULL),
('create.user', 1, 'allow a user to create another user', NULL, NULL, NULL, NULL),
('guest', 1, 'user without account/ not authenticated', NULL, NULL, NULL, NULL),
('manage_products', 1, 'allows the creation, update or deletion of products', NULL, NULL, NULL, NULL),
('update.user', 1, 'allows to update user info', NULL, NULL, NULL, NULL),
('view.user', 1, 'allows to view user info', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'costumer'),
('admin', 'create.category'),
('admin', 'create.purchase'),
('admin', 'create.user'),
('admin', 'manage_products'),
('admin', 'update.user'),
('costumer', 'create.purchase'),
('costumer', 'update.user'),
('costumer', 'view.user'),
('guest', 'create.user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Surf'),
(2, 'Roupa'),
(3, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1572945901),
('m130524_201442_init', 1572945903),
('m140506_102106_rbac_init', 1574699193),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1574699194),
('m180523_151638_rbac_updates_indexes_without_prefix', 1574699195),
('m190124_110200_add_verification_token_column_to_user_table', 1572945904);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL,
  `photos` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payments`
--

INSERT INTO `payments` (`payment_id`, `name`, `photos`) VALUES
(1, 'Referência Multibanco', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `discount` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `description`, `discount`, `category_id`, `photo`) VALUES
(1, 'QUIKSILVER 3/2mm Highline Lite‑Zipperless Wetsuit for Men', 299, 50, '3/2mm Highline Lite - Zipperless Wetsuit for Men - F\'n LITE x2 is our latest and greatest upgrade in next-level neoprene, featuring a new surface texture for the fastest ever drying time between sessions, designed to keep you surfing more, in maximum comfort.', 0, 1, 'fatoqs1.jpg'),
(2, 'QUIKSILVER 3/2mm Highline Lite‑Zipperless Wetsuit for Men', 299, 50, '3/2mm Highline Lite - Zipperless Wetsuit for Men 1F\'n LITE x2 is our latest and greatest upgrade in next-level neoprene, featuring a new surface texture for the fastest ever drying time between sessions, designed to keep you surfing more, in maximum comfort. ', 0, 1, 'fatoqs2.jpg'),
(3, 'QUIKSILVER 5/4/3mm Syncro‑Chest Zip GBS Wetsuit for Men', 229, 50, '- 100% StretchFlight x2 limestone-derived neoprene - warm, light & flexible,\r\n- Vapor Stretch on chest and back panels - retains heat and blocks wind,\r\n- WarmFlight® x1 Far-Infrared thermal lining on back panel transforms body heat into infrared energy to generate & maintain warmth...', 0, 1, 'fatoqs3.jpg'),
(4, 'QUIKSILVER 5/4/3mm Syncro Plus - Chest Zip Wetsuit for Men', 299, 50, '- 100% StretchFlight x2 limestone-derived neoprene - warm, light & flexible\r\n- Vapor Stretch on chest and back panels - retains heat and blocks wind\r\n- WarmFlight® x1 Far-Infrared thermal lining on chest & back panel transforms body heat into infrared energy to generate & maintain warmth...', 0, 1, 'fatoqs4.jpg'),
(5, 'QUIKSILVER 4/3mm Highline Ltd Monochrome - Chest Zip Wetsuit for Men', 329, 50, '- 100% StretchFlight x3 neoprene - warm, ultra-light & flexible\r\n- WarmFlight® thermal fleece lining on body, legs and arms keeps body heat in and water out\r\n- GBS (glued and blind stitched) seams for maximum flexibility and minimal water entry...\r\n', 0, 1, 'fatoqs5.jpg'),
(6, 'RIP CURL E Bomb Zip Free 2/2 Short Sleeve - Wetsuit', 209, 50, 'The new EBOMB PRO ZIP FREE Wetsuit Now with E6 Thermoflex. It is the Ultimate super stretch wetsuit. The EBOMB zip free is inspired by high performance surfing with the least restriction possible. This year we\'ve introduced two innovations in one.', 0, 1, 'fatorc1.jpg'),
(7, 'RIP CURL Aggrolite 2mm Back Zip - Wetsuit', 109, 50, 'The Aggrolite offers performance and durability at a great value. This wetsuit has many of the high end features you will find in our Ultimate wetsuits. We use a combination of E5 in the arms and E4 neoprene in the body.', 0, 1, 'fatorc2.jpg'),
(8, 'RIP CURL E Bomb 3/2 Zip Free Wetsuit', 289, 50, 'The ultimate high performance wetsuit. Featuring Rip Curl\'s latest E6 neoprene with Thermo Lining through out the entire suit and combined with newest zip free entry system for maximum paddling freedom and water seal.', 0, 1, 'fatorc3.jpg'),
(9, 'RIP CURL E Bomb 3/2 Zip Free Wetsuit\r\n', 289, 50, 'The new EBOMB PRO ZIP FREE Wetsuit Now with E6 Thermoflex. It is the Ultimate super stretch wetsuit. The EBOMB zip free is inspired by high performance surfing with the least restriction possible. This year we\'ve introduced two innovations in one.', 0, 1, 'fatorc4.jpg'),
(10, 'RIP CURL E Bomb 4/3 Zip Free Wetsuit', 299, 50, 'The ultimate high performance wetsuit. Featuring Rip Curl\'s latest E6 neoprene with Thermo Lining through out the entire suit and combined with newest zip free entry system for maximum paddling freedom and water seal.', 0, 1, 'fatorc5.jpg'),
(11, 'ROXY 5/4/3mm Performance - Hooded Chest Zip Wetsuit', 429, 50, 'Our Performance 5/4/3 women\'s hooded wetsuit is the cold water armour you\'ve been waiting for. F\'n LITE neoprene comes packed with air cells so the cold won\'t have a chance. The WF® thermal lining on the chest, back, arms and legs, retains body heat by using Far Infrared tech to reflect heat back into your wettie.', 0, 1, 'fatoroxy1.jpg'),
(12, 'ROXY 5/4/3mm Syncro Plus - Hooded Chest Zip Wetsuit', 299, 50, '- F\'n LITE neoprene made with air cell-rich limestone for lightweight warmth\r\n- Thermal Smoothie on chest and back panels, retains heat and blocks wind\r\n- WF® Far-Infrared thermal lining on chest and back, transforming body heat into infrared energy to generate warmth\r\n', 0, 1, 'fatoroxy2.jpg'),
(13, 'ROXY 5/4/3mm Syncro Series - Hooded Chest Zip GBS Wetsuit', 279, 50, '- F\'n LITE neoprene made with air cell-rich limestone for lightweight warmth\r\n- Thermal Smoothie on back panel - retains heat and blocks wind\r\n- WarmFlight® x1 Far-Infrared thermal lining transforms body heat into infrared energy to generate & maintain warmth', 0, 1, 'fatoroxy3.jpg'),
(14, 'ROXY 5/4/3mm Syncro - Chest Zip GBS Wetsuit for Women', 259, 50, '- 100% StretchFlight x2 limestone-derived neoprene - warm, light & flexible\r\n- Vapor Stretch on chest and back panel - captures sun and retains heat\r\n- WarmFlight® x1 Far-Infrared thermal lining on back panel transforms body heat into infrared energy to generate & maintain warmth', 0, 1, 'fatoroxy4.jpg'),
(15, 'ROXY 2/2mm Syncro - Long Sleeve Back Zip FLT Springsuit for Women', 87, 50, '- 100% StretchFlight x2 limestone-derived neoprene - warm, light & flexible\r\n- Flatlock stitched seams - soft, flexible and durable\r\n- Back zip entry system with YKK® #10 plastic zip\r\n- Hydrowrap completely adjustable neck closure system for a watertight seal', 0, 1, 'fatoroxy5.jpg'),
(16, 'BILLABONG 2mm Salty Dayz Long Sleeve Springsuit', 109, 50, 'Protect yourself from the morning chill, mid-day sun and “basic” style with the custom Salty Dayz Long Sleeve Springsuit. The Surf Capsule Collection long sleeve spring suit combines cheeky swimwear lines and curated prints with the functionality and warmth of a wetsuit.', 0, 1, 'fatobb1.jpg'),
(17, 'BILLABONG 2mm Salty Jane Sleeveless Fullsuit', 135, 50, 'Free your arms and your spirit with a womens Long John style wetsuit, finished off with a retro center front zip. Part of the Billabong Surf Capsule Collection, the colorblocked Salty Jane wetsuit brings together modern functionality and vintage lines. Made from 2mm premium stretch neoprene.', 0, 1, 'fatobb2.jpg'),
(18, 'BILLABONG 3/2 Furnace Comp Chest Zip Fullsuit', 299, 50, 'The Furnace Comp Series delivers on performance-driven premium heat and innovative technology with superior value. Equipped with a Furnace Carbon lining and lightweight foam core, this performance-minded women’s fullsuit delivers everything you need in a featherweight package.', 0, 1, 'fatobb3.jpg'),
(19, 'BILLABONG 4/3 Synergy Chest Zip Fullsuit', 189, 50, 'The Billabong Synergy Series delivers, premium heat and innovative technology with superior value. The Synergy now features Billabong exclusive Graphene lining at the front and back panels. Graphene is 50% lighter than traditional hollow fiber liners and the most heat conductive material on the planet.', 0, 1, 'fatobb4.jpg'),
(20, 'BILLABONG 4/3 Salty Dayz Fullsuit', 249, 50, 'Stand out in the line-up with signature style and progressive performance. Equipped with Billabong wetsuit technology, triple glued and blind stitched seams and a chest zip, the Billabong Surf Capsule Salty Dayz is your essential performance wetsuit, customized with prints from the \'19 Surf CC.', 0, 1, 'fatobb5.jpg'),
(28, 'TORQ LONGBOARD 8\'6 - COLOUR PINLINE', 485, 10, 'ShortBoard', 0, 1, 'prd_28.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `address_id` int(10) NOT NULL,
  `email` varchar(65) NOT NULL,
  `payment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_date`, `address_id`, `email`, `payment_id`) VALUES
(1, '2019-11-08', 1, 'ruifmiguel@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_id` int(10) NOT NULL,
  `email` varchar(65) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `subtotal` decimal(7,2) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_produto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(65) NOT NULL,
  `surname` varchar(65) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` decimal(7,2) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `name`, `surname`, `birth_date`, `gender`, `phone_number`, `height`, `weight`, `photo`) VALUES
('', 'Aaaaaaa322', NULL, 'aaaa@aaaa.aaa', 10, 0, 0, NULL, 'aAA', 'AAA', '2020/1/8', 'M', '966666666', NULL, NULL, NULL),
('-3fbqhy_0zXHDdmnK8n-9EMGV9VYgOUc', '$2y$13$kI4SD23tAcq4ygVGkxp.ou/TLS1k9fbUG6D2Om2IIR9TbzPLB6EyS', NULL, 'asswd@hotmail.com', 10, 1579215114, 1579215114, '4sW7-6CYZZV4rsxLG3gl6XAHzLbKn0tm_1579215114', 'asdasd', 'asfgvs', '2020-01-23', 'M', '165-541-653', NULL, NULL, NULL),
('', '12345Gui', NULL, 'gmcrbrito@gmail.com', 10, 0, 0, NULL, 'Guilherme', 'Brito', '2000/11/22', 'M', '960110757', NULL, NULL, NULL),
('60T1z7FJbqOqDTozTb6i7CA42ET46K5X', '$2y$13$gXivA8QPoj9nHL.wThMj0O.Gwjk4zil/7UwbPv2D5yLYnXOendzoa', NULL, 'ruifmiguel@hotmail.com', 10, 1572946478, 1572946478, 'Hg1ynpDVxQ-4Ci5wvFRYiASzDrTaVDmy_1572946478', 'Rui', 'Miguel', '1999-02-17', 'M', '911-011-894', 177, '72.00', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `email` (`email`);

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices para tabela `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `adress_id` (`address_id`),
  ADD KEY `email` (`email`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Índices para tabela `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `email` (`email`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Limitadores para a tabela `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`);

--
-- Limitadores para a tabela `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`),
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `purchase_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Limitadores para a tabela `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
