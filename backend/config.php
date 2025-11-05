<?php
// backend/config.php
// Database configuration (if needed in future)
define('DB_HOST', 'localhost');
define('DB_NAME', 'stepway_technologies');
define('DB_USER', 'username');
define('DB_PASS', 'password');

// Email configuration
define('SITE_EMAIL', 'info@stepwaytechnologies.com');
define('SITE_NAME', 'Stepway Technologies');

// Environment
define('ENVIRONMENT', 'production'); // Change to 'development' for local testing

// Error reporting
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone
date_default_timezone_set('UTC');
?>