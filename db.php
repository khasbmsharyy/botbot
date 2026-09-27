<?php
// db.php - اتصال بسيط بواسطة PDO + SQLite
$config = require __DIR__ . '/config.php';
if (!is_dir(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0755, true);
}
$dsn = 'sqlite:' . $config['db_path'];
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function db(): PDO {
    global $pdo;
    return $pdo;
}
