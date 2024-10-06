-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 06:43 AM
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
-- Database: `transportation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2024_10_04_141326_create_routes_table', 1),
(2, '2024_10_04_141327_create_positions_table', 1),
(3, '2024_10_04_142931_create_users_table', 1),
(4, '2024_10_04_155404_create_sessions_table', 2),
(5, '2024_10_04_185133_create_positions_table', 0),
(6, '2024_10_04_185133_create_routes_table', 0),
(7, '2024_10_04_185133_create_sessions_table', 0),
(8, '2024_10_04_185133_create_users_table', 0),
(9, '2024_10_05_154134_create_position_table', 0),
(10, '2024_10_05_172139_create_user_positions_table', 3),
(11, '2024_10_05_172141_create_buses_table', 3),
(12, '2024_10_05_172143_create_stops_table', 4),
(13, '2024_10_05_172144_create_route_stop_table', 4),
(14, '2024_10_05_172146_create_schedules_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `halte_name` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `rute` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `halte_name`, `latitude`, `longitude`, `rute`) VALUES
(1, 'Halte Mayjen Yono Suwoyo (dekat PTC/Pakuwon Trade Center)', -2.95152458, 104.76165291, 'Barat ke Timur'),
(2, 'Halte HR Muhammad', -7.28097001, 112.69250981, 'Barat ke Timur'),
(3, 'Halte Mayjen Sungkono (dekat Golden City Mall)', -7.63036856, 111.51380787, 'Barat ke Timur'),
(4, 'Halte Adityawarman', -7.29210216, 112.72918820, 'Barat ke Timur'),
(5, 'Halte Kutai', -7.29112131, 112.73540871, 'Barat ke Timur'),
(6, 'Halte Bengawan', -7.28966575, 112.73839201, 'Barat ke Timur'),
(7, 'Halte Raya Darmo (dekat Kebun Binatang Surabaya)', -7.28686686, 112.74013008, 'Barat ke Timur'),
(8, 'Halte Urip Sumoharjo', -6.21373936, 106.86326418, 'Barat ke Timur'),
(9, 'Halte Embong Malang', -7.25880356, 112.73514354, 'Barat ke Timur'),
(10, 'Halte Blauran', -7.25462457, 112.73495322, 'Barat ke Timur'),
(11, 'Halte Praban', -7.25493321, 112.73434168, 'Barat ke Timur'),
(12, 'Halte Tunjungan', -7.25963568, 112.74026049, 'Barat ke Timur'),
(13, 'Halte Gubernur Suryo (dekat Tugu Pahlawan)', -7.26357185, 112.74468058, 'Barat ke Timur'),
(14, 'Halte Yos Sudarso', -6.85464249, 109.13721329, 'Barat ke Timur'),
(15, 'Halte Walikota Mustajab', -7.26170868, 112.75039992, 'Barat ke Timur'),
(16, 'Halte Dharmawangsa', -7.27263856, 112.75932625, 'Barat ke Timur'),
(17, 'Halte Kertajaya', -7.27801816, 112.75534164, 'Barat ke Timur'),
(18, 'Halte Manyar Kertoarjo', -7.27884814, 112.76537304, 'Barat ke Timur'),
(19, 'Halte Kertajaya Indah (dekat Bundaran ITS)', -7.27938134, 112.79050705, 'Barat ke Timur'),
(20, 'Halte Kertajaya Indah (Bundaran ITS)', -7.27938134, 112.79050705, 'Timur ke Barat'),
(21, 'Halte Manyar Kertoarjo', -7.27884814, 112.76537304, 'Timur ke Barat'),
(22, 'Halte Kertajaya', -7.27801816, 112.75534164, 'Timur ke Barat'),
(23, 'Halte Dharmawangsa', -7.27263856, 112.75932625, 'Timur ke Barat'),
(24, 'Halte Prof. Dr. Moestopo', -7.26847777, 112.75739029, 'Timur ke Barat'),
(25, 'Halte Gubeng Pojok', -7.26238183, 112.75131224, 'Timur ke Barat'),
(26, 'Halte Pemuda', -7.26513857, 112.74814362, 'Timur ke Barat'),
(27, 'Halte Panglima Sudirman', -7.26851795, 112.74384750, 'Timur ke Barat'),
(28, 'Halte Urip Sumoharjo', -6.21373936, 106.86326418, 'Timur ke Barat'),
(29, 'Halte Raya Darmo', -7.28686686, 112.74013008, 'Timur ke Barat'),
(30, 'Halte Bengawan', -7.28966575, 112.73839201, 'Timur ke Barat'),
(31, 'Halte Kutai', -7.29112131, 112.73540871, 'Timur ke Barat'),
(32, 'Halte Adityawarman', -7.29210216, 112.72918820, 'Timur ke Barat'),
(33, 'Halte Mayjen Sungkono', -7.63036856, 111.51380787, 'Timur ke Barat'),
(34, 'Halte HR Muhammad', -7.28097001, 112.69250981, 'Timur ke Barat'),
(35, 'Halte Mayjen Yono Suwoyo', -2.95152458, 104.76165291, 'Timur ke Barat'),
(36, 'Halte Rajawali', -7.23075695, 112.73295815, 'Utara ke Selatan'),
(37, 'Halte Jembatan Merah', -7.23537333, 112.73546271, 'Utara ke Selatan'),
(38, 'Halte Veteran', -7.23940281, 112.73751699, 'Utara ke Selatan'),
(39, 'Halte Tugu Pahlawan', -7.24401467, 112.73836720, 'Utara ke Selatan'),
(40, 'Halte Alun-alun Contong', -7.25360709, 112.73676863, 'Utara ke Selatan'),
(41, 'Halte Siola', -7.25733742, 112.73797437, 'Utara ke Selatan'),
(42, 'Halte Tunjungan', -7.25957181, 112.73919832, 'Utara ke Selatan'),
(43, 'Halte Simpang Dukuh', -7.26274297, 112.74192197, 'Utara ke Selatan'),
(44, 'Halte Gubernur Suryo', -7.26357309, 112.74406774, 'Utara ke Selatan'),
(45, 'Halte Panglima Sudirman', -7.26613783, 112.74505193, 'Utara ke Selatan'),
(46, 'Halte Sono Kembang', -7.26936400, 112.74419671, 'Utara ke Selatan'),
(47, 'Halte Urip Sumoharjo', -7.27480221, 112.74208866, 'Utara ke Selatan'),
(48, 'Halte Santa Maria', -7.28325151, 112.74029745, 'Utara ke Selatan'),
(49, 'Halte Darmo', -7.28610350, 112.73937470, 'Utara ke Selatan'),
(50, 'Halte Marmoyo', -7.29596146, 112.73952759, 'Utara ke Selatan'),
(51, 'Halte Joyoboyo', -7.29851844, 112.73790842, 'Utara ke Selatan'),
(52, 'Halte RSAL (Rumah Sakit Angkatan Laut)', -7.30801465, 112.73608122, 'Utara ke Selatan'),
(53, 'Halte Margorejo', -7.31620890, 112.73529007, 'Utara ke Selatan'),
(54, 'Halte UIN (Universitas Islam Negeri Sunan Ampel)', -7.32142619, 112.73344954, 'Utara ke Selatan'),
(55, 'Halte Jemur Ngawinan', -7.32854368, 112.73166236, 'Utara ke Selatan'),
(56, 'Halte Siwalankerto', -7.33668756, 112.72965842, 'Utara ke Selatan'),
(57, 'Halte Menanggal', -7.34329718, 112.72930776, 'Utara ke Selatan'),
(58, 'Halte Terminal Purabaya', -7.35189477, 112.72415785, 'Utara ke Selatan'),
(59, 'Halte Terminal Purabaya', -7.35189477, 112.72415785, 'Selatan ke Utara'),
(60, 'Halte Dukuh Menanggal', -7.34329716, 112.72887859, 'Selatan ke Utara'),
(61, 'Halte Siwalankerto', -7.33662371, 112.72873574, 'Selatan ke Utara'),
(62, 'Halte Taman Pelangi', -7.32906108, 112.73087430, 'Selatan ke Utara'),
(63, 'Halte RS Bhayangkara', -7.32478687, 112.73191736, 'Selatan ke Utara'),
(64, 'Halte UBHARA (Universitas Bhayangkara)', -7.32117403, 112.73246398, 'Selatan ke Utara'),
(65, 'Halte PUSVETMA', -7.31584422, 112.73365000, 'Selatan ke Utara'),
(66, 'Halte Ketintang', -7.30988362, 112.73489727, 'Selatan ke Utara'),
(67, 'Halte Joyoboyo', -7.29852908, 112.73785478, 'Selatan ke Utara'),
(68, 'Halte Museum BI (Bank Indonesia)', -7.28955549, 112.73977431, 'Selatan ke Utara'),
(69, 'Halte Darmo', -7.28616446, 112.73926269, 'Selatan ke Utara'),
(70, 'Halte Pandegiling', -7.27760815, 112.74108874, 'Selatan ke Utara'),
(71, 'Halte Basuki Rahmat', -7.27124287, 112.74153662, 'Selatan ke Utara'),
(72, 'Halte Kaliasin', -7.26454607, 112.74089728, 'Selatan ke Utara'),
(73, 'Halte Embong Malang', -7.25889160, 112.73411581, 'Selatan ke Utara'),
(74, 'Halte Blauran', -7.25462457, 112.73495322, 'Selatan ke Utara'),
(75, 'Halte Pirngadi', -7.25236352, 112.73476363, 'Selatan ke Utara'),
(76, 'Halte Pasar Turi', -7.24500903, 112.73698442, 'Selatan ke Utara'),
(77, 'Halte Masjid Kemayoran', -7.24330906, 112.73513781, 'Selatan ke Utara'),
(78, 'Halte Indrapura', -7.24015535, 112.73269630, 'Selatan ke Utara'),
(79, 'Halte Rajawali', -7.23075695, 112.73295815, 'Selatan ke Utara');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `starting_point` varchar(255) NOT NULL,
  `ending_point` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `route_stop`
--

CREATE TABLE `route_stop` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `stop_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `stop_id` bigint(20) UNSIGNED NOT NULL,
  `departure_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d2GavokhHon2v9pip7zkCSy0yDdbR6ygrfQOkljB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWdpODZkVXhkc0t2OXhiUnpaWGUwQWFmc2ZmODhrUDNRbm5JZXJVUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9waWxpaGFuLXRyYW5zcG9ydGFzaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1728119339),
('Og2hdIDtmGNLavf2XRCSnP5U02dhCTzonTBsh938', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidURYd0ROU3JOTDBBaUJlOG5hU2dLUWNwQ244UnlqeE83SkloQWw3cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwtcnV0ZS1idXMvRDQ0MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728151046),
('ptWBYorGXjKS82gmalubznwLM14IKex9tuje0Taj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFB6UHhZWGkzWWVJQkZIMm0xTG93RFlHU0tTcUJhRVM1ZHlONzg5TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ydXRlLWJ1cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728127568);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'nofal', 'nofall201@gmail.com', '$2y$12$iPysZQlWE.IZNnCDqESWRe/qsnHoBZa7hnmkXabSTWPV93a4m1Isy', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

CREATE TABLE `user_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--
-- INSERT INTO `buses`
INSERT INTO `buses` (`id`, `bus_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bus 101', 'active', NOW(), NOW()),
(2, 'Bus 102', 'inactive', NOW(), NOW()),
(3, 'Bus 201', 'active', NOW(), NOW()),
(4, 'Bus 202', 'active', NOW(), NOW()),
(5, 'Bus 301', 'inactive', NOW(), NOW()),
(6, 'Bus 401', 'active', NOW(), NOW()),
(7, 'Bus 402', 'inactive', NOW(), NOW()),
(8, 'Bus 501', 'active', NOW(), NOW()),
(9, 'Bus 502', 'active', NOW(), NOW()),
(10, 'Bus 601', 'inactive', NOW(), NOW()),
(11, 'Bus 701', 'active', NOW(), NOW()),
(12, 'Bus 702', 'active', NOW(), NOW()),
(13, 'Bus 801', 'active', NOW(), NOW()),
(14, 'Bus 802', 'inactive', NOW(), NOW()),
(15, 'Bus 901', 'active', NOW(), NOW()),
(16, 'Bus 902', 'active', NOW(), NOW());

-- INSERT INTO `routes`
INSERT INTO `routes` (`id`, `vehicle_type`, `route_name`, `starting_point`, `ending_point`, `created_at`, `updated_at`) VALUES
(1, 'Bus', 'Rute Barat ke Timur', 'UNESA Lidah Kulon', 'ITS Surabaya', NOW(), NOW()),
(2, 'Bus', 'Rute Timur ke Barat', 'ITS Surabaya', 'UNESA Lidah Kulon', NOW(), NOW()),
(3, 'Bus', 'Rute Utara ke Selatan', 'Halte Rajawali', 'Terminal Purabaya', NOW(), NOW()),
(4, 'Bus', 'Rute Selatan ke Utara', 'Terminal Purabaya', 'Halte Rajawali', NOW(), NOW()),
(5, 'Bus', 'Rute Pusat ke Barat', 'Stasiun Pasar Turi', 'Terminal Benowo', NOW(), NOW()),
(6, 'Bus', 'Rute Pusat ke Selatan', 'Stasiun Gubeng', 'Terminal Bratang', NOW(), NOW()),
(7, 'Bus', 'Rute Selatan ke Pusat', 'Terminal Bratang', 'Stasiun Gubeng', NOW(), NOW()),
(8, 'Bus', 'Rute Barat ke Pusat', 'Terminal Benowo', 'Stasiun Pasar Turi', NOW(), NOW());

-- INSERT INTO `stops`
INSERT INTO `stops` (`id`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Halte Mayjen Yono Suwoyo', -7.280970006939536, 112.69250981260157, NOW(), NOW()),
(2, 'Halte HR Muhammad', -7.280970006939536, 112.69250981260157, NOW(), NOW()),
(3, 'Halte Mayjen Sungkono', -7.630368563759234, 111.5138078717293, NOW(), NOW()),
(4, 'Halte Adityawarman', -7.292102157174547, 112.72918820318885, NOW(), NOW()),
(5, 'Halte Kutai', -7.291121311029213, 112.73540870608768, NOW(), NOW()),
(6, 'Halte Bengawan', -7.289665750400762, 112.73839200688514, NOW(), NOW()),
(7, 'Halte Raya Darmo', -7.286866864526012, 112.74013007822721, NOW(), NOW()),
(8, 'Halte Urip Sumoharjo', -6.213739356481195, 106.86326417589967, NOW(), NOW()),
(9, 'Halte Embong Malang', -7.258803564332337, 112.7351435351634, NOW(), NOW()),
(10, 'Halte Blauran', -7.2546245669948455, 112.73495322108566, NOW(), NOW()),
(11, 'Halte Praban', -7.25493321240857, 112.73434167828408, NOW(), NOW()),
(12, 'Halte Tunjungan', -7.259635678800139, 112.74026049468242, NOW(), NOW()),
(13, 'Halte Gubernur Suryo', -7.263571851712677, 112.74468058359378, NOW(), NOW()),
(14, 'Halte Yos Sudarso', -6.854642493811956, 109.1372132891345, NOW(), NOW()),
(15, 'Halte Walikota Mustajab', -7.2617086799445945, 112.75039991797361, NOW(), NOW()),
(16, 'Halte Dharmawangsa', -7.272638560151038, 112.75932624761435, NOW(), NOW()),
(17, 'Halte Kertajaya', -7.278018160102411, 112.75534163941673, NOW(), NOW()),
(18, 'Halte Manyar Kertoarjo', -7.278848142526754, 112.76537303911046, NOW(), NOW()),
(19, 'Halte Kertajaya Indah', -7.27938134203582, 112.79050705106228, NOW(), NOW()),
(20, 'Halte Terminal Benowo', -7.204641, 112.635793, NOW(), NOW()),
(21, 'Halte Pakal', -7.206824, 112.644632, NOW(), NOW()),
(22, 'Halte Osowilangun', -7.220579, 112.663431, NOW(), NOW()),
(23, 'Halte Manukan', -7.231158, 112.681421, NOW(), NOW()),
(24, 'Halte Sukomanunggal', -7.240398, 112.695865, NOW(), NOW()),
(25, 'Halte PTC', -7.255658, 112.705712, NOW(), NOW()),
(26, 'Halte Kalimas', -7.259522, 112.754792, NOW(), NOW()),
(27, 'Halte Gubeng Lama', -7.271594, 112.756408, NOW(), NOW()),
(28, 'Halte Stasiun Gubeng', -7.276048, 112.758960, NOW(), NOW()),
(29, 'Halte Bratang', -7.285491, 112.769867, NOW(), NOW());

-- INSERT INTO `route_stop`
INSERT INTO `route_stop` (`route_id`, `stop_id`, `stop_order`) VALUES
(1, 1, 1), -- Rute Barat ke Timur
(1, 2, 2), -- Rute Barat ke Timur
(1, 3, 3), -- Rute Barat ke Timur
(1, 4, 4), -- Rute Barat ke Timur
(1, 5, 5), -- Rute Barat ke Timur
(1, 6, 6), -- Rute Barat ke Timur
(1, 7, 7), -- Rute Barat ke Timur
(1, 8, 8), -- Rute Barat ke Timur
(1, 9, 9), -- Rute Barat ke Timur
(1, 10, 10), -- Rute Barat ke Timur
(1, 11, 11), -- Rute Barat ke Timur
(1, 12, 12), -- Rute Barat ke Timur
(1, 13, 13), -- Rute Barat ke Timur
(1, 14, 14), -- Rute Barat ke Timur
(1, 15, 15), -- Rute Barat ke Timur
(1, 16, 16), -- Rute Barat ke Timur
(1, 17, 17), -- Rute Barat ke Timur
(2, 19, 1), -- Rute Timur ke Barat
(2, 18, 2), -- Rute Timur ke Barat
(2, 17, 3), -- Rute Timur ke Barat
(2, 16, 4), -- Rute Timur ke Barat
(2, 12, 5), -- Rute Timur ke Barat
(2, 11, 6), -- Rute Timur ke Barat
(2, 10, 7), -- Rute Timur ke Barat
(3, 20, 1), -- Rute Utara ke Selatan
(3, 21, 2), -- Rute Utara ke Selatan
(3, 22, 3), -- Rute Utara ke Selatan
(3, 23, 4), -- Rute Utara ke Selatan
(4, 24, 1), -- Rute Selatan ke Utara
(4, 25, 2), -- Rute Selatan ke Utara
(4, 26, 3), -- Rute Selatan ke Utara
(4, 27, 4); -- Rute Selatan ke Utara

-- INSERT INTO `schedules`
INSERT INTO `schedules` (`id`, `bus_id`, `stop_id`, `departure_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '06:00:00', NOW(), NOW()), -- Bus 101 berangkat dari Halte Mayjen Yono Suwoyo pada jam 6 pagi
(2, 1, 2, '06:15:00', NOW(), NOW()), -- Bus 101 berangkat dari Halte HR Muhammad pada jam 6:15 pagi
(3, 1, 3, '06:30:00', NOW(), NOW()), -- Bus 101 berangkat dari Halte Mayjen Sungkono pada jam 6:30 pagi
(4, 2, 19, '07:00:00', NOW(), NOW()), -- Bus 102 berangkat dari Halte Kertajaya Indah pada jam 7 pagi
(5, 2, 18, '07:15:00', NOW(), NOW()), -- Bus 102 berangkat dari Halte Manyar Kertoarjo pada jam 7:15 pagi
(6, 3, 17, '07:30:00', NOW(), NOW()), -- Bus 201 berangkat dari Halte Kertajaya pada jam 7:30 pagi
(7, 4, 16, '07:45:00', NOW(), NOW()), -- Bus 202 berangkat dari Halte Dharmawangsa pada jam 7:45 pagi
(8, 5, 12, '08:00:00', NOW(), NOW()), -- Bus 301 berangkat dari Halte Tunjungan pada jam 8 pagi
(9, 6, 11, '08:15:00', NOW(), NOW()), -- Bus 401 berangkat dari Halte Praban pada jam 8:15 pagi
(10, 7, 1, '08:30:00', NOW(), NOW()); -- Bus 402 berangkat dari Halte Mayjen Yono Suwoyo pada jam 8:30 pagi

