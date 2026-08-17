/*
 * Run this once in phpMyAdmin after importing
 * u872449974_rammandir.20260807213415.sql.
 *
 * The application includes keyword pages, but the uploaded production dump
 * does not contain this table.  CREATE IF NOT EXISTS makes this safe to run
 * even if the table was added already.
 */
CREATE TABLE IF NOT EXISTS `keyword_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `keyword_hi` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `content_hi` longtext DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_keyword_pages_slug` (`slug`),
  KEY `idx_keyword_pages_status` (`status`),
  KEY `idx_keyword_pages_keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;