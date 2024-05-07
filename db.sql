-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2024 at 06:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int NOT NULL,
  `registration_date` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `ward` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0-customer\r\n1-admin',
  `status` tinyint NOT NULL DEFAULT '2' COMMENT '0-blocked\r\n1-verified\r\n2-unverified',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `registration_date`, `avatar`, `name`, `email`, `password`, `city`, `district`, `ward`, `address`, `phone`, `role`, `status`, `token`) VALUES
(4, '2024-04-01', 'uploads/avatar/1712324995-user.jpg', 'Tran Van Teo', 'admin@gmail.com', '1', NULL, NULL, NULL, NULL, '0777888999', 1, 1, ''),
(20, '2024-01-10', NULL, 'John Doe', 'johndoe@example.com', '123', 'Tỉnh Hoà Bình', 'Huyện Lương Sơn', 'Xã Hòa Sơn', '11', '0912345678', 0, 1, ''),
(21, '2024-01-22', NULL, 'Jane Smith', 'janesmith@example.com', '123', 'Tỉnh Thái Nguyên', 'Huyện Đồng Hỷ', 'Xã Hóa Trung', '22', '0912345679', 0, 1, ''),
(22, '2024-03-12', NULL, 'Michael Johnson', 'michaeljohnson@example.com', '123', 'Tỉnh Vĩnh Phúc', 'Huyện Lập Thạch', 'Xã Đình Chu', '50', '0912345680', 0, 1, ''),
(23, '2024-03-15', NULL, 'Emily Brown', 'emilybrown@example.com', '123', 'Tỉnh Đồng Tháp', 'Huyện Tam Nông', 'Xã Phú Đức', '20', '0912345681', 0, 1, ''),
(24, '2024-03-17', NULL, 'Christopher Lee', 'christopherlee@example.com', '123', 'Thành phố Hà Nội', 'Huyện Mê Linh', 'Xã Tiến Thịnh', '60', '0912345682', 0, 1, ''),
(25, '2024-02-14', NULL, 'Jessica Davis', 'jessicadavis@example.com', '123', 'Thành phố Hải Phòng', 'Huyện Vĩnh Bảo', 'Xã Vinh Quang', '33', '0912345683', 0, 1, ''),
(26, '2024-03-08', NULL, 'David Wilson', 'davidwilson@example.com', '123', NULL, NULL, '', NULL, '0912345684', 0, 1, ''),
(27, '2024-03-27', NULL, 'Sarah Martinez', 'sarahmartinez@example.com', '123', NULL, NULL, '', NULL, '0912345685', 0, 1, ''),
(28, '2024-04-01', NULL, 'James Anderson', 'jamesanderson@example.com', '123', NULL, NULL, '', NULL, '0912345686', 0, 1, ''),
(29, '2024-04-05', NULL, 'Laura Taylor', 'laurataylor@example.com', '123', NULL, NULL, '', NULL, '0912345687', 0, 1, ''),
(30, '2024-04-02', NULL, 'Ho Van Do', 'hovando@gmail.com', '123', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Trần Hưng Đạo', '90', '1234567890', 0, 0, ''),
(31, '2024-04-09', NULL, 'Nguyen Thi Ty', 'imsorry78952@gmail.com', '123', 'Tỉnh Lạng Sơn', 'Huyện Văn Lãng', 'Xã Tân Thanh', '30', '1234567890', 0, 1, '34f70aa987965dc8364cb708be5afbdc4f77e5585f274fd2821c4b2194d1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int NOT NULL,
  `grid` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `grid`, `title`, `description`, `image`, `status`, `id_category`) VALUES
(7, 1, 'Live Comfortably', NULL, 'uploads/banner/1711436070-Home-Lifestyle-1.jpg', 1, 73),
(8, 2, 'Embrace simplicity', NULL, 'uploads/banner/1711436081-Home-Lifestyle-2.jpg', 1, 54),
(9, 3, 'Luxurious lounging', NULL, 'uploads/banner/1711436090-Home-Lifestyle-3.jpg', 1, 53),
(10, 4, 'Lights', NULL, 'uploads/banner/1711436099-Home-Lifestyle-4.jpg', 1, 72),
(12, 5, 'Where do you begin?', 'Our curated selection of designer coffee, lounge and side tables will add a high-quality, contemporary design feel to your home.', 'uploads/banner/1711449975-Home-Lifestyle-5.jpg', 1, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `id_color` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`id`, `id_customer`, `id_product`, `quantity`, `id_color`) VALUES
(306, 31, 42, 2, 293),
(308, 22, 29, 5, 304),
(328, 31, 29, 1, 304);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `status`) VALUES
(53, 'Beds', 1),
(54, 'Chairs', 1),
(55, 'Coffee & Tables', 1),
(56, 'Lamps', 1),
(72, 'Electronic', 1),
(73, 'Sofas', 1),
(78, 'iPhone', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `color_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`id`, `name`, `hex`, `color_thumbnail`, `id_product`) VALUES
(284, 'Midnight', '181f33', 'uploads/product/1712246097-Corner-Sofa-Color-2.webp', 31),
(285, 'Grayish', '777d7b', 'uploads/product/1712246668-Corner-Sofa-Color-3.webp', 31),
(286, 'Wheat', 'eddecc', 'uploads/product/1712246716-Corner-Sofa-Color-1.webp', 31),
(287, 'Taupe', 'bfafa1', 'uploads/product/1712246769-Two-Seater-Sofa-Color-1.webp', 28),
(288, 'Brownish Yellow', 'edcd8c', 'uploads/product/1712246781-Two-Seater-Sofa-Color-2.webp', 28),
(289, 'Grey', 'b3b3b3', 'uploads/product/1712246795-Two-Seater-Sofa-Color-3.webp', 28),
(290, 'Black', '000', 'uploads/product/1712262144-Flowerpot-Table-Lamp-Color-1.webp', 48),
(291, 'Cerulean', '1b89c4', 'uploads/product/1712262248-Flowerpot-Table-Lamp-Color-2.webp', 48),
(293, 'Black', '000', 'uploads/product/1712262416-Outdoor-Wall-Light.webp', 42),
(294, 'Silver', 'c9c9c9', 'uploads/product/1712262480-LED-Spotlight.webp', 41),
(296, 'Black', '000', 'uploads/product/1712262516-Tab-Table-Lamp.webp', 38),
(297, 'Black', '000', 'uploads/product/1712262537-Palette-Coffee-Table.webp', 37),
(298, 'Taupe', 'b5a89a', 'uploads/product/1712262602-Distinct-Coffee-Table.webp', 36),
(299, 'Black', '000', 'uploads/product/1712262618-The-Canvas-Chair.webp', 35),
(300, 'Tan', 'cc9b60', 'uploads/product/1712262650-Outdoor-Chair.webp', 34),
(301, 'Grayish Brown', '786659', 'uploads/product/1712262733-Reading-Chair.webp', 33),
(302, 'Stone', 'b5aa9a', 'uploads/product/1712262782-Eave-Modular-Sofa.webp', 32),
(303, 'Platinum', 'd8d9d2', 'uploads/product/1712262832-Sleep-Sofa-Bed.webp', 30),
(304, 'Gray', 'bdbdbd', 'uploads/product/1712262876-Madison-Sofa-Bed.webp', 29),
(308, 'Forest', '006333', 'uploads/product/1712343188-Flowerpot-Table-Lamp-Color-3.webp', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `url`, `id_product`) VALUES
(23, 'uploads/product/1711630095-Outdoor-Wall-Light-Lifestyle.webp', 42),
(24, 'uploads/product/1711630127-Sleep-Sofa-Bed-Detail-1.webp', 30),
(25, 'uploads/product/1711630138-Sleep-Sofa-Bed-Detail-2.webp', 30),
(26, 'uploads/product/1711630153-Sleep-Sofa-Bed-Lifestyle.webp', 30),
(27, 'uploads/product/1711732868-Corner-Sofa-Color-2.webp', 31),
(28, 'uploads/product/1711732874-Corner-Sofa-Color-3.webp', 31),
(29, 'uploads/product/1712038125-The-Canvas-Chair-Detail-1.webp', 35),
(30, 'uploads/product/1712038153-The-Canvas-Chair-Detail-2.webp', 35),
(31, 'uploads/product/1712038158-The-Canvas-Chair-Lifestyle.webp', 35),
(32, 'uploads/product/1712038194-LED-Spotlight-Lifestyle.webp', 41),
(34, 'uploads/product/1712041586-Two-Seater-Sofa-Color-2.webp', 28),
(35, 'uploads/product/1712041598-Two-Seater-Sofa-Color-3.webp', 28),
(36, 'uploads/product/1712042796-Palette-Coffee-Table-Lifestyle.webp', 37),
(38, 'uploads/product/1712042841-Distinct-Coffee-Table-Lifestyle-1.webp', 36),
(40, 'uploads/product/1712042918-Tab-Table-Lamp-Lifestyle.webp', 38),
(42, 'uploads/product/1712042950-Outdoor-Chair-Detail-1.webp', 34),
(43, 'uploads/product/1712042955-Outdoor-Chair-Detail-2.webp', 34),
(44, 'uploads/product/1712042960-Outdoor-Chair-Lifestyle.webp', 34),
(45, 'uploads/product/1712042974-Reading-Chair-Detail.webp', 33),
(46, 'uploads/product/1712042982-Reading-Chair-Lifestyle-1.webp', 33),
(47, 'uploads/product/1712042989-Reading-Chair-Lifestyle-2.webp', 33),
(48, 'uploads/product/1712043005-Eave-Modular-Sofa-Detail-1.webp', 32),
(49, 'uploads/product/1712043009-Eave-Modular-Sofa-Detail-2.webp', 32),
(50, 'uploads/product/1712043012-Eave-Modular-Sofa-Lifestyle.webp', 32),
(51, 'uploads/product/1712043031-Madison-Sofa-Bed-Detail-1.webp', 29),
(52, 'uploads/product/1712043041-Madison-Sofa-Bed-Detail-2.webp', 29),
(53, 'uploads/product/1712043050-Madison-Sofa-Bed-Lifestyle.webp', 29),
(62, 'uploads/product/1712043140-Corner-Sofa-Lifestyle.webp', 31),
(63, 'uploads/product/1712043175-Two-Seater-Sofa-Lifestyle.webp', 28),
(64, 'uploads/product/1712043284-Flowerpot-Table-Lamp-Color-2.webp', 48),
(65, 'uploads/product/1712043288-Flowerpot-Table-Lamp-Color-3.webp', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `payment_status` int NOT NULL DEFAULT '0' COMMENT '0-unpaid;\r\n1-paid;\r\n2-refunded;',
  `delivery_status` int NOT NULL DEFAULT '0' COMMENT '0-pending;\r\n1-in transit;\r\n2-delivered;\r\n3-failed;',
  `method` int NOT NULL COMMENT '0-cod;\r\n1-online;',
  `total` decimal(10,0) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id_customer` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `date`, `payment_status`, `delivery_status`, `method`, `total`, `note`, `id_customer`, `status`) VALUES
