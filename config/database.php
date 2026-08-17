<?php

/**
 * Backwards-compatible bootstrap for pages that still require /config/database.php.
 *
 * The canonical configuration remains in includes/config/database.php so both
 * root pages and shared-hosting admin pages can load the same connection.
 */
require_once __DIR__ . '/../includes/config/database.php';