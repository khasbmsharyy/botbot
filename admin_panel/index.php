<?php
// admin_panel/index.php
session_start();
require_once __DIR__ . '/../db.php';
$config = require __DIR__ . '/../config.php';

$token = getenv('ADMIN_PANEL_TOKEN') ?: '';

// login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['token'] ?? '';
    if ($token !== '' && hash_equals($token, $input)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'رمز غير صحيح';
    }
}

if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: dashboard.php');
    exit;
}

?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>تسجيل الدخول - لوحة الإدارة</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
  <div class="container">
    <h1>لوحة إدارة متجر Telegram</h1>
    <?php if (!empty($error)): ?>
      <div class="error"><?=htmlspecialchars($error)?></div>
    <?php endif; ?>
    <form method="post">
      <label>رمز الوصول (ADMIN_PANEL_TOKEN)</label>
      <input type="password" name="token" required>
      <button type="submit">تسجيل الدخول</button>
    </form>
  </div>
</body>
</html>
