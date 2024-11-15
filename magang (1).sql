-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--
CREATE DATABASE IF NOT EXISTS `magang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `magang`;

-- --------------------------------------------------------

--
-- Table structure for table `databarang`
--

CREATE TABLE `databarang` (
  `barcode` varchar(18) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '-',
  `kdKategori` int(11) NOT NULL DEFAULT 1,
  `kdSatuan` int(11) NOT NULL DEFAULT 1,
  `hrgBeli` int(11) NOT NULL,
  `hrgJual` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `stok_gudang` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `cloud_img` text DEFAULT NULL,
  `img_urls` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databarang`
--

INSERT INTO `databarang` (`barcode`, `namaBarang`, `slug`, `kdKategori`, `kdSatuan`, `hrgBeli`, `hrgJual`, `stok`, `stok_gudang`, `deskripsi`, `cloud_img`, `img_urls`, `created_at`, `updated_at`) VALUES
('089686604443', 'jetz coklat 1000an', 'jetz-coklat-1000an', 3, 1, 850, 1000, 1, 0, '-', 'products/cnvkpv2o7wcwbwyvlw2z', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664251477/products/cnvkpv2o7wcwbwyvlw2z.jpg', '2022-09-18 21:27:35', '2022-09-26 21:04:37'),
('089686732009', 'chitato lite', 'chitato-lite', 3, 1, 1915, 2000, 3, 0, '-', 'products/emmv5cvng63fdkp93jxb', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664251977/products/emmv5cvng63fdkp93jxb.jpg', '2022-09-25 19:30:25', '2022-09-26 21:12:57'),
('089686870084', 'Ichi ocha the madu lemon', 'ichi-ocha-the-madu-lemon', 2, 1, 2750, 3000, 9, 0, '-', 'products/hfv8eq5wk0y8fbqqnsa9', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664198504/products/hfv8eq5wk0y8fbqqnsa9.jpg', '2022-09-18 21:09:35', '2022-09-26 06:21:46'),
('18529555', 'vit air mineral 550ml', 'vit-air-mineral-550ml', 2, 1, 1275, 2000, 23, 0, '-', NULL, NULL, '2022-09-21 19:40:03', '2022-09-21 19:40:03'),
('18788723', 'Ichi ocha green tea', 'ichi-ocha-green-tea', 1, 1, 2229, 3000, 12, 0, '-', 'products/zjajh0ga9zzj3t298y9x', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664199601/products/zjajh0ga9zzj3t298y9x.jpg', '2022-09-18 21:06:11', '2022-09-26 06:40:01'),
('3920001318911', 'better 36g', 'better-36g', 3, 1, 1700, 2000, 7, 0, '-', 'products/g48yravghehgrfosbjgs', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664201820/products/g48yravghehgrfosbjgs.jpg', '2022-09-21 20:24:16', '2022-09-26 07:17:01'),
('4902430102254', 'shampoo h&s bersih & harum 160ml', '', 1, 1, 25200, 30000, 4, 0, NULL, NULL, NULL, NULL, NULL),
('4902430110648', 'shampoo h&s sub zero 160ml', 'shampoo-h-s-sub-zero-160ml', 6, 1, 25220, 29500, 4, 0, '-', 'products/yl6uultigspoourhd5y0', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246799/products/yl6uultigspoourhd5y0.jpg', NULL, '2022-09-26 19:46:39'),
('4902430142083', 'shampoo h&s anti hairfall 160ml', '', 1, 1, 24279, 28500, 4, 0, NULL, NULL, NULL, NULL, NULL),
('4902430396028', 'shampoo h&s selembut sutra 160ml', 'shampoo-h-s-selembut-sutra-160ml', 1, 1, 25200, 30000, 5, 0, '-', 'products/v97zojggxcps0uvspbe3', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246578/products/v97zojggxcps0uvspbe3.jpg', NULL, '2022-09-26 19:42:59'),
('4902430399531', 'shampoo pantene halus lembut', 'shampoo-pantene-halus-lembut', 1, 1, 12845, 15000, 3, 0, '-', 'products/ydfoj1lilgy7lnsxjplp', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247071/products/ydfoj1lilgy7lnsxjplp.jpg', NULL, '2022-09-26 19:51:11'),
('4902430414289', 'shampoo s&h bersih & harum 70ml', 'shampoo-s-h-bersih-harum-70ml', 1, 1, 10741, 12000, 1, 0, '-', 'products/kjrg3bswojcungku4m2t', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246434/products/kjrg3bswojcungku4m2t.jpg', NULL, '2022-09-26 19:40:34'),
('4902430429375', 'shampoo rejoice anti ketombe 160ml', 'shampoo-rejoice-anti-ketombe-160ml-2', 6, 1, 19435, 23000, 3, 0, '-', 'products/vmijvbikgn6dti8avgbc', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247644/products/vmijvbikgn6dti8avgbc.jpg', '2022-09-26 19:55:08', '2022-09-26 20:00:44'),
('4902430429399', 'shampoo rejoice anti ketombe 70ml', 'shampoo-rejoice-anti-ketombe-70ml', 15, 1, 9677, 11500, 9, 0, '-', 'products/qblalkouvuycmutnjji7', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247182/products/qblalkouvuycmutnjji7.jpg', NULL, '2022-09-26 19:53:02'),
('4902430430883', 'shampoo h&s selembut sutra 70ml', 'shampoo-h-s-selembut-sutra-70ml', 6, 1, 10741, 13000, 3, 0, '-', NULL, NULL, '2022-09-26 19:43:41', '2022-09-26 19:43:41'),
('4902430433082', 'shampoo h&s anti hairfall 70ml', 'shampoo-h-s-anti-hairfall-70ml', 6, 1, 10741, 12500, 1, 0, '-', 'products/jxgzwaxxhlhtfaxzn6mr', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246300/products/jxgzwaxxhlhtfaxzn6mr.jpg', NULL, '2022-09-26 19:47:24'),
('4902430507066', 'shampoo h&s men hair retain 165ml', 'shampoo-h-s-men-hair-retain-165ml', 6, 1, 24205, 28500, 3, 0, '-', 'products/rau82rddfivahxlve3wi', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246735/products/rau82rddfivahxlve3wi.jpg', NULL, '2022-09-26 19:45:35'),
('4902430553629', 'shampoo h&s lemon segar 70ml', 'shampoo-h-s-lemon-segar-70ml', 1, 1, 10741, 13000, 7, 0, '-', 'products/kzk4fbrrgtunqkojzcum', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246514/products/kzk4fbrrgtunqkojzcum.jpg', NULL, '2022-09-26 19:41:55'),
('7640129890040', 'asepso original 80g', 'asepso-original-80g', 5, 1, 6494, 8000, 1, 0, '-', 'products/ia9uysp3qxqg4y3dx6mg', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248764/products/ia9uysp3qxqg4y3dx6mg.jpg', NULL, '2022-09-26 20:19:25'),
('7640129893249', 'asepso fresh 80g', 'asepso-fresh-80g', 5, 1, 6494, 8000, 11, 0, '-', 'products/zs9emmeorlj4s4txobgn', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248919/products/zs9emmeorlj4s4txobgn.jpg', NULL, '2022-09-26 20:21:59'),
('8886008101053', 'Aqua 600ml', 'aqua-600ml', 1, 1, 1866, 2500, 68, 0, '-', NULL, NULL, '2022-09-18 20:07:14', '2022-09-18 20:07:14'),
('8886008101091', 'Aqua 1500ml', 'aqua-1500ml', 1, 1, 4183, 5000, 15, 0, '-', 'products/gr7pmlmbeqrhlem9d0su', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200002/products/gr7pmlmbeqrhlem9d0su.jpg', '2022-09-18 20:01:52', '2022-09-26 06:46:42'),
('8886012880203', 'kapur barus dahlia kecil', '', 1, 1, 1683, 2000, 4, 0, NULL, NULL, NULL, NULL, NULL),
('8886013281481', 'French fries 2000 24g', 'french-fries-2000-24g', 1, 1, 3020, 4000, 45, 0, '-', NULL, NULL, '2022-09-18 21:34:12', '2022-09-18 21:34:12'),
('8886020001089', 'swallow pengharum ruangan', '', 1, 1, 4000, 5000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8990333811119', 'choco pie coklat', 'choco-pie-coklat', 3, 1, 1750, 2000, 12, 0, '-', 'products/pxcdnquinmg2ilehahoi', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664252300/products/pxcdnquinmg2ilehahoi.jpg', '2022-09-25 19:14:49', '2022-09-26 21:18:20'),
('8992388133017', 'nu green tea milk tea', 'nu-green-tea-milk-tea', 2, 1, 5175, 6000, 24, 0, '-', 'products/utvrl5thbspqbzvii232', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200677/products/utvrl5thbspqbzvii232.jpg', '2022-09-18 21:03:50', '2022-09-26 06:57:57'),
('8992388133345', 'nu green tea teh tarik', 'nu-green-tea-teh-tarik', 1, 1, 5175, 6000, 26, 0, '-', 'products/psuhtylyddxhm45mz9vy', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200635/products/psuhtylyddxhm45mz9vy.jpg', '2022-09-18 21:02:04', '2022-09-26 06:57:15'),
('8992742360844', 'polytex sabut stainless', 'polytex-sabut-stainless', 5, 1, 3500, 4000, 5, 0, '-', 'products/ds1mjkqa9dljyj3huqwj', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664249965/products/ds1mjkqa9dljyj3huqwj.jpg', '2022-09-25 21:00:51', '2022-09-26 20:39:25'),
('8992742370683', 'polytex spon', 'polytex-spon', 5, 1, 1980, 3000, 4, 0, '-', 'products/ngz4dd4z9atpjfxr9b0k', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664249829/products/ngz4dd4z9atpjfxr9b0k.jpg', '2022-09-25 20:59:21', '2022-09-26 20:37:09'),
('8992745320784', 'stella lemon fresh 42g', 'stella-lemon-fresh-42g', 1, 1, 9889, 12000, 3, 0, '-', 'products/q3ir6pmayr1jgfw0n8i2', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664250591/products/q3ir6pmayr1jgfw0n8i2.jpg', NULL, '2022-09-26 20:49:51'),
('8992745325307', 'stella fogo p.lemari jusmine', '', 1, 1, 9889, 12000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8992745325314', 'stella fogo p.lemari rose', '', 1, 1, 9889, 12000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8992745330127', 'stella fogo p.lemari fresh', 'stella-fogo-p-lemari-fresh', 11, 1, 9889, 12000, 1, 0, '-', 'products/fisjesjnwwnfqeovfejh', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664250347/products/fisjesjnwwnfqeovfejh.jpg', NULL, '2022-09-26 20:45:48'),
('8992745380191', 'stella daily freshness purple dream 7ml', 'stella-daily-freshness-purple-dream-7ml', 11, 1, 11594, 13000, 2, 0, '-', 'products/d8v3xq5oe48ekvfhgfta', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664250689/products/d8v3xq5oe48ekvfhgfta.jpg', NULL, '2022-09-26 20:51:30'),
('8992745540687', 'mitu baby refreshing lime 10s', '', 1, 1, 5106, 5500, 6, 0, NULL, NULL, NULL, NULL, NULL),
('8992745540823', 'mitu baby charming lily 50s', '', 1, 1, 9091, 11000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8992745540830', 'mitu baby sweet rose', '', 1, 1, 9091, 11000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8992745550396', 'mitu baby lively vanilla 50s', '', 1, 1, 9091, 11000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8992745610854', 'saniter hand wash 250ml', 'saniter-hand-wash-250ml', 14, 1, 12705, 14000, 4, 0, '-', 'products/cuedjwrmbh1daksflj2l', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245458/products/cuedjwrmbh1daksflj2l.jpg', '2022-09-18 23:45:44', '2022-09-26 19:24:18'),
('8992745610861', 'saniter hand wash 200ml', 'saniter-hand-wash-200ml', 14, 1, 8888, 10500, 6, 0, '-', 'products/zejttkaqueyw31ytxlb3', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245390/products/zejttkaqueyw31ytxlb3.jpg', '2022-09-18 23:44:22', '2022-09-26 19:23:10'),
('8992752112013', 'Mizone lychee lemon 500ml', 'mizone-lychee-lemon-500ml', 2, 1, 3375, 4000, 4, 0, '-', 'products/vlosn9uokaxd9rupsqay', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200869/products/vlosn9uokaxd9rupsqay.jpg', '2022-09-18 20:20:12', '2022-09-26 07:01:11'),
('8992761166052', 'frestea melati 350ml', 'frestea-melati-350ml', 1, 1, 3333, 4000, 12, 0, '-', NULL, NULL, '2022-09-18 20:24:33', '2022-09-18 20:24:33'),
('8992761166205', 'frestea madu 350ml', 'frestea-madu-350ml', 1, 1, 3333, 4000, 20, 0, '-', NULL, NULL, '2022-09-18 20:25:49', '2022-09-18 20:25:49'),
('8992775001806', 'Gery salut coklat kelapa 18g 1000an', 'gery-salut-coklat-kelapa-18g-1000an', 3, 1, 843, 1000, 19, 0, '-', NULL, NULL, '2022-09-18 20:57:00', '2022-09-26 20:48:59'),
('8992775002599', 'dilan coklat caramel', 'dilan-coklat-caramel', 1, 1, 1916, 2000, 59, 0, '-', NULL, NULL, '2022-09-18 20:37:22', '2022-09-18 20:37:22'),
('8992775203408', 'Garuda rosta bawang 2000an', 'garuda-rosta-bawang-2000an', 1, 1, 1800, 2000, 25, 0, '-', NULL, NULL, '2022-09-18 23:33:35', '2022-09-18 23:33:35'),
('8992775305034', 'Gery salut keju 18g 1000an', 'gery-salut-keju-20g-1000an', 1, 1, 843, 1000, 10, 0, '-', NULL, NULL, '2022-09-18 20:55:13', '2022-09-26 20:50:06'),
('8992775305188', 'Gery salut malkist 18g matcha latte/hijau', 'gery-salut-malkist-18g-matcha-latte-hijau', 3, 1, 843, 1000, 26, 0, '-', NULL, NULL, '2022-09-26 20:52:38', '2022-09-26 20:52:38'),
('8992775311615', 'chocolatos coklat 500an', 'chocolatos-coklat-500an', 3, 1, 458, 500, 29, 0, '-', 'products/qaqwmnc2lc3kqyjgyqao', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664253159/products/qaqwmnc2lc3kqyjgyqao.jpg', '2022-09-18 20:44:23', '2022-09-26 21:32:39'),
('8992775315057', 'Gery salut malkist coklat 100g', 'gery-salut-malkist-coklat-100g', 3, 1, 6500, 7000, 5, 0, '-', 'products/uiqhi2xgntqhc2pptbaj', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664252517/products/uiqhi2xgntqhc2pptbaj.jpg', '2022-09-26 20:33:33', '2022-09-26 21:21:58'),
('8992946511790', 'bw shinzu matsu 85g', 'bw-shinzu-matsu-85g', 15, 1, 3514, 4000, 20, 0, '-', 'products/gu2dzcboevznmmjadbqb', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245865/products/gu2dzcboevznmmjadbqb.jpg', NULL, '2022-09-26 19:31:05'),
('8992946521836', 'bw shinzui kensho 85g', 'bw-shinzui-kensho-85g', 1, 1, 3514, 4000, 15, 0, '-', 'products/buux2yhhslbl8rpjyadu', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245739/products/buux2yhhslbl8rpjyadu.jpg', NULL, '2022-09-26 19:28:59'),
('8992952955304', 'choco 2000an', 'choco-2000an', 2, 1, 1750, 2000, 3, 0, '-', 'products/xbedddcrnnzm6nzywyzx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664202466/products/xbedddcrnnzm6nzywyzx.jpg', '2022-09-18 21:20:55', '2022-09-26 07:27:46'),
('8993175532426', 'nabati rols keju 500an', 'nabati-rols-keju-500an', 1, 1, 450, 500, 24, 0, '-', NULL, NULL, '2022-09-18 20:47:33', '2022-09-18 20:47:33'),
('8993175537285', 'nabati keju 135g', 'nabati-keju-135g', 3, 1, 5500, 6000, 1, 0, '-', 'products/dntc6c8rwouxp4q8i3bl', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664261953/products/dntc6c8rwouxp4q8i3bl.jpg', '2022-09-26 20:16:09', '2022-09-26 23:59:13'),
('8993175538848', 'siip coklat 24g', 'siip-coklat-24g', 3, 1, 1800, 200, 2, 0, '-', NULL, NULL, '2022-09-21 20:00:34', '2022-09-21 20:00:34'),
('8993175538886', 'siip roasted corn 24g', 'siip-roasted-corn-24g', 3, 1, 1800, 2000, 1, 0, '-', NULL, NULL, '2022-09-21 19:55:42', '2022-09-26 20:28:15'),
('8993200666836', 'Cimory uht', 'cimory-uht', 2, 1, 5500, 7000, 21, 0, '-', 'products/dmmxdc6hs20x5mxscjjb', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200942/products/dmmxdc6hs20x5mxscjjb.jpg', '2022-09-21 20:16:43', '2022-09-26 07:02:24'),
('8993200666935', 'Cimory squeeze', 'cimory-squeeze', 2, 1, 9250, 10000, 3, 0, '-', 'products/cbmzvmowad8cgblofjrw', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200992/products/cbmzvmowad8cgblofjrw.jpg', '2022-09-25 19:25:59', '2022-09-26 07:03:13'),
('8993417096112', 'instance hand sanitizer gel 60ml', 'instance-hand-sanitizer-gel-60ml', 17, 1, 10890, 13000, 2, 0, '-', 'products/jekxfdas0lbotlj8xzle', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664249614/products/jekxfdas0lbotlj8xzle.jpg', '2022-09-18 23:56:56', '2022-09-26 20:33:34'),
('8993417097119', 'instance hand sanitizer gel 60ml', 'instance-hand-sanitizer-gel-60ml-2', 17, 1, 11499, 13500, 5, 0, '-', 'products/nqigjabsdu5v8t6ga7qx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664249528/products/nqigjabsdu5v8t6ga7qx.jpg', '2022-09-18 23:58:16', '2022-09-26 20:32:08'),
('8993417229619', 'sleek baby 70ml', 'sleek-baby-70ml', 13, 1, 4600, 5000, 8, 0, '-', 'products/iszatmqb5xshwwj7sotb', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245290/products/iszatmqb5xshwwj7sotb.jpg', NULL, '2022-09-26 19:21:30'),
('8993417260728', 'sleek hand wash lemon 400ml', 'sleek-hand-wash-lemon-400ml', 13, 1, 12499, 15000, 1, 0, '-', 'products/dqry7wqn2g0j2g8vkyrx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664204270/products/dqry7wqn2g0j2g8vkyrx.jpg', NULL, '2022-09-26 07:57:50'),
('8993417260735', 'sleek hand wash stroberi 400ml', 'sleek-hand-wash-stroberi-400ml', 14, 1, 12499, 15000, 1, 0, '-', 'products/qgdfyfkebdixwcm9ztkt', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245177/products/qgdfyfkebdixwcm9ztkt.jpg', NULL, '2022-09-26 19:19:37'),
('8994506010347', 'garam inti samudra 500g', 'garam-inti-samudra-500g', 1, 1, 3192, 4000, 1, 0, '-', NULL, NULL, '2022-09-18 23:26:17', '2022-09-18 23:26:17'),
('8995077600890', 'dk kacang koro 1000 hijau', 'dk-kacang-koro-1000-hijau', 1, 1, 838, 1000, 7, 0, '-', NULL, NULL, '2022-09-18 21:25:10', '2022-09-18 21:25:10'),
('8995077601705', 'Usagi balls BBQ/ kuning 10g', 'usagi-balls-bbq-kuning-10g', 3, 1, 800, 1000, -10, 0, '-', NULL, NULL, '2022-09-26 21:02:10', '2022-09-26 21:02:10'),
('8995077601712', 'Usagi balls caramel /biru 10g', 'usagi-balls-caramel-biru-10g', 3, 1, 800, 1000, 0, 0, '-', NULL, NULL, '2022-09-26 21:03:37', '2022-09-26 21:03:37'),
('8995077603075', 'dk kacang koro 1000 biru', 'dk-kacang-koro-1000-biru', 3, 1, 838, 1000, 6, 0, '-', 'products/d7c4rcih5dqa16ehpmx8', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664252120/products/d7c4rcih5dqa16ehpmx8.jpg', '2022-09-18 21:26:10', '2022-09-26 21:15:20'),
('8995077603143', 'dk tictac mix', 'dk-tictac-mix', 3, 1, 828, 1000, 9, 0, '-', NULL, NULL, '2022-09-25 19:21:08', '2022-09-25 19:21:08'),
('8995077605208', 'dk kuaci fuzo original', 'dk-kuaci-fuzo-original', 3, 1, 850, 1000, 7, 0, '-', NULL, NULL, '2022-09-26 20:43:06', '2022-09-26 20:43:06'),
('8995077605499', 'dk Sukro oven 1000 all far', 'dk-sukro-oven-1000-all-far', 3, 1, 838, 1000, 5, 0, '-', 'products/fvc5yhedjpcnljtka8af', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200383/products/fvc5yhedjpcnljtka8af.jpg', '2022-09-21 20:20:59', '2022-09-26 06:53:04'),
('8995077606144', 'dk kuaci fuzo susu/milk flavour', 'dk-kuaci-fuzo-susu-milk-flavour', 3, 1, 850, 1000, -2, 0, '-', NULL, NULL, '2022-09-26 20:46:00', '2022-09-26 20:46:00'),
('8995077608902', 'dk kuaci fuzo coffe flavour', 'dk-kuaci-fuzo-coffe-flavour', 3, 1, 850, 1000, 18, 0, '-', NULL, NULL, '2022-09-26 20:44:38', '2022-09-26 20:44:38'),
('8995077609992', 'dk tortila 1000 all far', 'dk-tortila-1000-all-far', 3, 1, 686, 1000, -35, 0, '-', NULL, NULL, '2022-09-26 21:12:43', '2022-09-26 21:12:43'),
('8996001304129', 'slai olai stroberi', 'slai-olai-stroberi', 3, 1, 1500, 2000, 9, 0, '-', 'products/hicsqvfjo3nlp8qvehp9', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664201758/products/hicsqvfjo3nlp8qvehp9.jpg', '2022-09-18 20:52:28', '2022-09-26 07:15:58'),
('8996001305126', 'Arden coklat 30g', 'arden-coklat-30g', 1, 1, 1800, 2000, 10, 0, '-', 'products/eontodhizyoc9yk8rqe5', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664201695/products/eontodhizyoc9yk8rqe5.jpg', '2022-09-18 20:48:45', '2022-09-26 07:14:55'),
('8996001308059', 'Roma sari gandum 38g', 'roma-sari-gandum-38g', 3, 1, 1547, 2000, 114, 0, '-', NULL, NULL, '2022-09-21 19:45:15', '2022-09-21 19:45:15'),
('8996001312261', 'Roma malkist keju manis 18g', 'roma-malkist-keju-manis-18g', 3, 1, 850, 1000, -1, 0, '-', NULL, NULL, '2022-09-26 20:57:51', '2022-09-26 20:57:51'),
('8996001312919', 'Roma malkist keju panggang', 'roma-malkist-keju-panggang', 1, 1, 1650, 2000, 5, 0, '-', NULL, NULL, '2022-09-18 20:50:15', '2022-09-18 20:50:15'),
('8996001350522', 'wafelo wafer coklat', 'wafelo-wafer-coklat', 1, 1, 850, 1000, 2, 0, '-', NULL, NULL, '2022-09-18 21:00:08', '2022-09-18 21:00:08'),
('8996001354001', 'kalpa 22g', 'kalpa-22g', 3, 1, 1650, 2000, 60, 0, '-', 'products/jqhchezgoyfzenpoloup', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664261609/products/jqhchezgoyfzenpoloup.jpg', '2022-09-26 20:07:49', '2022-09-26 23:53:30'),
('8996001354131', 'beng beng 25g', 'beng-beng-25g', 1, 1, 1650, 2000, 12, 0, '-', NULL, NULL, '2022-09-18 21:17:34', '2022-09-18 21:17:34'),
('8996001355237', 'super star 16g', 'super-star-16g', 1, 1, 850, 1000, 6, 0, '-', NULL, NULL, '2022-09-18 21:14:30', '2022-09-18 21:14:30'),
('8996001370063', 'Choki Choki coklat', 'choki-choki-coklat', 1, 1, 850, 1000, 8, 0, '-', NULL, NULL, '2022-09-18 20:31:39', '2022-09-18 20:31:39'),
('8996001600146', 'teh pucuk harum', 'teh-pucuk-harum', 1, 1, 2358, 3500, 41, 0, '-', 'products/biq7lphnqnkmebe3w1yh', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664199819/products/biq7lphnqnkmebe3w1yh.jpg', '2022-09-18 23:21:51', '2022-09-26 06:43:39'),
('8996001600269', 'le minerale 600ml', 'le-minerale-600ml', 2, 1, 1829, 2000, 12, 0, '-', 'products/uoucnwjdnieiaujl2cli', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664199893/products/uoucnwjdnieiaujl2cli.jpg', '2022-09-22 00:06:20', '2022-09-26 06:44:53'),
('8996001600610', 'toracafe late', 'toracafe-late', 1, 1, 3208, 3500, 16, 0, '-', 'products/su3q8ns2dpqr0o6twc2r', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200822/products/su3q8ns2dpqr0o6twc2r.jpg', '2022-09-18 20:27:40', '2022-09-26 07:00:24'),
('8996001600641', 'Tora cafe cappuccino', 'tora-cafe-cappuccino', 2, 1, 2375, 3000, 22, 0, '-', NULL, NULL, '2022-09-26 20:21:40', '2022-09-26 20:21:40'),
('8996001600690', 'susu tujuh kurma 200ml', 'susu-tujuh-kurma-200ml', 2, 1, 8500, 10000, 12, 0, '-', 'products/gentm3cdw3foguydvgre', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664201208/products/gentm3cdw3foguydvgre.jpg', '2022-09-21 20:28:02', '2022-09-26 07:06:49'),
('8996006858016', 'teh botol Sosro original 350ml', 'teh-botol-sosro-original-350ml', 2, 1, 3416, 4000, 8, 0, '-', 'products/etj4qnchait0jjlcavre', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200769/products/etj4qnchait0jjlcavre.jpg', '2022-09-18 20:17:59', '2022-09-26 06:59:29'),
('8996006858160', 'fruit tea black currant 350ml', 'fruit-tea-black-currant-350ml', 1, 1, 3416, 4000, 15, 0, '-', 'products/pwazww677q4enjyvb7la', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200128/products/pwazww677q4enjyvb7la.jpg', '2022-09-18 20:10:17', '2022-09-26 06:48:48'),
('8997009642787', 'camelo sereal coklat 30g', 'camelo-sereal-coklat-30g', 3, 1, 1800, 2000, 4, 0, '-', NULL, NULL, '2022-09-26 19:26:44', '2022-09-26 19:26:44'),
('8997035563414', 'pocari sweet', 'pocari-sweet', 1, 1, 5950, 7000, 5, 0, '-', 'products/ziltja914eeqsbwj1x4w', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200909/products/ziltja914eeqsbwj1x4w.jpg', '2022-09-18 20:33:37', '2022-09-26 07:01:51'),
('8997204520071', 'garam gardium 250g', 'garam-gardium-250g', 1, 1, 2376, 3000, 12, 0, '-', 'products/xhwjauwq57qph9iipeho', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664198642/products/xhwjauwq57qph9iipeho.jpg', '2022-09-18 23:28:13', '2022-09-26 06:24:02'),
('8997212800035', 'yuzu isotonic 350ml', 'yuzu-isotonic-350ml-2', 2, 1, 4750, 6000, 12, 0, '-', 'products/lb8z9pgibhccn3ec80br', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664261771/products/lb8z9pgibhccn3ec80br.jpg', '2022-09-25 19:18:15', '2022-09-26 23:56:11'),
('8997213770542', 'Yami Yami salt peper 35 g', 'yami-yami-salt-peper-35-g', 3, 1, 1750, 2000, 7, 0, '-', 'products/yza39xhdm5nzljdvqkoo', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664202514/products/yza39xhdm5nzljdvqkoo.jpg', '2022-09-21 20:13:43', '2022-09-26 07:28:34'),
('8997231030024', 'Doraemon potato stick 30g', 'doraemon-potato-stick-30g', 3, 1, 1750, 2000, 3, 0, '-', NULL, NULL, '2022-09-21 19:51:40', '2022-09-21 19:51:40'),
('8997878002088', 'kiko es stick', 'kiko-es-stick', 2, 1, 500, 1000, 30, 0, '-', NULL, NULL, '2022-09-25 19:35:58', '2022-09-25 19:35:58'),
('8998183012182', 'ainie parfume new blue light', 'ainie-parfume-new-blue-light', 15, 1, 23000, 25000, 5, 0, '-', 'products/yflruvvsxenwgmmz9mug', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245686/products/yflruvvsxenwgmmz9mug.jpg', NULL, '2022-09-26 19:28:06'),
('8998183024314', 'ainie parfume new oriental', 'ainie-parfume-new-oriental', 15, 1, 23000, 25000, 5, 0, '-', 'products/fqcjfqxsx5e5hdroyz7x', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245603/products/fqcjfqxsx5e5hdroyz7x.jpg', NULL, '2022-09-26 19:26:44'),
('8998183204600', 'laurent parfume ungu 110ml', '', 1, 1, 21000, 23000, 4, 0, NULL, NULL, NULL, NULL, NULL),
('8998183204655', 'laurent parfume biru 110ml', '', 1, 1, 21000, 23000, 6, 0, NULL, NULL, NULL, NULL, NULL),
('8998866612517', 'soklin soft w&b 770g', '', 1, 1, 16161, 20000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8998866679596', 'soklin lantai marine mint 800ml', '', 1, 1, 9454, 11000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999338273885', 'kenny hair gel blue 100g', '', 1, 1, 9000, 11000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999338273991', 'kenny hair gel black 100g', '', 1, 1, 9000, 11000, 3, 0, NULL, NULL, NULL, NULL, NULL),
('8999999008376', 'rinso classic fresh 600g', '', 1, 1, 14054, 17000, 3, 0, NULL, NULL, NULL, NULL, NULL),
('8999999033132', 'shampoo lifebuoy merah 170ml', 'shampoo-lifebuoy-merah-170ml', 6, 1, 15196, 18000, 1, 0, '-', 'products/kjkcepvtqiarrajv1xqp', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247873/products/kjkcepvtqiarrajv1xqp.jpg', NULL, '2022-09-26 20:04:33'),
('8999999033170', 'shampoo lifebuoy hijau 170ml', 'shampoo-lifebuoy-hijau-170ml', 1, 1, 15196, 18000, 7, 0, '-', 'products/hz5hfwgf8m3tzjiasdfy', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248036/products/hz5hfwgf8m3tzjiasdfy.jpg', NULL, '2022-09-26 20:07:16'),
('8999999036607', 'lux soft rose', 'lux-soft-rose', 5, 1, 2835, 3500, 39, 0, '-', 'products/afadplfcy7h0qofcxb3o', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664245997/products/afadplfcy7h0qofcxb3o.jpg', NULL, '2022-09-26 19:33:17'),
('8999999039110', 'shampoo dove serum shampoo 160ml', 'shampoo-dove-serum-shampoo-160ml', 1, 1, 21800, 25500, 1, 0, '-', 'products/j83fyxbg80vf8w1dmulq', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247422/products/j83fyxbg80vf8w1dmulq.jpg', NULL, '2022-09-26 19:57:02'),
('8999999045265', 'rinso rose fresh 770g', '', 1, 1, 18354, 22000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999999045517', 'shampoo dove anti lepek 160ml', 'shampoo-dove-anti-lepek-160ml', 6, 1, 21575, 25500, 1, 0, '-', 'products/ilzux0rattvknfdredmc', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247368/products/ilzux0rattvknfdredmc.jpg', NULL, '2022-09-26 19:56:08'),
('8999999048501', 'shampoo sunsilk hijab 170ml', 'shampoo-sunsilk-hijab-170ml', 6, 1, 22200, 26000, 2, 0, '-', 'products/mpvx4xhrrbtmlh5zxwxu', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247546/products/mpvx4xhrrbtmlh5zxwxu.jpg', NULL, '2022-09-26 19:59:06'),
('8999999049454', 'rexona free spirit', 'rexona-free-spirit-2', 18, 1, 13909, 16500, 1, 0, '-', 'products/zju7ionrbhlqgu1tmlgi', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664261457/products/zju7ionrbhlqgu1tmlgi.jpg', '2022-09-22 05:48:32', '2022-09-26 23:51:00'),
('8999999057022', 'super pell love blossom 770ml', '', 1, 1, 11392, 13500, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999999401238', 'rinso classic fresh 770g', '', 1, 1, 18364, 22000, 13, 0, NULL, NULL, NULL, NULL, NULL),
('8999999500399', 'Lux camellia white 75g', 'lux-camellia-white-75g', 5, 1, 2835, 3500, 35, 0, '-', 'products/dlrpftdco7kpphj01hz8', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664246084/products/dlrpftdco7kpphj01hz8.jpg', '2022-09-19 00:17:56', '2022-09-26 19:34:44'),
('8999999518998', 'rinso parfme essence 770g', 'rinso-parfme-essence-770g', 12, 1, 18364, 22000, 3, 0, '-', 'products/rbnp0mphfvt3czkklbxf', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664203648/products/rbnp0mphfvt3czkklbxf.jpg', NULL, '2022-09-26 07:47:29'),
('8999999524814', 'sunlight habbatussauda 210ml', 'sunlight-habbatussauda-210ml', 13, 1, 4430, 5000, 1, 0, '-', 'products/efefbkirvia3xfllwtl9', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664251087/products/efefbkirvia3xfllwtl9.jpg', '2022-09-25 21:08:52', '2022-09-26 20:58:07'),
('8999999524838', 'sunlight daun mint 755ml', '', 1, 1, 15497, 18000, 3, 0, NULL, NULL, NULL, NULL, NULL),
('8999999525811', 'molto all in blue 800ml', '', 1, 1, 23809, 28500, 3, 0, NULL, NULL, NULL, NULL, NULL),
('8999999525828', 'molto all in pink 800ml', '', 1, 1, 23809, 28000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999999526887', 'rinso royal gold', 'rinso-royal-gold', 12, 1, 18457, 22000, 3, 0, '-', 'products/rrxp74sn9eclqnw1zkfx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664203600/products/rrxp74sn9eclqnw1zkfx.jpg', NULL, '2022-09-26 07:46:41'),
('8999999530426', 'rinso gentle care 200ml', 'rinso-gentle-care-200ml', 12, 1, 41333, 5000, 4, 0, '-', 'products/il0mvb9jwgrtorvzvb2e', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664250848/products/il0mvb9jwgrtorvzvb2e.jpg', NULL, '2022-09-26 20:54:08'),
('8999999530662', 'lifebuoy matcha 75g', '', 1, 1, 2686, 3000, 26, 0, NULL, NULL, NULL, NULL, NULL),
('8999999534769', 'pepsodent charcoal 160g', 'pepsodent-charcoal-160g', 16, 1, 15696, 19000, 7, 0, '-', 'products/xhwrivekinpowt3bbruf', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248164/products/xhwrivekinpowt3bbruf.jpg', NULL, '2022-09-26 20:09:24'),
('8999999535667', 'pg pepsodent act. cengkeh 160g', 'pg-pepsodent-act-cengkeh-160g', 16, 1, 15122, 18000, 2, 0, '-', 'products/nmliwdu2vmrmhe4z32ao', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248295/products/nmliwdu2vmrmhe4z32ao.jpg', NULL, '2022-09-26 20:11:35'),
('8999999536244', 'shampoo sunsilk thick & long 170ml', 'shampoo-sunsilk-thick-long-170ml', 6, 1, 19875, 23500, 2, 0, '-', 'products/i0u2wycjzlaksmo0l4wa', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664247496/products/i0u2wycjzlaksmo0l4wa.jpg', NULL, '2022-09-26 19:58:16'),
('8999999549480', 'sunlight jeruk nipis krim', '', 1, 1, 4626, 5000, 1, 0, NULL, NULL, NULL, NULL, NULL),
('8999999553128', 'rinso matic 1kg', '', 1, 1, 29899, 32000, 2, 0, NULL, NULL, NULL, NULL, NULL),
('8999999558062', 'rinso classic fresh 44g', '', 1, 1, 797, 1000, 34, 0, NULL, NULL, NULL, NULL, NULL),
('8999999571863', 'Molto saset all in 1 biru 9ml', 'molto-saset-all-in-1-biru-9ml', 5, 1, 396, 500, 180, 0, '-', NULL, NULL, '2022-09-25 20:53:03', '2022-09-25 20:53:03'),
('8999999706449', 'close up ice white 65g', 'close-up-ice-white-65g', 1, 1, 7920, 9500, 12, 0, '-', 'products/v4kxrglhmuaodrpixtfd', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248479/products/v4kxrglhmuaodrpixtfd.jpg', NULL, '2022-09-26 20:14:39'),
('8999999706487', 'close up ice white 160g', 'close-up-ice-white-160g', 16, 1, 18500, 22000, 11, 0, '-', 'products/hik0rharwupybcubxjhx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248588/products/hik0rharwupybcubxjhx.jpg', NULL, '2022-09-26 20:16:28'),
('8999999707781', 'pepsodent whitening 190g', 'pepsodent-whitening-190g', 16, 1, 14875, 17500, -3, 0, '-', 'products/lgw3luqye77b0ovobtew', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664248358/products/lgw3luqye77b0ovobtew.jpg', NULL, '2022-09-26 20:12:38'),
('982401164546', 'mm nutri boost strawberry', 'mm-nutri-boost-strawberry', 2, 1, 5291, 6000, -1, 0, '-', 'products/y07ckfsjgkngfvd85nc4', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664200715/products/y07ckfsjgkngfvd85nc4.jpg', '2022-09-18 21:29:59', '2022-09-26 06:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `datapelanggan`
--

CREATE TABLE `datapelanggan` (
  `kdPelanggan` varchar(25) NOT NULL,
  `namaPelanggan` text NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datasupplier`
--

CREATE TABLE `datasupplier` (
  `kdSupplier` varchar(6) NOT NULL,
  `namaSupplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE `datauser` (
  `kdUser` int(10) UNSIGNED NOT NULL,
  `namaUser` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `noHp` varchar(20) NOT NULL DEFAULT '0',
  `kabupaten` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `desa` text DEFAULT NULL,
  `alamatLengkap` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`kdUser`, `namaUser`, `email`, `password`, `level`, `noHp`, `kabupaten`, `kecamatan`, `desa`, `alamatLengkap`) VALUES
(8, 'Admin', 'smegamart@smega.sch.id', '$2y$10$WW5sw2NFXRFMzbNQ5050v.2QT4iAhN7m6sWeUxLnJ6IbuWJesuIX2', 'Admin', '0', NULL, NULL, NULL, NULL),
(9, 'Kasir', 'ksm@smega.sch.id', '$2y$10$zcr4wGVPfswYBwfSQRHQJ.3GAa/aZSUQqd0dFMGccjgr0KF8fNJMC', 'Kasir', '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `kdGaleri` int(11) NOT NULL,
  `cloud_img` text NOT NULL,
  `img_urls` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`kdGaleri`, `cloud_img`, `img_urls`, `created_at`, `updated_at`) VALUES
(1, 'galleries/o5aun2uzszwcmj5db8q5', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1663828527/galleries/o5aun2uzszwcmj5db8q5.jpg', '2022-09-21 23:35:29', '2022-09-21 23:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `kdGambar` int(11) NOT NULL,
  `cloud_img` text DEFAULT NULL,
  `img_urls` text DEFAULT NULL,
  `barcode` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`kdGambar`, `cloud_img`, `img_urls`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 'products/gmypdagwmresr53pgune', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664199518/products/gmypdagwmresr53pgune.jpg', '8997204520071', '2022-09-26 06:38:39', '2022-09-26 06:38:39'),
(2, 'products/rrfkgq4x4atn88cotgwx', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664251480/products/rrfkgq4x4atn88cotgwx.jpg', '089686604443', '2022-09-26 21:04:41', '2022-09-26 21:04:41'),
(3, 'products/nde6kuijpqnwqr7uwsap', 'https://res.cloudinary.com/smegamart-softdev/image/upload/v1664251980/products/nde6kuijpqnwqr7uwsap.jpg', '089686732009', '2022-09-26 21:13:00', '2022-09-26 21:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `kdUser` int(11) NOT NULL,
  `barcode` varchar(18) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `hrgJual` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `noFaktur` varchar(18) NOT NULL,
  `barcode` varchar(18) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `hrgJual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `statusBayar` int(11) NOT NULL,
  `kdUser` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `tgl_Jual` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `order`
--
DELIMITER $$
CREATE TRIGGER `kurangiStokOnlineShop` AFTER INSERT ON `order` FOR EACH ROW UPDATE databarang set stok = stok - new.qty where barcode = new.barcode
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `kelipatan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`kelipatan`) VALUES
(25000),
(25000);

-- --------------------------------------------------------

--
-- Table structure for table `rinci_order`
--

CREATE TABLE `rinci_order` (
  `id` int(11) NOT NULL,
  `noFaktur` varchar(18) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `kdUser` int(11) NOT NULL,
  `statusBayar` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `alamat` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabelkategori`
--

CREATE TABLE `tabelkategori` (
  `kdKategori` int(11) NOT NULL,
  `namaKategori` text NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelkategori`
--

INSERT INTO `tabelkategori` (`kdKategori`, `namaKategori`, `slug`) VALUES
(1, 'Sembako', 'sembako'),
(2, 'Minuman Ringan', 'minuman-ringan'),
(3, 'Snack', 'snack'),
(4, 'Mainan Anak', 'mainan-anak'),
(5, 'Sabun Mandi', 'sabun-mandi'),
(6, 'Shampoo', 'shampoo'),
(7, 'Pembalut', 'pembalut'),
(8, 'Rokok', 'rokok'),
(9, 'ATK', 'atk'),
(10, 'Permen', 'permen'),
(11, 'Pengharum Ruangan', 'pengharum-ruangan'),
(12, 'Deterjen', 'deterjen'),
(13, 'Sabun Cuci Piring', 'sabun-cuci-piring'),
(14, 'Sabun Cuci Tangan', 'sabun-cuci-tangan'),
(15, 'Parfum', 'parfum'),
(16, 'Pasta Gigi', 'pasta-gigi'),
(17, 'Hand Sanitizer', 'hand-sanitizer'),
(18, 'Deodorant', 'deodorant');

-- --------------------------------------------------------

--
-- Table structure for table `tabelpembelian`
--

CREATE TABLE `tabelpembelian` (
  `No` int(11) NOT NULL,
  `noFakturBeli` varchar(25) NOT NULL,
  `tglBeli` date NOT NULL,
  `kdSupplier` varchar(25) NOT NULL,
  `kdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabelrealpembelian`
--

CREATE TABLE `tabelrealpembelian` (
  `id` int(11) NOT NULL,
  `noFakturBeli` varchar(25) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `jmlBeli` int(11) NOT NULL,
  `jmlStokGudang` int(11) NOT NULL DEFAULT 0,
  `hrgBeli` int(11) NOT NULL,
  `hrgJual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabelrealpenjualan`
--

CREATE TABLE `tabelrealpenjualan` (
  `no` int(11) NOT NULL,
  `noFakturJualan` varchar(18) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `namaBarang` varchar(35) NOT NULL,
  `jmlhJual` int(11) NOT NULL,
  `hrgJual` double NOT NULL,
  `hrgBeli` double NOT NULL,
  `tgl_jual` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelrealpenjualan`
--

INSERT INTO `tabelrealpenjualan` (`no`, `noFakturJualan`, `barcode`, `namaBarang`, `jmlhJual`, `hrgJual`, `hrgBeli`, `tgl_jual`, `status`) VALUES
(1, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(2, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(3, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(4, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(5, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(6, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(7, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(8, 'FJ18-10-20221', '982401164546', 'mm nutri boost strawberry', 1, 6000, 5291, '2022-10-18', 3),
(9, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(10, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(11, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(12, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(13, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(14, 'SM-2022-10-182390', '8995077601705', 'Usagi balls BBQ/ kuning 10g', 1, 1000, 800, '2022-10-18', 3),
(15, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(16, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(17, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(18, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(19, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(20, 'SM-2022-10-187395', '8999999707781', 'pepsodent whitening 190g', 1, 17500, 14875, '2022-10-18', 3),
(21, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(22, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(23, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(24, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(25, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(26, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(27, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(28, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(29, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(30, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(31, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(32, 'SM-2022-10-181389', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(33, 'FJ18-10-20225', '089686604443', 'jetz coklat 1000an', 1, 1000, 850, '2022-10-18', 3),
(34, 'FJ18-10-20226', '089686604443', 'jetz coklat 1000an', 1, 1000, 850, '2022-10-18', 3),
(35, 'FJ18-10-20227', '089686604443', 'jetz coklat 1000an', 1, 1000, 850, '2022-10-18', 3),
(36, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(37, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(38, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(39, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(40, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(41, 'SM-2022-10-182390', '8995077605208', 'dk kuaci fuzo original', 1, 1000, 850, '2022-10-18', 3),
(42, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(43, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(44, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(45, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(46, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(47, 'SM-2022-10-180388', '8996001312261', 'Roma malkist keju manis 18g', 1, 1000, 850, '2022-10-18', 3),
(48, 'FJ19-10-202210', '089686604443', 'jetz coklat 1000an', 1, 1000, 850, '2022-10-19', 3);

--
-- Triggers `tabelrealpenjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangiStok` AFTER INSERT ON `tabelrealpenjualan` FOR EACH ROW UPDATE databarang set stok = stok - new.jmlhJual where barcode = new.barcode
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tabelsatuan`
--

CREATE TABLE `tabelsatuan` (
  `kdSatuan` int(10) UNSIGNED NOT NULL,
  `namaSatuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelsatuan`
--

INSERT INTO `tabelsatuan` (`kdSatuan`, `namaSatuan`) VALUES
(1, 'pcs'),
(2, 'pak'),
(3, 'bks'),
(7, 'lusin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `No` int(11) NOT NULL,
  `No_Faktur_Jual` varchar(30) NOT NULL,
  `Tgl_Jual` date NOT NULL,
  `Kd_Pelanggan` varchar(20) NOT NULL,
  `Total` double NOT NULL,
  `Bayar` double NOT NULL,
  `Kd_User` varchar(4) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`No`, `No_Faktur_Jual`, `Tgl_Jual`, `Kd_Pelanggan`, `Total`, `Bayar`, `Kd_User`, `poin`) VALUES
(1, 'SM-2022-10-182390', '2022-10-18', '', 4000, 4000, '8', 0),
(2, 'SM-2022-10-187395', '2022-10-18', '', 148000, 148000, '8', 3),
(3, 'SM-2022-10-180388', '2022-10-18', '', 1000, 1000, '8', 0),
(4, 'SM-2022-10-181389', '2022-10-18', '', 1000, 1000, '8', 0),
(5, 'FJ18-10-20225', '2022-10-18', '', 1000, 1000, '8', 0),
(6, 'FJ18-10-20226', '2022-10-18', '', 1000, 1000, '8', 0),
(7, 'FJ18-10-20227', '2022-10-18', '', 1000, 2800, '8', 0),
(8, 'SM-2022-10-182390', '2022-10-18', '', 1000, 1000, '8', 0),
(9, 'SM-2022-10-180388', '2022-10-18', '', 1000, 1000, '8', 0),
(10, 'FJ19-10-202210', '2022-10-19', '', 1000, 2000, '8', 0);

--
-- Triggers `tabel_penjualan`
--
DELIMITER $$
CREATE TRIGGER `tambahPoin` AFTER INSERT ON `tabel_penjualan` FOR EACH ROW UPDATE datapelanggan set point = point + new.poin where kdPelanggan = new.kd_Pelanggan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Alamat` text NOT NULL,
  `NO_Telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `Nama`, `Alamat`, `NO_Telp`) VALUES
(0, 'SMEGA MART', 'Jalan Mayjend Sungkono 34 Kalimanah Purbalingga 53371', '085225041144');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `datapelanggan`
--
ALTER TABLE `datapelanggan`
  ADD PRIMARY KEY (`kdPelanggan`);

--
-- Indexes for table `datasupplier`
--
ALTER TABLE `datasupplier`
  ADD PRIMARY KEY (`kdSupplier`);

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`kdUser`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`kdGaleri`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`kdGambar`),
  ADD KEY `kdBarang` (`barcode`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rinci_order`
--
ALTER TABLE `rinci_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noFaktur` (`noFaktur`);

--
-- Indexes for table `tabelkategori`
--
ALTER TABLE `tabelkategori`
  ADD PRIMARY KEY (`kdKategori`);

--
-- Indexes for table `tabelpembelian`
--
ALTER TABLE `tabelpembelian`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tabelrealpembelian`
--
ALTER TABLE `tabelrealpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabelrealpenjualan`
--
ALTER TABLE `tabelrealpenjualan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tabelsatuan`
--
ALTER TABLE `tabelsatuan`
  ADD PRIMARY KEY (`kdSatuan`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datauser`
--
ALTER TABLE `datauser`
  MODIFY `kdUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `kdGaleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `kdGambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rinci_order`
--
ALTER TABLE `rinci_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabelkategori`
--
ALTER TABLE `tabelkategori`
  MODIFY `kdKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tabelpembelian`
--
ALTER TABLE `tabelpembelian`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabelrealpembelian`
--
ALTER TABLE `tabelrealpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabelrealpenjualan`
--
ALTER TABLE `tabelrealpenjualan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tabelsatuan`
--
ALTER TABLE `tabelsatuan`
  MODIFY `kdSatuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
