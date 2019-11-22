-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 22 2019 г., 13:12
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hargos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `is_collection` tinyint(1) NOT NULL DEFAULT 0,
  `default` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_boolean_values`
--

CREATE TABLE `attribute_boolean_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` tinyint(1) NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_datetime_values`
--

CREATE TABLE `attribute_datetime_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` datetime NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_entity`
--

CREATE TABLE `attribute_entity` (
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_integer_values`
--

CREATE TABLE `attribute_integer_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` int(11) NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_text_values`
--

CREATE TABLE `attribute_text_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_varchar_values`
--

CREATE TABLE `attribute_varchar_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blocks`
--

CREATE TABLE `blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Безвизовый доступ', '<h4>Безвизовый доступ</h4>', '2019-11-14 05:04:52', '2019-11-14 05:34:13'),
(2, '23rf3fds', '<p>Возможность БЕЗ ВИЗЫ посетить рынок на территории Китая в границах МЦПС</p>', '2019-11-14 05:35:21', '2019-11-14 05:35:21'),
(3, 'vdf4rf3', '<h4>Без лишних платежейqwe</h4>', '2019-11-14 05:36:15', '2019-11-14 06:03:10'),
(4, 'fasd43', '<p>Освобождение от уплаты таможенных платежей, сумма и вес которых не превышает</p>', '2019-11-14 05:42:26', '2019-11-14 05:42:26'),
(5, 'vdsfvre', '<h4>Самовывоз</h4>', '2019-11-14 05:43:09', '2019-11-14 05:54:59'),
(6, 'brec23', '<p>Самовывоз закупленного товара без лишних вопросов</p>', '2019-11-14 05:43:26', '2019-11-14 05:43:26');

-- --------------------------------------------------------

--
-- Структура таблицы `boutiques`
--

CREATE TABLE `boutiques` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weechat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trading_house_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `popular` double(8,2) DEFAULT NULL,
  `top` double(8,2) DEFAULT NULL,
  `stock` double(8,2) DEFAULT NULL,
  `new` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `boutiques`
--

