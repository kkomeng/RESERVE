<?php
error_reporting(E_ALL & ~E_WARNING);

ini_set('date.timezone', 'Asia/Tokyo');

define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'reserve');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');

define('ADMIN_EMAIL', 'admin@example.com');

mb_language('Japanese');
mb_internal_encoding('UTF-8');
