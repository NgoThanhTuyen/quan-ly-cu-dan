-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 12:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quan_ly_quan_nhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Hộ nghèo', '2023-06-09 19:30:29', '2023-06-09 19:30:29'),
(3, 'Hộ cận nghèo', '2023-06-09 19:30:35', '2023-06-09 19:30:35'),
(4, 'Hộ trung bình', '2023-06-09 19:30:42', '2023-06-09 19:30:42'),
(5, 'Hộ khá giả', '2023-06-09 19:30:51', '2023-06-09 19:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `culture` tinyint(4) DEFAULT 0,
  `policy` tinyint(4) DEFAULT 0,
  `business` tinyint(4) DEFAULT 0,
  `export` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `name`, `category_id`, `culture`, `policy`, `business`, `export`, `status`, `note`, `created_at`, `updated_at`) VALUES
(3, 'Nguyễn Văn A', 3, 1, 1, 0, 0, 0, '<p>fsdfsd</p>', '2023-06-09 20:56:33', '2023-06-09 21:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `family_users`
--

CREATE TABLE `family_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_users`
--

INSERT INTO `family_users` (`id`, `family_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 3, 10, NULL, NULL),
(10, 3, 9, NULL, NULL),
(11, 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị và truy cập', 'Quản trị và truy cập', '2023-01-07 19:26:19', '2023-01-07 19:26:19'),
(2, 'Quản lý vai trò', 'Quản lý vai trò', '2023-01-07 19:26:28', '2023-01-07 19:26:28'),
(4, 'Quản lý cư dân', 'Quản lý cư dân', '2023-01-07 19:45:04', '2023-06-09 22:05:39'),
(5, 'Quản lý loại hộ gia đình', 'Quản lý loại hộ gia đình', '2023-06-09 22:13:46', '2023-06-09 22:13:46'),
(6, 'Quản lý hộ gia đình', 'Quản lý hộ gia đình', '2023-06-09 22:13:56', '2023-06-09 22:13:56'),
(7, 'Quản lý thẻ bảo hiểm', 'Quản lý thẻ bảo hiểm', '2023-06-10 01:40:25', '2023-06-10 01:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_cards`
--

CREATE TABLE `insurance_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `register_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_card` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_cards`
--

INSERT INTO `insurance_cards` (`id`, `user_id`, `code_card`, `start_date`, `end_date`, `register_place`, `time_card`, `created_at`, `updated_at`) VALUES
(1, 10, '152019403', '2023-06-12', '2025-06-12', 'Hà Nội', 2, '2023-06-10 02:30:35', '2023-06-10 02:36:45'),
(2, 9, 'MTBH5645645646', '2023-06-12', '2024-06-12', 'Bệnh viên E hà nội', 1, '2023-06-10 02:47:07', '2023-06-10 02:47:07');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_09_171541_laravel_entrust_setup_tables', 1),
(5, '2022_12_01_162613_create_working_process_table', 2),
(6, '2022_12_01_162758_create_ranks_table', 2),
(7, '2022_12_01_162858_create_learning_process_table', 2),
(8, '2022_12_01_162953_create_join_wars_table', 2),
(9, '2022_12_01_163144_create_rewards_table', 2),
(10, '2022_12_01_163217_create_disciplines_table', 2),
(11, '2023_06_09_181256_create_categories_table', 3),
(12, '2023_06_09_181422_create_families_table', 3),
(13, '2023_06_09_182843_create_family_users_table', 3),
(14, '2023_06_10_075602_create_insurance_cards_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `group_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'toan-quyen-quan-ly', 'Toàn quyền quản lý', 'Toàn quyền quản lý', 1, '2023-01-07 19:46:33', '2023-01-07 19:46:33'),
(2, 'truy-cap-trang', 'Truy cập trang', 'Truy cập trang', 1, '2023-01-07 19:46:51', '2023-01-07 19:46:51'),
(3, 'danh-sach-vai-tro', 'Danh sách vai trò', 'Danh sách vai trò', 2, '2023-01-07 19:47:12', '2023-01-07 19:47:12'),
(4, 'them-vai-tro', 'Thêm vai trò', 'Thêm vai trò', 2, '2023-01-07 19:47:24', '2023-01-07 19:47:24'),
(5, 'chinh-sua-vai-tro', 'Chỉnh sửa vai trò', 'Chỉnh sửa vai trò', 2, '2023-01-07 19:47:35', '2023-01-07 19:47:35'),
(6, 'xoa-vai-tro', 'Xóa vai trò', 'Xóa vai trò', 2, '2023-01-07 19:47:44', '2023-01-07 19:47:44'),
(11, 'danh-sach-cu-dan', 'Danh sách  cư dân', 'Danh sách cư dân', 4, '2023-01-07 19:50:00', '2023-06-09 22:07:35'),
(12, 'them-moi-cu-dan', 'Thêm mới  cư dân', 'Thêm mới  cư dân', 4, '2023-01-07 19:50:14', '2023-06-09 22:07:17'),
(13, 'chinh-sua-cu-dan', 'Chỉnh sửa cư dân', 'Chỉnh sửa cư dân', 4, '2023-01-07 19:50:23', '2023-06-09 22:09:35'),
(14, 'xoa-cu-dan', 'Xóa  cư dân', 'Xóa  cư dân', 4, '2023-01-07 19:50:34', '2023-06-09 22:06:58'),
(15, 'cap-nhat-mat-khau-va-trang-thai', 'Cập nhật mật khẩu và trạng thái', 'Cập nhật mật khẩu và trạng thái của quân nhân', 4, '2023-02-08 10:53:28', '2023-02-08 10:53:28'),
(16, 'tim-kiem-cu-dan', 'Tìm kiếm cư dân', 'Tìm kiếm cư dân', 4, '2023-02-09 09:58:38', '2023-06-09 22:06:10'),
(17, 'them-moi-loai-ho-gia-dinh', 'Thêm mới loại hộ gia đình', 'Thêm mới loại hộ gia đình', 5, '2023-06-09 22:14:15', '2023-06-09 22:16:06'),
(18, 'danh-sach-loai-ho-gia-dinh', 'Danh sách loại hộ gia đình', 'Danh sách loại hộ gia đình', 5, '2023-06-09 22:14:27', '2023-06-09 22:14:27'),
(19, 'chinh-sua-loai-ho-gia-dinh', 'Chỉnh sửa loại hộ gia đình', 'Chỉnh sửa loại hộ gia đình', 5, '2023-06-09 22:14:41', '2023-06-09 22:14:41'),
(20, 'xoa-loai-ho-gia-dinh', 'Xóa loại hộ gia đình', 'Xóa loại hộ gia đình', 5, '2023-06-09 22:14:51', '2023-06-09 22:14:51'),
(21, 'danh-sach-ho-gia-dinh', 'Danh sách hộ gia đình', 'Danh sách hộ gia đình', 6, '2023-06-09 22:15:08', '2023-06-09 22:15:08'),
(22, 'them-moi-ho-gia-dinh', 'Thêm mới hộ gia đình', 'Thêm mới hộ gia đình', 6, '2023-06-09 22:15:17', '2023-06-09 22:15:17'),
(23, 'chinh-sua-ho-gia-dinh', 'Chỉnh sửa hộ gia đình', 'Chỉnh sửa hộ gia đình', 6, '2023-06-09 22:15:28', '2023-06-09 22:15:28'),
(24, 'xoa-ho-gia-dinh', 'Xóa hộ gia đình', 'Xóa hộ gia đình', 6, '2023-06-09 22:15:39', '2023-06-09 22:15:39'),
(25, 'them-moi-the-bao-hiem', 'Thêm mới thẻ bảo hiểm', 'Thêm mới thẻ bảo hiểm', 7, '2023-06-10 01:40:40', '2023-06-10 01:40:40'),
(26, 'chinh-sua-the-bao-hiem', 'Chỉnh sửa thẻ bảo hiểm', 'Chỉnh sửa thẻ bảo hiểm', 7, '2023-06-10 01:40:50', '2023-06-10 01:40:50'),
(27, 'danh-sach-the-bao-hiem', 'Danh sách thẻ bảo hiểm', 'Danh sách thẻ bảo hiểm', 7, '2023-06-10 01:41:03', '2023-06-10 01:41:03'),
(28, 'xoa-the-bao-hiem', 'Xóa thẻ bảo hiểm', 'Xóa thẻ bảo hiểm', 7, '2023-06-10 01:41:15', '2023-06-10 01:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 5),
(2, 6),
(11, 4),
(11, 6),
(12, 4),
(12, 6),
(13, 4),
(13, 5),
(13, 6),
(14, 4),
(15, 4),
(16, 4),
(16, 5),
(16, 6),
(18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', NULL, '2023-01-07 19:55:41', '2023-01-07 19:55:41'),
(4, 'quan-ly-ho-so', 'Quản lý Hồ sơ', NULL, '2023-02-12 08:43:28', '2023-02-12 08:43:28'),
(5, 'nguoi-dan', 'Người đân', NULL, '2023-06-09 10:13:52', '2023-06-09 10:13:52'),
(6, 'vai-tro-moi', 'vai trò mới', NULL, '2023-06-10 02:48:04', '2023-06-10 02:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(4, 7),
(5, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh_the` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_cu_dan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_tai_khoan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_hien_tai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khai_sinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bi_danh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `noi_sinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `que_quan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tru_quan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_hien_tai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dan_toc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ton_giao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanh_phan_gia_dinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanh_phan_ban_than` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tham_gia_cach_mang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_quan_tuyen_dung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `don_vi_nhap_ngu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `don_vi_xuat_ngu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tai_nhap_ngu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_nap_dang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi_tuyen_bo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nguoi_gioi_thieu` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_noi_vao_doan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `van_hoa_pho_thong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoc_ham_hoc_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chi_huy_quan_ly` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ly_luan_chinh_tri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chuyen_mon_ky_thuat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngoai_ngu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tieng_dan_toc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danh_hieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_truong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sinh_song_o_nuoc_ngoai` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chien_truong_da_qua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suc_khoe_loai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benh_chinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thuong_tat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_he_bao_tin` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song_mui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dau_vet_dac_biet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap_bac` tinyint(4) DEFAULT NULL,
  `chuc_vu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `gioi_tinh` tinyint(4) DEFAULT 1,
  `ban_than` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanh_tich` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_dinh_noi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_dinh_ngoai` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_dinh_vo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh_vo` date DEFAULT NULL,
  `que_quan_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tru_quan_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dan_toc_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quoc_tich_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tu_nam_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ton_giao_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_noi_dang_ky_ket_hon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dang_vien_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doan_vien_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `van_hoa_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cho_o_hien_tai_vo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nghe_nghiep_vo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thong_tin_con` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `admin_id`, `password`, `phone`, `anh_the`, `ma_cu_dan`, `ten_tai_khoan`, `ten_hien_tai`, `ten_khai_sinh`, `ten_khac`, `bi_danh`, `ngay_sinh`, `noi_sinh`, `que_quan`, `tru_quan`, `dia_chi_hien_tai`, `dan_toc`, `ton_giao`, `thanh_phan_gia_dinh`, `thanh_phan_ban_than`, `tham_gia_cach_mang`, `co_quan_tuyen_dung`, `don_vi_nhap_ngu`, `don_vi_xuat_ngu`, `tai_nhap_ngu`, `ket_nap_dang`, `noi_tuyen_bo`, `nguoi_gioi_thieu`, `ngay_noi_vao_doan`, `van_hoa_pho_thong`, `hoc_ham_hoc_vi`, `chi_huy_quan_ly`, `ly_luan_chinh_tri`, `chuyen_mon_ky_thuat`, `ngoai_ngu`, `tieng_dan_toc`, `danh_hieu`, `so_truong`, `sinh_song_o_nuoc_ngoai`, `chien_truong_da_qua`, `suc_khoe_loai`, `benh_chinh`, `thuong_tat`, `lien_he_bao_tin`, `cao`, `song_mui`, `dau_vet_dac_biet`, `cap_bac`, `chuc_vu`, `trang_thai`, `gioi_tinh`, `ban_than`, `thanh_tich`, `gia_dinh_noi`, `gia_dinh_ngoai`, `gia_dinh_vo`, `ten_vo`, `ngay_sinh_vo`, `que_quan_vo`, `tru_quan_vo`, `dan_toc_vo`, `quoc_tich_vo`, `tu_nam_vo`, `ton_giao_vo`, `ngay_noi_dang_ky_ket_hon`, `dang_vien_vo`, `doan_vien_vo`, `van_hoa_vo`, `cho_o_hien_tai_vo`, `nghe_nghiep_vo`, `thong_tin_con`, `type`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$10$0WiafhthBcLXjNKpS80vnO..V9RAltg9AFirO4X8RD/YZYkr3yI4i', '0928817228', '2023-02-03__16444d5728915caf1d25b062c0fe8f24.jpg', 'nnQxW9VV', 'admin', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Uz2AzwFJiQVn6ltxvxGysGXL5XHQMHaU8UOLUr4M4EfOZHtwvXHvgAyfp8VM', '2022-12-29 07:58:18', '2023-02-07 09:24:31'),
(5, 'khoa3@gmail.com', 1, '$2y$10$Vivu6uaSIWN1bawHRFLazOqUX0GsvrNvo.9QBDXV8n8eAnzqM/j1K', '0359020898', NULL, '3432423423423423', NULL, 'Khoa 3', 'Khoa 3', NULL, NULL, '2022-12-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2023-01-11 05:21:14', '2023-01-27 10:11:13'),
(7, 'nguenvana@gmail.com', 1, '$2y$10$pqxzI1584okh32r4Oclb5e0l0OxRt7ToNOcJ0ejB3rBgQM4nGAU5C', '09288172285', '2023-02-07__d2a0a9cf1a5dcba2f2b4e22c9434fc2e.jpg', '34543534534', NULL, 'Nguyễn Văn A', 'dfsdfsdf', 'A', 'A', '2023-01-05', 'Tây Đô', 'Tây Đô', 'Tây Đô', 'Hà Nội', 'Kinh', 'Không', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '<p>đ&acirc;sdasdasdsa</p>', NULL, '<p>GIA Đ&Igrave;NH B&Ecirc;N NỘI</p>', '<p>GIA Đ&Igrave;NH B&Ecirc;N NGOẠI</p>', '<p>GIA Đ&Igrave;NH VỢ</p>', 'sfrdsfsdfsdfsdf', '2023-02-01', 'sdfsdfsdf', 'sdfsdfsdf', 'sdfsd', 'fsdfsdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdfsdf', 'sdfsd', 'sâdasdas', 'sdfsdf', 'sdfsdfsdf', '<p>sdfsdfsd</p>', '<p>Họ t&ecirc;n, giới t&iacute;nh, năm sinh, nghề nghiệp c&aacute;c con</p>', 2, NULL, NULL, NULL, '2023-06-10 02:48:59'),
(9, 'nguyenvanb@gmail.com', 1, '$2y$10$eESHKBh6xZeyfMP4aC/WxuPidrfsWdQMvPfN2RL3h1sVhDMbdIGNa', '0928817558', NULL, '1520194035', NULL, 'Nguyễn Văn B', 'Nguyễn Văn B', 'Nguyễn Văn B', 'Nguyễn Văn B', '1998-06-08', 'Hà Nội', 'Hà Nội', 'Hà Nội', 'Hà Nội', NULL, NULL, 'Bố, mẹ , vợ, con', 'Thành phần bản thân', NULL, NULL, NULL, NULL, NULL, NULL, 'Ngày và nơi tuyên bố chính thức', '<p>&nbsp;</p>\r\n\r\n<p>Họ t&ecirc;n, cấp bậc, chức vụ, đơn vị của người giới thiệu v&agrave;o Đảng</p>', 'Ngày và nơi vào đoàn TNCSHCM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-02-12 08:48:27'),
(10, 'nguyenvanc@gmail.com', 1, '$2y$10$sIGwOK6wBKPe.snLe3aIQuQyJvVvt/kWYSZ8DGrKSSJSW5ZO9lQ3K', '123456789', '2023-02-12__c9ef8310bf69693844126c149d19d731.png', '12345678910', NULL, 'Nguyễn Văn C', 'Nguyễn Văn C', 'Không', 'Không', '1986-07-01', 'Thụy Sơn, Thái Thụy, Thái Bình', 'Thụy Sơn, Thái Thụy, Thái Bình', 'Thụy Sơn, Thái Thụy, Thái Bình', '322 Lê Trọng Tấn, Hà Nội', 'Kinh', 'Không', 'Bần Nông', 'Bộ đội', 'Không', '29/09/2005', 'Lục Quân', 'Không', 'Không', '23/03/2008', 'Không', '<p>Nguyễn Văn T</p>', '26/03/2006', '12/12', 'Thạc sỹ', 'Chính trị viên', 'Thạc sỹ Mác Lêin', 'Trung', 'Không', 'Không', 'chiến sĩ thi đua', 'Mạng', '<p>Kh&ocirc;ng</p>', 'Không', '01', 'Không', '<p>Kh&ocirc;ng</p>', '<p>Nguyễn Thị T</p>', '1m68', '5cm', 'mụn ruồi sau gáy', NULL, NULL, 1, 1, '<p>Kh&ocirc;ng</p>', '<p>uiduifndiiowfmikmfkemfeef</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-06-09 10:19:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `families_category_id_foreign` (`category_id`);

--
-- Indexes for table `family_users`
--
ALTER TABLE `family_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_users_family_id_foreign` (`family_id`),
  ADD KEY `family_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_permission_name_unique` (`name`);

--
-- Indexes for table `insurance_cards`
--
ALTER TABLE `insurance_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_cards_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_group_permission_id_foreign` (`group_permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ma_quan_nhan_unique` (`ma_cu_dan`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_ten_tai_khoan_unique` (`ten_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `family_users`
--
ALTER TABLE `family_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insurance_cards`
--
ALTER TABLE `insurance_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `family_users`
--
ALTER TABLE `family_users`
  ADD CONSTRAINT `family_users_family_id_foreign` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `family_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insurance_cards`
--
ALTER TABLE `insurance_cards`
  ADD CONSTRAINT `insurance_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_group_permission_id_foreign` FOREIGN KEY (`group_permission_id`) REFERENCES `group_permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