INSERT INTO `boutiques` (`id`, `name`, `seller_name`, `owner_name`, `languages`, `phone`, `whatsapp`, `weechat`, `full_description`, `images`, `trading_house_image`, `created_at`, `updated_at`, `popular`, `top`, `stock`, `new`) VALUES
(3, 'Oodji', 'Oodji', 'Oodji', 'Русский, казахский', '+7 (707) 606 04 61', '+7 (707) 606 04 61', '+7 (707) 606 04 61', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце</p>', '[\"boutiques\\/November2019\\/P6Adv3nR0UWEcH0B9yfC.jpg\"]', 'boutiques/November2019/WhddYPMYvcpBbs8SgpXu.png', '2019-11-15 02:27:46', '2019-11-21 04:36:26', 2.00, 2.00, 2.00, 1.00),
(4, 'asdfasdf', 'asdfsadf', 'gfgdfsgfdsg', 'eqrwefv', 'vf', 'dfgdfsgdfsg', 'dfsgdfbdfsbdfg', '<p>sdgfdsgfdsgdfsgdfs</p>', '[\"boutiques\\/November2019\\/VZXV9SwFADZKnNZSi4yn.png\",\"boutiques\\/November2019\\/xIEFBE5aGtAKqGTLI6CU.png\",\"boutiques\\/November2019\\/YRAHzQACy6nd8Q3pcSMX.png\"]', 'boutiques/November2019/NkMzey7jwnjYaBn4wfQA.jpg', '2019-11-15 02:27:46', '2019-11-21 02:41:19', 1.00, 1.00, 1.00, 1.00);

-- --------------------------------------------------------

--
-- Структура таблицы `boutique_categories`
--

CREATE TABLE `boutique_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `boutique_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `boutique_categories`
--

INSERT INTO `boutique_categories` (`id`, `boutique_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 4, 2, NULL, NULL),
(4, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `boutique_products`
--

CREATE TABLE `boutique_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `boutique_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_from` int(11) DEFAULT NULL,
  `price_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `boutique_products`
--

INSERT INTO `boutique_products` (`id`, `boutique_id`, `name`, `price_from`, `price_to`, `created_at`, `updated_at`) VALUES
(1, 3, 'asdfasdf', 2342, 2222222, '2019-11-18 05:39:04', '2019-11-18 05:39:04');

-- --------------------------------------------------------

--
-- Структура таблицы `boutique_reviews`
--

CREATE TABLE `boutique_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `boutique_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `boutique_reviews`
--

INSERT INTO `boutique_reviews` (`id`, `name`, `date`, `review`, `rating`, `likes`, `dislikes`, `boutique_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfadsf', '2019-11-22 05:26:10', 'sdafadsfsadf', 5.00, NULL, NULL, 3, '2019-11-22 05:26:10', '2019-11-22 05:26:10'),
(2, 'asdfsadf', '2019-11-22 05:26:21', 'sdfsadfsdafsadfsadf', 5.00, NULL, NULL, 3, '2019-11-22 05:26:21', '2019-11-22 05:26:21'),
(3, 'asdfsadf', '2019-11-22 05:26:29', 'dsfadsfdsafsadfsdaf', 5.00, NULL, NULL, 3, '2019-11-22 05:26:29', '2019-11-22 05:26:29'),
(4, 'sdfsagsags', '2019-11-22 05:26:38', 'dsafdsfasfsdf', 1.00, NULL, NULL, 3, '2019-11-22 05:26:38', '2019-11-22 05:26:38'),
(5, 'asdfsadf', '2019-11-22 05:27:01', 'sdfadsfsdafsaf', 4.00, NULL, NULL, 3, '2019-11-22 05:27:01', '2019-11-22 05:27:01');

-- --------------------------------------------------------

--
-- Структура таблицы `boutique_trading_houses`
--

CREATE TABLE `boutique_trading_houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `boutique_id` bigint(20) NOT NULL,
  `trading_house_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `boutique_trading_houses`
--

INSERT INTO `boutique_trading_houses` (`id`, `boutique_id`, `trading_house_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Детали', '[\"categories\\/November2019\\/tLl9JgfUR10RE0lZ64vB.png\"]', '2019-11-15 00:20:32', '2019-11-15 02:26:58'),
(2, 'Шубы', '[\"categories\\/November2019\\/tLl9JgfUR10RE0lZ64vB.png\"]', '2019-11-15 00:20:32', '2019-11-21 04:35:23'),
(3, 'Одежда', '[\"categories\\/November2019\\/5gsvbdPAuDUSgL688sj1.jpg\",\"categories\\/November2019\\/eSw9lHsz061KCOQDE8N8.jpeg\",\"categories\\/November2019\\/AmsyctyaPsqGVbK84Gif.jpeg\"]', '2019-11-21 04:35:13', '2019-11-21 04:35:13');

-- --------------------------------------------------------

--
-- Структура таблицы `category_stocks`
--

CREATE TABLE `category_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_stocks`
--

INSERT INTO `category_stocks` (`id`, `images`, `name`, `link`, `order`, `created_at`, `updated_at`) VALUES
(1, '[\"category-stocks\\/November2019\\/RWjnpJkwqNY5mEIbqbhF.jpg\",\"category-stocks\\/November2019\\/lmCQepwkVwl4tMmHVlmq.jpeg\",\"category-stocks\\/November2019\\/plHi9M7PZWv3iK70qMhF.jpeg\"]', 'Одежда', 'http://horgos.ibeacon.kz/boutique/3', 1, '2019-11-15 02:53:24', '2019-11-21 05:33:26'),
(2, '[\"category-stocks\\/November2019\\/PRpuK6DTmqKHd5z8AO1L.jpg\",\"category-stocks\\/November2019\\/30kRAYmcXhhldAg560VH.jpeg\",\"category-stocks\\/November2019\\/ZPkrwzU3bSCAQJ4dzunR.jpeg\"]', 'Одежда', 'http://horgos.ibeacon.kz//boutique/3', 2, '2019-11-15 03:24:47', '2019-11-22 04:18:50'),
(3, '[\"category-stocks\\/November2019\\/HLb6dyCP84sRNpxuyKNc.jpg\",\"category-stocks\\/November2019\\/VefpnJfeixc72h2dLBEE.jpeg\",\"category-stocks\\/November2019\\/mv6OxYFOlXfBZRhhXvG1.jpeg\"]', 'Одежда', 'http://horgos.ibeacon.kz/boutique/3', NULL, '2019-11-15 03:31:01', '2019-11-21 05:33:31');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Алматы', 1, NULL, '2019-11-22 00:45:50', '2019-11-22 00:45:50');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Казахстан', NULL, '2019-11-22 00:45:42', '2019-11-22 00:45:42');

-- --------------------------------------------------------

--
-- Структура таблицы `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Имя', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Пароль', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Токен восстановления', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Дата создания', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Дата обновления', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Аватар', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Роль', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Имя', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Дата создания', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Дата обновления', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Имя', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Дата создания', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Дата обновления', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Отображаемое имя', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Роль', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'name', 'text', 'Название', 1, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(25, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(26, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 2),
(27, 5, 'slider_id', 'text', 'Слайдер', 1, 0, 0, 1, 1, 1, '{}', 3),
(28, 5, 'title', 'text', 'Заголовок', 0, 1, 1, 1, 1, 1, '{}', 4),
(29, 5, 'description', 'text', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 5),
(30, 5, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 6),
(31, 5, 'link', 'text', 'Ссылка', 0, 1, 1, 1, 1, 1, '{}', 7),
(32, 5, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 8),
(33, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(34, 4, 'slider_hasmany_slide_relationship', 'relationship', 'Слайды', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Slide\",\"table\":\"slides\",\"type\":\"hasMany\",\"column\":\"slider_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"blocks\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(35, 5, 'slide_belongsto_slider_relationship', 'relationship', 'Слайдер', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Slider\",\"table\":\"sliders\",\"type\":\"belongsTo\",\"column\":\"slider_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"blocks\",\"pivot\":\"0\",\"taggable\":\"on\"}', 1),
(36, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(37, 6, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(38, 6, 'content', 'rich_text_box', 'Контент', 0, 1, 1, 1, 1, 1, '{}', 3),
(39, 6, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(40, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(41, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(42, 7, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 2),
(43, 7, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 3),
(46, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(47, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(48, 7, 'recommended_hasone_boutique_relationship', 'relationship', 'Бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(49, 7, 'boutique_id', 'text', 'Бутик', 0, 0, 0, 1, 1, 1, '{}', 4),
(50, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(51, 8, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(52, 8, 'seller_name', 'text', 'Имя продавца', 0, 1, 1, 1, 1, 1, '{}', 3),
(53, 8, 'owner_name', 'text', 'Имя владельца', 0, 1, 1, 1, 1, 1, '{}', 4),
(54, 8, 'languages', 'text', 'Язык общения', 0, 1, 1, 1, 1, 1, '{}', 5),
(55, 8, 'phone', 'text', 'Телефон', 0, 1, 1, 1, 1, 1, '{}', 6),
(56, 8, 'whatsapp', 'text', 'Whatsapp', 0, 1, 1, 1, 1, 1, '{}', 7),
(57, 8, 'weechat', 'text', 'Weechat', 0, 1, 1, 1, 1, 1, '{}', 8),
(58, 8, 'full_description', 'rich_text_box', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 9),
(59, 8, 'images', 'multiple_images', 'Картинки', 0, 1, 1, 1, 1, 1, '{}', 10),
(60, 8, 'trading_house_image', 'image', 'Карта', 0, 1, 1, 1, 1, 1, '{}', 11),
(61, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 12),
(62, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(63, 8, 'boutique_belongstomany_category_relationship', 'relationship', 'Категории', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"boutique_categories\",\"pivot\":\"1\",\"taggable\":\"on\"}', 14),
(64, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(65, 9, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(66, 9, 'images', 'multiple_images', 'Картинки', 0, 1, 1, 1, 1, 1, '{}', 3),
(67, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(68, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(69, 7, 'order', 'text', 'Порядок', 0, 0, 0, 1, 1, 1, '{}', 7),
(70, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(71, 10, 'images', 'multiple_images', 'Картинки', 0, 1, 1, 1, 1, 1, '{}', 2),
(72, 10, 'name', 'text', 'Категория', 0, 1, 1, 1, 1, 1, '{}', 3),
(73, 10, 'link', 'text', 'Ссылка', 0, 1, 1, 1, 1, 1, '{}', 4),
(74, 10, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 5),
(75, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(76, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(77, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(78, 11, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 2),
(79, 11, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 3),
(80, 11, 'link', 'text', 'Ссылка', 0, 1, 1, 1, 1, 1, '{}', 4),
(81, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(82, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(83, 11, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 7),
(84, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(85, 12, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 2),
(86, 12, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 3),
(87, 12, 'description', 'text', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 4),
(88, 12, 'link', 'text', 'Ссылка', 0, 1, 1, 1, 1, 1, '{}', 5),
(89, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(90, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(91, 12, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 8),
(92, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(93, 14, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{}', 2),
(94, 14, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 3),
(95, 14, 'description', 'text', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 4),
(96, 14, 'link', 'text', 'Ссылка', 0, 1, 1, 1, 1, 1, '{}', 5),
(97, 14, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(98, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(99, 14, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 8),
(100, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(101, 15, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(102, 15, 'images', 'multiple_images', 'Картинки', 0, 1, 1, 1, 1, 1, '{}', 3),
(103, 15, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(104, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(105, 8, 'boutique_belongstomany_trading_house_relationship', 'relationship', 'Торговый дом', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\TradingHouse\",\"table\":\"trading_houses\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"boutique_trading_houses\",\"pivot\":\"1\",\"taggable\":\"on\"}', 15),
(106, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(107, 16, 'boutique_id', 'text', 'Бутик', 0, 0, 0, 1, 1, 0, '{}', 3),
(108, 16, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 4),
(109, 16, 'price_from', 'number', 'Цена, от', 0, 1, 1, 1, 1, 1, '{}', 5),
(110, 16, 'price_to', 'number', 'Цена, до', 0, 1, 1, 1, 1, 1, '{}', 6),
(111, 16, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(112, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(113, 16, 'boutique_product_belongsto_boutique_relationship', 'relationship', 'Бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(114, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(115, 17, 'iframe', 'text', 'Iframe', 0, 1, 1, 1, 1, 1, '{}', 2),
(116, 17, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 3),
(117, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(118, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(119, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(120, 18, 'boutique_id', 'text', 'Boutique Id', 1, 0, 0, 1, 1, 0, '{}', 2),
(121, 18, 'related_boutique_id', 'text', 'Related Boutique Id', 1, 0, 0, 1, 1, 0, '{}', 3),
(122, 18, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 4),
(123, 18, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(124, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(125, 18, 'recommended_boutique_belongsto_boutique_relationship', 'relationship', 'Бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(126, 18, 'recommended_boutique_belongsto_boutique_relationship_1', 'relationship', 'Рекомендованный бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"related_boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(127, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(128, 19, 'boutique_id', 'text', 'Boutique Id', 1, 0, 0, 1, 1, 0, '{}', 2),
(129, 19, 'related_boutique_id', 'text', 'Related Boutique Id', 1, 0, 0, 1, 1, 0, '{}', 3),
(130, 19, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 4),
(131, 19, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(132, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(133, 19, 'related_boutique_belongsto_boutique_relationship', 'relationship', 'Бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(134, 19, 'related_boutique_belongsto_boutique_relationship_1', 'relationship', 'Похожий бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"related_boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(135, 15, 'logo', 'image', 'Логотип', 0, 1, 1, 1, 1, 1, '{}', 6),
(136, 8, 'popular', 'number', 'Популярность', 0, 1, 1, 1, 1, 1, '{}', 16),
(137, 8, 'top', 'number', 'Топ рейтинг', 0, 1, 1, 1, 1, 1, '{}', 17),
(138, 8, 'stock', 'text', 'Скидки рейтинг', 0, 1, 1, 1, 1, 1, '{}', 18),
(139, 8, 'new', 'text', 'New рейтинг', 0, 1, 1, 1, 1, 1, '{}', 19),
(140, 20, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(141, 20, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(142, 20, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 3),
(143, 20, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(144, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(145, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(146, 21, 'name', 'text', 'Название', 0, 1, 1, 1, 1, 1, '{}', 2),
(147, 21, 'country_id', 'text', 'Country Id', 0, 0, 0, 1, 1, 0, '{}', 3),
(148, 21, 'order', 'text', 'Order', 0, 0, 0, 0, 0, 0, '{}', 4),
(149, 21, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(150, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(151, 21, 'city_belongsto_country_relationship', 'relationship', 'Страна', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(152, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(153, 22, 'house_name', 'text', 'Название дома', 0, 1, 1, 1, 1, 1, '{}', 2),
(154, 22, 'name', 'text', 'Название тура', 0, 1, 1, 1, 1, 1, '{}', 3),
(155, 22, 'logo', 'image', 'Логотип дома', 0, 1, 1, 1, 1, 1, '{}', 4),
(156, 22, 'images', 'multiple_images', 'Картинки', 0, 1, 1, 1, 1, 1, '{}', 5),
(157, 22, 'title', 'rich_text_box', 'Заголовок', 0, 1, 1, 1, 1, 1, '{}', 6),
(158, 22, 'description', 'rich_text_box', 'Описание', 0, 1, 1, 1, 1, 1, '{}', 7),
(159, 22, 'content', 'rich_text_box', 'Содержание', 0, 1, 1, 1, 1, 1, '{}', 8),
(160, 22, 'phone_1', 'text', 'Телефон 1', 0, 1, 1, 1, 1, 1, '{}', 10),
(161, 22, 'phone_name_1', 'text', 'Имя для телефона 1', 0, 1, 1, 1, 1, 1, '{}', 9),
(162, 22, 'phone_2', 'text', 'Телефон 2', 0, 1, 1, 1, 1, 1, '{}', 12),
(163, 22, 'phone_name_2', 'text', 'Имя для телефона 2', 0, 1, 1, 1, 1, 1, '{}', 11),
(164, 22, 'tour_content', 'rich_text_box', 'Программа тура', 0, 1, 1, 1, 1, 1, '{}', 13),
(165, 22, 'tour_description', 'rich_text_box', 'Описание тура', 0, 1, 1, 1, 1, 1, '{}', 14),
(166, 22, 'coordinates', 'text', 'Координаты', 0, 1, 1, 1, 1, 1, '{}', 15),
(167, 22, 'country_id', 'text', 'Country Id', 0, 0, 0, 1, 1, 0, '{}', 16),
(168, 22, 'city_id', 'text', 'City Id', 0, 0, 0, 1, 1, 0, '{}', 17),
(169, 22, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 18),
(170, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 19),
(171, 22, 'tour_house_belongsto_country_relationship', 'relationship', 'Страна', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 20),
(172, 22, 'tour_house_belongsto_city_relationship', 'relationship', 'Город', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\City\",\"table\":\"cities\",\"type\":\"belongsTo\",\"column\":\"city_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 21),
(173, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(174, 23, 'name', 'text', 'Имя', 1, 1, 1, 1, 1, 1, '{}', 2),
(175, 23, 'date', 'timestamp', 'Дата', 1, 1, 1, 1, 1, 1, '{}', 3),
(176, 23, 'review', 'text_area', 'Отзыв', 1, 1, 1, 1, 1, 1, '{}', 4),
(177, 23, 'rating', 'number', 'Рейтинг', 1, 1, 1, 1, 1, 1, '{\"step\":0.1000000000000000055511151231257827021181583404541015625,\"min\":0,\"max\":5}', 5),
(178, 23, 'likes', 'number', 'Лайков', 1, 1, 1, 1, 1, 1, '{}', 6),
(179, 23, 'dislikes', 'number', 'Дизлайков', 1, 1, 1, 1, 1, 1, '{}', 7),
(180, 23, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 8),
(181, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(182, 23, 'boutique_review_belongsto_boutique_relationship', 'relationship', 'Бутик', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Boutique\",\"table\":\"boutiques\",\"type\":\"belongsTo\",\"column\":\"boutique_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_boolean_values\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(183, 23, 'boutique_id', 'text', 'Бутик', 0, 0, 0, 1, 1, 0, '{}', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'Пользователь', 'Пользователи', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(2, 'menus', 'menus', 'Меню', 'Меню', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(3, 'roles', 'roles', 'Роль', 'Роли', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(4, 'sliders', 'sliders', 'Слайдер', 'Слайдеры', NULL, 'App\\Slider', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-13 23:08:43', '2019-11-13 23:36:08'),
(5, 'slides', 'slides', 'Слайд', 'Слайды', NULL, 'App\\Slide', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-13 23:09:39', '2019-11-15 00:56:03'),
(6, 'blocks', 'blocks', 'Блок', 'Блоки', NULL, 'App\\Block', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-14 05:01:07', '2019-11-14 05:01:07'),
(7, 'recommendeds', 'recommendeds', 'Гиды рекомендуют', 'Гиды рекомендуют', NULL, 'App\\Recommended', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-14 23:13:39', '2019-11-15 02:42:42'),
(8, 'boutiques', 'boutiques', 'Бутик', 'Бутики', NULL, 'App\\Boutique', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-14 23:43:28', '2019-11-21 02:40:47'),
(9, 'categories', 'categories', 'Категория', 'Категории', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-15 00:19:48', '2019-11-15 02:26:47'),
(10, 'category_stocks', 'category-stocks', 'Скидки по категориям', 'Скидки по категориям', NULL, 'App\\CategoryStock', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-15 02:52:52', '2019-11-15 02:53:44'),
(11, 'top_products', 'top-products', 'Топ продукты', 'Топ продукты', NULL, 'App\\TopProduct', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-15 03:50:22', '2019-11-15 03:50:38'),
(12, 'popular_products', 'popular-products', 'Популярный продукт', 'Популярные продукты', NULL, 'App\\PopularProduct', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-15 04:22:09', '2019-11-15 04:22:58'),
(14, 'freebies', 'freebies', 'Халява', 'Халява', NULL, 'App\\Freebie', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-15 04:28:38', '2019-11-15 04:28:38'),
(15, 'trading_houses', 'trading-houses', 'Торговый дом', 'Торговые дома', NULL, 'App\\TradingHouse', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-18 04:28:07', '2019-11-19 02:53:44'),
(16, 'boutique_products', 'boutique-products', 'Продукт', 'Продукты', NULL, 'App\\BoutiqueProduct', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-18 05:29:49', '2019-11-18 05:30:57'),
(17, 'interviews', 'interviews', 'Интервью', 'Интервью', NULL, 'App\\Interview', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-18 22:04:10', '2019-11-18 22:04:10'),
(18, 'recommended_boutiques', 'recommended-boutiques', 'Рекомендованный бутик', 'Рекомендованные бутики', NULL, 'App\\RecommendedBoutique', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-19 00:33:54', '2019-11-19 00:36:29'),
(19, 'related_boutiques', 'related-boutiques', 'Похожий бутик', 'Похожие бутики', NULL, 'App\\RelatedBoutique', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-19 00:41:32', '2019-11-19 00:43:22'),
(20, 'countries', 'countries', 'Страна', 'Страны', NULL, 'App\\Country', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(21, 'cities', 'cities', 'Город', 'Города', NULL, 'App\\City', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-21 18:01:00', '2019-11-21 18:02:10'),
(22, 'tour_houses', 'tour-houses', 'Тур', 'Туры', NULL, 'App\\TourHouse', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-21 18:32:57', '2019-11-21 18:39:13'),
(23, 'boutique_reviews', 'boutique-reviews', 'Отзыв', 'Отзывы', NULL, 'App\\BoutiqueReview', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-22 04:34:56', '2019-11-22 04:37:07');

-- --------------------------------------------------------

--
-- Структура таблицы `freebies`
--

CREATE TABLE `freebies` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `freebies`
--

INSERT INTO `freebies` (`id`, `image`, `name`, `description`, `link`, `created_at`, `updated_at`, `order`) VALUES
(1, 'freebies/November2019/DSmNcwYaj9C1ecng6X1u.png', 'Инструменты', 'Инструменты для дома и сада', 'http://horgos.ibeacon.kz/boutique/3', '2019-11-15 04:28:50', '2019-11-21 05:36:17', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `interviews`
--

CREATE TABLE `interviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `iframe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `interviews`
--

INSERT INTO `interviews` (`id`, `iframe`, `order`, `created_at`, `updated_at`) VALUES
(1, '<iframe src=\"https://www.youtube.com/embed/tgbNymZ7vqY\"></iframe>', NULL, '2019-11-18 22:05:13', '2019-11-18 22:05:13');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(2, 'Главное меню сайта', '2019-11-13 03:12:51', '2019-11-13 03:12:51'),
(3, 'Каталог бутиков', '2019-11-13 04:10:32', '2019-11-13 04:10:32'),
(4, 'Меню в футере', '2019-11-13 22:54:06', '2019-11-13 22:54:06'),
(5, 'Торговые дома в футере', '2019-11-13 22:56:17', '2019-11-13 22:56:17');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Панель управления', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.dashboard', NULL),
(2, 1, 'Медиа', '', '_self', 'voyager-images', NULL, NULL, 5, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.media.index', NULL),
(3, 1, 'Пользователи', '', '_self', 'voyager-person', NULL, NULL, 3, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.users.index', NULL),
(4, 1, 'Роли', '', '_self', 'voyager-lock', NULL, NULL, 2, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.roles.index', NULL),
(5, 1, 'Инструменты', '', '_self', 'voyager-tools', NULL, NULL, 9, '2019-11-11 19:57:20', '2019-11-11 19:57:20', NULL, NULL),
(6, 1, 'Конструктор Меню', '', '_self', 'voyager-list', NULL, 5, 10, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.menus.index', NULL),
(7, 1, 'База данных', '', '_self', 'voyager-data', NULL, 5, 11, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.bread.index', NULL),
(10, 1, 'Настройки', '', '_self', 'voyager-settings', NULL, NULL, 14, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, NULL, 13, '2019-11-11 19:57:20', '2019-11-11 19:57:20', 'voyager.hooks', NULL),
(12, 2, 'О компании', 'http://localhost/hargos/public/about', '_self', NULL, '#000000', NULL, 15, '2019-11-12 21:13:40', '2019-11-12 21:21:23', NULL, ''),
(13, 2, 'торговые дома', 'http://localhost/hargos/public/trading-houses', '_self', NULL, '#000000', NULL, 16, '2019-11-12 21:21:57', '2019-11-20 19:48:22', NULL, ''),
(14, 2, 'тур операторы', '', '_self', NULL, '#000000', NULL, 17, '2019-11-12 21:22:02', '2019-11-12 21:22:02', NULL, ''),
(15, 2, 'советы', '', '_self', NULL, '#000000', NULL, 18, '2019-11-12 21:22:06', '2019-11-12 21:22:06', NULL, ''),
(16, 2, 'отзывы', '', '_self', NULL, '#000000', NULL, 19, '2019-11-12 21:22:10', '2019-11-12 21:22:10', NULL, ''),
(17, 2, 'новости', '', '_self', NULL, '#000000', NULL, 20, '2019-11-12 21:22:13', '2019-11-12 21:22:13', NULL, ''),
(18, 2, 'контакты', '', '_self', NULL, '#000000', NULL, 21, '2019-11-12 21:22:17', '2019-11-12 21:22:17', NULL, ''),
(19, 3, 'Одежда', '', '_self', NULL, '#000000', NULL, 1, '2019-11-12 22:10:54', '2019-11-12 22:21:37', NULL, ''),
(20, 3, 'Обувь', '', '_self', NULL, '#000000', NULL, 2, '2019-11-12 22:11:14', '2019-11-13 16:01:19', NULL, ''),
(21, 3, 'Белье', '', '_self', NULL, '#000000', NULL, 3, '2019-11-12 22:11:19', '2019-11-13 16:01:19', NULL, ''),
(22, 3, 'Большие размеры', '', '_self', NULL, '#000000', NULL, 4, '2019-11-12 22:11:23', '2019-11-13 16:01:19', NULL, ''),
(23, 3, 'Спецодежда', '', '_self', NULL, '#000000', NULL, 5, '2019-11-12 22:11:27', '2019-11-13 16:01:19', NULL, ''),
(24, 3, 'Одежда для офиса', '', '_self', NULL, '#000000', NULL, 6, '2019-11-12 22:11:31', '2019-11-13 16:01:19', NULL, ''),
(25, 3, 'Одежда для дома', '', '_self', NULL, '#000000', NULL, 7, '2019-11-12 22:11:35', '2019-11-13 16:01:19', NULL, ''),
(26, 3, 'Свадебные наряды', '', '_self', NULL, '#000000', NULL, 8, '2019-11-12 22:11:39', '2019-11-13 16:01:19', NULL, ''),
(27, 3, 'Будущие мамы', '', '_self', NULL, '#000000', NULL, 9, '2019-11-12 22:11:43', '2019-11-13 16:01:19', NULL, ''),
(28, 3, 'Все для пляжа', '', '_self', NULL, '#000000', NULL, 10, '2019-11-12 22:11:47', '2019-11-13 16:01:19', NULL, ''),
(29, 3, 'Мужская', '', '_self', NULL, '#000000', 19, 1, '2019-11-12 22:21:31', '2019-11-12 22:21:37', NULL, ''),
(30, 3, 'Контент', '', '_self', NULL, '#000000', 29, 1, '2019-11-12 22:43:43', '2019-11-12 22:43:59', NULL, ''),
(31, 3, 'Контент', '', '_self', NULL, '#000000', 29, 2, '2019-11-12 22:43:49', '2019-11-12 22:44:02', NULL, ''),
(32, 4, 'О компании', '', '_self', NULL, '#000000', NULL, 22, '2019-11-13 16:54:27', '2019-11-13 16:54:27', NULL, ''),
(33, 4, 'Торговые дома', '', '_self', NULL, '#000000', NULL, 23, '2019-11-13 16:54:31', '2019-11-13 16:54:31', NULL, ''),
(34, 4, 'Туры в хоргосе', '', '_self', NULL, '#000000', NULL, 24, '2019-11-13 16:54:36', '2019-11-13 16:54:36', NULL, ''),
(35, 4, 'Тур операторы', '', '_self', NULL, '#000000', NULL, 25, '2019-11-13 16:54:41', '2019-11-13 16:54:41', NULL, ''),
(36, 4, 'Контакты', '', '_self', NULL, '#000000', NULL, 26, '2019-11-13 16:54:45', '2019-11-13 16:54:45', NULL, ''),
(37, 4, 'Прочее', '', '_self', NULL, '#000000', NULL, 27, '2019-11-13 16:54:49', '2019-11-13 16:54:49', NULL, ''),
(38, 5, 'Кинг-Конг', '', '_self', NULL, '#000000', NULL, 28, '2019-11-13 16:56:28', '2019-11-13 16:56:28', NULL, ''),
(39, 5, 'Чжун Хэ', '', '_self', NULL, '#000000', NULL, 29, '2019-11-13 16:56:33', '2019-11-13 16:56:33', NULL, ''),
(40, 5, 'Цзянь Юань', '', '_self', NULL, '#000000', NULL, 30, '2019-11-13 16:56:37', '2019-11-13 16:56:37', NULL, ''),
(41, 5, 'Золотой Порт', '', '_self', NULL, '#000000', NULL, 31, '2019-11-13 16:56:42', '2019-11-13 16:56:42', NULL, ''),
(42, 5, 'Самрук', '', '_self', NULL, '#000000', NULL, 32, '2019-11-13 16:56:46', '2019-11-13 16:56:46', NULL, ''),
(43, 1, 'Слайдеры', '', '_self', NULL, NULL, NULL, 33, '2019-11-13 17:08:43', '2019-11-13 17:08:43', 'voyager.sliders.index', NULL),
(44, 1, 'Слайды', '', '_self', NULL, NULL, NULL, 34, '2019-11-13 17:09:39', '2019-11-13 17:09:39', 'voyager.slides.index', NULL),
(45, 1, 'Блоки', '', '_self', NULL, NULL, NULL, 35, '2019-11-13 23:01:07', '2019-11-13 23:01:07', 'voyager.blocks.index', NULL),
(46, 1, 'Гиды рекомендуют', '', '_self', NULL, NULL, NULL, 36, '2019-11-14 17:13:39', '2019-11-14 17:13:39', 'voyager.recommendeds.index', NULL),
(47, 1, 'Бутики', '', '_self', NULL, NULL, NULL, 37, '2019-11-14 17:43:28', '2019-11-14 17:43:28', 'voyager.boutiques.index', NULL),
(48, 1, 'Категории', '', '_self', NULL, NULL, NULL, 38, '2019-11-14 18:19:48', '2019-11-14 18:19:48', 'voyager.categories.index', NULL),
(49, 1, 'Скидки по категориям', '', '_self', NULL, NULL, NULL, 39, '2019-11-14 20:52:52', '2019-11-14 20:52:52', 'voyager.category-stocks.index', NULL),
(50, 1, 'Топ продукты', '', '_self', NULL, NULL, NULL, 40, '2019-11-14 21:50:22', '2019-11-14 21:50:22', 'voyager.top-products.index', NULL),
(51, 1, 'Популярные продукты', '', '_self', NULL, NULL, NULL, 41, '2019-11-14 22:22:09', '2019-11-14 22:22:09', 'voyager.popular-products.index', NULL),
(52, 1, 'Халява', '', '_self', NULL, NULL, NULL, 42, '2019-11-14 22:28:39', '2019-11-14 22:28:39', 'voyager.freebies.index', NULL),
(53, 1, 'Торговые дома', '', '_self', NULL, NULL, NULL, 43, '2019-11-17 22:28:07', '2019-11-17 22:28:07', 'voyager.trading-houses.index', NULL),
(54, 1, 'Продукты', '', '_self', NULL, NULL, NULL, 44, '2019-11-17 23:29:49', '2019-11-17 23:29:49', 'voyager.boutique-products.index', NULL),
(55, 1, 'Интервью', '', '_self', NULL, NULL, NULL, 45, '2019-11-18 16:04:10', '2019-11-18 16:04:10', 'voyager.interviews.index', NULL),
(56, 1, 'Рекомендованные бутики', '', '_self', NULL, NULL, NULL, 46, '2019-11-18 18:33:54', '2019-11-18 18:33:54', 'voyager.recommended-boutiques.index', NULL),
(57, 1, 'Похожие бутики', '', '_self', NULL, NULL, NULL, 47, '2019-11-18 18:41:32', '2019-11-18 18:41:32', 'voyager.related-boutiques.index', NULL),
(58, 1, 'Страны', '', '_self', NULL, NULL, NULL, 48, '2019-11-21 18:00:26', '2019-11-21 18:00:26', 'voyager.countries.index', NULL),
(59, 1, 'Города', '', '_self', NULL, NULL, NULL, 49, '2019-11-21 18:01:00', '2019-11-21 18:01:00', 'voyager.cities.index', NULL),
(60, 1, 'Туры', '', '_self', NULL, NULL, NULL, 50, '2019-11-21 18:32:57', '2019-11-21 18:32:57', 'voyager.tour-houses.index', NULL),
(61, 1, 'Отзывы', '', '_self', NULL, NULL, NULL, 51, '2019-11-22 04:34:56', '2019-11-22 04:34:56', 'voyager.boutique-reviews.index', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_11_08_095742_create_pages_table', 1),
(24, '2019_11_08_095830_create_boutiques_table', 1),
(25, '2019_11_08_100649_create_categories_table', 1),
(26, '2019_11_08_100803_create_boutique_categories_table', 1),
(27, '2019_11_08_100915_create_trading_houses_table', 1),
(28, '2019_11_08_101039_create_boutique_trading_houses_table', 1),
(29, '2019_11_08_101135_create_boutique_products_table', 1),
(30, '2019_11_11_051519_create_blocks_table', 1),
(41, '2017_01_19_040614_create_attributes_table', 2),
(42, '2017_01_19_040617_create_attribute_boolean_values_table', 2),
(43, '2017_01_19_040620_create_attribute_datetime_values_table', 2),
(44, '2017_01_19_040622_create_attribute_integer_values_table', 2),
(45, '2017_01_19_040703_create_attribute_varchar_values_table', 2),
(46, '2017_01_21_075238_create_attribute_entity_table', 2),
(47, '2017_03_30_012102_create_attribute_text_values_table', 2),
(48, '2019_11_12_082704_create_sliders_table', 2),
(49, '2019_11_12_082816_create_slides_table', 2),
(50, '2019_11_12_105411_create_recommendeds_table', 2),
(51, '2019_11_12_105433_create_top_products_table', 2),
(52, '2019_11_12_105441_create_popular_products_table', 2),
(53, '2019_11_12_105513_create_freebies_table', 2),
(54, '2019_11_15_083903_recomended_order', 3),
(55, '2019_11_15_084844_create_category_stocks_table', 4),
(56, '2019_11_15_094836_top_product_order', 5),
(57, '2019_11_15_101827_popular_product_order', 6),
(58, '2019_11_15_102701_freebie_order', 7),
(59, '2019_11_19_040159_create_interviews_table', 8),
(62, '2019_11_19_051737_create_related_boutiques_table', 9),
(63, '2019_11_19_051746_create_recommended_boutiques_table', 9),
(64, '2019_11_19_085202_trading_house_logo', 10),
(65, '2019_11_19_085838_trading_house_order', 11),
(67, '2019_11_21_083808_sort_boutique', 12),
(77, '2019_11_22_045849_create_countries_table', 13),
(78, '2019_11_22_045854_create_cities_table', 13),
(79, '2019_11_22_045857_create_tour_houses_table', 13),
(86, '2019_11_22_093358_create_tour_house_sliders_table', 14),
(87, '2019_11_22_093426_create_tour_house_sheldures_table', 14),
(88, '2019_11_22_102054_create_boutique_reviews_table', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(2, 'browse_bread', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(3, 'browse_database', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(4, 'browse_media', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(5, 'browse_compass', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(6, 'browse_menus', 'menus', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(7, 'read_menus', 'menus', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(8, 'edit_menus', 'menus', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(9, 'add_menus', 'menus', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(10, 'delete_menus', 'menus', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(11, 'browse_roles', 'roles', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(12, 'read_roles', 'roles', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(13, 'edit_roles', 'roles', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(14, 'add_roles', 'roles', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(15, 'delete_roles', 'roles', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(16, 'browse_users', 'users', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(17, 'read_users', 'users', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(18, 'edit_users', 'users', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(19, 'add_users', 'users', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(20, 'delete_users', 'users', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(21, 'browse_settings', 'settings', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(22, 'read_settings', 'settings', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(23, 'edit_settings', 'settings', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(24, 'add_settings', 'settings', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(25, 'delete_settings', 'settings', '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(26, 'browse_hooks', NULL, '2019-11-11 19:57:20', '2019-11-11 19:57:20'),
(27, 'browse_sliders', 'sliders', '2019-11-13 17:08:43', '2019-11-13 17:08:43'),
(28, 'read_sliders', 'sliders', '2019-11-13 17:08:43', '2019-11-13 17:08:43'),
(29, 'edit_sliders', 'sliders', '2019-11-13 17:08:43', '2019-11-13 17:08:43'),
(30, 'add_sliders', 'sliders', '2019-11-13 17:08:43', '2019-11-13 17:08:43'),
(31, 'delete_sliders', 'sliders', '2019-11-13 17:08:43', '2019-11-13 17:08:43'),
(32, 'browse_slides', 'slides', '2019-11-13 17:09:39', '2019-11-13 17:09:39'),
(33, 'read_slides', 'slides', '2019-11-13 17:09:39', '2019-11-13 17:09:39'),
(34, 'edit_slides', 'slides', '2019-11-13 17:09:39', '2019-11-13 17:09:39'),
(35, 'add_slides', 'slides', '2019-11-13 17:09:39', '2019-11-13 17:09:39'),
(36, 'delete_slides', 'slides', '2019-11-13 17:09:39', '2019-11-13 17:09:39'),
(37, 'browse_blocks', 'blocks', '2019-11-13 23:01:07', '2019-11-13 23:01:07'),
(38, 'read_blocks', 'blocks', '2019-11-13 23:01:07', '2019-11-13 23:01:07'),
(39, 'edit_blocks', 'blocks', '2019-11-13 23:01:07', '2019-11-13 23:01:07'),
(40, 'add_blocks', 'blocks', '2019-11-13 23:01:07', '2019-11-13 23:01:07'),
(41, 'delete_blocks', 'blocks', '2019-11-13 23:01:07', '2019-11-13 23:01:07'),
(42, 'browse_recommendeds', 'recommendeds', '2019-11-14 17:13:39', '2019-11-14 17:13:39'),
(43, 'read_recommendeds', 'recommendeds', '2019-11-14 17:13:39', '2019-11-14 17:13:39'),
(44, 'edit_recommendeds', 'recommendeds', '2019-11-14 17:13:39', '2019-11-14 17:13:39'),
(45, 'add_recommendeds', 'recommendeds', '2019-11-14 17:13:39', '2019-11-14 17:13:39'),
(46, 'delete_recommendeds', 'recommendeds', '2019-11-14 17:13:39', '2019-11-14 17:13:39'),
(47, 'browse_boutiques', 'boutiques', '2019-11-14 17:43:28', '2019-11-14 17:43:28'),
(48, 'read_boutiques', 'boutiques', '2019-11-14 17:43:28', '2019-11-14 17:43:28'),
(49, 'edit_boutiques', 'boutiques', '2019-11-14 17:43:28', '2019-11-14 17:43:28'),
(50, 'add_boutiques', 'boutiques', '2019-11-14 17:43:28', '2019-11-14 17:43:28'),
(51, 'delete_boutiques', 'boutiques', '2019-11-14 17:43:28', '2019-11-14 17:43:28'),
(52, 'browse_categories', 'categories', '2019-11-14 18:19:48', '2019-11-14 18:19:48'),
(53, 'read_categories', 'categories', '2019-11-14 18:19:48', '2019-11-14 18:19:48'),
(54, 'edit_categories', 'categories', '2019-11-14 18:19:48', '2019-11-14 18:19:48'),
(55, 'add_categories', 'categories', '2019-11-14 18:19:48', '2019-11-14 18:19:48'),
(56, 'delete_categories', 'categories', '2019-11-14 18:19:48', '2019-11-14 18:19:48'),
(57, 'browse_category_stocks', 'category_stocks', '2019-11-14 20:52:52', '2019-11-14 20:52:52'),
(58, 'read_category_stocks', 'category_stocks', '2019-11-14 20:52:52', '2019-11-14 20:52:52'),
(59, 'edit_category_stocks', 'category_stocks', '2019-11-14 20:52:52', '2019-11-14 20:52:52'),
(60, 'add_category_stocks', 'category_stocks', '2019-11-14 20:52:52', '2019-11-14 20:52:52'),
(61, 'delete_category_stocks', 'category_stocks', '2019-11-14 20:52:52', '2019-11-14 20:52:52'),
(62, 'browse_top_products', 'top_products', '2019-11-14 21:50:22', '2019-11-14 21:50:22'),
(63, 'read_top_products', 'top_products', '2019-11-14 21:50:22', '2019-11-14 21:50:22'),
(64, 'edit_top_products', 'top_products', '2019-11-14 21:50:22', '2019-11-14 21:50:22'),
(65, 'add_top_products', 'top_products', '2019-11-14 21:50:22', '2019-11-14 21:50:22'),
(66, 'delete_top_products', 'top_products', '2019-11-14 21:50:22', '2019-11-14 21:50:22'),
(67, 'browse_popular_products', 'popular_products', '2019-11-14 22:22:09', '2019-11-14 22:22:09'),
(68, 'read_popular_products', 'popular_products', '2019-11-14 22:22:09', '2019-11-14 22:22:09'),
(69, 'edit_popular_products', 'popular_products', '2019-11-14 22:22:09', '2019-11-14 22:22:09'),
(70, 'add_popular_products', 'popular_products', '2019-11-14 22:22:09', '2019-11-14 22:22:09'),
(71, 'delete_popular_products', 'popular_products', '2019-11-14 22:22:09', '2019-11-14 22:22:09'),
(72, 'browse_freebies', 'freebies', '2019-11-14 22:28:38', '2019-11-14 22:28:38'),
(73, 'read_freebies', 'freebies', '2019-11-14 22:28:38', '2019-11-14 22:28:38'),
(74, 'edit_freebies', 'freebies', '2019-11-14 22:28:39', '2019-11-14 22:28:39'),
(75, 'add_freebies', 'freebies', '2019-11-14 22:28:39', '2019-11-14 22:28:39'),
(76, 'delete_freebies', 'freebies', '2019-11-14 22:28:39', '2019-11-14 22:28:39'),
(77, 'browse_trading_houses', 'trading_houses', '2019-11-17 22:28:07', '2019-11-17 22:28:07'),
(78, 'read_trading_houses', 'trading_houses', '2019-11-17 22:28:07', '2019-11-17 22:28:07'),
(79, 'edit_trading_houses', 'trading_houses', '2019-11-17 22:28:07', '2019-11-17 22:28:07'),
(80, 'add_trading_houses', 'trading_houses', '2019-11-17 22:28:07', '2019-11-17 22:28:07'),
(81, 'delete_trading_houses', 'trading_houses', '2019-11-17 22:28:07', '2019-11-17 22:28:07'),
(82, 'browse_boutique_products', 'boutique_products', '2019-11-17 23:29:49', '2019-11-17 23:29:49'),
(83, 'read_boutique_products', 'boutique_products', '2019-11-17 23:29:49', '2019-11-17 23:29:49'),
(84, 'edit_boutique_products', 'boutique_products', '2019-11-17 23:29:49', '2019-11-17 23:29:49'),
(85, 'add_boutique_products', 'boutique_products', '2019-11-17 23:29:49', '2019-11-17 23:29:49'),
(86, 'delete_boutique_products', 'boutique_products', '2019-11-17 23:29:49', '2019-11-17 23:29:49'),
(87, 'browse_interviews', 'interviews', '2019-11-18 16:04:10', '2019-11-18 16:04:10'),
(88, 'read_interviews', 'interviews', '2019-11-18 16:04:10', '2019-11-18 16:04:10'),
(89, 'edit_interviews', 'interviews', '2019-11-18 16:04:10', '2019-11-18 16:04:10'),
(90, 'add_interviews', 'interviews', '2019-11-18 16:04:10', '2019-11-18 16:04:10'),
(91, 'delete_interviews', 'interviews', '2019-11-18 16:04:10', '2019-11-18 16:04:10'),
(92, 'browse_recommended_boutiques', 'recommended_boutiques', '2019-11-18 18:33:54', '2019-11-18 18:33:54'),
(93, 'read_recommended_boutiques', 'recommended_boutiques', '2019-11-18 18:33:54', '2019-11-18 18:33:54'),
(94, 'edit_recommended_boutiques', 'recommended_boutiques', '2019-11-18 18:33:54', '2019-11-18 18:33:54'),
(95, 'add_recommended_boutiques', 'recommended_boutiques', '2019-11-18 18:33:54', '2019-11-18 18:33:54'),
(96, 'delete_recommended_boutiques', 'recommended_boutiques', '2019-11-18 18:33:54', '2019-11-18 18:33:54'),
(97, 'browse_related_boutiques', 'related_boutiques', '2019-11-18 18:41:32', '2019-11-18 18:41:32'),
(98, 'read_related_boutiques', 'related_boutiques', '2019-11-18 18:41:32', '2019-11-18 18:41:32'),
(99, 'edit_related_boutiques', 'related_boutiques', '2019-11-18 18:41:32', '2019-11-18 18:41:32'),
(100, 'add_related_boutiques', 'related_boutiques', '2019-11-18 18:41:32', '2019-11-18 18:41:32'),
(101, 'delete_related_boutiques', 'related_boutiques', '2019-11-18 18:41:32', '2019-11-18 18:41:32'),
(102, 'browse_countries', 'countries', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(103, 'read_countries', 'countries', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(104, 'edit_countries', 'countries', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(105, 'add_countries', 'countries', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(106, 'delete_countries', 'countries', '2019-11-21 18:00:26', '2019-11-21 18:00:26'),
(107, 'browse_cities', 'cities', '2019-11-21 18:01:00', '2019-11-21 18:01:00'),
(108, 'read_cities', 'cities', '2019-11-21 18:01:00', '2019-11-21 18:01:00'),
(109, 'edit_cities', 'cities', '2019-11-21 18:01:00', '2019-11-21 18:01:00'),
(110, 'add_cities', 'cities', '2019-11-21 18:01:00', '2019-11-21 18:01:00'),
(111, 'delete_cities', 'cities', '2019-11-21 18:01:00', '2019-11-21 18:01:00'),
(112, 'browse_tour_houses', 'tour_houses', '2019-11-21 18:32:57', '2019-11-21 18:32:57'),
(113, 'read_tour_houses', 'tour_houses', '2019-11-21 18:32:57', '2019-11-21 18:32:57'),
(114, 'edit_tour_houses', 'tour_houses', '2019-11-21 18:32:57', '2019-11-21 18:32:57'),
(115, 'add_tour_houses', 'tour_houses', '2019-11-21 18:32:57', '2019-11-21 18:32:57'),
(116, 'delete_tour_houses', 'tour_houses', '2019-11-21 18:32:57', '2019-11-21 18:32:57'),
(117, 'browse_boutique_reviews', 'boutique_reviews', '2019-11-22 04:34:56', '2019-11-22 04:34:56'),
(118, 'read_boutique_reviews', 'boutique_reviews', '2019-11-22 04:34:56', '2019-11-22 04:34:56'),
(119, 'edit_boutique_reviews', 'boutique_reviews', '2019-11-22 04:34:56', '2019-11-22 04:34:56'),
(120, 'add_boutique_reviews', 'boutique_reviews', '2019-11-22 04:34:56', '2019-11-22 04:34:56'),
(121, 'delete_boutique_reviews', 'boutique_reviews', '2019-11-22 04:34:56', '2019-11-22 04:34:56');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `popular_products`
--

CREATE TABLE `popular_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `popular_products`
--

INSERT INTO `popular_products` (`id`, `image`, `name`, `description`, `link`, `created_at`, `updated_at`, `order`) VALUES
(1, 'popular-products/November2019/FB1Fjlxi7pNSfj8wiV8n.png', 'Инструменты', 'Инструменты для дома и сада', 'http://horgos.ibeacon.kz/boutique/3', '2019-11-15 04:22:38', '2019-11-21 05:35:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `recommendeds`
--

CREATE TABLE `recommendeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boutique_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recommendeds`
--

INSERT INTO `recommendeds` (`id`, `image`, `name`, `boutique_id`, `created_at`, `updated_at`, `order`) VALUES
(3, 'recommendeds/November2019/CpjdqftgPqhZxfPAh3Ce.png', 'Одевайся с Oodji', 3, '2019-11-15 02:28:06', '2019-11-21 04:37:10', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `recommended_boutiques`
--

CREATE TABLE `recommended_boutiques` (
  `id` int(10) UNSIGNED NOT NULL,
  `boutique_id` bigint(20) NOT NULL,
  `related_boutique_id` bigint(20) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recommended_boutiques`
--

INSERT INTO `recommended_boutiques` (`id`, `boutique_id`, `related_boutique_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 3, 3, NULL, '2019-11-19 00:37:19', '2019-11-19 00:37:19');

-- --------------------------------------------------------

--
-- Структура таблицы `related_boutiques`
--

CREATE TABLE `related_boutiques` (
  `id` int(10) UNSIGNED NOT NULL,
  `boutique_id` bigint(20) NOT NULL,
  `related_boutique_id` bigint(20) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `related_boutiques`
--

INSERT INTO `related_boutiques` (`id`, `boutique_id`, `related_boutique_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 3, 3, NULL, '2019-11-19 00:43:38', '2019-11-19 00:43:38');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Администратор', '2019-11-12 01:57:20', '2019-11-12 01:57:20'),
(2, 'user', 'Обычный Пользователь', '2019-11-12 01:57:20', '2019-11-12 01:57:20');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Название Сайта', 'Название Сайта', '', 'text', 1, 'Site'),
(2, 'site.description', 'Описание Сайта', 'Описание Сайта', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Логотип Сайта', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Фоновое Изображение для Админки', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Название Админки', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Описание Админки', 'Добро пожаловать в Voyager. Пропавшую Админку для Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Загрузчик Админки', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Иконка Админки', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (используется для панели администратора)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Главный слайдер', '2019-11-15 01:45:07', '2019-11-15 01:49:15'),
(2, 'Специально для вас', '2019-11-15 01:58:14', '2019-11-15 01:58:14');

-- --------------------------------------------------------

--
-- Структура таблицы `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slides`
--

INSERT INTO `slides` (`id`, `slider_id`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Международный меховой город «Кинг Конг»', 'Меховой центр \"King Kong\" предлагает шубы, полушубки, пальто, шапки, дубленки, шарфы, куртки, женская одежда, зимние головные уборы из натурального меха, автошины, автоинструмент, телефоны и прочее...', 'slides/November2019/P36oTyNv9YcslBZ0Ma2l.png', 'http://horgos.ibeacon.kz/boutique/3', '2019-11-15 01:45:20', '2019-11-21 05:32:26'),
(2, 2, 'iPhone по акции! Успей!', 'Забери свой iPhone  по промоакции', 'slides/November2019/ZBhEZOdTu9vzBctWUxpz.png', 'asdfsadfdsf', '2019-11-15 01:58:28', '2019-11-21 04:43:50');

-- --------------------------------------------------------

--
-- Структура таблицы `top_products`
--

CREATE TABLE `top_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `top_products`
--

INSERT INTO `top_products` (`id`, `image`, `name`, `link`, `created_at`, `updated_at`, `order`) VALUES
(1, 'top-products/November2019/j1TN3TnbuEDq2Gf1fWzr.png', 'Инструменты', 'http://horgos.ibeacon.kz/boutique/3', '2019-11-15 03:50:59', '2019-11-21 05:34:45', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tour_houses`
--

CREATE TABLE `tour_houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_name_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tour_houses`
--

INSERT INTO `tour_houses` (`id`, `house_name`, `name`, `logo`, `images`, `title`, `description`, `content`, `phone_1`, `phone_name_1`, `phone_2`, `phone_name_2`, `tour_content`, `tour_description`, `coordinates`, `country_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'ТД “Даноне”', 'ТД “Даноне”', 'tour-houses/November2019/O3nH2Q44mquxuYudVGQW.png', '[\"tour-houses\\/November2019\\/X9imsVj8D994nhxp90Ne.png\"]', '<p>МЦПС Хоргос с компанией &laquo;<span style=\"color: #ff6600;\">BRAZZЕRSTOUR</span>&raquo;</p>', '<p>Шоп тур на Хоргос из Алматы - <strong>2 дня</strong></p>', '<p><strong>Организованные туры на 2 дня в МЦПС Хоргос</strong> созданы нами для тех - кто любит совершать покупки - не спеша, выбирая самые оптимальные цены и находя самые интересные товары.</p>\r\n<p>В двухдневный тур у Вас более <strong>14 часов</strong> на закупку, это достаточно что бы посетить 5 торговых домов и купить то - что Вы ищите. Опытные гиды подскажут Вам что, где и почём.</p>\r\n<p>В течении всего пребывания на <strong>МЦПС Хоргосе</strong> у Вас есть возможность оставлять свои покупки на хранение в месте сбора группы.</p>\r\n<p>Вы можете приобрести товары для личного пользования до <strong>25 кг</strong>. и на сумму эквивалентную не более <strong>500 USD</strong> при этом не растамаживая, а также пообщаться с китайцами.</p>', '+7 (747) 723-43-36', 'Сергей', '+7 (771) 404-41-05', 'Руфина', '<ul>\r\n<li>Сбор группы на парковке метро ст. <strong>Алатау с 21:00 до 21:30</strong> пересечение пр. Абая и ул. Жарокова г. Алматы.</li>\r\n<li>Выезд в <strong>21:30</strong>.</li>\r\n<li>По пути санитарная остановка, инструктаж группы.</li>\r\n<li>Прибытие на МЦПС Хоргос в 03:00 - 03:30 утра.</li>\r\n<li>В 07:15 начинаем проходить паспортный контроль. (По зеленому коридору)</li>\r\n<li>С 08:00 до 14:00 находимся на торговых домах МЦПС Хоргоса.</li>\r\n<li>В 14:30 сбор группы. Выезжаем на таможню РК (Заказные автобусы)</li>\r\n<li>15:00 проходим паспортный и таможенный контроль.</li>\r\n<li>16:00 получаем покупки в отделении выдачи МЦПС Хоргоса (Ускоренно без очереди)</li>\r\n<li>Прибытие в город Алматы 22:00 +/- час.</li>\r\n</ul>', '<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n<p>&nbsp;</p>', '47.45,34.23', 1, 1, '2019-11-22 00:38:13', '2019-11-22 02:10:55');

-- --------------------------------------------------------

--
-- Структура таблицы `tour_house_sheldures`
--

CREATE TABLE `tour_house_sheldures` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dates` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `times` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periods` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_house_id` bigint(20) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tour_house_sliders`
--

CREATE TABLE `tour_house_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_house_id` bigint(20) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `trading_houses`
--

CREATE TABLE `trading_houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `trading_houses`
--

INSERT INTO `trading_houses` (`id`, `name`, `images`, `created_at`, `updated_at`, `logo`, `order`) VALUES
(1, 'Oodji', '[\"trading-houses\\/November2019\\/4KJsz557dXxIjklnMXLH.jpg\",\"trading-houses\\/November2019\\/IwIqTJM4bUweySLWiorq.png\",\"trading-houses\\/November2019\\/6Cl1f2twFeweA0r3kDoU.png\"]', '2019-11-18 04:29:22', '2019-11-21 05:37:09', 'trading-houses/November2019/CV1UY6jFLFOC68r8FqA1.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'menu_items', 'title', 12, 'en', 'About', '2019-11-12 21:21:23', '2019-11-12 21:23:05'),
(2, 'menu_items', 'title', 19, 'en', 'Clothes', '2019-11-12 22:45:07', '2019-11-12 22:45:07'),
(3, 'menu_items', 'title', 29, 'en', 'Men', '2019-11-12 22:45:14', '2019-11-12 22:45:14'),
(4, 'data_rows', 'display_name', 22, 'en', 'Id', '2019-11-13 17:34:32', '2019-11-13 17:34:32'),
(5, 'data_rows', 'display_name', 23, 'en', 'Name', '2019-11-13 17:34:32', '2019-11-13 17:34:32'),
(6, 'data_rows', 'display_name', 24, 'en', 'Created At', '2019-11-13 17:34:33', '2019-11-13 17:34:33'),
(7, 'data_rows', 'display_name', 25, 'en', 'Updated At', '2019-11-13 17:34:33', '2019-11-13 17:34:33'),
(8, 'data_rows', 'display_name', 34, 'en', 'slides', '2019-11-13 17:34:33', '2019-11-13 17:34:33'),
(9, 'data_types', 'display_name_singular', 4, 'en', 'Слайдер', '2019-11-13 17:34:33', '2019-11-13 17:34:33'),
(10, 'data_types', 'display_name_plural', 4, 'en', 'Слайдеры', '2019-11-13 17:34:33', '2019-11-13 17:34:33'),
(11, 'data_rows', 'display_name', 26, 'en', 'Id', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(12, 'data_rows', 'display_name', 27, 'en', 'Слайдер', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(13, 'data_rows', 'display_name', 28, 'en', 'Заголовок', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(14, 'data_rows', 'display_name', 29, 'en', 'Описание', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(15, 'data_rows', 'display_name', 30, 'en', 'Картинка', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(16, 'data_rows', 'display_name', 31, 'en', 'Ссылка', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(17, 'data_rows', 'display_name', 32, 'en', 'Created At', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(18, 'data_rows', 'display_name', 33, 'en', 'Updated At', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(19, 'data_rows', 'display_name', 35, 'en', 'sliders', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(20, 'data_types', 'display_name_singular', 5, 'en', 'Слайд', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(21, 'data_types', 'display_name_plural', 5, 'en', 'Слайды', '2019-11-13 17:37:34', '2019-11-13 17:37:34'),
(22, 'slides', 'title', 2, 'en', 'FDADSF', '2019-11-13 17:50:51', '2019-11-13 17:50:51'),
(23, 'slides', 'description', 2, 'en', 'faadsfadf', '2019-11-13 17:50:51', '2019-11-13 17:55:21'),
(24, 'blocks', 'content', 1, 'en', '<p>выфвфвфвывы</p>', '2019-11-13 23:16:44', '2019-11-13 23:16:44'),
(25, 'blocks', 'content', 5, 'en', '<h4>Самовывоз</h4>', '2019-11-13 23:54:30', '2019-11-13 23:54:30'),
(26, 'blocks', 'content', 3, 'en', '<h4>Без лишних платежей</h4>', '2019-11-13 23:59:14', '2019-11-13 23:59:14'),
(33, 'data_rows', 'display_name', 41, 'en', 'Id', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(34, 'data_rows', 'display_name', 42, 'en', 'Картинка', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(35, 'data_rows', 'display_name', 43, 'en', 'Название', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(36, 'data_rows', 'display_name', 46, 'en', 'Created At', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(37, 'data_rows', 'display_name', 47, 'en', 'Updated At', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(38, 'data_rows', 'display_name', 48, 'en', 'boutiques', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(39, 'data_types', 'display_name_singular', 7, 'en', 'Гиды рекомендуют', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(40, 'data_types', 'display_name_plural', 7, 'en', 'Гиды рекомендуют', '2019-11-14 17:39:55', '2019-11-14 17:39:55'),
(41, 'data_rows', 'display_name', 49, 'en', 'Бутик', '2019-11-14 17:40:30', '2019-11-14 17:40:30'),
(42, 'data_rows', 'display_name', 50, 'en', 'Id', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(43, 'data_rows', 'display_name', 51, 'en', 'Название', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(44, 'data_rows', 'display_name', 52, 'en', 'Имя продавца', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(45, 'data_rows', 'display_name', 53, 'en', 'Имя владельца', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(46, 'data_rows', 'display_name', 54, 'en', 'Язык общения', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(47, 'data_rows', 'display_name', 55, 'en', 'Телефон', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(48, 'data_rows', 'display_name', 56, 'en', 'Whatsapp', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(49, 'data_rows', 'display_name', 57, 'en', 'Weechat', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(50, 'data_rows', 'display_name', 58, 'en', 'Описание', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(51, 'data_rows', 'display_name', 59, 'en', 'Картинки', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(52, 'data_rows', 'display_name', 60, 'en', 'Карта', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(53, 'data_rows', 'display_name', 61, 'en', 'Created At', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(54, 'data_rows', 'display_name', 62, 'en', 'Updated At', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(55, 'data_rows', 'display_name', 63, 'en', 'categories', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(56, 'data_types', 'display_name_singular', 8, 'en', 'Бутик', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(57, 'data_types', 'display_name_plural', 8, 'en', 'Бутики', '2019-11-14 18:20:18', '2019-11-14 18:20:18'),
(58, 'slides', 'title', 1, 'en', 'qwerqwer', '2019-11-14 20:13:04', '2019-11-14 20:13:04'),
(59, 'slides', 'description', 1, 'en', 'qwerqwerwqer', '2019-11-14 20:13:04', '2019-11-14 20:13:04'),
(60, 'data_rows', 'display_name', 64, 'en', 'Id', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(61, 'data_rows', 'display_name', 65, 'en', 'Название', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(62, 'data_rows', 'display_name', 66, 'en', 'Картинки', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(63, 'data_rows', 'display_name', 67, 'en', 'Created At', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(64, 'data_rows', 'display_name', 68, 'en', 'Updated At', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(65, 'data_types', 'display_name_singular', 9, 'en', 'Категория', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(66, 'data_types', 'display_name_plural', 9, 'en', 'Категории', '2019-11-14 20:26:47', '2019-11-14 20:26:47'),
(67, 'data_rows', 'display_name', 69, 'en', 'Порядок', '2019-11-14 20:42:01', '2019-11-14 20:42:01'),
(68, 'data_rows', 'display_name', 70, 'en', 'Id', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(69, 'data_rows', 'display_name', 71, 'en', 'Картинки', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(70, 'data_rows', 'display_name', 72, 'en', 'Категория', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(71, 'data_rows', 'display_name', 73, 'en', 'Ссылка', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(72, 'data_rows', 'display_name', 74, 'en', 'Order', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(73, 'data_rows', 'display_name', 75, 'en', 'Created At', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(74, 'data_rows', 'display_name', 76, 'en', 'Updated At', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(75, 'data_types', 'display_name_singular', 10, 'en', 'Скидки по категориям', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(76, 'data_types', 'display_name_plural', 10, 'en', 'Скидки по категориям', '2019-11-14 20:53:44', '2019-11-14 20:53:44'),
(77, 'category_stocks', 'name', 1, 'en', 'паваыпывапывап', '2019-11-14 21:08:08', '2019-11-14 21:08:08'),
(78, 'data_rows', 'display_name', 77, 'en', 'Id', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(79, 'data_rows', 'display_name', 78, 'en', 'Картинка', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(80, 'data_rows', 'display_name', 79, 'en', 'Название', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(81, 'data_rows', 'display_name', 80, 'en', 'Ссылка', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(82, 'data_rows', 'display_name', 81, 'en', 'Created At', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(83, 'data_rows', 'display_name', 82, 'en', 'Updated At', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(84, 'data_rows', 'display_name', 83, 'en', 'Order', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(85, 'data_types', 'display_name_singular', 11, 'en', 'Топ продукты', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(86, 'data_types', 'display_name_plural', 11, 'en', 'Топ продукты', '2019-11-14 21:50:38', '2019-11-14 21:50:38'),
(87, 'data_rows', 'display_name', 84, 'en', 'Id', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(88, 'data_rows', 'display_name', 85, 'en', 'Картинка', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(89, 'data_rows', 'display_name', 86, 'en', 'Название', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(90, 'data_rows', 'display_name', 87, 'en', 'Описание', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(91, 'data_rows', 'display_name', 88, 'en', 'Ссылка', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(92, 'data_rows', 'display_name', 89, 'en', 'Created At', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(93, 'data_rows', 'display_name', 90, 'en', 'Updated At', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(94, 'data_rows', 'display_name', 91, 'en', 'Order', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(95, 'data_types', 'display_name_singular', 12, 'en', 'Популярный продукт', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(96, 'data_types', 'display_name_plural', 12, 'en', 'Популярные продукты', '2019-11-14 22:22:58', '2019-11-14 22:22:58'),
(97, 'data_rows', 'display_name', 100, 'en', 'Id', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(98, 'data_rows', 'display_name', 101, 'en', 'Название', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(99, 'data_rows', 'display_name', 102, 'en', 'Картинки', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(100, 'data_rows', 'display_name', 103, 'en', 'Created At', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(101, 'data_rows', 'display_name', 104, 'en', 'Updated At', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(102, 'data_types', 'display_name_singular', 15, 'en', 'Торговый дом', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(103, 'data_types', 'display_name_plural', 15, 'en', 'Торговые дома', '2019-11-17 22:28:59', '2019-11-17 22:28:59'),
(104, 'boutiques', 'name', 3, 'en', 'asdfasdf', '2019-11-17 22:32:09', '2019-11-17 22:32:09'),
(105, 'data_rows', 'display_name', 106, 'en', 'Id', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(106, 'data_rows', 'display_name', 107, 'en', 'Бутик', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(107, 'data_rows', 'display_name', 108, 'en', 'Название', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(108, 'data_rows', 'display_name', 109, 'en', 'Цена, от', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(109, 'data_rows', 'display_name', 110, 'en', 'Цена, до', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(110, 'data_rows', 'display_name', 111, 'en', 'Created At', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(111, 'data_rows', 'display_name', 112, 'en', 'Updated At', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(112, 'data_rows', 'display_name', 113, 'en', 'boutiques', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(113, 'data_types', 'display_name_singular', 16, 'en', 'Продукт', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(114, 'data_types', 'display_name_plural', 16, 'en', 'Продукты', '2019-11-17 23:30:57', '2019-11-17 23:30:57'),
(115, 'data_rows', 'display_name', 105, 'en', 'trading_houses', '2019-11-17 23:42:54', '2019-11-17 23:42:54'),
(116, 'data_rows', 'display_name', 119, 'en', 'Id', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(117, 'data_rows', 'display_name', 120, 'en', 'Boutique Id', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(118, 'data_rows', 'display_name', 121, 'en', 'Related Boutique Id', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(119, 'data_rows', 'display_name', 122, 'en', 'Order', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(120, 'data_rows', 'display_name', 123, 'en', 'Created At', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(121, 'data_rows', 'display_name', 124, 'en', 'Updated At', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(122, 'data_rows', 'display_name', 125, 'en', 'boutiques', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(123, 'data_rows', 'display_name', 126, 'en', 'boutiques', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(124, 'data_types', 'display_name_singular', 18, 'en', 'Рекомендованный бутик', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(125, 'data_types', 'display_name_plural', 18, 'en', 'Рекомендованные бутики', '2019-11-18 18:35:42', '2019-11-18 18:35:42'),
(126, 'data_rows', 'display_name', 127, 'en', 'Id', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(127, 'data_rows', 'display_name', 128, 'en', 'Boutique Id', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(128, 'data_rows', 'display_name', 129, 'en', 'Related Boutique Id', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(129, 'data_rows', 'display_name', 130, 'en', 'Order', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(130, 'data_rows', 'display_name', 131, 'en', 'Created At', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(131, 'data_rows', 'display_name', 132, 'en', 'Updated At', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(132, 'data_rows', 'display_name', 133, 'en', 'boutiques', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(133, 'data_types', 'display_name_singular', 19, 'en', 'Похожий бутик', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(134, 'data_types', 'display_name_plural', 19, 'en', 'Похожие бутики', '2019-11-18 18:42:53', '2019-11-18 18:42:53'),
(135, 'data_rows', 'display_name', 134, 'en', 'boutiques', '2019-11-18 18:43:22', '2019-11-18 18:43:22'),
(136, 'menu_items', 'title', 13, 'en', 'торговые дома', '2019-11-20 19:48:06', '2019-11-20 19:48:06'),
(137, 'boutiques', 'name', 4, 'en', 'asdfasdf', '2019-11-20 20:41:19', '2019-11-20 20:41:19'),
(138, 'data_rows', 'display_name', 145, 'en', 'Id', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(139, 'data_rows', 'display_name', 146, 'en', 'Название', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(140, 'data_rows', 'display_name', 147, 'en', 'Country Id', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(141, 'data_rows', 'display_name', 148, 'en', 'Order', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(142, 'data_rows', 'display_name', 149, 'en', 'Created At', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(143, 'data_rows', 'display_name', 150, 'en', 'Updated At', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(144, 'data_rows', 'display_name', 151, 'en', 'countries', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(145, 'data_types', 'display_name_singular', 21, 'en', 'Город', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(146, 'data_types', 'display_name_plural', 21, 'en', 'Города', '2019-11-21 18:02:10', '2019-11-21 18:02:10'),
(147, 'data_rows', 'display_name', 152, 'en', 'Id', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(148, 'data_rows', 'display_name', 153, 'en', 'Название дома', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(149, 'data_rows', 'display_name', 154, 'en', 'Название тура', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(150, 'data_rows', 'display_name', 155, 'en', 'Логотип дома', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(151, 'data_rows', 'display_name', 156, 'en', 'Картинки', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(152, 'data_rows', 'display_name', 157, 'en', 'Заголовок', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(153, 'data_rows', 'display_name', 158, 'en', 'Описание', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(154, 'data_rows', 'display_name', 159, 'en', 'Содержание', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(155, 'data_rows', 'display_name', 160, 'en', 'Телефон 1', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(156, 'data_rows', 'display_name', 161, 'en', 'Имя для телефона 1', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(157, 'data_rows', 'display_name', 162, 'en', 'Телефон 2', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(158, 'data_rows', 'display_name', 163, 'en', 'Имя для телефона 2', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(159, 'data_rows', 'display_name', 164, 'en', 'Программа тура', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(160, 'data_rows', 'display_name', 165, 'en', 'Описание тура', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(161, 'data_rows', 'display_name', 166, 'en', 'Координаты', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(162, 'data_rows', 'display_name', 167, 'en', 'Country Id', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(163, 'data_rows', 'display_name', 168, 'en', 'City Id', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(164, 'data_rows', 'display_name', 169, 'en', 'Created At', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(165, 'data_rows', 'display_name', 170, 'en', 'Updated At', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(166, 'data_rows', 'display_name', 171, 'en', 'countries', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(167, 'data_rows', 'display_name', 172, 'en', 'cities', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(168, 'data_types', 'display_name_singular', 22, 'en', 'Тур', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(169, 'data_types', 'display_name_plural', 22, 'en', 'Туры', '2019-11-21 18:34:13', '2019-11-21 18:34:13'),
(170, 'category_stocks', 'name', 2, 'en', 'Одежда', '2019-11-22 04:18:50', '2019-11-22 04:18:50'),
(178, 'data_rows', 'display_name', 173, 'en', 'Id', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(179, 'data_rows', 'display_name', 174, 'en', 'Имя', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(180, 'data_rows', 'display_name', 175, 'en', 'Дата', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(181, 'data_rows', 'display_name', 176, 'en', 'Отзыв', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(182, 'data_rows', 'display_name', 177, 'en', 'Рейтинг', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(183, 'data_rows', 'display_name', 178, 'en', 'Лайков', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(184, 'data_rows', 'display_name', 179, 'en', 'Дизлайков', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(185, 'data_rows', 'display_name', 180, 'en', 'Created At', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(186, 'data_rows', 'display_name', 181, 'en', 'Updated At', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(187, 'data_rows', 'display_name', 182, 'en', 'boutiques', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(188, 'data_types', 'display_name_singular', 23, 'en', 'Отзыв', '2019-11-22 04:37:07', '2019-11-22 04:37:07'),
(189, 'data_types', 'display_name_plural', 23, 'en', 'Отзывы', '2019-11-22 04:37:07', '2019-11-22 04:37:07');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@site.com', 'users/default.png', NULL, '$2y$10$/5CLpeq13gUcbXEq6DrlMez2GVq3k1tIzEAZWJuuPis7HugAfei5S', 'F3QlsKaoNEeQgyiBmd3BM6ppLYfdTCvFwy2w4hQDkBg273Mj82xTHr7DTQyG', NULL, '2019-11-12 01:57:32', '2019-11-12 01:57:32'),
(2, 1, 'Max', 'admin@site.com2', 'users/default.png', NULL, '$2y$10$rXtqtxVFQWK1Da73UfVACuz0BhQGxuIP/FSYyWYp7ZF3eQ1Q6fTHe', 'qyMBJMR0Uwum2bnxTDJmeDKRMzoGF1bU06goDbxxCDKIflcM8dG6XUO0zz9G', '{\"locale\":\"ru\"}', '2019-11-21 22:20:31', '2019-11-21 22:20:31'),
(3, 2, 'фываыфвафыва', 'godmanshot@gmail.com', 'users/default.png', NULL, '$2y$10$ZKn.bzM7qx02wluBk5U0M.ctNnCmoj14Nr4YC54jvrvuBmoL0EMqS', '0y6TpiddGwFQkGZoUv2NrRqboaf4Kh2DOCT0V39Z23XQXcUwiTfYR6jn1MUX', NULL, '2019-11-22 05:45:59', '2019-11-22 05:45:59'),
(4, 2, 'asdfsdaf', 'godmanshot@gmail.coma', 'users/default.png', NULL, '$2y$10$3w9kZL6/P2u3NAocXgA9IeMY6HfCy2PSCsi3X/UuEfaiw96to7rBS', NULL, NULL, '2019-11-22 06:01:57', '2019-11-22 06:01:57');

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_slug_unique` (`slug`);

--
-- Индексы таблицы `attribute_boolean_values`
--
ALTER TABLE `attribute_boolean_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_boolean_values_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `attribute_datetime_values`
--
ALTER TABLE `attribute_datetime_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_datetime_values_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `attribute_entity`
--
ALTER TABLE `attribute_entity`
  ADD UNIQUE KEY `attributable_attribute_id_entity_type` (`attribute_id`,`entity_type`);

--
-- Индексы таблицы `attribute_integer_values`
--
ALTER TABLE `attribute_integer_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_integer_values_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `attribute_text_values`
--
ALTER TABLE `attribute_text_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_text_values_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `attribute_varchar_values`
--
ALTER TABLE `attribute_varchar_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_varchar_values_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boutiques`
--
ALTER TABLE `boutiques`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boutique_categories`
--
ALTER TABLE `boutique_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boutique_products`
--
ALTER TABLE `boutique_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boutique_reviews`
--
ALTER TABLE `boutique_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `boutique_trading_houses`
--
ALTER TABLE `boutique_trading_houses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_stocks`
--
ALTER TABLE `category_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Индексы таблицы `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Индексы таблицы `freebies`
--
ALTER TABLE `freebies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Индексы таблицы `popular_products`
--
ALTER TABLE `popular_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recommendeds`
--
ALTER TABLE `recommendeds`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recommended_boutiques`
--
ALTER TABLE `recommended_boutiques`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `related_boutiques`
--
ALTER TABLE `related_boutiques`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top_products`
--
ALTER TABLE `top_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour_houses`
--
ALTER TABLE `tour_houses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour_house_sheldures`
--
ALTER TABLE `tour_house_sheldures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour_house_sliders`
--
ALTER TABLE `tour_house_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trading_houses`
--
ALTER TABLE `trading_houses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_boolean_values`
--
ALTER TABLE `attribute_boolean_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_datetime_values`
--
ALTER TABLE `attribute_datetime_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_integer_values`
--
ALTER TABLE `attribute_integer_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_text_values`
--
ALTER TABLE `attribute_text_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_varchar_values`
--
ALTER TABLE `attribute_varchar_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `boutiques`
--
ALTER TABLE `boutiques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `boutique_categories`
--
ALTER TABLE `boutique_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `boutique_products`
--
ALTER TABLE `boutique_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `boutique_reviews`
--
ALTER TABLE `boutique_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `boutique_trading_houses`
--
ALTER TABLE `boutique_trading_houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `category_stocks`
--
ALTER TABLE `category_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT для таблицы `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `freebies`
--
ALTER TABLE `freebies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT для таблицы `popular_products`
--
ALTER TABLE `popular_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `recommendeds`
--
ALTER TABLE `recommendeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `recommended_boutiques`
--
ALTER TABLE `recommended_boutiques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `related_boutiques`
--
ALTER TABLE `related_boutiques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `top_products`
--
ALTER TABLE `top_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tour_houses`
--
ALTER TABLE `tour_houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tour_house_sheldures`
--
ALTER TABLE `tour_house_sheldures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tour_house_sliders`
--
ALTER TABLE `tour_house_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `trading_houses`
--
ALTER TABLE `trading_houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attribute_boolean_values`
--
ALTER TABLE `attribute_boolean_values`
  ADD CONSTRAINT `attribute_boolean_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attribute_datetime_values`
--
ALTER TABLE `attribute_datetime_values`
  ADD CONSTRAINT `attribute_datetime_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attribute_entity`
--
ALTER TABLE `attribute_entity`
  ADD CONSTRAINT `attribute_entity_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attribute_integer_values`
--
ALTER TABLE `attribute_integer_values`
  ADD CONSTRAINT `attribute_integer_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attribute_text_values`
--
ALTER TABLE `attribute_text_values`
  ADD CONSTRAINT `attribute_text_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `attribute_varchar_values`
--
ALTER TABLE `attribute_varchar_values`
  ADD CONSTRAINT `attribute_varchar_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
