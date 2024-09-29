-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gohona_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `bin_no` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `client_no` int(255) DEFAULT NULL,
  `client_id` int(255) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `item_total_amount` varchar(255) DEFAULT NULL,
  `vat_amount` varchar(255) DEFAULT NULL,
  `subtotal_amount` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(100) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `total_paid_amount` varchar(255) DEFAULT NULL,
  `total_due_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_calculations`
--

CREATE TABLE `booking_calculations` (
  `id` int(11) NOT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `unit_price_amount` varchar(255) DEFAULT NULL,
  `wage` varchar(255) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_info` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_payment_calculations`
--

CREATE TABLE `booking_payment_calculations` (
  `id` int(11) NOT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_info` varchar(100) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_terms_and_conditions`
--

CREATE TABLE `booking_terms_and_conditions` (
  `id` int(11) NOT NULL,
  `terms` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_terms_and_conditions`
--

INSERT INTO `booking_terms_and_conditions` (`id`, `terms`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"font-size:10px;\">১) ক্যাশ মেমো ছাড়া কোন আপত্তি বা পরিবর্তন গ্রহনযোগ্য হবে না।&nbsp;২) স্বর্ণের মূল্য বাংলাদেশ জুয়েলারী সমিতি থেকে নির্ধারন করে দেয়া হয় যা জুয়েলারী সমিতির সদস্য হিসেবে আমাদের অনুসরন করতে হয়। ৩) ক্রেতা পন্য ও পন্যের ওজন, হলর্মাক, ডিজাইন দেখে ক্রয় বা বুকিং করবেন এবং কোন সমস্যা হলে শোরুম কর্তৃপক্ষকে জানাবেন এবং কর্তৃপক্ষ যথাযথ সমাধান করবেন। পরবর্তীতে কোন আপত্তি গ্রহনযোগ্য নয়। ৪) কোন ধরনের শারীরিক সমস্যাবা ক্যামিকেল জাতীয় কোন ধরনের দ্রব্য ব্যবহারের কারনে রং পরিবর্তন হলে বিক্রেতা দায়ী থাকবে না।&nbsp;&nbsp;৫) ৭ দিনের মধ্যে বুকিং বাতিল করেন তাহলে কোনো টাকা কাটা যাবে না। ৬) বুকিং করার ৭ দিনের পর বুকিং বাতিল করলে জমাকৃত টাকার ২০% টাকা বাদ দিয়ে ৭ দিন পর টাকা ফেরত দেয়া হবে। ৭) বুকিং বাতিল করার পর যদি ক্রেতা টাকা ফেরত না নিয়ে বুকিংকৃত পন্যের মোট মূল্যের বেশি মূল্যের কোন পন্য ক্রয় করেন বা বুকিং দেন তাহলে কোন টাকা কাটা যাবে না।&nbsp;৮) বুকিং করার সময়ই পন্যের মোট মূল্য নির্ধারন করা হয়ে যাবে, পরে যদি কোন রেট কম বা বেশি হয় তবে তা ক্রেতা বা বিক্রেতা কেউই কোন আপত্তি করতে পারবে না।&nbsp; ৯) সরকারী ও বাজুস এর ক্রয় বিক্রয় নির্দেশনা ও&nbsp;নীতিমালা মোতাবেক ক্রেতা নির্দেশনা ও&nbsp;নীতিমালা অনুসরন না করলে বিক্রেতাকে কোনভাবেই নিয়ম বা নীতি মানতে বাধ্য করতে পারবে না। ১০) বাজুস এর ক্রয় বিক্রয় নির্দেশনা ও&nbsp;&nbsp;নীতিমালা মোতাবেক পন্য বুকিং এর কোন নির্দেশনা ও&nbsp;নীতিমালা নাই। সে ক্ষেত্রে বিক্রেতার উপর নির্ভর করে বিক্রেতা ক্রেতার পন্য ক্রয়ের সুবিধার জন্য বুকিং রাখে বা রাখার ব্যবস্থা করে।&nbsp;</span><br type=\"_moz\"></p><p><span style=\"font-size:10px;\">১১) ক্রেতার সুবির্ধাতে ও সম্মতিতে পন্য বুকিং করা হলোঃ</span></p><p><span style=\"font-size:10px;\">১) রেট এবং মোট মূল্য ফিক্স করে অগ্রিম প্রদান করে বুকিং এর তারিখ হতে ১৫ দিনের মধ্যে পন্য ডেলিভারী নেয়ার জন্য বুকিং করা হলো। --------------</span></p><p><span style=\"font-size:10px;\">২) রেট এবং মোট মূল্য ফিক্স না করে আনুমানিক মূল্য ধরে অগ্রিম প্রদান করে বুকিং এর তারিখ হতে ৩০/৪৫ দিনের মধ্যে পন্য ডেলিভারী নেয়ার জন্য বুকিং করা হলো। ----<br></span><br></p>', '2024-05-13 13:34:12', '2024-05-13 13:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `customer_category_id` int(100) DEFAULT NULL,
  `district_id` int(100) DEFAULT NULL,
  `zone_id` int(100) DEFAULT NULL,
  `fb_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_number`, `address`, `customer_category_id`, `district_id`, `zone_id`, `fb_name`, `created_at`, `updated_at`) VALUES
(1, 'A.H. Mahmud', '01814750120', 'Mirpur 12, Dhaka<br>', 1, 47, 3, 'fb_mahmud', '2024-06-29 12:34:15', '2024-06-29 12:34:15'),
(2, 'Qaisar Ahmed', '01213440120', 'mirpur 10', 2, 47, 5, 'ahmed_fb', '2024-06-29 12:36:12', '2024-06-29 12:36:12'),
(3, 'Hamid Kauser', '1513470135', 'Dhanmondi 27', 1, 1, 1, 'Hamid', '2024-07-01 06:12:40', '2024-07-01 06:12:40'),
(4, 'Sabuj Das', '1513470130', 'Betaga', 1, 1, 1, 'Sabuj', '2024-07-01 06:20:50', '2024-07-01 06:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_categories`
--

CREATE TABLE `customer_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 2 COMMENT '1=active, 2=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_categories`
--

INSERT INTO `customer_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Normal', 1, '2024-06-29 12:23:18', '2024-06-29 12:23:18'),
(2, 'VIP', 1, '2024-06-29 12:23:26', '2024-06-29 12:23:26'),
(3, '9597', 1, '2024-06-29 12:23:41', '2024-06-29 12:23:41'),
(4, 'VVIP', 1, '2024-06-29 12:23:52', '2024-06-29 12:23:52'),
(5, 'POLICE PLAZA', 1, '2024-06-29 12:24:04', '2024-06-29 12:24:04'),
(6, 'CORPORATE', 1, '2024-06-29 12:24:25', '2024-06-29 12:24:25'),
(7, 'SENCO', 1, '2024-06-29 12:24:36', '2024-06-29 12:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE `customer_transactions` (
  `id` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `cash_memo_no` varchar(100) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `bill_amount` varchar(100) DEFAULT NULL,
  `paid_amount` varchar(100) DEFAULT NULL,
  `due_amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`id`, `transaction_date`, `cash_memo_no`, `customer_id`, `description`, `bill_amount`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(2, '2024-07-01', 'ref-77', 3, '<p>test transaction 2<br></p>', '52500', '500', '52000.00', '2024-07-01 11:45:39', '2024-07-01 11:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `daily_payments`
--

CREATE TABLE `daily_payments` (
  `id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `mobile_bill` decimal(10,2) DEFAULT NULL,
  `snacks` decimal(10,2) DEFAULT NULL,
  `entertainment_bill` decimal(10,2) DEFAULT NULL,
  `others` decimal(10,2) DEFAULT NULL,
  `gift_for_customer` decimal(10,2) DEFAULT NULL,
  `ornaments_binding_bill` decimal(10,2) DEFAULT NULL,
  `interest_for_gold_lending` decimal(10,2) DEFAULT NULL,
  `vangary_loss` decimal(10,2) DEFAULT NULL,
  `pay_repair_bill` decimal(10,2) DEFAULT NULL,
  `photocopy` decimal(10,2) DEFAULT NULL,
  `management_expenses` decimal(10,2) DEFAULT NULL,
  `transport` decimal(10,2) DEFAULT NULL,
  `bkash_cost` decimal(10,2) DEFAULT NULL,
  `repairing_cost` decimal(10,2) DEFAULT NULL,
  `conveyance` decimal(10,2) DEFAULT NULL,
  `buy_lock_locker` decimal(10,2) DEFAULT NULL,
  `cash_back` decimal(10,2) DEFAULT NULL,
  `live_cost` decimal(10,2) DEFAULT NULL,
  `parking_cost` decimal(10,2) DEFAULT NULL,
  `vat_machine` decimal(10,2) DEFAULT NULL,
  `door_grease` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_payments`
--

INSERT INTO `daily_payments` (`id`, `payment_date`, `mobile_bill`, `snacks`, `entertainment_bill`, `others`, `gift_for_customer`, `ornaments_binding_bill`, `interest_for_gold_lending`, `vangary_loss`, `pay_repair_bill`, `photocopy`, `management_expenses`, `transport`, `bkash_cost`, `repairing_cost`, `conveyance`, `buy_lock_locker`, `cash_back`, `live_cost`, `parking_cost`, `vat_machine`, `door_grease`, `created_at`, `updated_at`) VALUES
(1, '2024-09-25', 100.00, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 540.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:45:58', '2024-09-25 11:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `daily_payments_others`
--

CREATE TABLE `daily_payments_others` (
  `id` int(11) NOT NULL,
  `daily_payment_id` int(100) DEFAULT NULL,
  `expense_name` varchar(100) DEFAULT NULL,
  `expense_amount` varchar(100) DEFAULT NULL,
  `expense_pay_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_payments_others`
--

INSERT INTO `daily_payments_others` (`id`, `daily_payment_id`, `expense_name`, `expense_amount`, `expense_pay_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'my other expense', '250', '2024-09-25', '2024-09-25 10:45:58', '2024-09-25 10:45:58'),
(2, 2, 'aa', '204', '2024-09-25', '2024-09-25 10:52:51', '2024-09-25 10:52:51'),
(3, 2, 'kk', '107', '2024-09-25', '2024-09-25 10:52:51', '2024-09-25 10:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', '22.7180905', '89.0687033', 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '22.6422689', '90.2003932', 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', '22.5781398', '89.9983909', 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', '22.7004179', '90.3731568', 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', '22.159182', '90.125581', 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', '23.2060195', '90.3477725', 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.264145', '89.918029', 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', '23.8602262', '90.0018293', 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', '23.5435742', '90.5354327', 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', '25.9165451', '89.4532409', 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `yearly_bonus_date` date DEFAULT NULL,
  `renew_date` date DEFAULT NULL,
  `renewed_yearly_bonus_date` date DEFAULT NULL,
  `per_day_salary` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `nid_number` varchar(100) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `emergency_contact_name_one` varchar(100) DEFAULT NULL,
  `emergency_contact_number_one` varchar(100) DEFAULT NULL,
  `emergency_contact_relation_one` varchar(10) DEFAULT NULL,
  `emergency_contact_name_two` varchar(100) DEFAULT NULL,
  `emergency_contact_number_two` varchar(100) DEFAULT NULL,
  `emergency_contact_relation_two` varchar(100) DEFAULT NULL,
  `emergency_contact_name_three` varchar(100) DEFAULT NULL,
  `emergency_contact_number_three` varchar(100) DEFAULT NULL,
  `emergency_contact_relation_three` varchar(100) DEFAULT NULL,
  `yearly_bonus_status` int(10) DEFAULT NULL COMMENT 'null = no bonus is inserted yet\r\n1 = already bonus inserted\r\n',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `designation`, `joining_date`, `yearly_bonus_date`, `renew_date`, `renewed_yearly_bonus_date`, `per_day_salary`, `father_name`, `mother_name`, `mobile_number`, `nid_number`, `present_address`, `permanent_address`, `birth_date`, `blood_group`, `nationality`, `marital_status`, `religion`, `gender`, `profile_pic`, `emergency_contact_name_one`, `emergency_contact_number_one`, `emergency_contact_relation_one`, `emergency_contact_name_two`, `emergency_contact_number_two`, `emergency_contact_relation_two`, `emergency_contact_name_three`, `emergency_contact_number_three`, `emergency_contact_relation_three`, `yearly_bonus_status`, `created_at`, `updated_at`) VALUES
(1, 'Kartik Paul', 'Sales Executive', '2021-05-02', NULL, NULL, NULL, '1200', NULL, NULL, NULL, NULL, NULL, NULL, '1995-07-04', 'A+', NULL, 'Single', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 04:42:42', '2024-08-12 04:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expense_type` int(10) DEFAULT NULL COMMENT '1 = Daily Payments, 2 = Monthly Payment, 3 = Yearly Payment\r\n4 = Marketing Cost\r\n5 = Payments\r\n6 = Investment Expenses\r\n7 = Loan/Advance',
  `expense_name` varchar(255) DEFAULT NULL,
  `expense_amount` varchar(100) DEFAULT NULL,
  `expense_pay_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_type`, `expense_name`, `expense_amount`, `expense_pay_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Snacks', '150', '2024-09-08', '2024-09-08 07:53:23', '2024-09-08 07:53:23'),
(2, 1, 'Parking Cost', '147', '2024-09-08', '2024-09-08 07:53:23', '2024-09-08 07:53:23'),
(3, 2, 'Salary (Kartik Paul)', '32400', '2024-09-08', '2024-09-08 10:28:09', '2024-09-08 10:28:09'),
(5, 2, 'Water Bill', '3390', '2024-09-08', '2024-09-08 10:28:09', '2024-09-08 10:28:09'),
(6, 2, 'Shop Rent', '52500', '2024-09-08', '2024-09-08 10:28:09', '2024-09-08 10:28:09'),
(8, 5, 'modhu', '240', '2024-09-29', '2024-09-29 05:33:59', '2024-09-29 05:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investment_expenses`
--

CREATE TABLE `investment_expenses` (
  `id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `buy_old_gold` decimal(10,2) DEFAULT NULL,
  `buy_ornaments_readymade` decimal(10,2) DEFAULT NULL,
  `buy_24k_gold_ananto` decimal(10,2) DEFAULT NULL,
  `buy_ornaments_from_ananto` decimal(10,2) DEFAULT NULL,
  `exchange_own_gold` decimal(10,2) DEFAULT NULL,
  `exchange_own_diamond` decimal(10,2) DEFAULT NULL,
  `buy_or_exchange_own_gold` decimal(10,2) DEFAULT NULL,
  `booking_cancel` decimal(10,2) DEFAULT NULL,
  `deposit_customer_24k_gold` decimal(10,2) DEFAULT NULL,
  `buy_diamond_from_mihir` decimal(10,2) DEFAULT NULL,
  `pay_to_sajal_bhai` decimal(10,2) DEFAULT NULL,
  `pay_to_ananto` decimal(10,2) DEFAULT NULL,
  `order_cancel` decimal(10,2) DEFAULT NULL,
  `deposit_in_city_bank` decimal(10,2) DEFAULT NULL,
  `pay_vangary_profit` decimal(10,2) DEFAULT NULL,
  `deposit_in_dutch_bangla_bank` decimal(10,2) DEFAULT NULL,
  `shop_decoration_advance` decimal(10,2) DEFAULT NULL,
  `pay_to_customer` decimal(10,2) DEFAULT NULL,
  `due_cancel` decimal(10,2) DEFAULT NULL,
  `box_bill_shamim_products` decimal(10,2) DEFAULT NULL,
  `diamond_test_machine_wet_machine` decimal(10,2) DEFAULT NULL,
  `buy_stone` decimal(10,2) DEFAULT NULL,
  `software_advance_payment` decimal(10,2) DEFAULT NULL,
  `buy_coffee_machine_computer` decimal(10,2) DEFAULT NULL,
  `stationary_printing` decimal(10,2) DEFAULT NULL,
  `balance_or_cash_in_hand` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_or_advance_expenses`
--

CREATE TABLE `loan_or_advance_expenses` (
  `id` int(11) NOT NULL,
  `employee_id` int(100) DEFAULT NULL,
  `expense_type` int(10) DEFAULT NULL COMMENT '1 = loan, 2 = advance',
  `expense_amount` varchar(100) DEFAULT NULL,
  `expense_pay_date` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_costs`
--

CREATE TABLE `marketing_costs` (
  `id` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `advertising` decimal(10,2) DEFAULT NULL,
  `sms_buy` decimal(10,2) DEFAULT NULL,
  `facebook_boosting` decimal(10,2) DEFAULT NULL,
  `facebook_design` decimal(10,2) DEFAULT NULL,
  `website_charge` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dashboard', '2024-06-03 05:38:50', '2024-06-03 05:38:50'),
(2, 'Add Booking', '2024-06-03 05:38:50', '2024-06-03 05:38:50'),
(3, 'Booking List', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(4, 'Edit Booking', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(5, 'Delete Booking', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(6, 'Client List', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(7, 'Edit Client', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(8, 'Delete Client', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(9, 'Product List', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(10, 'Add Product', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(11, 'Edit Product', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(12, 'Delete Product', '2024-06-03 05:42:05', '2024-06-03 05:42:05'),
(13, 'Stock List', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(14, 'Add Stock', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(15, 'Add Sale', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(16, 'Sale List', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(17, 'Edit Sale', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(18, 'Due Transaction List', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(19, 'Add Due Transaction', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(20, 'Edit Due Transaction', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(21, 'Delete Due Transaction', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(22, 'Supplier List', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(23, 'Add Supplier', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(24, 'Edit Supplier', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(25, 'Show Supplier', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(26, 'Delete Supplier', '2024-06-03 05:46:44', '2024-06-03 05:46:44'),
(27, 'Supplier Transaction List', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(28, 'Add Supplier Transaction', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(29, 'Edit Supplier Transaction', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(30, 'Delete Supplier Transaction', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(31, 'Product Categories List', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(32, 'Add Product Category', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(33, 'Edit Product Category', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(34, 'Delete Product Category', '2024-06-03 05:50:30', '2024-06-03 05:50:30'),
(35, 'Employee List', '2024-06-04 06:48:18', '2024-06-04 06:48:18'),
(36, 'Add Employee', '2024-06-04 06:48:18', '2024-06-04 06:48:18'),
(37, 'Edit Employee', '2024-06-04 06:48:18', '2024-06-04 06:48:18'),
(38, 'Delete Employee', '2024-06-04 06:48:18', '2024-06-04 06:48:18'),
(39, 'Payroll List', '2024-06-04 06:49:09', '2024-06-04 06:49:09'),
(40, 'Add Payroll', '2024-06-04 06:49:09', '2024-06-04 06:49:09'),
(41, 'Sale Settings', '2024-06-04 07:25:20', '2024-06-04 07:25:20'),
(42, 'Expense List', '2024-09-07 12:08:15', '2024-09-07 12:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permissions`
--

CREATE TABLE `menu_permissions` (
  `id` int(11) NOT NULL,
  `role` int(10) DEFAULT NULL,
  `menus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_permissions`
--

INSERT INTO `menu_permissions` (`id`, `role`, `menus`, `created_at`, `updated_at`) VALUES
(1, 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42', '2024-06-03 10:06:05', '2024-06-03 10:06:05'),
(2, 2, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42', '2024-06-03 10:06:42', '2024-06-03 10:06:42'),
(3, 3, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,35,36,37,38,39,40,41,42', '2024-06-03 10:07:23', '2024-06-03 10:07:23'),
(4, 5, '1,9,10,11', '2024-06-03 12:07:50', '2024-06-03 12:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_05_111531_create_product_categories_table', 2),
(6, '2024_05_11_041502_create_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payments`
--

CREATE TABLE `monthly_payments` (
  `id` int(11) NOT NULL,
  `payment_month` varchar(100) DEFAULT NULL,
  `shop_rent_advance` decimal(10,2) DEFAULT NULL,
  `staff_salary` int(11) DEFAULT NULL,
  `management_salary` int(11) DEFAULT NULL,
  `service_charge` decimal(10,2) DEFAULT NULL,
  `electricity_bill` decimal(10,2) DEFAULT NULL,
  `water_bill` decimal(10,2) DEFAULT NULL,
  `internet_bill` decimal(10,2) DEFAULT NULL,
  `jewelers_member_fees` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `vat_office` decimal(10,2) DEFAULT NULL,
  `vat_liton` decimal(10,2) DEFAULT NULL,
  `staff_bonus` decimal(10,2) DEFAULT NULL,
  `vat_memo` decimal(10,2) DEFAULT NULL,
  `market_member_fees` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payment_others`
--

CREATE TABLE `monthly_payment_others` (
  `id` int(100) NOT NULL,
  `monthly_payment_id` int(100) DEFAULT NULL,
  `expense_name` varchar(100) DEFAULT NULL,
  `expense_amount` varchar(100) DEFAULT NULL,
  `expense_pay_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_expenses`
--

CREATE TABLE `payment_expenses` (
  `id` int(11) NOT NULL,
  `expense_name` varchar(100) DEFAULT NULL,
  `expense_amount` varchar(100) DEFAULT NULL,
  `expense_pay_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `under_type` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 2 COMMENT '1=active, 2=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `under_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ADVANCE', 'Cash', 1, '2024-05-13 10:40:11', '2024-05-13 10:40:11'),
(2, 'CASH', 'Cash', 1, '2024-07-04 12:04:10', '2024-07-04 12:04:10'),
(3, 'DBBL-TRANSFER', 'Bank', 1, '2024-07-04 12:04:42', '2024-07-04 12:04:42'),
(4, 'CITY-TRANSFER', 'Bank', 1, '2024-07-04 12:04:58', '2024-07-04 12:04:58'),
(5, 'CBBL-TRANSFER', 'Bank', 1, '2024-07-04 12:05:10', '2024-07-04 12:05:10'),
(6, 'EXCHANGE GOLD (SENCO)', 'Gold', 1, '2024-07-04 12:05:27', '2024-07-04 12:05:27'),
(7, 'SALES RETURN', 'Cash', 1, '2024-07-04 12:05:43', '2024-07-04 12:05:43'),
(8, 'SENCO OLD GOLD', 'Gold', 1, '2024-07-04 12:06:00', '2024-07-04 12:06:00'),
(9, 'CUSTOMER OWN GOLD', 'Gold', 1, '2024-07-04 12:06:12', '2024-07-04 12:06:12'),
(10, 'DBBL-CARD', 'Card', 1, '2024-07-04 12:06:26', '2024-07-04 12:06:26'),
(11, 'CITY-CARD', 'Card', 1, '2024-07-04 12:06:40', '2024-07-04 12:06:40'),
(12, 'CBBL-CARD', 'Card', 1, '2024-07-04 12:06:53', '2024-07-04 12:06:53'),
(13, 'COMMUNITY BANK', 'Bank', 1, '2024-07-04 12:07:11', '2024-07-04 12:07:11'),
(14, 'BKASH-CITY BANK', 'Mobile Banking', 1, '2024-07-04 12:07:47', '2024-07-04 12:07:47'),
(15, 'BY CHEQUE', 'Cash', 1, '2024-07-04 12:08:00', '2024-07-04 12:08:00'),
(16, 'CASH BACK', 'Cash', 1, '2024-07-04 12:08:12', '2024-07-04 12:08:12'),
(17, 'EMI-SSL', 'Others', 1, '2024-07-04 12:08:23', '2024-07-04 12:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` int(11) NOT NULL,
  `employee` int(100) DEFAULT NULL,
  `salary_date` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `per_day_salary` varchar(100) DEFAULT NULL,
  `emp_total_bonus_day` varchar(100) DEFAULT NULL,
  `emp_total_bonus_amount` varchar(100) DEFAULT NULL,
  `bonus_eligible_month` varchar(100) DEFAULT NULL,
  `bonus_pay_month` varchar(100) DEFAULT NULL,
  `bonus_pay_amount` varchar(100) DEFAULT NULL,
  `total_working_day` varchar(100) DEFAULT NULL,
  `total_leave` varchar(100) DEFAULT NULL,
  `total_number_of_pay_day` varchar(100) DEFAULT NULL,
  `monthly_salary` varchar(100) DEFAULT NULL,
  `monthly_holiday_bonus` varchar(100) DEFAULT NULL,
  `total_daily_allowance` varchar(100) DEFAULT NULL,
  `total_travel_allowance` varchar(100) DEFAULT NULL,
  `rental_cost_allowance` varchar(100) DEFAULT NULL,
  `hospital_bill_allowance` varchar(100) DEFAULT NULL,
  `insurance_allowance` varchar(100) DEFAULT NULL,
  `sales_commission` varchar(100) DEFAULT NULL,
  `retail_commission` varchar(100) DEFAULT NULL,
  `total_others` varchar(100) DEFAULT NULL,
  `total_salary` varchar(100) DEFAULT NULL,
  `yearly_bonus` varchar(100) DEFAULT NULL,
  `total_payable_salary` varchar(100) DEFAULT NULL,
  `advance_less` varchar(100) DEFAULT NULL,
  `any_deduction` varchar(100) DEFAULT NULL,
  `final_pay_amount` varchar(100) DEFAULT NULL,
  `loan_advance` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employee`, `salary_date`, `joining_date`, `per_day_salary`, `emp_total_bonus_day`, `emp_total_bonus_amount`, `bonus_eligible_month`, `bonus_pay_month`, `bonus_pay_amount`, `total_working_day`, `total_leave`, `total_number_of_pay_day`, `monthly_salary`, `monthly_holiday_bonus`, `total_daily_allowance`, `total_travel_allowance`, `rental_cost_allowance`, `hospital_bill_allowance`, `insurance_allowance`, `sales_commission`, `retail_commission`, `total_others`, `total_salary`, `yearly_bonus`, `total_payable_salary`, `advance_less`, `any_deduction`, `final_pay_amount`, `loan_advance`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-09-08', '2021-05-02', '1200', NULL, '46800', '07-2021', '08-2021', '11700', '26', '0', '26', '31200', '1200', '0', '0', '0', '0', '0', '0', '0', '1200', '32400', '0', '32400', '0', '0', '32400', NULL, '2024-09-08 08:47:43', '2024-09-08 08:47:43'),
(2, 1, '2024-09-08', '2021-05-02', '1200', NULL, '46800', '07-2021', '08-2021', '11700', '26', '0', '26', '31200', '1200', '0', '0', '0', '0', '0', '0', '0', '1200', '32400', '0', '32400', '0', '20', '32380', NULL, '2024-09-08 09:14:21', '2024-09-08 09:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_nr` varchar(255) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL COMMENT '1=gold, 2=diamond',
  `weight` varchar(100) DEFAULT NULL,
  `carat` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `st_or_dia` varchar(100) DEFAULT NULL,
  `st_or_dia_price` varchar(100) DEFAULT NULL,
  `wage` varchar(100) DEFAULT NULL,
  `wage_type` varchar(100) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `purchase_price` varchar(100) DEFAULT NULL,
  `stock_type` int(11) DEFAULT NULL COMMENT '1=new stock, 2=exchange, 3=old gold, 4=s.return',
  `status` int(10) NOT NULL DEFAULT 1 COMMENT '1=fresh,2=sold, 3=booked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_nr`, `product_details`, `product_category`, `product_type`, `weight`, `carat`, `quantity`, `st_or_dia`, `st_or_dia_price`, `wage`, `wage_type`, `supplier`, `purchase_price`, `stock_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BNG-068', 'asdffsdfs', NULL, NULL, '3.8', NULL, NULL, NULL, NULL, '6.7', 'Fixed', NULL, NULL, 2, 1, NULL, NULL),
(11, 'dsf', 'aa@gmail.com', 9, NULL, '2.2', NULL, NULL, NULL, NULL, '2.6', 'Fixed', NULL, NULL, 1, 1, NULL, NULL),
(12, 'qqq', 'qq@gmai', 9, NULL, '32kg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(64, 'R2', 'RING 22K', NULL, NULL, '2.68', NULL, NULL, NULL, NULL, '4.8', 'Fixed', NULL, NULL, NULL, 1, NULL, NULL),
(65, 'R3', 'RING 21K', NULL, NULL, '2.68', NULL, NULL, NULL, '25000', '4.8', 'Percentage', NULL, NULL, NULL, 1, NULL, NULL),
(67, 'wedding bangles', 'bridal wedding bangles', 9, 1, '200gm', 1, '1', NULL, NULL, '2', 'Percentage', 5, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_category_name`, `created_at`, `updated_at`) VALUES
(6, 'pippipa', '2024-05-05 23:29:18', '2024-05-05 23:29:18'),
(7, 'aza', '2024-05-06 06:36:28', '2024-05-06 06:36:28'),
(9, 'jgg', '2024-05-07 04:59:08', '2024-05-07 04:59:08'),
(13, 'test1', '2024-06-04 00:28:39', '2024-06-04 00:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL COMMENT '1 = active, 2 = inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2024-06-02 11:33:21', '2024-06-02 11:33:21'),
(2, 'Admin', 1, '2024-06-02 11:38:32', '2024-06-02 11:38:32'),
(3, 'Manager', 1, '2024-06-02 11:38:42', '2024-06-02 11:38:42'),
(5, 'User 1', 1, '2024-06-02 11:50:43', '2024-06-02 11:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_number` varchar(255) DEFAULT NULL,
  `sale_type` int(100) DEFAULT NULL,
  `bin_no` varchar(100) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `client_no` int(255) DEFAULT NULL,
  `client_id` int(255) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `item_total_amount` varchar(255) DEFAULT NULL,
  `vat_amount` varchar(255) DEFAULT NULL,
  `subtotal_amount` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(100) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `total_paid_amount` varchar(255) DEFAULT NULL,
  `total_return_amount` varchar(255) DEFAULT NULL,
  `total_due_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_calculations`
--

CREATE TABLE `sale_calculations` (
  `id` int(11) NOT NULL,
  `sale_number` varchar(255) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `unit_price_amount` varchar(255) DEFAULT NULL,
  `wage` varchar(255) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_info` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_payment_calculations`
--

CREATE TABLE `sale_payment_calculations` (
  `id` int(11) NOT NULL,
  `sale_number` varchar(255) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_info` varchar(100) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_types`
--

CREATE TABLE `sale_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 2 COMMENT '1= active, 2= inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_types`
--

INSERT INTO `sale_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NORMAL', 1, '2024-07-07 18:54:50', '2024-07-07 18:54:50'),
(2, 'BOOKING', 1, '2024-07-07 18:55:04', '2024-07-07 18:55:04'),
(3, 'EXECHANGE', 1, '2024-07-07 18:55:14', '2024-07-07 18:55:14'),
(4, 'CORPORATE', 1, '2024-07-07 18:55:24', '2024-07-07 18:55:24'),
(5, 'ORDER SALE', 1, '2024-07-07 18:55:36', '2024-07-07 18:55:36'),
(6, 'SALES RETURN', 1, '2024-07-07 18:55:47', '2024-07-07 18:55:47'),
(7, 'DUE SALE', 1, '2024-07-07 18:55:57', '2024-07-07 18:55:57'),
(8, 'EMI SALE', 1, '2024-07-07 18:56:06', '2024-07-07 18:56:06'),
(9, 'SENCO', 1, '2024-07-07 18:56:16', '2024-07-07 18:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_cell` varchar(100) DEFAULT NULL,
  `bin` varchar(100) DEFAULT NULL,
  `jakat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `up` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_cell`, `bin`, `jakat`, `created_at`, `up`) VALUES
(1, 'SENCO Gold', '01513470125', '004315254-0101', '2.5', '2024-06-02 09:46:12', '2024-06-02 09:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `stock_memo` text DEFAULT NULL,
  `stock_date` date DEFAULT NULL,
  `stock_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_memo`, `stock_date`, `stock_name`, `created_at`, `updated_at`) VALUES
(1, '202407-13', '2024-07-13', 'Test Stock', '2024-07-13 11:23:41', '2024-07-13 11:23:41'),
(2, '202407-519', '2024-07-13', 'Test Stock-2', '2024-07-13 11:47:41', '2024-07-13 11:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `due_amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `due_amount`, `created_at`, `updated_at`) VALUES
(5, 'test supplier 1', '01513470130', NULL, '2024-07-01 12:56:01', '2024-07-01 12:56:01'),
(6, 'test supplier 2', '01313480120', NULL, '2024-07-01 12:56:24', '2024-07-01 12:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE `supplier_transactions` (
  `id` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `supplier_id` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `bill_amount` varchar(100) DEFAULT NULL,
  `paid_amount` varchar(100) DEFAULT NULL,
  `due_amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`id`, `transaction_date`, `reference`, `supplier_id`, `description`, `bill_amount`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, '2024-07-01', 'ref-3345', 6, '<p>transaction for test supplier 2<br></p>', '40500', '400', '40100.00', '2024-07-01 13:29:50', '2024-07-01 13:29:50'),
(3, '2024-07-02', 're-564', 5, '<p>tttt<br></p>', '200', '100', '100.00', '2024-07-02 13:13:11', '2024-07-02 13:13:11'),
(4, '2024-07-03', 'uhgkj', 5, 'aaaaaaaaaaaaaaa', '400', '20', '380.00', '2024-07-03 06:40:16', '2024-07-03 06:40:16'),
(5, '2024-07-03', 'aaa-3q24', 6, '<p>lhgjk<br></p>', '100', '50', '50.00', '2024-07-03 08:39:14', '2024-07-03 08:39:14'),
(6, '2024-07-03', 'sss-32', 5, '<p>kkk<br></p>', '200', '0', '200.00', '2024-07-03 09:49:48', '2024-07-03 09:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` int(11) NOT NULL,
  `terms` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `terms`, `created_at`, `updated_at`) VALUES
(2, '<p style=\"margin-left:8px\"><span style=\"font-size:10px;\">শর্তাবলীঃ<br>১) ক্যাশ মেমো ছাড়া কোন আপত্তি বা পরিবর্তন গ্রহনযোগ্য হবে না।&nbsp;২) স্বর্ণের মূল্য বাংলাদেশ জুয়েলারী সমিতি থেকে নির্ধারন করে দেয়া হয় যা জুয়েলারী সমিতির সদস্য<br>হিসেবে আমাদের অনুসরন করতে হয়। ৩) স্বর্ণের গহনা পরিবর্তনের ক্ষেত্রে বাজার মূল্য থেকে ১০% অথবা &nbsp;টাকা ফেরত নেয়ার ক্ষেত্রে বাজার মূল্য থেকে &nbsp;২০% কাটা হবে।<br>৪) ডায়মন্ডের&nbsp;গহনা পরিবর্তনের ক্ষেত্রে ক্যাশ মেমোতে উল্লেখিত মূল্য থেকে ১৫%&nbsp;অথবা &nbsp;টাকা ফেরত নেয়ার ক্ষেত্রে ক্যাশ মেমোতে&nbsp;উল্লেখিত মূল্য থেকে ২৫% কাটা হবে।<br>পরিবর্তন বা টাকা ফেরত এর ক্ষেত্রে আরও ১০% মজুরী ও ৫% ভ্যাট বাদ দেয়া হবে। ৫) সর্বোঅবস্থায় যেমন গহনা পরিবর্তন, পুরাতন স্বর্ণ ক্রয় ইত্যাদির সময় ভ্যাট, ট্যাক্স, মজুরী,<br>পাথর, মিনা ইত্যাদি&nbsp;বা যা স্বর্ন বা ডায়মন্ডের&nbsp;মূল্যের&nbsp;আওতার বাইরে তার টাকার পরিমান বাদ দিয়ে হিসাব করা হয় বা হবে । ৬) সরকারী ও বাজুস এর ক্রয় বিক্রয় নির্দেশনা ও&nbsp;<br>নীতিমালা মোতাবেক ক্রেতা নির্দেশনা ও&nbsp;নীতিমালা অনুসরন না করলে বিক্রেতাকে কোনভাবেই নিয়ম বা নীতি মানতে বাধ্য করতে পারবে না।&nbsp;৭) কোন ধরনের শারীরিক সমস্যা<br>বা ক্যামিকেল জাতীয় কোন ধরনের দ্রব্য ব্যবহারের কারনে রং পরিবর্তন হলে বিক্রেতা দায়ী থাকবে না।&nbsp;৮) দুবাই গোল্ড পাথর সহ বিক্রি করা হয় এবং কোন কারনে পরিবর্তন বা<br>ক্যাশব্যাক এর সময় পাথর সহ হিসেব করা হবে। (শর্ত প্রযোজ্য)&nbsp;৯) ব্যবহার না করে অক্ষত অবস্থায় ৭ দিনের মধ্যে পন্য ফেরত দিলে কোন টাকা কাটা যাবে না কিন্তু এই পরিবর্তন<br>একবারের জন্য প্রযোজ্য হবে।&nbsp;&nbsp;১০) ক্রেতা পন্য ও পন্যের ওজন, হলর্মাক, ডিজাইন দেখে ক্রয় করবেন এবং কোন সমস্যা হলে শোরুম কর্তৃপক্ষকে জানাবেন এবং কর্তৃপক্ষ<br>যথাযথ সমাধান করবেন। পরবর্তীতে কোন আপত্তি গ্রহনযোগ্য নয়। ১১) টাকা ফেরত নিতে হলে কমপক্ষে ৭ দিন সময় নিয়ে টাকা ফেরত দেয়া হবে।<br>১২) স্বর্নের নাকফুল, নথ পরিবর্তন অথবা টাকা ফেরত নেয়ার ক্ষেত্রে ক্যাশ মেমোতে&nbsp;উল্লেখিত মূল্য থেকে ৫০% বাদ দিয়ে হিসেব করা হবে।<br>১৩) কেডিম রিপেয়ার র্চাজ ফ্রি। কোন ধরনের লেজার রিপেয়ার বা স্বর্ন লাগলে তা র্চাজ প্রযোয্য।----</span><br type=\"_moz\"></p><p style=\"margin-left:8px\"><br></p>', '2024-05-13 13:08:56', '2024-05-13 13:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `today_rates`
--

CREATE TABLE `today_rates` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rate` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 2 COMMENT '1=active, 2=deactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `today_rates`
--

INSERT INTO `today_rates` (`id`, `name`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test1', '124', 1, '2024-05-07 10:18:24', '2024-05-07 10:18:24'),
(2, 'aaa', '76', 2, '2024-05-07 10:21:33', '2024-05-07 10:21:33'),
(3, 'sss', '213', 1, '2024-05-07 10:24:24', '2024-05-07 10:24:24'),
(6, 'ljhj', '677777', 2, '2024-05-07 10:25:25', '2024-05-07 10:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samer', 'sam@gmail.com', 1, 1, NULL, '$2y$10$YWBPMwqDLoIh4FYCERSxIe3fqbzpJT4vn2Ois1305viptAmEcMeQq', NULL, NULL, '2024-06-04 04:41:01'),
(2, 'Senco Gold', 'senco@gmail.com', 2, 1, NULL, '$2y$10$D25aMeeoynljhf.UmUuXXe2HBSEHBBV.Y0pYi3ekEz.PW/8NpD/KK', NULL, NULL, NULL),
(3, 'aa', 'uu@gmail.com', 5, 1, NULL, '$2y$10$Wo6wDmj5PbZ8aJ/W88CSBu8dGWQRkaWQG5JBRkauakZzI4ajzBq36', NULL, NULL, NULL),
(4, 'Wahid Rahman Ahmed', 'ww@gmail.com', 5, 2, NULL, '$2y$10$0vXIurVZo5Kgaj2HbwjMjOtA0WVPo2rHqQtGKnmmfA5YbJWzVcJPy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearly_payments`
--

CREATE TABLE `yearly_payments` (
  `id` int(11) NOT NULL,
  `payment_year` year(4) NOT NULL,
  `trade_license` decimal(10,2) DEFAULT NULL,
  `pahela_boishakh_expenses` decimal(10,2) DEFAULT NULL,
  `valentine_gate` decimal(10,2) DEFAULT NULL,
  `zakat` decimal(10,2) DEFAULT NULL,
  `dealing_licence` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearly_payments`
--

INSERT INTO `yearly_payments` (`id`, `payment_year`, `trade_license`, `pahela_boishakh_expenses`, `valentine_gate`, `zakat`, `dealing_licence`, `created_at`, `updated_at`) VALUES
(2, '2024', 200.00, 100.00, 321.00, 2500.00, 700.00, '2024-09-28 07:21:17', '2024-09-28 07:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `district_id` int(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 2 COMMENT '1=active, 2=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `district_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DHAKA', 47, NULL, 1, '2024-06-29 12:26:03', '2024-06-29 12:26:03'),
(2, 'BANASREE', 47, NULL, 1, '2024-06-29 12:26:32', '2024-06-29 12:26:32'),
(3, 'MIDDLE BADDA', 47, NULL, 1, '2024-06-29 12:26:47', '2024-06-29 12:26:47'),
(4, 'NIKETON', 47, NULL, 1, '2024-06-29 12:27:02', '2024-06-29 12:27:02'),
(5, 'GULSHAN-01', 47, NULL, 1, '2024-06-29 12:27:15', '2024-06-29 12:27:15'),
(6, 'GULSHAN-02', 47, NULL, 1, '2024-06-29 12:27:30', '2024-06-29 12:27:30'),
(7, 'MERUL BADDA', 47, NULL, 1, '2024-06-29 12:27:44', '2024-06-29 12:27:44'),
(8, 'SOUTH BADDA', 47, NULL, 1, '2024-06-29 12:28:06', '2024-06-29 12:28:06'),
(9, 'RAMPURA', 47, NULL, 1, '2024-06-29 12:28:26', '2024-06-29 12:28:26'),
(10, 'DIT PROJECT,RAMPURA', 47, NULL, 1, '2024-06-29 12:28:39', '2024-06-29 12:28:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_calculations`
--
ALTER TABLE `booking_calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_payment_calculations`
--
ALTER TABLE `booking_payment_calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_terms_and_conditions`
--
ALTER TABLE `booking_terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_categories`
--
ALTER TABLE `customer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_payments`
--
ALTER TABLE `daily_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_payments_others`
--
ALTER TABLE `daily_payments_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `investment_expenses`
--
ALTER TABLE `investment_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_or_advance_expenses`
--
ALTER TABLE `loan_or_advance_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_costs`
--
ALTER TABLE `marketing_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_permissions`
--
ALTER TABLE `menu_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_payment_others`
--
ALTER TABLE `monthly_payment_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_expenses`
--
ALTER TABLE `payment_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_calculations`
--
ALTER TABLE `sale_calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_payment_calculations`
--
ALTER TABLE `sale_payment_calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_types`
--
ALTER TABLE `sale_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_transactions`
--
ALTER TABLE `supplier_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `today_rates`
--
ALTER TABLE `today_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yearly_payments`
--
ALTER TABLE `yearly_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_calculations`
--
ALTER TABLE `booking_calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_payment_calculations`
--
ALTER TABLE `booking_payment_calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_terms_and_conditions`
--
ALTER TABLE `booking_terms_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_categories`
--
ALTER TABLE `customer_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_payments`
--
ALTER TABLE `daily_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_payments_others`
--
ALTER TABLE `daily_payments_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investment_expenses`
--
ALTER TABLE `investment_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_or_advance_expenses`
--
ALTER TABLE `loan_or_advance_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing_costs`
--
ALTER TABLE `marketing_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `menu_permissions`
--
ALTER TABLE `menu_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_payment_others`
--
ALTER TABLE `monthly_payment_others`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_expenses`
--
ALTER TABLE `payment_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_calculations`
--
ALTER TABLE `sale_calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_payment_calculations`
--
ALTER TABLE `sale_payment_calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_types`
--
ALTER TABLE `sale_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_transactions`
--
ALTER TABLE `supplier_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `today_rates`
--
ALTER TABLE `today_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yearly_payments`
--
ALTER TABLE `yearly_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
