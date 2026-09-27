<?php
// run_migrations.php
// تشغيل هذا الملف مرة واحدة عبر المتصفح لإنشاء قاعدة البيانات من migrations.sql
$dbPath = __DIR__ . '/data/database.sqlite';
if (!is_dir(__DIR__ . '/data')) mkdir(__DIR__ . '/data', 0755, true);
try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = file_get_contents(__DIR__ . '/migrations.sql');
    if ($sql === false) { echo "ملف migrations.sql غير موجود"; exit; }
    $pdo->exec($sql);
    echo "Migrations تم تنفيذها بنجاح. DB: $dbPath";
} catch (Exception $e) {
    echo "خطأ عند تنفيذ migrations: " . $e->getMessage();
}