-- INSERT INTO `positions`
INSERT INTO `positions` (`id`, `vehicle_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, -2.951524584912482, 104.76165290830552, NOW(), NOW()), -- Posisi Bus 101 saat ini di Halte Mayjen Yono Suwoyo
(2, 2, -7.280970006939536, 112.69250981260157, NOW(), NOW()), -- Posisi Bus 102 di Halte HR Muhammad
(3, 3, -7.630368563759234, 111.5138078717293, NOW(), NOW()), -- Posisi Bus 201 di Halte Mayjen Sungkono
(4, 4, -7.292102157174547, 112.72918820318885, NOW(), NOW()), -- Posisi Bus 202 di Halte Adityawarman
(5, 5, -7.291121311029213, 112.73540870608768, NOW(), NOW()), -- Posisi Bus 301 di Halte Kutai
(6, 6, -7.289665750400762, 112.73839200688514, NOW(), NOW()), -- Posisi Bus 401 di Halte Bengawan
(7, 7, -7.286866864526012, 112.74013007822721, NOW(), NOW()), -- Posisi Bus 402 di Halte Raya Darmo
(8, 8, -7.278018160102411, 112.75534163941673, NOW(), NOW()), -- Posisi Bus 501 di Halte Kertajaya
(9, 9, -7.204641, 112.635793, NOW(), NOW()), -- Posisi Bus 601 di Halte Terminal Benowo
(10, 10, -7.206824, 112.644632, NOW(), NOW()); -- Posisi Bus 701 di Halte Pakal

-- INSERT INTO `users`
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin One', 'admin1@example.com', '$2y$10$eVfJpqVJu5x/4mjDO1nIuOacIj/BuB6oOY5LRs0Zk1c8A8hItj/um', 'admin', NOW(), NOW()),
(2, 'Admin Two', 'admin2@example.com', '$2y$10$yMVZBoRn6D0/aYxTI6qFEOp9oXRVuDNG/Y0dbnzzmleKrOxR/Q6bu', 'admin', NOW(), NOW()),
(3, 'User One', 'user1@example.com', '$2y$10$K6KuyINkpTUK/c7HZoPCmeDi.3tVmkAIi7PniywNfSxyJfEpF3tAa', 'user', NOW(), NOW()),
(4, 'User Two', 'user2@example.com', '$2y$10$J1BtTfhbszMUVXnTtrGyHOV46I/6tTpHBsmujf2d0h.yXh9o/czPm', 'user', NOW(), NOW());

-- INSERT INTO `user_positions`
INSERT INTO `user_positions` (`id`, `user_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, -7.230756948514567, 112.73295815226726, NOW(), NOW()), -- Lokasi pengguna 1 (Halte Rajawali)
(2, 2, -7.235373334162313, 112.73546270860389, NOW(), NOW()), -- Lokasi pengguna 2 (Halte Jembatan Merah)
(3, 3, -7.2394028101220185, 112.73751699325906, NOW(), NOW()), -- Lokasi pengguna 3 (Halte Veteran)
(4, 4, -7.2440146743742195, 112.73836719511266, NOW(), NOW()), -- Lokasi pengguna 4 (Halte Tugu Pahlawan)
(5, 1, -7.253607089167062, 112.73676862745683, NOW(), NOW()), -- Lokasi pengguna 1 (Halte Alun-alun Contong)
(6, 2, -7.257337421201872, 112.73797436813, NOW(), NOW()), -- Lokasi pengguna 2 (Halte Siola)
(7, 3, -7.259571805750339, 112.


--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_stop`
--
ALTER TABLE `route_stop`
  ADD PRIMARY KEY (`route_id`,`stop_id`),
  ADD KEY `route_stop_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_bus_id_foreign` (`bus_id`),
  ADD KEY `schedules_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_positions_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_positions`
--
ALTER TABLE `user_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `route_stop`
--
ALTER TABLE `route_stop`
  ADD CONSTRAINT `route_stop_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `route_stop_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD CONSTRAINT `user_positions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

ALTER TABLE migrations MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
