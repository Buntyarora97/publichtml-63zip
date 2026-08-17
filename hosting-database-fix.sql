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

/*
 * Site updates:
 * - normalize the public phone and WhatsApp number
 * - hide any donation links that may have been imported into CMS menus/footer
 * - keep the AdSense client setting available for the shared header
 *
 * This does not delete donation tables or existing records.
 */
UPDATE `settings`
SET `setting_value` = '8168877332'
WHERE `setting_key` = 'site_phone';

UPDATE `settings`
SET `setting_value` = '918168877332'
WHERE `setting_key` = 'contact_whatsapp';

UPDATE `admins`
SET `phone` = '8168877332'
WHERE `phone` IN ('7988145192', '917988145192');

INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_label`, `setting_group`, `is_public`)
SELECT 'adsense_client', 'ca-pub-1656864510786020', 'AdSense Publisher ID (ca-pub-...)', 'adsense', 1
WHERE NOT EXISTS (
    SELECT 1 FROM `settings` WHERE `setting_key` = 'adsense_client'
);

UPDATE `settings`
SET `setting_value` = 'ca-pub-1656864510786020'
WHERE `setting_key` = 'adsense_client';

UPDATE `footer_links`
SET `status` = 0
WHERE LOWER(`title`) LIKE '%donat%'
   OR LOWER(`title_hi`) LIKE '%दान%'
   OR LOWER(`url`) LIKE '%donat%';

UPDATE `menu_items`
SET `status` = 0
WHERE LOWER(`title`) LIKE '%donat%'
   OR LOWER(`title_hi`) LIKE '%दान%'
   OR LOWER(`url`) LIKE '%donat%'
   OR LOWER(`page_slug`) LIKE '%donat%';