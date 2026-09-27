<?php
// admin_panel/orders.php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}
require_once __DIR__ . '/../db.php';
$pdo = db();

// change status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'status') {
    $id = intval($_POST['id'] ?? 0);
    $status = $_POST['status'] ?? 'pending';
    if ($id > 0) {
        $stmt = $pdo->prepare('UPDATE orders SET status = :status WHERE id = :id');
        $stmt->execute([':status'=>$status, ':id'=>$id]);
        $success = 'تم تحديث حالة الطلب.';
    }
}

$orders = $pdo->query('SELECT o.*, u.telegram_id, p.name AS product_name FROM orders o JOIN users u ON o.user_id = u.id JOIN products p ON o.product_id = p.id ORDER BY o.id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>الطلبات - لوحة الإدارة</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
  <div class="container">
    <h1>الطلبات</h1>
    <nav>
      <a href="dashboard.php">الرئيسية</a> |
      <a href="products.php">المنتجات</a> |
      <a href="logout.php">تسجيل الخروج</a>
    </nav>

    <?php if (!empty($success)): ?><div class="success"><?=htmlspecialchars($success)?></div><?php endif; ?>

    <table>
      <thead><tr><th>#</th><th>المستخدم</th><th>المنتج</th><th>المجموع</th><th>الحالة</th><th>الإجراءات</th></tr></thead>
      <tbody>
        <?php foreach ($orders as $o): ?>
          <tr>
            <td><?=htmlspecialchars($o['id'])?></td>
            <td><?=htmlspecialchars($o['telegram_id'])?></td>
            <td><?=htmlspecialchars($o['product_name'])?></td>
            <td><?=htmlspecialchars($o['total'])?></td>
            <td><?=htmlspecialchars($o['status'])?></td>
            <td>
              <form method="post" style="display:inline">
                <input type="hidden" name="action" value="status">
                <input type="hidden" name="id" value="<?=htmlspecialchars($o['id'])?>">
                <select name="status">
                  <option value="pending" <?=($o['status']==='pending')?'selected':''?>>pending</option>
                  <option value="processing" <?=($o['status']==='processing')?'selected':''?>>processing</option>
                  <option value="completed" <?=($o['status']==='completed')?'selected':''?>>completed</option>
                  <option value="canceled" <?=($o['status']==='canceled')?'selected':''?>>canceled</option>
                </select>
                <button type="submit">تحديث</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
