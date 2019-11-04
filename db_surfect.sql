-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2019 às 12:18
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estrutura da tabela `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL,
  `photos` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `email` varchar(65) NOT NULL,
  `name` varchar(65) NOT NULL,
  `surname` varchar(65) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone_number` int(9) NOT NULL,
  `password` varchar(65) NOT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Índices para tabela `users`
--
ALTER TABLE `users`
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
  MODIFY `adress_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `adresses_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

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
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`);

--
-- Limitadores para a tabela `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`),
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
