<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'y0fgakv1fpy9');
define('DB_PASSWORD', 'Google19#');
define('DB_NAME', 'sir_giles');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>