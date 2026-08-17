<?php
/**
 * Donation endpoint retired from the public site.
 *
 * Keep the old URL as a safe redirect so stale external links do not expose
 * the removed form or create new donation requests.
 */
header('Location: /', true, 301);
exit;