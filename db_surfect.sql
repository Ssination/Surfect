-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2019 às 16:40
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
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(65) NOT NULL,
  `admin_password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adresses`
--

CREATE TABLE `adresses` (
  `adress_id` int(10) NOT NULL,
  `adress_name` varchar(65) NOT NULL,
  `city` varchar(65) NOT NULL,
  `zip_code` date NOT NULL,
  `district` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `country_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adresses`
--

INSERT INTO `adresses` (`adress_id`, `adress_name`, `city`, `zip_code`, `district`, `email`, `country_id`) VALUES
(1, 'rua tal', 'alfeizerao', '0000-00-00', 'alfeizerao', 'ruifmiguel@hotmail.com', 119);

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
('admin', 'ruifmiguel@hotmail.com', NULL);

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
('view.store', 1, NULL, NULL, NULL, NULL, NULL),
('view.user', 1, NULL, NULL, NULL, NULL, NULL);

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
('admin', 'create.user'),
('admin', 'manage_products'),
('admin', 'view.user'),
('costumer', 'create.purchase'),
('costumer', 'update.user'),
('costumer', 'view.store'),
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
(1, 'potato'),
(2, 'Elsecundo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) NOT NULL,
  `name_portuguese` varchar(65) NOT NULL,
  `name_english` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`country_id`, `name_portuguese`, `name_english`) VALUES
(1, 'AFEGANISTÃO', 'AFGHANISTAN'),
(2, 'ÁFRICA DO SUL', 'SOUTH AFRICA'),
(3, 'ALBÂNIA', 'ALBANIA'),
(4, 'ALEMANHA', 'GERMANY'),
(5, 'ANDORRA', 'ANDORRA'),
(6, 'ANGOLA', 'ANGOLA'),
(7, 'ARÁBIA SAUDITA', 'SAUDI ARABIA'),
(8, 'ARGÉLIA', 'ALGERIA'),
(9, 'ARGENTINA', 'ARGENTINA'),
(10, 'ARMÉNIA', 'ARMENIA'),
(11, 'AUSTRÁLIA', 'AUSTRALIA'),
(12, 'ÁUSTRIA', 'AUSTRIA'),
(13, 'AZERBAIJÃO', 'AZERBAIJAN'),
(14, 'BAHAMAS', 'BAHAMAS, THE'),
(15, 'BANGLADECHE', 'BANGLADESH'),
(16, 'BARÉM', 'BAHRAIN'),
(17, 'BÉLGICA', 'BELGIUM'),
(18, 'BIELORRÚSSIA', 'BELARUS'),
(19, 'BOLÍVIA', 'BOLIVIA'),
(20, 'BÓSNIA E HERZEGOVINA', 'BOSNIA AND HERZEGOVINA'),
(21, 'BRASIL', 'BRAZIL'),
(22, 'BULGÁRIA', 'BULGARIA'),
(23, 'BURQUINA FASO', 'BURKINA FASO'),
(24, 'CABO VERDE', 'CAPE VERDE'),
(25, 'CAMARÕES', 'CAMEROON'),
(26, 'CAMBOJA', 'CAMBODIA'),
(27, 'CANADÁ', 'CANADA'),
(28, 'CAZAQUISTÃO', 'KAZAKHSTAN'),
(29, 'CHILE', 'CHILE'),
(30, 'CHINA', 'CHINA'),
(31, 'CHIPRE', 'CYPRUS'),
(32, 'COLÔMBIA', 'COLOMBIA'),
(33, 'CONGO', 'CONGO'),
(34, 'COREIA DO NORTE', 'KOREA NORTH'),
(35, 'COREIA DO SUL', 'KOREA SOUTH'),
(36, 'COSTA DO MARFIM', 'IVORY COAST'),
(37, 'COSTA RICA', 'COSTA RICA'),
(38, 'CROÁCIA', 'CROATIA'),
(39, 'CUBA', 'CUBA'),
(40, 'DINAMARCA', 'DENMARK'),
(41, 'EGIPTO', 'EGYPT'),
(42, 'EMIRADOS ÁRABES UNIDOS', 'UNITED ARAB EMIRATES'),
(43, 'EQUADOR', 'ECUADOR'),
(44, 'ESLOVÁQUIA', 'SLOVAKIA'),
(45, 'ESLOVÉNIA', 'SLOVENIA'),
(46, 'ESPANHA', 'SPAIN'),
(47, 'ESTADOS UNIDOS', 'UNITED STATES'),
(48, 'ESTÓNIA', 'ESTONIA'),
(49, 'ETIÓPIA', 'ETHIOPIA'),
(50, 'FIJI', 'FIJI'),
(51, 'FILIPINAS', 'PHILIPPINES'),
(52, 'FINLÂNDIA', 'FINLAND'),
(53, 'FRANÇA', 'FRANCE'),
(54, 'GABÃO', 'GABON'),
(55, 'GÂMBIA', 'GAMBIA'),
(56, 'GANA', 'GHANA'),
(57, 'GEÓRGIA', 'GEORGIA'),
(58, 'GIBRALTAR', 'GIBRALTAR'),
(59, 'GRÉCIA', 'GREECE'),
(60, 'GRONELÂNDIA', 'GREENLAND'),
(61, 'GUATEMALA', 'GUATEMALA'),
(62, 'GUINÉ', 'GUINEA'),
(63, 'GUINÉ-BISSAU', 'GUINEA-BISSAU'),
(64, 'HAITI', 'HAITI'),
(65, 'HONDURAS', 'HONDURAS'),
(66, 'HUNGRIA', 'HUNGARY'),
(67, 'IÉMEN', 'YEMEN'),
(68, 'ILHAS FAROÉ', 'FAROE ISLANDS'),
(69, 'INDONÉSIA', 'INDONESIA'),
(70, 'IRÃO', 'IRAN'),
(71, 'IRAQUE', 'IRAQ'),
(72, 'IRLANDA', 'IRELAND'),
(73, 'ISLÂNDIA', 'ICELAND'),
(74, 'ISRAEL', 'ISRAEL'),
(75, 'ITÁLIA', 'ITALY'),
(76, 'JAMAICA', 'JAMAICA'),
(77, 'JAPÃO', 'JAPAN'),
(78, 'JORDÂNIA', 'JORDAN'),
(79, 'KUWAIT', 'KUWAIT'),
(80, 'LETÓNIA', 'LATVIA'),
(81, 'LÍBANO', 'LEBANON'),
(82, 'LIBÉRIA', 'LIBERIA'),
(83, 'LÍBIA', 'LIBYAN ARAB JAMAHIRIYA'),
(84, 'LICHENSTAINE', 'LIECHTENSTEIN'),
(85, 'LITUÂNIA', 'LITHUANIA'),
(86, 'LUXEMBURGO', 'LUXEMBOURG'),
(87, 'MACAU', 'MACAO'),
(88, 'MACEDÓNIA', 'MACEDONIA'),
(89, 'MADAGÁSCAR', 'MADAGASCAR'),
(90, 'MALÁSIA', 'MALAYSIA'),
(91, 'MALAWI', 'MALAWI'),
(92, 'MALDIVAS', 'MALDIVES'),
(93, 'MALI', 'MALI'),
(94, 'MALTA', 'MALTA'),
(95, 'MARROCOS', 'MOROCCO'),
(96, 'MAURITÂNIA', 'MAURITANIA'),
(97, 'MÉXICO', 'MEXICO'),
(98, 'MIANMAR', 'MYANMAR BURMA'),
(99, 'MOÇAMBIQUE', 'MOZAMBIQUE'),
(100, 'MOLDÁVIA', 'MOLDOVA'),
(101, 'MONGÓLIA', 'MONGOLIA'),
(102, 'MONTENEGRO', 'MONTENEGRO'),
(103, 'NAMÍBIA', 'NAMIBIA'),
(104, 'NEPAL', 'NEPAL'),
(105, 'NICARÁGUA', 'NICARAGUA'),
(106, 'NÍGER', 'NIGER'),
(107, 'NIGÉRIA', 'NIGERIA'),
(108, 'NORUEGA', 'NORWAY'),
(109, 'NOVA ZELÂNDIA', 'NEW ZEALAND'),
(110, 'OMÃ', 'OMAN'),
(111, 'PAÍSES BAIXOS', 'NETHERLANDS'),
(112, 'PANAMÁ', 'PANAMA'),
(113, 'PAPUÁSIA-NOVA GUINÉ', 'PAPUA NEW GUINEA'),
(114, 'PAQUISTÃO', 'PAKISTAN'),
(115, 'PARAGUAI', 'PARAGUAY'),
(116, 'PERU', 'PERU'),
(117, 'POLÓNIA', 'POLAND'),
(118, 'PORTO RICO', 'PUERTO RICO'),
(119, 'PORTUGAL', 'PORTUGAL'),
(120, 'QATAR', 'QATAR'),
(121, 'QUÉNIA', 'KENYA'),
(122, 'REINO UNIDO', 'UNITED KINGDOM'),
(123, 'REPÚBLICA CHECA', 'CZECH REPUBLIC'),
(124, 'REPÚBLICA DOMINICANA', 'DOMINICAN REPUBLIC'),
(125, 'ROMÉNIA', 'ROMANIA'),
(126, 'RUANDA', 'RWANDA'),
(127, 'RÚSSIA', 'RUSSIAN FEDERATION'),
(128, 'SALVADOR', 'EL SALVADOR'),
(129, 'SÃO MARINO', 'SAN MARINO'),
(130, 'SÃO TOMÉ E PRÍNCIPE', 'SAO TOME AND PRINCIPE'),
(131, 'SENEGAL', 'SENEGAL'),
(132, 'SERRA LEOA', 'SIERRA LEONE'),
(133, 'SÉRVIA', 'SERBIA'),
(134, 'SINGAPURA', 'SINGAPORE'),
(135, 'SÍRIA', 'SYRIA'),
(136, 'SOMÁLIA', 'SOMALIA'),
(137, 'SRI LANKA', 'SRI LANKA'),
(138, 'SUDÃO', 'SUDAN'),
(139, 'SUÉCIA', 'SWEDEN'),
(140, 'SUÍÇA', 'SWITZERLAND'),
(141, 'TAILÂNDIA', 'THAILAND'),
(142, 'TAIWAN', 'TAIWAN'),
(143, 'TANZÂNIA', 'TANZANIA'),
(144, 'TIMOR-LESTE', 'TIMOR-LESTE'),
(145, 'TOGO', 'TOGO'),
(146, 'TRINDADE E TOBAGO', 'TRINIDAD AND TOBAGO'),
(147, 'TUNÍSIA', 'TUNISIA'),
(148, 'TURQUIA', 'TURKEY'),
(149, 'UCRÂNIA', 'UKRAINE'),
(150, 'UGANDA', 'UGANDA'),
(151, 'URUGUAI', 'URUGUAY'),
(152, 'VENEZUELA', 'VENEZUELA'),
(153, 'VIETNAME', 'VIETNAM'),
(154, 'ZÂMBIA', 'ZAMBIA'),
(155, 'ZIMBABUÉ', 'ZIMBABWE');

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
(1, 'Cartão', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(10) NOT NULL,
  `photo_source` varchar(65) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `description` varchar(65) NOT NULL,
  `discount` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `description`, `discount`, `category_id`) VALUES
(1, 'Fato 1', '50.00', 200, 'o 1º de muitos', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `adress_id` int(10) NOT NULL,
  `email` varchar(65) NOT NULL,
  `payment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_date`, `adress_id`, `email`, `payment_id`) VALUES
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
  `subtotal` decimal(7,2) NOT NULL
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
('3pZAD7yziSNPfthoi8rJUu5CPi82_gDS', '$2y$13$pkd7uPc1oMMXTq/caUrwHOCvFDkB.WVgpaJq2tUPG84D.z9cDJc06', NULL, 'claclo@gmail.com', 10, 0, 0, 'n_2xykFPHEh6n7aeyI3F3RosVyifbhpA_1575305283', 'fernando', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL),
('V5mt3svm2JBCRAfo6S-k7AFfzEeF5JAD', '$2y$13$ChRJYq8hkrKBqFQ2mSQAWuDeP5VcRXSP5pwUyRlgVIeFmCLaeB06u', NULL, 'daniel@gmail.com', 10, 0, 0, 'XjW9yr-BP0M46zOOI2QXjor4fAqBOxu8_1575316768', 'daniel', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL),
('JOUKlFweZNFxQmU10Be7qeAwPvZh1CH8', '$2y$13$cBMy3Ctfe04yUBs3VHSU7eNhZXorQ8GSCvt7xelf.HU93Ngh6C.US', NULL, 'ferdi@gmail.com', 10, 0, 0, '-5CXmTDGdZJzWrgjRvBX0qDiHyJadvIf_1575305251', 'fernando', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL),
('nB3ahUZLgpYXkRuPvb0UIF351VUgszhg', '$2y$13$fx8uatnYi7g0s0i5eaBZoeIFxds4oyj90fVGNb8edsfvZ5rHOS.dC', NULL, 'miguel@gmail.com', 10, 0, 0, '2lu480mgiy7bBu_fj2Ht2hiA_nzrtvd0_1575303749', '', '', '', 'M', '', NULL, NULL, NULL),
('iizjG6Iq1wZMDKR_410cL0UizTZ-SRlT', '$2y$13$Tx.FGfeH.1kwThNPzYt2/.Buu2QrX2n0VXyzr1KGXHVm6vYITowvS', NULL, 'miguelm@gmail.com', 10, 0, 0, 'nT6BHYiJeZQdaNEb9LLF94mgow0dszuj_1575305178', 'miguel', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL),
('Ppjx-IrQIczovvIQqm-HX3R6-fAq3k6D', '$2y$13$413lxamOVQ1J3371Wxvh4uC67ygn8gBhP5FGUuM2xHZoWrlHAVWjC', NULL, 'miguelmendonca@hotmail.com', 10, 1573548037, 1573548037, 'faD67gsRxdvo0_roUfqCAR-yiCAhWX09_1573548037', 'miguel', 'mendonça', '1900-11-21', 'M', '911-544-645', NULL, NULL, ''),
('ip5LeSf4qR088TQY8um7coHL-rAxvwDN', '$2y$13$8jCxhnjM4Ly6IrOfeGi6iOLGj.3t.30.UU6l0akvNHbdSrClfV9lq', NULL, 'pedro@gmail.com', 10, 0, 0, 'W-GNszB-CZmNIizmvAO01j7HrrAnHH7o_1575388301', 'daniel', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL),
('eLkmMEXe_giQt6TuDJoS6kmtm_l79hz0', '$2y$13$N0TOYeK96i3Q6ToKQ/Ev8ub4xHtlwozGSGwjTQWGzHJxN3Zo1D4uC', NULL, 'pombito@hotmail.com', 9, 1574166911, 1574166911, 'BQgAZ7oiUn2GKnO__ReJI8kut8Zv-VWE_1574166911', 'miguel', 'potata', '2019-10-28', 'F', '165-168-589', NULL, NULL, NULL),
('NgaxseaMoBu12heRmAEdspDDe1JTw3Jj', '$2y$13$Ddk3wuP.iz.LRPCg/5qTvOxVV1VcCMc9Y6i5h5k/sGVHblaVz.4Qe', NULL, 'rui@gmail.com', 10, 0, 0, '6450o65JiiqG2bwxzNKXDQrIMrTRokMY_1575304002', 'claudio', '', '', 'M', '', NULL, NULL, NULL),
('60T1z7FJbqOqDTozTb6i7CA42ET46K5X', '$2y$13$gXivA8QPoj9nHL.wThMj0O.Gwjk4zil/7UwbPv2D5yLYnXOendzoa', NULL, 'ruifmiguel@hotmail.com', 10, 1572946478, 1572946478, 'Hg1ynpDVxQ-4Ci5wvFRYiASzDrTaVDmy_1572946478', 'Rui', 'Miguel', '1999-02-17', 'M', '911-011-894', 177, '72.00', ''),
('GaInjkqnsCJ6tj9LILWjFwg5irfi01vM', '$2y$13$isB3jhsWxm/7FeZ5L1XS9.T8XFu0AIlz9EPRHCBM82oDTfynVHmh2', NULL, 'vitor@gmail.com', 10, 0, 0, '8fy1fdkOw4MGKGRe1TBrfVF11Dz2B9Y2_1575388395', 'daniel', 'mendonca', '1999-07-99', 'M', '914547851', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices para tabela `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adress_id`),
  ADD KEY `email` (`email`),
  ADD KEY `country_id` (`country_id`);

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
-- Índices para tabela `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

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
-- Índices para tabela `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `adress_id` (`adress_id`),
  ADD KEY `email` (`email`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Índices para tabela `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `email` (`email`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `adresses`
--
ALTER TABLE `adresses`
  MODIFY `adress_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `adresses_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

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
-- Limitadores para a tabela `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Limitadores para a tabela `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `adresses` (`adress_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`);

--
-- Limitadores para a tabela `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`),
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
