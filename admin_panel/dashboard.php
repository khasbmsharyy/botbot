<?php
// admin_panel/dashboard.php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}
require_once __DIR__ . '/../db.php';
$pdo = db();

// basic stats
$totalProducts = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
$totalOrders = $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$pendingOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE status='pending'")->fetchColumn();

?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>لوحة التحكم - Dashboard</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
  <div class="container">
    <h1>لوحة الإدارة</h1>
    <nav>
      <a href="products.php">المنتجات</a> |
      <a href="orders.php">الطلبات (<?=htmlspecialchars($pendingOrders)?>)</a> |
      <a href="logout.php">تسجيل الخروج</a>
    </nav>

    <section>
      <h2>إحصائيات</h2>
      <ul>
        <li>عدد المنتجات: <?=htmlspecialchars($totalProducts)?></li>
        <li>عدد الطلبات: <?=htmlspecialchars($totalOrders)?></li>
        <li>الطلبات المعلقة: <?=htmlspecialchars($pendingOrders)?></li>
      </ul>
    </section>

  </div>
</body>
</html>
