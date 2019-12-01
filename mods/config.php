<?php
define('DB_HOST','localhost');
define('DB_NAME','spisok');
define('DB_USER','root');
define('DB_PASSWD','');
define('DB_CHAR','utf8');
define('DB_OPT',array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => TRUE,
));
define('DB_DSN', 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR.';');