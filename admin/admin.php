<?php
// admin/admin.php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../db.php';

function handle_admin($message, $args) {
    $from = $message['from'];
    $chat_id = $message['chat']['id'];
    $config = require __DIR__ . '/../config.php';
    if (empty($config['admin_id']) || $from['id'] != intval($config['admin_id'])) {
        sendMessage($chat_id, "هذا الأمر للمشرف فقط.");
        return;
    }
    // بسيط: /addproduct name|price|stock
    $text = $message['text'] ?? '';
    if (strpos($text, '/addproduct') === 0) {
        $payload = trim(substr($text, strlen('/addproduct')));
        $parts = array_map('trim', explode('|', $payload));
        if (count($parts) < 3) {
            sendMessage($chat_id, "الاستخدام: /addproduct اسم | سعر | كمية");
            return;
        }
        [$name, $price, $stock] = $parts;
        $code = 'P' . time();
        $pdo = db();
        $stmt = $pdo->prepare('INSERT INTO products(code, name, price, stock) VALUES(:code, :name, :price, :stock)');
        $stmt->execute([':code' => $code, ':name' => $name, ':price' => intval($price), ':stock' => intval($stock)]);
        sendMessage($chat_id, "تم إضافة المنتج: {$name}");
        return;
    }
    if (strpos($text, '/orders') === 0) {
        $pdo = db();
        $stmt = $pdo->query('SELECT o.id, u.telegram_id, p.name, o.total, o.status FROM orders o JOIN users u ON o.user_id = u.id JOIN products p ON o.product_id = p.id ORDER BY o.id DESC LIMIT 20');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)) {
            sendMessage($chat_id, "لا توجد طلبات.");
            return;
        }
        $lines = [];
        foreach ($rows as $r) {
            $lines[] = "#{$r['id']} | user: {$r['telegram_id']} | product: {$r['name']} | total: {$r['total']} | status: {$r['status']}";
        }
        sendMessage($chat_id, implode("\n", $lines));
        return;
    }
    sendMessage($chat_id, "أوامر المشرف المتاحة:\n/addproduct اسم|سعر|كمية\n/orders - عرض آخر الطلبات");
}
