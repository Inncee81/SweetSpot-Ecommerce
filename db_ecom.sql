-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 03:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `price`, `created_at`, `user_id`) VALUES
(10, 10, 2, '2.00', '2021-05-11 09:54:18', 1),
(25, 11, 2, '12600.00', '2021-06-18 10:56:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `category_name`, `category_image`, `created_at`) VALUES
(1, 'product', 'Desktops', '431624006994.jpg', '2021-06-18 09:03:14'),
(2, 'product', 'Laptops', '2531624007108.jpg', '2021-06-18 09:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `comment`, `mobile_no`, `email`, `created_at`) VALUES
(5, 'huzaifa ahmed', 'I need some  laptops and cool stuff', '+9123123123', 'huzaifahmed34@gmail.com', '2021-06-18 15:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(11) NOT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `credit` text DEFAULT NULL,
  `about_us` longtext DEFAULT NULL,
  `payment_methods` longtext DEFAULT NULL,
  `delivery_of_goods` longtext DEFAULT NULL,
  `returning_goods` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `terms_of_use` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `contact_no`, `company_code`, `bank_account`, `email`, `credit`, `about_us`, `payment_methods`, `delivery_of_goods`, `returning_goods`, `privacy_policy`, `terms_of_use`) VALUES
(1, '+370 627 0035', '303944367133', 'LT784010051003639596', 'decorbox.lt@gmail.com', 'DECORBOX.LT, Visos teisės saugomos', '<p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;Sveiki užsukę į decorbox - tai įkvėpimo galerija svarbiai dienai. Ar tai būtų gimtadienis, krikštynos, vestuvės, įmonės vakarėlis visuomet stengiamės, jog būtų išskirtinumas ir svečiams paliktų neišdildomą įspūdį.&nbsp;</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Šioje el. parduotuvėje rasite šventinių papuošimų, teminės atributikos ir dekoracijų.<br>Juk šventės puošia mūsų gyvenimą! Tad gerų įspūdžių apsipirkinėjant ir sėkmės rengiant šventę!</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\"><br>DECORBOX.LT komanda.</p>', '<p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\"><span style=\"font-weight: bolder;\">Mes suteikiame Jums galimybę rinktis:</span></p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\"><br>1.&nbsp;<span style=\"font-weight: bolder;\">Apmokėjimas banko pavedimu, kai norite, kad prekes išsiųstume Jūsų pateiktu adresu.</span><br>Įvykdę užsakymą, ekrane pamatysite išankstinio mokėjimo sąskaitą, ją gausite ir elektroniniu paštu. Tada Jums tereiks sąskaita apmokėti. Gavę Jūsų užsakymo apmokėjimą, išsiųsime Jūsų užsakytas prekes kartu su sąskaita faktūra nurodytu adresu. Atsiskaityti galite tik eurais. Atliekant pavedimą, būtinai nurodykite užsakymo numerį.<br><br><span style=\"font-weight: bolder;\">2. Apmokėjimas grynais, kai norite prekes atsiimti mūsų parduotuvėje Alytuje.</span><br>Šiuo atveju Jums tereikia atvykti į mūsų parduotuvę&nbsp;Naujoji g.&nbsp;90 (šalia Maximos, parduotuvėje PAPARTIS), Alytuje ir atsiskaityti už jau užsakytas elektroniniu būdu prekes. Kada galėsite atsiimti prekes, pranešime Jums elektroniniu paštu&nbsp;arba telefonu. Gavus pranešimą, kad užsakymas paruoštas, prekes iš mūsų atsiimti turite per 24 val. Atsiskaityti galite tik eurais ir tik grynais pinigais (deja, kortelių neaptarnaujame).<br><br><span style=\"font-weight: bolder;\">3. Apmokėjimas grynais, kai perkate mūsų parduotuvėje Alytuje.</span><br>Jei atvyksite į mūsų parduotuvę&nbsp; Naujoji g.&nbsp;90 (šalia Maximos,&nbsp; parduotuvėje PAPARTIS), Alytuje, Jums tereiks su savimi turėti grynųjų pinigų (deja, kortelių neaptarnaujame). Savo išsirinktas prekes gausite iš karto.<br><br>Parduotuvė DECORBOX&nbsp;<br>Naujoji g.&nbsp;90 (šalia Maximos, parduotuvėje PAPARTIS)<br><span style=\"font-weight: bolder;\">&nbsp;</span>Darbo laikas: I-V&nbsp; 9:30 - 18:30</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;VI&nbsp;&nbsp; 9:00 - 16:00</p><div style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; VII&nbsp; 9:00 - 14:00</div><div style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\">&nbsp;</div><div style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><br><span style=\"font-weight: bolder;\">Jei nespėjate apsilankyti mūsų darbo metu, visada galite skambinti mums tel. 862700354 ir mes Jus priimsime susitartą valandą.</span></div>', '<p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">Užsisakydami prekes galite rinktis iš šių pristatymo būdų:<br>- perkant internetu ir mokant el. bankininkystę, pristatymo kaina – 2,70 Eur (ši suma bus įtraukta į Jūsų sąskaitą apmokėjimui). Prekės pristatomos ne vėliau kaip per 3 darbo dienas po sąskaitos apmokėjimo.</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;NEMOKAMAI - ATSIIMSIU PATS (pristatome per 3 darbo dienas)</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">Naujoji&nbsp; g. 90 Alytus</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;</p><p style=\"font-family: &quot;Noto Sans SC&quot;, sans-serif; color: rgb(97, 58, 20); text-align: center;\">&nbsp;</p>', '<p><div style=\"text-align: justify;\"><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center; font-size: 1rem;\">Prekių grąžinimas ir keitimas vykdomas vadovaujantis LR ūkio ministro 2001 m. birželio 29 d. įsakymu Nr. 217 patvirtintomis „Daiktų grąžinimo ir keitimo taisyklėmis\" bei ūkio ministro 2001 m. rugpjūčio 17 d. įsakymu Nr. 258 patvirtintomis „Daiktų pardavimo ir paslaugų teikimo, kai sutartys sudaromos naudojant ryšio priemones, taisyklėmis\".</span></div><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">Jei prekė Jums netiko ar nepatiko, praneškite mums per 3 dienas nuo prekės gavimo:</span></div></span><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">-prekės pavadinimas, užsakymo numeris ir data</span></div></span><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">-grąžinimo priežastis</span></div></span><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">-grąžinama prekė turi būti originalioje pakuotėje</span></div></span><span style=\"color: rgb(97, 58, 20); font-family: &quot;Noto Sans SC&quot;, sans-serif; text-align: center;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">-pristatymo išlaidos negrąžinamos.</span></div></span></p>', '<p>Privacy Policy</p>', '<p>Terms Of USe</p>');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `created_at`, `total_amount`) VALUES
(1, 5, 'Waiting', '2021-06-18 12:57:10', '10870.00'),
(2, 5, 'Waiting', '2021-06-18 13:03:26', '0.00'),
(3, 5, 'Waiting', '2021-06-18 13:13:36', '9990.00'),
(4, 5, 'Waiting', '2021-06-18 13:15:53', '7290.00'),
(5, 5, 'Waiting', '2021-06-19 12:03:58', '4570.00'),
(6, 5, 'Waiting', '2021-06-19 12:15:35', '1790.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `amount`, `created_at`) VALUES
(1, 1, 11, 1, '6300.00', '2021-06-18 12:57:10'),
(2, 1, 14, 1, '2130.00', '2021-06-18 12:57:10'),
(3, 1, 15, 1, '2440.00', '2021-06-18 12:57:10'),
(4, 3, 35, 1, '3100.00', '2021-06-18 13:13:36'),
(5, 3, 36, 1, '3400.00', '2021-06-18 13:13:36'),
(6, 3, 37, 1, '3490.00', '2021-06-18 13:13:36'),
(7, 4, 14, 1, '2130.00', '2021-06-18 13:15:53'),
(8, 4, 16, 1, '2720.00', '2021-06-18 13:15:53'),
(9, 4, 15, 1, '2440.00', '2021-06-18 13:15:53'),
(10, 5, 14, 1, '2130.00', '2021-06-19 12:03:58'),
(11, 5, 15, 1, '2440.00', '2021-06-19 12:03:58'),
(12, 6, 12, 1, '1790.00', '2021-06-19 12:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('huzaifaahmed34@gmail.com', '$2y$10$W4kPAzkmlJ0dwDroK4JgSuRDtMSZDpq2Lqp7EqmybubiSdMrF0T2a', '2021-06-14 04:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `product_name`, `qty`, `product_image`, `price`, `category_id`, `subcategory_id`, `description`, `created_at`) VALUES
(11, 'product', 'Desktop PC Horizon Procesor Intel® Core™ i7-10700F 2.9GHz Comet Lake, 16GB RAM, 500GB SSD, GeForce RTX 2060 6GB', 49, '2261624010601.jpg', '6300.00', 1, 2, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i7-10700F Processor (16M Cache, up\r\nto 4.80 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 500GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 2060 6GB GDDR6<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: Aerocool Aero One Frost Black – MiddleTower<o:p></o:p></p>', '2021-06-18 10:03:21'),
(12, 'product', 'Desktop PC Lenovo V50s, Procesor Intel® Core™ i3-10100 3.6GHz Comet Lake, 8GB RAM, 256GB SSD, UHD 630', 59, '4511624016009.jpg', '1790.00', 1, 1, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i3-10100 Processor (6M Cache, up to\r\n4.3 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel UHD 630<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 11:33:29'),
(13, 'product', 'Desktop PC Lenovo IdeaCentre 510A-15ARR, Procesor AMD Ryzen 3 3200G 3.6GHz, 8GB RAM, 256GB SSD, Radeon Vega 8', 50, '2921624016063.jpg', '1890.00', 1, 3, '<p class=\"MsoNormal\">Recommended for: Computer-Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 3 3200G <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon Vega 8<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B50<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p>', '2021-06-18 11:34:23'),
(14, 'product', 'Desktop PC ASUS ExpertCenter X5 MT X500MA, Procesor AMD Ryzen 3 4300G 3.8GHz, 8GB RAM, 512GB SSD, Radeon Graphics', 31, '541624016186.jpg', '2130.00', 1, 4, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD® Ryzen 3 4300G Processor (6M Cache, up to\r\n4.00 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon Graphics<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p>', '2021-06-18 11:36:26'),
(15, 'product', 'Desktop PC DELL Vostro 3681 SFF, Procesor Intel® Core™ i3-10100 3.6GHz Comet Lake, 8GB RAM, 256GB SSD, UHD 630', 32, '7761624016235.jpg', '2440.00', 1, 5, '<p class=\"MsoNormal\">Recommended for: Video Editing<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i3-10100 Processor (6M Cache, up to\r\n4.3 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel UHD 630<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p>', '2021-06-18 11:37:15'),
(16, 'product', 'Desktop PC Lenovo IdeaCentre 5, Procesor AMD® Ryzen 5 4600G 3.7GHz, 16GB RAM, 512GB SSD, Radeon Graphics', 39, '5891624016295.jpg', '2720.00', 1, 6, '<p class=\"MsoNormal\">Recommended for: Crypto Mining<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD® Ryzen 5 4600G Processor (8M Cache, up to\r\n4.20 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon Graphics<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD PRO 565<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p>', '2021-06-18 11:38:15'),
(17, 'product', 'Desktop PC Lenovo V50s, Procesor Intel® Core™ i5-10400 2.9GHz Comet Lake, 8GB RAM, 512GB SSD, UHD 630', 34, '4911624016342.jpg', '3210.00', 1, 7, '<p class=\"MsoNormal\">Recommended for: Stock Trading<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10400 Processor (12M Cache, up to\r\n4.30 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel UHD 630<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p>', '2021-06-18 11:39:02'),
(18, 'product', 'Desktop PC Horizon Gaming Procesor Intel® Core™ i5-10400F 2.9GHz Comet Lake, 16GB RAM, 512GB SSD, GeForce GTX 1660 SUPER 6GB', 10, '3511624016511.jpg', '4700.00', 1, 8, '<p class=\"MsoNormal\">Recommended for: A.I. Deep Learning<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10400F Processor (12M Cache, up\r\nto 4.30 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1660 SUPER<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel H410<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:41:51'),
(19, 'product', 'Desktop PC Lenovo Gaming Legion T5, Procesor Intel® Core™ i7-10700 2.9GHz Comet Lake, 16GB RAM, 512GB SSD, GeForce GTX 1660 SUPER 6GB', 40, '3711624016569.jpg', '5990.00', 1, 1, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i7-10700 Processor (16M Cache, up to\r\n4.80 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1660 SUPER<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:42:49'),
(20, 'product', 'Desktop PC Talos, AMD Ryzen 5 3600 3.6GHz, 16GB DDR4, 1TB SSD, RX 6700 XT 12GB GDDR6', 40, '1521624016620.jpg', '8990.00', 1, 2, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 3600 (12M Cache, up to 4.20 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB HDD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Radeon RX 6700 XT2<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B450<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:43:40'),
(21, 'product', 'Desktop PC Centurion, Intel i5-10400F 2.9GHz, 16GB DDR4, 1TB SSD, RTX 3070 8GB GDDR6, Iluminare RGB', 23, '1431624016662.jpg', '9490.00', 1, 3, '<p class=\"MsoNormal\">Recommended for: Computer Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10400F Processor (12M Cache, up\r\nto 4.30 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3070<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:44:22'),
(22, 'product', 'Desktop PC Centurion, Intel i5-10400F 2.9GHz, 16GB DDR4, 1TB SSD, RTX 3070 8GB GDDR6, Iluminare RGB', 23, '3561624016663.jpg', '9490.00', 1, 3, '<p class=\"MsoNormal\">Recommended for: Computer Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10400F Processor (12M Cache, up\r\nto 4.30 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3070<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:44:23'),
(23, 'product', 'Desktop PC Fenrir, AMD Ryzen 7 5800X 3.8GHz, 16GB DDR4, 128GB SSD + 2TB SSD, RX 6700 XT 12GB GDDR6, Iluminare RGB', 45, '5951624016702.jpg', '11490.00', 1, 4, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 5800X (16M Cache, up to 4.70 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 2TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Radeon RX 6700 XT<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:45:02'),
(24, 'product', ': Desktop PC [AlphaGear] Manticore, AMD Ryzen 5 5600X 3.7GHz, 16GB DDR4, 1TB SSD, RX 6800 16GB GDDR6, Iluminare RGB', 45, '7921624016746.jpg', '11990.00', 1, 5, '<p class=\"MsoNormal\">Recommended for: Video Editing<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 5600X (12M Cache, up to 4.60 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Radeon RX 6800 <o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:45:46'),
(25, 'product', 'Desktop PC Kronos, AMD Ryzen 7 5800X 3.8GHz, 32GB DDR4, 2TB SSD, RX 6800 XT 16GB GDDR6, Iluminare RGB', 56, '6131624016799.jpg', '14990.00', 1, 6, '<p class=\"MsoNormal\">Recommended for: Crypto Mining<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 5800X (16M Cache, up to 4.70 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 32GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 2TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Radeon RX 6800 XT<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:46:39'),
(26, 'product', 'Desktop PC Bladestorm, Intel i9 10850K 3.6GHz, 32GB DDR4, 2TB SSD, RTX 3080 10GB GDDR6X, Iluminare RGB', 34, '41624016839.jpg', '19900.00', 1, 7, '<p class=\"MsoNormal\">Recommended for: Stock Trading<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel i9-10850K (20M Cache, up to 5.20 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 32GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 2TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3080<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel Z490<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:47:19'),
(27, 'product', 'Desktop PC Frost Giant, AMD Ryzen 5 5600X 3.7GHz, 16GB DDR4, 1TB SSD, RTX 3070 8GB GDDR6, Iluminare RGB', 23, '3371624016885.jpg', '11900.00', 1, 8, '<p class=\"MsoNormal\">Recommended for: A.I. Deep Learning<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 5600X (12M Cache, up to 4.60 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3070<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 11:48:05'),
(28, 'product', ': Desktop PC Mamba, AMD Ryzen 5 5600X 3.7GHz, 16GB DDR4, 1TB SSD, RX 5700 XT 8GB GDDR6, Iluminare RGB', 23, '2991624016930.jpg', '7900.00', 1, 1, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD 5600X (12M Cache, up to 4.60 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Radeon RX 5700 XT<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: AMD B550<o:p></o:p></p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 11:48:50'),
(29, 'product', 'Desktop PC Callisto, Intel i7-11700F 2.5GHz, 16GB DDR4, 500GB SSD, RTX 3060 12GB GDDR6, Iluminare RGB', 23, '8351624016962.jpg', '7990.00', 1, 2, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel i7-11700F (16M Cache, up to 4.90 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3060<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B560<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p>', '2021-06-18 11:49:22'),
(30, 'product', 'Desktop PC Frost Golem, Intel i7-11700F 2.5GHz, 16GB DDR4, 1TB SSD, GTX 1660 SUPER 6GB GDDR6, Iluminare RGB', 56, '3871624017027.jpg', '9900.00', 1, 3, '<p class=\"MsoNormal\">Recommended for: Computer-Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel i7-11700F (16M Cache, up to 4.90 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1660 SUPER<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel H570<o:p></o:p></p><p class=\"MsoNormal\">Computer Case: MiddleTower<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 11:50:27'),
(31, 'product', 'Desktop PC Sabre, Intel i3-10100 3.6GHz, 16GB DDR4, 500GB SSD, GMA UHD 630, Iluminare RGB', 23, '811624017066.jpg', '2150.00', 1, 4, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i3-1010 Processor (8M Cache, up to\r\n4.30 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 500GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: GTMA UHD 630<o:p></o:p></p><p class=\"MsoNormal\">Motherboard: Intel B460<o:p></o:p></p><p class=\"MsoNormal\">Computer Case: MiniTower<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 11:51:06'),
(32, 'product', 'Laptop HP 15.6\'\' Pavilion 15-ec0054nq, FHD, Procesor AMD Ryzen™ 5 3550H (4M Cache, up to 3.70 GHz), 8GB DDR4, 512GB SSD, GeForce GTX 1650 4GB', 13, '7941624018862.jpg', '2990.00', 2, 9, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 5 3550H (4M Cache, up to 3.70 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 4GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight: 1.98kg<o:p></o:p></span></p>', '2021-06-18 12:21:02'),
(33, 'product', 'Laptop Lenovo 15.6\'\' IdeaPad 3 15ARH05, FHD IPS 120Hz, Procesor AMD Ryzen™ 5 4600H (8M Cache, up to 4.0 GHz), 8GB DDR4, 256GB SSD, GeForce GTX 1650 4GB', 34, '5761624019194.jpg', '2890.00', 2, 10, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 5 4600H (8M Cache, up to 4.0 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 4GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.20kg<o:p></o:p></p>', '2021-06-18 12:26:34'),
(34, 'product', 'Laptop ASUS 15.6\'\' TUF FX505DT, FHD, Procesor AMD Ryzen™ 7 3750H (4M Cache, up to 4.00 GHz), 8GB DDR4, 512GB SSD, GeForce GTX 1650 4GB', 34, '4131624019234.jpg', '3100.00', 2, 11, '<p class=\"MsoNormal\">Recommended for: Computer-Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 7 3750H (4M Cache, up to 4.00 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 4GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.20kg<o:p></o:p></p>', '2021-06-18 12:27:14'),
(35, 'product', 'Laptop MSI 15.6\'\' GF63 Thin 10SC, FHD, Procesor Intel® Core™ i5-10300H (8M Cache, up to 4.50 GHz), 8GB DDR4, 256GB SSD, GeForce GTX 1650 4GB', 31, '8731624019274.jpg', '3100.00', 2, 12, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10300H Processor (8M Cache, up to\r\n4.50 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 4GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.85kg<o:p></o:p></p>', '2021-06-18 12:27:54'),
(36, 'product', 'Laptop Lenovo 15.6\'\' Legion 5 15IMH05, FHD IPS, Procesor Intel® Core™ i5-10300H (8M Cache, up to 4.50 GHz), 8GB DDR4, 256GB SSD, GeForce GTX 1650 4GB', 33, '8311624019328.jpg', '3400.00', 2, 13, '<p class=\"MsoNormal\">Recommended for: Video Editing<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-10300H Processor (8M Cache, up to\r\n4.50 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 4GB<o:p></o:p></p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.85kg<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 12:28:48'),
(37, 'product', 'Laptop MSI 15.6\'\' Bravo 15 A4DDR, FHD 144Hz, Procesor AMD Ryzen™ 5 4600H (8M Cache, up to 4.0 GHz), 8GB DDR4, 256GB SSD, Radeon RX 5500M 4GB', 22, '4971624019387.jpg', '3490.00', 2, 14, '<p class=\"MsoNormal\">Recommended for: Crypto Mining<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 5 4600H (8M Cache, up to 4.0 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon RX 5500M 4GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.96kg<o:p></o:p></p>', '2021-06-18 12:29:47'),
(38, 'product', ': Laptop ASUS 14\'\' E410MA, FHD, Procesor Intel® Celeron® N4020 (4M Cache, up to 2.80 GHz), 4GB DDR4, 256GB SSD, GMA UHD 600', 34, '8531624019469.jpg', '1200.00', 2, 15, '<p class=\"MsoNormal\">Recommended for: Stock Trading<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Processor: Intel® Celeron® Processor N4020 (4M Cache, up to\r\n2.80 GHz)<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">RAM Memory: 4GB DDR4<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Graphics Card: Intel GMA UHD 600<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.3kg<o:p></o:p></p>\r\n\r\n<p><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-family: Calibri, sans-serif; font-size: 11pt;\">&nbsp;</span></p>', '2021-06-18 12:31:09'),
(39, 'product', 'Ultrabook Acer 14\'\' Swift 3 SF314-42, FHD IPS, Procesor AMD Ryzen™ 3 4300U (4M Cache, up to 3.7 GHz), 8GB DDR4, 256GB SSD, Radeon', 34, '1081624019517.jpg', '1990.00', 2, 16, '<p class=\"MsoNormal\">Recommended for: A.I. Deep Learning<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 3 4300U (4M Cache, up to 3.7 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon<o:p></o:p></p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.2kg<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 12:31:57'),
(40, 'product', 'Ultrabook Lenovo 14\'\' IdeaPad 5 14ITL05, FHD IPS, Procesor Intel® Core™ i3-1115G4 (6M Cache, up to 4.10 GHz), 8GB DDR4, 512GB SSD, GMA UHD', 34, '9091624019581.jpg', '2490.00', 2, 9, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i3-1115G4 Processor (6M Cache, up to\r\n4.10 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel GMA UHD<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.40kg<o:p></o:p></p>', '2021-06-18 12:33:01'),
(41, 'product', 'Ultrabook Huawei 15.6\'\' MateBook D 15, FHD IPS, Procesor Intel® Core™ i3-10110U (4M Cache, up to 4.10 GHz), 8GB DDR4, 256GB SSD, GMA UHD', 34, '3151624019638.jpg', '2490.00', 2, 10, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i3-10110U Processor (4M Cache, up to\r\n4.10 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 256GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel Iris Xe<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.53kg<o:p></o:p></p>', '2021-06-18 12:33:58'),
(42, 'product', 'Ultrabook ASUS 14\'\' VivoBook S435EA, FHD, Procesor Intel® Core™ i5-1135G7 (8M Cache, up to 4.20 GHz), 8GB DDR4X, 512GB SSD, Intel Iris Xe', 23, '3801624019682.jpg', '2790.00', 2, 11, '<p class=\"MsoNormal\">Recommended for: Computer-Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i5-1135G7 Processor (8M Cache, up to\r\n4.20 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4X<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel Iris Xe<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.30kg<o:p></o:p></p>', '2021-06-18 12:34:42'),
(43, 'product', 'Ultrabook Lenovo 14\'\' Yoga Slim 7 14ARE05, FHD, Procesor AMD Ryzen™ 5 4500U (8M Cache, up to 4.0 GHz), 16GB DDR4X, 512GB SSD, Radeon', 45, '8691624020120.jpg', '3790.00', 2, 9, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 5 4500U (8M Cache, up to 4.0 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4X<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon <o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.33kg<o:p></o:p></p>', '2021-06-18 12:42:00'),
(44, 'product', 'Ultrabook DELL 13.4\'\' XPS 13 9310, UHD+ Touch, Procesor Intel® Core™ i7-1185G7 (12M Cache, up to 4.80 GHz, with IPU), 16GB DDR4X, 1TB SSD, Intel Iris Xe', 23, '4681624020185.jpg', '12270.00', 2, 13, '<p class=\"MsoNormal\">Recommended for: Video Editing<o:p></o:p></p><p class=\"MsoNormal\">Display: 13.4 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 3840 x 2400 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i7-1185G7 Processor (12M Cache, up\r\nto 4.80 GHz, with IPU) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4X<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Intel Iris Xe<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.27kg<o:p></o:p></p>', '2021-06-18 12:43:05'),
(45, 'product', 'Ultrabook ASUS 15.6\'\' ZenBook Pro Duo 15 OLED UX582LR, UHD OLED Touch, Procesor Intel® Core™ i9-10980HK (16M Cache, up to 5.30 GHz), 32GB DDR4, 1TB SSD, GeForce RTX 3070 8GB', 34, '7631624020230.jpg', '15490.00', 2, 14, '<p class=\"MsoNormal\">Recommended for: Crypto Mining<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 3840 x 2160 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i9-10980HK Processor (16M Cache, up\r\nto 5.30 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 32GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3070 8GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.34kg<o:p></o:p></p>', '2021-06-18 12:43:50'),
(46, 'product', 'Laptop ASUS 15.6\'\' ASUS TUF A15 FA506IU, FHD 144Hz, Procesor AMD Ryzen™ 7 4800H (8M Cache, up to 4.20 GHz), 8GB DDR4, 512GB SSD, GeForce GTX 1660 Ti 6GB', 23, '841624020273.jpg', '4120.00', 2, 15, '<p class=\"MsoNormal\">Recommended for: Stock Trading<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 7 4800H (8M Cache, up to 4.20 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1660 TI 6GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.30kg<o:p></o:p></p>', '2021-06-18 12:44:33'),
(47, 'product', 'Laptop HP 17.3\'\' Pavilion 17-cd1040nq, FHD IPS 144Hz, Procesor Intel® Core™ i7-10750H (12M Cache, up to 5.00 GHz), 8GB DDR4, 512GB SSD, GeForce GTX 1650 Ti 4GB', 23, '1981624020319.jpg', '4790.00', 2, 16, '<p class=\"MsoNormal\">Recommended for: A.I. Deep Learning<o:p></o:p></p><p class=\"MsoNormal\">Display: 17.3 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i7-10750H Processor (12M Cache, up\r\nto 5.00 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce GTX 1650 TI 4GB<o:p></o:p></p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.75kg<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 12:45:19'),
(48, 'product', 'Laptop GIGABYTE 17.3\'\' G7 KC, FHD 144Hz, Procesor Intel® Core™ i7-10870H (16M Cache, up to 5.00 GHz), 16GB DDR4, 512GB SSD, GeForce RTX 3060 6GB', 23, '7071624020361.jpg', '6990.00', 2, 9, '<p class=\"MsoNormal\">Recommended for: Music Production<o:p></o:p></p><p class=\"MsoNormal\">Display: 17.3 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Intel® Core™ i7-10870H Processor (16M Cache, up\r\nto 5.00 GHz)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3060 6GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.50kg<o:p></o:p></p>', '2021-06-18 12:46:01'),
(49, 'product', 'Laptop Alienware 15.6\'\' m15 R5, QHD 240Hz, Procesor AMD Ryzen™ 7 5800H (16M Cache, up to 4.4 GHz), 16GB DDR4, 512GB SSD, GeForce RTX 3070 8GB', 23, '4161624020404.jpg', '13990.00', 2, 10, '<p class=\"MsoNormal\">Recommended for: Gaming<o:p></o:p></p><p class=\"MsoNormal\">Display: 15.6 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 2560 x 1440 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 7 5800H (16M Cache, up to 4.4 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 512GB SSD <o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: nVidia GeForce RTX 3070 8GB<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 2.50kg<o:p></o:p></p>', '2021-06-18 12:46:44'),
(50, 'product', 'Laptop HP 14\'\' ProBook 445 G7, FHD, Procesor AMD Ryzen™ 5 4500U (8M Cache, up to 4.0 GHz), 8GB DDR4, 1TB + 256GB SSD', 23, '9361624020446.jpg', '3190.00', 2, 11, '<p class=\"MsoNormal\">Recommended for: Computer-Aided Design<o:p></o:p></p><p class=\"MsoNormal\">Display: 14 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 1920 x 1080 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: AMD Ryzen™ 5 4500U (8M Cache, up to 4.0 GHz) <o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 8GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB HDD<o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: AMD Radeon<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.60kg<o:p></o:p></p>', '2021-06-18 12:47:26'),
(51, 'product', 'Laptop Apple 13.3\'\' MacBook Air 13 with Retina True Tone, Apple M1 chip (8-core CPU), 16GB, 1TB SSD, Apple M1 8-core GPU, macOS Big Sur', 23, '1441624020491.jpg', '9490.00', 2, 12, '<p class=\"MsoNormal\">Recommended for: Programming<o:p></o:p></p><p class=\"MsoNormal\">Display: 13.3 inch<o:p></o:p></p><p class=\"MsoNormal\">Resolution: 2560 x 1600 pixels<o:p></o:p></p><p class=\"MsoNormal\">Processor: Apple M1 chip (8-core CPU)<o:p></o:p></p><p class=\"MsoNormal\">RAM Memory: 16GB DDR4<o:p></o:p></p><p class=\"MsoNormal\">Internal Memory: 1TB SSD<o:p></o:p></p><p class=\"MsoNormal\">Graphics Card: Apple M1 8-core<o:p></o:p></p><p class=\"MsoNormal\"><span class=\"jlqj4b\">Weight</span>: 1.29kg<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2021-06-18 12:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `created_at`) VALUES
(8, '2111624011320.jpg', '2021-06-18 10:15:20'),
(9, '4421624011326.jpg', '2021-06-18 10:15:26'),
(10, '9061624011342.jpg', '2021-06-18 10:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `subcategory_name`, `subcategory_image`) VALUES
(1, 1, 'Music productions', NULL),
(2, 1, 'Gaming', NULL),
(3, 1, 'Computer-aided Design', NULL),
(4, 1, 'Programming', NULL),
(5, 1, 'Video Editing', NULL),
(6, 1, 'Crpyto Mining', NULL),
(7, 1, 'Stock Trading', NULL),
(8, 1, 'A.I. deep learning', NULL),
(9, 2, 'Music productions', NULL),
(10, 2, 'Gaming', NULL),
(11, 2, 'Computer-aided Design', NULL),
(12, 2, 'Programming', NULL),
(13, 2, 'Video Editing', NULL),
(14, 2, 'Crpyto Mining', NULL),
(15, 2, 'Stock Trading', NULL),
(16, 2, 'A.I. deep learning', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `country`, `city`, `zip_code`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2b$10$nXwn6j8CdNnFSQXaojqAQO5.emsWyKTTcbdbhz.tJPTUBjHuJBgS2', NULL, NULL, NULL, NULL),
(4, 'user', 'ahuzaifa ahmed', 'asd@gmail.com', 'Netherlands', 'knk', 'n', 'knk', NULL, 'admin123', NULL, '2021-02-24 09:16:08', '2021-02-24 09:16:08', 'kn123kn'),
(5, 'user', 'adkansdk', 'huzaifaahmed34@gmail.com', 'Netherlands', 'n', 'kn', 'k', NULL, '$2y$10$y0Jangp.VTRA.i69PAXv1.rRSXhEEVA7JIHapsh91FOEhVkSPQ/IW', 'OFsZodk6lqCxbmQQkCGNoiZQhBVCnEjU6hDbJjNLbXhOOJ5Bi3XDSCgpo2aa', '2021-02-24 14:22:35', '2021-02-25 00:50:10', 'nk'),
(6, 'user', 'admin', 'as32d@gmail.com', 'Lietuva', 'kn', 'kn', 'k', NULL, '$2y$10$fx8DLuJ8I1ylvv2yZexkKOrccSCfh8mWx0n/XR4hzm8kvmM9fFzLW', NULL, '2021-02-24 14:31:48', '2021-02-24 14:31:48', 'askdmakd'),
(7, 'user', 'nk', 'a@gmail.com', 'Lietuva', 'n', 'knk', 'nk', NULL, '$2y$10$hh9ftR1hzJiNkRyMJDdMkeQ46MOaTdfJPe.XSzFQbeEr/Rf3gaP.C', NULL, '2021-05-13 16:17:52', '2021-05-13 16:17:52', 'ni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
