<?php
// admin_panel/products.php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}
require_once __DIR__ . '/../db.php';
$pdo = db();

// handle add product
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = $_POST['name'] ?? '';
    $price = intval($_POST['price'] ?? 0);
    $stock = intval($_POST['stock'] ?? 0);
    $description = $_POST['description'] ?? '';
    if ($name !== '' && $price > 0) {
        $code = 'P' . time() . rand(10,99);
        $stmt = $pdo->prepare('INSERT INTO products(code, name, description, price, stock) VALUES(:code, :name, :desc, :price, :stock)');
        $stmt->execute([':code'=>$code, ':name'=>$name, ':desc'=>$description, ':price'=>$price, ':stock'=>$stock]);
        $success = 'تم إضافة المنتج بنجاح.';
    } else {
        $error = 'الاسم والسعر مطلوبان.';
    }
}

// delete product
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = intval($_POST['id'] ?? 0);
    if ($id > 0) {
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        $success = 'تم حذف المنتج.';
    }
}

$products = $pdo->query('SELECT * FROM products ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>المنتجات - لوحة الإدارة</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
  <div class="container">
    <h1>المنتجات</h1>
    <nav>
      <a href="dashboard.php">الرئيسية</a> |
      <a href="orders.php">الطلبات</a> |
      <a href="logout.php">تسجيل الخروج</a>
    </nav>

    <?php if (!empty($error)): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
    <?php if (!empty($success)): ?><div class="success"><?=htmlspecialchars($success)?></div><?php endif; ?>

    <section>
      <h2>إضافة منتج جديد</h2>
      <form method="post">
        <input type="hidden" name="action" value="add">
        <label>اسم المنتج</label>
        <input name="name" required>
        <label>السعر (بالعملة المحلية)</label>
        <input name="price" type="number" required>
        <label>الكمية</label>
        <input name="stock" type="number" value="1">
        <label>الوصف</label>
        <textarea name="description"></textarea>
        <button type="submit">إضافة</button>
      </form>
    </section>

    <section>
      <h2>قائمة المنتجات</h2>
      <table>
        <thead><tr><th>ID</th><th>الاسم</th><th>السعر</th><th>المخزون</th><th>إجراءات</th></tr></thead>
        <tbody>
        <?php foreach ($products as $p): ?>
          <tr>
            <td><?=htmlspecialchars($p['id'])?></td>
            <td><?=htmlspecialchars($p['name'])?></td>
            <td><?=htmlspecialchars($p['price'])?></td>
            <td><?=htmlspecialchars($p['stock'])?></td>
            <td>
              <form method="post" style="display:inline">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?=htmlspecialchars($p['id'])?>">
                <button type="submit" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </div>
</body>
</html>