(57, '2024-04-08 23:20:09', 2, 3, 1, '641', 'Mong muốn nhận được sớm', 25, 1),
(58, '2024-04-08 23:22:51', 1, 1, 0, '25850', 'Yêu cầu đóng gói cẩn thận', 25, 1),
(59, '2024-04-08 23:23:40', 0, 1, 0, '3691', 'Mong muốn nhận được phiếu bảo hành', 22, 1),
(60, '2024-04-08 23:24:46', 1, 1, 1, '22251', 'Vui lòng giao hàng vào buổi sáng', 23, 1),
(61, '2024-04-08 23:27:01', 1, 2, 0, '5439', 'Xin hãy ghi rõ thông tin về sản phẩm', 21, 1),
(62, '2024-04-08 23:45:25', 1, 2, 1, '8000', 'Địa chỉ giao hàng là văn phòng', 21, 1),
(63, '2024-04-08 23:46:28', 1, 2, 0, '4600', 'Xin hãy đảm bảo rằng sản phẩm đã được kiểm tra kỹ', 22, 1),
(67, '2024-04-08 23:58:49', 1, 2, 0, '621', 'Địa chỉ giao hàng đã được xác nhận.', 21, 1),
(70, '2024-04-09 00:06:48', 2, 2, 0, '563', 'Muốn nhận được sản phẩm trước cuối tuần.', 21, 1),
(73, '2024-04-09 00:22:10', 1, 2, 0, '810', 'Vui lòng giao hàng nhanh chóng.', 4, 1),
(74, '2024-04-09 00:35:45', 2, 3, 1, '207', '', 4, 1),
(75, '2024-04-09 00:38:30', 1, 1, 0, '207', 'Ok sếp', 4, 1),
(76, '2024-04-09 03:37:08', 1, 2, 1, '1600', 'Trùm bom hàng là anh', 30, 1),
(77, '2024-04-09 17:10:19', 1, 2, 1, '5314', 'Bật chế độ bay lên', 31, 1),
(78, '2024-04-09 17:10:53', 2, 3, 1, '2430', '', 31, 1),
(79, '2024-04-10 03:25:17', 1, 0, 1, '5800', 'Cần đánh giá', 30, 1),
(80, '2024-04-10 04:00:02', 2, 2, 1, '2700', '', 4, 1),
(87, '2024-04-14 15:53:13', 1, 0, 1, '6790', '', 4, 0),
(88, '2024-04-14 15:54:17', 1, 0, 1, '3690', '', 4, 0),
(89, '2024-04-14 16:36:25', 2, 3, 0, '4050', '', 4, 0),
(91, '2024-04-14 16:43:38', 0, 0, 0, '810', '', 4, 0),
(93, '2024-04-14 16:47:46', 1, 0, 1, '810', '', 4, 0),
(94, '2024-04-15 23:25:22', 1, 0, 1, '6900', '', 4, 1),
(95, '2024-04-16 16:30:18', 1, 0, 1, '10370', '', 4, 0),
(96, '2024-04-16 16:34:27', 0, 1, 0, '1768', '', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `id_color` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `id_order`, `id_product`, `id_color`, `quantity`, `price`) VALUES
(56, 57, 48, 308, 3, '207'),
(57, 58, 31, 284, 1, '3690'),
(58, 58, 31, 285, 3, '3690'),
(59, 58, 31, 286, 3, '3690'),
(60, 59, 33, 301, 3, '810'),
(61, 59, 41, 294, 2, '620'),
(66, 61, 35, 299, 1, '1729'),
(67, 62, 29, 304, 5, '1280'),
(68, 63, 30, 303, 1, '1700'),
(70, 67, 37, 297, 1, '2040'),
(73, 70, 37, 297, 1, '2040'),
(74, 73, 33, 301, 1, '729'),
(75, 73, 48, 291, 1, '207'),
(76, 73, 48, 308, 1, '207'),
(77, 74, 48, 290, 1, '186'),
(78, 74, 48, 290, 1, '207'),
(79, 74, 48, 291, 1, '207'),
(80, 74, 48, 308, 1, '207'),
(81, 75, 48, 308, 1, '186'),
(82, 76, 29, 304, 1, '1280'),
(83, 77, 42, 293, 5, '563'),
(84, 77, 41, 294, 4, '620'),
(85, 78, 33, 301, 3, '729'),
(86, 79, 32, 302, 2, '2900'),
(87, 80, 38, 296, 10, '243'),
(98, 87, 34, 300, 2, '1261'),
(99, 87, 35, 299, 2, '1729'),
(100, 87, 33, 301, 1, '810'),
(101, 88, 31, 285, 1, '3321'),
(102, 89, 33, 301, 2, '729'),
(104, 91, 33, 301, 1, '810'),
(106, 93, 33, 301, 1, '810'),
(108, 95, 28, 287, 6, '1725'),
(109, 96, 48, 291, 3, '219'),
(110, 96, 48, 308, 5, '219');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `instock` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `view`, `thumbnail`, `name`, `description`, `price`, `discount`, `instock`, `status`, `id_category`) VALUES
(28, 19, 'uploads/product/1711255259-Two-Seater-Sofa-Color-1.webp', 'Two Seater Sofa', 'The compact HAY Mags Two Seater Sofa Combination 1 boasts a stylish and comforting design perfect for smaller living rooms.', '2300', 25, 9, 1, 73),
(29, 49, 'uploads/product/1711255289-Madison-Sofa-Bed.webp', 'Madison Sofa Bed', 'A relaxed and elegant sofa bed, the Madison possesses the quality of craftsmanship that has come to be expected from Danish interiors experts, Softline.', '2000', 50, 20, 1, 73),
(30, 20, 'uploads/product/1711255318-Sleep-Sofa-Bed.webp', 'Sleep Sofa Bed', 'Own a contemporary design classic in the effortlessly multi-functional Sleep Sofa Bed from Busk+Herzog and Softline.', '1700', 20, 50, 1, 73),
(31, 10, 'uploads/product/1711255359-Corner-Sofa-Color-1.webp', 'Corner Sofa', 'The Hay Mags Corner Sofa - Combination 1 - Left provides the ultimate expanded lounging space.', '4100', 15, 33, 1, 73),
(32, 10, 'uploads/product/1711255392-Eave-Modular-Sofa.webp', 'Eave Modular Sofa', 'Sink into the enfolding upholstery of the Audo Copenhagen Eave Two Seater Modular Sofa from NORM Architects.', '2900', 10, 87, 1, 73),
(33, 101, 'uploads/product/1711255425-Reading-Chair.webp', 'Reading Chair', 'The House of Finn Juhl Reading Chair serves as the preeminent example of simplistic elegance in design.', '900', 0, 59, 1, 54),
(34, 89, 'uploads/product/1711255466-Outdoor-Chair.webp', 'Outdoor Lounge Chair', 'The celebrated MR01 Initial Lounge Chair, by Mathias Steen Rasmussen for GUBI, has been reimaged and redeveloped specifically for the outdoors.', '1300', 0, 18, 1, 54),
(35, 87, 'uploads/product/1711255497-The-Canvas-Chair.webp', 'The Canvas Chair', 'Echoing an organic and down-to-earth profile, The Canvas Chair from Fredericia was designed by Borge Mogensen in 1970.', '1900', 0, 5, 1, 54),
(36, 10, 'uploads/product/1711255543-Distinct-Coffee-Table.webp', 'Distinct Coffee Table', 'The ferm LIVING Distinct Coffee Table combines architectural form with natural materials.', '3300', 5, 0, 1, 55),
(37, 10, 'uploads/product/1711255572-Palette-Coffee-Table.webp', 'Palette Coffee Table', 'Designed for &Tradition by Spanish designer Jaime Hayon, the Palette Coffee Table JH25 is practical yet bursting with personality.', '3400', 0, 85, 1, 55),
(38, 16, 'uploads/product/1711255608-Tab-Table-Lamp.webp', 'Tab Table Lamp', 'Innovative and futuristic in design, the Flos Tab Table Lamp, Designed by BarberOsgerby, provides direct lighting with an easily adjustable diffuser.', '300', 2, 26, 1, 56),
(41, 11, 'uploads/product/1711255701-LED-Spotlight.webp', 'LED Spotlight', 'Part of the Easy family, the ANTIDARK Easy Spotlight is a versatile spot fixture that is a great addition to any room.', '660', 10, 16, 1, 72),
(42, 11, 'uploads/product/1711255731-Outdoor-Wall-Light.webp', 'Outdoor Wall Light', 'Carefully considered and forward-thinking in its design, the Marset Palosanto Outdoor Wall Lamp showcases Christophe Mathieu’s eye for both functionality and contemporary aesthetics.', '750', 1, 24, 1, 72),
(48, 35, 'uploads/product/1712043270-Flowerpot-Table-Lamp-Color-1.webp', 'Flowerpot Table Lamp', 'The famous Flowerpot lamp, designed in 1969 by Verner Panton, was named after the happy days of Flower Power.', '230', 5, 76, 1, 56);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_customer` int NOT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `review_date` date NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `id_product`, `id_customer`, `rating`, `review_text`, `review_date`, `status`) VALUES
(11, 29, 30, 5, 'Đón chờ những siêu phẩm mới', '2024-04-08', 1),
(14, 42, 31, 5, 'Great', '2024-04-09', 1),
(15, 29, 30, 5, 'xin cái giá phải trả?', '2024-04-10', 0),
(16, 48, 4, 5, 'Ánh sáng đẹp', '2024-04-10', 0),
(17, 38, 4, 2, 'Ngáo giá', '2024-04-10', 1),
(19, 48, 4, 5, 'Nét luôn shop ơi', '2024-04-15', 0),
(20, 38, 4, 5, 'Very good', '2024-04-15', 0),
(21, 33, 4, 1, 'Hàng lởm', '2024-04-15', 1),
(22, 28, 27, 4, 'Great product, highly recommended!', '2024-04-02', 1),
(23, 28, 26, 5, 'Excellent service and fast delivery!', '2024-04-06', 1),
(24, 28, 28, 5, 'Good product but packaging could be improved.', '2024-04-10', 1),
(25, 30, 26, 5, 'I absolutely love this product!', '2024-04-03', 1),
(26, 30, 28, 5, 'Very good quality, worth the price.', '2024-04-07', 1),
(27, 30, 27, 2, 'Disappointed with the product', '2024-04-11', 1),
(28, 30, 20, 4, 'Average product, nothing special.', '2024-04-04', 1),
(29, 30, 25, 5, 'The best product I have ever purchased!', '2024-04-08', 1),
(30, 30, 29, 1, 'Terrible quality', '2024-04-12', 1),
(31, 48, 4, 1, 'Very bad', '2024-04-16', 1),
(32, 48, 4, 5, 'Good', '2024-04-16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_category` (`id_category`) USING BTREE;

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_customer_cart` (`id_customer`),
  ADD KEY `Lk_id_product_cart` (`id_product`),
  ADD KEY `Lk_color_cart` (`id_color`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`name`) USING BTREE;

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_customer` (`id_customer`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_order` (`id_order`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_category` (`id_category`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product_review` (`id_product`),
  ADD KEY `Lk_id_customer_review` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD CONSTRAINT `Lk_category` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD CONSTRAINT `Lk_color_cart` FOREIGN KEY (`id_color`) REFERENCES `tbl_colors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_customer_cart` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_product_cart` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD CONSTRAINT `Lk_id_product_variants` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `Lk_id_product_thumbnail` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `Lk_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `Lk_id_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Lk_id_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `Lk_id_category` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD CONSTRAINT `Lk_id_customer_review` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_product_review` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
